<?php

      include "../library/include.inc";

//      $CUSTOM = $_POST["custom"];

      echo("join_/notify.php: enumerate _POST array <br>");
      foreach ($_POST as $key => $value) {
         LOGGER("testpost.php POST: $key -> $value ");
         echo("testpost.php POST: $key -> $value \n<br>");
      }
      echo("<p>");

      echo("join_/notify.php: enumerate _GET array <br>");
      foreach ($_GET as $key => $value) {
        LOGGER("testpost.php GET $key -> $value ");
         echo("testpost.php GET: $key -> $value \n<br>");
      
      }
      

?>

