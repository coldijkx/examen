<?php
require_once 'config.inc.php';

//lees het ID uit de url
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
    //lees het lid uit de database
    $result = mysqli_query($mysqli, "SELECT * FROM back2_leden WHERE id = $id");

    // is er een lid gevonden met dit ID?
    if (mysqli_num_rows($result) == 1) {
        //ja lees het lid uit de dataset
        $row = mysqli_fetch_array($result);
    } else {
        echo "Geen lid gevonden";
        exit;
    }
} else {
    echo "Onjuist ID.";
    exit;
}
?>
<!doctype html>
<html>

<head>

<title>lid bewerken</title>

</head>

<body>

<h1>lid bewerken </h1>

<form action="lid_bewerk_verwerk.php" method="post">

    <p>
     <label>
     <input type="radio" name="gender" id="gender_m" value="M"
     <php if ($row['gender'] == 'M') echo 'checked="checked"'; ?>>
     Man</label>

     <br>
     <input type="radio" name="gender" id="gender_f" value="F"
     <php if ($row['gender'] == 'F') echo 'checked="checked"'; ?>>
     Vrouw</label>
    </p>

    <p>
        <label for="first_name">Voornaam:</label>
        <input type="text" name="first_name" id="first_name" required="required"
        value="<?php echo $row['first_name']; ?>">
    </p>
    <p>
        <label for="last_name">Achternaam:</label>
        <input type="text" name="last_name" id="last_name" required="required"
        value="<?php echo $row['last_name']; ?>">
    </p>
    <p>
        <label for="birth_date">geboortedatum:</label>
        <input type="date" name="birth_date" id="birth_date" required="required"
        value="<?php echo $row['birth_date']; ?>">
    </p>
    <p>
        <label for="member_since">Lid sinds:</label>
        <input type="date" name="member_since" id="member_since" required="required"
        value="<?php echo $row['member_since']; ?>">
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Opslaan">
        <button onclick="history.back();return false;">Annuleren</button>
    </p>

</form>

</body>

</html>
