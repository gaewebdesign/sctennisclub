# sctennisclub

MYSQL
update paypal set email=concat(email,"@");
update paypal set email=concat(email,url);

PAYPAL paths

Dinner
root(/) directory   ./signup.html
signup.html -> include "./signup_/signup_dinner.php"


GO TO PAYPAL 
root (/) directory   ./topaypal_dinner.php

RETURN from PAYPAL
./signup_/.htaccess ( contains alias path)
./signup_/done.php  ( Paypal return to merchant)
./signup_/cancel.php 
./signup_/images   ( images taken here)


JOIN (membership )
root(/) directory   ./join.html
join.html -> include "./join_/join_sctc.php"

IF statement determines resident majority and selects right php file to show fees
./join_sctc.php -> include "./join_/join_fees.php"   (if resident and non-residents allowed)
./join_sctc.php-> include "./join_/join_resident.php"  (if only resident)

PAYPAL
GOTO PAYPAL
root (/) direcctory  ./topaypal_join.php

RETURN from PAYPAL

./join_/.htaccess  (contains alias path)
./signup_/done.php (Paypal return to merchant)
./signup/cancel.php
./signup_/images

