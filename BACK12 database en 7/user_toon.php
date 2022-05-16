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
}

//include mijn config bestand om connectie te maken
require 'Config.php';

// query maken
$query = "SELECT * FROM back12_users";

// vang het resultaat van de query op in een variabele
//mysqli_query krijgt 2 variabelen 1 de connectie met de database en 2 de query
$resultaat = mysqli_query($mysqli, $query);

// tel resultaten in tabel
if (mysqli_num_rows($resultaat) == 0)
{
echo "er zitten geen users in de tabel";
} else
{
    echo "<table border='1'";
    while ($rij = mysqli_fetch_array($resultaat))
    {
        echo "<tr>";
        echo "<td>" . $rij['ID'] . "</td>";
        echo "<td>" . $rij['Email'] . "</td>";
        echo "<td> <a href='user_detail.php?id=".$rij['ID']."'>detail</a></td>";
        echo "<td> <a href='user_wijzig.php?id=".$rij['ID']."'>wijzig</a></td>";
        echo "<td> <a href='user_verwijder.php?id=".$rij['ID']."'>verwijder</a> </td>";
        echo "</tr>";
    }
    echo "</table>";
}




?>