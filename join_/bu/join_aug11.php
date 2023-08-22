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

    <div class="container">
       <div class="row">
        <h4 class="mb-3">Info </h4>
        <form class="needs-validation" novalidate name="signup" action="topaypal.php", method="post" >

        <div class="container-sm Function">
        <div class="row">
        <div class="col-sm-4 TextBox">  </div>
        <div class="col-sm-8">
            <input type="text"     >  </input>

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