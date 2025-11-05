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
 
  
</div>
<!--


-->
<table class="table table-striped sortable">
<thead>
<!-- <tr><td><td><b> Waitlist </b><td><td><td> </tr> -->

<tr>
    <th scope="col" > </th>
  
  <th scope="col" >First Name </th>
  <th scope="col" >Last Name </th>
  <th scope="col">NTRP </th>
 

</tr>
</thead>



<tbody>
<?php


    function _V($n,$vis){
         if($vis==1)   echo(" (".$n.")");

    }


    function memberlist( $year){
        $theTable = TABLE_PAYPAL;
        $query = "select * from $theTable where year=$year order by lname limit 390 ";

        LOGS($query);
        tablelist( $year, $query,0);
    }

    
    

    function tablerow( $year, $fname, $lname, $ntrp, $date){
        echo("<tr>");

        echo("<td> </td>");
        echo("<td>$fname </td>");
        echo("<td>$lname</td>");
        echo("<td>$ntrp</td>");

        echo("</tr>");

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


