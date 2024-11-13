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



      .colorize{
        background-color: blue;

      }
      .china {

        border-radius: 5px;
        border: 2px solid #efdecd;

      }

      .tab {
            display: inline-block;
            margin-left: 20px;
        }

</style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
  <?php 
   // include "includes.inc";
   $MEMBER_FEE = TEAMTENNIS_MEMBER_FEE; // "10";
   $GUEST_FEE  = TEAMTENNIS_GUEST_FEE;   // "15";
  
  ?>

<div >
  <main>
  
  <div class="py-5 text-center">
  <h1>Team Tennis </h1>
  <picture>

   <img src="./images/animated_rafa.gif" width="75%" class="ReponsiveImage" >
  </picture>
  <p>


    <h3 style="font-size: 1.2em ">
    Enjoy team tennis  at <b>Santa Clara Tennis Center</b> 
    on Sunday December 8,2024  1:30pm - 4:30 pm. Deadline to signup is December 1 or until the event is filled.
    Cost is $<?php echo($MEMBER_FEE )?>for members , $ <?php echo($GUEST_FEE) ?> for guests <br/>
    Signup page is at <a href="./signup">www.sctennisclub.org/teamtennis</a>
    <p>
      For more information email Roy and Alice at <br>
       <img src = "./images/teamtennis.png" >

    </h3>
  </div>

<!--
  <div >
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm BackInput">
            <div>
              <b>Santa Clara Tennis Center Directions</b>

              <large class="tab text-muted"><a href="https://www.waze.com/live-map/directions/china-stix-restaurant-el-camino-real-2110-santa-clara?to=place.w.155976054.1560022679.1217845">
              via Waze</a>

              &nbsp;
              <large class="tab text-muted"><a href="https://www.yelp.com/map/china-stix-restaurant-santa-clara">
              via Yelp </a>


              </large>
            </div>
          </li>
        </ul>

    </div>
-->

     <form class="row g-3" action="./topaypal_teamtennis.php" method="POST">

            <div class="col-sm-5">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control BackInput" id="firstName" placeholder="" value="" required name="fname">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-sm-5">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control BackInput" id="LastName" placeholder="" value="" required name="lname">
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

   

        <div class="col-sm-1">
        <br/>
        <div class="input-group"> <p>
            <label for="validationDefault04" class="form-label">Gender</label> 
            <select class="form-select" id="validationDefault04" name="gender" required>
            <option selected value="M">M</option>
            <option  value="F">F</option>    
            </select>
          </div>
        </div>

         <div class="col-sm-1">
          <br/>
            <div class="input-group">
            <label for="validationDefault04" class="form-label">NTRP</label> <p>
            <select class="form-select" id="validationDefault04" name="ntrp" required>
            <option selected value="2.5">2.5</option>
            <option selected value="3.0">3.0</option>
            <option value="3.5">3.5</option>    
            <option value="4.0">4.0</option>
            <option value="4.5">4.5+</option>

          </select>
        </div>
       </div>

       <div class="col-sm-8">
              <label for="phone" class="form-label">Phone</label>
              <input type="phone" class="form-control BackInput" id="phone" placeholder="" value="" required name="phone">
              <div class="invalid-feedback">
                Valid cell phone is required.
              </div>
            </div>

<!--- ******** MEMBER OR NON-MEMBER  ****************************** -->
       <div class="container-fluid mt-4">

          <div class="col-sm-6">
            <span><h2 style="color:rgb(25, 0, 255)">Select one: </h2></span>  
            <div class="form-check ">
              <input class="form-check-input"  type="radio" id="member" checked="checked" value=<?php echo($MEMBER_FEE); ?> name="_FEE"    >
              <label class="form-check-label" for="member">🎾 &nbsp;SCTC Member: $<?php echo($MEMBER_FEE); ?></label>
              <br/>
              <input  class="form-check-input" type="radio" id="icecream" value=<?php echo($GUEST_FEE); ?> name="_FEE">
              <label class="form-check-label" for="member">&#x1F49C;&nbsp;Guest: $<?php echo($GUEST_FEE); ?></label>
            </div>

          </div>
      </div>




<!--- ******** HIDDEN FEE ****************************** -->
    <div class="col-12" >
              <label type="hidden" for="paid" class="form-label"> <span class="text-muted"></span></label>
              <input type="hidden" class="form-control" id="paid" value=<?php echo $MEMBER_FEE ?> name="_TEAMTENNIS_MEMBER_FEE">
              <input type="hidden" class="form-control" id="paid" value=<?php echo $GUEST_FEE ?> name="_TEAMTENNIS_GUEST_FEE">
              <div class="invalid-feedback">
                Fee Error 
              </div>
    </div> 


<!--- ******** CAPTCTHA ****************************** -->

<style>
    /* already defined in bootstrap4 */
    .text-xs-center {
        text-align: center;
    }

    .g-recaptcha {
        display: inline-block;
    }

    .captchacenter{
          justify: center;
          align: center; 
    }
</style>

<div class="text-xs-center">
<div class="row md-12 mt-5 g-recaptcha"
          data-sitekey="6LdoCf4pAAAAADq5HgT8Oad1VDgs-KeA9viLIi3F"> 
 </div>
 </div>

  </div>
<hr/>


<button class="w-500 btn btn-primary btn-lg"   name="SubmitButton" > Signup for Team Tennis! </button>


</form>


    
  </body>



</html>
