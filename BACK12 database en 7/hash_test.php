<?php

$naam = "kees";

$naam_md5 = md5($naam); //32 karakters, hexadecimaal
$naam_sha1 = sha1($naam); //40 karakters, hexadecimaal

echo "<p>Naam: $naam.</p>";
echo "md5: $naam_md5<br/>";
echo "sha1: $naam_sha1<br/>";
?>