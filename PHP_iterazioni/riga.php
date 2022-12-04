<?php

$c=12;

?>

<HTML>
<BODY>

<?php
   echo "<table border='1'>";
   echo "<tr>";
   for($i=0;$i<$c;$i++)
   {
      echo "<td>";
      $n = rand(1,6);
      echo $n;	  
      echo "</td>"; 	   
   }	   
   echo "</tr>";
   echo "</table>";
?>


</BODY>
</HTML>
