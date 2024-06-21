<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$team = $_POST["team"];
$ntrp = $_POST["ntrp"];

$daytime="";
if (  isset($_POST["daytime"])  )
     $daytime = "y";

// Resident Captain
$rescaptain="NR";
if (  isset($_POST["rescaptain"]) ){
    LOGGER("$fname $lname is resident");
    $rescaptain="Res";
}else{
    LOGGER("$fname $lname is NOT resident");
}

// SCTC previous membership
$resprev="";
if (  isset($_POST["resprev"]) ) $resprev="y";

// Resident Count
$rescount = $_POST["rescount"];

$preference = $_POST[PREFERENCE] ;


echo('
<script >
    window.setTimeout(function() {
        window.location.href="./register.phtml";
    }, 20);
</script>
');


//if( $error == true) return;


$custom = time()-60*60*7;
$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;
$year=2024;

$theTABLE = TABLE_REGISTER;

//$date=1705711820;
$insignia=$preference;
$custom="";
$pwd="4pigs";


$res = checkCAPTCHA() ;
//$res = true;
if($res==true){
 //   toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
//    toRegisterDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
LOGGER( " toRegisterDB");
toRegisterDB($theTABLE, $fname,$lname,$team, $ntrp , $daytime , $email,$rescaptain,$resprev , $rescount, $year , $date, $insignia, $custom, $pwd);


}



$subject = "USTA Team Signup ($fname $lname) " ;
$message =  "$fname<p>";
$message .= "Thanks for registering your USTA team.<br/>  The board will meet and discuss the approval of teams.";
$message .=  "<p>";
$message .= "For more information, or questions contact the USTA Coordinator.<br/>";

$message .= "at ustainfo@sctennisclub.org";
$message .=  "<hr/>";

$message .=  "Alice Isaacson <br/>";
$message .=  "USTA Coordinator <br/>";
$message .=  "Santa Clara Tennis Club";


$message2 = "
<html>
<head>
<title>Rate Your Experience</title>
</head>
<body bgcolor = '#cae9f5'>
<center>

<p>
    <h2>$fname </h2>

    </p>
</center>
<center>
    <table>
    <tr>
    <td><h3>Thanks for registering your USTA Team. The board will meet and discuss the approval of teams.</h3></td>
    </tr>
    <tr>
    <td><h3>For more information or questions contact the USTA Coordinator at ustainfo@sctennisclub.org.</h3></td>
    </tr>
    <tr>
    <td><h3><hr/></h3></td>
    </tr>
    <tr>
    <td>
    <h3>Alice Isaacson <br/> USTA Coordinator <br/> Santa Clara Tennis Club
    </h3></td>
    </tr>
    </table>
</center>
</body>
</html>
";


phpemailer($subject, $message2 , "tennis.mutt@gmail.com",$email);


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
        
        echo '<script>alert("CAPTACHA verified - you\'re signed up!")</script>'; 
        return true;
	} else { 
		echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
        return false;
	} 
} 
}

?>