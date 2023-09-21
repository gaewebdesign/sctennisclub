<?php
include "../library/include.inc";

/*
function SENDER( $data ){


    $url = "http://www.goldengatetennisclub.org/ggtc/email_/receive.php";
    $ch = curl_init( $url );


    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//      curl_setopt( $ch  , CURLOPT_POSTFIELDS, $data );
    curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    curl_close($ch);
    TEXT("sent to $url");

}
*/

$URL = "http://www.sctennisclub.net/test_/receive.php";

$URL = "http://localhost/~ro/boot/test_/receive.php";
$URL = "http://www.goldengatetennisclub.org/ggtc/email_/receive.php";


TEXT("sending to ". $URL);
$fname = "Barbara";
$lname = "Bardot";
$epoch = 9138668760011;
$custom = time()-60*60*7;

$subject = "Athena Signup $fname $lname";
$message = $subject."<p>";


$data = array(
    'fname' => $fname,
    'lname' => $lname,
    'epoch' => $epoch,
    'address' => '1 Duane',
    'city' => 'Santa Clara',
    'custom' => $custom,
    'mtype' => "RS",
    'subject' => $subject,
    'message' => $message


);
    print_r($data);
    SENDER(  $data);

    return;

        TEXT("$custom");
        $dt = new DateTime("@$custom");
        $date = ltrim($dt->format('m/d/Y '),0);
        TEXT("date = $date");

        $payload = json_encode(array("user" => $data));
   
        $ch = curl_init( $URL );

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//      curl_setopt( $ch  , CURLOPT_POSTFIELDS, $data );
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        TEXT($response);
        curl_close($ch);
        TEXT("sent to $URL");

/* UNNECESSARY
/        /curl_setopt($ch, CURLOPT_URL, $URL);
//       curl_setopt( $ch  , CURLOPT_HEADER, true );
//       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//       curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//       curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
//       $obj = json_decode($response, $assoc= TRUE);
*/

?>