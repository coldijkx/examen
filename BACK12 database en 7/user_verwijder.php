<?php
require 'Config.php';     //Voeg config toe
$userid = $_GET['id'];    //haal het user-id uit de url
$query = "SELECT * FROM back12_users WHERE ID = " . $userid;  //maak de query
$resultaat = mysqli_query($mysqli, $query);    //vang het resultaat van de query op in 'resultaat'
if (mysqli_num_rows($resultaat) == 0)    //als het resultaat uit 0 rijen bestaat
{
    echo "<p>Er is geen user met ID $userid.</p>";
}
else    //als er wel rijen zijn gevonden
{
    $rij = mysqli_fetch_array($resultaat);     //haal de rij (user) uit het resultaat
?>
<p> Wilt U de volgende user verwijderen?</p>
<form name="form1" method="post" action="user_verwijder_verwerk.php">
  <input type="hidden" name="ID" value="<?php echo $rij['ID'] ?>" >
  <p>Gebruikersnaam
  <input type="text" name="Gebruikersnaam" value="<?php echo $rij['ID'] ?>" disabled/></p>
  <p><input type="submit" name="submit" value="Verwijder" /> </p>
  </form>
  <p><a href="user_toon.php">TERUG</a> naar overzicht.</p>
<?php
}
?>