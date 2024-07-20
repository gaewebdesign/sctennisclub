


<form class="row g-3">





<div class="col-md-12">
    <label for="validationDefault04" class="form-label">Division</label>
    <select class="form-select" id="validationDefault04" required>
    <option selected value="">Mx 6.5</option>
    <option  value="">Mx 7.5</option>
    </select>
  </div>

  

  <div class="col-sm-3">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control fs-6" id="validationDefault01" value="" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control fs-6" id="validationDefault02" value="" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
<!--      <span class="input-group-text" id="inputGroupPrepend2"></span> -->
      <input type="text" class="form-control fs-6" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
    </div>
  </div>

  <div class="col-sm-1">
    <br/>
   <div class="input-group"> <p>
    <label for="validationDefault04" class="form-label">Gender</label> 
    <select class="form-select" id="validationDefault04" required>
    <option selected value="M">M</option>
    <option  value="F">F</option>    
    
    </select>
    </div>
   </div>

   <div class="col-sm-1">
    <br/>
   <div class="input-group">
    <label for="validationDefault04" class="form-label">NTRP</label> <p>
    <select class="form-select" id="validationDefault04" required>
    <option value="3.0">3.0</option>
    <option selected value="3.5">3.5</option>    
    <option value="4.0">4.0</option>
    </select>
    </div>
   </div>




  <hr/>
  <div class="col-sm-3">
    <label for="validationDefault01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationDefault01" value="" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefault02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationDefault02" value="" required>
  </div>
  <div class="col-sm-3">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
<!-- <span class="input-group-text" id="inputGroupPrepend2"></span> -->
      <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
    </div>
  </div>


  <div class="col-sm-1">
    <br/>
   <div class="input-group"> <p>
    <label for="validationDefault04" class="form-label">Gender</label> 
    <select class="form-select" id="validationDefault04" required>
    <option  value="M">M</option>
    <option selected value="F">F</option>    
    
    </select>
    </div>
   </div>

   <div class="col-sm-1">
    <br/>
   <div class="input-group">
    <label for="validationDefault04" class="form-label">NTRP</label> <p>
    <select class="form-select" id="validationDefault04" required>
    <option value="3.0">3.0</option>
    <option selected value="3.5">3.5</option>    
    <option value="4.0">4.0</option>
    </select>
    </div>
   </div>



  <!--
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationDefault03" required>
  </div>
-->



<!--
  <div class="col-md-3">
    <label for="validationDefault04" class="form-label">Division</label>
    <select class="form-select" id="validationDefault04" required>
    <option selected value="">Mx 6.5</option>
    <option selected value="">Mx 7.5</option>
    </select>
  </div>


  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationDefault05" required>
  </div>
-->


  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>







<?php



$theTABLE = "tourny";


$fname1 = $lname1 = $email1 = $gender1 = $ntrp1 = "";
$fname2 = $lname2 = $email2 = $gender2 = $ntrp2 = "";

$event=$team=$mtype=$date=$insignia=$payment=$custom=$opt=$pwd="";



$year=2024;

$theTABLE = "tourny";

$fname1="Roy";
$lname1="Molseed";
$email1="roy.molseee@gmail.com";
$gender1="M";
$ntrp1="4.0";

$fname2="Jeannette";
$lname2="Hoggart";
$email2="queenbee95051@@yahoo.com";
$gender2="W";
$ntrp2="3.5";

$division="Mx7.5";
$date = time()-60*60*7;

//toTournyDB($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd);

function toTournyDB($theTABLE,$fname1,$lname1,$email1,$gender1,$ntrp1,$fname2,$lname2,$email2,$gender2,$ntrp2,$year,$division,$team,$mtype,$date,$insignia,$payment,$custom,$opt,$pwd){

   $con = DBMembership();

   $query = 'insert into '.$theTABLE.'(_id,fname1,lname1,email1,gender1,ntrp1,fname2,lname2,email2,gender2,ntrp2,year,division,team,mtype,date,insignia,payment,custom,opt,pwd)';
  
   $query .= ' values (NULL'.add($fname1).add($lname1).add($email1).add($gender1).add($ntrp1);
   $query .= add($fname2).add($lname2).add($email2).add($gender2).add($ntrp2);
   $query .= add($year).add($division).add($team).add($mtype).add($date);
   $query .= add($insignia).add($payment).add($custom).add($opt).add($pwd);
   $query .= ")";

   LOGGER( $query );
   echo "<p>";
   echo $query;

   $query_results=mysqli_query($con, $query);

}

?>

<!--
| Field    | Type        | Null | Key | Default | Extra          |
+----------+-------------+------+-----+---------+----------------+
| _id      | int         | NO   | PRI | NULL    | auto_increment |
| fname1   | varchar(31) | YES  |     | NULL    |                |
| lname1   | varchar(31) | YES  |     | NULL    |                |
| email1   | varchar(50) | YES  |     | NULL    |                |
| gender1  | char(1)     | YES  |     | NULL    |                |
| ntrp1    | varchar(5)  | YES  |     | NULL    |                |
| fname2   | varchar(31) | YES  |     | NULL    |                |
| lname2   | varchar(31) | YES  |     | NULL    |                |
| email2   | varchar(50) | YES  |     | NULL    |                |
| gender2  | char(1)     | YES  |     | NULL    |                |
| ntrp2    | varchar(5)  | YES  |     | NULL    |                |
| year     | varchar(40) | YES  |     | NULL    |                |
| division | varchar(31) | YES  |     | NULL    |                |
| team     | varchar(31) | YES  |     | NULL    |                |
| mtype    | varchar(31) | YES  |     | NULL    |                |
| date     | int         | YES  |     | NULL    |                |
| insignia | varchar(7)  | YES  |     | NULL    |                |
| payment  | varchar(16) | YES  |     | NULL    |                |
| custom   | varchar(31) | YES  |     | NULL    |                |
| opt      | varchar(31) | YES  |     | NULL    |                |
| pwd      | varchar(31) | YES  |     | NULL    |                |
+----------+-------------+------+-----+---------+----------------+
21 rows in set (0.00 sec)

-->