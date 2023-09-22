<!DOCTYPE html>
<html lang="en">


<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/index.css" >

      <title>Santa Clara Tennis Club</title>
      <SCRIPT LANGUAGE="JavaScript" SRC="../javascript/sorttable.js"> </SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="javascript/sorttable.js"> </SCRIPT>



</head>
<body>


<center>
<p><br>
<div id="eline">Golden Gate Tennis Club Membership List </div
<p><br>
<hr/>
<?php
    include "../library/include.inc";

?>
<div class="container">
      <div class="row align-items-start">
        <div class="col-sm-1 ">
            <p>
     
        </div>
        <div class="col-sm ">
        <table class="table table-striped ">
         <thead>
          <tr>
                  <th scope="col" >Year </th>
                  <th scope="col" >First Name </th>
                  <th scope="col">Last Name </th>
                  <th scope="col">NTRP </th>
                  <th scope="col">ADDRESS </th>
                  <th scope="col">CITY </th>
                 <th scope="col">EMAIL </th>
                <th scope="col">PHONE </th>
                  <th scope="col">DATE </th>
          </tr>
          </thead>

        <?php
         function membership_json( $URL ){

              $ch = curl_init( $URL );
              curl_setopt( $ch  , CURLOPT_POSTFIELDS, $payload );
              curl_setopt( $ch  , CURLOPT_RETURNTRANSFER, true );
    
              $response = curl_exec($ch);
              curl_close($ch);
              $obj = json_decode($response, $assoc= TRUE);
              return $obj;
    
         }

         date_default_timezone_set('America/Los_Angeles');
         $con =  DBMembership();
         $URL = "http://www.sctennisclub.net/goldengatetennis/members_/json_pending.php";
         $obj = membership_json($URL);
         foreach($obj as $row) {  
              echo("<tr> ");
              echo("<td>");
              echo( $row["year"]);
              echo("</td>");

              echo "<td>".$row[FNAME]."</td>";
              echo "<td>".$row[LNAME]."</td>";
              echo "<td>".$row[GENDER].$row[NTRP].$d."</td>";

              echo "<td>".$row[ADDRESS]."</td>";
              echo "<td>".$row[CITY]."</td>";
              echo "<td>".$row[EMAIL]."</td>";
               echo "<td>".$row[PHONE]."</td>";



              echo "<td>".$row[DATE]."</td>";
        
         }


        ?>
        </div>


      </div>















</table>
