<?php
include "../library/include.inc";

function Config()
 {
        $HOST = "127.0.0.1";
        $USER = "root";      // on my localhost
        $PASSWORD = "tomato1349";
        $DB= "southb56_sctc";


        $con = mysqli_connect($HOST,$USER, $PASSWORD);

        if (!$con) {
                    echo("CONNECTION ERROR<br>");
                    die('Could not connect: ' . mysqli_connect_error());
                 }else{

                 }

                $ret = mysqli_select_db($con,$DB );
                if(!$ret){
                  echo( "mysqli_connect_error() = ");
                  echo( mysqli_connect_error() );
                  echo( "\n");
                }

                return $con;
}

$con = Config();

$query = "select * from paypal where custom = 1692205800";

$query_results=mysqli_query($con,$query);

$n = mysqli_num_rows($query_results);

if($n > 0)  {
    $row = mysqli_fetch_assoc( $query_results);
    $fname = $row[FNAME];
    $lname = $row[LNAME];
    $epoch = $row[CUSTOM];
    $mtype = $row[MTYPE];
    $insignia = $row[INSIGNIA];
    print(" $fname $lname $epoch $mtype $insignia \n ");
}



?>