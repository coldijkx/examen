<?php
//Voeg config toe
require 'Config.php';

//haal het user-id uit de url
$bandid = $_GET['id'];

//maak de query
$query = "SELECT * FROM back12_bands WHERE ID_band = " . $bandid;
//vang het resultaat van de query op in 'resultaat'
$resultaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 rijen bestaat
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen band met ID $bandid.</p>";
}
//als er wel rijen zijn gevonden
else
{
    //haal de rij (user) uit het resultaat
    $rij = mysqli_fetch_array($resultaat);
    //zet de gegevens van de user in een tabel
    echo "<h2>Gegevens van de band met ID $bandid:</h2>";
    echo "<table border='1'>";
    echo "<tr><td>Naam:</td>";
    echo     "<td>" . $rij['Naam'] . "</td></tr>";
    echo "<tr><td>Land:</td>";
    echo     "<td>" . $rij['Land'] . "</td></tr>";
    echo "<tr><td>AantalLeden:</td>";
    echo     "<td>" . $rij['AantalLeden'] . "</td></tr>";
    echo "<tr><td>Muizieksoort:</td>";
    echo     "<td>" . $rij['Muzieksoort'] . "</td></tr>";
    echo "<tr><td>Info:</td>";
    echo     "<td>" . $rij['Info'] . "</td></tr>";
    echo "</table>";   
}

$opdracht = "SELECT * FROM back12_bands WHERE ID_band = " . $id;
$resultaat = mysqli_query($mysqli, $opdracht);
$band = mysqli_fetch_array($resultaat);

$zoekLeden = "SELECT * FROM back12_artiesten WHERE Band = " . $band['ID_band'];

//query uitvoeren
$alleLeden = mysqli_query($mysqli, $zoekLeden);
//Plaats de leden op het scherm
echo "<h3>De leden van de band:</h3>";
echo "<table border='1' cellspacing='0' cellpadding='3'>";
while($artiest = mysqli_fetch_array($alleLeden))
{
    echo "<tr><td>" . $artiest['Naam'] . "</td>";
    echo     "<td>" . $artiest['Instrument'] . "</td></tr>";
}
echo "</table>";

 echo "<p>Terug naar <a href='band_uitlees.php'>overzicht</a></td></p>";

?>