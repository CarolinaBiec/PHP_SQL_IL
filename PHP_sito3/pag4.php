<?php
   session_start();
   
   $mysqli = new mysqli("localhost", "root", "", "utenti");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }
   $queryT = "SELECT ID_Utenti,cognome,nome FROM Utenti"; 
   if (!$risultatoT = $mysqli->query($queryT)) {
	  echo $queryT;
   }

   $quale=0; 
   if(isset($_POST['VA'])) {
      $quale = $_POST['QA']; 

      $query = "";
      $query = $query."SELECT Utenti.cognome,Utenti.nome,Spese.dataspesa,Spese.importo,Spese.descrizione "; 
      $query = $query."FROM Spese ";
      $query = $query."INNER JOIN Utenti ON Spese.ID_Utenti=Utenti.ID_Utenti ";
      $query = $query."WHERE Utenti.ID_Utenti=".$quale."";
      if (!$risultato = $mysqli->query($query)) {
	     echo $query;
      }
   }

   if(isset($_POST['TS'])) {
      $query = "";
      $query = $query."SELECT Utenti.cognome,Utenti.nome,SUM(Spese.importo) AS Totale_Spese "; 
      $query = $query."FROM Spese ";
      $query = $query."RIGHT JOIN Utenti ON Spese.ID_Utenti=Utenti.ID_Utenti ";
      $query = $query."GROUP BY Utenti.cognome,Utenti.nome";
      if (!$risultato = $mysqli->query($query)) {
	     echo $query;
      }
   }

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
   <H2>AMMINISTRAZIONE</H2> 
   <BR><BR>
   <?php echo "Benvenuto ".$_SESSION['nome']." ".$_SESSION['cognome']; ?>
   <BR>
   <?php echo "Livello:".$_SESSION['liv']; ?>
   <BR><BR>
   
<?php   
if($_SESSION['liv']>=2)
{	   
?>

   <FORM name='F1' method='post' action='pag4.php'>
      <SELECT name='QA'>
	  <?php
      foreach($risultatoT as $record)
      {
	  if($record['ID_Utenti']==$quale)	  
	  echo "<OPTION value=".$record['ID_Utenti']." SELECTED>".$record['nome']." ".$record['cognome']."</OPTION>";     
	  else
	  echo "<OPTION value=".$record['ID_Utenti'].">".$record['nome']." ".$record['cognome']."</OPTION>";     
      }
	  ?>
      </SELECT>	  
      <INPUT type='submit' name='VA' value='Vedi spese agente'>
	  <BR><BR>
      <INPUT type='submit' name='TS' value='Totale spese per agente'>
   </FORM>

<?php
   if(isset($_POST['VA']) || isset($_POST['TS'])) {
	   
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
   } 

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