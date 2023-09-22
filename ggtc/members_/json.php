<?php

include "../library/include.inc";


   date_default_timezone_set('America/Los_Angeles');
   $YEAR=2017;
   if(  isset( $_GET['year'])  ){
       $YEAR = $_GET['year'];

   }


   $con = DBMembership();
   $theTable = TABLE_GGTC_PAYPAL;
// $query = "select * from $theTable where year>= $YEAR order by year desc ,lname desc" ;
   $query = "select * from $theTable where year>= $YEAR order by date  desc " ;

   $qr=mysqli_query($con,$query);


   $JSON = array ();
   while ($row = mysqli_fetch_assoc($qr)) {  

       $FNAME = $row[FNAME];
       $LNAME = $row[LNAME];

       $ADDRESS = $row[ADDRESS];
       $CITY = $row[CITY];
       $ZIP = $row[ZIP];
       $PHONE = $row[PHONE];

       $EMAIL = $row[EMAIL];

       $GENDER = $row[GENDER];
       $NTRP  = $row[NTRP];
       $PAYMENT  = $row[PAYMENT];

       $MTYPE  = $row[MTYPE];
       $DATE = $row[DATE];

       $INSIGNIA = $row[INSIGNIA];
       
       $CUSTOM = $row[CUSTOM];
       $USER = $row[USER];
       
       $PWD = $row[PWD];

       //echo $FNAME." ".$LNAME." ".$CITY." ".$MTYPE."<br>";

       $p = array( 
        "year" => $row["year"], //$YEAR,
        "fname" => $FNAME , "lname" => $LNAME,
        "gender" => $GENDER , "ntrp" => $NTRP,
        "address" => $ADDRESS , "city" => $CITY,
        "zip" => $ZIP,
        "phone" => $EMAIL, 
        "email" => $EMAIL,
        "mtype" => $MTYPE,
        "date" => $DATE


       );

       array_push( $JSON , $p );

   }

//     print_r( $JSON );
       $j = json_encode( $JSON );

       print $j;
       
       
 ?>