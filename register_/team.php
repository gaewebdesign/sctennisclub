


<div class="row g-12">
      <div class="col-md-12 col-lg-12 col-xl-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3 ">

        </h4>
        <ul class="list-group mb-7">
          <li class="list-group-item d-flex justify-content-between lh-sm Back">
            <div>
             <h6 class="my-0"><?php echo(YEAR);?>  USTA Team Composition</h6> 

            </div>
          </li>
      
          <li class="list-group-item d-flex justify-content-between Back">
          <input type="checkbox" id="rescaptain" value="RS" name="rescaptain" notrequired  >
                    <label> Captain is Santa Clara Resident * &nbsp;</label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between  Back">
          <input type="checkbox" id="resprev" value="RF" name="resprev" notrequired >
          <label> Captained for Santa Clara Tennis Club in <?php echo(YEAR-1)?> or <?php echo(YEAR) ?> &nbsp; </label>
          <br/>
          </li>

          <li class="list-group-item d-flex justify-content-between  Back">
          

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
          <label> Number of Santa Clara residents on team  &nbsp; </label>


          <br/>
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
