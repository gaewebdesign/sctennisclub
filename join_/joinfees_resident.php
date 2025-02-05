<?php

$con = DBMembership();
  $year=YEAR;
  $query = "select * from ".TABLE_WAITLIST." where year=$year and custom!=\"done\" order by date asc limit 3 ";
  $qr=mysqli_query($con,$query);
  $num_rows = mysqli_num_rows($qr);
  
?>
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
                 <style>
                  .smallish{
                    font-family:    Arial, Helvetica, sans-serif
                    font-size:      4.4em;
                    font-weight:    normal;
                  }
                 </style>
                <div class="small">       
                 Santa Clara Tennis Club must maintain a resident majority. 
                 Not accepting Non-Residents at this time. <br>  
                </div>       
<!-- **************** -->
<!--
          <li class="list-group-item d-flex justify-content-between Back">
          <input type="radio" id="member" value="NRSx" name="membership" required  >
          <label> Non-Resident Single Waitlist &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $<?php echo(NONRES_SINGLE_FEE)?></label>
          <br/>
          </li>
 -->
<!-- **************** -->
          </label>
<!--
          <p><br>

            <input type="checkbox" name="TT_sticky_header" id="TT_sticky_header_function" value="{TT_sticky_header}"
             onchange="stickyheaddsadaer(this)"/>
            <label for="view_waitlist"> View Waitlist</label><br><br>

          <div id="id_waitlist" style="display:none;" >
          <table class="table table-sctc table-condensed " width="80%" 
          
-->          
<!--
          <thead>
         <tr>
         <th width="30%"> &nbsp;&nbsp;&nbsp;</th> 
         <th width="15%"> &nbsp;&nbsp; &nbsp;&nbsp;</th>
         <th width="15%"> &nbsp;&nbsp; &nbsp;&nbsp;</th>
         </tr>
       </thead>
 -->
       <tbody>
        <?php

           $con = DBMembership();
           $year=YEAR;
           $query = "select * from ".TABLE_WAITLIST." where year=$year and custom!=\"done\" order by date asc limit 7 ";
           $qr=mysqli_query($con,$query);
           $n = mysqli_num_rows($qr);

//           if($n==0) echo ("Waitlist empty");

           while ($row = mysqli_fetch_assoc($qr)) {  
            $name = $row[FNAME]." ".$row[LNAME];
            $team = $row[TEAM];
            $ntrp = $row[GENDER].$row[NTRP];

            $custom  = $row[DATE];
            $dt = new DateTime("@$custom");
            $date = ltrim($dt->format('m/d/Y'),0);
            echo("<tr><td>$name<td>$ntrp <td>$date \n");

          }
?>           

 </table>

        </div> <!-- waitlist div -->


        </ul>

      </div>
