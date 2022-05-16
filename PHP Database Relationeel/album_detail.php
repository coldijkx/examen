<?php
require 'Config.php';

$userid = $_GET['id'];

$query = "SELECT * FROM back13_albums WHERE ID_album =" . $userid;

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
	echo "<p>Er is geen user met ID $userid.</p>";
}
else
{
	$albums = mysqli_fetch_array($resultaat);
	echo "<h2>Gegevens van user met ID $userid:</h2>";
	echo "<table border='1'>";
	echo "<tr><td>Titel:</td>";
	echo  "<td>" . $albums['Titel'] . "</td></tr>";
	echo "<tr><td>Jaar:</td>";
	echo  "<td>" . $albums['Jaar'] . "</td></tr>";
	echo "<tr><td>Info:</td>";
	echo  "<td>" . $albums['Info'] . "</td></tr>";
	echo "<tr><td>Afbeelding:</td>";
	echo  "<td>" . $albums['Afbeelding'] . "</td></tr>";
	echo "<tr><td>Band:</td>";
	echo  "<td>" . $albums['Band'] . "</td></tr>";

	echo "</table>";
}
echo "<p>Terug naar <a href='album_toon.php?'>Overzicht</a></td></p>";
?>