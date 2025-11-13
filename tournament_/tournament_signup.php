
<?php

include "../library/include.inc";
include "../library/tourny.inc";

include "../library/email/email.inc";

function CHECK_DOUBLES( $email1 , $email2 , $theTable, $division){

   if( CHECK_EXTRA_EMAIL($email1) != true ) {
      LOGGER( "ERR: $email1");
      return -1;
   
   }elseif ( CHECK_EXTRA_EMAIL( $email2) != true){
      LOGGER( "ERR: $email2");
      return -2;

   }elseif ( $email1 ==  $email2 ){
      LOGGER( "ERR: $email1 = $email2");      
      return -3;
   }
   
   // Check if email address already table ($theTable) for this division ($division)
   $con = DBMembership();

/*
      select count(1)  from tourny_fuyu  where email1="joe@gmail.usta";
*/

   
   $query = "select email1 from $theTable where ( email1 = \"$email1\" or email2=\"$email1\") and division=\"$division\" ";
   $qr = mysqli_query($con, $query);
   $n = mysqli_num_rows($qr);
   LOGS("tournament_signup: $query");
   LOGS("tournament_signup: $email1 num_row = $n ");
   if($n > 0 )   return -4;

   
// CHECK PLAYER 2
   $query = "select email2 from $theTable where ( email1 = \"$email2\" or email2=\"$email2\") and division=\"$division\" ";

   $qr = mysqli_query($con, $query);
   $n = mysqli_num_rows($qr);
   LOGS("tournament_signup: $query");
   LOGS("tournament_signup: $email2 num_row = $n ");
   if($n > 0 )   return -5;   
      

   LOGS("CHECK_DOUBLES returning true");
   return true;


}

$theTABLE = TABLE_TOURNY; // "tourny";
$division = $_POST["division"];

$year=YEAR;

$fname1 = $_POST["fname1"];
$fname2 = $_POST["fname2"];
$lname1 = $_POST["lname1"];
$lname2 = $_POST["lname2"];

$gender1 =$_POST["gender1"];
$gender2 =$_POST["gender2"];
$ntrp1 =$_POST["ntrp1"];
$ntrp2 =$_POST["ntrp2"];
$email1 = $_POST["email1"]; 
$email2 = $_POST["email2"]; 

$email1 = trim( $email1);
$email2 = trim( $email2);

$date = "".time()-60*60*7;
$pwd = password($fname1,$fname2);

$mtype= get_mtype($division);

$team="";
//$team=$insignia=$payment=$custom=$opt="";
//$event = "-";


if(filter_var($email1, FILTER_VALIDATE_EMAIL) == false) {
   $email1 = "invalid";
}

if(filter_var($email2, FILTER_VALIDATE_EMAIL) == false) {
   $email2 = "invalid";
}


    $retv = CHECK_DOUBLES($email1 , $email2 ,$theTABLE,$division);
LOGGER("retv = $retv");

$message = "";
switch( $retv){
      case -1:
           $message = "$email1 email not found for first player";
            break;
      case -2:
            $message = "$email2 email not found for second player";
            break;
      case -3:
            $message = "Emails ($email1) are the same";
            break;
      case -4:
            $message = "Email ($email1) already in $division draw";
            break;
      case -5:
            $message = "Email ($email2) already in $division draw";
            break;

     default:
            $retv = 5;
            $message = "good";

}

if( isset($_POST['Button'])  ){

    $toemail1 = "mnscuo@gmail.com";
    $subject = "tournament_signup.php _POST button set";
    $mssg = "ERROR: Possibly email error";
    phpemailer($subject, $mssg ,$toemail1 ); //, $toemail2);

    if ( $retv >0  ){  
   
      phpemailer($subject, $message." retv>0" ,$toemail1 ); //, $toemail2);
      
      LOGGER("email $email1 and $email2  found in db");
       enterTournament($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$pwd,$date );
       signedUP($theTABLE,$fname1,$lname1,$email1,$fname2,$lname2,$email2,$division );

       
   }else{
//    echo "<script>alert(\"Enter correct email \")</script>";
//      echo "<script>alert(\"$message\")</script>";
      echo ("<script>");
      echo("alert(\"$message\")");
      echo ("</script>");

      echo('
           <script >
                 window.setTimeout(function() {
                 window.location.href="../tournament.phtml?draw=4";
              }, 100);
           </script>
             ');

             return;
 }

}

/*


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
*/


$subject = "Tournament (mnscuo) $division Signup ($lname1 $lname2)";
$message = "$fname1  $lname1  $fname2 $lname2 Signup \n";
$message .= "$division";

$subject = "SCTC Register";
$message = " ";
$toemail1 = "mutt@sctennisclub.org";
$toemail2 = "south@sctennisclub.org";

$toemail = "register@sctennisclub.org";

phpemailer($subject, $message ,$register); //, $toemail2);

function get_mtype($division ){

   $con = DBMembership();
   $theTable = TABLE_TOURNY;
   $query ="SELECT MAX(mtype) FROM $theTable where division=\"$division\"";
   
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
 
   // echo $query;
    
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


//function signedUp($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){
   function signedUp($theTABLE,$fname1,$lname1,$email1,$fname2,$lname2,$email2,$division){
    
    echo("<body bgcolor=\"CAE9F5\" >");
    echo("<center>");
    echo("<h1>Signed Up </h1> " );
    echo("<h2><u>$division</u> <p>");
    echo("$fname1 $lname1   / $fname2 $lname2   <br>");
    echo("$email1           / $email2 <br>");
    echo("</h2>");
    echo("</center>");
    echo("</body>" );

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