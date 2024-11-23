<html>

  <div class="h3"><?php QTEXT(YEAR." ".TOURNY_WOMYN." Tournament" ) ?> </div>

 <main id="headers">

 <ul class="round">
   Quarter-Finals
   <div class="small"><?php QTEXT("Finish by ".TOURNY_WOMYN_QUARTERS) ?></div>
  </ul>
  <ul class="round">
   Semi-Finals
   <div class="small"><?php QTEXT("Finish by ".TOURNY_WOMYN_SEMIS) ?>  </div></ul>
  <ul class="round">
    Finals
    <div class="small">
    <?php QTEXT("Finish by ".TOURNY_WOMYN_FINALS) ?></div>
   
  </ul>
  
</main>

<body>
<main id="tournament2">
<?php
  $draw=TOURNY_WOMYN;
  $TABLE_TOURNY = TABLE_TOURNY;
  $YEAR=YEAR;
  include "draw.php";

?>
  <body>
      
</body>
</html>