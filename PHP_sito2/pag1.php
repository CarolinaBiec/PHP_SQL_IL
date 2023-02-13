<?php
   session_start();
   
   $mysqli = new mysqli("localhost", "root", "", "utenti");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }

   $query = "SELECT * FROM Utenti"; 
   if (!$risultato = $mysqli->query($query)) {
	  echo $query;
   }
   
   // se sono arrivato qui per mezzo del bottone B
   if(isset($_POST['B']))
   {
	  $user=($_POST['U']);
	  $passw=($_POST['P']);
	  $trovato=false;

      foreach($risultato as $record)
      {
         if($record['user']==$user && $record['passw']==$passw) {
		   $trovato=true;
		   $_SESSION['liv']=$record['liv'];
           $_SESSION['user']=$record['user']; 
           $_SESSION['nome']=$record['nome'];
           $_SESSION['cognome']=$record['cognome'];
           $_SESSION['ID']=$record['ID_Utenti'];
	     }		 
      }
	   
   }	   
?>

<HTML>
   <HEAD>
   <STYLE type='text/css'>
   body {
	   background-color:rgb(255,255,200);
	   color:rgb(0,0,200);
   }
   </STYLE>
   </HEAD>

   <BODY>
   <H2>PAGINA PRINCIPALE</H2> 

   <BR><BR>
   <?php echo "Benvenuto ".$_SESSION['nome']." ".$_SESSION['cognome']; ?>
   <BR>
   <?php echo "Livello:".$_SESSION['liv']; ?>

   <BR><BR>
   Contenuto della pagina 1
   <BR><BR>
   <A href='pag2.php'>pagina 2</A>    
   <A href='login.php'>logout</A>    
   </BODY>
</HTML>