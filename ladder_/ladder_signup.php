
<?php

include "../library/include.inc";
include "../library/dbevent.inc";

include "../library/email/email.inc";


if ( isset($_POST['Button'])){

    if($_POST["secretcode"] != "queenbee" ){

        echo "<script>alert(\"Enter correct keyccode \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="../tournament.phtml?draw=4";
                 }, 100);
              </script>
                ');
		return;
    }
//   echo "POST VALUES";
//   print_r($_POST);
//   print_r($_GET);

}


if( !isset($_POST['fname1'] )) {
   echo ("spammer");
   return;
}

$theTABLE = "tourny";


$fname1 = $_POST["fname1"];
$lname1 = $_POST["lname1"];
$email1 = $_POST["email1"];
$event = $gender1 = $ntrp1 = "-";
$gender2 = $ntrp2 = "-";

$team=$mtype=$date=$insignia=$payment=$custom=$opt=$pwd="";

//$division = $_POST["division"];

$gender1 =$_POST["gender1"];
$ntrp1 =$_POST["ntrp1"];

$division = "Womyn";
if($_POST["gender1"] == "M") $division = "Men";

$year=2024;

$theTABLE = "ladder";

$date = "".time()-60*60*7;
$pwd = password($fname1,$lname1);

$fname2=$lname2=$email2=$gender2=$ntrp2="-";
$year=2024;
$team="";
$position=rand(1,20);
$points=rand(45,75);
$score="7-5";
$pwd="-";
$date=time()-60*60*8;
$custom=$date;


db_ladder($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,
$year,$division,$team,$position,$points,$score,$pwd,$date,$custom,$opt);

//enterTournament($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$pwd,$date );


//signedUP($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);


$subject = "Tournament $division Signup ($lname1 )";
$message = "$fname1  $lname1  Signup \n";
$message .= "$division";


$toemail1 = "tennis.mutt@gmail.com";
$toemail2 = "santaclarawebmaster@gmail.com";

phpemailer($subject, $message ,$toemail1 , $toemail2);

function get_mtype($division ){

   $con = DBMembership();
   $query ="SELECT MAX(mtype) FROM tourny where division=\"$division\"";
   
   $qr = mysqli_query($con, $query);
   $row = mysqli_fetch_array($qr);

   $mtype =  0; 
   if( is_array($row)) $mtype =  $row[0]; 

   // return one higher than the current mtype
   return $mtype+1;


}

function password($fname1,$fname2){
    $date = "".time()-60*60*7;
    $pass = substr($date,-3);

    $i=0;
    for($l='a' ; $l<='z' ; $l++)
       $letters[$i++] = $l;
    
       $p =  $letters[rand(0,25)];
       $p .=  $letters[rand(0,25)];
       $p .=  $letters[rand(0,25)];
    
    // Override using first names
/*
    $fname1 = str_replace(' ', '', $fname1);
       $fname2 = str_replace(' ', '', $fname2);
       if( strlen($fname1>3 && strlen($fname2)>3 )){
          $p = rand(25, 313)%2==0 ? $fname1 : $fname2;
    }
*/

    return strtolower($p).$pass;

}

function enterTournament($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$pwd,$date){

    $con = DBMembership();

    $query = 'insert into '.$theTABLE.'(_id,fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,mtype,pwd,date,custom)';
   
    $query .= ' values (NULL'.add($fname1).add($lname1).add($email1).add($gender1).add($ntrp1);
    $query .= add($fname2).add($lname2).add($email2).add($gender2).add($ntrp2);
    $query .= add($year).add($division).add($team).add($mtype).add($pwd).add($date);
    $query .= add(0);
    $query .= ")";
 
 
    $query_results=mysqli_query($con, $query);

 
 }

function toTournyDB($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){

   $con = DBMembership();

   $query = 'insert into '.$theTABLE.'(_id,fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,mtype,date,insignia,payment,custom,opt,pwd)';
  
   $query .= ' values (NULL'.add($fname1).add($lname1).add($email1).add($gender1).add($ntrp1);
   $query .= add($fname2).add($lname2).add($email2).add($gender2).add($ntrp2);
   $query .= add($year).add($division).add($team).add($mtype).add($date);
   $query .= add($insignia).add($payment).add($custom).add($opt).add($pwd);
   $query .= ")";

//   LOGGER( $query );
//   echo "<p>";
//   echo $query;

   $query_results=mysqli_query($con, $query);

}


function signedUp($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){


    echo("<h1>Signed Up </h1> " );
    echo("<h3>");
    echo("$fname1 $lname1   / $fname2 $lname2   $division");
    echo("</h3>");


}
?>

<!--
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| _id      | int         | NO   | PRI | NULL    | auto_increment |
| fname1   | varchar(31) | YES  |     | NULL    |                |
| lname1   | varchar(31) | YES  |     | NULL    |                |
| email1   | varchar(50) | YES  |     | NULL    |                |
| gender1  | char(1)     | YES  |     | NULL    |                |
| ntrp1    | varchar(5)  | YES  |     | NULL    |                |
| fname2   | varchar(31) | YES  |     | NULL    |                |
| lname2   | varchar(31) | YES  |     | NULL    |                |
| email2   | varchar(50) | YES  |     | NULL    |                |
| gender2  | char(1)     | YES  |     | NULL    |                |
| ntrp2    | varchar(5)  | YES  |     | NULL    |                |
| year     | varchar(40) | YES  |     | NULL    |                |
| division | varchar(31) | YES  |     | NULL    |                |
| team     | varchar(31) | YES  |     | NULL    |                |
| mtype    | varchar(31) | YES  |     | NULL    |                |
| date     | int         | YES  |     | NULL    |                |
| insignia | varchar(7)  | YES  |     | NULL    |                |
| payment  | varchar(16) | YES  |     | NULL    |                |
| custom   | varchar(31) | YES  |     | NULL    |                |
| opt      | varchar(31) | YES  |     | NULL    |                |
| pwd      | varchar(31) | YES  |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
21 rows in set (0.00 sec)

-->