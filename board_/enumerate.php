

<?php
$months = array("J","January","February","March","April","May","June","July","August","September","October","November","December");

function scanyear($year, $m)
{
    $d = scandir("./"); 
    $g = "/".$year.'[_\d\w\.]*pdf/i';
    $p = array_values(preg_grep("/".$year.'[_\d\w\.]*pdf/i', $d ) );
    echo '<p>';
    foreach( $p as $index => $f){
        list($year,$month,$day) = split("[_\.]",$f);
        echo '<a href="./board/'.$f.'">';
        echo $m[$month]." ".$day;
        echo "</a>&nbsp;\n";
        echo "<br>";
    }
}


function docs( $dir , $title){

      $d = scandir($dir);
 //     echo("scanning $dir --- <br>");

      $p = preg_grep("/.pdf/i", $d );
      $p = array_values($p);
  
      print($title);
      print("<br>");
      foreach( $p as $index => $f){
          $rdir = "board_/".$dir;
          echo '<a href="'.$rdir."/".$f.'">';
          $f = str_replace("_"," ",$f);
          $f = str_replace(".pdf","",$f);
  
          echo $f;
  
          echo "</a><br>";
  
      }
      print("<p>");
  }

          chdir("board_");
//          print("CURRENT DIR is: ".getcwd() ."<br>" );


           docs("./2022","2022"); 
           docs("./2023","2023");
           
?>
   