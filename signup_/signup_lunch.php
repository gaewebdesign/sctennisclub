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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
  <?php 
   // include "includes.inc";
    $MEMBER_FEE=10; //$MEMBER_FEE;
    $MEMBER_FEE=0.01;
  ?>;

<div class="container">
  <main>
    <div class="py-5 text-center">
     <picture>
<!--
      <img class="mg-fluid img-thumbnail" src="cinco.png" alt="" >
    <img class="mg-fluid img-thumbnail" src="./images/Athenat.png" alt="" >
   https://fatimabazaar.com/ </a>
  -->
    <img  src="./images/egypt.png" alt="" class="ResponsiveImage" > 


  </picture>
      <h2>May Lunch and Tennis Social </h2>

    <h3 style="font-size: 1.2em ">
    Enjoy Lunch and Tennis at  Santa Clara Tennis Club
    on Saturday May , 9-12 pm. Deadline to signup is Monday April xx, 2024.
    Signup page is at <a href="./signup">www.sctennisclub.org/signup</a>
  
    </h3>
  </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
<!--
          <span class="text-primary">--</span>
          <span class="badge bg-primary rounded-pill">*</span>
             <img src="./images/fatima.png"  class="ResponsiveImage">
        -->
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm BackInput">
            <div>
             <h6 class="my-0">2024 May Mixer </h6> 


    <!--
             <large class="text-muted"><a href="https://www.google.com/maps/place/Athena+Grill+%26+Catering/@37.3764667,-121.9590747,17z/data=!3m1!4b1!4m6!3m5!1s0x808fca283052b81f:0x97b199e3951a5818!8m2!3d37.3764667!4d-121.9564944!16s%2Fg%2F1hbpwrv7r?entry=ttu">
                  Athena Grill Directions</a></large>
            <img  src="./images/bazaar.png" alt="" class="ResponsiveImage" > 
                -->
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between">
           
            <div class="BackInput">  Lunch and Tennis <?php echo("$".$MEMBER_FEE )?>
            <img src="./images/bazaar.png">

            </div>

          </li>


        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Info (one person per entry)</h4>
        <form class="needs-validation" novalidate name="signup" action="./topaypal_dinner.php", method="post" >
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
<!--
            <div class="my-3">
              <span><h2 style="color:rgb(25, 0, 255)">Select one: </h2></span> 
              <label >
                All dinners come with  hummus, pita bread and house salad.
                <hr/>
              </label>
              <div class="form-check ">
                <input class="form-check-input"  type="radio" id="chicken" value="chicken" name="dinner"  required   ></input>
                <label class="form-check-label" for="member"><b>Chicken Souvlaki </b> &nbsp;
                   Marinated chicken thigh meat skewered and grilled, served with rice and Greek vegetable medley

                </label>

                <br/>
                <input  class="form-check-input" type="radio" id="salmon" value= "salmon" name="dinner" required ></input>
                <label class="form-check-label" for="member"><b>Salmon</b>&nbsp; fresh Atlantic salmon
                marinated and grilled with rice and Greek vegetable medley</label>

                <br/>
                <input  class="form-check-input" type="radio" id="veg" value="veg" name="dinner" required></input>
                <label class="form-check-label" for="member"><b>Vegetarian Mousaka</b>
                eggplant, mushrooms casserole with zucchini and potato topped with creamy bechamel, served
                with garlic fries
                </label>
                
                <br/>
                <input  class="form-check-input" type="radio" id="gyro" value="gyro" name="dinner" required></input>
                <label class="form-check-label" for="member"><b>Gyro Plate</b>
                thin slices of seasoned beef served over warm pita bread with tzatiki sauce, tomato, red onions
                and served with garlic fries
                </label>
               <hr/>
              </div>
            </div>
    -->
            <div class="col-12" >
              <label type="hidden" for="paid" class="form-label"> <span class="text-muted"></span></label>
              <input type="hidden" class="form-control" id="paid" value=<?php echo $MEMBER_FEE ?> name="_SCTC">
              <div class="invalid-feedback">
                Fee Error 
              </div>
            </div> 

          </div>


          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
 
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

<!--
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          <button class="w-100 btn btn-primary btn-lg" disabled >Goto Paypal</button>
<button class="w-100 btn btn-primary btn-lg" disabled > Signup is Over! </button>
-->
<button class="w-100 btn btn-primary btn-lg" enabled > Signup is Over! </button>

        </form>
      </div>
    </div>
  </main>

  <p>


 
</div>


    

    
  </body>



</html>
