<?php
   session_start();
?>

<HTML>
   <HEAD>
   <STYLE type='text/css'>
   body {
	   background-color:rgb(100,100,100);
	   color:rgb(200,200,0);
   }
   </STYLE>
   </HEAD>

   <BODY>
   <H2>PAGINA 4</H2> 
    
   <BR><BR>
   <?php echo "Benvenuto ".$_SESSION['nome']." ".$_SESSION['cognome']; ?>
   <BR>
   <?php echo "Livello:".$_SESSION['liv']; ?>

   <BR><BR>

   <?php
   if($_SESSION['liv']>=2)
   {	   
      echo "Contenuto della pagina 4";
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