
<?php

include "../library/include.inc";
include "../library/email/email.inc";

// GRAB entire table

define("TOURNAMENT_SECRET", "ok");

if ( isset($_POST['Button'])){

    if($_POST["secretcode"] != TOURNAMENT_SECRET ){

        echo "<script>alert(\"Enter correct keyccode \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="../tournament.phtml?draw=6";
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

// the $_POST values are from  multi-valued pulldown
// echo(" value= \"$_id $_mtype  $_disabled \" >");
$_w = explode(" ",$winner_id );
//print_r( $_w);
$winner_id=$_w[0];
$winner_mtype=$_w[1];
$winner_custom=$_w[2];

//echo("winner custom = $winner_custom " );

$_l = explode(" ", $loser_id);
$loser_id = $_l[0];
$loser_mtype = $_l[1];
$loser_custom = $_l[2];

/*
echo("EXPLODE: <br>");
print_r( $_w);
echo( "<br>");
print_r( $_l);
echo( "<br>");
*/
$score = $_POST["score"];

$winner_custom = (int)$winner_custom;
$loser_custom  = (int)$loser_custom;

//echo("winner_custom($winner_custom) <------> loser_custom($loser_custom) <br>");


$year=YEAR;

$theTable = TABLE_TOURNY;


$con = DBMembership();
$query = "select * from $theTable where _id=$winner_id";
$qr= mysqli_query($con, $query);
$row = mysqli_fetch_assoc($qr);
$winner_team = $row["fname1"]." ".$row["lname1"]." / ". $row["fname2"]." ".$row["lname2"];
$query = "select * from $theTable where _id=$loser_id";
$qr= mysqli_query($con, $query);
$row = mysqli_fetch_assoc($qr);
$loser_team = $row["fname1"]." ".$row["lname1"]." / ". $row["fname2"]." ".$row["lname2"];



//$mtype= get_mtype($division);
// ERROR CHECK if same team
if ($winner_id == $loser_id) {

   echo("<center>");
   echo("<h1>ERROR: same teams</h1>");
   echo("<h1>$winner_team</h1>");
   echo("</center>");
   return;
}



if( $winner_custom != $loser_custom){
 //  echo ("winner_custom($winner_custom)  != loser_custom($loser_custom)    ");
   echo("<center>");
   echo("<h3>WRONG ROUND:<p> $winner_team ($winner_mtype)<p>cant play <p>$loser_team ($loser_mtype) </h3>");
      echo("</center>");
      
      LOGGER("TOURNY: ROUND      : winner_custom ($winner_custom)  loser_custom ($loser_custom) ");   
      LOGGER( "TOURNY: WRONG ROUND: $winner_team ($winner_mtype) cant play $loser_team ($loser_mtype)   ");
      return;


}

// quarterfinal match means custom=0 .. no wins yet
if( $winner_custom ==0 || $loser_custom==0){

   //DEBUG("QF: $winner_custom  vs  $loser_custom" );
   $x=0;
    
   if(      between($winner_mtype,1,2) &&  between($loser_mtype,1,2) ){
      
   }else if( between($winner_mtype,3,4) &&  between($loser_mtype,3,4 )  ){

   }else if( between($winner_mtype,5,6) &&  between( $loser_mtype, 5,6)  ){

   }else if( between($winner_mtype,7,8) &&  between($loser_mtype, 7,8) ){

   }else{
      echo("<center>");
      echo("<h3>ERROR:<p> $winner_team ($winner_mtype)<p>cant play <p>$loser_team ($loser_mtype)<p>in the quarterfinals </h3>");
      echo("</center>");

      LOGGER("TOURNY quarters: ERROR $winner_team ($winner_id , $winner_mtype) cant play $loser_team ($loser_id,$loser_mtype) in the quarterfinals ");         
      LOGGER("tournament_reportscore.php: ---");
      return;
   }

   LOGGER("TOURNY quarters:  $winner_team ($winner_id,$winner_mtype) VS $loser_team ($winner_id,$loser_mtype) </h3>");         
   LOGGER("tournament_reportscore.php: ---");
   

}


// semi-final matches
if( $winner_custom ==1 || $loser_custom==1){

//   if( ($winner_mtype <=4 && $loser_mtype > 4) || ($winner_mtype>=4 && $loser_mtype<4) ){
    if( ($winner_mtype <=4 && $loser_mtype <= 4) || ($winner_mtype>=4 && $loser_mtype>=4) ){
      LOGGER("TOURNY semis: $winner_team($winner_id, $winner_custom) vs $loser_team($winner_id, $winner_custom)");

     }else{
     echo("<center>");
     echo("<h3>ERROR:<p> $winner_team <p>cant play <p>$loser_team <p>in the semi-finals </h3>");
     echo("</center>");

     LOGGER("TOURNY semis: $winner_team($winner_id, $winner_custom) cant play $loser_team($winner_id, $winner_custom) in the semi-finals");
     LOGGER("tournament_reportscore.php ---");   
     return;
  }


}


reportScore($theTable , $division,$winner_id,$loser_id,$score);
announceScore($winner_team , $loser_team,$score);
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
function between($x , $min,$max){
   if( $x>=$min && $x<=$max) return true;
   return false;

}

function announceScore($_w , $_l , $_s){
   echo("<html>");
   echo('<body style="background-color:powderblue;"> ');
   echo("<center>");
   echo("<h1>Score Report </h1>");
   echo("<h3>");
   echo("$_w");
   echo("</h3>");

   echo("<h3>vs</h3>");

   echo("<h3>");
   echo("$_l");
   echo("</h3>");
   
   echo("<h3>");
   echo("$_s");
   echo("</h3>");
   echo("</center>");
   echo("</html>");

}
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
            $query1 = "update $theTABLE set semis= \"semis\" where _id=$_id";
            $query2 = "update $theTABLE set score1= \"$score\" where _id=$_id";
         break;
         case 1:
            $query1 = "update $theTABLE set finals= \"finals\" where _id=$_id";
            $query2 = "update $theTABLE set score2= \"$score\" where _id=$_id";
         break;
         case 2:
            $query1 = "update $theTABLE set winner= \"winner\" where _id=$_id";
            $query2 = "update $theTABLE set score3= \"$score\" where _id=$_id";
         break;

         default:
         

     }

/*
     echo("custom = $custom <br>");
     echo("$query1 <br>");
     echo("$query2 <br> ");
     echo("$query3  <br>");
*/
     LOGGER("tournament_reportscore.php : at end ");
     LOGGER("TOURNY saving score: custom=$custom ");
     LOGGER("TOURNY saving score: $query1 ");
     LOGGER("TOURNY saving score: $query2 ");
     LOGGER("TOURNY saving sccore: $query3 ");

     
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
//          echo("custom = $custom");


    }
/*
    echo "custom = $custom <br>";
    echo $query1."<br>";
    echo $query2."<br>";
*/
    $query_results=mysqli_query($con, $query1);
    $query_results=mysqli_query($con, $query2);
    LOGGER("TOURNY: $query1 (UPDATE LOSER round to Loss");
    LOGGER("TOURNY: $query2 (UPDATE LOSER custom to 99");
    LOGGER("TOURNY: ---");

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
    $theTable = TABLE_TOURNY;
    $query ="SELECT custom FROM $theTable where _id=\"$_id\"";
    
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