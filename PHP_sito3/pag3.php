<?php
   session_start();
   
   $mysqli = new mysqli("localhost", "root", "", "utenti");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }

   if(isset($_POST['SC'])) 
   {
      $dataspesa = $_POST['SD'];
	  $dataspesa = date('Ymd', strtotime($dataspesa));
	  $importo = $_POST['SI'];
	  $descrizione = $_POST['ST'];
	  $ID = $_SESSION['ID'];
	  
	  $query1 = "";
	  $query1 = $query1."INSERT INTO Spese ";
      $query1 = $query1."(ID_Utenti,dataspesa,importo,descrizione) ";
      $query1 = $query1."VALUES ";
      $query1 = $query1."(".$ID.",".$dataspesa.",".$importo.",'".$descrizione."')";

      if (!$risultato1 = $mysqli->query($query1)) {
	     echo $query1;
      }
   }	   

   $query = "";
   $query = $query."SELECT Utenti.cognome,Utenti.nome,Spese.dataspesa,Spese.importo,Spese.descrizione "; 
   $query = $query."FROM Spese ";
   $query = $query."INNER JOIN Utenti ON Spese.ID_Utenti=Utenti.ID_Utenti ";
   $query = $query."WHERE Utenti.ID_Utenti=".$_SESSION['ID']."";
   if (!$risultato = $mysqli->query($query)) {
	  echo $query;
   }
?>

<HTML>
   <HEAD>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <STYLE type='text/css'>
   body {
	   background-color:rgb(200,200,255);
	   color:rgb(0,0,0);
   }
   </STYLE>

   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
   <script>
   $(function() {
      $('#SD').datepicker();
   });
	  
   $.datepicker.setDefaults(
      $.extend(
        {'dateFormat':'dd-mm-yy'},
        $.datepicker.regional['nl']
   ));
   </script>
</HEAD>

   <BODY>
   <H2>GESTIONE AGENTI</H2> 
   <BR><BR>
   <?php echo "Benvenuto ".$_SESSION['nome']." ".$_SESSION['cognome']; ?>
   <BR>
   <?php echo "Livello:".$_SESSION['liv']; ?>
   <BR><BR>

<?php
if($_SESSION['liv']>=1)
{	   
   echo "<H3>Agente :".$_SESSION['nome']." ".$_SESSION['cognome']."</H3>";   
   echo "<TABLE border='1'>";
   echo "<TR>";
   for($i=0;$i<$risultato->field_count;$i++)
   {
      echo "<TD><B>".$risultato->fetch_field_direct($i)->name."</B></TD>";
   }
   echo "</TR>";
   while ($row=$risultato->fetch_row()) 
   {
      echo "<TR>";
      for($i=0;$i<$risultato->field_count;$i++)
      {
         echo "<TD>".$row[$i]."</TD>";
      }
      echo "</TR>";
   }
   echo "</TABLE>";
?>

   <H4>REGISTRAZIONE NUOVA SPESA</H4> 
   <FORM name='F1' method='post' action='pag3.php'>
      data spesa:<INPUT type='text' id='SD' name='SD' size='8' value=''>&nbsp;&nbsp;
      importo:<INPUT type='text' name='SI' size='4' value=''>&nbsp;&nbsp;
      descrizione:<INPUT type='text' name='ST' size='8' value=''>&nbsp;&nbsp;
      <INPUT type='submit' name='SC' value='Nuova spesa'>
   </FORM>

<?php
} 	  
else
{	   
   echo "Non puoi accedere al contenuto di questa pagina";
} 	  
?>
 
   <BR><BR>
   <A href='pag1.php'>pagina principale</A>
   <A href='login.php'>logout</A>    
   </BODY>
</HTML>