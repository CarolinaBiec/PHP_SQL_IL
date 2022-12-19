<?php
session_start();

// definisco un array per i colori relativi a ciascuna posizione
$stile=array();
$stile[0] ="background:rgb(0,0,150); color:rgb(255,255,255);";
$stile[1] ="background:rgb(150,0,0); color:rgb(255,255,255);";
$stile[2] ="background:rgb(000,150,0); color:rgb(255,255,255);";
$stile[3] ="background:rgb(150,150,0); color:rgb(255,255,255);";

// definisco un array che mi elenchi regioni e posizioni
$regioni = array(
   array("nome"=>"Valle d'Aosta","posizione"=>0),
   array("nome"=>"Piemonte","posizione"=>0),
   array("nome"=>"Liguria","posizione"=>0),
   array("nome"=>"Lombardia","posizione"=>0),
   array("nome"=>"Trentino-Alto Adige","posizione"=>0),
   array("nome"=>"Veneto","posizione"=>0),
   array("nome"=>"Friuli Venezia Giulia","posizione"=>0),
   array("nome"=>"Emilia Romagna","posizione"=>0),
   array("nome"=>"Toscana","posizione"=>1),
   array("nome"=>"Umbria","posizione"=>1),
   array("nome"=>"Marche","posizione"=>1),
   array("nome"=>"Lazio","posizione"=>1),
   array("nome"=>"Abruzzo","posizione"=>1),
   array("nome"=>"Molise","posizione"=>1),
   array("nome"=>"Campania","posizione"=>2),
   array("nome"=>"Basilicata","posizione"=>2),
   array("nome"=>"Puglia","posizione"=>2),
   array("nome"=>"Calabria","posizione"=>2),
   array("nome"=>"Sicilia","posizione"=>3),
   array("nome"=>"Sardegna","posizione"=>3)
);

// reset dei dati 
if(isset($_POST['Reset']))
{
   $_SESSION['dati'] = null;
}

// creo l'elenco dei nomi, all'avvio vuoto
if(!isset($_SESSION['dati']))
{
   $_SESSION['dati'] = array();
}

// aggiungo un nuovo nome all'elenco dei dati
if(isset($_POST['Invia']))
{
   // verifico la lunghezza dell'array dei dati e 
   // localizzo la nuova posizione su cui inserire
   $z=count($_SESSION['dati']);

   // leggo i dati nuovi dall'array POST
   $nome=$_POST['N'];
   $i=$_POST['REG'];

   // aggiungo i dati alla nuova posizione
   // il mio array dei dati quindi si allunga di una posizione
   $_SESSION['dati'][$z]['nome']=$nome;
   $_SESSION['dati'][$z]['regione']=$regioni[$i]['nome'];
   $_SESSION['dati'][$z]['posizione']=$regioni[$i]['posizione'];
}

?>

<HTML>
<BODY>

<FORM NAME='F1' METHOD='post' ACTION='regioni.php'>

Nome:<INPUT type='text' name='N' value='' size='5'>
<INPUT type='submit' name='Invia' value='Invia'>

<?php
// costruisco la tendina leggendo l'array delle regioni
echo "<SELECT name='REG'>";
for($i=0;$i<count($regioni);$i++) 
{
   echo "<OPTION value='".$i."'>".$regioni[$i]['nome']."</OPTION>";
}
echo "</SELECT>";
?>

<INPUT type='submit' name='Reset' value='Reset'>

</FORM>

<?php
// visualizzo l'array dei dati un forma tabellare
// in base alla posizione definisco lo stile da applicare alla riga
echo "<TABLE border='1'>";
for($i=0;$i<count($_SESSION['dati']);$i++)
{
   $colore=$stile[$_SESSION['dati'][$i]['posizione']];
   echo "<TR>";
   echo "<TD style='".$colore."'>".$i."</TD>";
   echo "<TD style='".$colore."'>".$_SESSION['dati'][$i]['nome']."</TD>";
   echo "<TD style='".$colore."'>".$_SESSION['dati'][$i]['regione']."</TD>";
   echo "</TR>";
}
echo "</TABLE>";
?>

</BODY>
</HTML>

