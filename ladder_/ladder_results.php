<style>
tr {
    line-height: 14px;
    min-height: 14px;
    height: 4px;
    color: blue;
 }
 </style>

<script language="JavaScript" src="library/sorttable.js"> </script>

<p>
<table class="table table-bordered table-striped table-condensed sortable">

      <thead>
        <tr>
        <th style="width:25%">Winner</th>
        <th style="width:20%">Opponent</th>
        <th style="width:20%">Score</th>
<!--        <th style="width:20%">Points</th> -->
        <th style="width:20%">Match Date</th>

        </tr>
      </thead>
      <tbody>
           <p>
           <h4>Men's Ladder</h4> 
           <p>

           <?php
             function resultlist($draw){
              $TABLE_LADDER = "ladder_results";
              $YEAR = YEAR-1;
              
              $query = "select * from ".$TABLE_LADDER." where year>=$YEAR and division regexp(\"$draw\") order by date desc limit 25";
           //echo $query;


              $con = Configure();
 
              $qr=mysqli_query($con,$query);
              while ($row = mysqli_fetch_assoc($qr)) {
               echo "<tr><td>";
               echo $row["fname1"]." ".$row["lname1"];
               
               echo "<td>";
               echo $row["fname2"]."  ".$row["lname2"];



               echo "<td>";
               echo $row["score"];
 
//               echo "<td>";
//               echo $row["points"];


               echo "<td>";
               $custom = $row[DATE];
               $dt = new DateTime("@$custom");
               $date = ltrim($dt->format('m/d/y '),0);
               echo $date;
               
               echo "</tr>";
              }
             }

             resultlist("Men");


           ?>


      </tbody>
    </table>

    <table class="table table-bordered table-striped table-condensed sortable">

<thead>
  <tr>
  <th style="width:25%">Winner</th>
  <th style="width:20%">Opponent</th>
  <th style="width:20%">Score</th>
  <th style="width:20%">Match Date</th>


  </tr>
</thead>
<tbody>
     <p>
     <h4>Women's Ladder </h4> 
     <p>

     <?php

             resultlist("Womyn");

      ?>

</tbody>
</table>


  </div>