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
    line-height: 20px;
    min-height: 17px;
    height: 7px;
    color: blue;
    width: 85%
    
 }
</style>    
<table class="table-striped sortable" >
<thead>
<tr>
    <th scope="col" >Year </th>
    <th scope="col" >Date </th>
<!--
    <th scope="col" >First Name </th>
     <th scope="col">Last Name </th>
-->
        <th scope="col">Email </th>
    

</tr>
</thead>

<tbody>
<?php
   // define("TABLE_PAYPAL","paypal");  
    $y = $theYEAR-1;
//    $_y = YEAR-1;
    $m = MEMBERS($y);
//    $_m = MEMBERS($_y);
    echo ("<h1>Members for $y ($m total) </h1>" );
//  echo ("Members for $y ($m) and $_y ($_m) " );
    
    
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
        $hashtable=[];
        //print( "configure");
        $con = Configure();

//       $query = "select * from ".TABLE_PAYPAL." where year=$YEAR order by lname limit 30 ";
        $_YEAR = $YEAR-1;
//      $query = "select * from ".TABLE_PAYPAL." where year=$YEAR order by lname ";
        $query = "select * from ".TABLE_PAYPAL." where year=$_YEAR order by date desc ";

//        $query = "select * from ".TABLE_PAYPAL." where ( year BETWEEN $_YEAR and $YEAR ) order by lname ";
        DEBUG( $query);
        echo ($_YEAR);
        
         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  
                    
                         
                      if($row['email'] == "") continue;
// RWO Fix (no more url in table)
//                    if($row['email'] == "" and $row['url']=="") continue;
//                    if($row['url']!= "") $url="@".$row['url'];

                    if( array_key_exists( $row['email'], $hashtable) ) continue;
                    if(strlen( $row['email']) < 3 ) continue;

                    echo("<tr> ");
                
                    echo("<td>");
                    echo($row['year']);
                    echo("</td>");

                    echo("<td>");
                    $custom=$row['date'];
                    $dt = new DateTime("@$custom");
                    $date = ltrim($dt->format('m/d/Y'),0);
                    echo($date);
                    echo("</td>");

/*
                    echo("<td>");
                    echo($row['fname']);
                    echo("</td>");


                    echo("<td>");
                    echo($row['lname']);
                    echo("</td>");
*/
                    echo("<td>");
                    echo( strtolower($row['email']) );
                    echo("</td>");

                    echo("</tr> ");

                    $hashtable[$row[EMAIL]] =$row[FNAME]." ".$row[LNAME] ;
                    }
//                    echo("<tr>");
//                    echo("<td>&nbsp;<td><td><td>");
//                    echo("</tr>");

            }

            memberlist($theYEAR);
//            if(YEAR>=2024)
 //           memberlist(YEAR-1);



//        print("\t\t\t RES: $res / NONRES: $non ");
?>
 </body>
</table>


