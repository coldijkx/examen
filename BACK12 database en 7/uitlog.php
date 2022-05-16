<?php
session_start();

//alle sessies leegmaken
session_unset();
//verwijder alle sessies ook nog
session_destroy();

echo "Je bent goed uitgelogd";

//een enkele sessie leegmaken
$_SESSION['gebruikersnaam'] = '';

unset($_SESSION)['gebruikersnaam']);

?>