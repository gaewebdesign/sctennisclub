
<form class="row g-3" action="./tournament_/tournament_email_send.php" method="post">

 <div class="col-md-12">
 <hr/>
</div> 

  <div class="col-sm-10">
    <label for="validationDefaultUsername" class="form-label">From (Enter your email address used for the tournament)</label>
    <div class="input-group">
<!--      <span class="input-group-text" id="inputGroupPrepend2"></span> -->
      <input type="text" class="form-control fs-6" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email1" required>
    </div>
 </div>

  <hr/>

<!--
  <div class="col-md-7 mt-2">
    <label for="validationDefault05" class="form-label">Enter Keycode</label>
    <input type="text" class="form-control" id="validationDefault05" name="secretcode" required> 
  </div>
-->
    <hr/>
    <div class="col-12 mt-2">
    <button class="btn btn-primary" name="SubmitButton" value="Clicked" type="submit">Get Email Info</button>
  </div>
</form>




