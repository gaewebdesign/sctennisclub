 

<?php

include "../library/include.inc";

$year = 2025;
$fname = "Kareem";
$lname = "Abdul-Jabbar";
$email = "jbbar@gmail.com";
$address = "Fabulous Forum";
$city = "Las Vegas";
$pwd = Password();
$mtype="RF";
$account = time();//"5552342233";
$count = 1;
$trust = 0;


toFamilyDB($year,$fname,$lname,$email,$address,$city,$pwd,$mtype,$account,$count,$trust);





?>