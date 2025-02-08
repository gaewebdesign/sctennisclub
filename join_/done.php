<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" >

    <title>Santa Clara Tennis Club</title>
   

</head>

<?php
   include "../library/include.inc";
?>
<body class="Back">
    <center>
    <h1> Thanks <?php echo( $_GET["item_number"]);?> for joining Santa Clara Tennis Club!
    <p> View your name at <br>
    <a href="http://www.sctennisclub.org/members">www.sctennisclub.org/members</a>
    </h1>

    </a></h1>
    <h2>
        Players on the Waitlist will receive an email when there is member 
        space and you are added to the membership.   Your signup email address
        will allow you to view the membership player list.
        <p>
        <?php
                $n = Waitlist(YEAR);
                if($n == 0){
                    echo("There are no players on the Waitlist");
                }else if($n==1){
                    echo("There is $n player on the Waitlist");
                }else{
                    echo("There are currently $n players on the Waitlist");
                }

        ?>
   </h2>

    <h1>Follow the events  on the club's Instagram page! </h1>

    <a href="https://www.instagram.com/santaclaratennisclub/"> 

        <img class="RESP_IMAGE" src = "./images/instagram.png">

    </a>

    <?php

        LOGS("join_/done.php  player gets info") ;
     ?>

</body>
</html>