
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
 changes
*/

);

  $con = DBMembership();

  $query = "select * from ".$TABLE_TOURNY." where year=$YEAR and division regexp(\"$draw\") order by points desc";
//  echo($query);

$qr=mysqli_query($con,$query);
$index=0;
while ($row = mysqli_fetch_assoc($qr)) {
    $_id = $row["_id"];
    $_custom = $row["custom"];
    $_team = $row["fname1"]." ".$row["lname1"];
    $_points = $row["points"];
    $_win = $row["win"];
    $_loss = $row["loss"];

    $team[$index][0]=$_id;
    $team[$index][1]=$_team;
    $team[$index][2] = $_points;
    $team[$index][3] = "$_win - $_loss";
    $team[$index][4]=$_custom;

    $index++;  
    $count=$index;

  }


?>

<form class="row g-3" action="./ladder_/ladder_reportscore.php" method="post">

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

    <div class="col-md-10">
        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Winning Team</label>&nbsp; &nbsp;
        <select class="form-select" id="validationDefault04" name="winner" required>
        <?php
            for($index=0 ; $index<$count ; $index++){
                $_id = $team[$index][0];          // _id       use to determine team
                $_team =  $team[$index][1];       // team name
                $_points =  $team[$index][2];      // mtype    1-8  position in draw
                $_record =  $team[$index][3];      // mtype    1-8  position in draw
                $_custom = $team[$index][4];      // custom    determine round 0,1,2,99 (99 means to disable item)
                echo("<option  value= \"$_id\" > ");

                echo("$_team ");
                echo("</option>");


            }


        ?>
        </select>
    </div>

  </div>


  <div class="col-md-10">
        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Opponent</label>&nbsp; &nbsp;
        <select class="form-select" id="validationDefault04" name="loser" required>
        <?php
             for($index=0 ; $index<$count ; $index++){
              $_id = $team[$index][0];          // _id       use to determine team
              $_team =  $team[$index][1];       // team name
              $_points =  $team[$index][2];      // mtype    1-8  position in draw
              $_record =  $team[$index][3];      // mtype    1-8  position in draw
              $_custom = $team[$index][4];      // custom    determine round 0,1,2,99 (99 means to disable item)
              echo("<option  value= \"$_id \" > ");

              echo("$_team ");
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




