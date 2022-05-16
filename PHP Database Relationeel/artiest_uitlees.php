<?php
//include mijn config bestand om connectie te maken
require 'Config.php';

// query maken
$query = "SELECT * FROM back13_artiesten";

// vang het resultaat van de query op in een variabele
//mysqli_query krijgt 2 variabelen 1 de connectie met de database en 2 de query
$resultaat = mysqli_query($mysqli, $query);

// tel resultaten in tabel
if (mysqli_num_rows($resultaat) == 0)
{
echo "er zitten geen artiesten in de tabel";
} else
{
    echo "<table border='1'";
    while ($rij = mysqli_fetch_array($resultaat))
    {
        echo "<tr>";
        echo "<td>" . $rij['Naam'] . "</td>";
        echo "<td>" . $rij['Instrument'] . "</td>";
        echo "<td> <a href='artiest_pasaan.php?id=".$rij['ID_band']."'>wijzig</a></td>";
        echo "<td> <a href='artiest_verwijder.php?id=".$rij['ID_band']."'>verwijder</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>Ik heb alles geprobeert om de wijzig en verwijder te laten werken, maar je moet in de URL nog een cijfer achter de 'ID' zetten."
?>
<p><a href="artiest_toevoeg.php">Voeg user toe</a></p>