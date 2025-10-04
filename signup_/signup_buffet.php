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
   $MEMBER_FEE=DINNER;
   $MEMBER_FEE="20";
  
  ?>

<div >
  <main>
    <div class="py-5 text-center">
     <picture>
   <img  src="./images/hanga.png" alt="" class="ResponsiveImage china" >

  </picture>
  <p>
      <h2>Santa Clara Tennis Club Year End Dinner </h2>

    <h3 style="font-size: 1.18em ">
    Enjoy dinner at <a href="https://www.yelp.com/biz/hokkaido-buffet-san-jose"><b>Hokkaido Buffet</b></a> in San Jose on Thursday November 13 , 6-8 pm. (dinner available at 6:30)
     <br/>Address is 3830 Stevens Creek Blvd, San Jose, 95117 <br/>
     We get a private room! 
    Full Buffet dinner is $<?php echo("20") ?>  <br/>
    Deadline to register is Nov 9, 2025 <br/>
    <h3 style="font-size: 1.1em">
    Signup at <a href="https:/www.sctennisclub.org/signup"/> www.sctennisclub.org/signup </a>
      </h3>
    <!--
    Registration afterwards will be $<?php echo($MEMBER_FEE) ?> until the final deadline of November 4 <br/>
          Signup page is at <a href="./signup">www.sctennisclub.org/signup</a>
 -->  
    </h3>
  </div>

  <div >
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm BackInput">
            <div>
              <b>Hokkaido Buffet Directions</b>

              <large class="tab text-muted"><a href="https://www.waze.com/live-map/directions/us/ca/san-jose/hokkaido-buffet?to=place.ChIJk-1i9M7Lj4AR31n1-BPHPHY">
              via Waze</a>

              &nbsp;
              <large class="tab text-muted"><a href="https://www.yelp.com/map/hokkaido-buffet-san-jose">
              via Yelp </a>


              </large>
            </div>
          </li>

        </ul>

    </div>


     <form class="row g-3" action="./topaypal_buffet.php" method="POST">

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
<!--- ******** HIDDEN FEE ****************************** -->
    <div class="col-12" >
              <label type="hidden" for="paid" class="form-label"> <span class="text-muted"></span></label>
              <input type="hidden" class="form-control" id="paid" value=<?php echo $MEMBER_FEE ?> name="_BUFFET_FEE">
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
<div>



<!--- ************************************************* -->        

    <!--

<div class="row md-12 text-start">
      <table class="table table-bordered table-md ms-10">
                <thead>

                  <th style="width: 1%"> </th>

                 <th style="width:45%">
                  &nbsp; <label class="mt-10 form-check-label" for="member"><b>Select One</b> &nbsp;

                  </thead>
              
              <tr>
              <td> </td>



                 <td style="text-align:left">&nbsp; &nbsp;<input class="form-control-input" checked type="radio" id="dinner" value="10Course" name="dinner"  required   ></input>
                        <label class="form-check-label" for="member" style="text-align:left"><b>10 Course Dinner </b> &nbsp;
                       </label> 
                <td style="text-align:left"> Chinese Chicken Salad, Honey Pecan Prawns, Garlic Fish, Shanghai Spareribs
                     Broccoli Beef, Orange Chicken, String Beans, Combinaton Chow Mein, BBQ Pork Fried Rice
              
                <tr> 
                <td> </td>
                <td style="text-align:left"> &nbsp; &nbsp;<input class="form-control-input" type="radio" id="dinner" value="Vegetarian" name="dinner"  required   ></input>
                        <label class="form-check-label" for="member"><b>Vegetarian </b> &nbsp;
                       </label> 
                  
                <td style="text-align:left"> Vegetarian Fried Rice and 2-3 menu selections.
                 </tr>

              </table>


    </div>
  -->
<!--- ************************************************* -->        




<button class="w-100 btn btn-primary btn-lg"  disabled name="SubmitButton" > &nbsp;     Club Dinner is Thursday November 13 &nbsp;</button>


</form>


    
  </body>



</html>
