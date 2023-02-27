<?php
   session_start();
?>

<HTML>
<HEAD>
<TITLE>Risultati</TITLE>

<STYLE>
  a:link {text-decoration:none; color: black;}
  a:visited {text-decoration:none; color: black;}
  a:active {text-decoration:none; color: black;}
  a:hover {text-decoration:none; color: red;}
</STYLE>

</HEAD>
<BODY style='background-color:rgb(255,255,255); color:rgb(0,0,255);'>

<?php

  if($_SESSION['accesso']==1 && $_SESSION['votato']==1)
  {
     $mysqli = new mysqli("localhost", "root", "", "sondaggio");
     if ($mysqli->connect_errno) {
        echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
     }

     $queryR = "SELECT ID_giocatori,nome,cognome,voti FROM giocatori";
     if (!$risultatoR = $mysqli->query($queryR)) {
	  echo $queryR;
     }

     echo "<H2>Benvenuto ".$_SESSION['user']." !</H2>";
     echo "<H2>Risultati</H2>";

     echo "<TABLE border='1'>";
     foreach($risultatoR as $record)
     {
        $nome=$record['nome']." ".$record['cognome'];
        $qta=$record['voti'];

        echo "<TR>";
        echo "<TD>".$nome."</TD>";
        for($i=0;$i<$qta;$i++)
        {
           echo "<TD bgcolor='red'>&nbsp;&nbsp;&nbsp;</TD>";
        }
        echo "</TR>";
     }
     echo "</TABLE><BR>";
  }
  else
  {
     echo "<H3>Non puoi entrare qui!</H3>";
  }

  echo "<BR><A href='main.php'>Main Page</A><BR>";
?>

</BODY>
</HTML>

