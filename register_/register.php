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


  <div class="col-md-4">
   <div class = "input-group">
   <span class="input-group-text" id="inputTeam">Team</span>

   <select class="form-select Back" id="validationDefault05" name="gender" required>

      
<optgroup label="*">
      <option value="18M" selected>18M</option>
      <option value="18W">18W</option>
      <option value="18Mx">18Mx</option>
      <option value="Combo">Combo</option>
</optgroup>

<optgroup label="*">
      <option value="40M">40M</option>
      <option value="40W">40W</option>
      <option value="F">40Mx</option>
</optgroup>

<optgroup label="*">
      <option value="55AW">55AW</option>
      <option value="55AM">55AM</option>
</optgroup>

</select>





  </div>
  </div>


  <div class="col-md-4">
   <div class = "input-group">
   <span class="input-group-text" id="inputTeam">NTRP</span> 

   <select class="form-select Back" id="validationDefault06" name="ntrp" notrequired>
 <optgroup>
      <option value="2.5">2.5</option>
      <option value="3.0">3.0</option>
      <option value="3.5" selected>3.5</option>
      <option value="4.0">4.0</option>
      <option value="4.5">4.5</option>
      <option value="5.0+">5.0+</option>
      </optgroup>       

      <optgroup>       
      <option value="6.0">6.0</option>
      <option value="7.0">7.0</option>
      <option value="8.0">8.0</option>
      <option value="9.0">9.0</option>
 </optgroup>       

 <optgroup>       
       <option value="6.5">6.5</option>
      <option value="7.5">7.5</option>
      <option value="8.5">8.5</option>
</optgroup>       

    
    </select>



   </div>
  </div>


  <div class="col-md-4">
   <div class = "input-group">
   <span class="input-group-text" id="inputTeam">Daytime</span>          
   


   <input type="checkbox" id="daytime" name="daytime">


  </div>
  </div>



   <div class="col-md-12">&nbsp; </div>

   <div class="col-md-8">

<div class="input-group">
<span class="input-group-text " id="inputGroupPrepend7">Email</span>
 <input type="email" class="form-control BackInput" id="validationDefault07" name="email" required>
</div>

</div>

<div class="col-md-12">&nbsp; </div>

<div class="col-md-8">

<!--
<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend7">USTA Team/Captain</span>
 <input type="text" class="form-control BackInput" id="validationDefault07" name="team" >
</div>
-->

</div>

   <div class = "col-12" >
    <hr/>
    <p>
   </div>

   <div class="col-md-9">
   
   <?php

          include "register_/team.php";
    ?>


  </div>

  <div class = "col-12"> &nbsp;</div>

<!--
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required
  
      >

      <label class="form-check-label" for="invalidCheck2">
        Agree to Waiver terms and conditions
      </label>
    </div>
  </div>

-->
  <div class="col-12"> &nbsp;</div>
  <div class="col-12">
    <button class="btn btn-primary"  type="submit">Submit Captain Request</button>
  </div>
</form>