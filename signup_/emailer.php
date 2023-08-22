<?php
/*
$NAME = "Roger Okamoto";
$EMAIL = "elon.muask@gmail.com";

$msg  = "Ice Social Signup <br>";
$msg .= $MAIL."<br>";

sendemail($NAME, $EMAIL, $msg);
*/

function sendemail( $NAME,$EMAIL,$msg){

$to = "santaclarawebmaster@gmail.com";    
$to = "notify@sctennisclub.org";

//echo ("SENDING EMAIL: $NAME $EMAIL $msg ");

$subject = "SCTC Ice Cream Mixer (".$NAME.")";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: membership@sctennisclub.org  \r\n";

$message = $msg."<br>";
$message .= "$NAME <br>";
$message .= "$EMAIL <br>";

//echo("sending email $to $subject  $message");

$r=mail($to,$subject,$message,$headers); 

//echo("results:" + $r );

}

?>