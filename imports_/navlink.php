<html>

<head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
 .navbar-brand{
   font-size: medium;
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
<!--

https://getbootstrap.com/docs/5.1/getting-started/introduction/

-->
<!--
<a href="./index.phtml"> Home </a> |   
                  <a href="./info"> Info </a> |          
                  <a href="./membership" >Membership </a>|
                  <a href="./join" class="Link_Red" >Join </a>|                 
                  <a href="./members" >Members </a>|
                  <a href="./signup" class="Link_Purple">Pigout Signup</a>| 
                  <a href="./mixers" >Mixers </a> |
                  <a href="./june" class="Link_Purple">June</a>|
                  <a href="./board" >Board</a>  |
                  <a href="./usta" >USTA  
-->



<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.phtml">Home</a> 


<!--  <a class="navbar-brand" href="./info">Info</a>  -->

      <div class="dropdown" >
          <a class="dropdown-toggle navbar-brand"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Info
          </a>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item" href="./info">SCTC</a></li>
              <li><a class="dropdown-item" href="./membership">Membership</a></li>

              <li><a class="dropdown-item" href="./board">Board</a></li>
<!--          <li><hr class="dropdown-divider" style="border-color:black;"></li>  -->

            </ul>
        </div>


<!--
      <a class="navbar-brand" href="./membership">Membership</a>
-->


      <a class="navbar-brand Link_Red" href="./join">Join</a>
      <a class="navbar-brand" href="./members">Members</a>
<!--      <a class="navbar-brand" href="./signup">Pigout Signup</a>  -->
      <a class="navbar-brand" href="./mixers">Mixers</a>  


      <div class="dropdown" >
          <a class="dropdown-toggle navbar-brand"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Past Events
          </a>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
<!--              <li><a class="dropdown-item active" href="./event_past.phtml">Info</a></li>  -->
<!--          <li><a class="dropdown-item dropdown-menu-dark colorfill" disabled href="./event_past.phtml?draw=1">Players</a></li> -->

              <li><a class="dropdown-item" href="./signup_lunch.phtml">May - Cinco de Mayo</a></li>
              <li><a class="dropdown-item" href="./signup_free.phtml">July - Annual Pigout</a></li>
              
              <li><a class="dropdown-item" href="./signup_icecream.phtml">August - Ice Cream Social</a></li>
              <li><a class="dropdown-item" href="./signup_styx.phtml">November - End of year Dinner</a></li>
              <li><a class="dropdown-item" href="./teamtennis.phtml">December - Team Tennis</a></li>
              <li><hr class="dropdown-divider" style="border-color:black;"></li>

<!--
              <li><a class="dropdown-item" href="./signup_styx.phtml">November - Annual Dinner</a></li>
              <li><a class="dropdown-item" href="./signup_styx.phtml">December - Team Tennis</a></li>
-->
            </ul>
        </div>

<!--  <a class="navbar-brand" href="./june" class="Link_Purple">June</a> -->

<!--  <a class="navbar-brand" href="./board">Board</a>  -->

      <a class="navbar-brand" href="./usta">USTA</a>
<!--
      <a class="navbar-brand" href="https://www.ustanorcal.com/organization.asp?id=20">SCTC Teams </a>
-->
      <!--
      <a class="navbar-brand" href="http://www.racquetstore.com">  <img src="./images/racquet_store_logo.png" width="25px" > Racquet Store </a>
-->                


<div class="dropdown" >
          <a class="dropdown-toggle navbar-brand"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
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






      <div class="dropdown" >
          <a class="dropdown-toggle navbar-brand"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Tournament
          </a>
<?php
     include "./library/tourny.inc";  // Tournament menu items
?>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item active" href="./tournament.phtml">Info</a></li>
              <li><a class="dropdown-item dropdown-menu-dark colorfill" disabled href="./tournament.phtml?draw=1">Players</a></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=2">Draws <?php echo(TOURNY_MEN) ?></a></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=3">Draws <?php echo(TOURNY_WOMYN) ?></a></li>
              <li><hr class="dropdown-divider" style="border-color:black;"></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=4">Enter Tournament</a></li>

              <li><a class="dropdown-item" href="./tournament.phtml?draw=5">Contact Players</a></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=6">Report <?php echo(TOURNY_MEN) ?> Scores</a></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=7">Report <?php echo(TOURNY_WOMYN) ?> Scores</a></li>
        </ul>
        </div>







<!--
         s
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tournament
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Info</a></li>
              <li><a class="dropdown-item disabled" href="#">Signup</a></li>
              <li><a class="dropdown-item" href="#">Players</a></li>
              <li><a class="dropdown-item" href="./tournament">Draws (Mens Singles)</a></li>
              <li><a class="dropdown-item" href="./tournament">Draws (Womens Singles)</a></li>




            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  -->
 </p>
      
</body>
</html>