<?php


include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

include "./library/email/email.inc";
//define("PAYPAL_MAIL","treasurer@sctennisclub.org");

/*
define("FEE", "1");    // Resident Family
define("DB_MEMBERSHIP","sctc2019");
define("YEAR", "2023" );
define("EMAIL", "email" );
define("URL", "url" );
define("DATE", "date" );
define("CUSTOM", "custom" );
*/
/*
define("TABLE_MIXER", "mixer");
define("TABLE_MIXER_PENDING", "mixer_pending");
define("PAYPAL_MAIL","treasurer@sctennisclub.org");
*/
/*
class paypal{

	var $logfile='ipnlog.txt';
	var $form=array();
	var $log=0;
	var $form_action='https://www.paypal.com/cgi-bin/webscr';
	var $paypalurl='www.paypal.com';
	var $type='payment';
	var $posted_data=array();
	var $action='';
	var $error='';
	var $ipn='';
	var $price=0;
	var $payment_success=0;
	var $ignore_type=array();

    function add($name,$value)
	{
		$this->form[$name]=$value;
	}

    function remove($name)
	{
		unset($this->form[$name]);
	}

    function enable_payment()
	{
		$this->type='payment';
		$this->remove('t3');
		$this->remove('p3');
		$this->remove('a3');
		$this->remove('src');
		$this->remove('sra');
		$this->add('amount',$this->price);
		$this->add('cmd','_xclick');
		$this->add('no_note',1);
		$this->add('no_shipping',1);
		$this->add('currency_code','USD');
		$this->add('notify_url',$this->ipn);
	}
 

    function output_form()
	{

		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'
		. '<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Redirecting to PayPal...</title></head>'
		.'<body onload="document.f.submit();"><h3>Redirecting to PayPal...</h3>'
		. '<form name="f" action="'.$this->form_action.'" method="post">';

		foreach($this->form as $k=>$v)
		{
			echo '<input type="hidden" name="' . $k . '" value="' . $v . '" />';
		}

		//echo '<input type="submit" value="Click here if you are not redirected within 10 seconds" /></form></body></html>';


	}   
    }
*/

//print_r($_POST);

$paypal = new paypal();
$event="2025 Oraje Baja";
$insignia="-";

/*
if($_POST["dinner"] == "chicken" ) {
	$event ="Chicken Souviaki Plate";
} else if($_POST["dinner"] == "salmon"){
	$event ="Salmon";

} else if($_POST["dinner"] == "veg"){
	$event ="Vegetarium Mousaka";

} else if($_POST["dinner"] == "gyro"){
	$event ="Gyro Plate";
} else{

	echo "<script>alert(\"Select a dinner \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="./signup.html";
                 }, 100);
              </script>
                ');
		return;

}
*/
//$paid = 0.5; // MEMBER_FEE;    // for consistency override whatever was posted

$paid= MAY_MIXER_FEE;
$paid = $_POST["cinco"]; 
// OVERRIDE PRICE

if( preg_match("/usta/i", $_POST["email"] )) $paid="0.01";

//echo( $_POST["email"] );
//echo( preg_match("/usta.com/i", $_POST["email"] ) ) ;


$paypal->price = $paid;

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","SCTC Orale Baja Mixer: ".$event);
$paypal->add("quantity",1);

/*
define("RETURN_URL_SIGNUP","http://www.sctennisclub.net/signup_/done");
define("CANCEL_URL_SIGNUP","http://www.sctennisclub.net/signup_/cancel");
define("NOTIFY_URL_SIGNUP","http://www.sctennisclub.net/signup_/notify");
*/


$paypal->add("return",RETURN_URL_SIGNUP);
$paypal->add("cancel_return",CANCEL_URL_SIGNUP);
$paypal->add("notify_url",NOTIFY_URL_SIGNUP);

DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$gender = "-";
$ntrp   = "-";
$member = "-";

$opt="N";
if ( isset($_POST['vegan']) ) {
   $opt="V";
}

//   echo $_POST["fee"];
//   print_r($_POST);
//   print("vegan opt = $opt");


   // ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);
$date = $custom;


//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

$year=YEAR;
//unused fields
$gender=$ntrp=$address=$city=$zip =$team = $pwd="-";
$mtype=$phone=$code="-";
$payment=$paid;



$subject = "Ojeja lunch signup";
$message = "($fname $lname) tried to signup";
$to="south@sctennisclub.org";
phpemailer( $subject, $message, "tennis.mutt@gmail.com" ,$to);

//function phpemailer($_SUBJECT, $_MESSAGE ,$_TOEMAIL ="mnscuo.mutt@gmail.com", $_TOEMAIL2="mnscuo.mutt@gmail.com"){

$theTABLE = TABLE_MIXER_PENDING;
toDB ($theTABLE,$year,$fname,$lname,$email,$event,$gender,$ntrp,$address,$city,$zip,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);


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
    'subject' => "Orale signup: $fname $lname (pending)",
    'message' => "Orale signup: $fname $lname (pending)"

);

//print_r($data);

//return;

SENDER( $data );

//EMAILER($fname." ".$lname, $email, "Year-end Dinner => $theTABLE ");

//copyto( TABLE_MIXER_PENDING,  TABLE_MIXER_PAYPAL, $custom);
//print_r($paypal);

$paypal->output_form();
// 
// ***********************************************************************************

/*

DROP TABLE IF EXISTS `mixer_pending`;


CREATE TABLE `mixer` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(31) DEFAULT NULL,
  `lname` varchar(31) DEFAULT NULL,
  `gender` varchar(4) DEFAULT NULL,
  `ntrp` varchar(4) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `member` varchar(10) DEFAULT NULL,
  `paid` varchar(10) DEFAULT NULL,
  `date` varchar(31) DEFAULT NULL,
  `custom` int DEFAULT NULL,
  `division` varchar(31) DEFAULT NULL,
  `event` varchar(31) DEFAULT NULL, 
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3621 DEFAULT CHARSET=latin1;

*/

?>