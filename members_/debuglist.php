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
    line-height: 14px;
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
    WAITLIST: <?php echo( Waitlist(YEAR)) ?>
    <br>
    <b><?php echo( YEAR-1); ?>  </b> &nbsp;
    RESIDENTS: <?php echo( Residents(YEAR-1) ); ?>
    NON-RESIDENTS: <?php echo( NonResidents(YEAR-1)) ?>
    WAITLIST: <?php echo( Waitlist(YEAR-1)) ?>
</div>




<table class="table table-striped sortable">
<thead>
<tr>
    <th scope="col" >Year </th>
    <th scope="col" >First Name </th>
    <th scope="col">Last Name </th>

    <th scope="col">NTRP </th>    
    <th scope="col">MTYPE </th>
    <th scope="col">Address </th>

    <th scope="col">Email </th>

    <th scope="col">TEAM </th>
    
 
    <th scope="col">PAID </th>
    
    <th scope="col">CUSTOM</th>

    <th scope="col">INSIGNIA</th>
    <th scope="col">OPT</th>
    


    
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
    function memberlist($YEAR){


         $con = Configure();

         $query = "select * from ".TABLE_PAYPAL." where year=$YEAR order by year,lname limit 3000 ";
 //        $query = "select * from ".TABLE_PENDING." where year=$YEAR order by date desc limit 30 ";
  //       TEXT($query);

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
                    echo( $row['year']);
                    echo("</td>");

                    echo("<td>");
                    echo($row[FNAME]);
                    echo("</td>");

                    echo("<td>");
//                  echo($row[LNAME]." ".$row[ADDRESS]." ".$row[CITY]." ".$row[ZIP]." ".$row[MTYPE]);
                    echo($row[LNAME]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[GENDER].$row[NTRP]);
                    echo("</td>");


                    echo("<td>");
                    echo($row[MTYPE]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[ADDRESS].", ".ABBR( $row[CITY])  );
                    echo("</td>");

                    echo("<td>");
                    echo($row[EMAIL] );
                    echo("</td>");

                    echo("<td>");
                    echo($row[TEAM]);
                    echo("</td>");


                    echo("<td>");
                    echo($row[PAYMENT]);
                    echo("</td>");                    

                    echo("<td>");
                    echo($row[CUSTOM]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[INSIGNIA]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[OPT]);
                    echo("</td>");                    

                   

                    echo("<td>");
                    //$date = ltrim($dt->format('m/d/Y H:i:s'),0);
                    echo( date(" m/d/y H:i:s",$row[DATE]).$icon );
                    echo("</td>");
                    echo("</tr> ");

                    }

            }

            memberlist(YEAR);
            memberlist(YEAR-1);

      
?>
 </body>
</table>


