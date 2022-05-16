<?php
//foutmeldingen aanzetten
error_reporting(E_ALL);
ini_sett('display_errors', '1');



// database ligngegevens
$db_hostname = 'localhost';
$db_username = '84222_back12';
$db_password = 'Hamster2003';
$db_database = '84222_back12';


$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);




if (!$mysqli) {
    echo "FOUT geen connectie naar database. <br>";
    echo "Errno: " . mysqli_connect_errno() . "<br/>";
    echo "Error " . mysqli_connect_error() . "<br/>";
    exit;
}




?>