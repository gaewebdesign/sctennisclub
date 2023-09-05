<?php


include "../library/include.inc";

//$_GET["custom"] = 1675506456;;

//LOGGER("notify.php called custom:" + $_GET["custom"]);
//LOG_EMAIL("notify.php called  with custom:".$_GET["custom"]);



LOGGER("notify.php: custom = " .$_GET["custom"]);


$epoch = $_GET["custom"];
if( !empty($_GET["custom"])){

   LOGGER("notify.php called  with GET custom: $epoch ");
   
   $dest = TABLE_MIXER;
   $src = TABLE_MIXER_PENDING;

   // copy over to mixer (paypal contents)
   LOGGER("notify.php copyto $src -> $dest : $epoch " );
   copyto( $src, $dest, $epoch );
 
}

// using the 'custom' number (i.e. time() generated)
// this moves member from pending to mixer table
// and sends email to santaclarawebmaster@gmail.com
$subject = "Mixer";
$name = "Capt Kirk";

TEXT("EMAILER");
EMAILER( $subject, $name, $verbose=true);

//emailer(true);

function LOG_EMAIL($to , $message){
   $to = "tennis.mutt@gmail.com";
   $subject = "LOGR: $message";

   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: membership@sctennisclub.org  \r\n";
 
   $r=mail($to,$subject,$message,$headers); 

}



?>