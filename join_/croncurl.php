<?php
include "../library/include.inc";
include "../library/emailer.php";
include "../library/email/email.inc";


$url = "http://www.sctennisclub.com/sctcinfo.php";
$url = "https://www.sctennisclub.org/ustacheck.phtml";

$url = "http://www.sctennisclub.org/join_/cronwait.php";

$sel = $_GET["sel"];
$subject= "croncurl.php sel = $sel";
$message = "calling croncapt.php \n<br>";
$recipient= "mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "south@sctennisclub.org");
if($sel == 2){

    LOGS("croncurl.php  calling croncapt.php ");
    $message = "calling croncapt.php: within sel=$sel if statement \n<br>";
    phpemailer($subject,$message , $recipient , "south@sctennisclub.org");
    $url = "http://www.sctennisclub.org/join_/croncapt.php";

    echo $url;
}

echo $url;
/*
CRON JOB 
php -q /home/southb56/sctennisclub.org/join_/croncurl.php

*/

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec( $ch);

echo $response;


?>