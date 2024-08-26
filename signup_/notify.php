<?php


include "../library/include.inc";

//$_GET["custom"] = 1675506456;;

//LOGGER("notify.php called custom:" + $_GET["custom"]);
//LOG_EMAIL("notify.php called  with custom:".$_GET["custom"]);



LOGGER("notify.php called : _GET custom = " .$_GET["custom"]);
LOGGER("notify.php called : _POST custom = " .$_POST["custom"]);
LOGGER("notify.php  Use _POST !!!! ******************");


LOGGER("notify.php: enumerate _GET array");
//TEXT("notify.php: enumerate _GET array");
foreach ($_GET as $key => $value) {
   LOGGER("notify.php $key -> $value ");
//   TEXT("notify.php $key -> $value ");

}



//TEXT("notify.php: enumerate _POST array");
LOGGER("notify.php: enumerate _POST array");
foreach ($_POST as $key => $value) {
   LOGGER("notify.php $key -> $value ");
//   TEXT("notify.php $key -> $value ");
}

if( !empty($_POST["custom"])){

   $epoch = $_POST["custom"];
   LOGGER("notify.php called  with POST custom: $epoch ");
   
   $dest = TABLE_MIXER_PAYPAL;
   $src = TABLE_MIXER_PENDING;

   // copy over to mixer (paypal contents)
   LOGGER("notify.php saving Mixer information from pending to mixer copyto $src -> $dest : $epoch " );
// copyto_mixer( $src, $dest, $epoch );
   copyto( $src, $dest, $epoch);

   // notify email
   $data = array(
      'year' => YEAR,
      'fname' => "-",
      'lname' => "-",
      'custom' => $epoch,
      'src' => $src,
      'dest' => $dest,
      'subject' => "signup_/notify.php: $src to $dest (copyto paypal )",
      'message' => "signup_/notify.php: $src to $dest (copyto paypal )"
   );
   
   SENDER( $data );






 
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