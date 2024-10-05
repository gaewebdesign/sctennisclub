<?php

include  "../library/include.inc";
//include "../library/email/email.inc";

LOGGER( "recordscore.php");


$winner_id = $_POST["winner_id"];
$loser_id = $_POST["loser_id"];
$score = $_POST["score"];
$email = $_POST["email"];

$division = $_POST["division"];
$gender = $_POST["gender"];
//$email = "volgab@yahoo.com";

LOGGER(  $winner_id );
LOGGER(  $loser_id );
LOGGER(  $score );
LOGGER(  $gender );
LOGGER(  $division  );
LOGGER(  $email );

$retv =  CHECK_LADDER_EMAIL($email,$gender);

if( $retv == true){
    LOGGER(  $email );
    LOGGER("match recorded");
    echo "yes";
}else{
    LOGGER( "not found  $email " );
    echo "no";
}


?>