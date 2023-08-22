<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

$error=false;
if($password=="4pigs"){
    echo "<script>alert('Thanks $fname $lname for signing up!') </script>";
}else{
    echo "<script>alert('PASSWORD ERROR  $password ') </script>";
    $error = true;
}



echo('
<script >
    window.setTimeout(function() {
        window.location.href="./signup.html";
    }, 100);
</script>
');

if( $error == true) return;


$custom = time()-60*60*7;
$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);

$theTABLE = "mixer_pending";

//echo ("INSERT $fname $lname $paid $date $custom");
toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);
sendemail($fname." ".$lname, $email, "SCTENNISCLUB.NET TEST => $theTABLE ");



?>