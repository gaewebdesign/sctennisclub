<?php
include "../library/include.inc";
include "../library/paypal.inc";
include "../library/emailer.php";
include "../library/email/email.inc";

$fname = "Roger";
$lname = "Okamoto";
$address = "380 Santa Cruz Ave";
$email   = "sctc@sctennisclub.org";


$subject= "2025 Waitlist Cron Job ( $fname $lname)";
$message = "CRON Waitlist Check<br> ";
$message .= "$fname $lname <br>$address<br>$email <br>";
$recipient = "mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "south@sctennisclub.org");


echo ("sending $subject");
?>