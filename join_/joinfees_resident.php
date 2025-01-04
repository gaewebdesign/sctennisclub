
<div class="row g-12">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>
        <ul class="list-group mb-7">
          <li class="list-group-item d-flex justify-content-between lh-sm Back">
            <div>
            <h6 class="my-0"><?php echo(YEAR);?>  Membership Fees</h6> 
<!--
            <span class="small">
              ($25 resident feees before 2025)
            </span>
-->
          </div>
          </li>
      
          <li class="list-group-item d-flex justify-content-between Back">
          <input type="radio" id="member" value="RS" name="membership" required  >
                    <label> Santa Clara City Resident Single &nbsp; $<?php echo(RES_FEE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between Back">
          <input type="radio" id="member" value="RF" name="membership" required  >
          <label> Santa Clara City Resident Family &nbsp; $<?php echo(RES_FEE)?></label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between Back">
          <label> 
<!--
          Santa Clara City residents may signup before 2025 for the discount resident fee 
                 of $<?php echo(RES_FEE); ?>.
                 <br/>
                 Proof of Santa Clara City residency for single or family memberships may be required.
                   Email the club (comm@) for more information.
                 <br/>
                 Non-resident applications will open in 2025. <br>
-->                 

                 Santa Clara Tennis Club must maintain a resident majority. <br> 
                 Not accepting Non-Residents at this time <br>  
  

                  <!--      Currently there are: </b>
          <?php print("<b>".Residents(YEAR)."</b> Residents") ?>  
          <?php print("<b>".NonResidents(YEAR)."</b> Non-Residents") ?>  
-->
          <br>

<!--  
          When there are more residents, this page will open to non-residents.
-->
          </label>
          <br/>
          </li>

      

        </ul>

      </div>
