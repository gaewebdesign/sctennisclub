<?php




  include  "../library/include.inc";
  include "../library/email/email.inc";



function checker(){

    $user = $_POST["user"];
//    $pw = $_POST["pw"];
//    $state = $_POST["state"];


//
    LOGGER("checkemail.php looking for $user in database " );

    $subject = "Membership Check ($user )";
    $message = "$user  check\n";
    
    $toemail1 = "tennis.mutt@gmail.com";
    $toemail2 = "santaclarawebmaster@gmail.com";
    
    phpemailer($subject, $message ,$toemail1 , $toemail2);


    $retv= CHECK_EMAIL( $user);

    LOGGER("checkemailphp retv = $retv " );
    if( $retv == true){
        LOGGER("checkemailphp checker  = yes " );
        echo "yes";
    }else{
        LOGGER("checkemailphp checker  = no " );
        echo $user;

    }


}


checker();
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
