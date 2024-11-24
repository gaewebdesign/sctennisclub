<script>


</script>



<form class="row g-3" action="./tournament_/tournament_signup.php" method="post">





<div class="col-md-12">
    <label for="validationDefault04" class="form-label"><?php echo("".YEAR); ?>  Division</label>
    <select class="form-select" id="validationDefault05" name="division" required>
    <option selected value="<?php echo(TOURNY_MEN) ?>"><?php echo(TOURNY_MEN)?></option>
    <option value="<?php echo(TOURNY_WOMYN)?>"><?php echo(TOURNY_WOMYN)?></option>
    </select>
  </div>

  

  <div class="col-sm-3">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control fs-6" id="validationDefault01" value="" required name="fname1">
  </div>
  <div class="col-sm-3">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control fs-6" id="validationDefault02" value="" required name="lname1">
  </div>
  <div class="col-sm-3">
    <label for="validationDefaultUsername" class="form-label">SCTC Email</label>
    <div class="input-group">
<!--      <span class="input-group-text" id="inputGroupPrepend2"></span> -->
      <input type="email" class="form-control fs-6" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email1" required>
    </div>
  </div>

  <div class="col-sm-1">
    <br/>
   <div class="input-group"> <p>
    <label for="validationDefault04" class="form-label">Gender</label> 
    <select class="form-select" id="validationDefault04" name="gender1" required>
    <option selected value="M">M</option>
    <option  value="F">F</option>    
    
    </select>
    </div>
   </div>

   <div class="col-sm-1">
    <br/>
   <div class="input-group">
    <label for="validationDefault04" class="form-label">NTRP</label> <p>
    <select class="form-select" id="validationDefault04" name="ntrp1" required>
    <option selected value="3.0">3.0</option>
    <option value="3.5">3.5</option>    
    <option value="4.0">4.0</option>
    </select>
    </div>
   </div>




  <hr/>
  <div class="col-sm-3">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationDefault01" value="" name="fname2" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationDefault02" value="" name="lname2" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefaultUsername" class="form-label">SCTC Email</label>
    <div class="input-group">
<!-- <span class="input-group-text" id="inputGroupPrepend2"></span> -->
      <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email2" required>
    </div>
  </div>


  <div class="col-sm-1">
    <br/>
   <div class="input-group"> <p>
    <label for="validationDefault04" class="form-label">Gender</label> 
    <select class="form-select" id="validationDefault04" name="gender2" required>
    <option  value="M">M</option>
    <option selected value="F">F</option>    
    
    </select>
    </div>
   </div>

   <div class="col-sm-1">
    <br/>
   <div class="input-group">
    <label for="validationDefault04" class="form-label">NTRP</label> <p>
    <select class="form-select" id="validationDefault04" name="ntrp2" required>
    <option selected value="3.0">3.0</option>
    <option value="3.5">3.5</option>    
    <option value="4.0">4.0</option>
    </select>
    </div>
   </div>


<!--
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Enter Keycode</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
  </div>

-->
    <hr/>
    <p></p><br/> 
    <div class="col-12">
     <span id="Message">  </span>
    </div>
    <div class="col-12">
    <button class="btn btn-primary" name="Button" type="submit">Enter Tournament</button>
  </div>
</form>




