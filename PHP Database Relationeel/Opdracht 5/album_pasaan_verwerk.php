<?php

if (isset($_POST['submit']))
{
	require 'Config.php';
	$ID_album = $_POST['ID_album'];
	$Titel = $_POST['Titel'];
	$Jaar = $_POST['Jaar'];
	$Info = $_POST['Info'];
	$Afbeelding = $_POST['Afbeelding'];
	$Band = $_POST['Band'];
	
	$query = "UPDATE back13_albums
					Set  ID_album = '$ID_album', Titel = '$Titel', Jaar = '$Jaar', Info = '$Info', Afbeelding = '$Afbeelding', Band = '$Band'
					WHERE ID_album = $ID_album";
	echo $query . "<br/>";

	if(mysqli_query($mysqli, $query))
	{
		echo "<p>$Titel is veranderd </p>";
	}
	else
	{
		echo "<p>kan $ID_album niet aanpassen.</p>";
		echo mysqli_error($mysqli);
	}
}
else
{
	echo "<p>Geen gegevens ontvangen</p>";
}
echo "<p><a href='album_toon.php'>TERUG</a></p>";
?>