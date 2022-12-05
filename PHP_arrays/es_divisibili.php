<?php

$r=0;
$c=0;

$conta = array();
for($i=0;$i<=3;$i++) 
{
   $conta[$i]=0;
}	

$colore=array();	  
$colore[0]="background-color:rgb(255,255,255);color:red;";
$colore[1]="background-color:rgb(0,150,0);color:white;";
$colore[2]="background-color:rgb(0,0,150);color:white;";
$colore[3]="background-color:rgb(255,255,150);color:blue;";

if(isset($_POST['B']))
{
   $r=$_POST['R'];
   $c=$_POST['C'];
}

?>

<HTML>
   <BODY>

   <FORM name='F1' method='POST' action='es_divisibili.php'>
      righe:<INPUT type='text' name='R' size='3' value='<?php echo $r; ?>' />
      colonne:<INPUT type='text' name='C'  size='3' value='<?php echo $c; ?>' />
      <INPUT type='submit' name='B'  value='matrice'/>
   </FORM>

   <BR>
   <TABLE border='1'>

   <?php

      for($j=0;$j<$r;$j++)
      {
         echo "<TR>";
         for($i=0;$i<$c;$i++)
         {
            $numero=rand(1,99);
			$t=0;
			if($numero%3==0) { $t=1; }
			if($numero%5==0) { $t=2; }
			if($numero%3==0 && $numero%5==0) { $t=3; }
			
			$stringa=$colore[$t];
            echo "<TD width='40px' style='".$stringa."' align='center'>".$numero."</TD>";
            $conta[$t]++;
         }
         echo "</TR>";
      }

   ?>

   </TABLE>

   <BR>
   <TABLE border='1'>
   <TR>
   <TD width='70px' style='<?php echo $colore[1]; ?>'>Div. per 3</TD>
   <TD width='70px' style='<?php echo $colore[2]; ?>'>Div. per 5</TD>
   <TD width='120px' style='<?php echo $colore[3]; ?>'>Div. per 3 e per 5</TD>
   </TR>   
   <TR>
   <?php
      for($i=1;$i<=3;$i++) 
      {
         $stringa="background-color:white;color:red;";
         echo "<TD width='50px' style='".$stringa."' align='center'>";
		 echo $conta[$i];
	     echo "</TD>";	  
	  }	  
   ?>	
   </TR>   
   </TABLE>

</BODY>
</HTML>
