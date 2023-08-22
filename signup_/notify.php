<?php


include "includes.inc";

//$_GET["custom"] = 1675506456;;

DEBUG("notify.php called custom:" + $_GET["custom"]);
//LOG_EMAIL("notify.php called  with custom:".$_GET["custom"]);


if( !empty($_POST["custom"])){
   LOG_EMAIL("notify.php called  with POST custom:".$_POST["custom"]);
   $mixer = TABLE_MIXER;
   $pending = TABLE_MIXER_PENDING;
   $custom = $_POST["custom"];

 $con =  DBMembership();
 $query = "insert into ".$mixer;
 $query .= " select * from $pending where ";
 $query .= "custom=".'"'.$custom.'"';
 $qr=mysqli_query($con, $query );  
// insert into mixer select * from mixer_pending where custom=1675508027;
 //1675508726

 // check what was deposited
 $query = "select * from $mixer where custom = $custom";
 DEBUG($query);
 DEBUG("mysqli_query");
 
 $qr=mysqli_query($con, $query );  
 DEBUG("mysqli_query" ); 

 $row = mysqli_fetch_assoc($qr);
 DEBUG("row fetched");

   $epoch  = $row["custom"];
   date_default_timezone_set('America/Los_Angeles');

   $dt = new DateTime("@$epoch");
   $date =  $dt->format('m/d/Y H:i:s');

  // post to emailer
/*   
  $_POST["fname"] = $row["fname"];
   $_POST["lname"] = $row["lname"];
   $_POST["email"] = $row["email"];
   $_POST["event"] = $row["event"];
   $_POST["date"] = $date;
  */  
}

// using the 'custom' number (i.e. time() generated)
// this moves member from pending to mixer table
// and sends email to santaclarawebmaster@gmail.com

emailer(true);

function LOG_EMAIL($message){
   $to = "tennis.mutt@gmail.com";
   $subject = "LOGR: $message";

   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: membership@sctennisclub.org  \r\n";
 
   $r=mail($to,$subject,$message,$headers); 

}

function emailer($verbose=false)
{

   //$to = "santaclarawebmaster@gmail.com";
   $to = "notify@sctennisclub.org";
   
   $subject = "SCTC Mixer Signup ".$_POST["event"];

// Put Paypal POST values into message
   $message = "SCTC Mixer Notification: <br>";
   $message .= "Paypal Parameters <br>";
   foreach ( $_POST as $key => $value)
      $message .= $key." -> ".$_POST[$key]."<br>";


   $headers = 'From: memb@sctennisclub.org' . "\r\n" .
    'Reply-To: memb@sctennisclub.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Use this header
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: membership@sctennisclub.org  \r\n";

   $name = " - ";
   if( isset($_POST["fname"]) ){
     $name = " (".$_POST["fname"]." ".$_POST["lname"]." )";
   }

   $subject .= $name;
   //$subject .= "KEY = ".$_POST[CUSTOM];


   $r=mail($to,$subject,$message,$headers);
   if($verbose) echo("mail = $r ");

}

?>