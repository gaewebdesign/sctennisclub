<?php
/*


 insert into logger values (NULL,'update pending set custom="done" where custom="1692146269" limit 1');


*/

// FOR MEMBERSHIP 
define("TABLE_GGTC_PAYPAL","ggtc_paypal");  
define("TABLE_GGTC_PENDING","ggtc_pending"); 

// for mixers,
define("TABLE_GGTC_MIXER", "ggtc_mixer");
define("TABLE_GGTC_MIXER_PENDING", "ggtc_mixer_pending");
define("TABLE_GGTC_MIXER_FREE", "ggtc_mixer_free");

define ("YEAR" , "2024");
define("RES_FEE" , "0.05" );
define("NONRES_SINGLE_FEE" , "0.10" );
define("NONRES_FAMILY_FEE" , "0.15" );

define("ADDITIONAL_MEMBER_FEE" , "0.20" );

define("DINNER" , ".10" );

/*
define("RETURN_URL","http://www.sctennisclub.org/signup/done");
define("CANCEL_URL","http://www.sctennisclub.org/signup/cancel");
define("NOTIFY_URL","http://www.sctennisclub.org/signup/notify.php");
*/
//define("PAYPAL_MAIL","treasurer@sctennisclub.org");
define("PAYPAL_MAIL","treasurer@sctennisclub.org");

// URL for membership return
// this requires .htaccess in each directory
define("RETURN_URL","http://www.sctennisclub.org/join_/done.php");
define("CANCEL_URL","http://www.sctennisclub.org/join_/cancel.php");
define("NOTIFY_URL","http://www.sctennisclub.org/join_/notify.php");

// URL for signup_ return  (May Social, Ice Cream , End of year Dinner)
// this requires .htaccess in each directory
define("RETURN_URL_SIGNUP","http://www.sctennisclub.org/signup_/done.php");
define("CANCEL_URL_SIGNUP","http://www.sctennisclub.org/signup_/cancel.php");
define("NOTIFY_URL_SIGNUP","http://www.sctennisclub.org/signup_/notify.php");
//define("NOTIFY_URL_SIGNUP","http://www.sctennisclub.org/signup/redirect.php");




define("FNAME", "fname" );
define("LNAME", "lname" );
define("GENDER", "gender" );
define("NTRP", "ntrp" );
define("EMAIL", "email" );

define("TEAM", "team" );
define("MTYPE", "mtype" );
define("PAYMENT", "payment" );

define("ADDRESS", "address" );
define("CITY", "city" );
define("ZIP", "zip" );
define("DATE", "date" );
define("CUSTOM", "custom" );

define("INSIGNIA", "insignia" );
define("OPT", "opt" );

define("NRF","NRF");


define("PHONE","phone");

define("USER","user");

define("PWD","pwd");


function alert($v){
	echo "<script>alert($v)</script>";

}

function DEBUG($message){
  // echo( $message );
  // echo("<br>");
  // echo("\n");

 }

 function TEXT($message){
    print("<br>");
    print( $message );

 }

 function RESIDENT_MATCH( $_CITY){
  
    if(preg_match("/santa/i",$_CITY) and  preg_match("/clara/i",$_CITY )){
    return true;
  }

  return false;

}
 
function LOGTEXT($text){

  TEXT($text);
  LOGGER($text);

}

 function LOGGER( $text )
 {
 
 
 $query = "insert into logger values (NULL,";
 
 $query .= "'";
 $query .= $text;
 $query .= "'";
 $query.= ')';
 
 //print("<br>".$query."<br>");
 
 $con = DBMembership();
 $qr = mysqli_query($con, $query );
 
 
 }

 

 function add ($p)
 {
   return ',"'.$p.'"';
 }

 function savetoDB(){
 
 
  echo "to DB";

  
}


//function toMemberDB($theTABLE, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team, $mtype,$date,$insignia,$payment,$custom,$opt)
function toMemberDB($theTABLE, $year,$fname,$lname,$address,$city,$zip,$phone,$email,$gender,$ntrp,$payment,$mtype,$date,$insignia,$custom,$user,$pwd)
{
  
 // compared to mixer.. these are the extra keys
 // address, city, state
 
   TEXT("toMemberDB");

   $con = DBMembership();


   $query = 'insert into '.$theTABLE.'(_id,year,fname,lname,address,city,zip,phone,email,gender,ntrp,payment,mtype,date,insignia,custom,user,pwd) values';

  
  $query .= '(NULL'.add($year).add($fname).add($lname).add($address).add($city).add($zip).add($email).add($gender).add($ntrp).add($payment);
  $query .= add($mtype).add($date).add($insignia).add($custom).add($user).add($pwd);
  $query .= ")";
  
  TEXT($query);
/*
  LOGGER($query);

  //print("<br>".$query);
  LOGGER($query);

  $query_results=mysqli_query($con, $query);
  
  $query = "update $theTABLE set insignia = insignia +1 where date = $custom";
  $query_results=mysqli_query($con, $query);

*/
} 


function toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event){

//  LOGTEXT("toDB");
  
  $con = DBMembership();

  $query = 'insert into '.$theTABLE.'(_id,fname,lname,gender,ntrp,email,member,paid,date,custom,event) values';
  $query .= '(NULL'.add($fname).add($lname).add($gender).add($ntrp).add($email).add($member).add($paid);
  $query .= add($date).add($custom).add($event) ;
  $query .= ")";

//  echo "<br>";
  LOGGER( $query );
//  TEXT($query);
  $query_results=mysqli_query($con, $query);

}

function DBMembership() {

  return  Configure();
  

}

function Configure()
 {
          
        $HOST = "127.0.0.1";
        $USER = "root";      // on my localhost
        $PASSWORD = "tomato1349";
        $DB= "southb56_ggtc";
           
        if(strstr($_SERVER["SERVER_NAME"],"sctennis")){
          $USER  = "southb56_ggtc";    // inmotion
        } 
        
 //       echo($HOST." -- ".$USER." - ".$DB." - ".$PASSWORD." <br>" );
  
   
        $con = mysqli_connect($HOST,$USER, $PASSWORD);
       // echo($con);
        
        if (!$con) {
                    echo("CONNECTION ERROR<br>");
                    die('Could not connect: ' . mysqli_connect_error());
                 }else{

                 }

                $ret = mysqli_select_db($con,$DB );
                if(!$ret){
                  echo( "mysqli_connect_error() ");
                  echo( mysqli_connect_error() );
                  echo( "<br>");
                }

                
                return $con;
          }

// will copy and increment _id  
/*
INSERT INTO table_name1 (columns) 
SELECT columns FROM table_name2;
*/
function copyto( $src, $dest, $epoch){
  
  
  
  $query = "insert into $dest(fname,lname,email,url,gender,ntrp,code,phone,address,city,zip,";
  $query .= "state,year,capt,team,mtype,help,other,date,insignia,payment, custom,opt,pwd)";
  
  $query .= "select fname,lname,email,url,gender,ntrp,code,phone,address,city,zip,";
  $query .= "state,year,capt,team,mtype,help,other,date,insignia,payment, custom,opt,pwd ";

  $query .= " from $src where custom=$epoch";

 
  $con = DBMembership();

  LOGGER( $query);
 // TEXT($query);
  $query_results=mysqli_query($con,$query);

  $query = "update $src set custom='done' where custom=$epoch";
  LOGGER( $query); 
  $query_results=mysqli_query($con,$query);

}
 
// mixer has a different table structure than membership
function copyto_mixer($src,$dest,$epoch){

  
  $query = "insert into $dest(fname,lname,gender,ntrp,email,member,paid,date,custom,division,event)";
  
  $query .= " select fname,lname,gender,ntrp,email,member,paid,date,custom,division,event ";
  $query .= " from $src where custom=$epoch";

 // TEXT( $query);  
  $con = DBMembership();
  $query_results=mysqli_query($con,$query);



}






 function Members($_YEAR){
   $con = DBMembership();
   $query = "select * from ".TABLE_PAYPAL." where year = ".$_YEAR;
   $query_results=mysqli_query($con,$query);
   $n = mysqli_num_rows($query_results);

   return $n;

  }

  




function EMAILER($subject, $message, $verbose=false)
{

   //$to = "santaclarawebmaster@gmail.com";
   $to = "notify@sctennisclub.org";
   $to = "treasurer@sctennisclub.net";

//   $to = "tennis.mutt@gmail.com";
   

// Put Paypal POST values into message
/*
     $message = "SCTC  Notification: <br>";
     $message .= "Paypal Parameters <br>";

   foreach ( $_POST as $key => $value)
      $message .= $key." -> ".$_POST[$key]."<br>";
*/

   $headers = 'From: memb@sctennisclub.org' . "\r\n" .
    'Reply-To: memb@sctennisclub.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Use this header
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: membership@sctennisclub.org  \r\n";

//   $subject .= $name;
   //$subject .= "KEY = ".$_POST[CUSTOM];

   TEXT("subject: $subject");
   TEXT("to: $to");   
   TEXT("message: $message");   


   $r=mail($to,$subject,$message,$headers);
   if($verbose) TEXT("mail return value = $r ");

}
 ?>
