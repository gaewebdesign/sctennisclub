<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";

//print_r($_POST);
echo "<center>";
echo "<p><br>";
echo "<h3>";

//print_r( $_POST );

if( false == isset($_POST["_id"])  ){
    echo("Select someone from waitlist table");
    return;
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

//  $query = "update $theTable set trust =$trust where  _id=$_id";
    $query = "copy query  where  _id=$_id";
    echo "$fname $lname $address $mtype <br/>";
    $source = TABLE_WAITLIST;
    $destination = TABLE_PAYPAL;
    echo "COPYING to $source from $destination <br/>";
//  $query = "update $theTable set trust =$trust where  _id=$_id";
 
    //  $qr=mysqli_query($con,$query);

}
echo "</center>";
echo "</h3>";


?>