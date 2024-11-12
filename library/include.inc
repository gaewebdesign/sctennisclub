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


define("TABLE_TEAMTENNIS", "teamtennis");
define("TABLE_TEAMTENNIS_PENDING", "teamtennis_pending");



define ("YEAR" , "2025");
//define("RES_FEE" , "25" );
define("RES_FEE" , ".01" );
//define("RES_FEE" , "25" );

define("NONRES_SINGLE_FEE" , "35" );
define("NONRES_FAMILY_FEE" , "45" );

define("ADDITIONAL_MEMBER_FEE" , ".99" );

define("DINNER" , "25" );
define("MAY_MIXER_FEE", "10.00" );

define("TENNIS_ICECREAM_FEE" , "10.00");
define("ICECREAM_FEE" , "5.00");

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

// Use for teamtennis
define("RETURN_URL_TEAMTENNIS","http://www.sctennisclub.org/teamtennis_/done.php");
define("CANCEL_URL_TEAMTENNIS","http://www.sctennisclub.org/teamtennis_/cancel.php");
define("NOTIFY_URL_TEAMTENNIS","http://www.sctennisclub.org/teamtennis_/notify.php");

define("TEAMTENNIS_MEMBER_FEE" , ".01");
define("TEAMTENNIS_GUEST_FEE" , "10");



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

// used for USTA Team registration register_/registerlist.php)
define("TABLE_REGISTER", "register" );
define("USTATEAM", "team" );

define("DAYTIME", "daytime" );

define("RESCAPTAIN", "rescaptain" );
define("RESPREV", "resprev" );
define("RESCOUNT", "rescount" );
define("PREFERENCE","preference");

function alert($v){
	echo "<script>alert($v)</script>";

}

function DEBUG($message){
   echo( $message );

 }

 function TEXT($message){
    print("<br>");
    print( $message );

 }

//define("PAYPAL_MAIL","treasurer@sctennisclub.org");
define("TABLE_LADDER","ladder");

function CHECK_LADDER_EMAIL($_EMAIL,$_G="M"){

  $con = DBMembership();
  $theTABLE = TABLE_LADDER;
  $YEAR=YEAR;
  
  $query = "select * from $theTABLE where year=$YEAR and email1=\"$_EMAIL\" and gender1=\"$_G\" ";
  
  //echo $query;
  LOGGER($query);
  
  $qr=mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($qr);
  //print_r($row);
  $ret=false;
  if( isset($row)) $ret=true;

   return $ret;

}

function CHECK_EMAIL($_EMAIL ){

  $con = DBMembership();
  $theTABLE = TABLE_PAYPAL;
  $YEAR=YEAR-1;
  
  $query = "select * from $theTABLE where year>=$YEAR and email=\"$_EMAIL\" ";

  LOGGER("include.inc $query" );
  $qr=mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($qr);
  //print_r($row);
  $ret=false;
  if( isset($row)) $ret=true;

  LOGGER("include.inc CHECK_EMAIL returning $ret " );
  return $ret;

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
 
 ///print("<br>".$query."<br>");
 
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

    $zip = substr($zip, 0,5);


     $query = 'insert into '.$theTABLE.'(_id,year,fname,lname,email,event,gender,ntrp,address,city,zip,team,mtype,date,insignia,payment,custom,opt,pwd) values';
     $query .= '(NULL'.add($year).add($fname).add($lname).add($email).add($event).add($gender).add($ntrp).add($address).add($city).add($zip);
    $query .= add($team).add($mtype).add($date).add($insignia).add($payment).add($custom).add($opt).add($pwd);
    $query .= ")";

  
  LOGGER( $query );
  
  $query_results=mysqli_query($con, $query);

}

// Captain registers team
function toRegisterDB($theTABLE, $fname,$lname,$team, $ntrp , $daytime , $email,$rescaptain,$resprev , $rescount, $year , $date, $insignia, $custom, $pwd)
{
  

   $con = DBMembership();

   $query = 'insert into '.$theTABLE.'(_id,fname,lname,team,ntrp,daytime,email,rescaptain, resprev, rescount,year,date,insignia,custom,pwd) values';

   $query .= '(NULL'.add($fname).add($lname).add($team).add($ntrp).add($daytime).add($email).add($rescaptain).add($resprev).add($rescount);
   $query .= add($year).add($date).add($insignia).add($custom).add($pwd);
   $query .= ")";

//   echo($query);
   LOGGER("testing REGISTER");
   LOGGER($query);
// print("\r\n".$query."\r\n");

 // insert into DB
  $query_results=mysqli_query($con, $query);
  
  //$query = "update $theTABLE set insignia = insignia +1 where date = $custom";
 // $query_results=mysqli_query($con, $query);

} 

function Sanitize($v)
{

//    $FILTER = FILTER_SANITIZE_ENCODED | FILTER_SANITIZE_SPECIAL_CHARS | FILTER_SANITIZE_FULL_SPECIAL_CHARS;
//    $v = filter_var( $v, $FILTER );
  $v = str_replace(['"',",", "$", "%", "*", "~", "'", "=", "{", "[", "|", "`", "^", "]", "}", ":", ";", "<", ">", "/", "?", "&"], "", $v );
//    $v = str_replace([",",  "$", "%", "~", "'", "=", "{", "[", "|", "`", "^", "]", "}", ":", ";", "<", ">", "/","\\", "?", "&"], "", $v );
    return $v; 

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
          $PASSWORD="Roger.Okamoto";
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


// this woud also work if tournament ever becomes paid service
function copyto_teamtennis( $src, $dest, $epoch){
  
  LOGGER("copyto_teamtennis");
  
  $query = "insert into $dest (fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,date,payment,custom,opt) ";
  $query .=            "select fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,date,payment,custom,opt ";
  $query .= " from $src where custom=$epoch";

  $con = DBMembership();

  //LOGGER( $query);  
  $query_results=mysqli_query($con,$query);

  $query = "update $src set custom='done' where custom=$epoch";
  //LOGGER( $query);  this causes error
  $query_results=mysqli_query($con,$query);


 }



// copies from teamtennis_pending to teamtennis
function copyto_teamtennis__deletethis( $src, $dest, $epoch){
  
  //function toDB($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){
  LOGGER("copyto called with $src ----> $dest  for $epoch");
  
  $query = "insert into $dest (fname1,lname1,email1,ntrp1,fname2,lname2,email2,ntrp2) ";
  $query .=            "select fname1,lname1,email1,ntrp1,fname2,lname2,email2,ntrp2 ";
  $query .= " from $src where custom=$epoch";

   TEXT($query);
 
  $con = DBMembership();

  LOGGER( $query);  
  $query_results=mysqli_query($con,$query);

  $query = "update $src set custom='done' where custom=$epoch";
  LOGGER( $query); 
  $query_results=mysqli_query($con,$query);

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
  
  $junk = 234;

  // return false means non-residents not permitted 
  return false;      // no non-residents until 2025
  //return true;  
  
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

function CHECK_CAPTCHA(){

  return CAPTCHA_CHECKOUT();

}

// Completely Automated Public Turing Test to tell Computers and Humans Aparat
function CAPTCHA_CHECKOUT() {

  
  LOGGER("CAPTCHA_CHECKOUT");

  // Checking valid form is submitted or not 
if (isset($_POST['SubmitButton'])) { 
   
  LOGGER("INSIDE if _POST");

  // Storing name in $name variable 
//$name = $_POST["fname"]."  " .$_POST["lname"]; 

// Storing google recaptcha response 
// in $recaptcha variable 
$recaptcha = $_POST['g-recaptcha-response']; 

// Put secret key here, which we get 
// from google console 
$secret_key = '6LdoCf4pAAAAAArgp6FUOA7Rn0j7_Jle-2dL-cUF'; 

// Hitting request to the URL, Google will 
// respond with success or error scenario 
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
  . $secret_key . '&response=' . $recaptcha; 

// Making request to verify captcha 
$response = file_get_contents($url); 

// Response return by google is in 
// JSON format, so we have to parse 
// that json 
$response = json_decode($response); 


// Checking, if response is true or not 
if ($response->success == true) { 

  LOGGER("captcha response-> sucess is true ");
//      echo '<script>alert("Summer 2024 \nSanta Clara Tennis Club \n Pigout  \nYou\'re signed up!")</script>'; 

      return true;
} else { 
//    echo '<script>alert("Fill out the  the  reCAPTACHA")</script>'; 
      LOGGER("captcha response-> sucess is false ");
      return false;
} 
} 


}


function MESSAGE_ALERT( $message , $href=""){

  echo "<script>alert('$message');</script>";
/*
  echo('
    <script >
       window.setTimeout(function() {
        window.location.href=".$href;
    }, 500);
    </script>
  ');
*/
  //$href = "./ladder.phtml?mode=2";
//  window.location.href="../ladder.phtml?mode=2";

}
function REDIRECT_ALERT( $url){

    $MESSAGE = "<script>";
    $MESSAGE .= "window.setTimeout(function() {";
    $MESSAGE .= "window.location.href=\"$url\"";
    $MESSAGE .= "},100);";
    $MESSAGE .= "</script>";

    echo $MESSAGE;

}







 ?>
