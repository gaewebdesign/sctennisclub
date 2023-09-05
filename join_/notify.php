<?php

      include "../library/include.inc";

      $NAME = $_GET["item_number"];
      $EMAIL = $_GET["payer_email"];
      $CUSTOM = $_GET["custom"];
 


       // copy over from the pending to the paypal directory
       LOGGER("join_/done.php _GET : $NAME $EMAIL $CUSTOM ") ;
       LOGGER("join_/done.php: copyto ".TABLE_PENDING." to  ".TABLE_PAYPAL." $CUSTOM  ") ;

       TEXT("join_/done.php _GET : $NAME $EMAIL $CUSTOM ") ;
       TEXT("join_/done.php: copyto ".TABLE_PENDING." to  ".TABLE_PAYPAL." $CUSTOM  ") ;

       copyto( TABLE_PENDING,  TABLE_PAYPAL, $CUSTOM);

       $name = "Capt Kirk";

       $con = DBMembership();
       $query = "select * from ".TABLE_PENDING." where custom = ".$CUSTOM;
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

        $name = " $fname $lname";
       }


       $subject = "SCTC Membership: $name ";
       $message = "$fname $lname \n";
       $message .= "$address \n $city $zip\n";
       $message .= "epoch: $epoch  \n";
       $message .= "mtype: $mtype  \n";

       TEXT($subject);
       TEXT("-------<br>");
       TEXT($message);

       /*
       if( isset($_GET["item_number"]) ){
            $name = " (".$_POST["fname"]." ".$_POST["lname"]." )";
       }
*/

       TEXT("EMAILER");
       EMAILER( $subject, $message, $verbose=true);

?>

