<?php


include "../library/include.inc";
include "../library/email/email.inc";

//$_GET["custom"] = 1675506456;;

//LOGGER("notify.php called custom:" + $_GET["custom"]);
//LOG_EMAIL("notify.php called  with custom:".$_GET["custom"]);



//LOGGER("notify.php called : _GET custom = " .$_GET["custom"]);
//LOGGER("notify.php called : _POST custom = " .$_POST["custom"]);
LOGGER("notify.php  Use _POST !!!! ******************");


LOGGER("notify.php: enumerate _GET array");
TEXT("notify.php: enumerate _GET array");
$message = "";
foreach ($_GET as $key => $value) {
   LOGGER("notify.php $key -> $value ");
   TEXT("notify.php $key -> $value ");
   $message .= "$key -> $value";
}



TEXT("notify.php: enumerate _POST array");
LOGGER("notify.php: enumerate _POST array");
foreach ($_POST as $key => $value) {
   LOGGER("notify.php $key -> $value ");
   TEXT("notify.php $key -> $value ");
}

//$_POST["custom"] = "1663988683";

$dest = TABLE_TEAMTENNIS;
$src = TABLE_TEAMTENNIS_PENDING;

$recipient = "rogie@sctennisclub.org";
$subject = "Team Tennis Subject";
$message = "sign-up";

//TEXT("sending message to $recipient");
//phpemailer($subject,$message , $recipient );
if( empty($_POST["custom"])){
   $subject= "2024 Team Tennis Test";
   $message = "within empty custom loop";
   $recipient = "teamtennis@sctennisclub.org";
   echo ("within empty custom loop");
   phpemailer($subject,$message , $recipient ,$recipient);

}   


if( !empty($_POST["custom"])){

   $epoch = $_POST["custom"];
   LOGGER("notify.php called  with POST custom: $epoch ");
   
   // copy over to mixer (paypal contents)
   LOGGER("notify.php saving TeamTennis info copyto_teamtennis $src -> $dest : $epoch " );

   copyto_teamtennis( $src, $dest, $epoch);

   //** SEND SIGN-UP NOTIFICATION */
   $con = DBMembership();
   $query = "select * from teamtennis where date = $epoch";
   $query_results=mysqli_query($con, $query);
   $row = mysqli_fetch_assoc( $query_results);
   $fname = $row["fname1"];
   $lname = $row["lname1"];
   $email = $row["email1"];
   $phone = $row["team"];
   $ntrp =  $row["gender1"].$row["ntrp1"];
   $subject = "2024 Team Tennis Signup";
   $rating = $gender.$ntrp;
   $message = $subject."<br>";
   $message .= "$fname $lname <br>$rating <br>$email <br>$phone ";
   $recipient = "teamtennis@sctennisclub.org";

   phpemailer($subject,$message , $recipient ,$recipient);

   //** SEND SIGN-UP NOTIFICATION */

/*
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
   */
  // SENDER( $data );

 
}

// using the 'custom' number (i.e. time() generated)
// this moves member from pending to mixer table
// and sends email to santaclarawebmaster@gmail.com
/*
echo("end of file");

$subject = "Team Tennis Signup ( end of code)";
$message = "sent to roger,roy";
$subject = "Team Tennis - Reached end of file with no errors";
phpemailer($subject, $message, "tennis.mutt@gmail.com","rrmolseed@gmail.com");

$subject = "Team Tennis Signup ( to roger,alice)";
$message = "sent to roger,alice";
phpemailer($subject, $message, "tennis.mutt@gmail.com","aliceisaacson@yahoo.com");

$subject = "Team Tennis Signup ( to teamtennis)";
$message = "to teamtennis alias";
phpemailer($subject, $message, "teamtennis@sctennisclub.org","teamtennis@sctennisclub.org");
*/
//EMAILER( $subject, $name, $verbose=true);
/*
                                                                                                                                                                                                                      |
insert into teamtennis (fname1,lname1,email1,ntrp1,fname2,lname2,email2,ntrp2,year,division,team,date,payment,custom,opt) select fname1,lname1,email1,ntrp1,fname2,lname2,email2,ntrp2,year,division,team,date,payment,custom,opt  from teamtennis_pending where custom=1663986031; 

*/
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