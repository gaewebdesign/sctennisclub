<div class="container">
  <main>
    <div class="py-5 text-center">
     <picture>
     <img class="mg-fluid img-thumbnail" src="./images/barbecue.png" alt="" >
    </picture>
      <h2>Santa Clara Tennis Club </h2>

      <h3 style="font-size: 1.2em ">
    Enjoy social mixed doubles  and barbecue with fellow SCTC members & guests for
    at the annual Bob Hughes Memorial Pig-out  at Santa Clara Tennis Center on
    July  15, 2023 , 9-12 noon.<p> 
    </h3>   
    <h3 style="font-size: 1.4em ">
    Advanced signup for this event is required. <br>
    Signup page is at <a href="http://www.sctennisclub.org/signup">www.sctennisclub.org/signup</a>
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
             <h6 class="my-0">2023 Bob Hughes Memorial Pig-out</h6> 
<!--
              <h6 class="my-0">2023 Ice Cream Social Mixer</h6>
<!--
              <small class="text-muted"><a href="https://www.google.com/maps/place/Buchser+Middle+School+Tennis+Courts/@37.3443259,-121.9465687,17z/data=!3m1!4b1!4m6!3m5!1s0x808fcbc33f855c43:0xa00053b7d118a002!8m2!3d37.3443259!4d-121.94438!16s%2Fg%2F11rsc1j27t">Buscher School Tennis Courts</a></small><br>
-->
              <small class="text-muted"><a href="https://www.google.com/maps/search/santa+clara+tennis+center/@37.3463955,-121.9721728,14z/data=!3m1!4b1">Santa Clara Tennis Center</a></small>

            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <span>SCTC Members</span>
            <strong><?php echo('FREE' )?></strong>
          </li>
 


        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Info</h4>
        <form class="needs-validation" novalidate name="signup" action="./signup_/signup_free.php", method="post" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="fname">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="lname">
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

            <div class="col-sm-8">
              <label for="email" class="form-label">Password( see your newsletter)</label>
              <input type="text" class="form-control" id="password" placeholder="" value="" required name="password">
              <div class="invalid-feedback">
                Valid password is required.
              </div>
            </div>



            <div class="col-12" >
              <label type="hidden" for="paid" class="form-label"> <span class="text-muted"></span></label>
              <input type="hidden" class="form-control" id="paid" value=<?php echo $FEE ?> name="paid">
              <input type="hidden" class="form-control" id="guest" value=<?php echo $GUEST ?> name="guest">

              <div class="invalid-feedback">
                Fee Error 
              </div>
            </div> 

          </div>

<!--
          <h4 class="mb-3">Signup</h4>
-->
          <div class="my-3">
 <!--
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>
-->
          <button class="w-100 btn btn-primary btn-lg" type="submit">Sign Up</button>
        </form>
      </div>
    </div>
  </main>