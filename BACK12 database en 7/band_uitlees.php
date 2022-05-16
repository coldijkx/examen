<?php
//include mijn config bestand om connectie te maken
require 'Config.php';

// query maken
$query = "SELECT * FROM back12_bands";

// vang het resultaat van de query op in een variabele
//mysqli_query krijgt 2 variabelen 1 de connectie met de database en 2 de query
$resultaat = mysqli_query($mysqli, $query);

// tel resultaten in tabel
if (mysqli_num_rows($resultaat) == 0)
{
echo "er zitten geen users in de tabel";
} else
{
    echo "<table border='1'";
    while ($rij = mysqli_fetch_array($resultaat))
    {
        echo "<tr>";
        echo "<td>" . $rij['Naam'] . "</td>";
        echo "<td>" . $rij['Muzieksoort'] . "</td>";
        echo "<td> <a href='band_detail.php?id=".$rij['ID_band']."'>detail</a></td>";
        echo "<td> <a href='band_wijzig.php?id=".$rij['ID_band']."'>wijzig</a></td>";
        echo "<td> <a href='band_verwijder.php?id=".$rij['ID_band']."'>verwijder</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p><a href='band_toevoeg.html'>Voeg band toe</a></p>";




?>