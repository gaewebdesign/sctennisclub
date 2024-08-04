
<?php

include "../library/include.inc";
include "../library/email/email.inc";

// GRAB entire table


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

$theTABLE = "tourny";


$winner = $_POST["winner"];


$event = $gender1 = $ntrp1 = "-";
$gender2 = $ntrp2 = "-";

$team=$mtype=$date=$insignia=$payment=$custom=$opt=$pwd="";

//$division = $_POST["division"];

// RWO division isn't used
$division = "Mx9.0";  //$_POST["division"];

$winner_id = $_POST["winner"];
$loser_id = $_POST["loser"];
$score = $_POST["score"];

//print_r($_POST);

$year=2024;

$theTABLE = "tourny";

//$mtype= get_mtype($division);
if ($winner_id != $loser_id) {
reportScore($theTABLE,$division,$winner_id,$loser_id,$score);
}else{
   $con = DBMembership();
   $query = "select * from tourny where _id=$winner_id";
   $qr= mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($qr);
   $team = $row["fname1"]." ".$row["lname1"]."/";
   $team .= $row["fname2"]." ".$row["lname2"];

   echo("<center>");
   echo("<h1>ERROR: same teams</h1>");
   echo("<h1>$team</h1>");
   echo("</center>");
}


//enterTournament($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$pwd,$date );

//signedUP($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
/*
$subject = "Tournament $division Signup ($lname1 $lname2)";
$message = "$fname1  $lname1  $fname2 $lname2 Signup \n";
$message .= "$division";


$toemail1 = "tennis.mutt@gmail.com";
$toemail2 = "santaclarawebmaster@gmail.com";
*/
//phpemailer($subject, $message ,$toemail1 , $toemail2);

function reportScore($theTABLE,$division,$winner_id,$loser_id,$score){

    $con = DBMembership();

     $custom = get_custom($winner_id);
     $_id = $winner_id;
 
     $query1 = "update $theTABLE set payment=\"ERR\" where _id=$_id";     
     $query2 = "update $theTABLE set payment=\"ERR\" where _id=$_id";     
     $query3 = "update $theTABLE set custom=custom+1 where _id=$_id";     

     $_id = $winner_id;
     switch($custom){
         case 0:
            $query1 = "update $theTABLE set semis=\"semis\" where _id=$_id";
            $query2 = "update $theTABLE set score1=\"$score\" where _id=$_id";
         break;
         case 1:
            $query1 = "update $theTABLE set finals=\"finals\" where _id=$_id";
            $query2 = "update $theTABLE set score2=\"$score\" where _id=$_id";
         break;
         case 2:
            $query1 = "update $theTABLE set winner=\"winner\" where _id=$_id";
            $query2 = "update $theTABLE set score3=\"$score\" where _id=$_id";
         break;

         default:
         

     }

     echo("custom = $custom <br>");
     echo("$query1 <br>");
     echo("$query2 <br> ");
     echo("$query3  <br>");

     
          $query_results=mysqli_query($con, $query1);
          $query_results=mysqli_query($con, $query2);
          $query_results=mysqli_query($con, $query3);
         


   // Update Opponent  ***********************************************
   // just need to put LOSS in
    $_id = $loser_id;
    $custom = get_custom($loser_id);
    $query = "update $theTABLE set payment=\"ERR\" where _id=$_id";     
    $query=$query1=$query2="";
    switch($custom){
        case 0:
           $query1 = "update $theTABLE set semis=\"Loss\" where _id=$_id";
           $query2 = "update $theTABLE set custom=\"99\" where _id=$_id";
           break;
        case 1:
           $query1 = "update $theTABLE set finals=\"Loss\" where _id=$_id";
           $query2 = "update $theTABLE set custom=\"99\" where _id=$_id";
           break;
        case 2:
           $query1 = "update $theTABLE set winner=\"Loss\" where _id=$_id";
           $query2 = "update $theTABLE set custom=\"99\" where _id=$_id";
        break;

        default:
          echo("custom = $custom");


    }
    echo "custom = $custom <br>";
    echo $query1."<br>";
    echo $query2."<br>";

    $query_results=mysqli_query($con, $query1);
    $query_results=mysqli_query($con, $query2);

//    echo $query;
 
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

function get_custom($_id){

    $con = DBMembership();
    $query ="SELECT custom FROM tourny where _id=\"$_id\"";
    
    $qr = mysqli_query($con, $query);
    $row = mysqli_fetch_array($qr);
 
    $custom =  0; 
    if( is_array($row)) $custom =  $row[0]; 
 
    // return custom value whichi get increment after each win
    // 0: in quarterfinals (start)
    // 1: in semi-final
    // 2: in finals
    return $custom;

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
       if( strlen($fname1>3 && strlen($fname2)>3 )){
          $p = rand(25, 313)%2==0 ? $fname1 : $fname2;
    }


    return strtolower($p).$pass;

}

function enterTournament($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$pwd,$date){

    $con = DBMembership();

    $query = 'insert into '.$theTABLE.'(_id,fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,mtype,pwd,date)';
   
    $query .= ' values (NULL'.add($fname1).add($lname1).add($email1).add($gender1).add($ntrp1);
    $query .= add($fname2).add($lname2).add($email2).add($gender2).add($ntrp2);
    $query .= add($year).add($division).add($team).add($mtype).add($pwd).add($date);
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