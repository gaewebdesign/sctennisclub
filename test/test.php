<?php

function password($fname,$lname){
  $date = "".time()-60*60*7;
  $date = $date * rand(87 , 23123);
  $pass = substr($date,-3);

  $i=0;
  for($l='a' ; $l<='z' ; $l++)
     $letters[$i++] = $l;
  
     $p =  $letters[rand(0,25)];
     $p .=  $letters[rand(0,25)];
     $p .=  $letters[rand(0,25)];
  
  // Override using first names
     $fname = str_replace(' ', '', $fname);
     $lname = str_replace(' ', '', $lname);
     if( strlen($fname>3 && strlen($lname)>3 )){
        $q = rand(25, 313)%2==0 ? $fname : $lname;
  }


  return strtolower($p).$pass;

}

/*
fname   | varchar(50) | YES  |     | NULL    |                |
| lname   | varchar(50) | YES  |     | NULL    |                |
| email   | varchar(50) | YES  |     | NULL    |                |
| address | varchar(50) | YES  |     | NULL    |                |
| pwd     | varchar(50) | YES  |     | NULL    |                |
| mtype   | varchar(50) | YES  |     | NULL    |                |
| trust   | varchar(50) | YES  |     | NULL    |                |
| date
*/

//include "../library/include.inc";
function add ($p)
{
  return ',"'.$p.'"';
}

function trustDB($year,$fname,$lname,$email,$address,$pwd,$mtype,$trust,$date){
   $con = Config();
   $theTABLE = "residentfamily";
    
  $query = 'insert into '.$theTABLE.'(_id,year,fname,lname,email,address,pwd,mtype,trust,date) values';
  $query .= '(NULL'.add($year).add($fname).add($lname).add($email).add($address).add($pwd).add($mtype).add($trust).add($date);
  $query .= ")";

  echo $query.";\n";  
 // $qr=mysqli_query($con,$query);




}

function Config()
 {
          
        $HOST = "127.0.0.1";
        $USER = "root";      // on my localhost
        $PASSWORD = "tomato1349";
        $DB= "southb56_sctc";
           
        $con = mysqli_connect($HOST,$USER, $PASSWORD);

        if (!$con) {
                    echo("CONNECTION ERROR<br>");
                    die('Could not connect: ' . mysqli_connect_error());
                 }else{

                 }

                $ret = mysqli_select_db($con,$DB );
                if(!$ret){
                  echo( "mysqli_connect_error() = ");
                  echo( mysqli_connect_error() );
                  echo( "<br>");
                }

                return $con;
 }


$con= Config();
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

     /*

ERROR 1062 (23000): Duplicate entry '1112 Pomeroy ave.' for key 'trust.address'
ERROR 1062 (23000): Duplicate entry '779 Baylor Dr' for key 'trust.address'
ERROR 1062 (23000): Duplicate entry '3251 Loma Alta Drive' for key 'trust.address'
Query OK, 1 row affected (0.00 sec)

ERROR 1062 (23000): Duplicate entry '3032 Cameron Way' for key 'trust.address'

     */



   

?>