<?php
   session_start();
   $_SESSION['accesso']=0;
   $_SESSION['id']=0;
   $_SESSION['user']="";
   $_SESSION['votato']=0;
?>

<HTML>
<HEAD>
<TITLE>Login</TITLE>

<STYLE>
  a:link {text-decoration:none; color: black;}
  a:visited {text-decoration:none; color: black;}
  a:active {text-decoration:none; color: black;}
  a:hover {text-decoration:none; color: red;}
</STYLE>

</HEAD>
<BODY style='background-color:rgb(255,255,255); color:rgb(0,0,255);'>

<?php

  echo "<H2>Vota il giocatore dell'anno!</H2>";

  echo "<FORM name='F1' method='post' action='main.php'>";
  echo "Username:<INPUT type='text' name='U' value=''><BR>";
  echo "Password:<INPUT type='password' name='P' value=''><BR><BR>";
  echo "<INPUT type='submit' name='B' value='Invia'><BR>";
  echo "</FORM>";
?>

</BODY>
</HTML>

