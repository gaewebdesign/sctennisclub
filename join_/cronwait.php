<?php
include "../library/include.inc";
include "../library/paypal.inc";
include "../library/emailer.php";
include "../library/email/email.inc";

$src = "waitlist"; //TABLE_WAITLIST;
$dest = "temporary";

$con = DBMembership();

$query = "select * from $src where custom != \"done\" order by date asc limit 1";
echo $query."<br>";

$qr=mysqli_query($con,$query);

$fname=$lname=$email=$address=$mtype= $epoch="";
while ($row = mysqli_fetch_assoc($qr)) {  
    $epoch = $row[CUSTOM];
    $fname = $row[FNAME];
    $lname = $row[LNAME];
    $email = $row[EMAIL];
    $address = $row[ADDRESS];
    $mtype = $row[MTYPE];

    echo("COPY $fname $lname $email $mtype   -- @ $epoch to $dest \n");
    LOGS("COPY $fname $lname $email $mtype   -- @ $epoch to $dest \n");

 //  copyto( $src, $dest, $epoch);

}

$subject= "2025 Waitlist Cron Job ( $fname $lname)";
$message = "CRON Waitlist Check<br> ";
$message .= "$fname $lname <br>$address<br>$email <br>";
$message .= "$mtype <br>$epoch <br>";
$recipient = "mutt@sctennisclub.org";
phpemailer($subject,$message , $recipient , "south@sctennisclub.org");

echo ("<br>sending $message");


?>