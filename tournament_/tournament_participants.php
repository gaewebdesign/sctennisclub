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
        <th style="width:20%">Name</th>
        <th style="width:10%">NTRP</th>
        <th style="width:10%">Date</th>

        </tr>
      </thead>
      <tbody>
           <p>
           <h4>Mx 7.5 </h4> 
           <p>

           <?php
             function tournylist($draw){
              $TABLE_TOURNY = "tourny";
              $YEAR = 2024;
              $query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype  ";
//              echo $query;

              $con = Configure();
 
              $qr=mysqli_query($con,$query);
              while ($row = mysqli_fetch_assoc($qr)) {
               echo "<tr><td>";
               echo $row["fname1"]." ".$row["lname1"];
               echo "<td>";
               echo $row["gender1"].$row["ntrp1"];
 
               echo "<td>";
               echo $row["fname2"]." ".$row["lname2"];
 
               echo "<td>";
               echo $row["gender2"].$row["ntrp2"];
 
               echo "<td>";
               $custom = $row[DATE];
               $dt = new DateTime("@$custom");
               $date = ltrim($dt->format('m/d/y'),0);
               echo $date;
               
               echo "</tr>";
              }
             }

             tournylist("7.5");


           ?>


      </tbody>
    </table>

    <table class="table table-bordered table-striped table-condensed sortable">

<thead>
  <tr>
  <th style="width:20%">Name</th>
  <th style="width:10%">NTRP</th>
  <th style="width:20%">Name</th>
  <th style="width:10%">NTRP</th>
  <th style="width:10%">Date</th>

  </tr>
</thead>
<tbody>
     <p>
     <h4>Mx 6.5 </h4> 
     <p>

     <?php

             tournylist("6.5");

      ?>

</tbody>
</table>


  </div>