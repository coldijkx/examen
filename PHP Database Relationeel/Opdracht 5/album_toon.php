<?php

require 'Config.php';

$query = "SELECT * FROM back13_albums";

$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{	
	echo "<p>Er zijn geen resultaten gevonden.</p>";
}
else
{	
	echo "<table border='1'";
    while ($rij = mysqli_fetch_array($resultaat))
    {
        echo "<tr>";
        echo "<td>" . $rij['Titel'] . "</td>";
        echo "<td>" . $rij['Band'] . "</td>";
        echo "<td> <a href='album_detail.php?id=".$rij['ID_album']."'>Detail</a></td>";
        echo "<td> <a href='album_pasaan.php?id=".$rij['ID_album']."'>wijzig</a></td>";
        echo "<td> <a href='album_verwijder.php?id=".$rij['ID_album']."'>verwijder</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
