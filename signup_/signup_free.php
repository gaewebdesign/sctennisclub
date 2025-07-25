<div class="container">
<main>
    <div class="py-5 text-center">
     <picture>
<!--
      <img class="mg-fluid img-thumbnail" src="cinco.png" alt="" >
      https://www.bbqmusicfest.com/vendors/bbq-vendors
-->

<!--   <img class="mg-fluid img-thumbnail" src="./images/bbq_music.png" alt="-" >
    https://pngtree.com/freebackground/chinese-style-new-year-red-gold-background-material_949327.html

-->
<img class="mg-fluid img-thumbnail" src="./images/barbecue2.png" alt="-" >

  </picture>
      <h3>Santa Clara Tennis Club Annual Pigout </h3>

    <h3 style="font-size: 1.2em ">
    Enjoy some <b>barbecue</b> from <a href="https://swinchesterbbq.com/t/">South Winchester Barbecue</a> and tennis on the courts with fellow members  for
    social mixed doubles round robin play at Santa Clara Tennis Center on Saturday
    July 12, 2025 , 9-12 noon Courts #6-#8.
    <p>
      on the menu:  Chicken,  ribs, potato salad ,mac and cheese, corn bread, chips and salsa.
    <p>
    Signup early for this event, as spaces are limited. Deadline is July 5. 
    <br/>
    If you have questions, email Roy at social @ sctennisclub.org.
    <br>
    
    Signup page is at <a href="http://www.sctennisclub.org/pigout">www.sctennisclub.org/pigout</a>
  
    </h3>
  </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
<!--
          <span class="text-primary">--</span>
          <span class="badge bg-primary rounded-pill">*</span>
-->
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
             <h6 class="my-0">2025 July Pigout Social </h6> 

              <small class="text-muted"><a href="https://www.google.com/maps/search/santa+clara+tennis+center/@37.3463955,-121.9721728,14z/data=!3m1!4b1">Santa Clara Tennis Center</a></small>
              <br> Members signup for <b>free</b>
            </div>
          </li>

<!--
          <li class="list-group-item d-flex justify-content-between">

            <span>🎾 SCTC Members</span>
            <strong><?php echo("FREE" )?></strong>

          </li>
-->
          <!--

           <div class="col-md-4">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationDefault01" value="MV" required>
  </div>
-->
        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Information (one person per entry)</h4>
        <form  class="row g-3"  action="topigout.php", method="post" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" maxlength="12" class="form-control" id="firstName" required name="fname">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" maxlength="12" class="form-control" id="lastName" placeholder="" value="" required name="lname">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-8">
              <label for="email" class="form-label">Email Address</label>
              <input type="text" class="form-control" id="email" placeholder="" value="" required name="email">
              <div class="invalid-feedback">
                Valid email address is required.
              </div>
            </div>

<!--
            <div class="col-sm-8">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="4pigs" value="" required name="password">
              <div class="invalid-feedback">
                Password
              </div>
            </div>
-->

            <div class="my-3">
<!--
            <span><h2 style="color:rgb(25, 0, 255)">Select one: </h2></span>

              <div class="form-check ">
                <input class="form-check-input"  type="radio" id="member" value="SCTC" name="mixer"    >
                <label class="form-check-label" for="member">🎾 &nbsp;SCTC Member</label>

                <br/>
                <input  class="form-check-input" type="radio" id="guest" value= "GUEST" name="mixer"  >
                <label class="form-check-label" for="member">🧢 &nbsp; MVTC (guest)</label>

                <br/>
                <input  class="form-check-input" type="radio" id="icecream" value="ICECREAM" name="mixer">
                <label class="form-check-label" for="member">&#x1F49C;&nbsp;Ice Cream only!</label>

              </div>
-->
            </div>

            <div class="col-12" >
              <label type="hidden" for="paid" class="form-label"> <span class="text-muted"></span></label>
              <input type="hidden" class="form-control" id="paid" value=<?php echo $MEMBER_FEE ?> name="_SCTC">
              <input type="hidden" class="form-control" id="guest" value=<?php echo $GUEST_FEE ?> name="_GUEST">
              <input type="hidden" class="form-control" id="icecream" value=<?php echo $ICECREAM_FEE ?> name="_ICECREAM">

              <div class="invalid-feedback">
                Fee Error 
              </div>
            </div> 

          </div>

          <div class="my-3">

<!--
          <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
 -->
          </div>

                  <!-- div to show reCAPTCHA -->
        <div class="g-recaptcha"
          data-sitekey="6LdoCf4pAAAAADq5HgT8Oad1VDgs-KeA9viLIi3F"> 
        </div>
        <div>         
        <br><br><p><br>
        </div>         

<!-- <button class="w-100 btn btn-primary btn-lg" disabled > Event is over! - thanks all for signing up! </button> -->
          <button class="w-100 btn btn-primary btn-lg" disabled name = "SubmitButton" type="submit"> Signups Closed! </button>
        </form>

      </div>
    </div>
  </main>
</main>