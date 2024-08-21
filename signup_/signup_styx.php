<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>SCTC Signup</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">


<link href="./Mixer.css" rel="stylesheet" />
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .colorize{
        background-color: blue;

      }
      .china {

        border-radius: 5px;
        border: 2px solid #efdecd;

      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
  <?php 
   // include "includes.inc";
    $MEMBER_FEE=DINNER;
  ?>

<div class="container">
  <main>
    <div class="py-5 text-center">
     <picture>
<!--
      <img class="mg-fluid img-thumbnail" src="cinco.png" alt="" >
    <img class="mg-fluid img-thumbnail" src="./images/Athenat.png" alt="" >
    -->
   <img  src="./images/chinastix.jpg" alt="" class="ResponsiveImage china" >

  </picture>
  <p>
      <h2>Santa Clara Tennis Club Year End Dinner </h2>

    <h3 style="font-size: 1.2em ">
    Enjoy dinner at <b>China Stix</b> in Santa Clara
    on Thursday November 14 , 6:30-8 pm. Deadline to signup is November 1, 2024.
    Signup page is at <a href="./signup">www.sctennisclub.org/signup</a>
  
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
          <li class="list-group-item d-flex justify-content-between lh-sm BackInput">
            <div>
             <h6 class="my-0">2024 October z  Year end dinner </h6> 

              <large class="text-muted"><a href="https://www.waze.com/live-map/directions/china-stix-restaurant-el-camino-real-2110-santa-clara?to=place.w.155976054.1560022679.1217845">
              China Stix Directions</a></large>

            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between">
           
            <div class="BackInput">  Dinner  $<?php echo($MEMBER_FEE )?>
            </div>

          </li>


        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Info (one person per entry)</h4>
        <form class="needs-validation" novalidate name="signup" action="./topaypal_styx.php", method="post" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control BackInput" id="firstName" placeholder="" value="" required name="fname">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control BackInput" id="lastName" placeholder="" value="" required name="lname">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-8">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control BackInput" id="email" placeholder="" value="" required name="email">
              <div class="invalid-feedback">
                Valid email address is required.
              </div>
            </div>
            <div class="class-sm-12">

            </div>
            <div class="col-md-12">
              <span><h2 style="color:rgb(25, 0, 255)">Menu: </h2></span> 
              <ul class="list-group list-group flush Back">
              <li class="list-group-item Back"> Pot stickers </li>
              <li class="list-group-item Back"> Chinese Chicken Salad </li>
              <li class="list-group-item Back"> Honey Pecan Prawns </li>
              <li class="list-group-item Back"> Garlic Fish </li>
              <li class="list-group-item Back"> Shanghai Spareribs </li>
              <li class="list-group-item Back"> Broccoli Beef </li>
              <li class="list-group-item Back"> Orange Chicken </li>
              <li class="list-group-item Back"> String Beams  </li>
              <li class="list-group-item Back"> Combination Chow Mein  </li>
              <li class="list-group-item Back"> BBQ Pork Fried Rice </li>


               </ul>
<!--

-->
            </div>

            <div class="col-12" >
              <label type="hidden" for="paid" class="form-label"> <span class="text-muted"></span></label>
              <input type="hidden" class="form-control" id="paid" value=<?php echo $MEMBER_FEE ?> name="_SCTC">
              <div class="invalid-feedback">
                Fee Error 
              </div>
            </div> 

          </div>

        <div class="container-fluid mt-2">
        <div class="g-recaptcha"
          data-sitekey="6LdoCf4pAAAAADq5HgT8Oad1VDgs-KeA9viLIi3F"> 
        </div>
        </div>



          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
 
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

<!--
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          <button class="w-100 btn btn-primary btn-lg" disabled >Goto Paypal</button>

-->
<button class="w-100 btn btn-primary btn-lg"  name="SubmitButton" > Signup for Dinner! </button>

        </form>
      </div>
    </div>
  </main>

  <p>


 
</div>


    

    
  </body>



</html>
