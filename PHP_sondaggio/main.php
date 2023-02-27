<?php
   session_start();

   $mysqli = new mysqli("localhost", "root", "", "sondaggio");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }

   if(isset($_POST['V']))
   {
      $gioc=$_POST['E'];

      $query="UPDATE giocatori SET voti=voti+1 WHERE ID_giocatori=".$gioc."";
      if (!$risultato = $mysqli->query($query)) {
	  echo $query;
      }

      $query="UPDATE utenti SET votato=1 WHERE ID_utenti=".$_SESSION['id']."";
      if (!$risultato = $mysqli->query($query)) {
	  echo $query;
      }

      $_SESSION['votato']=1;
   }

   if(isset($_POST['B']))
   {
      $username=trim($_POST['U']);
      $password=trim($_POST['P']);

      $query="SELECT id_utenti,username,password,votato FROM utenti WHERE username='".$username."' AND password='".$password."'";
      if (!$risultato = $mysqli->query($query)) {
	  echo $query;
      }

      foreach($risultato as $record)
      {
         if($record['username']==$username && $record['password']==$password) {
            $_SESSION['id']=$record['id_utenti'];
            $_SESSION['user']=$record['username'];
            $_SESSION['votato']=$record['votato'];
            $_SESSION['accesso']=1;
         }
      }

   }

?>

<HTML>
<HEAD>
<TITLE>Main Page</TITLE>

<STYLE>
  a:link {text-decoration:none; color: black;}
  a:visited {text-decoration:none; color: black;}
  a:active {text-decoration:none; color: black;}
  a:hover {text-decoration:none; color: red;}
</STYLE>

</HEAD>
<BODY style='background-color:rgb(255,255,255); color:rgb(0,0,255);'>

<?php

  if($_SESSION['accesso']==1)
  {
     echo "<H2>Benvenuto ".$_SESSION['user']." !</H2>";
     if($_SESSION['votato']==1)
     {
        echo "<BR>Hai gi&agrave; votato<BR>";
        echo "<BR><A href='risultati.php'>Puoi vedere i risultati</A><BR>";
     }
     else
     {
        echo "<BR><A href='voti.php'>Puoi votare il giocatore</A><BR>";
     }
  }
  else
  {
     echo "<H3>Non puoi entrare qui!</H3>";
  }

  echo "<BR><A href='index.php'>Login</A><BR>";

?>

</BODY>
</HTML>

