<?php

// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y H:i:s '),0);

echo($date)





?>