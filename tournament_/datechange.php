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
                  echo( "<br>");
                }

                return $con;
 }

 $theTable = "tourny_natsu";
 $theTable = "tourny_aki";
 $theTable = "tourny_fuyu";
 

$con = Config();
$query = "select * from $theTable  order by _id";

$qr = mysqli_query($con, $query);


 while(  $row = mysqli_fetch_assoc($qr) ) {
       $date = $row[DATE];
       $_id = $row["_id"];
       $fname = $row[FNAME1];
       $lname = $row[LNAME1];

       echo( "$_id $fname $lname $date \n" );
       $date =$row['date'];
       $dt = new DateTime("@$date");
       $date = time();
       $mod = $date - 60*60*24*55;       
       $dt2 = new DateTime("@$mod");
       $actual = ltrim($dt->format('m/d/Y'),0);
       $actual2 = ltrim($dt2->format('m/d/Y'),0);
       
//       echo( "$_id $fname $lname $date $actual $actual2 \n" );



       $qchange= "UPDATE $theTable set date=$mod where _id=$_id";
       echo(" $qchange ($actual2) \n");
       mysqli_query($con, $qchange );
       
    }

?>