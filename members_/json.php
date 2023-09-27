<?php

include "../library/include.inc";


   date_default_timezone_set('America/Los_Angeles');
   $YEAR=2020;
   if(  isset( $_GET['year'])  ){
       $YEAR = $_GET['year'];

   }

   $con = DBMembership();

   $query = 'select * from '.TABLE_PAYPAL.'order by year desc where year>= "'.$YEAR.'" ';

//   echo $query."<br>";

   $qr=mysqli_query($con,$query);

   $JSON = array ();
   while ($row = mysqli_fetch_assoc($qr)) {  

       $YEAR = $row['year'];
       $FNAME = $row[FNAME];
       $LNAME = $row[LNAME];

       $GENDER = $row[GENDER];
       $NTRP  = $row[NTRP];
       $MTYPE  = $row[MTYPE];
       $CITY = $row[CITY];
       $ADDRESS = $row[ADDRESS];
       $ZIP = $row[ZIP];

       $EMAIL = $row[EMAIL];
//     $URL = $row[URL];
       $DATE = $row[DATE];

       $CUSTOM = $row[CUSTOM];

       //echo $FNAME." ".$LNAME." ".$CITY." ".$MTYPE."<br>";

       $p = array( 
        "year" => $YEAR,
        "date" => $DATE,
        "fname" => $FNAME , 
        "lname" => $LNAME,
        "address" => $ADDRESS ,
        "city" => $CITY,
        "zip" => $ZIP,
        "email" => $EMAIL, 
        "gender" => $GENDER ,
        "ntrp" => $NTRP,
        "custom" => $CUSTOM,

       );

       array_push( $JSON , $p );

   }

//     print_r( $JSON );
       $j = json_encode( $JSON );
       header('Content-type: application/json;  charset=utf-8');
       print $j;