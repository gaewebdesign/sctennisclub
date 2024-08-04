
<?php
//include "../library/include.inc";
//include "../library/email/email.inc";

/*
$TABLE_TOURNY="tourny";
 $YEAR=2024;
 $draw="Mx6.5";
  */
  
  $team= array(

    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),

/*

*/

);

  $con = DBMembership();

  $query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
//  echo($query);

$qr=mysqli_query($con,$query);
$index=1;
while ($row = mysqli_fetch_assoc($qr)) {
    $_id = $row["_id"];
    $_mtype = $row["mtype"];
    $_team = $row["fname1"]." ".$row["lname1"]."/";
    $_team .= $row["fname2"]." ".$row["lname2"];


    $team[$index][0]=$_id;
    $team[$index][1]=$_team;
    if($row["custom"]> 10)   $team[$index][2] = "disabled";
 //   DEBUG("custom = ".$row["custom"]);
    $index++;
}


?>

<form class="row g-3" action="./tournament_/tournament_reportscore.php" method="post">

<!--
<div class="container">
        <div class="col-md-12">

         <h2><?php echo($title); ?></h1>
        </div>

</div>
-->


 <div class="col-md-12">
 <hr/>
</div> 


  <div class="container">

    <div class="col-md-5">
        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Winning Team</label>&nbsp; &nbsp;
        <select class="form-select" id="validationDefault04" name="winner" required>
        <?php
            for($index=1 ; $index<9 ; $index++){
                $_id = $team[$index][0];
                $_team =  $team[$index][1];
                $_disabled = $team[$index][2];
                echo("<option $_disabled value= \"$_id\" > ");
                echo("$_team ($_id)");
                echo("</option>");


            }


        ?>
        </select>
    </div>

  </div>


  <div class="col-md-5">
        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Opponent</label>&nbsp; &nbsp;
        <select class="form-select" id="validationDefault04" name="loser" required>
        <?php
            for($index=1 ; $index<9 ; $index++){
                $_id = $team[$index][0];
                $_team =  $team[$index][1];
                $_disabled =  $team[$index][2];
                
                echo("<option $_disabled");
                echo(" value= \"$_id\" >");
                echo("$_team ($_id)");
                echo("</option>");

            }

        ?>
        </select>
    </div>



<div class="col-md-7 mt-2">
    <label for="validationDefault05" class="form-label">Enter Score</label>
    <input type="text" class="form-control" id="validationDefault05" name="score" required>
  </div>



  <div>


  <hr/>



  <div class="col-md-7 mt-2">
    <label for="validationDefault05" class="form-label">Enter Keycode</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
  </div>


    <hr/>


    <div class="col-12 mt-2">
    <button class="btn btn-primary" name="Button" type="submit">Report Scores</button>
  </div>
</form>




