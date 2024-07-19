<style>
tr {
    line-height: 14px;
    min-height: 14px;
    height: 4px;
    color: blue;
 }
 </style>

<p>
<table class="table table-bordered table-striped table-condensed">

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
              $query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by date ";
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
           <tr><td> W Chen <td>M4.0  <td>  P Lian  <td>W3.0 <td>7/9/24</tr>
           <tr><td> L Ke <td>M4.0  <td>  X Meir  <td>W3.0 <td>7/13/24</tr>
           <tr><td> D Yen <td>M4.0  <td>  Q Lin  <td>W3.0 <td>7/15/24</tr>
           <tr><td> T Zheng <td>M3.5  <td>  CJ Liang  <td>W4.0 <td>7/17/24</tr>



      </tbody>
    </table>

    <table class="table table-bordered table-striped table-condensed">

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

     <tr><td> N Yea <td>W3.0  <td>  J White  <td>M3.5 <td> 7/23/24</tr>
     <tr><td> S Qui <td>W3.0  <td>  H Seaver  <td>M3.5 <td> 7/21/24</tr>
     <tr><td> L Yuhan<td>W3.0  <td>  TJ  Xhong  <td>M3.0 <td> 7/20/25</tr>


</tbody>
</table>


  </div>