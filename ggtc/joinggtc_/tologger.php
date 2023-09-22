
<?php

include "../library/include.inc";


echo("trying");

LOGTEXT("tologger.php");

$log = $_POST["log"];

foreach ($_POST as $key => $value) {
    
    LOGTEXT( "{$key} => {$value} ");

}







?>