<?php




  include  "../library/include.inc";
  include "../library/email/email.inc";



function checker(){

    $user = $_POST["user"];
    $pw = $_POST["pw"];
//    $state = $_POST["state"];

    LOGGER("checker ***");
//    

    $subject = "Membership Check ($user )";
    $message = "$user \n";
    $message .= $_SERVER['REMOTE_ADDR'];
    $message .= "\n";
    
    LOGGER( " $message " );
    $toemail1 = "south@sctennisclub.org";
    $toemail2 = "south@sctennisclub.org";
    

    $user = htmlentities($user);
    if(filter_var($user, FILTER_VALIDATE_EMAIL)) {
        LOGGER("checkemail.php valid format ");
        //Valid email!
        
        phpemailer($subject, $message ,$toemail1 , $toemail2);
        echo "yes";

   }else{
         $message = "$user  invalid\n";
         LOGGER("checkemail.php invalid format ");
         $user="invalid";

        $subject .= " invalid";
        phpemailer($subject, $message ,$toemail1 , $toemail2);
        LOGGER("checkemail.php checker  = no  for $user ");
        echo $user;
    }

/*
    $retv= CHECK_EMAIL( $user);
    

    LOGGER("checkemailphp retv = $retv " );
    if( $retv == true)
        LOGGER("checkemail.php checker  = yes " );
        phpemailer($subject, $message ,$toemail1 , $toemail2);
        echo "yes";
    }else{
        $subject .= " invalid";
        phpemailer($subject, $message ,$toemail1 , $toemail2);
        LOGGER("checkemail.php checker  = no  for $user ");
        echo $user;

    }
*/

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
