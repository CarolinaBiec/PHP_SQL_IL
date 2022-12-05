
<?php

$ri=0;
$co=0;

if(isset($_POST['B'])) {
   $ri=$_POST['R']*1;
   $co=$_POST['C']*1;
}	

?>

<HTML>
   <HEAD>
   <STYLE type="text/css">
   body { background-color:rgb(220,220,255); }
   .c0 { background-color:white; color:red; }
   .c1 { background-color:green; color:white; }
   .c2 { background-color:blue; color:white; }
   .c3 { background-color:yellow; color:blue; }
   </STYLE>
   </HEAD>

   <BODY>
   <H1>soluzione</H1> 
   
   <FORM name='F1' method='post' action='soluzione.php'>
   <LABEL>righe:</LABEL>
   <INPUT type='text' name='R' value='<?php echo $ri; ?>' size='3'>
   <LABEL>colonne:</LABEL>
   <INPUT type='text' name='C' value='<?php echo $co; ?>' size='3'>
   <INPUT type='submit' name='B' value='genera'>
   </FORM>


   <?php
   if(isset($_POST['B'])) {
	  
      // creo un array con 3 elementi per conteggiare
      // i 3 differenti casi 	  
      $conta = array();
	  //$conta=[0,0,0];
      $conta[0]=0;
      $conta[1]=0;
      $conta[2]=0;

      echo "<TABLE border='1'>";
      for($i=0;$i<$ri;$i++) {
	     echo "<TR>";
	     for($j=0;$j<$co;$j++) { 
			$numero=rand(1,99);
            $miaclasse="c0";
            if($numero%3==0 && $numero%5!=0) {
               $miaclasse="c1";
			   $conta[0]++;
		    }	
            if($numero%5==0 && $numero%3!=0) {
               $miaclasse="c2";
			   $conta[1]++;
		    }	
            if($numero%3==0 && $numero%5==0) {
               $miaclasse="c3";
			   $conta[2]++;
		    }	
	        echo "<TD class='".$miaclasse."'>";
	        echo "&nbsp;".$numero."&nbsp;";
	        echo "</TD>";
         }
	     echo "</TR>";
      }		 
      echo "</TABLE>";
	  
	  echo "<BR>";
	  
      echo "<TABLE border='1'>";
	     echo "<TR>";
	        echo "<TD class='c1'>div. per 3</TD>";
	        echo "<TD class='c2'>div. per 5</TD>";
	        echo "<TD class='c3'>div. per 3 e per 5</TD>";
	     echo "</TR>";
	     echo "<TR>";
	        echo "<TD class='c0'>".$conta[0]."</TD>";
	        echo "<TD class='c0'>".$conta[1]."</TD>";
	        echo "<TD class='c0'>".$conta[2]."</TD>";
	     echo "</TR>";
      echo "</TABLE>";
   }
   ?>
   
   </BODY>
</HTML>

