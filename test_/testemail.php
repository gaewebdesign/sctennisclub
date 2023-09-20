<?php

include "../library/include.inc";

echo("test email<br>");

$to = "tennis.mutt@gmail.com";
$subject = "subject test email";
$message = "mymessage";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: membership@sctennisclub.org  \r\n";

echo("to $to");
echo("<br>");

echo($subject);
echo("<br>");

echo($headers);
echo("<br>");

$r=mail($to,$subject,$message,$headers);
echo($r);
echo("<br>");

$headers = 'From: membership@sctennisclub.org' . "\r\n" .
'Reply-To: membership@sctennisclub.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

echo("send another email <br>");
$to = "notify@sctennisclub.org";

$r=mail($to,$subject,$message,$headers);
echo($r);
echo("<br>");

echo($to);
echo("<br>");

echo($subject);
echo("<br>");

echo($headers);
echo("<br>");





?>
