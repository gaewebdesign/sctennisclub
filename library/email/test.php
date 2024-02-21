<?php



use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer\Exception;

/*

https://www.geeksforgeeks.org/how-to-send-an-email-using-phpmailer/

*/

require 'vendor/autoload.php';

echo "ok";

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

      $mail->Subject = "Subject";      
      $mail->Body = "HTML message body in <b>BOLD </b>";

      $mail->send() ;      

 //   $mail-> = ;      


}catch(Exception $e){

    echo("message error: $email->ErrorInfo ");

}


?>