<!--

 <form class="needs-validation" novalidate name="signup" action="topaypal.php", method="post" >

-->
<?php
/*
  include "./library/include.inc";
  include "./library/paypal.inc";
include "./library/emailer.php";
*/
?>
<form class="row g-3" action="./topaypal_join.php", method="POST">




  <div class="col-md-6">
    <div class="input-group">
    <span class="input-group-text " id="inputGroupPrepend1" name="fname">First Name</span>
    <input type="text" class="form-control BackInput" id="validationDefault01"  name="fname" required>
     </div>
  </div>


  <div class="col-md-6">
    <div class="input-group">
    <span class="input-group-text" id="inputGroupPrepend2" >Last Name</span>
    <input type="text" class="form-control BackInput" id="validationDefault02" name="lname" required>
    </div>
  </div>


  
  <div class="col-md-12">

<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend2b">Address</span>
 <input type="text" class="form-control BackInput" id="validationDefault02ba" name="address" required>
</div>

</div>


  <div class="col-md-6">

    <div class="input-group">
    <span class="input-group-text" id="inputGroupPrepend3">City</span>
     <input type="text" class="form-control BackInput" id="validationDefault03" name="city" required>
   </div>

</div>

<div class="col-md-4">

<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend4">Zip</span>
 <input type="text" class="form-control BackInput" id="validationDefault04" name="zip" required>
</div>

<p>
</div>



  <div class="col-md-3">
    <div class="input-group">
    <span class="input-group-text" id="inputGroupPrepend5">Gender</span>

    <select class="form-select Back" id="validationDefault05" name="gender" required>
      <option selected enabled value="">Choose...</option>

      <option value="-">-</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>

</div>


  </div>

  <div class="col-md-3">
  <div class="input-group">

    <span class="input-group-text" id="inputGroupPrepend6">NTRP</span>
    <select class="form-select Back" id="validationDefault06" name="ntrp" notrequired>
      <option selected enabled value="">Choose...</option>
      <option value="-">-</option>
      <option value="3.0">3.0</option>
      <option value="3.5">3.5</option>
      <option value="4.0">4.0</option>
      <option value="4.5">4.5</option>
      <option value="5.0+">5.0+</option>
    </select>

</div>

</div>
 
   <hr/>

   <div class="col-md-12">&nbsp; </div>

   <div class="col-md-8">

<div class="input-group">
<span class="input-group-text " id="inputGroupPrepend7">Email</span>
 <input type="email" class="form-control BackInput" id="validationDefault07" name="email" required>
</div>

</div>

<div class="col-md-12">&nbsp; </div>

<div class="col-md-8">
<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend7">Family Members</span>
 <input type="text" maxlength="55" class="form-control BackInput" id="validationDefault07" name="family" >
</div>
</div>

<!--
<div class="col-md-8">

<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend7">USTA Team/Captain</span>
 <input type="text" maxlength="20" class="form-control BackInput" id="validationDefault07" name="team" >
</div>

</div>
-->
   <div class = "col-12" >
    <hr/>
    <p>
   </div>

   <div class="col-md-9">
   <span><h4 style="color:rgb(25, 0, 255)">Select one: </h4></span> 

   <?php
        $r_majority=0;//ResidentMajority(YEAR);
        $n_waitlist= 0;//Waitlist(YEAR); 
        $n_waitlist= 0; //  RESTORE WAITLIST
        if($r_majority and ($n_waitlist==0) ){
          include "join_/joinfees.php";
        }else{
          include "join_/joinfees_resident.php";
        }

         // change
        //   oninvalid="this.setCustomValidity('Please select Waiver CheckBox to proceed')"
           
?>


  </div>

  <div class = "col-12"> &nbsp;</div>

  <div class = "col-12">
   <span><h4 style="color:rgb(25, 0, 255)">Waiver:  </h4></span> 

    <p>
        By checking this box, and submitting this application to Santa Clara Tennis Club,
        the signee above hereby agrees to indemnify and hold harmless the City of Santa Clara 
        and the Santa Clara Tennis Club, from and against any and all liabilities for any injury which may be incurred 
        by the undersigned arising out of, or in any way connected in any event sponsored by the aforenamed.
        <p>
                
   </div>

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required
  
      >

      <label class="form-check-label" for="invalidCheck2">
        Agree to Waiver terms and conditions.
      </label>
    </div>
  </div>

        <!-- div to show reCAPTCHA -->
        <!-- some change -->
        <p>
         <div class="g-recaptcha"
          data-sitekey="6LdoCf4pAAAAADq5HgT8Oad1VDgs-KeA9viLIi3F"> 
        </div>
        <div>         
        <br><br><p><br>
        </div> 


  <div class="col-12"> &nbsp;</div>
  <div class="col-12">
    <button class="btn btn-primary" name="SubmitButton" disabled  type="submit">Go to Paypal</button>
  </div>
</form>