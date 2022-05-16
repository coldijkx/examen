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
?>
<form name="form1" method="post" action="user_wijzig_verwerk.php">
    <table width="200" border="0">
        <tr>
            <td>ID:</td>
            <td><input type="number" name="ID" value="<?php echo $rij['ID'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="Email" value="<?php echo $rij['Email'] ?>"></td>
        </tr>
        <tr>
            <td>Gebruikersnaam:</td>
            <td><input type="text" name="Gebruikersnaam" value="<?php echo $rij['Gebruikersnaam'] ?>"></td>
        </tr>
        <tr>
            <td>Wachtwoord:</td>
            <td><input type="password" name="Wachtwoord" value="<?php echo $rij['Wachtwoord'] ?>"></td>
        </tr>
        <tr>
            <td>Level:</td>
            <td><input type="number" name="Level" value="<?php echo $rij['Level'] ?>"></td>
        </tr>
        <tr>
            <td>&nbsp:</td>
            <td><input type="submit" name="submit" value="Opslaan"></td>
        </tr>
</form>
<?php
}
?>