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


//$paid = 0.5; // MEMBER_FEE;    // for consistency override whatever was posted
if($_POST["mixer"] == 'SCTC' ) {
	$paid =  $_POST["_SCTC"];   // MEMBER
	DEBUG( "adjusting to ".$paid);
	
}else if($_POST["mixer"] == 'GUEST'){
	$paid =  $_POST["_GUEST"];   // GUEST
	DEBUG( "adjusting to ".$paid);

}else if($_POST["mixer"] == 'ICECREAM'){
	$paid =  $_POST["_ICECREAM"];   //ICECREAM
	DEBUG( "adjusting to ".$paid);

}else{
//	alert("select an option (SCTC,MVTC(guest) or Ice Cream only");
	$paid = 10.01;     // DEFAULT

}

//echo(" paid = ".$paid );

//alert($_POST["mixer"]." -> ".$paid);
$paypal->price = $paid;

//DEBUG("paypal -> price = $paid   < ---");

//$paypal->ipn = "http://www.sctennisclub.com/membership/pipn.php";

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","SCTC Mixer");
$paypal->add("quantity",1);

$paypal->add("return",RETURN_URL);
$paypal->add("cancel_return",CANCEL_URL);
$paypal->add("notify_url",NOTIFY_URL);

DEBUG("notify:" . NOTIFY_URL);

$fname = "Roger";       //$_POST["fname"];
$lname = "Okamoto";     //$_POST["lname"];
$email = "rwokamoto@gmail.com";   ///$_POST["email"];
$gender = $_POST["gender"];
$ntrp   =$_POST["ntrp"]; 
$member =$_POST["member"];
$event = $_POST["event"];


// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);

$theTABLE = "mixer_pending";

//echo ("INSERT $fname $lname $paid $date $custom");
toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);
sendemail($fname." ".$lname, $email, "SCTENNISCLUB.NET TEST => $theTABLE ");

$paypal->output_form();


?>