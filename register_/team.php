


<div class="row g-12 Back">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3 ">

        </h4>
        <ul class="list-group mb-7">
          <li class="list-group-item d-flex justify-content-start lh-sm Back">
            <div>
             <h6 class="my-0"><?php echo(YEAR);?>  USTA Team Composition</h6> 

            </div>
          </li>
      
          <li class="list-group-item d-flex justify-content-start Back">
          <input type="checkbox" id="rescaptain" value="RS" name="rescaptain" notrequired  >
                    <label>&nbsp;&nbsp; Captain is Santa Clara Resident &nbsp;</label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-start  Back">
          <input type="checkbox" id="resprev" value="RF" name="resprev" notrequired >
          <label>&nbsp;&nbsp; Santa Clara Tennis Club member in <?php echo(YEAR-1)?> (last year) &nbsp; </label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-start  Back">
          

          <select class="form-select Back" id="validationDefault06" name="rescount" notrequired>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
          <label>&nbsp; &nbsp; Number of Santa Clara residents on team  &nbsp; </label>


          <br/>
<!--   ************************ -->

<li class="list-group-item d-flex justify-content-start  Back">
          

          <select class="form-select Back" id="validationDefault06" name="preference" notrequired>
            <option value="None">None</option>
            <option value="Sat">Sat</option>
            <option value="Sun">Sun</option>
            <option value="M-F">M-F</option>
            <option value="Day">Day</option>
          </select>
          <label>&nbsp;&nbsp; Home Match day Preference </label>



<!--   ************************ -->




<!--
        </li>

          <li class="list-group-item d-flex justify-content-between  Back">
          <input type="checkbox" id="anonymous" value="any" name="anonymous" required  >
          <input type="hidden" fee= "<php echo(NONRESIDENT_FAMILY_FEE?>" /> 
          <label> Captain SCTC member in <?php echo(YEAR-1); echo(" or "); echo(YEAR); ?> </label>
          <br/>
          </li>
-->
        </ul>

      </div>
