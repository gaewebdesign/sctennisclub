<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";

//print_r($_POST);
echo "<center>";
echo "<p><br>";
//echo "<h3>";

//print_r( $_POST );
$theYear = YEAR;
$dest = TABLE_PAYPAL;
$source = TABLE_WAITLIST;
$destination = TABLE_TEMPORARY;

if( false == isset($_POST["_id"])  ){
    echo("Select someone from waitlist table <br>");
    return;
}
   

if ( ResidentMajority(YEAR) != true){
    echo("ResidentMajority is false cannot add to membership (disabled)<br> ");
//    return;

}

//print_r("$_POST");
$con = DBMembership();
$theTable= TABLE_WAITLIST;
foreach ($_POST["_id"] as $key => $value){  
    $query = "select * from $theTable where _id = $value";
    $qr=mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($qr);

    $_id = $row["_id"];
    $fname = $row[FNAME];
    $lname = $row[LNAME];
    $mtype = $row[MTYPE];
    $address = $row[ADDRESS];
    $custom = $row[CUSTOM];
    $email = $row[EMAIL];

    if( $custom == "done" ){
        echo( "skipping over $fname $lname , already done <br>" );
        continue;
    }

    echo "<p>";
    echo "COPYING from $source to $destination <br/>";
    echo "$fname $lname $address $mtype $email<br/>";
    copyto( $source, $destination, $custom);

// SEND EMAIL TO PLAYER  ************************************
    $subject= "$theYear Santa Clara Tennis Club( $fname $lname)";
    $message = "";
    $message .= notifyplayer($fname, $lname);

    echo($message);

    LOGS("cronwait.php: moving from $src to $dest ");
    phpemailer($subject,$message , $email, $south);

// ********************************************************

//  $query = "update $theTable set trust =$trust where  _id=$_id";
 
    //  $qr=mysqli_query($con,$query);

}
echo "</center>";
echo "</h3>";


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
        $retv.=  "<h4></h4>";
        $retv.=  "<h4>Santa Clara Tennis Club</h4>";
        $retv.=  "</tr>";
        $retv.=  "</table>";
    
        $retv.=  "<p>";
        $retv.=  "<p>";
    
        $retv.=  "</body>";
        $retv.=  "</html>";
    
        return $retv;
    
    }
?>