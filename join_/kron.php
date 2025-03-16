<?php
include "../library/include.inc";
include "../library/emailer.php";
include "../library/email/email.inc";

    LOGS("kron.php  calling croncapt.php ");
    $url = "http://www.sctennisclub.org/join_/croncapt.php";
    $subject = "kron.php calling $url";
    $message = "kron.php calling $url";
    $recipient = "south@sctennisclub.org";


    phpemailer($subject,$message , $recipient , "south@sctennisclub.org");

/*
CRON JOB 
php -q /home/southb56/sctennisclub.org/join_/croncurl2.php
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec( $ch);

//echo $response;


?>