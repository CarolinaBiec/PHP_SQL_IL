<?php
   session_start();
?>

<HTML>
   <HEAD>
   <STYLE type='text/css'>
   body {
	   background-color:rgb(200,200,255);
	   color:rgb(0,0,0);
   }
   </STYLE>
   </HEAD>

   <BODY>
   <H2>PAGINA 3</H2> 
 
   <BR><BR>
   <?php echo "Benvenuto ".$_SESSION['nome']." ".$_SESSION['cognome']; ?>
   <BR>
   <?php echo "Livello:".$_SESSION['liv']; ?>

   <BR><BR>

   <?php
   if($_SESSION['liv']>=1)
   {	   
      echo "Contenuto della pagina 3";
   } 	  
   else
   {	   
      echo "Non puoi accedere al contenuto di questa pagina";
   } 	  
   ?>
 
   <BR><BR>
   <A href='pag1.php'>pagina 1</A>
   <A href='login.php'>logout</A>    
   </BODY>
</HTML>