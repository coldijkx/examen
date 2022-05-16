<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

if (isset($_POST['artiest-submit'])) {

require 'Config.php';

$naam = $_POST ['naam'];
$instrument = $_POST ['instrument'];
$geboortedatum = $_POST ['geboortedatum'];
$geslacht = $_POST ['geslacht'];
$info = $_POST ['info'];
$band = $_POST ['bands'];

if (empty($naam) || empty($instrument) || empty($geboortedatum) || empty($geslacht) || empty($info)) {
    header("Location: artiest_toevoeg.php?error=veldisleeg");
    exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $naam)) {
    header("Location: artiest_toevoeg.php?error=naamwerktniet");
    exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $datum)) {
    header("Location: artiest_toevoeg.php?error=datumwerktniet");
    exit();
}
else if (!preg_match("/^[0-9]*$/", $band)) {
    header("Location: artiest_toevoeg.php?error=kanbandnietvinden");
    exit();
}

$query = "INSERT INTO back13_artiesten (ID_artiest, Naam, Instrument, Geboortedatum, Geslacht, Info, Band) VALUES (NULL, '$naam', '$instrument', '$geboortedatum', '$geslacht', '$info', '$band')";

mysqli_query($mysqli, $query);

echo "U heeft $naam, $instrument, $geboortedatum, $geslacht, $info, $band toegevoegd.<br><br>";
}
?>
<a href="artiest_toevoeg.php">Terug</a><br><br>
</body>
</html>
