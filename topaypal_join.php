<?php

include "./library/include.inc";
include "./library/paypal.inc";
include "./library/emailer.php";

define("PAYPAL_MAIL","treasurer@sctennisclub.org");
define("RETURN_URL","http://www.sctennisclub.org/signup/done");
define("CANCEL_URL","http://www.sctennisclub.org/signup/cancel");
define("NOTIFY_URL","http://www.sctennisclub.org/signup/notify.php");


//print_r($_POST);

$paypal = new paypal();



// echo "<script>alert(\"ZSanta Clara Resident\")</script>";

$paid = RES_FEE;
if($_POST["membership"] == 'RS' || $_POST["membership"] == "RF") {
	$paid =  RES_FEE;

//	echo("preg_match: ".preg_match("/santa|clara/i",$_POST[CITY] ) );
//	echo "<script>alert(\"Santa Clara Resident\")</script>";

	if(preg_match("/santa|clara/i",$_POST[CITY])){
		 DEBUG("Santa Clara resident" );
	}else{
		echo "<script>alert(\"must have Santa Clara address for resident fee \")</script>";
		echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="./join.html";
                 }, 100);
              </script>
                ');
	}


}else if($_POST["membership"] == 'NRS'){
	$paid =  NONRES_SINGLE_FEE;
}else if( $_POST["membership"] == 'NRF'){
	$paid =  NONRES_FAMILY_FEE;
}else{
	DEBUG("error");
}

//echo("preg_match: ".preg_match("/santa|clara/i",$_POST[CITY] ) );


//DEBUG("paypal -> price = $paid   < ---");

//$paypal->ipn = "http://www.sctennisclub.com/membership/pipn.php";

$paypal->enable_payment();
$paypal->add("currency_code","USD");
$paypal->add("business",PAYPAL_MAIL);
$paypal->add("item_name","SCTC Mixer");
$paypal->add("quantity",1);

$paypal->add("return",RETURN_URL);
$paypal->add("cancel_return",CANCEL_URL);
$paypal->add("notify_url",NOTIFY_URL);

DEBUG("notify:" . NOTIFY_URL);

$fname = $_POST[FNAME];
$lname = $_POST[LNAME];
$email = $_POST[EMAIL]; //"rwokamoto@gmail.com";   ///$_POST["email"];
$gender = $_POST[GENDER];
$ntrp   =$_POST[NTRP]; 
$member =$_POST["membership"];
$event = $_POST["event"];

$address = $_POST[ADDRESS];
$city = $_POST[CITY];
$zip = $_POST[ZIP];



// ********************************
// use this to identify person in database
$custom = time()-60*60*7;
// ********************************

$paypal->add("item_number"," $fname $lname " );
$paypal->add("custom", $custom );


$dt = new DateTime("@$custom");
$date = ltrim($dt->format('m/d/Y'),0);

//echo ("INSERT $fname $lname $paid $date $custom");
//toDB($theTABLE, $fname,$lname,$gender,$ntrp,$email, $member,$paid,$date,$custom,$event);

$date = $custom;
$mtype = $member ;
$payment = $paid;
$insignia = "0";
$year = YEAR ;      // defined in library/include.inc
$opt="911";

// Look for address and override $paid to 0.99 if address found
// FindAddress only searches for RF and NRF (without appended _)
// returns false if not found (also for NRF with 2)
$epoch=0;
if($epoch=FindAddress( $_POST[ADDRESS])){
		print("setting: this is legit ");
		$paid="0.99";         // discount
        $mtype .= "_";        // append to RF_ or NRF_
        $opt = $epoch;        // primary member  (this person gets INSIGNIA incremnted later in from_done.php )

}


$paypal->price = $paid;



// if $opt != 911, then this person is either RF_ or NRF_  
toMemberDB(TABLE_PENDING, $fname,$lname,$email,$gender,$ntrp,$address,$city,$zip,$year,$mtype,$date,$insignia,$payment,$custom,$opt);

//sendemail($fname." ".$lname, $email, "sctennisclub.net signup => $theTABLE ");

// copy to paypal table
// this done in return.php after Paypment payment
TEXT("*** Ok ****");
copyto(TABLE_PENDING,TABLE_PAYPAL,$custom);

//$paypal->output_form();


?>