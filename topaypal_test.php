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

//print_r($_POST);

$paid=$_POST["_FEE"];


$paypal->price = $paid;

//DEBUG("paypal -> price = $paid   < ---");

//$paypal->ipn = "http://www.sctennisclub.com/membership/pipn.php";

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","Ice cream");
$paypal->add("quantity",1);

$paypal->add("return",RETURN_URL);
$paypal->add("cancel_return",CANCEL_URL);
$paypal->add("notify_url",NOTIFY_URL);

DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];



$event = "2024 Ice Cream"; //$_POST["event"];


// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);

$theTABLE = "mixer_pending";

// going to Paypal
//echo ("DB INSERT $fname $lname $paid $date $custom");
$gender = $ntrp  = $address = ""; //$_POST["ntrp"]; 
$city=$zip=$team=$mtype = $member = $mtype=$phone=$code="-";
$payment=$paid;

$year=2024;
$date=$custom;
toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

$subject= "Ice Cream";
$message = "$fname $lname ";
$email = "";
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);
//sendemail($fname." ".$lname, $email, "SCTENNISCLUB.NET TEST => $theTABLE ");
$res = CAPTCHA_CHECKOUT() ;
if($res == true) {
//  	phpemailer($subject, $message , "tennis.mutt@gmail.com",$email);
//    toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

}else{

    echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
	echo('
      <script >
      window.setTimeout(function() {
        window.location.href="./icecream";
    }, 500);
       </script>
');
    return;
}








$paypal->output_form();


?>