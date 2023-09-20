<?php

include "../library/include.inc";

TEXT("test email");

$subject = "test email";
$message = "message";
EMAILER($subject, $message, $verbose=false);

TEXT("message sent");

?>
