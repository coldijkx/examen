<?php
//start de session
session_start();
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
    //als de gebuiker alleen kijk rechten heeft
    //    en geen gebruiker mag toeveogen
    if ($_SESSION['Level'] == 0)
    {
        echo "<p>U heeft geen rechten om deze pagina te bekijken.</p>";
        echo "<p><a href='user_toon.php'>Ga terug</a></p>";
        exit();
    }
}
//voeg bestand Config.php toe
require 'Config.php';
//maak de query
$query = "INSERT INTO back12_users
          VALUES (NULL, 'test1@glr.nl', 'test1', '0000', 0)";

//voer de opdracht uit
if(mysqli_query($mysqli, $query))
{
    echo "<p>User test1 is toegevoegd!.</p>";
}
//anders
else
{
echo "<p>Fout bij toevoegen.</p>";
echo mysqli_error($mysqli); //let op tijdelijk toevoegen
}




?>