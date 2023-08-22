<?php
   $RES_SINGLE = ".10";
   $RES_FAMILY = ".10";

   $NONRES_SINGLE = ".15";
   $NONRES_FAMILY = ".25";

?>

<div class="row g-12">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>
        <ul class="list-group mb-7">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
             <h6 class="my-0">2024 Membership Fees </h6> 

            </div>
          </li>
      
          <li class="list-group-item d-flex justify-content-between">
          <input type="radio" id="member" value="RESSingle" name="membership" required  >
          <label> Santa Clara Resident Single &nbsp; $<?php echo($RES_SINGLE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between">
          <input type="radio" id="member" value="RESSingle" name="membership" required  >
          <label> Santa Clara Resident Single &nbsp; $<?php echo($RES_SINGLE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between">
          <input type="radio" id="member" value="RESSingle" name="membership" required  >
          <label> Non-Resident Single &nbsp; $<?php echo($RES_SINGLE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between">
          <input type="radio" id="member" value="RESSingle" name="membership" required  >
          <label> Non-Resident Family &nbsp; $<?php echo($RES_SINGLE)?></label>
          <br/>
          </li>

        </ul>

      </div>
