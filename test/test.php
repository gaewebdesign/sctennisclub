<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/index.css" >

      <title>Santa Clara Tennis Club</title>

      
    <!-- Google reCAPTCHA CDN -->
<!--
    <script src= 
      "https://www.google.com/recaptcha/api.js" async defer> 
    </script> 
-->
</head>
<div class="container">
<h1> Validation </h1>
</div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Infomation (one person per entry)</h4>
        <form class="row g-3" action="totest.php", method="post" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" required name="fname">
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

            </div>


          </div>

          <div class="my-3">

          </div>


          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>

        </form>

      </div>
    </div>
