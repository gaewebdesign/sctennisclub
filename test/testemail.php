<?php




  include  "../library/include.inc";
  //include "../library/email/email.inc";
  include "../library/email/test.inc";



function checker($date ){

//    $user = $_POST["user"];

//    $state = $_POST["state"];
//

    LOGGER("TEST checkemail.php " );

    $subject = "EMAIL Check $date ";
    $message = "using a php program to programtically send multiple copies of an email to one address within a tight loop\n";
    $message .= "making it appear that several copies are sent at once, but they're actually sent separately\n ";

   
    $message .= "Time check: $date ";
    
    
    $toemail1 = "tennis.mutt@gmail.com";
    $toemail2 = "tennis.mutt@gmail.com";

    $last=0;
    while($last++ < 5)
      phpemailer($subject.($last), $message ,$toemail1 , $toemail2);




}

$custom = time()-60*60*7;
$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y H:i:s '),0);



checker($date );
echo ("email sent $date");

//$retv= "yes";
//echo $retv;
//LOGGER( "checkmail.php retv=$retv");
/*
$response_array["status"] = "empty";
if( $retv == true){
    $response_array["status"] = "success";
    LOGGER("checkemail.php  status(success) = ".$response_array["status"]);
    return $response_array;
}else{
    $response_array["status"] = "error";
    LOGGER("checkemail.php  status(error) = ".$response_array["status"]);

    return $response_array;

}
*/

?>