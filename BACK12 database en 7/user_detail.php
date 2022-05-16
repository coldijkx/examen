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
//Voeg config toe
require 'Config.php';

//haal het user-id uit de url
$userid = $_GET['id'];

//maak de query
$query = "SELECT * FROM back12_users WHERE ID = " . $userid;
//vang het resultaat van de query op in 'resultaat'
$resultaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 rijen bestaat
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen user met ID $userid.</p>";
}
//als er wel rijen zijn gevonden
else
{
    //haal de rij (user) uit het resultaat
    $rij = mysqli_fetch_array($resultaat);
    //zet de gegevens van de user in een tabel
    echo "<h2>Gegevens van de user met ID $userid:</h2>";
    echo "<table border='1'>";
    echo "<tr><td>Email:</td>";
    echo     "<td>" . $rij['Email'] . "</td></tr>";
    echo "<tr><td>Gebruikersnaam:</td>";
    echo     "<td>" . $rij['Gebruikersnaam'] . "</td></tr>";
    echo "<tr><td>Wachtwoord:</td>";
    echo     "<td>" . $rij['Wachtwoord'] . "</td></tr>";
    echo "<tr><td>Level:</td>";
    echo     "<td>" . $rij['Level'] . "</td></tr>";
    echo "</table>";   
}
 echo "<p>Terug naar <a href='user_toon.php'>overzicht</a></td></p>";

?>