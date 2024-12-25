
<style>
   tr {
    line-height: 10px;
    min-height: 8px;
    height: 4px;
    color: blue;
    font-size : small;
 }
</style> 


<div class="col-sm ">


</div>




<table class="table table-striped ">
<thead>
<tr>
    <th scope="col" >_id </th>
    <th scope="col" >log </th>
    <th scope="col" >date </th>


</tr>
</thead>

<tbody>
<?php

//define("TABLE_HISTORY","history");

    function historylist( ){

         $con = Configure();

         $query = "select * from ".TABLE_HISTORY." order by _id desc limit 300 ";

         TEXT($query);

         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  

                    echo("<td>");
                    echo($row["_id"]);
                    echo("</td>");

                    echo("<td>");
                    echo($row["log"]);
                    echo("</td>");
                    
                    echo("<td>");
                    $custom = $row[DATE];
                    $dt = new DateTime("@$custom");
                    $date = ltrim($dt->format('m/d/Y H:i:s'),0);
                    echo($date);

                    echo("</td>");
                    echo("</tr> ");


                    }

    }

            historylist( );
      
?>
 </body>
</table>


