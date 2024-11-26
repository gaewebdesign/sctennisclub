<html>

<head>

      <link rel="stylesheet" href="../css/index.css" >
      <title>Santa Clara Tennis Club</title>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body class="Back" >

<?php

include "../library/include.inc";
include "../library/tourny.inc";

include "../library/dbevent.inc";

include "../library/email/email.inc";

// Check for correct keycode 
/*
if ( isset($_POST['SubmitButton'])){
//    print_r($_POST);
//    return;

    if($_POST["secretcode"] != "queenbee" ){
        $attempt = $_POST["secretcode"];
//      echo "<script>alert(\"Please Enter correct keyccode \")</script>";
        echo "<script>alert(\"Please Enter correct keyccode ($attempt entered)\")</script>";

        echo('
              <script >
                    window.setTimeout(function() {
                    window.location.href="../ladder.phtml?mode=5";
                 }, 100);
              </script>
                ');
		return;
    }


}
*/
// Check if keycode entered


$theTABLE = TABLE_TOURNY;

$email = $_POST["email1"];

$con = DBMembership();

$query = "select * from $theTABLE where email1=\"$email\" or email2=\"$email\" and mtype>0";
$query .=" and year=".YEAR;

$qr  = mysqli_query($con,$query);
$found=0;
while ($row = mysqli_fetch_assoc($qr)) {
    $found=1;        
     display($row , $con , $theTABLE);
}

if($found==0){

  echo ("<center><p><br/><h2> Not in tournament </h1></center>");

}
return;

$num = mysqli_num_rows($qr);

echo( $query); 
echo ("<br> count $num <br>");

$found=0;
$division="-";
if( isset( $row)  ){
    $found=1;
    //$division = $row["division"];//."(".$num.")";
   
}else{
    echo( "<center>"  );
    echo( "<h2>$email not found </h2>"  );
    echo( "</center>"  );
}


$title = $division;
if( $division==TOURNY_WOMYN) {
    $division= TOURNY_WOMYN;
    $title = TOURNY_WOMYN."  Participants";
}

$found=1;
  
   if($found)
      emailtable($con,$theTABLE,$title, $division);

function display($row, $con,$theTABLE){
    
    $division = $row["division"];//."(".$num.")";
    $title = " $division Participants";
    
    emailtable($con, $theTABLE, $title, $division);

}

function emailtable($con, $theTABLE,$title,$division){
 

    echo("<center>");
    echo("<p><br>");

    echo( "<table class=\"table table-bordered table-striped table-condensed sortable\"> ");


    echo ('<thead>');
    echo ('<tr>');
    echo ('<td>');
    echo "Name";
    echo ('<td>');
    echo "Email";
    echo ('<td>');
    echo "Name";
    echo ('<td>');
    echo "Email";
    echo ('</tr>');
    echo ('</thead>');



//    $query = "select * from $theTABLE where division=\"$division\" ";

    $query = "select * from $theTABLE where division=\"$division\" and mtype>0";
    $query .=" and year=".YEAR;

    $qr=mysqli_query($con,$query);

    echo ('<tbody>');
    echo ("<h4>$division </h4> ");
    while( $row = mysqli_fetch_assoc($qr)){
        echo("<tr>");
        echo("<td>");
        echo( $row[FNAME1]." ".$row[LNAME1] );
        echo("<td>");
        echo( $row[EMAIL1] );

        echo("<td>");
        echo( $row[FNAME2]." ".$row[LNAME2] );
        echo("<td>");
        echo( $row[EMAIL2] );

    }

    echo ('</tbody> ');
    echo("</table>");


}



?>

</body>

</html>