
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


</tr>
</thead>

<tbody>
<?php

define("TABLE_LOGGER","logger");

    function loggerlist( ){

         $con = Configure();

         $query = "select * from ".TABLE_LOGGER." order by _id desc limit 300 ";

         TEXT($query);

         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  

                    echo("<td>");
                    echo($row["_id"]);
                    echo("</td>");

                    echo("<td>");
                    echo($row["log"]);
                    echo("</td>");
                    echo("</tr> ");

/*                    
                    echo("<td>");
                    echo( date(" m/d/y",$row[DATE]) );
                    echo("</td>");

*/
                    }

    }

            loggerlist( )
      
?>
 </body>
</table>


