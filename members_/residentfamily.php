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
        <th style="width:10%">Sel</th>
        <th style="width:10%">Year</th>
        <th style="width:40%">Name</th>
        <th style="width:15%">Address</th>
        <th style="width:15%">City</th>
        <th style="width:15%">TYPE</th>

        <th style="width:15%">Email</th>
        <th style="width:5%">Password</th>
        <th style="width:5%">Trust</th>
        <th style="width:5%">Count</th>
        <th style="width:5%">Account</th>

        <th style="width:7%">Date</th>


        </tr>
      </thead>
      <tbody>
           <p>
<!--
           <form class="row g-3" action="./toresidentfamily.php", method="POST">
           <button class="btn btn-primary" name="SubmitButton" value="S" type="submit" >Set Trust</button>
          
           <input type="radio" id="sel1" value="333" name="test" /> 
           <input type="radio" id="sel2" value="444" name="test" /> 
           <input type="radio" id="sel3" value="5555" name="test" /> 

          </form>
-->
          <form class="row g-3" action="./toresidentfamily.php", method="POST">

           <div class="col-12">
           <button class="btn btn-primary" name="SubmitButton" value="But" type="submit" >Toggle Trust Value</button>
           </div>
            <?php       
              residentfamily(YEAR);
              $y=YEAR-1;
              echo("<tr> <td>$y  <td> <td> <td> $y <td> <td> <td> $y <td> <td> <td> <td> $y </tr>");
              residentfamily(YEAR-1);
            ?>
            </form>

<?php
             function residentfamily($_year ){


              $theTable = TABLE_FAMILY;

              $jurassic = strtotime('2024-11-2');
              $cretaceous = strtotime('2024-12-7');

              $query = "select * from $theTable where year=$_year order by lname asc";

              $con = Configure();
 
              $qr=mysqli_query($con,$query);
              while ($row = mysqli_fetch_assoc($qr)) {

                $member ="🎾";

                 $_id = $row["_id"];
                 echo "<tr>";
                 echo "<td>";

//  <input class="form-check-input"  type="radio" id="chicken" value="chicken" name="dinner"  required   ></input>

                 echo "<input type=\"checkbox\" id=\"sel\" value=\"$_id\" name=\"_id[]\" /> ";
                 echo "<td>".$row["year"];
                 echo "<td>";
                 echo "<span class=\"medium\" >";
                 echo $row["fname"]." ".$row["lname"];
                 echo "</span>";

                 echo "<td>".$row["address"];
                 echo "<td>".$row[CITY];
                 $m = $row["mtype"];
                 echo "<td>".$m;



                 echo "<td>".strtolower($row["email"]);
                 echo "<td>".$row["pwd"];
                 echo "<td>".$row["trust"];
                 echo "<td>".$row["count"];
                 echo "<td>".$row["account"];

                 echo "<td>";
                 $custom = $row[DATE];
                 $dt = new DateTime("@$custom");
                 $date = ltrim($dt->format('m/d/y'),0);
                 echo $date;

                 echo "<span class=\"smaller\" >";
//                echo $member;
                 echo "</span>";
                 
                 echo "</tr>";
                 echo "\n";
              }
             }

//             residentfamily( );


            
           ?>


      </tbody>
    </table>


  </div>