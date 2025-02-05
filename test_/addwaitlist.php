<?php
include "../library/include.inc";
include "../library/paypal.inc";
include "../library/emailer.php";
include "../library/email/email.inc";

date_default_timezone_set('America/Los_Angeles');
$year=YEAR;
$fname= "Alison";
$lname= "Anderson";
$email= "alison@gmail.com";
$address= "3040 Anza Street";
$mtype=  "NRSx";
$epoch= time();

$gender ="F";
$ntrp="4.5";
$city = "Santa Clara";
$zip = "95126";
$team = "Test Team";
$date = time();
$insignia = 1;
$payment = 33;
$custom = $date;
$opt = "test";
$pwd = password();
$event="-";

$dest = TABLE_PENDING;
$dest = TABLE_PAYPAL;

$dest = TABLE_WAITLIST;


toDB( $dest ,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);



$con = DBMembership();
$theYear=YEAR;
$query = "select * from $dest where year=$theYear order by date desc limit 10";

$qr=mysqli_query($con,$query);

while ($row = mysqli_fetch_assoc($qr)) {  
    $epoch = $row[CUSTOM];
    $fname = $row[FNAME];
    $lname = $row[LNAME];
    $email = $row[EMAIL];
    $address = $row[ADDRESS];
    $mtype = $row[MTYPE];

    echo(" $fname $lname $email $mtype $address  -- @ $epoch <br>");

}

return;

$subject= "2025 Waitlist Cron Job ( $fname $lname)";
$message = "CRON Waitlist Check<br> ";
$message .= "$fname $lname <br>$address<br>$email <br>";
$message .= "$mtype <br>$epoch <br>";
$recipient = "mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "south@sctennisclub.org");


echo ("<br>sending $message");

?>