<?php




  include  "../library/include.inc";
  include "../library/email/email.inc";
  //include "../library/email/test.inc";



function checker(){

//    $user = $_POST["user"];

//    $state = $_POST["state"];
//

    LOGGER("TEST checkemail.php " );

    $subject = "EMAIL Check ";
    $message = "using a php program to programtically send multiple copies of an email to one address \n";
    $messsage .= "thereby by-passing whatever limits an email program imposes";

    
    $toemail1 = "tennis.mutt@gmail.com";
    $toemail2 = "tennis.mutt@gmail.com";

    phpemailer($subject, $message ,$toemail1 , $toemail2);




}


checker();
echo ("email sent");

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
