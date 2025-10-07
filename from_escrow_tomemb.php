<?php


include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";


//print_r($_POST);



/*
define("RETURN_URL_SIGNUP","http://www.sctennisclub.net/signup_/done");
define("CANCEL_URL_SIGNUP","http://www.sctennisclub.net/signup_/cancel");
define("NOTIFY_URL_SIGNUP","http://www.sctennisclub.net/signup_/notify");
*/


//DEBUG("notify:" . NOTIFY_URL);



if (isset($_POST['escrow'])) {
    $selected = $_POST['escrow'];

    echo "You selected the following options:<br>";
    foreach ($selected as $option) {
        echo $option . "<br>";
    }
} else {
    echo "No options were selected.<br>";
}

echo "POST[action]=".$_POST["action"];
//echo "valaue=".$_POST["value"];

/*
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$gender = "-";
$ntrp   = "-";
$member = "-";
*/

// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;
$theTABLE = "paypal";

//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

$year=2025;
//unused fields
$gender=$ntrp=$address=$city=$zip =$team =$opt=$pwd="-";
$mtype=$phone=$code="-";
//$payment=$paid;

$insignia="";

//toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);
/*
$data = array(
	'year' => $year,
	'fname' => $fname,
    'lname' => $lname,
	'email' => $email,
	'event' => $event,
	'gender' => $gender,
	'ntrp' => $ntrp,
	'address' => $address,
	'city' => $city,
	'zip' => $zip,
	'team' => $team,
	'mtype' => $mtype,
	'date' => $custom, // $date,
	'insignia' => $insignia,
	'payment' => $payment,
	'custom' => $custom,
    'opt' => $opt,
    'pwd' => $pwd,
    'subject' => "Hokkaido Buffet Signup: $fname $lname (pending)",
    'message' => "Hokkaido Buffet Signup: $fname $lname (pending)"

);
*/
// SENDER( $data );

$fname="Ro";
$lname="Okamoto";
$subject= "Membershp";
$message = "$fname $lname signed up";
$recipient = "south@sctennisclub.org";

$res=true;
if($res == true) {

//  phpemailer($subject,$message , $recipient );
//  print_r( $data );

//  toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

}



?>

