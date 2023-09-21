<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

/*
define("PAYPAL_MAIL","treasurer@sctennisclub.org");
define("RETURN_URL","http://www.sctennisclub.org/signup/done");
define("CANCEL_URL","http://www.sctennisclub.org/signup/cancel");
define("NOTIFY_URL","http://www.sctennisclub.org/signup/notify.php");
*/

//print_r($_POST);

$paypal = new paypal();



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


$date = $custom;
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
$paypal->add("item_name","SCTC Membership");
$paypal->add("quantity",1);

$paypal->add("return",RETURN_URL);
$paypal->add("cancel_return",CANCEL_URL);
$paypal->add("notify_url",NOTIFY_URL);

DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST[FNAME];
$lname = $_POST[LNAME];
$email = $_POST[EMAIL]; //"rwokamoto@gmail.com";   ///$_POST["email"];
$gender = $_POST[GENDER];
$ntrp   =$_POST[NTRP]; 
$member =$_POST["membership"];
$event = $_POST["event"];

$address = $_POST[ADDRESS];
$city = $_POST[CITY];
$zip = $_POST[ZIP];

$team = $_POST[TEAM];

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



// if $opt != 911, then this person is either RF_ or NRF_  
//toMemberDB(TABLE_PENDING, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team,$mtype,$date,$insignia,$payment,$custom,$opt);

//function toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd)
// NOW JUST ONE toDB to handle all tables --- since theyre all the same structure now
$pwd="*";
toDB(TABLE_PENDING,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);


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
    'subject' => "Athena signup: $fname $lname (pending)",
    'message' => "Athena signup: $fname $lname (pending)"

);

SENDER( $data );
//sendemail($fname." ".$lname, $email, "sctennisclub.net signup => $theTABLE ");

// copy to paypal table
// this done in return.php after Paypment payment
// comment out after testing
//copyto(TABLE_PENDING,TABLE_PAYPAL,$custom);

//print_r($paypal);

$paypal->output_form();


?>