<?php
session_start();
include("../config.php");

$id = $_GET['acara_id'];
$query = "DELETE FROM acara WHERE acara_id=$id";
$result = mysqli_query($db, $query);

if ($query) {
    $_SESSION['notifikasi'] = "Data acara berhasil dihapus!";
    header('Location: index.php');
} else {
    $_SESSION['notifikasi'] = "Gagal menghapus data acara.";
    header('Location: index.php');
}
?>
