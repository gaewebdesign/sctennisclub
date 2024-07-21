<!--
Thank you for contacting us today and allowing me to assist you.

Your success is important to us and we value your business. If you have any further questions, please do not hesitate to contact us as we are here 24/7 365 for you.

You should have an option to leave feedback on this chat in the chat window or possibly receive an email, please fill that out, we would really appreciate it.

Have a great rest of your day!

Please Note: Starting May 1st, our phone availability will change from 24/7 to Monday through Friday 9AM to 9PM EST.
-->
<script language="JavaScript" src="library/sorttable.js"> </script>

<style>
   .table{
     width: 95%;

   }
   tr {
    line-height: 20px;
    min-height: 17px;
    height: 7px;
    color: blue;
    
    font-size: .75em;
    
 }
</style>    
<table class="table table-primary table-striped sortable" >
<thead>
<tr>
    <th scope="col">Team</th>
    <th scope="col">NTRP </th>
    <th scope="col">Email </th>

    <th > </th>
    <th scope="col">Team</th>
    <th scope="col">NTRP </th>
    <th scope="col">Email </th>
    <th scope="col">Date </th>

</tr>
</thead>

<tbody>
<?php
   // define("TABLE_PAYPAL","paypal");  
    $y = YEAR;
    $_y = YEAR-1;
    $m = MEMBERS($y);
    $_m = MEMBERS($_y);
//    echo ("Members for $y ($m) and $_y ($_m) " );
    
    
    function Configure_()
    {
             
           $HOST = "127.0.0.1";
           $USER = "root";      // on my localhost
           $PASSWORD = "tomato1349";
           $DB= "southb56_sctc";
              
           if(strstr($_SERVER["SERVER_NAME"],"sctennis")){
             $USER  = "southb56_rog";    // inmotion
           } 
           
//           echo($HOST." -- ".$USER." - ".$DB." - ".$PASSWORD." <br>" );
   
           $con = mysqli_connect($HOST,$USER, $PASSWORD);
   
           if (!$con) {
                       echo("CONNECTION ERROR<br>");
                       die('Could not connect: ' . mysqli_connect_error());
                    }else{
   
                    }
   
                   $ret = mysqli_select_db($con,$DB );
                   if(!$ret){
                     echo( "mysqli_connect_error() = ");
                     echo( mysqli_connect_error() );
                     echo( "<br>");
                   }
   
                   return $con;
             }

   

    function memberlist($YEAR){

        global $res,$non;
//       $hashtable=[];
        //print( "configure");
        $con = Configure();


        $epoch = strtotime('2023-9-29');
        $final = strtotime('2024-12-29');


        define( "TABLE_TOURNAMENT" , "tourny");
        $query = "select * from ".TABLE_TOURNAMENT;
        $query = "select * from ".TABLE_TOURNAMENT." where date>$epoch and date<$final order by date asc ";


         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  

                    echo("<tr> ");
                
                    echo("<td>");
                    echo($row['fname1']."  ".$row['lname1']);
                    echo("</td>");
                    echo("<td>");
                    echo($row['gender1']."  ".$row['ntrp1']);
                    echo("<td>");
                    echo( strtolower($row['email1']) );
                    echo("</td>");


                    echo("<td>");
                    echo("         ");
                    echo("</td>");

                    echo("<td>");
                    echo($row['fname2']."  ".$row['lname2']);
                    echo("</td>");
                    echo("<td>");
                    echo($row['gender2']."  ".$row['ntrp2']);
                    echo("<td>");
                    echo( strtolower($row['email2']) );
                    echo("</td>");





                    echo("<td>");
                    $date =$row['date'];
                    $dt = new DateTime("@$date");
                    $date = ltrim($dt->format('m/d/Y'),0);
                    echo($date);
                    echo("</td>");

                    echo("</tr> ");

//                    $hashtable[$row[EMAIL]] =$row[FNAME]." ".$row[LNAME] ;
                    }
//                    echo("<tr>");
//                    echo("<td>&nbsp;<td><td><td>");
//                    echo("</tr>");

            }

            memberlist(YEAR);
//            if(YEAR>=2024)
//            memberlist(YEAR-1);



//        print("\t\t\t RES: $res / NONRES: $non ");
?>
 </body>
</table>


