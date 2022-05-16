<?php
//Is het formulier verstuurd?
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$ID_artiest = $_POST['ID_artiest'];
$Naam = $_POST['Naam'];

//maak de query
$query = "DELETE FROM back13_artiesten WHERE ID_artiest = $ID_artiest";

echo $query . "<br/>"; //tijdelijke test


//Als de opdracht goed word uitgevoerd:
if(mysqli_query($mysqli, $query))
{
  echo "<p>Artiest $Naam is verwijderd!.</p>";
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

echo "<p><a href='artiest_uitlees.php'>TERUG</a></p>";



?>