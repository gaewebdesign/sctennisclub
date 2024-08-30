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

  
   if($found)
      emailtable($con,$theTABLE,$title, $division);



function emailtable($con, $theTABLE,$title,$division){
    // 
    echo ('<html>' );
    echo ('<style>');
    echo ('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
    echo ('</style>');
    
//    echo('<body>');
    echo("<center>");
    echo("<p><br>");
    echo("<h2>$title</h2");
    echo ("<p><hr>");


    echo('<table style="font-size: 24px">');
    
    echo ('<thead>');
    echo ('<tr>');
    echo ('<td>');

    echo ('</td>');
    echo ('</tr>');
    echo ('</thead>');

    $query = "select * from $theTABLE where division=\"$division\" ";
    $qr=mysqli_query($con,$query);


    while( $row = mysqli_fetch_assoc($qr)){
        echo("<tr>");
        echo("<td>");
        echo( $row["fname1"] );
        echo(" ");
        echo( $row["lname1"]);
        echo("<td>");
        echo( $row["email1"] );

    }

    echo ('</tbody> ');
    echo("</table>");


}



?>