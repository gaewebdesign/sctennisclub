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

//echo("Submit $submitButton");


$error=false;
/*
if($password=="4pigs"){
    echo "<script>alert('Thanks $fname $lname for signing up!') </script>";
}else{
    echo "<script>alert('PASSWORD ERROR  $password ') </script>";
    $error = true;
}
*/
//if (isset($_POST['submit_btn'])) { 


echo('
<script >
    window.setTimeout(function() {
        window.location.href="./pigout";
    }, 500);
</script>
');

if( $error == true) return;




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

$res = checkCAPTCHA() ;

if($res==true)
toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

    //toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){

//sendemail($fname." ".$lname, $email, "sctennisclub.org => $theTABLE ");

$subject = "Pigout Signup ($fname $lname) ---";
$email = "santaclarawebmaster@gmail.com";
$message = "Pigout 2024 $fname $lname signup";
if($res==true)
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