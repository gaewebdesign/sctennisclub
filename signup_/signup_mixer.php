
<div class="py-5 text-center">
     <picture>
<!--
      <img class="mg-fluid img-thumbnail" src="cinco.png" alt="" >
    <img class="mg-fluid img-thumbnail" src="./images/icecream_trans.gif" alt="-" >

<img class="mg-fluid img-thumbnail" src="./images/icecreamsocial.png" alt="-" >
<img class="mg-fluid img-thumbnail" src="./images/animated_chicken-bro-eat.gif" alt="-" >
<img class="mg-fluid img-thumbnail" src="./images/animated_mochi-cat-peach-and-goma.gif" alt="-" >

    -->
  
    <img class="mg-fluid img-thumbnail"  src="./images/mantennisplayer.png" width="89%" alt="-" >


  </picture>
      <h2>Santa Clara Tennis Club Monthly Mixer </h2>

      
    <h3 style="font-size: 1.2em ">
    Enjoy some  drop-in social tennis  on the courts with fellow members for
     Santa Clara Tennis Center on
    June 14 2025 , 9-12 noon on courts #6-#8. Sign up ahead of time or pay at the desk
    <br/>
    Signup page is at <a href="http://www.sctennisclub.org/sctcmixer">www.sctennisclub.org/sctcmixer</a>
  
    </h3>
  </div>
<!--
  <form class="row g-3" action="./topaypal_mixer_captcha_icecream.php" method="post">
-->


<form class="row g-3" action="./topaypal_icecream.php" method="post">


  <div class="container-fluid">
    <div class="row align-items-start">
        <div class="col-sm-3">
        <label for="validationDefault01" class="form-label">First name</label>
        <input type="text" class="form-control fs-6" id="validationDefault01" value="" required name="fname">
    </div>
    <div class="col-sm-3">
        <label for="validationDefault02" class="form-label">Last name</label>
        <input type="text" class="form-control fs-6" id="validationDefault02" value="" required name="lname">
    </div>
    <div class="col-sm-4">
        <label for="validationDefaultUsername" class="form-label">Email Address</label>
        <div class="input-group">
        <input type="text" class="form-control fs-6" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email" required>
    </div>
<!--
  </div>
  </div>
-->
</div> <!-- container-fluid  -->

  <div class="container-fluid mt-4">

  <div class="col-sm-6">
              <span><h2 style="color:rgb(25, 0, 255)">Select one: </h2></span>  
              <div class="form-check ">

                <input  class="form-check-input" type="radio" id="icecream" checked="checked" value=<?php echo(ICECREAM_FEE); ?> name="_FEE">
                <label class="form-check-label" for="member">🎾 &nbsp;SCTC Member &nbsp; $<?php echo(ICECREAM_FEE); ?></label>
  
  
  
                <br/>
                <input class="form-check-input"  type="radio" id="member" value=<?php echo(TENNIS_ICECREAM_FEE); ?> name="_FEE"    >
                <label class="form-check-label" for="member">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non-Member $<?php echo(TENNIS_ICECREAM_FEE); ?></label>
         
              </div>
    </div>


<!--
    <div class="container-fluid mt-2">
     <div class="col-md-4">
      <label for="validationDefault05" class="form-label">Enter Keycode</label>
      <input type="text" class="form-control" id="validationDefault05" name="secretcode" required>
    </div>
  </div>
<div class="container-fluid mt-2">
  </div>
-->

        <div class="container-fluid mt-2">
        <div class="g-recaptcha"
          data-sitekey="6LdoCf4pAAAAADq5HgT8Oad1VDgs-KeA9viLIi3F"> 
        </div>
        </div>

        <div class="container-fluid mt-2">
      <div class="mb-5 col-12">
      <button class="btn btn-primary" disabled name="SubmitButton" type="submit">Go to Paypal</button>
      </div  >
      </div>





</form>




