<?php
//Is de submitknop (en de rest van het formulier)
//naar deze pagina gestuurd?
if (isset($_POST['submit']))
{
//voeg de koppeling naar de database toe
require 'Config.php';

//lees het formulier uit
$Land = $_POST['Land'];
$AantalLeden = $_POST['AantalLeden'];
$Muzieksoort = $_POST['Muzieksoort'];
$Info = $_POST['Info'];

//maak de query
$query = "INSERT INTO back12_bands
            VALUES (NULL, '$Land', '$AantalLeden', '$Muzieksoort', $Info)";



//Als de opdracht goed word uitgevoerd:
if(mysqli_query($mysqli, $query))
{
  echo "<p>band $Band is toegevoegd!.</p>";
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

echo "<p><a href='band_toevoeg.html'>TERUG</a></p>";



?>