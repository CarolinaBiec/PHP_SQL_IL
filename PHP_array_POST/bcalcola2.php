<HTML>
   <BODY>
  
      <?php

  	     // maggiore
         if(isset($_POST['MAGG']))
         {
            $a = $_POST['A']; 
            $b = $_POST['B'];
            $c = $_POST['C'];
			
/*
            if($a > $b) 
            {				
               if($a > $c) 
               {				
			      echo "il maggiore è A";
			   }	  
			}
            if($b > $a) 
            {				
               if($b > $c) 
               {				
			      echo "il maggiore è B";
			   }	  
			}
            if($c > $a) 
            {				
               if($c > $b) 
               {				
			      echo "il maggiore è C";
			   }	  
			}
            if($c == $a) 
            {				
               if($c == $b) 
               {				
			      echo "il maggiore è A-B-C";
			   }	  
			}
            if($a > $b) 
            {				
               if($a == $c) 
               {				
			      echo "il maggiore è A-C";
			   }	  
			}
            if($a > $c) 
            {				
               if($a == $b) 
               {				
			      echo "il maggiore è A-B";
			   }	  
			}
            if($b > $a) 
            {				
               if($b == $c) 
               {				
			      echo "il maggiore è B-C";
			   }	  
			}
*/

            // confronto i 7 casi per trovare il maggiore tra 3 numeri
            if( ($a > $b) && ($a > $c) ) 
            {				
			   echo "il maggiore è A"; 
			}
            if( ($b > $a) && ($b > $c) ) 
            {				
			   echo "il maggiore è B";
			}
            if( ($c > $a) && ($c > $b) ) 
            {				
			  echo "il maggiore è C";
			}
            if( ($c == $a) && ($c == $b) ) 
            {				
			  echo "il maggiore è A-B-C";
			}
            if( ($a > $b) && ($a == $c) ) 
            {				
			  echo "il maggiore è A-C";
			}
            if( ($a > $c) && ($a == $b) ) 
            {				
			  echo "il maggiore è A-B";
			}
            if( ($b > $a) && ($b == $c) ) 
            {				
			  echo "il maggiore è B-C";
			}

         }

	     // ingresso con altra modalità 
         if( !isset($_POST['SOMMA']) && !isset($_POST['QUOZ']) && !isset($_POST['MAGG']))
         {
            echo "qui non puoi entrare";
         }
      ?>

	  <BR><A href='bcalcola1.php'>Torna indietro</A>
   </BODY>
</HTML>