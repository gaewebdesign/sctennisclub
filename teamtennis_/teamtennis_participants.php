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

<h2>Team Tennis Participants </h2>

<table class="table table-bordered table-striped table-condensed sortable">

      <thead>
        <tr>
        <th style="width:40%">Name</th>
        <th style="width:15%">NTRP</th>
        <th style="width:15%">Date</th>


        </tr>
      </thead>
      <tbody>
           <p>
<!--           <h4>Mx 7.5 </h4>  -->
           <p>

           <?php
             function teamtennislist( ){

              $TABLE_TOURNY = "teamtennis_pending";
              $TABLE_TOURNY = "teamtennis";

              $jurassic = strtotime('2024-11-2');
              $cretaceous = strtotime('2024-12-7');

              $YEAR = 2024;
              $query = "select * from ".$TABLE_TOURNY." where year=$YEAR order by date";
              $query = "select * from ".$TABLE_TOURNY."  where custom>$jurassic and custom<$cretaceous order by date desc";

              $con = Configure();
 
              $qr=mysqli_query($con,$query);
              while ($row = mysqli_fetch_assoc($qr)) {

                $member  = "&#x1F49C";
                if($row["opt"]== "member") $member ="🎾";

                 echo "<tr><td>";
                 echo $row["fname1"]." ".$row["lname1"];

                 echo "<td>";
                 echo $row["gender1"].$row["ntrp1"];
 
                 echo "<td>";
                 $custom = $row[DATE];
                 $dt = new DateTime("@$custom");
                 $date = ltrim($dt->format('m/d/y'),0);
                 echo $date;

                 echo "<span class=\"smaller\" >";
                 echo $member;
                 echo "</span>";
                 
                 echo "</tr>";
              }
             }

             teamtennislist( );


           ?>


      </tbody>
    </table>


  </div>