
<?php
//include "../library/include.inc";
//include "../library/email/email.inc";

 $TABLE_TOURNY="tourny";
 $YEAR=2024;
 $draw="Mx6.5";
 $team=[".",".",".",".",".",".",".",".",".","."];
 $team2= array(

    array(".","."),
    array(".","."),
    array(".","."),
    array(".","."),
    array(".","."),
    array(".","."),
    array(".","."),
    array(".","."),
    array(".","."),
    array(".",".")

 );

  $con = DBMembership();

$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
$qr=mysqli_query($con,$query);
$index=1;
while ($row = mysqli_fetch_assoc($qr)) {
    $_id = $row["_id"];
    $team[$index] = $row["fname1"]." ".$row["lname1"]."/";
    $team[$index] .= $row["fname2"]." ".$row["lname2"]."($_id)";
    $_team = $row["fname1"]." ".$row["lname1"]."/";
    $_team .= $row["fname2"]." ".$row["lname2"];

    $team2[$index][0]=$_id;
    $team2[$index][1]=$_team;
    
    $index++;
}

/*
    for($index=1 ; $index<9 ; $index++){
        echo $team2[$index][0]."   ".$team2[$index][1];

    }
*/  



?>

<form class="row g-3" action="./tournament_/tournament_score.php" method="post">


<div class="container">
        <div class="col-md-12">
            <label for="validationDefault04" class="form-label">Division</label>
            <select class="form-select" id="validationDefault05" name="division" required>
            <option selected value="Mx6.5">Mx 6.5</option>
            <option value="Mx7.5">Mx 7.5</option>
            </select>
        </div>

</div>



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
                $_id = $team2[$index][0];
                $_team =  $team2[$index][1];
                echo("<option");
                echo(" value= \"$_id\" >");
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
        <select class="form-select" id="validationDefault04" name="winner" required>
        <?php
            for($index=1 ; $index<9 ; $index++){
                $_id = $team2[$index][0];
                $_team =  $team2[$index][1];
                echo("<option");
                echo(" value= \"$_id\" >");
                echo("$_team ($_id)");
                echo("</option>");

            }

        ?>
        </select>
    </div>



<div class="col-md-7 mt-2">
    <label for="validationDefault05" class="form-label">Enter Score</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
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




