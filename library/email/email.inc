<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer\Exception;

$subject = "USTA Team/Captain Signup";

$message = "Thanks for registering your USTA team.<br/>  The board will meet and discuss the approval of teams.";
$message .=  "<p>";
$message .= "For more information, or questions contact the USTA Coordinator at <br/>";

$message .= "at ustarep@sctennisclub.org";
$message .=  "<hr/>";

$message .=  "Alice Isaacson <br/>";
$message .=  "USTA Coordinator <br/>";
$message .=  "Santa Clara Tennis Club";


//emailer( $subject, $message );


function phpemailer($_SUBJECT, $_MESSAGE ,$_TOEMAIL ="mns.mutt@gmail.com", $_TOEMAIL2="south@sctennisclub.org"){

    require 'vendor/autoload.php';

$mail = new PHPMailer(exceptions: true);

try {

 //     $mail->SMTPDebug = 2;
      $mail->Username = "webmaster@sctennisclub.org";

      $mail->Password = "webmaster.3722";
      $mail->SMTPSecure = 'tls';

      $mail->Port = 587;      
      $mail->setFrom( "webmaster@sctennisclub.org" , "Santa Clara Tennis Club" ) ; 
      
 //   $mail->setFrom( "tennis.mutt@sctennisclub.org" , "Santa Clara Tennis Club" ) ; 

//    $mail->setFrom( $_FROMEMAIL , $_FROMNAME ) ; 

      $mail->addAddress( $_TOEMAIL ) ; 
      $mail->addAddress( $_TOEMAIL2 ) ; 

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
