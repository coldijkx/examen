<?php
//start de session
session_start();

if ($_SESSION['Level'] == 0)



//als de gebruiker NIET is ingelogd
// dan bestaad de session 'gebruiker' niet
if(!isset($_SESSION['Gebruikersnaam']))
{
    // stuur de gebruiker direct terug naar 'inlog.php'
    header("location:inlog.php");
}

// Als de gebruiker wel is ingelogd mag hij verder
else
{
    echo "<p>Welkom, " . $_SESSION['Gebruikersnaam'] . "</p>";
}
//Is de submitknop (en de rest van het formulier)
//naar deze pagina gestuurd?
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$ID = $_POST['ID'];
$Email = $_POST['Email'];
$Gebruikersnaam = $_POST['Gebruikersnaam'];
$Wachtwoord = $_POST['Wachtwoord'];
$Level = $_POST['Level'];

//maak de query
$query = "UPDATE back12_users
           SET Email = '$Email', Gebruikersnaam = '$Gebruikersnaam',
               Wachtwoord = '$Wachtwoord', Level = $Level
            WHERE ID = $ID";

echo $query . "<br/>"; //tijdelijke test


//Als de opdracht goed word uitgevoerd:
if(mysqli_query($mysqli, $query))
{
  echo "<p>User $Gebruikersnaam is toegevoegd!.</p>";
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

echo "<p><a href='user_toon.php'>TERUG</a></p>";



?>