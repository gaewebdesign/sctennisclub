<html>

   <div class="h3">2024 Mens Singles Tournament</div>

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
//$q = array( "Carlos Alcarez", "Tommy Paul", "Daniell Medvedev","Jannik Sinner");

$q[] = "Carlos Alcarez";
$q[] = "Tommy Paul";
$q[] = "Danill Medvedev";
$q[]= "Jannik Sinner";
$q[] = "Lorenzo Mussetti";
$q[] = "Taylor Fritz";
$q[] = "Alex de Minaur";
$q[] = "Novak Djokovic";

$s1 = "7-6 ,6-1";
$s2 = "6-1 ,6-4";
$s3 = "6-3 ,6-4";
$s4 = "6-4 ,4-6,6-2";

$f1 = "6-4 ,7-6";
$f2 = "6-3 ,4-0 (ret)";

$w1 = "6-2,6-2";

$q1 = "Dimitrov/Shelton";
$q2 = "Tommy/Paul";
$q3 = "Struff/Borges";
$q4 = "Sinner/Medvedev";
$q5 = "Machac/Navone";
$q6 = "Fritz/Popyrin";
$q7 = "Arnaldi/Thompson";
$q8 = "Jarry/Griekspoor";

$s1 = $q1;  $_s1="6-2,6-1";
$s2 = $q3;  $_s2 ="6-2,6-1";
$s3 = $q5;  $_s3="6-2,6-1";
$s4 = $q8;  $_s4 = "6-2,6-1";


$f1 = $s1; $_f1 = "7-6,7-5";
$f2 = $s3; $_f2 = "7-6,5-7,1-0";

$w = $f2;  $_w= "7-6,7-5";


?>
<ul class="round">
  <li class="spacer">
  <li class="game-top"> <?php echo $q1 ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"> <?php echo $q2 ?> <span></span> </li>
  <li class="spacer">  

<!--   -->
  <li class="game-top"> <?php echo $q3 ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q4 ?><span></span> </li>

  <li class="spacer"> 
<!--   -->

<li class="game-top"><?php echo $q5 ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q6 ?> <span></span> </li>

  <li class="spacer"> 
<!--   -->
<li class="game-top"> <?php echo $q7 ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q8 ?>  <span></span> </li>

  <li class="spacer"> 
<!--   -->



</ul>

<!-- Semi-Finals  -->
<ul class="round">
<li class="game-top"> <?php echo $s1 ?>  <span class="small"><?php echo $_s1 ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top">  <?php echo $s2 ?>   <span class="small"><?php echo $_s2 ?></span> </li>
  <li class="spacer"> 
  <li class="spacer"> 
<li class="game-top">  <?php echo $s3 ?>   <span class="small"><?php echo $_s3 ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top">  <?php echo $s4 ?>   <span class="small"><?php echo $_s4 ?></span> </li>
</ul>

 <!-- Finals -->
  <ul class="round">
  <li class="game-top">  <?php echo $f1 ?>   <span class="small"><?php echo $_f1 ?></span </li>
  <li class="draw draw3"></li>
  <li class="game-top">  <?php echo $f2 ?>   <span class="small"><?php echo $_f2 ?></span </li>

</ul>

 <!-- Winner -->
<ul class="round">

<li class="game-top">  <?php echo $f2 ?>   <span class="small"><?php echo $_w ?></span> </li>
</ul>

</main>



<body>
      
</body>
</html>