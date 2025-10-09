<!--
Thank you for contacting us today and allowing me to assist you.

Your success is important to us and we value your business. If you have any further questions, please do not hesitate to contact us as we are here 24/7 365 for you.

You should have an option to leave feedback on this chat in the chat window or possibly receive an email, please fill that out, we would really appreciate it.

Have a great rest of your day!

Please Note: Starting May 1st, our phone availability will change from 24/7 to Monday through Friday 9AM to 9PM EST.
-->
<script language="JavaScript" src="library/sorttable.js"> </script>


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
    <b><?php echo( YEAR); ?>  </b> &nbsp;
    RESIDENTS: <?php echo( Residents(YEAR) ); ?>
    NON-RESIDENTS: <?php echo( NonResidents(YEAR)) ?>
    <br>
   
</div>

<table class="table">
<thead>

</thread>
<tr>
<td></td>
<td> 
<form class="row g-3" action="./from_escrow_tomemb.php" method="post">

<button class="w-100 btn btn-primary btn-lg"  name="action"  value="addRes" > Add Resident &nbsp;</button>

</td>
<td></td>
<td>
    <button class="w-100 btn btn-primary btn-lg"  name="action"  value="addNR" > Add Non-Resident &nbsp;</button>

</td>
<td>
<button class="w-100 btn btn-primary btn-lg"   name="action" value="delToCaptain" > To Captain &nbsp;</button>

</td>
<td></td>
<td></td>
</tr>

</table>



<table class="table table-striped sortable">
<thead>
<tr>
    <th scope="col" ></th>
    <th scope="col" >Year </th>
    <th scope="col" >First Name </th>
    <th scope="col">Last Name </th>
    
    <th scope="col">Address </th>
    
    <th scope="col">NTRP </th>
    <th scope="col">MTYPE </th>
    <th scope="col">PAID</th>

    <th scope="col">CUSTOM</th>
    <th scope="col">OPT</th>

    <th scope="col">Epoch</th>
    <th scope="col">Date </th>
    

</tr>
</thead>

<tbody>
<?php
 function ABBR($CITY){
    $abbreviations = array( "jose" => "SJ", "sunnyvale" => "Su" ,"clara"=>"SC",
    "campbell"=>"Cpb","saratoga"=>"Srt","milpitas"=>"Mlp","mountain"=>"MV",
    "burl"=>"Blg","palo"=>"PA","fremont"=>"Fmt","soquel"=>"Soq",
    "cupertino"=>"Cup","gatos"=>"LG","sereno"=>"MS","menlo"=>"MP",
    "union"=>"UC","los altos"=>"LA","newark"=>"Nwk","menlo"=>"MP",
    "capitola"=>"Cap","san carlos"=>"SanC","millbrae"=>"Milb","menlo"=>"MP",
    "mtn"=>"MV","san carlos"=>"SanC","millbrae"=>"Milb","menlo"=>"MP",
    "redwood"=>"RC","mateo"=>"SM","morgan"=>"MH","sunny" => "Su",
    "san francisco"=>"SF","emerald hills"=> "EH", "hayward"=>"Hay",
    "brisbane"=>"Bris","san ramon"=>"SR"
    );

    foreach ( $abbreviations as $key => $value){
        if( preg_match( "/".$key."/i",$CITY)) {
            $CITY = $value;
            return $CITY;
        }

   }

       return $CITY;

}
    function CheckBox( $id,$type){
          
          if($type=="R"){
            echo("<input type = \"checkbox\" name=\"resident[]\" value=\"$id\" >");
          }else{
            echo("<input type = \"radio\" name=\"nonres[]\" value=\"$id\" >");
          }

    }
    

    function memberlist($YEAR , $R ){


         $con = Configure();
          

         $query = "select * from ".TABLE_ESCROW." where year>=$YEAR  and mtype regexp \"^".$R."\" order by date desc limit 10";
 //        $query = "select * from ".TABLE_PENDING." where year=$YEAR order by date desc limit 30 ";
//         TEXT($query);

         $icon="";
         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  
                    
                   if( preg_match("/santa|clara/i",$row[CITY])) {
                       $icon="<small>&nbsp;"."🎾"."</small>" ;                                     
                   }else{
                      $icon="";                                     
                }


                    echo("<tr> ");
                    echo("<td>");


                    CheckBox( $row["_id"],$R );
                    echo("<td>");
                    echo( $row['year']." ".$row["_id"]);
                    echo("</td>");

                    echo("<td>");
                    $fname = $row[FNAME];
                    echo($fname);
                    echo("</td>");

                    echo("<td>");
                    echo($row[LNAME]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[ADDRESS]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[GENDER].$row[NTRP]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[MTYPE]);
                    echo("</td>");

                    echo("<td>");
                    echo($row["other"]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[CUSTOM]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[OPT]);
                    echo("</td>");

                    echo("<td>");
                    echo $row[DATE];

                    echo("<td>");
                    $custom = $row[DATE];
                    $dt = new DateTime("@$custom");
                    $date = ltrim($dt->format('m/d/y'),0);
                    echo( $date.$icon );
//                  echo( date(" m/d/Y",$row[CUSTOM]).$icon );
                    echo("</td>");
                    echo("</tr> ");
                    echo("\n");

                    }

            }

            memberlist(YEAR , "R");
            echo ("<tr> <td><td><td colspan=\"5\"><b>Non-Resident</b> <td><td><td><td><td</tr>");
            memberlist(YEAR , "N");

      
?>
 </body>
</table>

        </form>
