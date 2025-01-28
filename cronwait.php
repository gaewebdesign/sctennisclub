<?php
include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";
include "./library/email/email.inc";

$fname = "Mr Jack";
$lname = "Reacher";
$address = "2300 Park St";
$email   = "sctc@sctennisclub.org";


$subject= "2025 Cron Job Waitlist from home directory";
$message = "CRON Wait List move to Paypal<br> ";
$message .= "Second version cronwait.php <br>";
$recipient = "mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "south@sctennisclub.org");



?>