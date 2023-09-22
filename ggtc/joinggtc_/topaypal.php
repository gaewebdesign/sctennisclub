
<?php

include "../library/include.inc";


TEXT("*** POST DATA **************");
print_r($_POST);
TEXT("*** POST DATA **************");

TEXT("ENUMERATE keys  DATA **************");

/*
foreach ($_POST as $key => $value) {
    
    TEXTLOG( "{$key} => {$value} ");

}

*/
$custom  = $_POST["custom"];

TEXT("custom = $custom");

$team="---";



/*
function toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event){

function toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event){

function toMemberDB($theTABLE, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team, $mtype,$date,$insignia,$payment,$custom,$opt)
{

define("TABLE_GGTC_PAYPAL","ggtc_paypal");  
define("TABLE_GGTC_PENDING","ggtc_pending"); 
*/

//copyto( $src, $dest, $epoch){
// copy from PENDING to PAYPAL

TEXT("copyto ".TABLE_GGTC_PENDING." to ".TABLE_GGTC_PAYPAL." for custom = ".$custom);
copyto(TABLE_GGTC_PENDING , TABLE_GGTC_PAYPAL, $custom);


?>