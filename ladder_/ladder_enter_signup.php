
<?php

include "../library/include.inc";
include "../library/dbevent.inc";

include "../library/email/email.inc";


$email1 = $_POST["email1"];

// SANITIZE EMAIL 
$email1 = htmlentities($email1);
if(filter_var($email1, FILTER_VALIDATE_EMAIL)) {
//    phpemailer($subject, $message ,$toemail1 , $toemail2);
    //Valid email!
}else{
     $message = "$email1  invalid\n";
//    phpemailer($subject, $message ,$toemail1 , $toemail2);
     $email1="invalid";
}
// SANITIZE EMAIL 


//$retv  = CHECK_EMAIL($email1) || ( str_contains($email1,".kitty") ? 1:0 ) ;
$retv  = CHECK_EXTRA_EMAIL($email1);

if ( isset($_POST['SubmitButton'])){
      if( $retv == false) {

         $message = "Email ($email1) not in membership. ";
         $message .= " Please sign up to SCTC to enter the ladder";
         $message .= " Email must be unique to enter the  ladder";
         


         MESSAGE_ALERT( $message);
         $url = "../ladder.phtml?mode=6";
         REDIRECT_ALERT( $url);
         return;
      }
}

/*
if ( isset($_POST['SubmitButton'])){

    if($_POST["secretcode"] != "queenbee" ){

        echo "<script>alert(\"Please Enter correct keyccode \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="../ladder.phtml?mode=6";
                 }, 100);
              </script>
                ');
		return;
    }


}
*/
// ************************************************* 

$res = CAPTCHA_CHECKOUT() ;
if($res != true) {

    echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
	 echo('
      <script >
      window.setTimeout(function() {
        window.location.href="../ladder.phtml?mode=6";
    }, 500);
       </script>
    ');

    return;
}


// ************************************************* 

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


$theTABLE = "ladder";

$date = "".time()-60*60*7;
$pwd = password($fname1,$lname1);

$fname2=$lname2=$email2=$gender2=$ntrp2="-";
$year=YEAR;
$team="";
$position=rand(1,20);
$points=rand(45,75);
$score="7-5";
$pwd="-";
$date=time()-60*60*7;
$custom=$date;

$con = DBMembership();
$query = "select avg(points) from $theTABLE where division regexp(\"$division\") ";
$qr= mysqli_query($con, $query);
$row = mysqli_fetch_assoc($qr);
$average = $row["avg(points)"];

$points = intval($average - $average/3.33);
if($points <50) $points=rand(60,120);

//echo("POINTS: $average $points");
$retval= checkDuplicateEmail($email1, $theTABLE);

if( $retval == 1 ){
   echo ("<center>");
   echo ("<h2>duplicate entry for $email1<h2>");
   echo ("</center>");
   return;
}


db_ladder($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,
$year,$division,$team,$position,$points,$score,$pwd,$date,$custom,$opt);


signedUP($fname1,$lname1,$email1,$division,$points );


$subject = "Ladder $division Signup ($fname1 $lname1 )";
$message = "$fname1  $lname1  Signup \n";
$message .= "$division";


$toemail1 = "mutt@sctennisclub.org";
$toemail2 = "south@sctennisclub.org";

phpemailer($subject, $message ,$toemail1 , $toemail2);


function checkDuplicateEmail($email1,$theTABLE){

   $con = DBMembership();
   $query ="select email1 from $theTABLE where email1=\"$email1\"";

   $qr = mysqli_query($con, $query);
   $row = mysqli_fetch_array($qr);

   if(isset($row))  return 1;
   return 0;

}
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


function signedUp( $fname1,$lname1,$email1,$division,$points){
 
   $ladder = "Men's Singles";
   if($division=="Womyn") $ladder = "Women's Singles";

    echo("<center>" );
    echo("<h1>Signed Up </h1> " );
    echo("<h2>");
    echo("$fname1 $lname1 <p> ");
    echo("$email1  <p> ");
    echo("Division: $ladder<p>");
    echo("Initial Points: $points");
    echo("</h2>");
    echo("</center>" );

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