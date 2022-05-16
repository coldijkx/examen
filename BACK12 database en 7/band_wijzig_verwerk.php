<?php
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$ID_band = $_POST['ID'];
$Land = $_POST['Land'];
$AantalLeden = $_POST['AantalLeden'];
$Muzieksoort = $_POST['Muzieksoort'];
$Info = $_POST['Info'];

//maak de query
$query = "UPDATE back12_bands
           SET land = '$Land',
               AantalLeden = '$Muzieksoort', Info = $Info
            WHERE ID_band = $ID";

echo $query . "<br/>"; //tijdelijke test


//Als de opdracht goed word uitgevoerd:
if(mysqli_query($mysqli, $query))
{
  echo "<p>$Naam is toegevoegd!.</p>";
}
//anders
else
{
    echo "<p>FOUT bij toevoegen.</p>";
    echo mysqli_error($mysqli); //TIJDELIJK TOEVOEGEN
}

}
else
{
  echo "<p>Geen gegevens ontvangen...</p>";
}

echo "<p><a href='band_uitlees.php'>TERUG</a></p>";



?>