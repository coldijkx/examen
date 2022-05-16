<?php
if (isset($_POST['submit']))
{
	require 'Config.php';

	$ID_album = $_POST['ID_album'];
	$Titel = $_POST['Titel'];
	$Jaar = $_POST['Jaar'];

	$query = "DELETE FROM back13_albums WHERE ID_album = $ID_album";

	echo $query . "<br/>";

	if(mysqli_query($mysqli, $query))
	{
		echo "<p>Je hebt $titel verwijdert!.</p>";
	}
	else 
	{
		echo "<p>FOUT bij verwijderen $Titel.</p>";
		echo mysqli_error($mysqli);
	}
}
else
{
	echo "<p>Geen gegevens ontvangen!</p>";
}
echo "<p><a href='album_toon.php'>TERUG</a></p>";

?>
