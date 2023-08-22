<!--
Thank you for contacting us today and allowing me to assist you.

Your success is important to us and we value your business. If you have any further questions, please do not hesitate to contact us as we are here 24/7 365 for you.

You should have an option to leave feedback on this chat in the chat window or possibly receive an email, please fill that out, we would really appreciate it.

Have a great rest of your day!

Please Note: Starting May 1st, our phone availability will change from 24/7 to Monday through Friday 9AM to 9PM EST.
-->

<style>
   tr {
    line-height: 5px;
    min-height: 5px;
    height: 5px;
    color: blue;
    font-size : small;
 }
</style>    
<table class="table">
<thead>
<tr>


</tr>
</thead>

<tbody>
<?php
    define("TABLE_PAYPAL","paypal");  

    $res=0;
    $non=0;
    
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


    function members($YEAR){

        global $res,$non;
        //print( "configure");
        $con = Configure();

        $query = "select * from ".TABLE_PAYPAL." where year=$YEAR order by lname limit 30 ";
//        print( $query."<br>");
        
         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  

                    if( preg_match("/santa|clara/i",$row[CITY])) 
                    $res +=1;
                      else
                    $non +=1;      
                    if($row['email'] == "" and $row['url']=="") continue;

                    echo("<tr> ");
                
                    echo("<td>");
                    echo($row['year']);
                    echo("</td>");

                    echo("<td>");
                    echo($row['fname']);
                    echo("</td>");

                    echo("<td>");
                    echo($row['lname']);
                    echo("</td>");

                    echo("<td>");
                    echo($row['email']);
                    echo("</td>");

                    echo("</tr> ");

                    }

            }


            members(2024);


//        print("\t\t\t RES: $res / NONRES: $non ");
?>
 </body>
</table>


