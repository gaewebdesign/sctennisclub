<?php


$url = "http://www.sctennisclub.com/sctcinfo.php";
$url = "https://www.sctennisclub.org/ustacheck.phtml";

$url = "https://www.sctennisclub.org/join_/cronwait.php";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec( $ch);

echo $response;


?>