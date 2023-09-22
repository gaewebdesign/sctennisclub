

<?php

include "../library/include.inc";


TEXT("POST DATA  received at sctennisclub.net ");
TEXT("enumerate keys **************");


foreach ($_POST as $key => $value) {
 TEXT(" $key  ----> $value");
}

 
 
$year=$_POST["year"];
$fname = $_POST["fname"];

 
$lname =  $_POST["lname"];
$email = $_POST["email"];

$gender =  $_POST["gender"];
$ntrp =  $_POST["ntrp"];

$address =  $_POST["address"];
$city = $_POST["city"];
$zip =  $_POST["zip"];

$phone= $_POST["phone"];


$mtype = $_POST["mtype"];

$date = $_POST["custom"];
$insignia=$_POST["insignia"];
$payment= $_POST["payment"];

$custom =  $_POST["custom"];

$opt =  $_POST["opt"];
$user = "-usr-";
$pwd = "-pwd";

$team="CalBear";

LOGGER("toMemberDB ".TABLE_GGTC_PENDING);

/*
function toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event){

function toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event){

function toMemberDB($theTABLE, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team, $mtype,$date,$insignia,$payment,$custom,$opt)
{
function toMemberDB($theTABLE, $year,$fname,$lname,$address,$city,$zip,$phone,$email,$gender,$ntrp,$payment,$mtype,$date,$insignia,$custom,$user,$pwd)

*/

TEXT("calling toMemberDB ".TABLE_GGTC_PENDING);

toMemberDB(TABLE_GGTC_PENDING,$year, $fname,$lname,$address,$city,$zip,$phone,$email,$gender,$ntrp,$payment,$mtype,$date,$insignia,$custom,$user,$pwd);


?>