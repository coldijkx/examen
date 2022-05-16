<?php
//Voeg config toe
require 'Config.php';

//haal het user-id uit de url
$bandid = $_GET['id'];

//maak de query
$query = "SELECT * FROM back12_bands WHERE ID_band = " . $bandid;
//vang het resultaat van de query op in 'resultaat'
$resultaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 rijen bestaat
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen band met ID $bandid.</p>";
}
//als er wel rijen zijn gevonden
else
{
    //haal de rij (user) uit het resultaat
    $rij = mysqli_fetch_array($resultaat);   
?>
<form name="form1" method="post" action="band_wijzig_verwerk.php">
    <table width="200" border="0">
        <tr>
            <td>Naam:</td>
            <td><input type="text" name="Naam" value="<?php echo $rij['Naam'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Land:</td>
            <td><input type="text" name="Land" value="<?php echo $rij['Land'] ?>"></td>
        </tr>
        <tr>
            <td>AantalLeden:</td>
            <td><input type="number" name="AantalLeden" value="<?php echo $rij['AantalLeden'] ?>"></td>
        </tr>
        <tr>
            <td>Muzieksoort:</td>
            <td><input type="text" name="Muzieksoort" value="<?php echo $rij['Muzieksoort'] ?>"></td>
        </tr>
        <tr>
            <td>Info:</td>
            <td><input type="text" name="Info" value="<?php echo $rij['Info'] ?>"></td>
        </tr>
        <tr>
            <td>&nbsp:</td>
            <td><input type="submit" name="submit" value="Opslaan"></td>
        </tr>
</form>
<?php
}
?>