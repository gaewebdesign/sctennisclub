<?php

function adder ($p)
 {
   return ',"'.$p.'"';
 }


/* 

     this used for either tournament or team tennis tables
     note that not all fields on here
     ie semis,score, etc are not known when the team or person is entered into the database

     insert into teamtennis(_id,fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,mtype,pwd,date,custom) 
     values (NULL,"2024","Roger","Okamoto","southbayntrp@gmail.com","Team Tennis","-","-","-","-","-","-","-","1724437177","","10","1724437177","0")

insert into teamtennis(_id,fname1,lname1,email1,gender1,ntrp1,year,division,team,date,custom) values

(NULL,"Roger","Okamoto","southbayntrp@gmail.com","-","-","","","","","","2024","","","1724445074","1724445074")

insert into teamtennis(_id,fname1,lname1,email1,gender1,ntrp1,year,division,team,date,custom,opt) 
values (NULL,"Roger","Okamoto","southbayntrp@gmail.com","M","3.0","2024","","15","","1724452148","1724452148","15")
*/

function dbteamtennis($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$year,$division,$team,$date,$custom,$opt){

  $con = DBMembership();
  
  $query = 'insert into '.$theTABLE.'(_id,fname1,lname1,email1,gender1,ntrp1,year,division,team,date,custom,opt)';
  
  $query .= ' values (NULL'.adder($fname1).adder($lname1).adder($email1).adder($gender1).adder($ntrp1);
  $query .= adder($year).adder($division).adder($team).adder($date).adder($date).adder($opt);
  $query .= ")";
  
  echo  $query;
  $query_results=mysqli_query($con, $query);
  
  
  }

function dbevent($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$pwd,$date){

$con = DBMembership();

$query = 'insert into '.$theTABLE.'(_id,fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,mtype,pwd,date,custom)';

$query .= ' values (NULL'.adder($fname1).adder($lname1).adder($email1).adder($gender1).adder($ntrp1);
$query .= adder($fname2).adder($lname2).adder($email2).adder($gender2).adder($ntrp2);
$query .= adder($year).adder($division).adder($team).adder($mtype).adder($pwd).adder($date);
$query .= adder(0);
$query .= ")";

echo  $query;
$query_results=mysqli_query($con, $query);


}


?>