<?php
include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";
include "./library/email/email.inc";

$fname = "Mr";
$lname = "Cron";
$address = "80 Main St";
$email   = "sctc@sctennisclub.org";


$subject= "2025 Cron Job ( $fname $lname)";
$message = "CRON <br> ";
$message .= "$fname $lname <br>$address<br>$email <br>";
$recipient = "mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "south@sctennisclub.org");



?>