<?php 
$enllac_bbdd = mysql_connect('localhost', 'usuari_discography', 'contrasenya_discography')
    or die('No es pot connectar: ' . mysql_error());
echo 'Conectat correctament';
mysql_select_db('bbdd_discography') or die('No s´ha pogut crear la base de dades');

// id de l'artista
if (isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;

// Dades de l'artista
$sql_artistes = 'SELECT name, description FROM Artist WHERE id='&$id;
$resultat_artistes = mysql_query($sql_artistes) or die('Consulta fallida: ' . mysql_error());

// llista LPs
$sql_lps = 'SELECT id, name FROM LPs WHERE id_artista='&$id.' ORDER BY name ASC';
$resultat_lps = mysql_query($sql_lps) or die('Consulta fallida: ' . mysql_error());
// Número d'LPs
$numero_lps = mysql_num_rows($resultat_lps);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Artista</title>
</head>

<body>

<ul>
	<li><a href="index.php" title="Inici">Inici</a></li>
	<li>Artistes</li>
	<li><a href="lps.php" title="LPs">LPs</a></li>
</ul>

<hr>

<?php 
$linia_artista = mysql_fetch_array($resultat_artistes, MYSQL_NUM));
?>

<h1>Artista:<?php echo $linia_artista[0]; ?></h1>
<h2><strong>Bibliografia:</strong></h2>
<p><?php echo $linia_artista[1]; ?></p>


<h2><strong>LPs:</strong></h2>

<p><strong>Amb <?php echo $numero_lps ;?> LP's publicats</strong>.</p>


<?php 
while ($linia_lps = mysql_fetch_array($resultat_lps, MYSQL_NUM)) { ?>
		<li><a href="lps.php?id=<?php echo $linia_lps[0]; ?>" title="<?php echo $linia_lps[1]; ?>"><?php echo $linia_lps[1]; ?></a></li>

<?php 
} ?>

</body>
</html>
<?php 
// tancar bbdd
mysql_free_result($resultat_artistes);
mysql_free_result($resultat_lps);
mysql_close($enllac_bbdd);
?>
