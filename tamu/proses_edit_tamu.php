<?php
include("../config.php");

if (isset($_POST['simpan'])) {
    $tamu_id = $_POST['tamu_id'];
    $nama_tamu = $_POST['nama_tamu'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $acara_id = $_POST['acara_id'];

    $query = "UPDATE tamu SET 
              nama_tamu='$nama_tamu', email='$email', status='$status', acara_id='$acara_id' 
              WHERE tamu_id=$tamu_id";
    $result = mysqli_query($db, $query);

    if ($result) {
        $_SESSION['notifikasi'] = "Data acara berhasil ditambahkan!";
        header('Location: index.php');
    } else {
        $_SESSION['notifikasi'] = "Gagal menambahkan data acara.";
        header('Location: index.php');
    }
} else {
    die("Akses dilarang...");
}
?>
