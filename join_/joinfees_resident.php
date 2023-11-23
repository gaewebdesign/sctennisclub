
<div class="row g-12">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>
        <ul class="list-group mb-7">
          <li class="list-group-item d-flex justify-content-between lh-sm Back">
            <div>
             <h6 class="my-0"><?php echo(YEAR);?>  Membership Fees - (early bird discount)</h6> 

            </div>
          </li>
      
          <li class="list-group-item d-flex justify-content-between Back">
          <input type="radio" id="member" value="RS" name="membership" required  >
                    <label> Santa Clara Resident Single &nbsp; $<?php echo(RES_FEE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between Back">
          <input type="radio" id="member" value="RF" name="membership" required  >
          <label> Santa Clara Resident Family &nbsp; $<?php echo(RES_FEE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between Memb_Color  Back">
          <label> Santa Clara Tennis Club must maintain a resident majority. <br> 
                  Not accepting Non-Residents at this time <br>
            Currently there are: </b>
          <?php print("<b>".Residents(YEAR)."</b> Residents") ?>  
          <?php print("<b>".NonResidents(YEAR)."</b> Non-Residents") ?>  
          <br>

<!--  
          When there are more residents, this page will open to non-residents.
-->
          </label>
          <br/>
          </li>

      

        </ul>

      </div>
