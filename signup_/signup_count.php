<?php

include "../library/include.inc";

//$con = DBMembership();
$con = LocalConfig();
$d = 0;


$query = "select fname from mixer_paypal where date > $d ";

$qr=mysqli_query($con,$query);
$r = mysqli_num_rows($qr);

echo $r;
//function deadline( $deadline){


?>