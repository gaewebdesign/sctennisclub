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
$retv= CHECK_YEMAIL( $email,YEAR);


if($retv == false){

	$subject = "$fname $lname ($email) tried to signup not in db";
    
	$message = "Email address ($email) not found in membership. ";
    $message .= "The Pigout is a members only event. ";
	$message .= "Please signup to Santa Clara Tennis Club";

	$me = "tennis.mutt@gmail.com";
	phpemailer($subject, $message , $me,$me);

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
$thePIGTABLE = TABLE_PIGOUT;

//echo ("INSERT $fname $lname $paid $date $custom");
$gender= $ntrp = $address=$city=$zip=$team=$mtype=$opt=$pwd = "" ;

$year = YEAR;
$custom = time()-60*60*7;
$date = $custom;
//$dt = new DateTime("@$custom");
//$date = ltrim($dt->format('m/d/Y'),0);

$insignia = "~";
$payment=0;
$member = "W";
$paid=0;
$event= PIGOUT_EVENT;//"Pig25";


try{

$qresult = toDB($thePIGTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

if( $qresult == false ){


     throw Exception;
}

$theTABLE = TABLE_MIXER_FREE;

toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

}catch( \Throwable $e){
	
	$message = "$email is already signed up ";
	echo "<script>alert('$message');</script>";
	echo('
	<script >
		window.setTimeout(function() {
					window.location.href="./signup_free.phtml";
			}, 250);
	</script>
	');	
    $subject=$message;
	phpemailer($subject, $message , "tennis.mutt@gmail.com","tennis.mutt@gmail.com");

	exit();
}


$subject = "Pigout 2025 Signup ($fname $lname) ---";
$email = "santaclarawebmaster@gmail.com";
$message = "$fname $lname signed up for the Pigout";


// Thanks for Signing up!
	echo "<script>alert('$message');</script>";
	echo('
	<script >
		window.setTimeout(function() {
					window.location.href="./signup_free.phtml";
			}, 250);
	</script>
	');

// Thanks for Signing up!

phpemailer($subject, $message , "tennis.mutt@gmail.com",$email);



?>