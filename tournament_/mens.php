<html>
   
   <div class="h3"><?php echo(YEAR." ".TOURNY_MEN." Tournament"); ?></div>

 <main id="headers">

 <ul class="round">
   Quarter-Finals
   <div class="small">Finish by <?php QTEXT(TOURNY_MEN_QUARTERS) ?> </div>
  </ul>
  <ul class="round">
   Semi-Finals
   <div class="small">Finish by <?php QTEXT(TOURNY_MEN_SEMIS) ?> </div></ul>
  <ul class="round">
   Finals
   <div class="small">Finish by <?php QTEXT(TOURNY_MEN_FINALS) ?></div>
  </ul>
  
</main>

<body>
<main id="tournament2">
<?php
  $draw=TOURNY_MEN; //"7.5";
  $TABLE_TOURNY = TABLE_TOURNY;
  $YEAR=YEAR;
  include "draw.php";

?>
  <body>
      
</body>
</html>