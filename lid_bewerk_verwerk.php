<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);



// config connect
require_once 'config.inc.php';

// lees alle formuliervelden
$gender          = $_post['gender'];
$first_name      = $_post['first_name'];
$last_name       = $_post['last_name'];
$birth_date      = $_post['birth_date'];
$member_since    = $_post['member_since'];

if (strlen($first_name)       > 0 &&
   (strlen($last_name)        > 0 &&
   (strlen($birth_date)       > 0 &&
   (strlen($member_since)     > 0 &&
   (strlen($gender)           > 0) {

    //alle data zijn ok maak de query
$query = "UPDATE back2_leden
            SET
            gender = '$gender',
            first_name = '$first_name',
            last_name = '$last_name',
            birth_date = '$birth_date',
            member_since = '$member_since'
            WHERE id = $id";


    // controleerofde data wel correct zijn
    $check1 = strtotime($birth_date);
    $check2 = strtotime($member_since);
    if (date('y-m-d', $check1) == $birth_date && 
        date('y-m-d', $check2) == $member_since) 
        {
        // alle data zijn OK, maak de query
        $query ="INSERT INTO back2_leden 
                (gender, first_name, last_name, birth_date, member_since)
                VALUES(
                '$gender',
                '$firt_name', 
                '$last_name', 
                '$birth_date', 
                '$member_since')"; 

    // voer de query uit
    $result = mysqli_query($mysqli, $query);

    //comtroleer het resutaat
    if($result) {
        // alles Ok, stuur terug naar homepage
        header("Location:home.php");
        exit;
    } else {
        echo 'Er ging wat mis met het toevoegen!';
    }
    }else {
        //er is iets mis met ee datum
        echo 'een van de ingevulde data was ongeldig';
    }
}else {
    echo 'Niet alle velden waren ingevuld';
}





?>