
TEST php commands to insert into register table

<?php


$fname = "Sammi";
$lname = "Systrom";

$team = "M";
$ntrp = "4.0";

$daytime = "N";

$email = "sammi@gmail.com";

$rescaptain = "y";
$resprev= "y";
$rescount = 5;

$year = 2024;
$date = 23332323;

$insignia = "-";
$custom = "*";
$pwd = "$";


include "../library/include.inc";

$theTABLE = "register";

toRegister($theTABLE, $fname,$lname,$team, $ntrp , $daytime , $email,$rescaptain,$resprev , $rescount, $year , $date, $insignia, $custom, $pwd);

function toRegister($theTABLE, $fname,$lname,$team, $ntrp , $daytime , $email,$rescaptain,$resprev , $rescount, $year , $date, $insignia, $custom, $pwd)

{
  

   $con = DBMembership();

   $query = 'insert into '.$theTABLE.'(_id,fname,lname,team,ntrp,daytime,email,rescaptain, resprev, rescount,year,date,insignia,custom,pwd) values';

   $query .= '(NULL'.add($fname).add($lname).add($team).add($ntrp).add($daytime).add($email).add($rescaptain).add($resprev).add($rescount);
   $query .= add($year).add($date).add($insignia).add($custom).add($pwd);
   $query .= ")";

   LOGGER($query);
   print("\r\n".$query."\r\n");


  $query_results=mysqli_query($con, $query);
  
  //$query = "update $theTABLE set insignia = insignia +1 where date = $custom";
  $query_results=mysqli_query($con, $query);

} 



?>