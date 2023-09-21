<?php

// include "../library/include.inc";
function TEXT($t){
     echo($t."<br>");
}


if( !empty($_POST) )
foreach ($_POST as $key=> $value){

    TEXT("$key => $value ");

}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$custom = $_POST["custom"];

//$dt = new DateTime("@$custom");
//$date = ltrim($dt->format('m/d/Y '),0);

$to = "notify@sctennisclub.org";
$subject = $_POST["subject"];
$message = $_POST["message"];

$message .= "<br>POST Data <p>";
foreach ($_POST as $key=>$value){
    $message .= " $key => $value  <br>";
}


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: notify@goldengatetennisclub.org  \r\n";

$to = "notify@sctennisclub.org";
$to = "notify@goldengatetennisclub.org";
//$subject = "subject ---";
//$message = "message ---";

TEXT("receive.php sending to: $to subject: $subject message:$message");

$r=mail($to,$subject,$message,$headers);
TEXT("results = $r ");
/*
echo($r);
echo("<br>");

$headers = 'From: notify@sctennisclub.org' . "\r\n" .
'Reply-To: notify@sctenisclub.org' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

echo("send another email <br>");
$to = "notify@sctennisclub.org";
$subject = "SCTC Mixer Signup ($fname $lname $custom)";
$message = "Mixer signup $fname $lname $custom  signup";
$r=mail($to,$subject,$message,$headers);
echo($r);
echo("<br>");

echo($to);
echo("<br>");

echo($subject);
echo("<br>");

echo($headers);
echo("<br>");

*/



?>