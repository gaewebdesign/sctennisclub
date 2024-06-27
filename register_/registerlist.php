<!--
Thank you for contacting us today and allowing me to assist you.

Your success is important to us and we value your business. If you have any further questions, please do not hesitate to contact us as we are here 24/7 365 for you.

You should have an option to leave feedback on this chat in the chat window or possibly receive an email, please fill that out, we would really appreciate it.

Have a great rest of your day!
<script language="JavaScript" src="members_/javascript/sorttable.js"> </script>

Please Note: Starting May 1st, our phone availability will change from 24/7 to Monday through Friday 9AM to 9PM EST.
-->

<script language="JavaScript" src="library/sorttable.js"> </script>
<?php
    $_EMAIL = false;
    if(isset( $_GET["email"] )) $_EMAIL = true;
//  echo $_GET["email"];
?>
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
    
    <?php 
        if($_EMAIL){
            echo(" <th scope=\"col\" >Email</th> ");        
        }
    ?>    
    
    
    <th scope="col">Prev Year</th>
    <th scope="col">Residents </th>

    <th scope="col">Home </th>

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

         $query = "select * from ".TABLE_REGISTER." where year=$YEAR order by date ";

         LOGGER("from ".$query);
         $icon="";
         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  
                    
                   
                      $icon="";                                     

                      echo("<tr> ");
                    echo("<td>");
                    echo( $row['year']);
                    echo("&nbsp;");
                    echo($row[USTATEAM].$row[NTRP]);
                    $r="";
                    if($row[DAYTIME]=="y") $r="&nbsp; (Daytime)";
                    echo($r);
                    echo("</td>");

                    echo("<td>");
//                    $fname = strtoupper(substr($row[FNAME],0,1));
//                    $lname = strtoupper(substr($row[LNAME],0,1));
                    echo($row[FNAME]."&nbsp;".$row[LNAME] );

                    $icon="";                                     
                    if( $row[RESCAPTAIN] == "Res") {
                        $icon="<small>&nbsp;"."🎾"."</small>" ;                                     
                    }
                    echo($icon);


                    echo("</td>");

                    global $_EMAIL;
                    if($_EMAIL){
                        echo("<td>");
                        echo($row[EMAIL]);
                        echo("</td>");
                   }


                    echo("<td>");
                    $c="";
                    if($row[RESPREV] == "y") $c="&check;" ;
                    echo( $c );
                    echo("</td>");

                    echo("<td>");
                    echo($row[RESCOUNT]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[INSIGNIA]);
                    echo("</td>");


                    echo("<td>");
                    $custom = $row[DATE];
                    $dt = new DateTime("@$custom");
                    $date = ltrim($dt->format('m/d/Y'),0);
                    echo( $date );
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


