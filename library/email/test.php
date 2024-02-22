<?php

include "email.inc";

// calling from email.inc"
$subject="testing phpemailer";

$recipient = "R";
$fname = "Roger";
$vac_id = "vac_id";

$message = "
<html>
<head>
<title>Rate Your Experience</title>
</head>
<body bgcolor = '#BEFBF0'>
<center>

<p>
    <h2>$fname </h2>

    </p>
</center>
<center>
    <table>
    <tr>
    <td><h3>Thanks for registering your USTA Team. The board will meet and discuss the approval of teams.</h3></td>
    </tr>
    <tr>
    <td><h3>For for information or questions contact the USTA Coordinator at ustainfo@sctennisclub.org.</h3></td>
    </tr>
    <tr>
    <td><h3><hr/></h3></td>
    </tr>
    <tr>
    <td>
    <h3>Alice Isaacson <br/> USTA Coordinator <br/> Santa Clara Tennis Club
    </h3></td>
    </tr>
    </table>
</center>
</body>
</html>
";
echo "sent";
//$message = "test message";

phpemailer($subject,$message , "tennis.mutt@gmail.com" , "tcygang@gmail.com");

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