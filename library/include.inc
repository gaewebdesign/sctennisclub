<?php
/*


 insert into logger values (NULL,'update pending set custom="done" where custom="1692146269" limit 1');


*/

// FOR MEMBERSHIP 
define("TABLE_PAYPAL","paypal");  
define("TABLE_PENDING","pending"); 

// for mixers,
define("TABLE_MIXER_PAYPAL", "mixer_paypal");
define("TABLE_MIXER_PENDING", "mixer_pending");
define("TABLE_MIXER_FREE", "mixer_free");

define ("YEAR" , "2024");
//define("RES_FEE" , "30" );
define("RES_FEE" , "25" );

define("NONRES_SINGLE_FEE" , "35" );
define("NONRES_FAMILY_FEE" , "45" );

define("ADDITIONAL_MEMBER_FEE" , ".99" );

define("DINNER" , "25" );

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


function toMemberDB($theTABLE, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$team, $mtype,$date,$insignia,$payment,$custom,$opt)
{
  
 // compared to mixer.. these are the extra keys
 // address, city, state

   $con = DBMembership();


   $query = 'insert into '.$theTABLE.'(_id,fname,lname,email,gender,ntrp,address,city,zip,year,team,mtype,date,insignia,payment,custom,opt) values';

  $query .= '(NULL'.add($fname).add($lname).add($email).add($gender).add($ntrp).add($address);
  $query .= add($city).add($zip).add($year).add($team).add($mtype).add($date).add($insignia).add($payment).add($custom).add($opt);
  $query .= ")";

  LOGGER($query);

  //print("<br>".$query);
  LOGGER($query);

  $query_results=mysqli_query($con, $query);
  
  $query = "update $theTABLE set insignia = insignia +1 where date = $custom";
  $query_results=mysqli_query($con, $query);

} 


function toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){

  $con = DBMembership();

     $query = 'insert into '.$theTABLE.'(_id,year,fname,lname,email,event,gender,ntrp,address,city,zip,team,mtype,date,insignia,payment,custom,opt,pwd) values';
     $query .= '(NULL'.add($year).add($fname).add($lname).add($email).add($event).add($gender).add($ntrp).add($address).add($city).add($zip);
    $query .= add($team).add($mtype).add($date).add($insignia).add($payment).add($custom).add($opt).add($pwd);
    $query .= ")";

  
  LOGGER( $query );
  
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
        $DB= "southb56_sctc";
           
        if(strstr($_SERVER["SERVER_NAME"],"sctennis")){
          $USER  = "southb56_rog";    // inmotion
        } 
        
 //       echo($HOST." -- ".$USER." - ".$DB." - ".$PASSWORD." <br>" );

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

// will copy and increment _id  
/*
INSERT INTO table_name1 (columns) 
SELECT columns FROM table_name2;
*/
function copyto( $src, $dest, $epoch){
  
  //function toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){
  LOGGER("copyto called with $src ----> $dest  for $epoch");
  
  $query = "insert into $dest (year,fname,lname,email,event,gender,ntrp,address,city,zip,team,mtype,date,insignia,payment,custom,opt,pwd) ";
  $query .=            "select year,fname,lname,email,event,gender,ntrp,address,city,zip,team,mtype,date,insignia,payment,custom,opt,pwd ";
  $query .= " from $src where custom=$epoch";

   TEXT($query);
 
  $con = DBMembership();

  LOGGER( $query);  
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

  TEXT( $query);  
  $con = DBMembership();
  $query_results=mysqli_query($con,$query);



}


// this won't properly work if there are duplicate _ids because it is a direct copy of a row
 function copyto2( $src, $dest, $epoch){
  
  

}


 function FindAddress($ADDRESS,$CITY)
 {
 
        $YEAR=YEAR; 
        $_city =  substr(trim($CITY),0,5);

//  LOOK  TABLE_PAYPAL for address and similar city
         $query = "select * from ".TABLE_PAYPAL.' where address = "'.trim($ADDRESS).'"';
 
//         select * from paypal where city regexp('san');
         $query.= " and (city regexp(\"$_city\" )    ) ";
         $query .= ' and ( mtype ="RF" or mtype = "NRF")';
         $query .= ' and year = "'.$YEAR.'"';   
 
 //        TEXT($query);

         $con = DBMembership();
         $query_results=mysqli_query($con, $query);
         $n = mysqli_num_rows($query_results);
  
         // FOUND matching address
         if($n > 0)  {
              $row = mysqli_fetch_assoc( $query_results);
              $fname = $row[FNAME];
              $lname = $row[LNAME];
              $epoch = $row[CUSTOM];
              $mtype = $row[MTYPE];
              $insignia = $row[INSIGNIA];
              $epoch = $row[DATE];

              // Check if already has a family member
              // applies only to NRF and if $opt has primary member id
              // INSIGNIA>1 
              // primary member contains the seconary member id
              // secondary member contains the primary id
              // this id is used to locate the primary member and
              // increment INSIGNIA
              // this is done in transfering from pending to paypal
              // on the return from Paypal 
              $primary_member = "($fname $lname $epoch $mtype $insignia $opt )";
              LOGGER("include.inc FindAddress: $primary_member");

              if($mtype == "NRF" && $insignia > 1){
                    LOGGER("include.inc: primary member:  $primary_member ");
                    LOGGER("include.inc: returning false because $insignia>1 ");
                    LOGGER("include.inc: no discount");

                    return false;
              }

              return $epoch;

            }
 
              return false;
 
 
 }

 function Members($_YEAR){
   $con = DBMembership();
   $query = "select * from ".TABLE_PAYPAL." where year = ".$_YEAR;
   $query_results=mysqli_query($con,$query);
   $n = mysqli_num_rows($query_results);

   return $n;

  }

  
  function Residents($_YEAR){
    $con = DBMembership();
    $query = "select * from ".TABLE_PAYPAL." where year = ".$_YEAR;
    $qr=mysqli_query($con,$query);
    $res=0;
    while ($row = mysqli_fetch_assoc($qr)) {  
      $city = $row[CITY];
      if(RESIDENT_MATCH ($city))
        $res++;

    }
     
      return $res;

  }

  function NonResidents($_YEAR){
    $m = Members($_YEAR);
    $res =  Residents($_YEAR);
    $non = $m - $res;
    
//    TEXT("residents: $res/$non total$m ");

    return $non;



  }
 
  function ResidentMajority($_YEAR){
  $res = Residents($_YEAR);
  $mem = Members($_YEAR);
  
  // return false means non-residents not permitted 
  return false;      // no non-residents until 2024

  
  if( $res>$mem-$res +1 ) return true;
  return false;

 }

 function SENDER( $data ){


  $url = "http://www.goldengatetennisclub.org/ggtc/email_/receive.php";
  $ch = curl_init( $url );


  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//      curl_setopt( $ch  , CURLOPT_POSTFIELDS, $data );
  curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);

  curl_close($ch);
//  TEXT("sent to $url");
//  print_r($data);

}


function EMAILER($subject, $message, $verbose=false)
{

   //$to = "santaclarawebmaster@gmail.com";
   $to = "notify@sctennisclub.org";
   $to = "santaclarawebmaster@gmail.com";
   LOGGER(" EMAILER: to $to ");

//   $to = "tennis.mutt@gmail.com";
   

// Put Paypal POST values into message
/*
     $message = "SCTC  Notification: <br>";
     $message .= "Paypal Parameters <br>";

   foreach ( $_POST as $key => $value)
      $message .= $key." -> ".$_POST[$key]."<br>";
*/

   $headers = 'From: membership@sctennisclub.org' . "\r\n" .
    'Reply-To: membership@sctennisclub.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Use this header
   $headers  = 'MIME-Version: 1.0' . "\r\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $headers .= "From: membership@sctennisclub.org  \r\n";

//   $subject .= $name;
   //$subject .= "KEY = ".$_POST[CUSTOM];

   LOGGER("subject: $subject");
   LOGGER("to: $to");   
   LOGGER("message: $message");   

   TEXT($to);
   TEXT($subject);
   TEXT($message);
   TEXT($headers);

   $r=mail($to,$subject,$message,$headers);
   $to = "tennis.mutt@gmail.com";
   TEXT("return value");
   TEXT($r);

   TEXT("send again to different address $to ");
   $r=mail($to,$subject,$message,$headers);

   if($verbose) LOGGER("mail return value = $r ");

}
 ?>
