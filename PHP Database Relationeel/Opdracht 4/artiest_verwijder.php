<?php
require 'Config.php';     //Voeg config toe
$artiestid = $_GET['id'];    
$query = "SELECT * FROM back13_artiesten WHERE ID_artiest = " . $artiestid;  //maak de query
$resultaat = mysqli_query($mysqli, $query);    //vang het resultaat van de query op in 'resultaat'
if (mysqli_num_rows($resultaat) == 0)    //als het resultaat uit 0 rijen bestaat
{
    echo "<p>Er is geen artiest met ID $artiestid.</p>";
}
else    //als er wel rijen zijn gevonden
{
    $rij = mysqli_fetch_array($resultaat);    
?>
<p> Wilt U de volgende artiest verwijderen?</p>
<form name="form1" method="post" action="artiest_verwijder_verwerk.php">
  <input type="hidden" name="ID_artiest" value="<?php echo $rij['ID_artiest'] ?>" >
  <p>Naam
  <input type="text" name="Naam" value="<?php echo $rij['ID_artiest'] ?>" disabled/></p>
  <p><input type="submit" name="submit" value="Verwijder" /> </p>
  </form>
  <p><a href="artiest_uitlees.php">TERUG</a> naar overzicht.</p>
<?php
}
?>