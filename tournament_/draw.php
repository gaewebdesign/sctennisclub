<html>
<style>
.dfont{

  font-size: .9em;
  font-weight: 600;
}

</style>

<main id="headers">

 <ul class="round">
   Quarter-Finals
   <div class="small">Finish by <?php QTEXT($QUARTERS) ?> </div>
  </ul>
  <ul class="round">
   Semi-Finals
   <div class="small">Finish by <?php QTEXT($SEMIS) ?> </div></ul>
  <ul class="round">
   Finals
   <div class="small">Finish by <?php QTEXT($FINALS) ?></div>
  </ul>
</main>

<main>
<?php

$q = [".", ".", ".",".", ".", "." ,".",".","."];
$s = [".", ".", ".",".", ".", "." ];
$_s = [".", ".", ".",".", ".", "." ];

$f = [".", ".", "." ];
$_f = [".", ".", ".",];

//$mtype = [ 0,0,0,0,0,0,0,0 ,0];
$mtype = [ 0,0,0,0,0,0,0,0 ,0];
//$mtype = ["-","-","-","-","-","-","-","-","="];

//$draw="6.5";
//$TABLE_TOURNY = "tourny";
//$YEAR=2024;


$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by date ";
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype limit 8";
//DEBUG( $query );

$con = Configure();
 

$qr=mysqli_query($con,$query);
$index=1;


// QUARTER-FINALS
while ($row = mysqli_fetch_assoc($qr)) {

    $team =  $row["fname1"][0]." ".$row["lname1"]."/".$row["fname2"][0]." ".$row["lname2"];
    
//    echo ($team."->".strlen($team) ."<br> " );
//    if ( strlen($team) < 5 ) $team = "    ddd     ";    

    $mtype[$index] = "(".$row["_id"]." ".$row["mtype"]." ".$row["custom"].")";
    $q[$index++] = $team;

  }

// SEMI-FINALS 
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by date ";
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
$qr=mysqli_query($con,$query);
$index=1;
$position=0;
while ($row = mysqli_fetch_assoc($qr)) {

      $score = $row["score1"];
      $position ++;
      if(str_contains($row["semis"] ,"semis" )  ){
//      $position =  $row[ "mtype"];
         $score = $row["score1"];
    
         $team = $q[$position];
         if($position ==1 || $position==2) { $s[1]= $team; $_s[1]=$score; }
         if($position ==3 || $position==4)  { $s[2]= $team; $_s[2]=$score; }
         if($position ==5 || $position==6)  { $s[3]= $team; $_s[3]=$score; }
         if($position ==7 || $position==8) { $s[4]= $team; $_s[4]=$score; }
     }

 }


// FINALS 
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by date ";
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
$qr=mysqli_query($con,$query);
$position=0;
while ($row = mysqli_fetch_assoc($qr)) {
     $position++;
     if(str_contains($row["finals"] ,"finals" )  ){
//         $position =  $row[ "mtype"];
         $score = $row["score2"];
             
         $team = $q[$position];
         if($position <=4) { $f[1]= $team; $_f[1]=$score; }
         if($position >4 )  { $f[2]= $team; $_f[2]=$score; }


     }

 }


 $query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") and winner = \"winner\" ";
 //DEBUG($query);
 $qr=mysqli_query($con,$query);

 $winner= $_winner=".";
 while ($row = mysqli_fetch_assoc($qr)) {
 
          $team = $row["fname1"]." ".$row["lname1"];
          $team .= "/".$row["fname2"]." ".$row["lname2"];
          $winner = $team;  //$q[$position];
          $_winner = $row["score3"];
          break;              
 }
 
 


?>
<ul class="round">
  <li class="spacer">
  <li class="game-top dfont"> <?php $TEAM($q[1]);  ?> <span class="small"><?php $DEBUG( $mtype[1])  ?></span> </li>
  <li class="draw"></li>
  <li class="game-top dfont"> <?php $TEAM($q[2]) ?> <span class="small"> <?php $DEBUG( $mtype[2]) ?></span> </li>
  <li class="spacer">  

<!--   -->
  <li class="game-top dfont"> <?php $TEAM($q[3]) ?> <span class="small"> <?php $DEBUG( $mtype[3])  ?></span> </li>
  <li class="draw"></li>
  <li class="game-top dfont"><?php $TEAM($q[4]) ?><span class="small"> <?php $DEBUG( $mtype[4])  ?></span> </li>

  <li class="spacer"> 
<!--   -->

<li class="game-top dfont"><?php $TEAM($q[5]) ?> <span class="small"><?php $DEBUG( $mtype[5])  ?></span> </li>
  <li class="draw"></li>
  <li class="game-top dfont"><?php $TEAM($q[6]) ?> <span class="small"><?php $DEBUG( $mtype[6])  ?></span> </li>

  <li class="spacer"> 
<!--   -->
<li class="game-top dfont"> <?php $TEAM($q[7]) ?> <span class="small"><?php $DEBUG( $mtype[7])  ?></span> </li>
  <li class="draw"></li>
  <li class="game-top dfont"><?php $TEAM($q[8]) ?>  <span class="small"><?php $DEBUG( $mtype[8])  ?></span> </li>

  <li class="spacer"> 
<!--   -->



</ul>

<!-- Semi-Finals  -->
<ul class="round">
<li class="game-top dfont"> <?php $TEAM($s[1]) ?>  <span class="small"><?php $SCORE($_s[1]) ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top dfont">  <?php $TEAM($s[2]) ?>   <span class="small"><?php $SCORE($_s[2]) ?></span> </li>
  <li class="spacer"> 
  <li class="spacer"> 
<li class="game-top dfont">  <?php $TEAM($s[3]) ?>   <span class="small"><?php $SCORE($_s[3]) ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top dfont">  <?php $TEAM($s[4]) ?>   <span class="small"><?php $SCORE($_s[4]) ?></span> </li>
</ul>

 <!-- Finals -->
  <ul class="round">
  <li class="game-top dfont">  <?php $TEAM($f[1]) ?>   <span class="small"><?php $SCORE($_f[1]) ?></span </li>
  <li class="draw draw3"></li>
  <li class="game-top dfont">  <?php $TEAM($f[2]) ?>   <span class="small"><?php $SCORE($_f[2]) ?></span </li>

</ul>

 <!-- Winner -->
<ul class="round">

<li class="game-top dfont">  <?php $TEAM($winner) ?>   <span class="small"><?php $SCORE($_winner) ?></span> </li>
</ul>

</main>



<body>
      
</body>
</html>