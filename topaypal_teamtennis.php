<?php


include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/dbevent.inc";

include "./library/email/email.inc";

//print_r($_POST);

$paypal = new paypal();
//$paid = 0.5; // MEMBER_FEE;    // for consistency override whatever was posted
$event= "Team Tennis";

/*
if($_POST["dinner"] == "10Course" ) {
	$event ="10 Course";
} else if($_POST["dinner"] == "Vegetarian"){
	$event ="Vegetarian";
}else{
	$event ="ERR";

}
*/

$paid= DINNER;
$paid = $_POST["_FEE"];
$paypal->price = $paid;

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","SCTC Team Tennis: ".$event);
$paypal->add("quantity",1);

/*
define("RETURN_URL_SIGNUP","http://www.sctennisclub.net/signup_/done");
define("CANCEL_URL_SIGNUP","http://www.sctennisclub.net/signup_/cancel");
define("NOTIFY_URL_SIGNUP","http://www.sctennisclub.net/signup_/notify");
*/


$r = RETURN_URL_TEAMTENNIS;
$c = CANCEL_URL_TEAMTENNIS;
$n = NOTIFY_URL_TEAMTENNIS;

LOGGER(" return: $r");
LOGGER(" return: $c");
LOGGER(" return: $n");

$paypal->add("return",RETURN_URL_TEAMTENNIS);
$paypal->add("cancel_return",CANCEL_URL_TEAMTENNIS);
$paypal->add("notify_url",NOTIFY_URL_TEAMTENNIS);

//DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$ntrp   = $_POST["ntrp"];
$paid   = $_POST["_FEE"];


// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
$custom  -= 60*60*24*700;
//*******

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;

$year=2024;

$team="";
$payment=$paid;

$opt=$payment;

$data = array(
	'year' => $year,
	'fname' => $fname,
  'lname' => $lname,
	'email' => $email,
	'event' => $event,
	'gender' => $gender,
	'ntrp' => $ntrp,
  'team' => $team,
	'date' => $custom, // $date,
	'payment' => $payment,
	'custom' => $custom,
  'subject' => "Team Tennis Signup: $fname $lname (pending)",
  'message' => "Team Tennis Signup: $fname $lname (pending)"

);

SENDER( $data );

//EMAILER($fname." ".$lname, $email, "Year-end Dinner => $theTABLE ");

//copyto( TABLE_MIXER_PENDING,  TABLE_MIXER_PAYPAL, $custom);
//print_r($paypal);

$subject= "2024 Team Tennis";
$message = "$fname $lname signed up";
$recipient = "tennis.mutt@gmail.com";


$res = CAPTCHA_CHECKOUT() ;
if($res == true) {

   phpemailer($subject,$message , $recipient );
   $theTABLE="teamtennis_pending";
   $theTABLE="teamtennis";

   $division=$team="";

   dbteamtennis($theTABLE,$fname,$lname,$email,$gender,$ntrp,$year,$division,$team,$date,$date,$payment);

}else{

    echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
	echo('
      <script >
      window.setTimeout(function() {
        window.location.href="./dinner";
    }, 500);
       </script>
');
    return;
}

$paypal->output_form();
// 
// ***********************************************************************************

/*


*/

?>