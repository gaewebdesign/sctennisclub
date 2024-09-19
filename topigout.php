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
$retv = CAPTCHA_CHECKOUT();
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
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

//$res = checkCAPTCHA() ;
//$retv = CAPTCHA_CHECKOUT();

//if($retv==true)
toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
/*
else{
     echo("cannot do it");
     return;
}
*/

//toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){

//sendemail($fname." ".$lname, $email, "sctennisclub.org => $theTABLE ");

$subject = "Pigout Signup ($fname $lname) ---";
$email = "santaclarawebmaster@gmail.com";
$message = "Pigout 2024 $fname $lname signup";

  phpemailer($subject, $message , "tennis.mutt@gmail.com",$email);

// Completely Automated Public Turing Test to tell Computers and Humans Aparat
function checkCAPTCHA() {

    // Checking valid form is submitted or not 
if (isset($_POST['SubmitButton'])) { 
	
	// Storing name in $name variable 
	$name = $_POST["fname"]."  " .$_POST["lname"]; 
	
	// Storing google recaptcha response 
	// in $recaptcha variable 
	$recaptcha = $_POST['g-recaptcha-response']; 

	// Put secret key here, which we get 
	// from google console 
	$secret_key = '6LdoCf4pAAAAAArgp6FUOA7Rn0j7_Jle-2dL-cUF'; 

	// Hitting request to the URL, Google will 
	// respond with success or error scenario 
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
		. $secret_key . '&response=' . $recaptcha; 

	// Making request to verify captcha 
	$response = file_get_contents($url); 

	// Response return by google is in 
	// JSON format, so we have to parse 
	// that json 
	$response = json_decode($response); 

	// Checking, if response is true or not 
	if ($response->success == true) { 
        
        echo '<script>alert("Summer 2024 \nSanta Clara Tennis Club \n Pigout  \nYou\'re signed up!")</script>'; 
        return true;
	} else { 
		echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
        return false;
	} 
} 








}

?>