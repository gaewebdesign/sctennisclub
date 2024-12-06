<?php


//define("TABLE_TOURNY", "tourny_fuyu"); // Mx7.5 , Mx6.5  Winter
//define("TABLE_TOURNY", "tourny_natsu");  // M4.0 , W4.0    Summer
define("TABLE_TOURNY", "tourny_aki");  // M3.5 , W3.5  Fall

if( TABLE_TOURNY == "tourny_fuyu"){
//   Mixed season
   define("TOURNY_MEN","Mx7.5");
   define("TOURNY_WOMYN","Mx6.5");

}else if( TABLE_TOURNY == "tourny_natsu"){

//  Summer 4.0/4.0 
    define("TOURNY_MEN","M4.0");
    define("TOURNY_WOMYN","W4.0");
  
  }else {
//  Fall 3.5 season 
    define("TOURNY_MEN","M3.5");
    define("TOURNY_WOMYN","W3.5");
  
  }
  


define("TOURNY_MEN_QUARTERS","2/23");
define("TOURNY_MEN_SEMIS","3/9");
define("TOURNY_MEN_FINALS","3/23");


define("TOURNY_WOMYN_QUARTERS","2/23");
define("TOURNY_WOMYN_SEMIS","3/9");
define("TOURNY_WOMYN_FINALS","3/23");




?>