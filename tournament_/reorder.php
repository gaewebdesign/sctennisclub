<html>
<style>
    <script language="JavaScript" src="library/sorttable.js"> </script>

    .table-condensed{

        width:90% !important;
        font-size: 9px !important;
    }

    tr{
        font-size:12px;
    }
</style>


<table class="table table-bordered table-striped table-condensed sortable">

<thead>
        <tr>
        <th style="width:7%">_id</th>
        <th style="width:20%">Team</th>
        <th style="width:5%">Division</th>
        <th style="width:5%">MTYPE</th>

        <th style="width:5%">semis</th>
        <th style="width:5%">score1</th>

        <th style="width:5%">finals</th>
        <th style="width:5%">score2</th>        

        <th style="width:5%">winner</th>
        <th style="width:5%">score3</th>        

        <th style="width:10%">Custom</th>

        </tr>
      </thead>
      <tbody>


<?php

/*
if ( !empty($_POST) )
if($_POST["draw"] == "mens"){

    if($_POST["mode"] == "reorder")   echo(" Reorder");
    if($_POST["mode"] == "default")   echo(" Default");

}

*/
$mode=0;
if( !empty($_GET['mode']) ){
    $mode=$_GET["mode"];
}

// print_r($_POST);
// print_r($_GET);


if($mode == 0){

    echo("reorder MX7.5 ");
    reorder( "Mx7.5");

}else if($mode==1){

    echo("reorder Mx6.5");
    reorder( "Mx6.5");

}else if($mode==2){


    setToDefaults( "Mx7.5");
    lister( "Mx7.5");


}else if($mode==3){


    setToDefaults( "Mx6.5");
    lister( "Mx6.5");

}else if($mode==4){


}




function reorder($division){

    $query = "select * from tourny where division = \"$division\" order by mtype";
    $con = DBMembership();
    $qr=mysqli_query($con,$query);
    $id_ = array();
    $mtype_ = array();
    $index=0;
    echo "_id   ->      mtype <br>" ;
    while ($row = mysqli_fetch_assoc($qr)) {
        $id_[$index] = $row["_id"];
        $mtype_[$index] = $row["mtype"];
        echo $id_[$index]." -> " .$mtype_[$index]."<br>" ;
        $index++;
    }


    $len = count($id_);

    echo("len is $len <br> ");
    $con=DBMembership();
    for($i=0 ; $i<$len; $i++  ){
//      echo $id_[$i]." -> " .$mtype_[$i] ."<br>";
        $__id      = $id_[$i];
        $__mtype   = $i+1;

        $query = "update tourny set mtype = $__mtype where _id =$__id";
        echo $query."<br>";
        $qr=mysqli_query($con,$query);
    }
}

function setToDefaults($division){
// semis, score1
// finals score2
// winner , score3


       $con=DBMembership();
       $query = "update tourny set semis =default(semis) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);

       $query = "update tourny set score1 =default(score1) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);

       $query = "update tourny set finals =default(finals) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);

       $query = "update tourny set score2 =default(score2) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);

       $query = "update tourny set winner =default(winner) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);

       $query = "update tourny set score3 =default(score3) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);

       $query = "update tourny set custom = default(custom) where division =\"$division\" ";
       $qr=mysqli_query($con,$query);


       /* 
       
       
       
       */

    }


    // custom
/*

        echo $query."<br>";
        $qr=mysqli_query($con,$query);

        $query = "update tourny set score2 = \".\" where _id =$__id";
        echo $query."<br>";
        $qr=mysqli_query($con,$query);

        $query = "update tourny set finals = \".\" where _id =$__id";
        echo $query."<br>";
        $qr=mysqli_query($con,$query);

        $query = "update tourny set score2 = \".\" where _id =$__id";
        echo $query."<br>";
        $qr=mysqli_query($con,$query);

        $query = "update tourny set winner = \".\" where _id =$__id";
        echo $query."<br>";
        $qr=mysqli_query($con,$query);

        $query = "update tourny set score3 = \".\" where _id =$__id";
        echo $query."<br>";
        $qr=mysqli_query($con,$query);
*/



    function lister($division){

    $query = "select * from tourny where division = \"$division\" order by mtype";

    //echo($query);

    $con = DBMembership();
    $qr=mysqli_query($con,$query);
    
    echo "<tr>";
    echo "<td>";
    echo "$division";
    echo "</td>";

    echo "<td>";
    echo "</td>";

    echo "<td>";
    echo "</td>";

    echo "<td>";
    echo "$division";
    echo "</td>";

    echo "<td>";
    echo "</td>";
    echo "<td>";
    echo "</td>";


    echo "<td>";
    echo "$division";    
    echo "</td>";


    echo "<td>";
    echo "</td>";
    echo "<td>";
    echo "</td>";
    echo "<td>";
    echo "</td>";

    echo "<td>";
    echo "$division";    
    echo "</td>";



    echo "</tr>";

    while ($row = mysqli_fetch_assoc($qr)) {
    
    echo "<tr>";
    echo "<td>";
    echo $row["_id"];

    echo "<td>";
    echo $row["fname1"][0]." ".$row["lname1"]." / ";
    echo $row["fname2"][0]." ".$row["lname2"]." ";
    echo "<td>";
    echo $row["division"];
    echo "<td>";
    echo $row["mtype"];

    echo "<td>";
    echo $row["semis"];
    echo "<td>";
    echo $row["score1"];
    echo "<td>";
    echo $row["finals"];

    echo "<td>";
    echo $row["winner"];
    echo "<td>";
    echo $row["score3"];

    echo "<td>";
    echo $row["score3"];


    echo "<td>";
    echo $row["custom"];

  }
  
}


?>


</tbody>
</table>

</html>


