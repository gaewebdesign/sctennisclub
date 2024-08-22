<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" >

    <title>Document</title>
   

</head>
<body class="Back">
    <center>
    <h1> Thanks <?php echo( $_GET["item_number"]);?> for signing up to lunch and tennis !
    <p> View your name at <br>
    <a href="http://www.sctennisclub.org/signup">www.sctennisclub.org/signup</a>
    </h1>
<!--
    <img  class="RESP_IMAGE" src="./images/walklikeegyptian.gif" width="25%" >
<img  class="RESP_IMAGE" src="./images/swifti.gif" width="50%" >
<iframe src="https://giphy.com/embed/HxE2bm0SZWqhW" width="480" height="365" style="" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/food-anime-HxE2bm0SZWqhW"></a></p>
-->


    <iframe src="https://giphy.com/embed/YSsqduWPo7528" width="466" height="480" style="" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/rice-YSsqduWPo7528"></a></p>    

    <h1>Follow the action on the club's Instagram page! </h1>

    <a href="https://www.instagram.com/santaclaratennisclub/"> 

        <img class="RESP_IMAGE" src = "./images/instagram.png">

    </a>

    <?php
  /*
   http://www.sctennisclub.net/signup_/done?PayerID=DA9ASGTZSCJE4&st=Completed&tx=66V397497W021782U&cc=USD&amt=0.10&cm=1693708024&payer_email=tennis.mutt%40gmail.com&payer_id=DA9ASGTZSCJE4&payer_status=VERIFIED&first_name=Roger&last_name=Okamoto&txn_id=66V397497W021782U&mc_currency=USD&mc_fee=0.10&mc_gross=0.10&protection_eligibility=ELIGIBLE&payment_fee=0.10&payment_gross=0.10&payment_status=Completed&payment_type=instant&handling_amount=0.00&shipping=0.00&item_name=SCTC%20Dinner%3A%20Vegetarium%20Mousaka&item_number=%20Vegan%20Vegas%20&quantity=1&txn_type=web_accept&payment_date=2023-09-03T09%3A27%3A05Z&receiver_id=TV6SA58WGBDYA&notify_version=UNVERSIONED&custom=1693708024&verify_sign=A19W9IvoUO9.MI.dOSNsUSXL9nIcAZtOzM29KxMYCSc.O9TiFsPuyIJJ

  */

      include "../library/include.inc";

      $NAME = $_GET["item_number"];
      $EMAIL = $_GET["payer_email"];
      $CUSTOM = $_GET["custom"];
 

       // copy over from the mixer_pending to the mixer directory
       LOGGER("done.php: values $NAME $EMAIL $CUSTOM ") ;
 //      LOGGER("done.php: copyto".TABLE_MIXER_PENDING." to  ".TABLE_MIXER." $CUSTOM  ") ;

//       TEXT("Sept log: $NAME $EMAIL $CUSTOM ") ;
//       TEXT("TABLES: ".TABLE_MIXER_PENDING." to  ".TABLE_MIXER." $CUSTOM  ") ;

//       copyto( TABLE_MIXER_PENDING,  TABLE_MIXER, $CUSTOM);

     ?>



</body>
</html>