
<div align="center">
<h1>SCTC - USTA Captains </h1>
</div>

<TABLE align="center" class="sortable" BORDER=1 cellpadding=0 cols=8 cellspacing=0  width="500"  bgcolor="linen">
<TR bgcolor="99ccff">
<TH width="150"><font size="2" >First Name</font></TH>
<TH width="150"><font size="2" >Last Name</font></TH>
<TH width="100"> <font size="2">City </font></TH>
<TH width="100"> <font size="2">Status </font></TH>
</tr>

<?php

define("COLORBLUE" , "DCEAFC");
define("COLORHEADER","99ccff");
define("COLORMEMBER","a9a9f5");
define("COLORWHITE" , "FFFFFF");

define("SKIP","1");
define("FINISH","2");

date_default_timezone_set('America/Los_Angeles');
include "../library/include.inc";
include "../library/emailer.php";
include "../library/email/email.inc";


   echo "<center><b>".date("F d, Y ", time())."</b></center><br>" ;

   GetTeams( );
   AddNobody();


?>
</table>
<html>

<?php

// One time - get members and store in global array

$MEMBERS = array();
$YEAR=YEAR;

function AddNobody( ){
  //  $theTable= "captain"
  $con = DBMembership();
  $year=2025;
  $theTable = "captain";
  $fname = "Captain";
  $lname = "Dunsel";
  $teamid=999000;
  $team = "--- None ---";
  $team_="---None--";
  
  
  $query = 'insert into '.$theTable.'(_id,year,fname,lname, team,team_,teamid ) values';

  $query .= '(NULL'.add($year).add($fname).add($lname).add($team).add($team_).add($teamid);
  $query .= ")";

  try{
  $query_results=mysqli_query($con, $query);
  }catch(Exception $e){
       //echo("error $e");
  } 

}

// Database captain is actualy longer
function AddCaptain($fname, $lname, $team ,$teamid){

     $theTable = TABLE_CAPTAIN;
     $con= DBMembership();


     $team_ = preg_replace("/\([^)]+\)/","",$team); // 'ABC '

     $team_ = trim($team_);
     $initial = $fname[0].".";
     $team_ .= " ($initial $lname)";


     $year=YEAR;
     $query = 'insert into '.$theTable.'(_id,year,fname,lname, team,team_,teamid ) values';

     $query .= '(NULL'.add($year).add($fname).add($lname).add($team).add($team_).add($teamid);
     $query .= ")";

     try{
     $query_results=mysqli_query($con, $query);
     }catch(Exception $e){
          //echo("error $e");
     }



}

function Table( )
{
  echo '<TABLE align="center" class="sortable" BORDER=1 cellpadding=0 cols=8 cellspacing=0  width="500"  bgcolor="linen">';
}

function EndTable( )
{
  echo '</table><br>';
}

function GetTeams( )
{

// http://www.oooff.com/php-scripts/basic-php-scrape-tutorial/basic-php-scraping.php


$url = 'https://leagues.ustanorcal.com/organization.asp?id=1590';   // Pleasenton

$url = 'https://ustanorcal.com/organization.asp?id=3483';   // Santa Clara at Central Park

$url = 'https://leagues.ustanorcal.com/organization.asp?id=20';


$ch = curl_init($url);


// http://www.oooff.com/php-scripts/basic-curl-scraping-php/basic-scraping-with-curl.php
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);



// Get Santa Clara TennisClub 
// changed (Santa Clara [^<])< to ([^<])<  (get everything except <)
preg_match_all( '/href=teaminfo.asp\?id=([\d]*)>([^<]*)<[ .\w\d\/<>=#]*?align=left>([-\w]*)[ ,]*([-\w]*)/i', $curl_scraped_page , $_teaminfo , PREG_PATTERN_ORDER);

// Pull in ID, Team Name </td> <td Area </td><td Captain</td>
$regexp = '/href=teaminfo.asp\?id=([\d]*)>([^~]*?)<\/a><\/td>';  // ID, Team Name
$regexp .= '<td [^~]*?<\/td>';      // Area (not used)
$regexp .= '<td ([^~]*?)<\/td>';    // Captain 
$regexp .= '/i';

preg_match_all( $regexp, $curl_scraped_page , $_teaminfo , PREG_PATTERN_ORDER);

//print_r($_teaminfo);

$n = count($_teaminfo[0]) ;
$subject = "adding $n captains ";
$message = "croncapt.php \n<br>";
$to = "south@sctennisclub.org";
//phpemailer( $subject, $message, $to, $to);
$regCaptain = '/align=left>([^,]*?)[ ,]*([^,]*?)$/i';
for($j=0 ; $j < count($_teaminfo[0]) ; $j++){

        $teamid   =  $_teaminfo[1][$j];
        $teamlink =  $_teaminfo[2][$j];

        $teamlink = str_replace("SANTA CLARA TC/SANTA CLARA TENNIS C","",$teamlink);

        $teamlink = str_replace("SANTA CLARA TENNIS C","",$teamlink);


// Extract the Captain from this column
        preg_match_all( $regCaptain, $_teaminfo[3][$j] , $_captain, PREG_PATTERN_ORDER );
        $lname = $_captain[1][0];
        $fname = $_captain[2][0];
        $captain = $fname." ".$lname;
        AddCaptain( $fname, $lname, $teamlink , $teamid);

        $teamlink = '<a style=text-decoration:none href="https://leagues.ustanorcal.com/teaminfo.asp?id='.$teamid.'">'.$teamlink."</a>";
        $y=$j+1;
        $message .= "$y) $fname $lname $teamlink  \n<br>";

//      Cut off parsing
        $find=0;

  //      if( $teamid == 100261) $find=FINISH;
//  if( $teamid == 104211) $find=FINISH; // early finish 2024

        if( $teamid == 104521) $find=FINISH; // 2024
        if( $teamid == 103166) $find=FINISH; // 2024
        
        if( $find == 0 ){
		Table( );

		TripleCell( COLORBLUE , $teamlink."<br>Captain ".$captain." " );
		echo "<tr>";
//    GetTeamPlayers('https://leagues.ustanorcal.com/teaminfo.asp?id='.$teamid);
//		GetTeamPlayers( 'https://ustanorcal.com/teaminfo.asp?id='.$teamid );
		EndTable( );
		echo "<tr>";

	}elseif( $find == SKIP){

  }elseif( $find == FINISH ){
    
    phpemailer( $subject, $message, $to, $to);
    break;

	}

//        $count ++;
        $find=0;

}

}



function Center( $color , $data )
{
  
	echo "<td valign='middle' height=15 ALIGN=CENTER bgcolor=".$color." ><font size='3'>".$data."&nbsp</td>";

}


function MCell( $color , $data )
{
  
	echo "<td valign='middle' height=15 ALIGN=LEFT bgcolor=".$color." ><font size='3'>".$data."&nbsp</td>";

}


function TripleCell( $color , $data )
{
  
	echo "<td valign='middle' height=15 colspan=4 ALIGN=LEFT bgcolor=".$color." ><font size='3'>".$data."&nbsp</td>";

}




?>
<!--

DROP TABLE IF EXISTS `captain`;

CREATE TABLE `captain` (
   `_id` int NOT NULL AUTO_INCREMENT,
  `year` varchar(40) DEFAULT NULL,
  `fname` varchar(31) DEFAULT NULL,
  `lname` varchar(31) DEFAULT NULL,
  `team` varchar(50) DEFAULT NULL,
  `team_` varchar(50) DEFAULT NULL,
  `teamid` varchar(50) DEFAULT NULL,
  `int` int DEFAULT 0,
  `level` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `ntrp` varchar(5) DEFAULT NULL,
  `opt` varchar(31) DEFAULT NULL,
  `pwd` varchar(31) DEFAULT NULL,
  `custom` varchar(31) DEFAULT NULL,
  `date` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `team` (`team`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



-->