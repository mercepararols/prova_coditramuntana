<?php 
$enllac_bbdd = mysql_connect('localhost', 'usuari_discography', 'contrasenya_discography')
    or die('No es pot connectar: ' . mysql_error());
echo 'Conectat correctament';
mysql_select_db('bbdd_discography') or die('No s´ha pogut crear la base de dades');

// Llista d'artistes
$sql_artistes = 'SELECT id, name FROM Artist ORDER BY name ASC';
$resultat_artistes = mysql_query($sql_artistes) or die('Consulta fallida: ' . mysql_error());

// Llista d'LPs
$sql_lps = 'SELECT id, name FROM LPs ORDER BY name ASC';
$resultat_lps = mysql_query($sql_lps) or die('Consulta fallida: ' . mysql_error());

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Discography project Task</title>
</head>

<body>
<ul>
	<li>Inici</li>
	<li><a href="artistes.php" title="artistes">Artistes</a></li>
	<li><a href="lps.php" title="LPs">LPs</a></li>
</ul>

<hr>

<h1>Discography project Task</h1>


<h2>Els nostres artistes:</h2>
<ul>
<?php // Llista d'artistes


while ($linia_artista = mysql_fetch_array($resultat_artistes, MYSQL_NUM)) { ?>
		<li><a href="artistes.php?id=<?php echo $linia_artista[0]; ?>" title="<?php echo $linia_artista[1]; ?>"><?php echo $linia_artista[1]; ?></a></li>
<?php 
}

?>
</ul>

<h2>Els nostres LPs:</h2>
<ul>
<?php // Llista d'LPs

while ($linia_lps = mysql_fetch_array($resultat_lps, MYSQL_NUM)) { ?>
		<li><a href="lps.php?id=<?php echo $linia_lps[0]; ?>" title="<?php echo $linia_lps[1]; ?>"><?php echo $linia_lps[1]; ?></a></li>

<?php 
}

?>
</ul>
</body>
</html>
<?php 
// tancar bbdd
mysql_free_result($resultat_artistes);
mysql_free_result($resultat_lps);
mysql_close($enllac_bbdd);
?>
