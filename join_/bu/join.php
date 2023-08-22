<div class="container">
<main>
    <div class="py-5 text-center">
     <picture>
<!--
      <img class="mg-fluid img-thumbnail" src="cinco.png" alt="" >
-->

    <img class="mg-fluid img-thumbnail" src="./images/SCTCLogo.png" alt="-" >
  </picture>

  </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>
        <ul class="list-group mb-3">
 

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Info (one person per entry)</h4>
        <form class="needs-validation" novalidate name="signup" action="topaypal.php", method="post" >
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

            <div class="my-3">
              <span><h2 style="color:rgb(25, 0, 255)">Select one: </h2></span> 

              <div class="form-check ">
                <input class="form-check-input"  type="radio" id="member" value="SCTC" name="mixer"    >
                <label class="form-check-label" for="member">&nbsp;Resident</label>

                <br/>


                <input  class="form-check-input" type="radio" id="guest" value= "GUEST" name="mixer"  >
                <label class="form-check-label" for="member"> &nbsp; Non Resident</label>

                <br/>

              </div>
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


          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
 
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit"> Continue to checkout</button>
        </form>

      </div>
    </div>
  </main>
</main>