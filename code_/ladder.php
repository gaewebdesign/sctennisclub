<main id="headers">
   <h3> 2024 Women's Ladder </h3>
</main>


<?php
$division="Womyn";
$_gender = "F";

   $TABLE_LADDER="ladder";
   $YEAR=2024;
   

      $con = DBMembership();
      $query = "select * from ".$TABLE_LADDER." where year=$YEAR and division regexp(\"$division\") order by points desc";
      
      $qr=mysqli_query($con,$query);
      $index=0;
       while ($row = mysqli_fetch_assoc($qr)) {
          $_id = $row["_id"];
          $_team = $row["fname1"]." ".$row["lname1"];
          $_points = $row["points"];
          $_gender = $row["gender1"];
          $_division = $row["division"];
          $team[$index][0]=$_id;
          $team[$index][1]=$_team;
          $team[$index][2]=$_points;
          $index++;  
          $count=$index;
                  }

  ?>


   <form class="row g-3"  method="POST">

   <input type="hidden" id = "division" name="division" value=<?php echo($_division); ?>  />
   <input type="hidden" id = "gender" name="gender" value=<?php echo($_gender); ?>  />

   <div class="col-md-12"></div> 
   <hr/>

   
   
   <div class="container">
   <div class="col-md-7">
        <div class="input-group ">
        <label for="winner" class="form-label">Winning Team</label>&nbsp; 
          <select class="form-select" id="winner" name="winner" required>
          <?php

            foreach ( $team as $key){
               $_id =  $key[0];       // team id
               $_team =  $key[1];       // team name
               $_points =  $key[2];       // team name
               echo("<option  value= \"$_id\" >$_team  ($_id , $_points) </option>");
            }
          ?>
          </select>
       </div>
     </div>
    </div>
   

    <div class="container">
   <div class="col-md-7">
        <div class="input-group ">
        <label for="winner" class="form-label">Opponent</label>&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
          <select class="form-select" id="loser" name="loser" required>
          <?php

            foreach ( $team as $key){
               $_id =  $key[0];       // team id
               $_team =  $key[1];       // team name
               $_points =  $key[2];       // team name
               echo("<option  value= \"$_id\" >$_team  ($_id , $_points) </option>");
            }
          ?>
          </select>
       </div>
     </div>
    </div>




    <div class="container">  
      <div class="col-md-5">
      <label for="score" class="form-label">Enter Score</label>
      <input type="text" class="form-control" id="score" name="score" required maxlength="12" >
      </div>
    </div>

  
    <div class="container">  
        <div class="col-md-5">
        <label for="email" class="form-label">Enter Email Address </label>
        <input type="text" class="form-control" id="email" name="secretcode" required>
        </div>
    </div>
  
  </form>
  
  <div class="col-12 mt-2">
    <button class="btn btn-primary" id="but_submit" type="submit">Report Scores</button>
  </div>

  
 