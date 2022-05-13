<?php
//lees het configbestand
require_once 'config.inc.php';

?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ledenbeheer</title>
</head>

<body>

     <h1>Ledenbeheer</h1>
     <?php
     //start de tabel
     echo "<table>";

     // start een tabelrij voor de kopjes
     echo "<tr>";

     // maak de cellen voor de kopjes
     echo "<th>ID</th>";
     echo "<th>Geslacht</th>";
     echo "<th>Voornaam</th>";
     echo "<th>Achternaam</th>";
     echo "<th>Geboortedatum</th>";
     echo "<th>Lid sinds</th>";
     echo "<th></th>";
     echo "<th></th>";

     // sluit de tabelrij voor de kopjes
     echo "</tr>";

     // loop door alle rijen data heen
     while ($row = mysqli_fetch_array($result)) {
         //start een tabelrij
         echo "<tr>";

         // maak de cellen voor de gegevens
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['gender'] . "</td>";
         echo "<td>" . $row['first_name'] . "</td>";
         echo "<td>" . $row['last_name'] . "</td>";
         echo "<td>" . $row['birth_date'] . "</td>";
         echo "<td>" . $row['member_since'] . "</td>";
         echo "<td><a href='lid_bewerk.php?id" . $row['id'] . "'>bewerk</a></td>";
         echo "<td><a href='lid_verwijder.php?id" . $row['id'] . "'>verwijder</a></td>";

         //sluit de tabelrij
         echo "</tr>";
     }

     //sluit de tabel
     echo "</table>";
     ?>

     <p><a href="lid_nieuw.php">klik hier</a> om een nieuw lid in te schrijven. </p>

</body>
</html>

