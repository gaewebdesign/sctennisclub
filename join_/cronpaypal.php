<?php

$url = "https://www.sctennisclub.org/join_/cronwait.php";

//$sel = $_GET["sel"];


$url = "https://www.sctennisclub.org/join_/croncapt.php";
$url = "http://localhost:/~ro/join_/cronpay.php";


/*
CRON JOB 
php -q /home/southb56/sctennisclub.org/join_/croncurl.php

*/
// set post fields
$post = [
//    'username' => 'user1',
//    'password' => 'passuser1',
    'custom'   => 1,
    'item_name' => "SCTC 2026 Membership",
    'item_number' => "Ted Cruiz",
    'residence_country' => "US"
    

];
/*
curl -v -H "Content-Type: application/json" -X POST \
     -d '{"custom":"232425"}' http://www.sctennisclub.org/join_/notify.php
*/

//  application/x-www-form-urlencoded
/*

curl -v -H "Content-Type: application/x-www-form-urlencoded" -X POST \
     -d '{"custom":"232425"}' http://www.sctennisclub.org/join_/notify.php
*/


//$ch = curl_init();
$url = 'http://sctennisclub.org/join_/notify.php';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

//curl_setopt($ch, CURLOPT_URL, $url);

//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec( $ch);

echo "response: $url";
echo $response;


?>