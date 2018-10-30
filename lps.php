<?php 
$enllac_bbdd = mysql_connect('localhost', 'usuari_discography', 'contrasenya_discography')
    or die('No es pot connectar: ' . mysql_error());
echo 'Conectat correctament';
mysql_select_db('bbdd_discography') or die('No s´ha pogut crear la base de dades');

// id del LP
if (isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;

// Dades LP
$sql_lp = 'SELECT name, description, id_artista FROM LPs WHERE id='&$id;
$resultat_lp = mysql_query($sql_lp) or die('Consulta fallida: ' . mysql_error());



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>LP</title>
</head>

<body>
<ul>
	<li><a href="index.php" title="Inici">Inici</a></li>
	<li><a href="artistes.php" title="artistes">Artistes</a></li>
	<li>LPs</li>
</ul>

<hr>

<?php // dades LP
$linia_lp = mysql_fetch_array($resultat_lp, MYSQL_NUM));
?>

<h1>LP:<?php echo $linia_lp[0]; ?></h1>
<h2><strong>Descripció:</strong></h2>
<p><?php echo $linia_lp[1]; ?></p>


<h2><strong>Artista:</strong></h2>

<?php 
// Nom artista
$sql_artista = 'SELECT name FROM Artist WHERE id='&$linia_lp[2].'';
$resultat_artista = mysql_query($sql_artista) or die('Consulta fallida: ' . mysql_error());

$linia_artista = mysql_fetch_array($resultat_artista, MYSQL_NUM));
?>

<p><?php echo $linia_artista[0]; ?></p>


</body>
</html>
<?php 
// tancar bbdd
mysql_free_result($resultat_lps);
mysql_free_result($resultat_artista);
mysql_close($enllac_bbdd);
?>
