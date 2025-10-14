<?php

      include "../library/include.inc";
      include "../library/emailer.php";
      include "../library/email/email.inc";
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
      $REFUND = $_POST["reason_code"]; // -> refund
      if( $REFUND == "refund"){
            LOGGER("join_/notify.php: REFUND =$REFUND deteted ");
            return;
      }
      

      LOGGER("join_/notify.php: enumerate _POST array");
      TEXT("join_/notify.php: enumerate _POST array");
      $payer_fname=$payer_lname="---";
      foreach ($_POST as $key => $value) {
         LOGGER("join_/notify.php - POST $key -> $value ");
         TEXT("join_/notify.php $key -> $value ");
         if( $key=="first_name") $payer_fname = $value;
         if( $key=="last_name")  $payer_lname = $value;

      }

      // Update PENDING table with Paypal person *********
      $payer = $payer_fname." ".$payer_lname;
      LOGGER("join_/notify.php - $payer Paypal paid  ");
      updatePaypalPayer(TABLE_PENDING , $payer, $CUSTOM);
      // *************************************************
      
      LOGGER("join_/notify.php: enumerate _GET array");
      TEXT("join_/notify.php: enumerate _GET array");
      foreach ($_GET as $key => $value) {
         LOGGER("join_/notify.php - GET $key -> $value ");
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

        $email = $row[EMAIL];
        $lname = $row[LNAME];

        $epoch = $row[CUSTOM];
        $mtype = $row[MTYPE];
        $insignia = $row[INSIGNIA];
        $epoch = $row[DATE];
        $opt = $row[OPT];
        $year=$row["year"];

        $name = " $fname $lname";


        $message = "PAYPAL Membership Signup\n";
        $message .= "$year \n";
        $message .= "$fname $lname \n";
        $message .= "$email \n ";
        LOGS( $message);

        //
       }

       foreach ($row as $key => $value) {
              LOGGER("row $key -> $value ");
              TEXT("row  $key -> $value ");
           }

      // copy over from the pending to the paypal directory
      LOGS("notify.php DEBUG statement ") ;

//    This moved from topaypal_join.php    ***************
//    This assures that the Waitlist table is only populated after payment
//    There will be duplicate copies in the pending and waitlist tables
//    The CRON job will copy from the Waitlist table to the Membership table
//     LOGS("Is this waitlist: mtype =  $mtype ") ;
      if($mtype == "NRSx"){
            LOGS("copying $fname $lname $email $mtype into waitlist table");
            copyto( TABLE_PENDING,  TABLE_WAITLIST, $CUSTOM);
      }else{
// Has to be here and only executed for non Waitlist (NRSx) players
// Otherwise custom is set to done before copied to Waitlista
// This makes the Wailist appear empty because custom is done
           
            // custom  set to done
            // comment this out when ESCCROW implemented
           LOGS("copyto ".TABLE_PENDING." to  ".TABLE_PAYPAL." $CUSTOM  ") ;
           copyto( TABLE_PENDING,  TABLE_PAYPAL, $CUSTOM);

            // copy from pending to ESCROW table
            // bypass PAYPAL 
            LOGS("copyto ".TABLE_PENDING." to  ".TABLE_ESCROW." $CUSTOM  ") ;

            copyto(TABLE_PENDING , TABLE_ESCROW , $CUSTOM);
        

      }
//    ****************************************************

      $subject= "Membership Signup $fname $lname";
      $message = "Paypal signup: $fname $lname \n<br>";
      $message .= "Paypal payer = $payer_fname $payer_lname";
      $recipient= "south@sctennisclub.org";
      phpemailer($subject,$message , $recipient , $recipient );
      LOGS("notify.php email send commented out ");

      // SAVE to family table
      if(($mtype == "RF") or ($mtype == "NRF") ){
           // $trust = getFamilyTrust($year-1 ,$address,$email);


            $pwd = Password();
            $account = $epoch; // time(); // replace with $_POST value
            $count = 1;
            $trust = 0;

            LOGS("topaypal_join.php found $mtype so creating $fname $lname into family db ");
            LOGS("YEAR:$year ADDRESS:$address  CITY: $city ACCOUNT:$account COUNT:$count  TRUST: $trust");
            toFamilyDB($year,$fname,$lname,$email,$address,$city,$pwd,$mtype,$account,$count,$trust);
        
        
        }


        if(($mtype == "RF_") or ($mtype == "NRF_") ){

           LOGS("$fname $lname increment count for ADDRESS:$address for YEAR: $year  in family");
           incrementFamilyCount( $address , $year);

        }

/*
      Do the adjustment for resident and non-residents here
      1) Get the opt value
      2) in the paypal table, find primary person by opt
      3) increment insignia by 1  (maybe not needed anymore)
      4) change the address by ading * at the end
 */
 
        LOGGER("notify.php MTYPE = $mtype");
       $adjust = "-";
//       if($mtype=="NRF_"){
         if( preg_match("/RF/", $mtype )) {
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
           $query = "update $theTable set address= concat( address, '**&**') where custom = $opt";

           LOGTEXT("update address query = $query");
           $query_results=mysqli_query($con, $query);

            }

       }

/*          // notify email
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
  */    

?>

