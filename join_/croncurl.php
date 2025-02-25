<?php


$url = "http://www.sctennisclub.com/sctcinfo.php";
$url = "https://www.sctennisclub.org/ustacheck.phtml";

$url = "https://www.sctennisclub.org/join_/cronwait.php";

$sel = $_GET["sel"];
if($sel == 2){

    $url = "https://www.sctennisclub.org/join_/croncapt.php";

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