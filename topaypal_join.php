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

$message = $_POST[FNAME]." ".$_POST[LNAME]."\n";
$message .= $_POST[ADDRESS]."\n".$_POST[TEAM];


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
		// Attempt to signup as Santa Clara resident
        $login = "RESIDENT fail: ".$_POST[FNAME]." ".$_POST[LNAME]." ".$_POST[ADDRESS]." ".$_POST[CITY];

		HISTORY("topaypal_join.php!!!!!  ".$login);
		LOGS("topaypal_join.php!!!!!  ".$login);
		$subject = "RESIDENT signup fail";
		$recipient = "tennis.mutt@sctennisclub.org";
		phpemailer($subject,$login , $recipient , "santaclarawebmaster@gmail.com");
		
		echo "<script>alert(\"must have Santa Clara address for resident fee \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="./join";
                 }, 100);
              </script>
                ');
		return;
	}


}else if($_POST["membership"] == 'NRS'){
	$paid =  NONRES_SINGLE_FEE;
}else if( $_POST["membership"] == 'NRF'){
	$paid =  NONRES_FAMILY_FEE;
}else if( $_POST["membership"] == 'NRSx'){
	$paid =  NONRES_SINGLE_FEE;
	if(Waitlist(YEAR) > WAITLISTLIMIT){
        $title = "Waitlist";
		$note =  "Limited to ".WAITLISTLIMIT."  players";
		$note = "Waitlist full";
		announce( $title, $note );
		$message .= " Waitlist full";
		$subject = "Waitlist attempt";
		phpemailer($subject,$message,"mutt@sctennisclub.org","south@sctennisclub.org");

		return;
	}

}else{
	DEBUG("error");
}
 

 //if( ($_POST[FNAME] == "Roger") and ( $_POST[LNAME] == "Okamoto")  ) {
 
 if( $_POST[EMAIL] == "goldengatennisclub@gmail.com"  ) {
	$paid="0.01";
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
				HISTORY("topaypal_join.php: found: ".$_POST[ADDRESS]." ".$_POST[CITY]	);
				HISTORY("topaypal_join.php: fee: $paid  $mtype $opt ");
				HISTORY("topaypal_join.php: primary member opt: $opt ");

// For Testing --- additinjal member fee is 0.02 for Roger
				if( ($_POST[FNAME] == "Roger" ) and ($_POST[LNAME] == "Okamoto")  ) {
					$paid="0.02";
					LOGS("Roger pays $paid as RF_");
					HISTORY("Roger pays $paid as RF_");
				} 
				

			}
}

// Check for a family account using this address 
// Looks in the current year;

if(preg_match( "/F/i",$mtype)){
		 if($found = findAddressFamily($_POST[ADDRESS]) ){
//					$paid="0.98";
//					$mtype .= "_";   // put this back in when activated
					HISTORY("topaypal_join.php findAddressFamily -- found: $found "." address: ".$_POST[ADDRESS]) ;
				 	HISTORY("topaypal_join.php findAddressFamily -- fee: $paid  mtype: $mtype ");

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
/*
if(($mtype == "RF") or ($mtype == "NRF") ){
    $trust = getFamilyTrust($year-1 ,$address,$email);
    LOGS("topaypal_join.php found $mtype so creating $fname $lname into family db with trust=$trust");
	$pwd = Password();
	$account = 33; // time(); // replace with $_POST value
	toFamilyDB($year,$fname,$lname,$email,$address,$city,$pwd,$mtype,$account,$count,$trust);

}
*/

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
$p = password();
$address2 = "$address - $p";

$pwd=password();
$insignia= "123456788888888";
$code = "408";
$phone = "993-9999";
$state = "CA";
$capt = "Capt Kirk";
$help = "HELP";
$other = "other";

toDBase(TABLE_PENDING,$year,$fname,$lname,$email,$event,$gender,$ntrp,$code,$phone,$address,$city,$zip,$state,$capt,$team,$mtype,$help,$other,$date,$insignia,$payment,$custom,$opt,$pwd);

//toDB(TABLE_PENDING,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

// TAKE OUT FOR PRODUCTION --- KEEP HERE JUST FOR TESTING
if($mtype == "NRSx"){
    LOGS("topaypaljoin_.php to waitlist -- taken out for production");
//	toDB(TABLE_WAITLIST,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
}
// TAKE OUT FOR PRODUCTION --- KEEP HERE JUST FOR TESTING

//LOGS("increment $address for year $year ");
//incrementFamilyCount( $address , $year);

$subject= "2025 Pending Signup($mtype - $fname $lname)";
$message = "PENDING $mtype <br> ";
$message .= "$fname $lname <br>$address<br>$email <br>";
$message .= "$city <br>";
$message .= "$mtype <br>";
$recipient = "mutt@sctennisclub.org";
//$recipient = "south@sctennisclub.org";
phpemailer($subject,$message , $recipient , $recipient );
echo("sent to recipient@".$subject." ".$message." ".$recipient. "<br>");

$subject = "SCTC Register";
$message = "$fname $lname <br>$address<br>$email <br>";
$message .= "$city <br>";
$message .= "$mtype <br>";

$recipient = "south@sctennisclub.org";
phpemailer($subject,$message , $recipient , $recipient);
echo("sent to south@".$subject." ".$message." ".$recpient. "<br>");

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