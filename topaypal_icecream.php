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

$paypal->add("return",RETURN_URL_SIGNUP);
$paypal->add("cancel_return",CANCEL_URL_SIGNUP);
$paypal->add("notify_url",NOTIFY_URL_SIGNUP);

DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];



$event =EVENT_ICECREAM;


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

$year=2025;
$date=$custom;
//toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

//* data
/*
$data = array(
	'year' => $year,
	'fname' => $fname,
    'lname' => $lname,
	'email' => $email,
	'subject' => "Ice cream signup: $fname $lname (pending)",
    'message' => "Ice cream signup: $fname $lname (pending)"

);
*/
$subject= "2025 Ice Cream (from topaypal_icecream.php)";
$message = "$fname $lname signed up";
$email = "tennis.mutt@gmail.com";

$insignia=$opt=$pwd="";

$res = CHECK_CAPTCHA() ;
if($res == true) {
    $event = "2025 ICE";
    phpemailer($subject,$message , $email );
    toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

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