
<?php

include "../library/include.inc";
include "../library/dbevent.inc";

include "../library/email/email.inc";

// GRAB entire table
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$mode=2;            // Mens ladder
$gender="M";
if( str_contains($_POST["draw"] ,"o")  ) {
    $mode =3;  // Womyns ladder
    $gender="F";
}
$email = $_POST["secretcode"];

if ( isset(  $_POST['Button']  )   ){
    
    $retv  = CHECK_LADDER_EMAIL($email , $gender);
    
    if( $retv == false ){
      $message = "Email ($email) not in ladder. ";
      $message .= " Please sign up to SCTC and  enter the ladder";
      MESSAGE_ALERT( $message);
      $url = "../ladder.phtml?mode=$mode";

      REDIRECT_ALERT( $url);

      $MESSAGE = "<script>";
      $MESSAGE .= "window.setTimeout(function() {";
      $MESSAGE .= "window.location.href=\"../ladder.phtml?mode=$mode\"";
      $MESSAGE .= "},100);";
      $MESSAGE .= "</script>";

//      echo $MESSAGE;


/*
      echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="../ladder.phtml?mode=2";
                 }, 100);
              </script>
                ');

*/                
      return;

   }
}

$theTABLE = "ladder";

$event = $gender1 = $ntrp1 = "-";
$gender2 = $ntrp2 = "-";

$team=$mtype=$date=$insignia=$payment=$custom=$opt=$pwd="";

$division = "ERR";

$winner_id = $_POST["winner"];
$loser_id = $_POST["loser"];
$score = $_POST["score"];


$year=2024;
$theTABLE = "ladder";


// ERROR CHECK if same team
if ($winner_id == $loser_id) {

   echo("<center>");
   echo("<h1>ERROR: same opponent</h1>");
//   echo("<h1>$w_team</h1>");
   echo("</center>");
   return;
}

$reportedby=$email;   // from above
reportScore($theTABLE,$winner_id,$loser_id,$score,$reportedby);
//announceScore($winner_team , $loser_team,$score);

function reportScore($theTABLE, $winner_id,$loser_id,$score,$reportedby ){

   $con = DBMembership();
   $date = time()-60*60*6;

   $query = "select * from $theTABLE  where _id=$winner_id";        
   $qr= mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($qr);
   $w_fname = $row["fname1"];
   $w_lname = $row["lname1"];
   $w_name = $row["fname1"]." ".$row["lname1"];

   $w_win = $row["win"];
   $w_loss = $row["loss"];

   $w_points = $row["points"];

   $division="Womyn";
   if($row["gender1"]=='M') $division="Men";
   
   $query = "select * from $theTABLE  where _id=$loser_id";        
   $qr= mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($qr);
   $l_fname = $row["fname1"];
   $l_lname = $row["lname1"];
   $l_name = $row["fname1"]." ".$row["lname1"];

   $l_win = $row["win"];
   $l_loss = $row["loss"];

   $l_points = $row["points"];

// UPDATE RECORDS
// Adjust Winner
   $winner_points = $w_points > $l_points? $w_points : $l_points;
   $loser_points  = $w_points > $l_points? $l_points : $w_points;
   
// FIGURE BONUS POINTS
   $frequency=2;
   $w_bonus = ($w_win + $w_loss + 1)%5   ?  0 :  250;
   $l_bonus = ($l_win + $l_loss + 1)%5   ?  0 :  250;

   
//  echo("winner $winner_points  loser $loser_points");
   
   $w_add = intval($winner_points/2);
   $l_add = intval($loser_points/4); 

   $query = "update $theTABLE set win=win+1 where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);
   $query = "update $theTABLE set date=$date where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);

   $query = "update $theTABLE set points=points+$w_add + $w_bonus where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);
//   echo "<br>".$query;
// Adjust loser

   $query = "update $theTABLE set loss=loss+1 where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);
   $query = "update $theTABLE set date=$date where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);

   $query = "update $theTABLE set points=points+$l_add + $l_bonus where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);
//   echo "<br>".$query;


// Update last match date shown in ladder   
   $date =time()-60*60*7;
   $custom=time()-60*60*7;
   $query = "update $theTABLE set date=$date where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);


   $query = "update $theTABLE set date=$date where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);


// RECORD SCORE FOR ALL TO SEE ********
    $theTABLE= TABLE_LADDER_RESULTS; //"ladder_results";

    $fname1 =$w_fname;
    $lname1 = $w_lname;

    $fname2 =$l_fname;
    $lname2 = $l_lname;
    
    $email1 = $reportedby;

    $gender1=$ntrp1="";
    $email2=$gender2=$ntrp2="";
    $year=YEAR;
    $division=$division;
    $team="";
    $position=0;
    $points =0;
    //$score= " --- ";
    $pwd="";
    date_default_timezone_set('America/Los_Angeles');
    $date =time();  //-60*60*6;
    $custom=time(); //-60*60*6;
    $opt=0;




    db_ladder($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,
    $year,$division,$team,$position,$points,$score,$pwd,$date,$custom,$opt);

    
    $points=$bonus="";
    LOGS("ladder_reportscore.php  $fname1 $lname1 vs $fname2 $lname2 ($score) reported by $email1");
    announce_score($fname1,$lname1,$email1,$fname2,$lname2, $points,$w_add,$l_add,$score,$w_bonus,$l_bonus,$date );


}

//phpemailer($subject, $message ,$toemail1 , $toemail2);
function between($x , $min,$max){
   if( $x>=$min && $x<=$max) return true;
   return false;

}

function announce_score($fname1,$lname1,$email1,$fname2,$lname2, $points, $w_add , $l_add,$score,$bonus1,$bonus2,$date ){
   echo("<style>");
   echo("</style>");
   echo("<body bgcolor=\"CAE9F5\" >");
   echo("<center>");
   echo("<h1>Score Report </h1>");
   echo("<h3>");
   echo("$fname1 $lname1 ");
   echo("</h3>");

   echo("<h3>vs</h3>");

   echo("<h3>");
   echo("$fname2 $lname2");
   echo("</h3>");
   
   echo("<h3>");
   echo("$score");
   echo("</h3>");
   

   echo("<h3>");
   echo("$fname1 $lname1 received $w_add points for this match");
   if($bonus1 !=0 ) echo("<br>plus $bonus1 bonus points");
   echo("</h3>");   

   echo("<h3>");

   echo("$fname2 $lname2 received $l_add points for this match");
   if($bonus2 !=0 ) echo("<br>plus $bonus2 bonus points");


   echo("</h3>");   

   echo("</center>");
   echo("</body>");

}


/*

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
*/

?>

