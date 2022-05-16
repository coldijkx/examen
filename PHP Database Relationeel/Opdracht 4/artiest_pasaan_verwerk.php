<?php
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$ID_artiest = $_POST['ID'];
$Naam = $_POST['Naam'];
$Instrument = $_POST['Instrument'];
$Geboortedatum = $_POST['Geboortedatum'];
$Info = $_POST['Info'];
$Band = $_POST['Band'];

//maak de query
$query = "UPDATE back13_artiesten
           SET Naam = '$Naam',
               Instrument = '$Instrument', Geboortedatum = '$Geboortedatum' , Geslacht = $Geslacht , Info = '$Info'
            WHERE ID_artiest = $ID_artiest";

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

echo "<p><a href='artiest_uitlees.php'>TERUG</a></p>";



?>