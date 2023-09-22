<?php

      include "../library/include.inc";
/*
      PAYPAL return information is a _POST
 */
       LOGGER("join_/notify.php called ");
       LOGGER("./join_/notify.php: make sure to use  _POST from paypal " );
      
      if( empty($_POST["custom"]) ){

       LOGGER("./join_/notify.php: empty _POST custom = " .$_POST["custom"]);
       LOGGER("returning ");

       TEXT("./join_/notify.php: empty _POST custom = " .$_POST["custom"]);
       TEXT("returning ");
       return;
      }

//      $NAME = $_POST["item_number"];
//      $EMAIL = $_POST["payer_email"];
//      $CUSTOM = $_POST["custom"];
      $CUSTOM = $_POST["custom"];

      LOGGER("join_/notify.php: enumerate _POST array");
      TEXT("join_/notify.php: enumerate _POST array");
      foreach ($_POST as $key => $value) {
         LOGGER("join_/notify.php $key -> $value ");
         TEXT("join_/notify.php $key -> $value ");
      }
      
      LOGGER("join_/notify.php: enumerate _GET array");
      TEXT("join_/notify.php: enumerate _GET array");
      foreach ($_GET as $key => $value) {
         LOGGER("join_/notify.php $key -> $value ");
         TEXT("join_/notify.php $key -> $value ");
      
      }

 
       $name = "Capt Kirk";

       $con = DBMembership();
       $query = "select * from ".TABLE_PENDING." where custom = ".$CUSTOM;

       LOGGER($query);
       TEXT($query);

       $query_results=mysqli_query($con, $query);
       $n = mysqli_num_rows($query_results);
       if($n > 0)  {
        $row = mysqli_fetch_assoc( $query_results);
        $fname = $row[FNAME];
        $lname = $row[LNAME];

        $address = $row[ADDRESS];
        $city = $row[CITY];
        $zip = $row[ZIP];

        $lname = $row[LNAME];

        $epoch = $row[CUSTOM];
        $mtype = $row[MTYPE];
        $insignia = $row[INSIGNIA];
        $epoch = $row[DATE];
        $opt = $row[OPT];

        $name = " $fname $lname";
       }

       foreach ($row as $key => $value) {
              LOGGER("row $key -> $value ");
              TEXT("row  $key -> $value ");
           }

      // copy over from the pending to the paypal directory
      LOGGER("copyto ".TABLE_PENDING." to  ".TABLE_PAYPAL." $CUSTOM  ") ;
      TEXT("copyto ".TABLE_PENDING." to  ".TABLE_PAYPAL." $CUSTOM  ") ;

      copyto( TABLE_PENDING,  TABLE_PAYPAL, $CUSTOM);

/*
      Do the adjustment for non-resident here
      1) Get the opt value
      2) in the paypal table, find primary person by opt
      3) increment insignia by 1
      4) change the address by ading * at the end
 */
 
        LOGGER("notify.php MTYPE = $mtype");
       $adjust = "-"
       if($mtype=="NRF_"){
          LOGTEXT("Non-resident adjustment");
          LOGTEXT("Primary member opt= $opt");
          $adjust = "Non-resident adjustment , primary member opt=$opt";

          $theTable = TABLE_PAYPAL;
          $query = "select * from $theTable where custom = ".$opt;
          
          LOGTEXT($query);
          
          $query_results=mysqli_query($con, $query);
          $n = mysqli_num_rows($query_results);
          if($n > 0)  {
           $row = mysqli_fetch_assoc( $query_results);
           
           $primary = $row[FNAME]." ".$row[LNAME];
           $custom=$row[CUSTOM];
             
           LOGTEXT("Primary member $primary with opt=$opt custom=$custom");
           LOGTEXT("custom = $custom");
           
           $query = "update $theTable set insignia = insignia +1 where custom = $opt";
           LOGTEXT("$query");
           $query_results=mysqli_query($con, $query);

//         $query = "update $theTable set address = address + "."'_'"." where custom = $opt";
           $query = "update $theTable set address= concat( address, '*') where custom = $opt";

           LOGTEXT("update address query = $query");
           $query_results=mysqli_query($con, $query);

            }

       }

          // notify email
      $data = array(
      'year' => YEAR,
      'fname' => "-",
      'lname' => "-",
      'custom' => $epoch,
      'mtype'  => $mtype,
      'adjust' => $adjust,
      'query'  => $query,
      'src' => $src,
      'dest' => $dest,
      'subject' => "join_/notify.php: $src to $dest (copyto paypal )",
      'message' => "join_/notify.php: $src to $dest (copyto paypal )"
   );
   
   SENDER( $data );
      

?>

