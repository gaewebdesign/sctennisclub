<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer\Exception;

$subject = "USTA Team/Captain Signup";
$to = "tennis.mutt@gmail.com";


$from_email = "mnscuo@gmail.com";
$from_name = "R Okamoto";

$message = "Thanks for registering your USTA team.<br/>  The board will meet and discuss the approval of teams.";
$message .=  "<p>";
$message .=  "<hr/>";
$message .=  "Santa Clara Tennis Club";

emailer( $subject, $message, "tcygang@gmail.com");
emailer( $subject." ******* ", $message );

function emailer($_SUBJECT, $_MESSAGE ,$_CCEMAIL ="mnscuo@gmail.com"){

    require 'vendor/autoload.php';

$mail = new PHPMailer(exceptions: true);

try {

      $mail->SMTPDebug = 2;
      $mail->Username = "webmasterea@sctennisclub.org";
//      $mail->Username = "santaclarawebmaster@gmail.com";
      $mail->Password = "webmaster.3722";
      $mail->SMTPSecure = 'tls';

      $mail->Port = 587;      
      $mail->setFrom( "webmaster@sctennisclub.org" , "Santa Clara Tennis Club" ) ; 
      
 //   $mail->setFrom( "tennis.mutt@sctennisclub.org" , "Santa Clara Tennis Club" ) ; 

//    $mail->setFrom( $_FROMEMAIL , $_FROMNAME ) ; 

      
      $mail->addAddress( "santaclarawebmaster@gmail.com" ) ; 
      $mail->addAddress( "tennis.mutt@gmail.com" ) ; 
      $mail->addAddress( $_CCEMAIL ) ; 

      $mail->isHTML( true);

      $mail->Subject = $_SUBJECT;      
      $mail->Body = $_MESSAGE;

      $mail->send() ;      

 //   $mail-> = ;      


}catch(Exception $e){

    echo("message error: $email->ErrorInfo ");

}










}




?>
