<?php

include "email.inc";

// calling from email.inc"
$subject="testing phpemailer";
$message = "test message";
$recipient = "R";
$vac_title = "title";
$vac_id = "vac_id";

$message = "
<html>
<head>
<title>Rate Your Experience</title>
</head>
<body bgcolor = '#0000FF'>
<center>

<p>
    <h2>How well did '$recipient' do?</h2>
    <h4>Vacancy Title: '$vac_title'</h4>
    <h4>Vacancy ID: '$vac_id'</h4>
</P>
</center>
<center>
    <table>
    <tr>
    <td><h3>we are built on sharing your review with other people who may also want to use this service.</h3></td>
    </tr>
    <tr>
    <td><h3>Please take a minute to reflect on the level of service youve received.</h3></td>
    </tr>
    <tr>
    <td><h3>Your review is public - to other employers registered with Ahoy Employ.</h3></td>
    </tr>
    <tr>
    <td><h3>Should you have any concerns that you would prefer to share in private, please email us at info@website.ca and quote the Vacancy ID shown above.</h3></td>
    </tr>
    </table>
</center>
</body>
</html>
";


phpemailer($subject,$message);

/*
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer\Exception;


//https://www.geeksforgeeks.org/how-to-send-an-email-using-phpmailer/



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

*/
?>