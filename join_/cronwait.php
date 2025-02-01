<?php
include "../library/include.inc";
include "../library/paypal.inc";
include "../library/emailer.php";
include "../library/email/email.inc";

$src = "waitlist"; //TABLE_WAITLIST;
$dest = "temporary";
$theYear=YEAR;

$con = DBMembership();

$query = "select * from $src where custom != \"done\" order by date asc limit 1";
LOGS($query);

$mutt  = "mutt@sctennisclub.org";
$south = "south@sctennisclub.org";

$qr=mysqli_query($con,$query);
$nx = mysqli_num_rows($qr);
if( $nx == 0){

    $subject= "$theYear Waitlist Cron Job ";
    $message = "No one on waitlist";
    phpemailer($subject,$message , $south , $south );
    echo("cronwait.php:  no one on wait list");
    LOGS("cronwait.php:  no one on wait list");
//    return;
}else{

//   echo("cronwait.php:  $nx on wait list");
    LOGS("cronwait.php:  $nx on wait list");

}


if(ResidentMajority(YEAR) == false){
    $subject= "$theYear Waitlist Cron Job";
    $message = "Unable to move to waitlist (disabled)";
    phpemailer($subject,$message , $south , $south );
    LOGS("cronwait.php:  not enough space to make member");
//    return;
}else{

    LOGS("cronwait.php: space to move from waitlist");    

}


$fname=$lname=$email=$address=$mtype= $epoch="";
while ($row = mysqli_fetch_assoc($qr)) {  
    $epoch = $row[CUSTOM];
    $fname = $row[FNAME];
    $lname = $row[LNAME];
    $email = $row[EMAIL];
    $address = $row[ADDRESS];
    $mtype = $row[MTYPE];

//  echo("COPY $fname $lname $email $mtype   -- @ $epoch to $dest \n");
    LOGS("cronwait.php copy $fname $lname $email $mtype   -- @ $epoch to $dest \n");
}

 //   copyto( $src, $dest, $epoch);


$subject= "$theYear Santa Clara Tennis Club( $fname $lname)";
$message = "CRON Waitlist Check<br> ";
$message = "-";
//$message .= "$fname $lname <br>$address<br>$email <br>";
//$message .= "$mtype <br>$epoch <br>";

$message .= notifyplayer($fname, $lname);

echo($message);


LOGS("cronwait.php: moving from $src to $dest ");
phpemailer($subject,$message , $south , $south);


function notifyplayer($fname,$lname){

//    <th style="width:10%">Sel</th>
    $retv = "";
    $retv.= "<!DOCTYPE html>";
    $retv.= ('<body style="background-color:powderblue;"> ');
    $retv.=  "<table>";
    $retv.=  "<thead>";
    $retv.=  "<tr>";

    $retv.=  "<th style=\"width:10%\" > </th> ";
    $retv.=  "<th style=\"width:85%\" > </th> ";
    $retv.=  "<th style=\"width:5%\" > </th> ";

    $retv.=  "<tr>";
    $retv.=  "</thead>";
    $retv.=  "<tr><td><td>";
    $retv.=  "<h3>$fname $lname </h3><td>";
    
    $retv.=  "<tr><td><td>";
    $retv.=  "<h3>Welcome to Santa Clara Tennis Club</h3>";
    $retv.=  "<h4>You are an official SCTC member</h4>";

    $retv.=  "<h4>You may participate in all activities as a SCTC member</h4>";
    $retv.=  "<td></tr>";

    $retv.= "<tr><td><td>";
    $retv.=  "<h4>Including: </h4>";
    $retv.=  "</tr>";

    $retv.=  "<tr><td><td>";
    $retv.=  "<h4>USTA Teams: </h4>";

    $retv.=  "<h4>Friday night clinics: </h4>";
    $retv.=  "<h4>Saturday Mixers: including the free Pig-out</h4>";
    $retv.=  "<h4>The club singles ladder for men and women </h4>";
    $retv.=  "<h4>The end of year dinner</h4>";
    $retv.=  "</tr>";

    $retv.=  "</table>";

    $retv.=  "</body>";
    $retv.=  "</html>";

    return $retv;

}
?>