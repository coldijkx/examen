<?php
require_once 'config.inc.php';
?>
<!doctype html>
<html>

<head>

<title>Voeg lid toe</title>

</head>

<body>

<h1>Nieuw lid inschrijven </h1>

<form action="lid_nieuw_verwerk.php" method="post">

     <p>
     <label>
     <input type="radio" name="gender" id="gender_m" value="M" checked="checked">
     Man</label>

     <br>
     <input type="radio" name="gender" id="gender_f" value="f">
     Vrouw</label>
     </p>

     <p>
        <label for="first_name">Voornaam:</label>
        <input type="text" name="first_name" id="first_name" required="required">
    </p>
    <p>
        <label for="last_name">Achternaam:</label>
        <input type="text" name="last_name" id="last_name" required="required">
    </p>
    <p>
        <label for="birth_date">geboortedatum:</label>
        <input type="date" name="birth_date" id="birth_date" required="required">
    </p>
    <p>
        <label for="member_since">Lid sinds:</label>
        <input type="date" name="member_since" id="member_since" required="required">
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Opslaan">
        <button onclick="history.back();return false;">Annuleren</button>
    </p>

</form>

</body>

</html>
