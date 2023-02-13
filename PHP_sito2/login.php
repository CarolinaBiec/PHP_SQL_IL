<?php
   session_start();
   $_SESSION['liv']=0;
   $_SESSION['user']="";
   $_SESSION['nome']="ospite";
   $_SESSION['cognome']="";
   $_SESSION['ID']=0;
?>

<HTML>
   <HEAD>
   <STYLE type='text/css'>
   body {
	   background-color:rgb(255,255,255);
	   color:rgb(0,0,200);
   }
   </STYLE>
   </HEAD>

   <BODY>
   <H2>LOGIN</H2> 
   <BR><BR>

   <FORM name='F1' method='post' action='pag1.php'>
      username:<INPUT type='text' name='U' size='4' value=''><BR>
      password:<INPUT type='password' name='P' size='4' value=''><BR>
      <INPUT type='submit' name='B' value='Invia'>
   </FORM>

   <FORM name='F1' method='post' action='pag5.php'>
      <INPUT type='submit' name='R' value='Nuovo utente'>
   </FORM>

   <BR><BR>
   </BODY>
</HTML>