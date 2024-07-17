<html>

   <div class="h3">2024 Mens Singles Tournament</div>

   <div class="container">
  <div class="row">
    <div class="col-sm">
      Quarter Finals<br>
      <div class="small">Finish by 8/4/2024</div>
    </div>
    <div class="col-sm">
      Semi Finals
      <div class="small">Finish by 8/18/2024</div>
    </div>
    <div class="col-sm">
      Finals
      <div class="small">Finish by 9/1/2024</div>
    </div>
  </div>
</div>


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

$q1 = "Carlos Alcarez";
$q2 = "Tommy Paul";
$q3 = "Danill Medvedev";
$q4 = "Jannik Sinner";

$q5 = "Lorenzo Mussetti";
$q6 = "Taylor Fritz";
$q7 = "Alex de Minaur";
$q8 = "Novak Djokovic";

?>
<ul class="round">
  <li class="spacer">
  <li class="game-top"> <?php echo $q[0] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"> <?php echo $q[1] ?> <span></span> </li>
  <li class="spacer">  

<!--   -->
  <li class="game-top"> <?php echo $q[2] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q[3] ?><span></span> </li>

  <li class="spacer"> 
<!--   -->

<li class="game-top"><?php echo $q[4] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q[5] ?> <span></span> </li>

  <li class="spacer"> 
<!--   -->
<li class="game-top"> <?php echo $q[6] ?> <span></span> </li>
  <li class="draw"></li>
  <li class="game-top"><?php echo $q[7] ?>  <span></span> </li>

  <li class="spacer"> 
<!--   -->



</ul>

<!-- Semi-Finals  -->
<ul class="round">
<li class="game-top"> Alcaraz <span class="small"><?php echo $s1 ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top"> Medvedev <span class="small"><?php echo $s2 ?></span> </li>
  <li class="spacer"> 
  <li class="spacer"> 
<li class="game-top">L Musetti <span class="small"><?php echo $s3 ?></span> </li>
  <li class="draw draw2"></li>
  <li class="game-top"> Djokovich <span class="small"><?php echo $s4 ?></span> </li>
</ul>

 <!-- Finals -->
  <ul class="round">
  <li class="game-top"> Alcaraz <span class="small"><?php echo $f1 ?></span </li>
  <li class="draw draw3"></li>
  <li class="game-top"> Djokovich <span class="small"><?php echo $f2 ?></span </li>

</ul>

 <!-- Winner -->
<ul class="round">

<li class="game-top"> Alcaraz <span class="small"><?php echo $w1 ?></span> </li>
</ul>

</main>



<body>
      
</body>
</html>