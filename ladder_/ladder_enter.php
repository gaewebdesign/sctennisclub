


<form class="row g-3" action="./ladder_/ladder_enter_signup.php" method="post">

<!--
<div class="col-md-12">
    <label for="validationDefault04" class="form-label">Ladder Division</label>
    <select class="form-select" id="validationDefault05" name="division" required>
    <option selected value="Men">Men's</option>
    <option value="Womyn">Women's</option>
    </select>
  </div>
-->
  

  <div class="col-sm-3">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control fs-6" id="validationDefault01" value="" required name="fname1">
  </div>
  <div class="col-sm-3">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control fs-6" id="validationDefault02" value="" required name="lname1">
  </div>
  <div class="col-sm-3">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
<!--      <span class="input-group-text" id="inputGroupPrepend2"></span> -->
      <input type="text" class="form-control fs-6" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email1" required>
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
    <option value="2.5">2.5</option>
    <option value="3.0">3.0</option>    
    <option selected value="3.5">3.5</option>    
    <option value="4.0">4.0</option>
    <option value="4.5">4.5</option>
    </select>
    </div>
   </div>




  <hr/>
<!--
  <div class="col-sm-3">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationDefault01" value="" name="fname2" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationDefault02" value="" name="lname2" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">

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

-->
<style>
    /* already defined in bootstrap4 */
    .text-xs-center {
        text-align: center;
    }

    .g-recaptcha {
        display: inline-block;
    }

    .captchacenter{
          justify: center;
          align: center; 
    }
</style>
<div class="text-xs-center">
<div class="row md-12 mt-5 g-recaptcha"
          data-sitekey="6LdoCf4pAAAAADq5HgT8Oad1VDgs-KeA9viLIi3F"> 
 </div>
<div>




  <div class="col-md-8 mt-3">
    <label for="validationDefault05" class="form-label">Enter Keycode</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
  </div>

<!--

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>

-->
    <hr/>
    <p></p><br/> 

    <div class="col-12">
    <button class="btn btn-primary" name="SubmitButton" type="submit">Ladder Signup</button>
  </div>
</form>


