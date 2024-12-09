<style>
tr {
    line-height: 14px;
    min-height: 14px;
    height: 4px;
    color: blue;
 }

 .smaller {
  font-size: .5em;
  vertical-align: super;
}
 </style>

<script language="JavaScript" src="library/sorttable.js"> </script>

<p>

<h2>Resident Family Account</h2>

<table class="table table-bordered table-striped table-condensed sortable">

      <thead>
        <tr>
        <th style="width:10%">Year</th>
        <th style="width:40%">Name</th>
        <th style="width:15%">Address</th>
        <th style="width:15%">Email</th>
        <th style="width:5%">Password</th>
        <th style="width:5%">Trust</th>
        <th style="width:5%">Count</th>
        <th style="width:7%">Date</th>


        </tr>
      </thead>
      <tbody>
           <p>
<!--           <h4>Mx 7.5 </h4>  -->
           <p>

           <?php
             function residentfamily( ){


              $theTable = TABLE_RESIDENTFAMILY;

              $jurassic = strtotime('2024-11-2');
              $cretaceous = strtotime('2024-12-7');

              $YEAR = 2024;
              $query = "select * from $theTable order by lname asc";

              $con = Configure();
 
              $qr=mysqli_query($con,$query);
              while ($row = mysqli_fetch_assoc($qr)) {

                $member ="🎾";

                 echo "<tr>";
                 echo "<td>".$row["year"];
                 echo "<td>";
                 echo "<span class=\"medium\" >";
                 echo $row["fname"]." ".$row["lname"];
                 echo "</span>";

                 echo "<td>".$row["address"];
                 echo "<td>".strtolower($row["email"]);
                 echo "<td>".$row["pwd"];
                 echo "<td>".$row["trust"];
                 echo "<td>".$row["count"];

                 echo "<td>";
                 $custom = $row[DATE];
                 $dt = new DateTime("@$custom");
                 $date = ltrim($dt->format('m/d/y'),0);
                 echo $date;

                 echo "<span class=\"smaller\" >";
//                echo $member;
                 echo "</span>";
                 
                 echo "</tr>";
              }
             }

             residentfamily( );


           ?>


      </tbody>
    </table>


  </div>