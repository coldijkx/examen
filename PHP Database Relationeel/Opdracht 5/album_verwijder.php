<?php
require 'Config.php';
$userid = $_GET[ 'id'];
$query = "SELECT * FROM back13_albums WHERE ID_album = " . $userid;
$resultaat = mysqli_query($mysqli, $query);
if (mysqli_num_rows($resultaat) == 0)
{
	echo "<p>Er is geen user met ID userid.</p>";
}
else
{
	$rij = mysqli_fetch_array($resultaat);
	?>
	<h1>Deze User wordt verwijderd</h1>
	<form name="form1" method="post" action="album_verwijder_verwerk.php">
		<p>ID album:
	<input type="text" name="ID_album" value="<?php echo $rij['ID_album'] ?>" readonly></p> 
	<p>Titel:
		<input type="text" name="Titel" value="<?php echo $rij['Titel'] ?>" disabled/></p>
	<p>Jaar:
		<input type="text" name="Jaar" value="<?php echo $rij['Jaar'] ?>" disabled/></p>
		<h2>Klik hier om dit album te verwijderen!</h4>
		<p><input type="submit" name="submit" value="Verwijder"/></p>
	</form>
	<p><a href="album_toon.php">Terug Naar Toonpagina</a></p>
	<?php
}
?>
