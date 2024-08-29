<?php

include "../library/include.inc";
include "../library/dbevent.inc";

include "../library/email/email.inc";

$theTABLE = "ladder";

$email = $_POST["email1"];

$con = DBMembership();

$query = "select * from $theTABLE where email1=\"$email\"";


$qr  = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($qr);

$found=0;
$gender="-";
if( isset( $row)  ){
    $found=1;
    $gender = $row["gender1"] ;
}else{
    echo( "<center>"  );
    echo( "<h2>$email not found </h2>"  );
    echo( "</center>"  );
}

$division="Men";
$title = "Men's Singles Participants";
if( $gender=="F") {
    $division="Womyn";
    $title = "Women's Singles Participants";
}

if($found ){
    $query = "select * from $theTABLE where division=\"$division\" ";
    $qr=mysqli_query($con,$query);

    echo ("<center>");
    echo("<h1>$title</h1><p>");

    while( $row = mysqli_fetch_assoc($qr)){

        echo("<h2>");
        echo $row["fname1"]." ".$row["lname1"]." ". $row["email1"]."<br>";
        echo("</h2>");
    }
    echo ("</center>");
    
}





?>