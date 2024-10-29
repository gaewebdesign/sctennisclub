<!--  Email Spoofer v0.0.1 | MIT License | github.com/ShubhamBadal/email-spoofer  -->

<!doctype html>
<html>
<head>
	<title>Direct Mailer</title>
</head>
<body>
	
	<?php

	/* CONFIGURE PHP IF NEEDED */
	// ini_set("sendmail_from","$fromFull");
	// ini_set("SMTP","mail.smtp2go.com");

	// ini_set('username',"snake");
	// ini_set('password',"cobra");

	echo("***init*******<br>");

	$fromFull = "tennis.mutt@gmail.com";
	$fromFull = "webmaster@sctennisclub.org";

	ini_set("sendmail_from","$fromFull");	
	ini_set('smtp_port',25);

	ini_set('username',  "webmaster@sctennisclub.org");
	ini_set('password',  "webmaster.3722");
//	$mail->Password = "webmaster.3722";

	print_r(ini_get_all());



	//print_r(  ini_get_all("SMTP")  );
	//print_r(  ini_get_all("smtp")  );
	//print_r(  ini_get_all("smtp_port")  );
    
/*
	foreach ($ar as $key => $value) {
		echo $key." -->".$value;
		echo ("<br>");
		}
	*/

	echo("**********<br>");
	

	

	// COMPOSE
	$to      = 'tennis.mutt@gmail.com';
	$subject = 'Hey, I am sorry.';
	$message = 'I want to meet you!';
	

	// BASIC HEADER
	$headers = 'From: rogero.tennis@gmail.com' . "\r\n" .
	   	   	   'Reply-To: rogero.tennis@gmail.com' . "\r\n" .
	    	   'X-Mailer: PHP/' . phpversion();
	
	
	// SEND AND SHOW MESSAGE
	// sending
	$errcode=-99;
	if ($errcode=mail($to, $subject, $message, $headers)) echo $headers.'<h1>Mail sent!</h1>';
	else echo '<h1>Something went wrong...$ercode</h1>';
	

	// FULL HEADER
	// $headers  = "From: testsite < mail@testsite.com >\n";
	// $headers .= "Cc: testsite < mail@testsite.com >\n"; 
	// $headers .= "X-Sender: testsite < mail@testsite.com >\n";
	// $headers .= 'X-Mailer: PHP/' . phpversion();
	// $headers .= "X-Priority: 1\n";
	// $headers .= "Return-Path: mail@testsite.com\n";
	// $headers .= "MIME-Version: 1.0\r\n";
	// $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

    ?>
	
</body>
</html>