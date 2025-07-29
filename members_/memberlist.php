<!--


php -q  /home/southb56/sctennisclub.org/join_/croncurl.php



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

    <!--
    <b><?php echo( YEAR-1); ?>  </b> &nbsp;
    RESIDENTS: <?php echo( Residents(YEAR-1) ); ?>
    NON-RESIDENTS: <?php echo( NonResidents(YEAR-1)) ?>
-->
</div>
<!--
<table class="table table-striped sortable">
<thead>
<tr>
    <th scope="col" >Year </th>
    <th scope="col" >Name </th>
    <th scope="col">Team </th>
    
    <th scope="col">NTRP </th>
    <th scope="col">Date </th>
    

</tr>
</thead>
   
<tbody>
      <?php
         //$year=YEAR;
         //echo ("<tr><td><td><b> $year Waitlist</b><td><td><td> </tr>");
         //playerwaitlist(YEAR);
    ?>
</table>

-->
<table class="table table-striped sortable">
<thead>
<!-- <tr><td><td><b> Waitlist </b><td><td><td> </tr> -->

<tr>
    <th scope="col" >Year </th>
    <th scope="col" >First Name </th>
    <th scope="col">Last Name </th>
    
    <th scope="col">NTRP </th>
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

    function _V($n,$vis){
         if($vis==1)   echo(" (".$n.")");

    }

    function OnWaitList($year){
        
        $theTable = TABLE_WAITLIST;
        $query = "select * from $theTable where year=$year and custom!=\"done\" order by date asc limit 30 ";

        LOGS($query);
        tablelist($year, $query,1);

    }

    function memberlist( $year){
        $theTable = TABLE_PAYPAL;
        $query = "select * from $theTable where year=$year order by lname limit 390 ";

        LOGS($query);
        tablelist( $year, $query,0);
    }

    
    

    function tablerow( $year, $fname, $lname, $ntrp, $date){
        echo("<tr>");

        echo("<td>$year </td>");
        echo("<td>$fname</td>");
        echo("<td>$lname</td>");
        echo("<td>$ntrp</td>");
        echo("<td>$date</td>");

        echo("</tr>");

    }

    function playerwaitlist( $year){
        $con = DBMembership();
        $theTable = TABLE_PAYPAL;
        $theTable = TABLE_WAITLIST;

        $query = "select * from $theTable where year=$year and custom!=\"done\" order by date asc limit 20 ";
        $qr=mysqli_query($con,$query);
        while ($row = mysqli_fetch_assoc($qr)) {  

            $icon = "";            
            $fname = $row[FNAME]." ".$row[LNAME];
            $lname = $row[TEAM];
            $ntrp  = $row[GENDER].$row[NTRP];
            $custom  = $row[DATE];
            $dt = new DateTime("@$custom");
            $date = ltrim($dt->format('m/d/Y'),0);
            if( preg_match("/santa|clara/i",$row[CITY])) {
                $icon="<small>&nbsp;"."🎾"."</small>" ;                                     
            }
            
            $date .= $icon;
            tablerow( $year, $fname, $lname, $ntrp, $date);

        }

    }

    function playerlist( $year ){
        $con = DBMembership();
        $theTable = TABLE_PAYPAL;
        $query = "select * from $theTable where year=$year order by lname limit 390 ";

        $qr=mysqli_query($con,$query);
        while ($row = mysqli_fetch_assoc($qr)) {  
            $icon = "";            
            $fname = $row[FNAME];
            $lname = $row[LNAME];
            $ntrp  = $row[GENDER].$row[NTRP];
            $custom  = $row[DATE];
            $dt = new DateTime("@$custom");
            $date = ltrim($dt->format('m/d/Y'),0);
            if( preg_match("/santa|clara/i",$row[CITY])) {
                $icon="<small>&nbsp;"."🎾"."</small>" ;                                     
            }
            if(  $row["mtype"] == "RF_") {
                $icon .= "<small><b>-</b></small>" ;                                     
            }
            
             
            
            $date .= $icon;
            tablerow( $year, $fname, $lname, $ntrp, $date);

        }
    
    }

    function tablelist( $year, $query ,$vis){


        $con = DBMembership();

//         $query = "select * from $theTable where year=$year order by lname limit 390 ";

         $icon="";
         $wait=1;
         $qr=mysqli_query($con,$query);
         $x=1;
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
                    $fname = strtoupper(substr($row[FNAME],0,1));
 //                   echo($fname);
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
                    $custom = $row[DATE];
                    $dt = new DateTime("@$custom");
                    $date = ltrim($dt->format('m/d/Y'),0);
                    echo( $date.$icon );
                    echo( _V($x++,$vis) );
//                  echo( date(" m/d/Y",$row[CUSTOM]).$icon );
                    echo("</td>");
                    echo("</tr> ");

                    }

            }
/*
            $w =  Waitlist(YEAR);
            echo ("<tr><td><td><b> Waitlist ($w)</b><td><td><td> </tr>");
            if( $w > 10) {

                OnWaitList(YEAR);            
                echo("<tr> <td><td> <td> <td><td><td><td><td> </tr>");
            }
*/

            $year=YEAR;
            echo ("<tr><td><td><b> $year Members</b><td><td><td> </tr>");
            playerlist(YEAR);
            

  /*
            $year=YEAR-1;
            echo ("<tr><td><td><b> $year Members</b> <td><td><td></tt>");
            playerlist(YEAR-1);
*/
      
?>
 </body>
</table>


