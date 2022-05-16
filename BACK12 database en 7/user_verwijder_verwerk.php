<?php
//Is het formulier verstuurd?
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$ID = $_POST['ID'];
$Gebruikersnaam = $_POST['Gebruikersnaam'];

//maak de query
$query = "DELETE FROM back12_users WHERE ID = $ID";

echo $query . "<br/>"; //tijdelijke test


//Als de opdracht goed word uitgevoerd:
if(mysqli_query($mysqli, $query))
{
  echo "<p>User $Gebruikersnaam is verwijderd!.</p>";
}
//anders
else
{
    echo "<p>FOUT bij verwijderen van $Gebruikersnaam.</p>";
    echo mysqli_error($mysqli); //TIJDELIJK TOEVOEGEN
}

}
else
{
  echo "<p>Geen gegevens ontvangen...</p>";
}

echo "<p><a href='user_toon.php'>TERUG</a></p>";



?>