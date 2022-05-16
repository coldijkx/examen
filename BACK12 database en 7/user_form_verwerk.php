<?php
//Is de submitknop (en de rest van het formulier)
//naar deze pagina gestuurd?
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$Email = $_POST['Email'];
$Gebruikersnaam = $_POST['Gebruikersnaam'];
$Wachtwoord = sha1($_POST['Wachtwoord']);
$Level = $_POST['Level'];

//maak de query
$query = "INSERT INTO back12_users
            VALUES (NULL, '$Email', '$Gebruikersnaam', '$Wachtwoord', $Level)";



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

}
else
{
  echo "<p>Geen gegevens ontvangen...</p>";
}

echo "<p><a href='user_form.html'>TERUG</a></p>";



?>