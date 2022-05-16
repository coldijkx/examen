<?php
require 'Config.php';     //Voeg config toe
$bandid = $_GET['id'];    //haal het band-id uit de url
$query = "SELECT * FROM back12_bands WHERE ID_band = " . $bandid;  //maak de query
$resultaat = mysqli_query($mysqli, $query);    //vang het resultaat van de query op in 'resultaat'
if (mysqli_num_rows($resultaat) == 0)    //als het resultaat uit 0 rijen bestaat
{
    echo "<p>Er is geen user met ID $bandid.</p>";
}
else    //als er wel rijen zijn gevonden
{
    $rij = mysqli_fetch_array($resultaat);     //haal de rij (band) uit het resultaat
?>
<p> Wilt U de volgende user verwijderen?</p>
<form name="form1" method="post" action="band_verwijder_verwerk.php">
  <input type="hidden" name="ID_band" value="<?php echo $rij['ID_band'] ?>" >
  <p>Naam
  <input type="text" name="Naam" value="<?php echo $rij['ID_band'] ?>" disabled/></p>
  <p><input type="submit" name="submit" value="Verwijder" /> </p>
  </form>
  <p><a href="band_uitlees.php">TERUG</a> naar overzicht.</p>
<?php
}
?>