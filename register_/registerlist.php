<!--
Thank you for contacting us today and allowing me to assist you.

Your success is important to us and we value your business. If you have any further questions, please do not hesitate to contact us as we are here 24/7 365 for you.

You should have an option to leave feedback on this chat in the chat window or possibly receive an email, please fill that out, we would really appreciate it.

Have a great rest of your day!
<script language="JavaScript" src="members_/javascript/sorttable.js"> </script>

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

</div>


<table class="table table-striped sortable">
<thead>
<tr>
    
    <th scope="col">Team </th>
    
    <th scope="col" >Captain</th>
    
    <th scope="col">Captain </th>
    <th scope="col">Prev Year</th>
    <th scope="col">Residents </th>


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
         define("TABLE_REGISTER", "register" );
         define("USTATEAM", "team" );

         define("DAYTIME", "daytime" );

         define("RESCAPTAIN", "rescaptain" );
         define("RESPREV", "resprev" );
         define("RESCOUNT", "rescount" );
         

         $query = "select * from ".TABLE_REGISTER." where year=$YEAR order by lname limit 10 ";
 //        $query = "select * from ".TABLE_PENDING." where year=$YEAR order by date desc limit 30 ";
//         TEXT($query);

         $icon="";
         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  
                    
                   
                      $icon="";                                     

                      echo("<tr> ");
                    echo("<td>");
                    echo( $row['year']);
                    echo("&nbsp;");
                    echo($row[USTATEAM].$row[NTRP]);
                    $r="&nbsp; (Daytime)";
                    if($row[DAYTIME]=="n")  $r="";  
                    echo($r);
                    echo("</td>");

                    echo("<td>");
                    $fname = strtoupper(substr($row[FNAME],0,1));
 //                   echo($fname);
                    echo($row[FNAME]);
                    echo("&nbsp;");
                    echo($row[LNAME]);
                    echo("</td>");

               


                    echo("<td>");
                    $r="NR";
                    if($row[RESCAPTAIN] = "y") $r="Res";
                    echo($r);
                    
                    echo("</td>");

                    echo("<td>");
                    echo($row[RESPREV]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[RESCOUNT]);
                    echo("</td>");

                    echo("<td>");
                    $custom = $row[DATE];
                    $dt = new DateTime("@$custom");
                    $date = ltrim($dt->format('m/d/Y'),0);
                    echo( $date.$icon );
//                  echo( date(" m/d/Y",$row[CUSTOM]).$icon );
                    echo("</td>");
                    echo("</tr> ");

                    }

            }

            memberlist(YEAR);
            //memberlist(YEAR-1);

      
?>
 </body>
</table>

