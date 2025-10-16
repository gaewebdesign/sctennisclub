<script language="JavaScript" src="library/sorttable.js"> </script>


<style>
tr {
    line-height: 14px;
    min-height: 14px;
    height: 4px;
    color: blue;
 }
 </style>

<p>
<table class="table table-bordered table-striped table-condensed sortable">

      <thead>
        <tr>
        <th style="width:30%">First Name</th>
        <th style="width:30%">Last Name</th>
<!--
        <th style="width:30%">Dinner</th>
<th style="width:25%">Date</th>
        -->
        
        </tr>
      </thead>
      <tbody>
           <p>
           <h4>Participants </h4> 
           <p>
       <?php
          
          $epoch = strtotime('2025-10-1');
          // Switch between tables here **************************
          $query = "select * from ".TABLE_MIXER_PENDING." order by custom desc";
          $query = "select * from ".TABLE_MIXER_PENDING."  where custom>$epoch order by custom desc";

          $query = "select * from ".TABLE_MIXER_OR_PENDING."  where custom>$epoch order by custom desc";
          $query = "select * from ".TABLE_MIXER_PENDING." where custom>$epoch  order by custom desc";

          $query = "select * from ".TABLE_MIXER_PAYPAL."  where custom>$epoch order by fname asc";

//          $query = "select * from ".TABLE_MIXER_FREE."  where custom>$epoch order by custom desc";

         $event= PIGOUT_EVENT;

         
         $query = "select * from ".TABLE_MIXER_FREE."  where event=\"$event\"   order by fname asc";

        echo $query;
         $con = Configure();
           
 //        echo( $query );           
          $qr=mysqli_query($con,$query);


          while ($row = mysqli_fetch_assoc($qr)) {  
            echo "<tr>";
            echo '<td style="width:34%">';
            echo $row['fname'];

            echo '<td style="width:33%">';
            echo $row['lname'];

//            echo '<td style="width:33%">';
//            echo $row['event'];


//   ***************************
            $e = $row['custom']; //-60*60*7;
            $dt = new DateTime("@$e");
            $date = ltrim($dt->format('m/d/y '),0);
//   echo $date;
 //         echo '<td style="width:33%">';
 //          echo $date;

/*
           if($row['paid'] == $MEMBER_FEE) echo("🎾 ");
           else if( $row['paid'] == $GUEST_FEE) echo("🧢");
           else if( $row['paid'] == $ICECREAM_FEE) echo ("&#x1F49C");
*/
            echo "</tr>";
          }      


        ?>

      </tbody>
    </table>
  </div>