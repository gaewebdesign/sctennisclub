
<html>

   

 <main id="headers">
   <h3> <?php QTEXT(YEAR." ".TOURNY_MEN." Tournament"); ?> </h3>
</main>


<?php
//include "../library/include.inc";
//include "../library/email/email.inc";

 $TABLE_TOURNY="tourny";
 $YEAR=YEAR;
 $title = TOURNY_MEN;//"Mixed 7.5";
 $draw=TOURNY_MEN; //"Mx7.5";

 include "scores.php";
 
?>





