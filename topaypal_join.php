<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";
include "./library/email/email.inc";
/*
define("PAYPAL_MAIL","treasurer@sctennisclub.org");
define("RETURN_URL","http://www.sctennisclub.org/signup/done");
define("CANCEL_URL","http://www.sctennisclub.org/signup/cancel");
define("NOTIFY_URL","http://www.sctennisclub.org/signup/notify.php");
*/

//print_r($_POST);

// Sanitize

$_POST[FNAME] = Sanitize( $_POST[FNAME] );
$_POST[LNAME] = Sanitize( $_POST[LNAME] );
$_POST[ADDRESS] = Sanitize( $_POST[ADDRESS] );

$_POST[CITY] = Sanitize( $_POST[CITY] );
$_POST[TEAM] = Sanitize( $_POST[TEAM] );




$paypal = new paypal();


if( !isset($_POST[FNAME] )) {
	echo ("spam guard: contact webmaster if this pops up");
	return;
 }
 
// echo "<script>alert(\"ZSanta Clara Resident\")</script>";

$paid = RES_FEE;

$mtype= $_POST["membership"];
if($_POST["membership"] == 'RS' || $_POST["membership"] == "RF") {
	$paid =  RES_FEE;

    if( RESIDENT_MATCH( $_POST[CITY]) ){
		 DEBUG("Santa Clara resident" );
	}else{
		echo "<script>alert(\"must have Santa Clara address for resident fee \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="./join.html";
                 }, 100);
              </script>
                ');
		return;
	}


}else if($_POST["membership"] == 'NRS'){
	$paid =  NONRES_SINGLE_FEE;
}else if( $_POST["membership"] == 'NRF'){
	$paid =  NONRES_FAMILY_FEE;
}else{
	DEBUG("error");
}

//echo("preg_match: ".preg_match("/santa|clara/i",$_POST[CITY] ) );


//DEBUG("paypal -> price = $paid   < ---");

//$paypal->ipn = "http://www.sctennisclub.com/membership/pipn.php";
// Look for address and override $paid to 0.99 if address found
// FindAddress only searches for RF and NRF (without appended _)
// returns false if not found (also for NRF with 2)
$epoch=0;
$underline="";
$opt="911";
// only search for address of F(amily) type membership (RF or NRF)
// Override if address is detected
if(preg_match( "/F/i",$mtype)){
			if($epoch=FindAddress( $_POST[ADDRESS], $_POST[CITY])){

				$paid=ADDITIONAL_MEMBER_FEE;         // discount
        		$mtype .="_";        // append to RF_ or NRF_
		        $opt = $epoch;        // primary member  (this person gets INSIGNIA incremnted later in from_done.php )
				LOGGER("topaypal_join.php: found: ".$_POST[ADDRESS]." ".$_POST[CITY]	);
				LOGGER("topaypal_join.php: fee: $paid  $mtype $opt ");
				LOGGER("topaypal_join.php: primary member opt: $opt ");

			}
}

// Check for a family account using this address 
// Looks in the current year;

if(preg_match( "/F/i",$mtype)){
		 if($found = findAddressFamily($_POST[ADDRESS]) ){
//					$paid="0.98";
//					$mtype .= "_";   // put this back in when activated
					LOGS("topaypal_join.php findAddressFamily -- found: $found "." address: ".$_POST[ADDRESS]) ;
				 	LOGS("topaypal_join.php findAddressFamily -- fee: $paid  mtype: $mtype ");

		 };

}



//$date = $custom;
$payment = $paid;
$insignia = "1";
$year = YEAR ;      // defined in library/include.inc
// opt (set above is the primary member found from FindAddress
// opt gets used when this member is copied from pending to paypal
// the primary member identified by opt has insignia incremented
// and the address is changed if a non-resident primary membere

$paypal->price = $paid;

// The price has to be sete before enable_payment

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","SCTC $year Membership");
$paypal->add("quantity",1);

$paypal->add("return",RETURN_URL);
$paypal->add("cancel_return",CANCEL_URL);
$paypal->add("notify_url",NOTIFY_URL);

//DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST[FNAME];
$fname = ucfirst($fname);

$lname = $_POST[LNAME];
$lname = ucfirst($lname);

$email = $_POST[EMAIL]; //"rwokamoto@gmail.com";   ///$_POST["email"];
$gender = $_POST[GENDER];
$ntrp   =$_POST[NTRP]; 
$member =$_POST["membership"];
$event = "Memb".YEAR;//$_POST["event"];

$address = $_POST[ADDRESS];

$city = $_POST[CITY];
$zip = $_POST[ZIP];

$team = $_POST[TEAM];

// temporary move later to after Paypal payment returns
$count=0;
$trust=0;



// new account created only if RF or NRF
// check if a trusted account from previous year
// insert family account information
if(($mtype == "RF") or ($mtype == "NRF") ){
    $trust = getFamilyTrust($year-1 ,$address,$email);
    LOGS("topaypal_join.php found $mtype so creating $fname $lname into family db with trust=$trust");
	$pwd = Password();
	toFamilyDB($year,$fname,$lname,$email,$address,$city,$pwd,$mtype,$count,$trust);


}

	// *************************************
//$address .= "*#*";

// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;

//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

//(  ADD  to address)
if( preg_match( "/2893 Cabrillo/", $address)  ) $address = "-".password();
if( preg_match( "/3410 Montgomery/", $address)  ) $address = "-".password();
if( preg_match( "/2868 Chromite/", $address)  ) $address = "-".password();
if( preg_match( "/2988 Via Torino/", $address)  ) $address = "-".password();
if( preg_match( "/2566 Dixon/", $address)  ) $address = "-".password();
/*

2893 Cabrillo
Eva Wu              Mt. View    2024 - 18W2.5   FULL Member paid $30
Lingyu Xu           San Jose    2024 - 18W2.5
Shiting Jian        San Jose    2024 - 18W2.5

2868 Chromite Dr
Chang Su    F       Milpitas     2024 - 18W2.5  Full Member paid $30
Yang Feng   F3.0    Sunnyvale    2024 - 18W2.5
Mengyang Li  F      Campbell     2024 - 18W2.5

2988 Via Torino
Jingchu Wu         San Jose
Shiru Cao          Mt View

W2.5 Captain Xiwen Zhao paid full non-resident fee in 2024 and had
legitimate Sunnyvale address (Mathilda) and changed in 2025 to 3410 Montgomery

2025 W6.0b players
Shiru Cao       ----- hasn't signed up San Jose (  2024 @ 2998 Via Torino, Santa Clara)
Gary Chen       ----- hasn't signed up Sunnyvale ( 2023 @ 3464 Homestead )
Yurong Chen     2717 Forbes
Lexi He         3410 Montgomery
Kuan Hu         2717 Forbes
Zhen Liu        3410 Montgomery
Jacob Lu        ----- hasnt signed up (Sunnyvale)
Weiwei  Meng    ----- hasnt signed up (Sunnyvale)
Xiaocen Shan    3410 Montgomery
Lingyu Xu       ---- 2024 @2893 Cabrillo $.99
Koki Yoshida    2717 Forbes
Kan Yu          2717 Forbes (Main $25 payer - account disabled)
Kyle Zhang      3410 Montgomery #321 (Main $25 payer - account disabled)
Xiwen Zhao      3410 Montgomery #321 (3rd home team)
Xhaoxia Zhao    3410 Montgomery #321

3410 Montgomery
Kyle Zhang          Sunnyvale    2025 - Mx6.0b  Full Member ($25)
Xiwen Zhao          Sunnyvale    2025 - Mx6.0b
Zhen Liu            San Jose    2025 - Mx6.0b
Lexi He             Sunnyvale    2025 - Mx6.0b
Xiacen Shan         Fremont    2025 - Mx6.0b

Fiona Le's  W3.0 team
Guiting Ye Los Altos      3710 El Camino Real 2024 
Yunqi Chen Mountain View  3710 El Camino Real

2566 Dixon Dr (Nan Sun main signed up 12/31/2023 )
Nan Sun   (M3.5)      San Jose    2024 18Mx6.0A , 2025 18Mx6.0b 
Lufei Wang  (F)       Sunnyvale   2024  18Mx7.0 , 18Mx6,0
Minfa Wang (M4.0)     Los Altos   2024 18Mx7.0 , CM7.5A
Ziwei Wang (F3.0)     Palo Alto   2024 18W3.0
Xingxin Zhou (F3.0)   Newark      2023 CW5.5A

*/
//echo $address;
// if $opt != 911, then this person is either RF_ or NRF_  
//toMemberDB(TABLE_PENDING, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team,$mtype,$date,$insignia,$payment,$custom,$opt);

//function toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd)
// NOW JUST ONE toDB to handle all tables --- since theyre all the same structure now
//$pwd=password();


toDB(TABLE_PENDING,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);


$subject= "2025 Pending Signup( $fname $lname)";
$message = "PENDING <br> ";
$message .= "$fname $lname <br>$address<br>$email <br>";
$message .= "$city <br>";
$recipient = "tennis.mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "santaclarawebmaster@gmail.com");


$data = array(
	'year' => $year,
	'fname' => $fname,
    'lname' => $lname,
	'email' => $email,
	'event' => $event,
	'gender' => $gender,
	'ntrp' => $ntrp,
	'address' => $address,
	'city' => $city,
	'zip' => $zip,
	'team' => $team,
	'mtype' => $mtype,
	'date' => $date,
	'insignia' => $insignia,
	'payment' => $payment,
	'custom' => $custom,
    'opt' => $opt,
    'pwd' => $pwd,
    'subject' => "$year Membership signup: $fname $lname (pending)",
    'message' => "$year Membership signup: $fname $lname (pending)"

);

//SENDER( $data );
//sendemail($fname." ".$lname, $email, "sctennisclub.net signup => $theTABLE ");

// copy to paypal table
// this done in return.php after Paypment payment
// comment out after testing
//copyto(TABLE_PENDING,TABLE_PAYPAL,$custom);

//print_r($paypal);

$paypal->output_form();


?>