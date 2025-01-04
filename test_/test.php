 

<?php

include "../library/include.inc";

function loadFamilyDB(){

    $year = 2025;
    $fname = "Kareem";
    $lname = "Abdul-Jabbar";
    $email = "jbbar@gmail.com";
    $address = "Fabulous Forum";
    $city = "Las Vegas";
    $pwd = Password();
    $mtype="RF";
    $account = time();
    $count = 1;
    $trust = 0;


    toFamilyDB($year,$fname,$lname,$email,$address,$city,$pwd,$mtype,$account,$count,$trust);
}

/*
function incrementFamilyCount( $address,$year){

    $theTable = TABLE_FAMILY;

    $query = "update $theTable set count = count + 1 where address = \"$address\" and year=$year " ;

    $con = DBMembership();
    $query_results=mysqli_query($con,$query);

}
*/


incrementFamilyCount("PO Box 88" , 2025 );


?>