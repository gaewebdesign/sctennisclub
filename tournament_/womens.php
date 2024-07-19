<!DOCTYPE html>
<html lang="en">

<body >
<p>

</p>

<div class="h3">2024 Summer Mx 6.5 Tournament</div>

<main id="headers">

<ul class="round">
  Quarter-Finals
  <div class="small">Finish by 8/31/2024</div>
 </ul>
 <ul class="round">
  Semi-Finals
  <div class="small">Finish by 9/14/2024</div></ul>
 <ul class="round">
  Finals
  <div class="small">Finish by 9/28/2024</div>
 </ul>
 
</main>


<main>

<?php
$q1 = "Alcarez/Swiatek";
$q2 = "Paul/Kostyuk";
$q3 = "Medvedev/Azarenka";
$q4 = "Wang/Siniakov";

$q5 = "Lorenzo /Mussetti";
$q6 = "Taylor /Krejcikova";
$q7 = "de Minaur/Collins";
$q8 = "Yuan /Gauff";

$s1 = $q1;
$s2 = $q4;
$s3 = $q5;
$s4 = $q8;

$f1 = $s2;
$f2 = $s4;

$w = $s2;

?>

<ul class="round">
  <li class="spacer">
  <li class="game-top"> <?php echo($q1) ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top">  <?php echo($q2) ?> <span></span> </li>

  <li class="spacer">  

<!--   -->
  <li class="game-top">  <?php echo($q3) ?>  <span></span> </li>
  <li class="draw"></li>
  <li class="game-top">  <?php echo($q4) ?>  <span></span> </li>
  <li class="spacer"> 
<!--   -->

<li class="game-top"> <?php echo($q5) ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top">  <?php echo($q6) ?><span></span> </li>

  <li class="spacer"> 
<!--   -->
<li class="game-top">  <?php echo($q7) ?>  <span></span> </li>
  <li class="draw"></li>
  <li class="game-top">  <?php echo($q8) ?>  <span></span> </li>

  <li class="spacer"> 
<!--   -->



</ul>
<!-- Semi-Finals  -->
<ul class="round">
<li class="game-top">  <?php echo($s1) ?><span></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top">  <?php echo($s2) ?> <span></span> </li>
  <li class="spacer"> 
  <li class="spacer"> 
<li class="game-top"> <?php echo($s3) ?> <span></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top">  <?php echo($s4) ?> <span></span> </li>
</ul>

 <!-- Finals -->
  <ul class="round">
  <li class="game-top">  <?php echo($f1) ?> <span></span> </li>
  <li class="draw draw3"></li>
  <li class="game-top">  <?php echo($f2) ?> <span></span> </li>

</ul>

 <!-- Winner -->
<ul class="round">

<li class="game-top">  <?php echo($w) ?> <span></span> </li>
</ul>

</main>


</html>