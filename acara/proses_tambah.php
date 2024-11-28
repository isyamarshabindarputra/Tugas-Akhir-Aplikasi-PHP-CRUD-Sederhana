<?php
include("../config.php");

if (isset($_POST['simpan'])) {
    $nama_acara = $_POST['nama_acara'];
    $tgl_acara = $_POST['tgl_acara'];
    $lokasi_acara = $_POST['lokasi_acara'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO acara (nama_acara, tgl_acara, lokasi_acara, deskripsi) 
              VALUES ('$nama_acara', '$tgl_acara', '$lokasi_acara', '$deskripsi')";
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
