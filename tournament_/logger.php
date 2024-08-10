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
        <th style="width:85%">LOG</th>
        </tr>
 </thead>
      <tbody>
      <?php
        tournylog();
      ?>
    </tbody>

</table>

</html>

<?php

function tournylog() {

    $query = "select * from logger where log regexp(\"TOURNY\") order by _id";
    $con = DBMembership();
    $qr=mysqli_query($con,$query);

    while(  $row = mysqli_fetch_assoc($qr) ) {

        $_id = $row["_id"];
        $_log = $row["log"];

        echo "<tr> <td> $_id </td> <td> $_log  </tr>" ;

    }

    
}




?>




