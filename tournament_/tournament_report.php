
<?php
//include "../library/include.inc";
//include "../library/email/email.inc";

 $TABLE_TOURNY="tourny";
 $YEAR=2024;
 $draw="Mx6.5";
 $team=[".",".",".",".",".",".",".",".",".","."];

  $con = DBMembership();

$query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by mtype ";
$qr=mysqli_query($con,$query);
$index=1;
while ($row = mysqli_fetch_assoc($qr)) {
      
    $team[$index] = $row["fname1"]." ".$row["lname1"]."/";
    $team[$index] .= $row["fname2"]." ".$row["lname2"];
      echo $team[$index];
      $index++;

}

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
<?php
   echo("$team[3]");
?>
  <div class="container">

    <div class="col-md-6">
        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Winning Team</label>&nbsp; &nbsp;
        <select class="form-select" id="validationDefault04" name="winner" required>
        <?php
            for($index=1 ; $index<9 ; $index++){
                echo("<option");
                echo(" value= \"$index\" >");
                echo("$team[$index] ($index)");
                echo("</option>");


            }


        ?>
        </select>
    </div>
  </div>


<div class="col-md-5 mt-2">

        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Opponents</label> &nbsp;&nbsp;
        <select class="form-select" id="validationDefault04" name="opponent" required>
        <option selected value="3.0"> ****************</option>
        <option value="3.5">!!!!!!!!!!!!!!!!!!!!!!!!!</option>    
        <option value="4.0">-------------------------</option>
        </select>
        </div>
</div>


<div class="col-md-3">
    <label for="validationDefault05" class="form-label">Enter Score</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
  </div>



  <div>


  <hr/>



  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Enter Keycode</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
  </div>


    <hr/>


    <div class="col-12 mt-2">
    <button class="btn btn-primary" name="Button" type="submit">Report Scores</button>
  </div>
</form>




