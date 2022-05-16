<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Artiest toevoeg</title>
</head>
<body>


<div class="errorveld"> <?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "veldisleeg") {
        echo '<p class="submiterror">Vul alle velden in</p>';
    }
    else if ($_GET['error'] == "naamwerktniet") {
        echo '<p class="submiterror">De naam klopt niet</p>';
    }
    else if ($_GET['error'] == "datumwerktniet") {
        echo '<p class="submiterror">Verkeerde Datum</p>';
    }
    else if ($_GET['error'] == "kanbandnietvinden") {
        echo '<p class="submiterror">Ongeldige Band</p>';
    }
}
?>
</div>

    <form action="artiest_toevoeg_verwerk.php" method="post">
       Naam: <input type="text" name="naam" required><br>
       Instrument: <input type="text" name="instrument" required><br>
       Geboortedatum: <input type="date" name="geboortedatum" required><br>
       Geslacht: <input type="text" name="geslacht" required><br>
       Info: <input type="text" name="info"><br>
       Band: <select name="bands" required>
        <?php 

        require 'Config.php';
        $opdracht = "SELECT * FROM back12_bands";
        $resultaat = mysqli_query($mysqli, $opdracht);
        while ($band = mysqli_fetch_array($resultaat))
        {
            echo "<option value='" . $band['ID'] . "'>";
                echo $band['Naam'];
            echo "</option>";
        }
        if (!$mysqli) {
            echo "Fout: kan geen verbinding maken met de database <br>";
            echo "Errno: " . mysqli_connect_errno() . "<br/>";
            echo "Error: " . mysqli_connect_error() . "<br/>";
            exit;
        }

        ?>
       </select>
       <button type="submit" name="artiest-submit">Toevoegen</button>
    </form>
</body>
</html>