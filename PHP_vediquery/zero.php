<?php
   // si connette al dbms (MySQL), fornendo indirizzo, username, password
   // prendo in uso il database specificato

   $mysqli = new mysqli("localhost", "root", "", "scuola");
   if ($mysqli->connect_errno) {
      echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   }
?>

<HTML>

<BODY>

<?php

	  $query="";
	  $query=$query."SELECT Studenti.nome, Studenti.cognome, ";
	  $query=$query."COUNT(Voti.ID_Voti) AS conta_voti ";
      $query=$query."FROM Voti ";
      $query=$query."RIGHT JOIN Studenti ON Voti.ID_Studenti=Studenti.ID_Studenti ";
      $query=$query."GROUP BY Studenti.ID_Studenti ";
      $query=$query."ORDER BY Studenti.nome, Studenti.cognome ";

      // esegue la query e produce un recordset
	  if (!$risultato = $mysqli->query($query)) {
		   echo $query;
	  }

	  // intestazioni colonne 
	  // mysql_num_fields($risultato) ci dice
	  // quante colonne ci sono in $risultato
      for($i=0;$i<$risultato->field_count;$i++)
      {
		 // legge il nome di ciascuna colonna  presente in $risultato
         echo $risultato->fetch_field_direct($i)->name." ";
      }
	  echo "<BR>";
	  echo "<BR>";
	  
	  // qui viene visto ciascun record presente in $risultato
      // e per ciascun record viene mostrato
      // il valore di ciascun campo	 
      while ($row=$risultato->fetch_row()) 
      {
         for($i=0;$i<$risultato->field_count;$i++)
         {
            echo $row[$i]." ";
	     }		
         echo "<BR>";
      }

	  echo "<BR>";
	  echo "<BR>";

?>
   
</BODY>

</HTML>
