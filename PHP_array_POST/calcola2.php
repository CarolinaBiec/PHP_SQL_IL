<HTML>
   <BODY>
  
      <?php

  	     // somma
         if(isset($_POST['SOMMA']))
         {
            $a = $_POST['A']; 
            $b = $_POST['B']; 
            $c = $a + $b; 
			echo "somma di ".$a." + ".$b." = ".$c;
			//echo "somma di $a + $b = $c";
         }

  	     // quoziente
         if(isset($_POST['QUOZ']))
         {
            $a = $_POST['A']; 
            $b = $_POST['B'];
            if($b != 0) 
            {				
               $c = $a / $b; 
			   echo "quoziente di ".$a." / ".$b." = ".$c;
			}
            else 
		    {
			   echo "quoziente di ".$a." / ".$b." = impossibile";
			}		
         }

  	     // maggiore
         if(isset($_POST['MAGG']))
         {
            $a = $_POST['A']; 
            $b = $_POST['B'];
            if($a > $b) 
            {				
			   echo "il maggiore tra ".$a." e ".$b." é ".$a;
			}
            else 
		    {
               if($a < $b) 
               {				
  			      echo "il maggiore tra ".$a." e ".$b." é ".$b;
               }
			   else
			   {
  			      echo "il maggiore tra ".$a." e ".$b." é nessuno";
			   } 	   
		    }		
         }

	     // ingresso con altra modalità 
         if( !isset($_POST['SOMMA']) && !isset($_POST['QUOZ']) && !isset($_POST['MAGG']))
         {
            echo "qui non puoi entrare";
         }
      ?>

	  <BR><A href='calcola1.php'>Torna indietro</A>
   </BODY>
</HTML>