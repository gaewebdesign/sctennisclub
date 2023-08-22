<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <title>Santa Clara Tennis Club</title>



</head>
<body>
    <p>

    <p> &nbsp;<p> &nbsp;
    <p> &nbsp;
    <center> 
    <h1> Thanks <?php echo( $_GET["item_number"]);?> for signing up ! 
    <p> View your name at <br>
    <a href="http://www.sctennisclub.net/members">www.sctennisclub.net/members</a>
     </h1>
    <p>
    <div class="col d-flex align-items-center justify-content-center">
<!--
    <img src="./cinco.png"  alt="cinco"> 
    <img src="./crying.gif"  alt="cinco"> 
    https://dribbble.com/shots/7971141-Success-Registration

     <img src="./return.gif" alt="done">
  <img src="./return_/monica.gif" alt="done">
    -->


</div>

</body>
</html>

<?php
    include "./library/include.inc";
    include "./library/emailer.php";
  /*
http://www.sctennisclub.org/signup/done?PayerID=DA9ASGTZSCJE4&st=Completed&tx=3924627897740022R&cc=USD&amt=0.10&cm=1690593005&payer_email=tennis.mutt%40gmail.com&payer_id=DA9ASGTZSCJE4&payer_status=VERIFIED&first_name=Roger&last_name=Okamoto&txn_id=3924627897740022R&mc_currency=USD&mc_fee=0.10&mc_gross=0.10&protection_eligibility=ELIGIBLE&payment_fee=0.10&payment_gross=0.10&payment_status=Completed&payment_type=instant&handling_amount=0.00&shipping=0.00&item_name=SCTC%20Mixer&item_number=%20Roger%20Okamoto%20&quantity=1&txn_type=web_accept&payment_date=2023-07-29T08%3A10%3A05Z&receiver_id=TV6SA58WGBDYA&notify_version=UNVERSIONED&custom=1690593005&verify_sign=Aec6houwiHGVkVyUGmHMvSoGHwYaARzX0c0t3j4PSx.Ba51Rvp0B6IdK

  */
  //$NAME = $_GET["item_number"];
/*
  $NAME = $_GET["item_number"];
  $EMAIL = $_GET["payer_email"];
  print_r($_GET);
  if(!$NAME) $NAME = "Ice Cream ";

http://www.sctennisclub.net/done?PayerID=DA9ASGTZSCJE4&st=Completed
&tx=4LA90116H7163810F&cc=USD
&amt=0.10
&cm=1692144209
&payer_email=tennis.mutt%40gmail.com
&payer_id=DA9ASGTZSCJE4
&payer_status=VERIFIED
&first_name=Roger
&last_name=Okamoto
&txn_id=4LA90116H7163810F
&mc_currency=USD
&mc_fee=0.10
&mc_gross=0.10
&protection_eligibility=ELIGIBLE
&payment_fee=0.10
&payment_gross=0.10
&payment_status=Completed
&payment_type=instant
&handling_amount=0.00
&shipping=0.00
&item_name=SCTC%20Mixer
&item_number=%20Wilmer%20Flores%20
&quantity=1
&txn_type=web_accept
&payment_date=2023-08-16T07%3A03%3A29Z
&receiver_id=TV6SA58WGBDYA
&notify_version=UNVERSIONED
&custom=1692144209

&verify_sign=AlF4Xy8qeXBlqmV3a34kMMhOvKDpASv1RMmcqEjqGoeN9qNDeBuhaXPN


*/
  // echo ("sending email $NAME");
  $custom = $_GET["custom"];
  // takes pending and copies to paypal
  // also increments insignia field 
  $custom="1692196244";

  print("CUSTOM:" .$custom);
  LOGGER( "custom: $custom");
  
  copyto(TABLE_PENDING,TABLE_PAYPAL,$custom);


  sendemail($NAME, $EMAIL, "Sctennisclub.net: Ice Cream Social Sign Up");

?>
