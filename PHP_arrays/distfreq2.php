<?php

$r=0;
$c=0;
// controllo il passaggio dal bottone B
if(isset($_POST['B']))
{
   $r=$_POST['R']*1;	
   $c=$_POST['C']*1;	
}	

$colore=array();	  
$colore[2]="rgb(100,0,0)";
$colore[3]="rgb(0,100,0)";
$colore[4]="rgb(0,0,100)";
$colore[5]="rgb(100,100,0)";
$colore[6]="rgb(0,100,100)";
$colore[7]="rgb(100,0,100)";
$colore[8]="rgb(0,0,0)";
$colore[9]="rgb(100,100,100)";
$colore[10]="rgb(200,0,100)";
$colore[11]="rgb(100,0,200)";
$colore[12]="rgb(0,100,200)";

?>

<HTML>
<BODY>

   <!--
   <form name='F1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
   &nbsp;r:<input type='text' name='R' value='<?php echo $r; ?>' size='3'>
   &nbsp;c:<input type='text' name='C' value='<?php echo $c; ?>' size='3'>
   &nbsp;<input type='submit' name='B' value='matrice'>
   </form>    
   -->
   
   <?php
   // disegno il form con gli oggetti necessari
   echo "<form name='F1' method='post' action='".$_SERVER['PHP_SELF']."'>";
   echo "&nbsp;r:<input type='text' name='R' value='".$r."' size='3'>";
   echo "&nbsp;c:<input type='text' name='C' value='".$c."' size='3'>";
   echo "&nbsp;<input type='submit' name='B' value='matrice'>";
   echo "</form>";    
   
   // qui disegno la tabella
   if(isset($_POST['B']))
   {
	  // creo l'array degli eventi
	  // e lo azzero per le posizioni da 2 a 12
      $dist=array();	  
      for($j=2;$j<=12;$j++)
	  {
		  $dist[$j]=0;
      }
	  
	  echo "<table border='1'>";
      // iterazione per le righe 
	  for($i=0;$i<$r;$i++)
	  {
	     echo "<tr>";	  
		 // iterazione per le colonne
         for($j=0;$j<$c;$j++)
		 {
			
			// contenuto della singola cella
			$d1=rand(1,6);
			$d2=rand(1,6);
			$dadi=$d1+$d2;
            
			// in base all'evento estratto
			// incremento di 1 la posizione corrispondente
			// nell'array della distribuzione di frequenza
            $dist[$dadi]++;			
			
		    echo "<td style='width:30px;height:20px;color:white;background-color:".$colore[$dadi].";'>";
            echo ($dadi);		
			echo "</td>";	 
		 }	 
	     echo "</tr>";	  
      }	  
	  echo "</table>";
   
      echo "<br>";
	  echo "<table border='1'>";
	  for($i=0;$i<2;$i++)
	  {
	     echo "<tr>";	  
         for($j=2;$j<=12;$j++)
		 {
            if($i==0)
			{
   		       echo "<td style='width:30px;height:20px;color:white;background-color:".$colore[$j].";'>";
		       echo $j;		
  			   echo "</td>";	 
			}
            else
			{
			   // visualizzo la frequenza
               // di ciascuno degli eventi			   
		       echo "<td style='width:30px;height:20px;color:black;background-color:yellow;'>";
               echo $dist[$j];
  			   echo "</td>";	 
		    }				
		 }	 
	     echo "</tr>";	  
      }	  
	  echo "</table>";

   }
   

   ?>

</BODY>
</HTML>



