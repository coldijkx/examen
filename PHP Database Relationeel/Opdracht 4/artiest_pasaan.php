<?php
//Voeg config toe
require 'Config.php';

//haal het user-id uit de url
$artiestid = $_GET['id'];

//maak de query
$query = "SELECT * FROM back13_artiesten WHERE ID_artiest = " . $artiestid;
//vang het resultaat van de query op in 'resultaat'
$resultaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 rijen bestaat
if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen artiest met ID $artiestid.</p>";
}
//als er wel rijen zijn gevonden
else
{
    //haal de rij (user) uit het resultaat
    $rij = mysqli_fetch_array($resultaat);   
?>
<form name="form1" method="post" action="artiest_pasaan_verwerk.php">
    <table width="200" border="0">
        <tr>
            <td>Naam:</td>
            <td><input type="text" name="Naam" value="<?php echo $rij['Naam'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Instrument:</td>
            <td><input type="text" name="Instrument" value="<?php echo $rij['Instrument'] ?>"></td>
        </tr>
        <tr>
            <td>Geboortedatum:</td>
            <td><input type="date" name="Geboortedatum" value="<?php echo $rij['Geboortedatum'] ?>"></td>
        </tr>
        <tr>
        <td>Geslacht:</td>
            <td><input type="Geslacht" name="Gender" value="<?php echo $rij['Geslacht'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Info:</td>
            <td><input type="text" name="Info" value="<?php echo $rij['Info'] ?>"></td>
        </tr>
        <tr>
            <td>&nbsp:</td>
            <td><input type="submit" name="submit" value="Opslaan"></td>
        </tr>
<?php
}
?>