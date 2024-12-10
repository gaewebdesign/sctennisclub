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
    echo("Select something");
    return;
}
    

//print_r("$_POST");
$con = DBMembership();
$theTable="residentfamily";
foreach ($_POST["_id"] as $key => $value){  
    $query = "select * from $theTable where _id = $value";
    $qr=mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($qr);

    $_id = $row["_id"];
    $fname = $row[FNAME];
    $lname = $row[LNAME];
    $trust = $row["trust"];

    $query = "update $theTable set trust =$trust where  _id=$_id";
    $trust = $trust==0 ? 1:0;
    echo "$fname $lname ";
    echo "Changing trust to $trust <br/>";
    $query = "update $theTable set trust =$trust where  _id=$_id";
    $qr=mysqli_query($con,$query);

}
echo "</center>";
echo "</h3>";


?>