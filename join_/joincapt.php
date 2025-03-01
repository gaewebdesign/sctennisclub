<style>
  #captan {
    padding: 1px;
    color: #abcdef;
    font-size: 14px;
    background-color: light-blue;
    -webkit-appearance: none;

}

#captain{
  font-size: 14px;
  font-color: light-blue;

}
<!--
option:hover {
  background-color: yellow;
}

option.red {color: #FF0000;}
<select><option class="red" value="whatever">Some Red Option Text</option></select>


#captain a {
    color: green !important;
}
-->

</style>

<?php
 
 
 $YEAR=YEAR;
  $team= array(

    array(".",".","."),
/*
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
    array(".",".","."),
*/
);

  $con = DBMembership();

$query = "select * from ".TABLE_CAPTAIN." where year=$YEAR order by _id";
$qr=mysqli_query($con,$query);
$index=1;
while ($row = mysqli_fetch_assoc($qr)) {
    $_id = $row["_id"];
    $_team = $row["team_"];
    $_count = $row["count"];
    

    $team[$index][0]=$_id;
    $team[$index][1]=$_team;
    if($_count > 0)   $team[$index][2] = "disabled";
    
    $index++;
}

?>

 <div class="col-md-12">
 <hr/>
</div> 

  <div class="container">

    <div class="col-md-12">
        <div class="input-group ">
        <label for="validationDefault04" class="form-label">Select USTA Team/Captain</label>&nbsp; &nbsp;
        <select id="captain" class="form-select" id="validationDefault04" name="captain" required>
        <?php
            
            for($index=1 ; $index<count($team) ; $index++){
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

  <hr/>



