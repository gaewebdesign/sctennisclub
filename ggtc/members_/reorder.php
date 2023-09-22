<?php



include "../library/include.inc";

function LocalHost()
 {
          
        $HOST = "127.0.0.1";
        $USER = "root";      // on my localhost
        $PASSWORD = "tomato1349";
        $DB= "southb56_ggtc";


        echo($HOST." -- ".$USER." - ".$DB." - ".$PASSWORD." <br>" );

        $con = mysqli_connect($HOST,$USER, $PASSWORD);

        if (!$con) {
                    echo("CONNECTION ERROR<br>");
                    die('Could not connect: ' . mysqli_connect_error());
                 }else{

                 }

                $ret = mysqli_select_db($con,$DB );
                if(!$ret){
                  echo( "mysqli_connect_error() = ");
                  echo( mysqli_connect_error() );
                  echo( "<br>");
                }


                return $con;
          }



 $con = LocalHost();

$query = "select * from ggtc_gae order by date asc";
$qr=mysqli_query($con,$query);


$query = "INSERT INTO `ggtc_gae` (`_id`, `fname`, `lname`,`gender`,`ntrp`,`phone`,`address`,`city`,`zip`,`email`,`year`,`date`,`custom`) VALUES ";

while ($row = mysqli_fetch_assoc($qr)) {  

    $q = $query."( NULL".add($row[FNAME]).add($row[LNAME]).add($row[GENDER]).add($row[NTRP]).add($row[PHONE]);
    $q .= add($row[ADDRESS]).add($row[CITY]).add($row[ZIP]).add($row[EMAIL]);
    $q .= add($row["year"]).add($row[DATE]).add($row[DATE]);
    $q .=" );";

    TEXT($q);

}

?>