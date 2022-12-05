<?php
session_start();

// righe e colonne della matrice di text
$r=4;
$c=5;
$conta=0;

if(isset($_POST['R']))
{
   $_SESSION['valori']=null;
   $_SESSION['numeri']=null;
}

if(!isset($_SESSION['valori']))
{	
   // viene creata e azzerata 
   // la matrice di appoggio per i valori
   $_SESSION['valori'] = array();
   
   // matrice per i numeri casuali
   $_SESSION['numeri'] = array();
   
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
        $_SESSION['valori'][$j][$i]=0;
        $_SESSION['numeri'][$j][$i]=rand(1,99);
      } 
   }
}


// intercetta se ho premuto uno dei submit
// della matrice B
if(isset($_POST['B']))
{
   for($j=0;$j<$r;$j++)
   {
     for($i=0;$i<$c;$i++)
     {
		 // li percorro tutti per vedere 
		 // quale l'unico che esiste
		 if(isset($_POST['B'][$j][$i]))
         {
			 //echo "Hai premuto ".$j."-".$i."<BR>";
			 $_SESSION['valori'][$j][$i]=1;
			 $conta=$_POST['D'];  

             if($_SESSION['numeri'][$j][$i] % 2 == 1)
			 {
                $conta++;		
             }
		 }	 
     } 
   }
}
	
if($conta==5)
{
   for($j=0;$j<$r;$j++)
   {
      for($i=0;$i<$c;$i++)
      {
        $_SESSION['valori'][$j][$i]=1;
      } 
   }
}
	
?>

<HTML>
   <BODY>

   <!-- viene creato il FORM per gestire la matrice di text -->
   <FORM name='F1' method='POST' action='matrice_dispari.php'>

      <?php
	  // tabella HTML contenente la matrice di submit
	  echo "<TABLE border='1'>";
      for($j=0;$j<$r;$j++)
	  {
		 echo "<TR>"; 
         for($i=0;$i<$c;$i++)
	     {
		    echo "<TD>";
            if($_SESSION['valori'][$j][$i]==0)
			   echo "<INPUT type='submit' name='B[".$j."][".$i."]' value='' />";
            else
			   echo $_SESSION['numeri'][$j][$i];	
		    echo "</TD>"; 
         }		  
		 echo "</TR>"; 
      }		  
	  echo "</TABLE>";
	  // fine tabella HTML
      ?>
	  
      <BR><INPUT type='submit' name='R' value='reset' />
      &nbsp;&nbsp;Dispari:<INPUT type='text' name='D' value='<?php echo $conta; ?>' size='2'/>  	  
   </FORM>

   <BR><BR>

</BODY>
</HTML>
