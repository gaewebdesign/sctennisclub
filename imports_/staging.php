<html>

<head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
 .navbar-brand{
   font-size: smaller;
 }

 .dropdown-item{

#
#    background-color: #fff; /* here */
#    background: #fff;
     background-color: rgb(202,233,245);
     background: rgb(202,233,245);    
 }

   .dropdown{
     color: blue;
      font-size: smaller;

   }

   .colorfill{
    background: rgb(202,233,245);
  }
      

</style>

</head>






<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.phtml">Home</a> 

      <div class="dropdown" >
          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Tournament
          </a>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item active" href="./tournament.phtml?draw=0">Info</a></li>
              <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=0">Reorder (Mx 7.5)</a></li>
              <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=1">Reorder (Mx 6.5)</a></li>
              <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=2">Set to Default (Mx 7.5)</a></li>
              <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=3">Set to Default (Mx 6.5)</a></li>              
              <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=10">Draw 7.5</a></li>              

              <hr/>
               <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=4">Database</a></li>              
               <li><a class="dropdown-item" href="./debug_tournament.phtml?mode=5">Logger</a></li>              


            </ul>
        </div>

        <a class="navbar-brand" href="#">    </a>

        <div class="dropdown" >
          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                  Ladder
          </a>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item active" href="./ladder.phtml?mode=0">Info</a></li>
              <li><a class="dropdown-item" href="./ladder.phtml?mode=1">Ladder </a></li>
              <li><a class="dropdown-item" href="./ladder.phtml?mode=2">Men's Singles Report Score</a></li>
              <li><a class="dropdown-item" href="./ladder.phtml?mode=3">Women's Singles Report Score</a></li>
              <li><a class="dropdown-item" href="./ladder.phtml?mode=4">Results</a></li>
              <li><a class="dropdown-item" href="./ladder.phtml?mode=5">Contact Players</a></li>

              <hr/>
              <li><a class="dropdown-item" href="./ladder.phtml?mode=6">Enter Ladder</a></li>
              

            </ul>
        </div>



        </p>
      
      </body>
      </html>

 <!--

<a href="./index.phtml"> Home </a> |   

       <a href="./join_debug.phtml">Join </a> |
       <a href="./members_debug.phtml" >Members </a>|
       <a href="./pending.phtml">Pending</a>|
       <a href="./logger.phtml">Logger</a>|
       <a href="./signup_lunch.phtml" >Lunch </a>|
       <a href="./signup_debug.phtml" >Signup </a>|
       <a href="./pending_mixer.phtml" >Pending </a>|
       <a href="./email.phtml" >Email </a>

</a>

-->
             