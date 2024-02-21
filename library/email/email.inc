<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer\Exception;

$subject = "USTA Team/Captain Signup";


emailer($subject);

function emailer($_SUBJECT){

    require 'vendor/autoload.php';

$mail = new PHPMailer(exceptions: true);

try {

      $mail->SMTPDebug = 2;
      $mail->Username = "webmasterea@sctennisclub.org";
      $mail->Password = "webmaster.3722";
      $mail->SMTPSecure = 'tls';

      $mail->Port = 587;      
      $mail->setFrom( "webmaster@sctennisclub.org" , "Webmaster" ) ; 
      $mail->addAddress( "tennis.mutt@gmail.com" ) ; 
      
      $mail->isHTML( true);

      $mail->Subject = $_SUBJECT;      
      $mail->Body = "HTML message body in <b>BOLD </b>";

      $mail->send() ;      

 //   $mail-> = ;      


}catch(Exception $e){

    echo("message error: $email->ErrorInfo ");

}










}




?>
