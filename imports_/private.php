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
      <a class="navbar-brand" href="./email.phtml">Members</a>
      <a class="navbar-brand" href="./email_tournament.phtml">Tournament</a>
      <a class="navbar-brand" href="./email_free.phtml">Pigout</a>
      <a class="navbar-brand" href="./email_lunch.phtml">Fatima Lunch</a>
      <a class="navbar-brand" href="./email_join.phtml">Athena Dinner</a>


      <div class="dropdown" >
          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Tournament
          </a>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item active" href="./tournament.phtml?draw=0">Info</a></li>
              <li><a class="dropdown-item dropdown-menu-dark colorfill" disabled href="./tournament.phtml?draw=1">Players</a></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=2">Draws (Mx 7.5)</a></li>
              <li><a class="dropdown-item" href="./tournament.phtml?draw=3">Draws (Mx 6.5)</a></li>
              <li><hr class="dropdown-divider" style="border-color:black;"></li>
              <li><a class="dropdown-item disabled"  href="./tournament.phtml?draw=4">Enter Tournament</a></li>
        </ul>
        </div>

 </p>
      
</body>
</html>

<!--
 Previous without Drop-Down
<a href="./index.phtml"> Home </a> |   
<a href="./email.phtml" >Email </a> |
<a href="./email_free.phtml"> Pigout </a> |
<a href="./email_lunch.phtml"> Fatima Lunch </a> |
<a href="./email_join.phtml" >Athena Dinner</a>

</a>
-->