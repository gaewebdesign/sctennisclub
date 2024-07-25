
<div class="py-5 text-center">
     <picture>
<!--
      <img class="mg-fluid img-thumbnail" src="cinco.png" alt="" >
    <img class="mg-fluid img-thumbnail" src="./images/icecream_trans.gif" alt="-" >
-->

<img class="mg-fluid img-thumbnail" src="./images/icecreamsocial.png" alt="-" >



  </picture>
      <h2>Santa Clara Tennis Club Ice Cream Social </h2>

      
    <h3 style="font-size: 1.2em ">
    Enjoy some  tennis and <b>ice cream</b>  on the courts with fellow members for
    social mixed doubles round robin play at Santa Clara Tennis Center on
    August 24, 2024 , 9-12 noon on courts #6-#8. Sign up early before entries close!
    If you just &#x1F497; ice cream, you may
    sign up for the ice cream only option! <br/>
    Signup page is at <a href="http://www.sctennisclub.org/signup">www.sctennisclub.org/signup</a>
  
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
                <input class="form-check-input"  type="radio" id="member" checked="checked" value="10" name="_FEE"    >
                <label class="form-check-label" for="member">🎾 &nbsp;Ice cream and Tennis<?php echo("&nbsp;".$MEMBER_FEE); ?></label>
                <br/>
                <input  class="form-check-input" type="radio" id="icecream" value="5" name="_FEE">
                <label class="form-check-label" for="member">&#x1F49C;&nbsp;Ice Cream only!<?php echo("&nbsp;".($MEMBER_FEE-5).".00"); ?></label>
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
      <button class="btn btn-primary" name="SubmitButton" type="submit">Go to Paypal</button>
      </div  >
      </div>





</form>




