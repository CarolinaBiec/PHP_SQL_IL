<?php
   session_start();
?>

<HTML>
<HEAD>
<TITLE>Voti</TITLE>

<STYLE>
  a:link {text-decoration:none; color: black;}
  a:visited {text-decoration:none; color: black;}
  a:active {text-decoration:none; color: black;}
  a:hover {text-decoration:none; color: red;}
</STYLE>

</HEAD>
<BODY style='background-color:rgb(255,255,255); color:rgb(0,0,255);'>

<?php

  if($_SESSION['accesso']==1 && $_SESSION['votato']==0)
  {
     $mysqli = new mysqli("localhost", "root", "", "sondaggio");
     if ($mysqli->connect_errno) {
        echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
     }

     $queryE = "SELECT ID_giocatori,nome,cognome FROM giocatori";
     if (!$risultatoE = $mysqli->query($queryE)) {
	  echo $queryE;
     }

     echo "<H2>Benvenuto ".$_SESSION['user']." !</H2>";
     echo "<H2>Vota</H2>";
     echo "<FORM name='F1' method='post' action='main.php'>";
     echo "<SELECT name='E'>";
     foreach($risultatoE as $record)
     {
         $ID = $record['ID_giocatori'];
         $nome = $record['nome']." ".$record['cognome'];
         echo "<OPTION value=".$ID.">".$nome."</OPTION>";
     }
	 echo "</SELECT><BR><BR>";
     echo "<INPUT type='submit' name='V' value='Vota'><BR>";
     echo "</FORM><BR>";
  }
  else
  {
     echo "<H3>Non puoi entrare qui!</H3>";
  }

  echo "<BR><A href='main.php'>Main Page</A><BR>";
?>

</BODY>
</HTML>

