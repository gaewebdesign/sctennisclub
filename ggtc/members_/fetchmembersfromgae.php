<?php

include "../library/include.inc";

function membership_json( $URL ){

    print($URL);

    $ch = curl_init( $URL );
   // curl_setopt( $ch  , CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch  , CURLOPT_RETURNTRANSFER, true );
    
    $response = curl_exec($ch);

    

    curl_close($ch);
    $obj = json_decode($response, $assoc= TRUE);
    return $obj;

}

function memberlist()
{

    $URL = "http://www.sfmongoldata.appspot.com/current";

    $obj = membership_json($URL);

    echo("<table>");

    $start=0;

/*
    foreach ($obj as $row){
        if($start++ > 10) continue;
        print_r($row);
        print("<br>");
    }
*/
    foreach($obj as $row) {  
        if($start++ > 10) continue;       
        echo("<tr> ");
        echo("<td>");
        echo( $row["year"]);
        echo("</td>");

        echo "<td>".$row[FNAME]."</td>";
        echo "<td>".$row[LNAME]."</td>";
        echo "<td>".$row[GENDER].$row[NTRP].$d."</td>";

        echo "<td>".$row[ADDRESS]."</td>";
        echo "<td>".$row[CITY]."</td>";
        echo "<td>".$row[ZIP]."</td>";

        echo "<td>".$row[EMAIL]."</td>";
        echo "<td>".$row[PHONE]."</td>";
        echo "<td>".$row[DATE]."</td>";
  
   }


}

function dbinsert(){
    $URL = "http://www.sfmongoldata.appspot.com/current";

    $obj = membership_json($URL);

    echo("<table>");
    $start=0;
    $query = "insert into ggtc_paypal_t";
    $query = "INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`, `email`, `url`, `gender`, `ntrp`, `code`, `phone`, `address`, `city`, `zip`, `state`, `year`, `capt`, `team`, `mtype`, `help`, `other`, `date`, `insignia`, `payment`, `custom`, `opt`, `pwd`) VALUES";


    $query = "INSERT INTO `ggtc_paypal` (`_id`, `fname`, `lname`,`gender`,`ntrp`,`phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ";
/*
(104, 'Stacey', 'Kato', 'stacey@fhda.edu', NULL, 'F', '3.0', NULL, NULL, '1 Balboa Ave', 'Santa Cruz', '95126', NULL, '2024', NULL, 'CalBear', 'RS', NULL, NULL, 1694705815, '1', '', '1694705815', '', NULL),


 */

   // print($query);
    foreach ($obj as $row){
      //  if($start++ > 10) continue;

//       $q =$query."( NULL".add($row[FNAME]).add($row[LNAME])." );";
       $gender = $row[NTRP][0];

       $replace = array("M","W","F","m","w","f");
       $ntrp = trim($row[NTRP]);
       $ntrp = str_replace($replace,"",$ntrp);


       $q = $query."( NULL".add($row[FNAME]).add($row[LNAME]).add($gender).add($ntrp).add($row[PHONE]);
       $q .= add($row[ADDRESS]).add($row[CITY]).add($row[ZIP]).add($row[EMAIL]);
       $q .= add($row["year"]).add($row[DATE]).add($row[DATE]);
       $q .=" );";


        print($q);


        print("<br>");


        //        print_r($row);
        


    }


}
  // memberlist();
   dbinsert();
function tr($ntrp){
   
   $n = str_replace("W", "" , $ntrp);
   return $n;
}

//echo tr("W3.5");

?>


<!--
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`) VALUES ( NULL,"Nirmala","Jayaraman" );


INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Nirmala","Jayaraman","W","W2.5","(518) 727-5771","1800 Madison St","Oakland","94612","jayaramn2013@gmail.com","2021","1691734554","1691734554" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"ALEXANDER","Galitsky","M","","(617) 708-5896","492 Frederick St.","San Francisco","94117","asgalitsky@gmail.com","2021","1689010859","1689010859" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Brett","Bush","M","","(415) 310-5268","2467 Vallejo Street","San Francisco","94123","bushbrett@gmail.com","2021","1672866273","1672866273" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Henry","Soong","M","4.0","(510) 299-1418","160 J St. #2835","Fremont","94536","h.soong@gmail.com","2021","1670112351","1670112351" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Richaele","Affannato","W","W4.0","(415) 940-6011","411 Vidal Dr.","San Francisco","94132","richaele@gmail.com","2021","1668214028","1668214028" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Julian","Newman","M","3.5","(415) 871-4415","118 20th Avenue, San Francisco, CA","Caucasian","94121","jpnewman89@gmail.com","2021","1663270867","1663270867" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Katherine","Crocker","W","W","(415) 302-7778","4850 17th St","San Francisco","94117","kitcrocker@yahoo.com","2021","1654620482","1654620482" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Henry","Soong","M","4.0","(510) 299-1418","160 J St. #2835","Fremont","94536","h.soong@gmail.com","2021","1640829532","1640829532" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Christian","Schmuck","M","4.5","(914) 441-5540","33 8th Street at the Trinity, App # 1824","San Francisco","94103","cjschmuck@yahoo.com","2021","1633455515","1633455515" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Weston","Browne","M","N/a","(916) 719-2622","2300 Webster St. Apt# 305","San Francisco","94115","westonbrowne@gmail.com","2021","1633075731","1633075731" );
INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ( NULL,"Lindsay","Wilson","W","W3.0","(925) 768-9015","304 Mercury Way","Pleasant Hill","94523","lwilson9518@gmail.com","2021","1630297219","1630297219" );

INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Nirmala","Jayaraman","jayaramn2013@gmail.com","W2.5","(518) 727-5771","1800 Madison St","Oakland","94612","","1691734554","1691734554" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"ALEXANDER","Galitsky","asgalitsky@gmail.com","M","(617) 708-5896","492 Frederick St.","San Francisco","94117","","1689010859","1689010859" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Brett","Bush","bushbrett@gmail.com","M","(415) 310-5268","2467 Vallejo Street","San Francisco","94123","","1672866273","1672866273" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Henry","Soong","h.soong@gmail.com","M4.0","(510) 299-1418","160 J St. #2835","Fremont","94536","","1670112351","1670112351" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Richaele","Affannato","richaele@gmail.com","W4.0","(415) 940-6011","411 Vidal Dr.","San Francisco","94132","","1668214028","1668214028" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Julian","Newman","jpnewman89@gmail.com","M3.5","(415) 871-4415","118 20th Avenue, San Francisco, CA","Caucasian","94121","","1663270867","1663270867" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Katherine","Crocker","kitcrocker@yahoo.com","W","(415) 302-7778","4850 17th St","San Francisco","94117","","1654620482","1654620482" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Henry","Soong","h.soong@gmail.com","M4.0","(510) 299-1418","160 J St. #2835","Fremont","94536","","1640829532","1640829532" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Christian","Schmuck","cjschmuck@yahoo.com","M4.5","(914) 441-5540","33 8th Street at the Trinity, App # 1824","San Francisco","94103","","1633455515","1633455515" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Weston","Browne","westonbrowne@gmail.com","MN/a","(916) 719-2622","2300 Webster St. Apt# 305","San Francisco","94115","","1633075731","1633075731" );
INSERT INTO `ggtc_pending` (`_id`, `fname`, `lname`,`phone`,`address`,`city`,`zip`,`year`,`date`,`custom`) VALUES ( NULL,"Lindsay","Wilson","lwilson9518@gmail.com","W3.0","(925) 768-9015","304 Mercury Way","Pleasant Hill","94523","","1630297219","1630297219" );



CREATE TABLE `ggtc_paypal` (
  `_id` int(11)  NULL,
  `fname` varchar(31) DEFAULT NULL,
  `lname` varchar(31) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `ntrp` varchar(5) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `state` varchar(5) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `capt` varchar(31) DEFAULT NULL,
  `team` varchar(31) DEFAULT NULL,
  `mtype` varchar(31) DEFAULT NULL,
  `help` varchar(8) DEFAULT NULL,
  `other` varchar(31) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `insignia` varchar(7) DEFAULT NULL,
  `payment` varchar(16) DEFAULT NULL,
  `custom` varchar(31) DEFAULT NULL,
  `opt` varchar(31) DEFAULT NULL,
  `user` varchar(31) DEFAULT NULL,
  `pwd` varchar(31) DEFAULT NULL
) 

-->