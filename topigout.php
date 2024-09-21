<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = "" ;// $_POST['password'];
$submitButton = $_POST['SubmitButton'];

// CHECK IF EMAIL MATCH
$retv= CHECK_EMAIL( $email);

if($retv == false){

    $message = "Email address ($email) not found in membership. ";
    $message .= "The Pigout is a members only event. ";
	$message .= "Please signup to Santa Clara Tennis Club";

    echo "<script>alert('$message');</script>";
//		window.location.href="./pigout";
	echo('
	<script >
		window.setTimeout(function() {
					window.location.href="./signup_free.phtml";
			}, 500);
	</script>
	');

    return;

}
 
// Check Captcha
$retv = CHECK_CAPTCHA();
if ($retv == false ){
	$message = "Please complete CAPTCHA ";
	echo "<script>alert('$message');</script>";
	echo('
	<script >
		window.setTimeout(function() {
					window.location.href="./signup_free.phtml";
			}, 500);
	</script>
	');

    return;	


}

/*

echo('
<script >
    window.setTimeout(function() {
        window.location.href="./pigout";
    }, 500);
</script>
');
*/

// This far means passed email and CAPTCHA tests
$theTABLE = "mixer_free";

//echo ("INSERT $fname $lname $paid $date $custom");
$gender= $ntrp = $address=$city=$zip=$team=$mtype=$opt=$pwd = "" ;

$year = "2024";
$custom = time()-60*60*7;
$date = $custom;
//$dt = new DateTime("@$custom");
//$date = ltrim($dt->format('m/d/Y'),0);

$insignia = "~";
$payment=0;
$member = "W";
$paid=0;
$event="2024Pigout";



toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);



$subject = "Pigout Signup ($fname $lname) ---";
$email = "santaclarawebmaster@gmail.com";
$message = "Pigout 2024 $fname $lname signup";


// Thanks for Signing up!
	echo "<script>alert('$message');</script>";
	echo('
	<script >
		window.setTimeout(function() {
					window.location.href="./signup_free.phtml";
			}, 500);
	</script>
	');

// Thanks for Signing up!

phpemailer($subject, $message , "tennis.mutt@gmail.com",$email);



?>