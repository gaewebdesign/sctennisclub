<?php

include "../library/include.inc";

//$con = DBMembership();
$con = DBMembership();
$d = 0;


$cretaceous = strtotime('2025-5-5');
          
$epoch = strtotime('2025-3-30');
// Switch between tables here **************************

$query = "select * from ".TABLE_MIXER_PAYPAL."  where custom>$epoch and custom<$cretaceous order by fname asc";

$con = Configure();

$qr=mysqli_query($con,$query);
$r = mysqli_num_rows($qr);

echo $r;

//function deadline( $deadline){


?>