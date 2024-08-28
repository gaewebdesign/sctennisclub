
<?php

include "../library/include.inc";
include "../library/dbevent.inc";

include "../library/email/email.inc";

// GRAB entire table


if ( isset($_POST['Button'])){

    if($_POST["secretcode"] != "queenbee" ){

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
   echo("<h1>ERROR: same teams</h1>");
   echo("<h1>$w_team</h1>");
   echo("</center>");
   return;
}


reportScore($theTABLE,$winner_id,$loser_id,$score);
//announceScore($winner_team , $loser_team,$score);

function reportScore($theTABLE, $winner_id,$loser_id,$score){

   $con = DBMembership();
   $date = time()+60*60*8;

   $query = "select * from $theTABLE  where _id=$winner_id";        
   $qr= mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($qr);
   $w_fname = $row["fname1"];
   $w_lname = $row["lname1"];
   $w_name = $row["fname1"]." ".$row["lname1"];

   $w_points = $row["points"];

   $division="Womyn";
   if($row["gender1"]=='M') $division="Men";
   
   $query = "select * from $theTABLE  where _id=$loser_id";        
   $qr= mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($qr);
   $l_fname = $row["fname1"];
   $l_lname = $row["lname1"];
   $l_name = $row["fname1"]." ".$row["lname1"];

   $l_points = $row["points"];

// UPDATE RECORDS
// Adjust Winner

   $query = "update $theTABLE set win=win+1 where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);
   $query = "update $theTABLE set date=$date where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);

   $w_add = $w_points/2;
   echo(" w_add =  $w_add ");

   $query = "update $theTABLE set points=points+$w_add where _id=$winner_id";     
   $query_results=mysqli_query($con, $query);
   echo "<br>".$query;
// Adjust loser

   $query = "update $theTABLE set loss=loss+1 where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);
   $query = "update $theTABLE set date=$date where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);

   $l_add = $w_points/4;
   $query = "update $theTABLE set points=points+$l_add where _id=$loser_id";     
   $query_results=mysqli_query($con, $query);
   echo "<br>".$query;

// RECORD SCORE FOR ALL TO SEE ********
    $theTABLE= "ladder_results";

    $fname1 =$w_fname;
    $lname1 = $w_lname;

    $fname2 =$l_fname;
    $lname2 = $l_lname;
    
    $email1=$gender1=$ntrp1="";
    $email2=$gender2=$ntrp2="";
    $year=2024;
    $division=$division;
    $team="";
    $position=0;
    $points =0;
    //$score= " --- ";
    $pwd="";
    $date =time();
    $custom=time();
    $opt=0;


    db_ladder($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,
    $year,$division,$team,$position,$points,$score,$pwd,$date,$custom,$opt);

    
    $points=$bonus="";
    announce_score($fname1,$lname1,$email1,$fname2,$lname2, $points,$w_add,$l_add,$score,$bonus,$date );


}

//phpemailer($subject, $message ,$toemail1 , $toemail2);
function between($x , $min,$max){
   if( $x>=$min && $x<=$max) return true;
   return false;

}

function announce_score($fname1,$lname1,$email1,$fname2,$lname2, $points, $w_add , $l_add,$score,$bonus,$date ){

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
   echo("</h3>");   

   echo("<h3>");
   echo("$fname2 $lname2 received $l_add points for this match");
   echo("</h3>");   

   echo("</center>");
}


function reportScore_($theTABLE,$division,$winner_id,$loser_id,$score){

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

/*
     echo("custom = $custom <br>");
     echo("$query1 <br>");
     echo("$query2 <br> ");
     echo("$query3  <br>");
*/
     LOGGER("TOURNY: $query1 ");
     LOGGER("TOURNY: $query2 ");
     LOGGER("TOURNY: $query3 ");

     
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