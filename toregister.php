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

$fname = filter_var($fname,  FILTER_SANITIZE_STRING);
$lname = filter_var($lname,  FILTER_SANITIZE_STRING);

//$lname = mysql_real_escape_string($lname);

// check if already Santa Clara Tennis Club member

$retv = CHECK_EMAIL ($email);
if($retv == false){

    $message = "Email address ($email) not found in membership. ";
    $message .= "Captain must be a Santa Clara Tennis Club member. ";
    $message .= "If you signup to SCTC and we are unable to host your team,"; 
    $message .= "you may request a refund of your membership fee.";

    echo "<script>alert('$message');</script>";
//		window.location.href="./pigout";
	echo('
	<script >
		window.setTimeout(function() {
					window.location.href="./register.phtml";
			}, 500);
	</script>
	');

    return;

}
 

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
        window.location.href="./register";
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


$res = CHECK_CAPTCHA() ;

if($res==true){

    LOGGER( "toregister.php: CAPTCHA filled ");
    echo '<script>alert("You\'re registered - read your email for more information from \n Santa Clara Tennis Club")</script>'; 
    toRegisterDB($theTABLE, $fname,$lname,$team, $ntrp , $daytime , $email,$rescaptain,$resprev , $rescount, $year , $date, $insignia, $custom, $pwd);

}else{

    echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 

}
/*
if ($response->success == true) { 
        
    echo '<script>alert("You\'re registered - read your email for more information from \n Santa Clara Tennis Club")</script>'; 
    return true;
} else { 
    echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
    return false;
} 
*/







$subject = "USTA Team Signup ($fname $lname) " ;
$message =  "$fname<p>";
$message .= "Thanks for registering your USTA team.<br/>  The board will meet and discuss the approval of teams.";
$message .=  "<p>";
$message .= "For more information, or questions contact the USTA Coordinator.<br/>";

$message .= "at ustarep@sctennisclub.org";
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
    <td><h3>For more information or questions contact the USTA Coordinator at ustarep@sctennisclub.org.</h3></td>
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

// using Message 2
phpemailer($subject, $message2 , "ustarep@sctennisclub.org",$email);


?>