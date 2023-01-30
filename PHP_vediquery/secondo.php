<?php

   $mysqli = new mysqli("localhost", "root", "", "scuola");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }

   $t1=0;
   $l1=0;
   $l2=0;
   
   $query1="SELECT ID_Studenti,nome,cognome FROM Studenti"; 
   if (!$risultato1 = $mysqli->query($query1)) {
       echo $query1;
   }
   
   if(isset($_POST['I1']))
   {
	  $t1=$_POST['T1'];
      $query="";
      $query=$query."SELECT Studenti.nome, Studenti.cognome,";
      $query=$query."Voti.voto ";  
      $query=$query."FROM Voti ";
      $query=$query."INNER JOIN Studenti ON Voti.ID_Studenti=Studenti.ID_Studenti ";
      $query=$query."WHERE Studenti.ID_Studenti=".$t1."";
   }
   
   if(isset($_POST['I2']))
   {
	  $l1=$_POST['L1']; 
	  $l2=$_POST['L2']; 
      $query="";
      $query=$query."SELECT Studenti.nome, Studenti.cognome,";
      $query=$query."Voti.voto ";  
      $query=$query."FROM Voti ";
      $query=$query."INNER JOIN Studenti ON Voti.ID_Studenti=Studenti.ID_Studenti ";
      $query=$query."WHERE Voti.voto>=".$l1." AND Voti.voto<=".$l2."";
   }
   
   if(isset($_POST['I3']))
   {
      $query="";
      $query=$query."SELECT Studenti.nome, Studenti.cognome,";
      $query=$query."MAX(Voti.voto) AS voto_massimo,";  
      $query=$query."MIN(Voti.voto) AS voto_minimo ";  
      $query=$query."FROM Voti ";
      $query=$query."INNER JOIN Studenti ON Voti.ID_Studenti=Studenti.ID_Studenti ";
      $query=$query."GROUP BY Studenti.ID_Studenti ";
      $query=$query."ORDER BY Studenti.cognome, Studenti.nome ";
   }	   
   
?>

<HTML>

<BODY>

   <FORM name='F1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' >

      Voti di uno specifico studente&nbsp;&nbsp;&nbsp;
      Studente: <SELECT name='T1'>
      <?php
      foreach($risultato1 as $Tendina)
      {
		 if($Tendina['ID_Studenti']==$t1) { 
            echo "<OPTION value='".$Tendina['ID_Studenti']."' SELECTED>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         } else {
            echo "<OPTION value='".$Tendina['ID_Studenti']."'>".$Tendina['nome']." ".$Tendina['cognome']."</OPTION>";
         }
      }
      ?>
      </SELECT>
 	  <INPUT type='submit' name='I1' value='invia'><BR><BR>

      Voti compresi tra un massimo e un minimo&nbsp;&nbsp;&nbsp;
	  MIN: <INPUT type='text' name='L1' value='<?php echo $l1; ?>' size='3'>
	  MAX: <INPUT type='text' name='L2' value='<?php echo $l2; ?>' size='3'>
	  <INPUT type='submit' name='I2' value='invia'><BR><BR>
      MAX e MIN di tutti gli studenti&nbsp;&nbsp;<INPUT type='submit' name='I3' value='invia'>
   </FORM>

<?php

if(isset($_POST['I3']) || isset($_POST['I2']) || isset($_POST['I1']))
{

   if (!$risultato = $mysqli->query($query)) {
      echo $query;
   }

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
   
?>
   
</BODY>

</HTML>
