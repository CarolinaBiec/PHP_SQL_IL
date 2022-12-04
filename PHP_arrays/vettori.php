<?php

  // forma esplicita
  $vett = [34,12,10,26,17,32];

  $pippo=4;
  //$vett[6]=$vett[5];
  $vett[6]=$pippo;
  $vett[7]=24;
  $vett[4]=null;
  
  // array bidimensionale
  // volutamente asimmetrico
  $m = array();
  $m[0][0]=45;
  $m[0][1]=56;
  $m[1][0]=58;
  $m[1][1]=11;
  $m[1][2]=13; // elemento di troppo
  $m[2][0]=51;
  $m[2][1]=17;
?>

<HTML>
<BODY>
   <H1>VETTORI IN PHP</H1>

   <?php
   echo "vett lungo ".count($vett)." elementi<br>"; 
   echo "<table border='1'";
   echo "<tr>";
   for($i=0;$i<count($vett);$i++)
   {
	  echo "<td>";
	  // intercetta l'elemento nullo
      if(is_null($vett[$i]))
      //if($vett[$i]==null)
         echo "nullo";
      else
         echo $vett[$i]." ";	   
	  echo "</td>"; 
   }	   
   echo "</tr>";
   echo "</table>";

   echo "<br><br>";
   // conteggia la prima dimensione della matrice (righe)
   echo "m lungo ".count($m)." elementi<br>"; 
   // conteggia la seconda dimensione della matrice (colonne)
   echo "m[0] lungo ".count($m[0])." elementi<br>"; 
   echo "m[1] lungo ".count($m[1])." elementi<br>"; 

   echo "<br><br>";
   echo "<table border='1'";

   // percorriamo la matrice per righe
   //for($i=0;$i<count($m);$i++)
   for($i=0;$i<3;$i++)
   {
      echo "<tr>";
      // percorriamo la riga della matrice per colonne
      //for($j=0;$j<count($m[$i]);$j++)
      for($j=0;$j<3;$j++)
      {
         echo "<td>";
		 // intercettiamo se l'elemento esiste
		 if(isset($m[$i][$j]))
		    echo $m[$i][$j];
		 else
            echo "manca";			 
         echo "</td>";
 	  } 	  
      echo "</tr>";
   }
   echo "</table>";
   
   ?>
   
</BODY>
</HTML>
