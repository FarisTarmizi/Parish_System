<?php
$host = 'localhost';
$db = 'masjid_ulu_pauh';
$user = 'root';
$pass = '';


$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
