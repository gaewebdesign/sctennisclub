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


$paypal->add("return",RETURN_URL_SIGNUP);
$paypal->add("cancel_return",CANCEL_URL_SIGNUP);
$paypal->add("notify_url",NOTIFY_URL_SIGNUP);

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
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;
$theTABLE = "teamtennis";

//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

$year=2024;
//unused fields
//$gender=$ntrp=$address=$city=$zip =$team =$opt=$pwd="-";
//$mtype=$phone=$code="-";
$team="";
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
	//'address' => $address,
	//'city' => $city,
	//'zip' => $zip,
	'team' => $team,
	//'mtype' => $mtype,
	'date' => $custom, // $date,
	//'insignia' => $insignia,
	'payment' => $payment,
	'custom' => $custom,
//    'opt' => $opt,
//    'pwd' => $pwd,
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
//  print_r( $data );
  $theTABLE="teamtennis";
// dbevent ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
   $fname2=$lname2=$ntrp2=$gender2=$email2="";
   $division=$team=$pwd="";
   $mtype=0;
   dbteamtennis($theTABLE,$fname,$lname,$email,$gender,$ntrp,$year,$division,$team,$date,$date,$payment);
//function dbteamtennis($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$year,$division,$team,$date,$custom){

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

//$paypal->output_form();
// 
// ***********************************************************************************

/*


*/

?>