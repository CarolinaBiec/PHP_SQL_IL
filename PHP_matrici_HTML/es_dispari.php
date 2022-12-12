<?php
session_start();

$r=6;
$c=8;

if(isset($_POST['R'])) {
	$_SESSION['valore']=null;
	$_SESSION['numeri']=null;
	$_SESSION['conta']=null;
}

if(!isset($_SESSION['valore'])) {
  $_SESSION['valore']=array();	
  
  for($j=0;$j<$r;$j++) {
     for($i=0;$i<$c;$i++) {
		 $_SESSION['valore'][$j][$i]=0;
		 $_SESSION['numeri'][$j][$i]=rand(1,99);
     } 
  } 	 
  
  $_SESSION['conta']=0;
}

if(isset($_POST['B'])) {
  for($j=0;$j<$r;$j++) {
     for($i=0;$i<$c;$i++) {
		 if(isset($_POST['B'][$j][$i])) {
			 $_SESSION['valore'][$j][$i]=1;
			 
			 if($_SESSION['numeri'][$j][$i]%2==1) {
			    $_SESSION['conta']++;
			 }	
		 }	 
	 } 	 
  } 	
}

if($_SESSION['conta']==5) {
  for($j=0;$j<$r;$j++) {
     for($i=0;$i<$c;$i++) {
		 $_SESSION['valore'][$j][$i]=1;
     }
  }	 
}	

?>

<HTML>
  <BODY>
  <H1>esercizio trova dispari</H1>  
  
 
  <?php
  echo "<FORM name='F1' method='post' action='es_dispari.php'>";
  
  echo "<TABLE border='1'>";
  for($j=0;$j<$r;$j++) {
	 echo "<TR>"; 
     for($i=0;$i<$c;$i++) {
		 echo "<TD>";
		 
		 if($_SESSION['valore'][$j][$i]==0) {
		     echo "<INPUT type='submit' name='B[".$j."][".$i."]' value=''>";
	     } 
         else {
			 echo $_SESSION['numeri'][$j][$i];
         }			 
	 
		 echo "</TD>";
	 }
	 echo "</TR>"; 
  }	  
  echo "</TABLE>";
  
  echo "<BR><BR>";
  echo "<INPUT type='submit' name='R' value='reset' >";
  echo "&nbsp;&nbsp;&nbsp;Dispari:<INPUT type='text' name='C' value='".$_SESSION['conta']."' size='3' READONLY>";

  echo "</FORM>";
  ?>
  
  </BODY>
</HTML>
