<?php




  include  "../library/include.inc";
  include "../library/email/email.inc";



function checker(){

    $user = $_POST["user"];
    $pw = $_POST["pw"];
//    $state = $_POST["state"];


//
    LOGGER("checkemail.php looking for $user /$pw in database " );

    $subject = "Membership Check ($user )";
    $message = "$user  check\n";
    
    $toemail1 = "mutt@sctennisclub.org";
    $toemail2 = "sherry@sctennisclub.org";
    


    $user = htmlentities($user);
    if(filter_var($user, FILTER_VALIDATE_EMAIL)) {
        LOGGER("checkemail.php valid format ");
        //Valid email!
   }else{
         $message = "$user  invalid\n";
         LOGGER("checkemail.php invalid format ");
         $user="invalid";
    }

    $retv= CHECK_EMAIL( $user);

    LOGGER("checkemailphp retv = $retv " );
    if( $retv == true){
        LOGGER("checkemailphp checker  = yes " );
        phpemailer($subject, $message ,$toemail1 , $toemail2);
        echo "yes";
    }else{
        $subject .= " invalid";
        phpemailer($subject, $message ,$toemail1 , $toemail2);
        LOGGER("checkemailphp checker  = no  for $user ");
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
