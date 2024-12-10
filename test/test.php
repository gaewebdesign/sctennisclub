<?php

include "../library/include.inc";



$con= LocalConfig();

$year =2024;
$fname = "Rog";
$lname =  "Ok";
$address = "20230 Rosario";
$pwd = "pwd231";
$mtype = "RF";
$email = "roger@gmail.com";
$count = 0;
$trust = 0;


residentfamilyDB($year,$fname,$lname,$email,$address,$mtype,$count,$trust);

/*
$query = "select * from paypal where mtype=\"RF\" and year>=2024";

//echo $query." \n";

$qr=mysqli_query($con,$query);
 while ($row = mysqli_fetch_assoc($qr)) {  

     $fname = $row["fname"];
     $lname = $row["lname"];
     $email = $row["email"];
     $mtype =$row["mtype"];
     $address =$row["address"];
     $year   =$row["year"];
     $pwd = password($fname, $lname);
     $trust=0;
     $date = time();
 //    echo("$fname , $lname,$mtype, $email $pwd,\n");
     
          if( $year==2024 and $lname=="Bell") continue;
          if($year==2024 and  $lname=="Isaacson") continue;
          if($year==2024 and  $fname=="Unjin" and $lname=="Choi") continue;
          if( $year==2024 and $lname=="Rachabathuni") continue;
          if( $year==2024 and $fname=="Nancy" and $lname=="Anderson") continue;

          trustDB($year,$fname,$lname,$email,$address,$pwd,$mtype,$trust,$date);
     }
*/
     /*

ERROR 1062 (23000): Duplicate entry '1112 Pomeroy ave.' for key 'trust.address'
ERROR 1062 (23000): Duplicate entry '779 Baylor Dr' for key 'trust.address'
ERROR 1062 (23000): Duplicate entry '3251 Loma Alta Drive' for key 'trust.address'
Query OK, 1 row affected (0.00 sec)

ERROR 1062 (23000): Duplicate entry '3032 Cameron Way' for key 'trust.address'

     */



   

?>