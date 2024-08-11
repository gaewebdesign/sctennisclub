<html>
<style>
    <script language="JavaScript" src="library/sorttable.js"> </script>

    .table-condensed{

        width:90% !important;
        font-size: 9px !important;
    }

    tr{
        font-size:12px;
    }

</style>



<table class="table table-bordered table-striped table-condensed sortable">

<thead>
        <tr>
        <th style="width:7%">_id</th>
        <th style="width:7%">mtype</th>
        <th style="width:7%">custom</th>

        <th style="width:7%">name1</th>
        <th style="width:7%">email</th>
        <th style="width:7%">NTRP</th>

        <th style="width:8%">name2</th>
        <th style="width:8%">email</th>
        <th style="width:7%">NTRP</th>
        <th style="width:7%">division</th>




        <th style="width:7%">semis</th>
        <th style="width:7%">score</th>

        <th style="width:7%">finals</th>
        <th style="width:7%">score</th>


        <th style="width:7%">winner</th>
        <th style="width:7%">score</th>

    </tr>
 </thead>
      <tbody>
      <?php
        tournylog("Mx7.5");
      ?>
      <tr><td>Mx6.5<td><td><td><td>Mx6.5<td><td><td>Mx6.5<td><td><td><td>Mx6.5<td></tr>
      <?php
        tournylog("Mx6.5");
      ?>

    </tbody>

</table>

</html>

<?php

function tournylog($d) {

    $query = "select * from tourny where division regexp(\"$d\") order by mtype";
    $con = DBMembership();
    $qr=mysqli_query($con,$query);

    while(  $row = mysqli_fetch_assoc($qr) ) {

        $_id = $row["_id"];
        $fname1 = $row["fname1"];
        $lname1 = $row["lname1"];
        $fname2 = $row["fname2"];
        $lname2 = $row["lname2"];


        $email1 = $row["email1"];
        $email2 = $row["email2"];

        $ntrp1 = $row["gender1"].$row["ntrp1"];        
        $ntrp2 = $row["gender2"].$row["ntrp2"];        

        $division = $row["division"];

        $mtype = $row["mtype"];
        $custom = $row["custom"];

        $semis = $row["semis"];
        $score1 = $row["score1"];

        $finals = $row["finals"];
        $score2 = $row["score2"];

        $winner = $row["winner"];
        $score3 = $row["score3"];



        echo "<tr> <td> $_id <td> $mtype<td>$custom<td> $fname1 $lname1 <td>$email1<td>$ntrp1<td>$fname2 $lname2<td>$email2 <td>$ntrp2" ;

        echo " <td> $division <td> $semis<td>$score1 <td>$finals<td>$score2<td>$winner<td>$score3" ;

        echo "</tr>";


    }

    
}




?>




