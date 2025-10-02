<?php


include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";


//print_r($_POST);

$paypal = new paypal();
//$paid = 0.5; // MEMBER_FEE;    // for consistency override whatever was posted
$event= "Buffet25";


$paid= 20;
if($_POST["lname"] == "Okamoto") $paid=0.01;

//$paid = $_POST["_BUFFET_FEE"];
$paypal->price = $paid;

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","SCTC 2025 Dinner: Hokkaido Buffet");
$paypal->add("quantity",1);

/*
define("RETURN_URL_SIGNUP","http://www.sctennisclub.net/signup_/done");
define("CANCEL_URL_SIGNUP","http://www.sctennisclub.net/signup_/cancel");
define("NOTIFY_URL_SIGNUP","http://www.sctennisclub.net/signup_/notify");
*/


$paypal->add("return",RETURN_URL_SIGNUP);
$paypal->add("cancel_return",CANCEL_URL_SIGNUP);
$paypal->add("notify_url",NOTIFY_URL_SIGNUP);

//DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$gender = "-";
$ntrp   = "-";
$member = "-";


// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;
$theTABLE = "mixer_pending";

//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

$year=2025;
//unused fields
$gender=$ntrp=$address=$city=$zip =$team =$opt=$pwd="-";
$mtype=$phone=$code="-";
$payment=$paid;

$insignia="";

//toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

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
	'date' => $custom, // $date,
	'insignia' => $insignia,
	'payment' => $payment,
	'custom' => $custom,
    'opt' => $opt,
    'pwd' => $pwd,
    'subject' => "Hokkaido Buffet Signup: $fname $lname (pending)",
    'message' => "Hokkaido Buffet Signup: $fname $lname (pending)"

);

SENDER( $data );

//EMAILER($fname." ".$lname, $email, "Year-end Dinner => $theTABLE ");

//copyto( TABLE_MIXER_PENDING,  TABLE_MIXER_PAYPAL, $custom);
//print_r($paypal);

$subject= "2025 Dinner";
$message = "$fname $lname signed up";
$recipient = "south@sctennisclub.org";


$res = CHECK_CAPTCHA() ;
if($res == true) {

  phpemailer($subject,$message , $recipient );
//  print_r( $data );

  toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

}else{

    echo '<script>alert("Fill out the  reCAPTACHA")</script>'; 
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

DROP TABLE IF EXISTS `mixer_pending`;


CREATE TABLE `mixer` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(31) DEFAULT NULL,
  `lname` varchar(31) DEFAULT NULL,
  `gender` varchar(4) DEFAULT NULL,
  `ntrp` varchar(4) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `member` varchar(10) DEFAULT NULL,
  `paid` varchar(10) DEFAULT NULL,
  `date` varchar(31) DEFAULT NULL,
  `custom` int DEFAULT NULL,
  `division` varchar(31) DEFAULT NULL,
  `event` varchar(31) DEFAULT NULL, 
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3621 DEFAULT CHARSET=latin1;

*/

?>