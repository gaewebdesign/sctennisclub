<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$team = $_POST["team"];
$ntrp = $_POST["ntrp"];

$daytime="";
if (  isset($_POST["daytime"])  )
     $daytime = "y";

// Resident Captain
$rescaptain="NR";
if (  isset($_POST["rescaptain"]) ){
    LOGGER("$fname $lname is resident");
    $rescaptain="Res";
}else{
    LOGGER("$fname $lname is NOT resident");
}

// SCTC previous membership
$resprev="";
if (  isset($_POST["resprev"]) ) $resprev="y";

// Resident Count
$rescount = $_POST["rescount"];


//$password = $_POST['password'];
$password ="4pigs";




$error=false;
if($password=="4pigs"){
    echo "<script>alert('Thanks $fname $lname for registering!') </script>";
}else{
    echo "<script>alert('PASSWORD ERROR  $password ') </script>";
    $error = true;
}



echo('
<script >
    window.setTimeout(function() {
        window.location.href="./register.phtml";
    }, 100);
</script>
');

if( $error == true) return;


$custom = time()-60*60*7;
$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;

$theTABLE = TABLE_REGISTER;

//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);
//$fname = "Stacia";
//$lname = "Simmons";
//$team = "Mx";
//$ntrp = "8.0";

//$daytime="n";
//if($_POST["daytime"] == "y") $daytime="y";
//$lname .= $email;
//$email = "s.simmons@gmail.com";
//$rescaptain = "y";
//$resprev="y";
//$rescount=2;
$year=YEAR;
//$date=1705711820;
$insignia="";
$custom="";
$pwd="4pigs";

// change
toRegisterDB($theTABLE, $fname,$lname,$team, $ntrp , $daytime , $email,$rescaptain,$resprev , $rescount, $year , $date, $insignia, $custom, $pwd);

sendemail($fname." ".$lname, $email, "SCTENNISCLUB.NET TEST => $theTABLE ");



?>