<html>

   <div class="h3">2024 Mx 7.5 Tournament</div>

 <main id="headers">

 <ul class="round">
   Quarter-Finals
   <div class="small">Finish by 9/7/2024</div>
  </ul>
  <ul class="round">
   Semi-Finals
   <div class="small">Finish by 9/21/2024</div></ul>
  <ul class="round">
   Finals
   <div class="small">Finish by 10/4/2024</div>
  </ul>
  
</main>

<body>
<main id="tournament2">
<?php

$q = [".", ".", ".",".", ".", "." ,".",".","."];
$s = [".", ".", ".",".", ".", "." ];
$_s = [".", ".", ".",".", ".", "." ];

$f = [".", ".", "." ];
$_f = [".", ".", ".",];



$draw="7.5";
$TABLE_TOURNY = "tourny";
$YEAR=2024;
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by date ";
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
//echo $query;
$con = Configure();
 

$qr=mysqli_query($con,$query);
$index=1;
$q1=$q2=$q3=$q4=$q5=$q6=$q7=$q8="";

// QUARTER-FINALS
while ($row = mysqli_fetch_assoc($qr)) {

    $team =  $row["fname1"][0]." ".$row["lname1"]."/".$row["fname2"][0]." ".$row["lname2"];
    $q[$index++] = $team;
 }

// SEMI-FINALS 
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by date ";
$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
$qr=mysqli_query($con,$query);
$index=1;
while ($row = mysqli_fetch_assoc($qr)) {

      $score = $row["score1"];
     if(str_contains($row["semis"] ,"semis" )  ){
         $position =  $row[ "mtype"];
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

while ($row = mysqli_fetch_assoc($qr)) {

     if(str_contains($row["finals"] ,"finals" )  ){
         $position =  $row[ "mtype"];
         $score = $row["score2"];
             
         $team = $q[$position];
         if($position <=4) { $f[1]= $team; $_f[1]=$score; }
         if($position >4 )  { $f[2]= $team; $_f[2]=$score; }


     }

 }


 $query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
 $qr=mysqli_query($con,$query);

 $winner= $_winner=".";
 while ($row = mysqli_fetch_assoc($qr)) {
 
      if(str_contains($row["winner"] ,"winners" )  ){
          $position =  $row[ "mtype"];
          $winner = $q[$position];
          $_winner = $row["score3"];
          break;              
      }
 
  }

$f1 = $f2 = ".";
$_f1 = $_f2 = ".";

$f2 = $q7;

$w = ".";
$_w = ".";


?>
<ul class="round">
  <li class="spacer">
  <li class="game-top"> <?php echo $q[1]   ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"> <?php echo $q[2] ?> <span></span> </li>
  <li class="spacer">  

<!--   -->
  <li class="game-top"> <?php echo $q[3] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q[4] ?><span></span> </li>

  <li class="spacer"> 
<!--   -->

<li class="game-top"><?php echo $q[5] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q[6] ?> <span></span> </li>

  <li class="spacer"> 
<!--   -->
<li class="game-top"> <?php echo $q[7] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q[8] ?>  <span></span> </li>

  <li class="spacer"> 
<!--   -->



</ul>

<!-- Semi-Finals  -->
<ul class="round">
<li class="game-top"> <?php echo $s[1] ?>  <span class="small"><?php echo $_s[1] ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top">  <?php echo $s[2]?>   <span class="small"><?php echo $_s[2] ?></span> </li>
  <li class="spacer"> 
  <li class="spacer"> 
<li class="game-top">  <?php echo $s[3] ?>   <span class="small"><?php echo $_s[3] ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top">  <?php echo $s[4] ?>   <span class="small"><?php echo $_s[4] ?></span> </li>
</ul>

 <!-- Finals -->
  <ul class="round">
  <li class="game-top">  <?php echo $f[1] ?>   <span class="small"><?php echo $_f[1] ?></span </li>
  <li class="draw draw3"></li>
  <li class="game-top">  <?php echo $f[2] ?>   <span class="small"><?php echo $_f[2] ?></span </li>

</ul>

 <!-- Winner -->
<ul class="round">

<li class="game-top">  <?php echo $winner ?>   <span class="small"><?php echo $_winner ?></span> </li>
</ul>

</main>



<body>
      
</body>
</html>