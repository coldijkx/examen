<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INLOG</title>
</head>
<body>
<?php
//als het formulier verstuurd
if (isset($_POST['inlog']))
{
    //voeg de databseconnectie toe
    require 'Config.php';
    //lees de gegevens uit
    $Gebruikersnaam = $_POST['Gebruikersnaam'];
    $Wachtwoord     = $_POST['Wachtwoord'];
    //maak de query
    $opdracht = "SELECT * FROM back12_users
                          WHERE Gebruikersnaam = '$Gebruikersnaam'
                          AND Wachtwoord = '$Wachtwoord'";
    //voer de query uit en vang het resultaat op
    $resultaat = mysqli_query($mysqli, $opdracht);
    //controleer of het resultaat een rij (user) heeft opgekleverd
    if (mysqli_num_rows($resultaat) > 0)
    {
        echo "<p>Hallo $Gebruikersnaam, u bent ingelogd!</p>";
        echo "<p><a href='user_toon.php'>Ga verder</a></p>";
    }
    //als het resultaat leeg id:
    else
    {
        echo "<p>Naam en/of wachtwoord zijn onjuist.</p>";
        echo "<p><a href='inlog.php'>Probeer opnieuw</a></p>";
    }
}
//als het formulier niet is verstuurd
else
{
    ?>
    <h2>LOG IN</h2>
    <?php
}



?>
<h2>LOG IN:</h2>
<form method = "post" action="">
   <table border="0">
    <tr>
       <td>Gebruikersnaam</td>
       <td><input type="text" name="Gebruikersnaam"></td>
    </tr>
    <tr>
       <td>Wachtwoord</td>
       <td><input type="password" name="Wachtwoord"></td>
    </tr>
    <tr>
       <td>&nbsp;</td>
       <td><input type="submit" name="inlog" value="LOG IN"></td>
    </tr>
    </table>
</form>
</body>
</html>
        