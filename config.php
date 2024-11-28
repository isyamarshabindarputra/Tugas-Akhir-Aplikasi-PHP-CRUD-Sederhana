<?php
$server = "localhost";
$user = "root";
$password = ""; 
$database = "event_invationV2";

$db = mysqli_connect($server, $user, $password, $database);

if (!$db) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}
?>
