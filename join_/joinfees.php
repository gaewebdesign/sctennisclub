


<div class="row g-12">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3 ">

        </h4>
        <ul class="list-group mb-7">
          <li class="list-group-item d-flex justify-content-between lh-sm Back">
            <div>
             <h6 class="my-0"><?php echo(YEAR);?>  Membership Fees </h6> 

            </div>
          </li>
      
<div id="MemberForm">


          <li class="list-group-item d-flex justify-content-between Back">
          <input type="radio" id="member" value="RS" name="membership" required  >
                    <label> Santa Clara Resident Single &nbsp; $<?php echo(RES_FEE)?>
                    (before 1/1/26) </label>
          <br/> 
          </li>

          <li class="list-group-item d-flex justify-content-between  Back">
          <input type="radio" id="member" value="RF" name="membership" required  >
          <label> Santa Clara Resident Family &nbsp; $<?php echo(RES_FEE)?>
           (before 1/1/26)         </label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between  Back">
          <input type="radio" id="member" value="NRS" name="membership" required  >
          <label> Non-Resident Single &nbsp; $<?php echo(NONRES_SINGLE_FEE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between  Back">
          <input type="radio" id="member" value="NRF" name="membership" required  >
          <input type="hidden" fee= "<php echo(NONRESIDENT_FAMILY_FEE?>" /> 
          <label> Non-Resident Family &nbsp; $<?php echo(NONRES_FAMILY_FEE)?></label>
          <br/>
          </li>

        </ul>
</div>  <!-- MemberForm -->



</div>

