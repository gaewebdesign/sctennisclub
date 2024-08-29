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
        <th style="width:20%">Name</th>
        <th style="width:10%">NTRP</th>
        <th style="width:10%">Points</th>
        <th style="width:10%">Record</th>
        <th style="width:10%">Last Match</th>

        </tr>
      </thead>
      <tbody>
           <p>
           <h4>Men's Ladder</h4> 
           <p>

           <?php
             function ladderlist($draw){
              $TABLE_LADDER = "ladder";
              $YEAR = 2024;
              
              $query = "select * from ".$TABLE_LADDER." where year=$YEAR and division regexp(\"$draw\") order by points desc ";
//           echo $query;


              $con = Configure();
 
              $qr=mysqli_query($con,$query);
              while ($row = mysqli_fetch_assoc($qr)) {
               echo "<tr><td>";
               echo $row["fname1"]." ".$row["lname1"];
               
               echo "<td>";
               echo $row["gender1"].$row["ntrp1"];

               echo "<td>";
               echo $row["points"];

               echo "<td>";
               echo $row["win"]."-".$row["loss"];
 
               echo "<td>";
               $custom = $row[DATE];
               $dt = new DateTime("@$custom");
               $date = ltrim($dt->format('m/d/y'),0);
               echo $date;
               
               echo "</tr>";
              }
             }

             ladderlist("Men");


           ?>


      </tbody>
    </table>

    <table class="table table-bordered table-striped table-condensed sortable">

<thead>
  <tr>
  <th style="width:20%">Name</th>
  <th style="width:10%">NTRP</th>
  <th style="width:10%">Points</th>
  <th style="width:10%">Last Match</th>
  <th style="width:10%"</th>


  </tr>
</thead>
<tbody>
     <p>
     <h4>Women's Ladder </h4> 
     <p>

     <?php

             ladderlist("Womyn");

      ?>

</tbody>
</table>


  </div>