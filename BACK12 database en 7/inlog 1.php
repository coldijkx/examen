<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InlogPagina</title>
</head>
<body>

<p>Inlog = "naam"</p>
<p>WW    = "Wachtwoord"</p>
    <!--php-->
    <?php
    if (isset($_POST['submit'])){
        // ga hier inloggen(controleren)
        //1 controleert of de gegevens in de database kloppen en voorkomen
        require 'Config.php';
        
        //1.1 lees de gegevens uit het formulier
        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];

        //1.2 maak de query
        $query = "SELECT * FROM back12_users
                  WHERE Gebruikersnaam = '$gebruikersnaam'
                  AND Wachtwoord = '$wachtwoord'";

        //1.3 query uitvoeren en in een resultaat vangen
        $resultaat = mysqli_query(mysqli, $query);

        //1.4 controleer of er iets in resultaat zit
        if (mysqli_num_rows($resultaat)  > 0 ){
            // data uit de database halen
            $user = mysqli_fetch_array($resultaat);
            // er zit een gebruiker met deze gegevens in de database
            echo "Hallo $gebruikersnaam, je bent goed ingelogd"

            //2 en als het klopt, wil ik dat er een sessie wordt gezet

            $_SESSION['gebruikersnaam'] = $user['Gebruikersnaam'];
            $_SESSION['Level'] = $user['Level'];




        } else {
            // er zit geen gebruiker met deze gevevens in de database
            echo "Deze gegevens komen niet voor in onze database"
        }

    } else {

    
    
    ?>



    <!--Form--->
    <h1> Log hieronder in</h1>
    <form action='' method="POST"> 
        Gebruikersnaam:
        <input type="text" name="gebruikersnaam" />
        <br/>

        Wachtwoord:
        <input type="text" name="wachtwoord" />

        Verstuurknop:
        <input type="submit" name="submit" value="Log in" />
    </form>

    <?php } ?>



</body>
</html>