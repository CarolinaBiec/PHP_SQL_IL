<?php

   $mysqli = new mysqli("localhost", "root", "", "utenti");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }

   if(isset($_POST['NB']))
   {
   	  $user=($_POST['NU']);
	  $passw=($_POST['NP']);
	  $nome=($_POST['NN']);
      $cognome=($_POST['NC']);
	  $liv=1;
	  
	  $query="INSERT INTO Utenti ";
      $query=$query."(user,passw,nome,cognome,liv) ";
      $query=$query."VALUES ";
      $query=$query."('".$user."','".$passw."','".$nome."','".$cognome."',".$liv.")";

      if (!$risultato = $mysqli->query($query)) {
	      echo $query;
      }
	  else
	  {
          echo "Nuovo utente ".$user." inserito<BR><BR>"; 		  
	  }	  
   }
?>

<HTML>
   <HEAD>
   <STYLE type='text/css'>
   body {
	   background-color:rgb(220,220,255);
	   color:rgb(0,0,200);
   }
   </STYLE>
   </HEAD>

   <BODY>
   <H2>REGISTRAZIONE</H2> 
   <BR><BR>

   <FORM name='F1' method='post' action='pag5.php'>
      username:<INPUT type='text' name='NU' size='4' value=''><BR>
      password:<INPUT type='text' name='NP' size='4' value=''><BR>
      nome:<INPUT type='text' name='NN' size='6' value=''><BR>
      cognome:<INPUT type='text' name='NC' size='6' value=''><BR>
      <INPUT type='submit' name='NB' value='Nuovo'>
   </FORM>
   <BR><BR>
   <A href='login.php'>logout</A>    
   </BODY>
</HTML>