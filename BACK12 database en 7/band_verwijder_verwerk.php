<?php
//Is het formulier verstuurd?
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$ID_band = $_POST['ID_band'];
$Naam = $_POST['Naam'];

//maak de query
$query = "DELETE FROM back12_bands WHERE ID_band = $ID_band";

echo $query . "<br/>"; //tijdelijke test


//Als de opdracht goed word uitgevoerd:
if(mysqli_query($mysqli, $query))
{
  echo "<p>Band $Naam is verwijderd!.</p>";
}
//anders
else
{
    echo "<p>FOUT bij verwijderen van $Naam.</p>";
    echo mysqli_error($mysqli); //TIJDELIJK TOEVOEGEN
}

}
else
{
  echo "<p>Geen gegevens ontvangen...</p>";
}

echo "<p><a href='band_uitlees.php'>TERUG</a></p>";



?>