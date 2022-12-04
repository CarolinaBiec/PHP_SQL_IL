<HTML>
<BODY>
<H1>Iterazioni</H1>

<?php
   $m1=1;
   $m2=99;
   $valore = rand($m1,$m2);
   echo "valore casuale intero compreso tra ".$m1." e ".$m2." : ".$valore."<br><br>"; 

   // iterazione for (enumerativa)
   // utilizza un indice, il quale
   // parte da un certo punto
   // e si incrementa di 1 
   // fino ad arrivare ad un limite prefissato  
   for($i=0;$i<10;$i++)
   {
      echo $i." : ";
      $valore = rand($m1,$m2);
      echo $valore."<br>";	  
   }	   
   echo "<br><br>";
    
   // iterazione while (non enumerativa)
   // pone una condizione ed itera finchè
   // questa è vera	   
   $sommatore=0;
   $i=0;
   while($sommatore < 300)
   {
      echo $i." : ";
      $valore = rand($m1,$m2);
      echo "valore generato : ".$valore;	  
      $sommatore = $sommatore + $valore;
      echo " - totale parziale : ".$sommatore."<br>";	  
	  $i++; 
   }	   
   echo "<br><br>";

   
   $n=1;
   echo "inizio<br>";
   while( $n%3 != 0)
   {
      $valore = rand($m1,$m2);
      echo "valore generato : ".$valore."<br>";	  
      //$n = rand($m1,$m2);
      //echo "valore generato : ".$n."<br>";	  
      $n = $valore;	   
   }	   
   echo "fine<br>";
	   
?>

</BODY>
</HTML>
