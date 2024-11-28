<?php
include("../config.php");

if (isset($_POST['simpan'])) {
    $acara_id = $_POST['acara_id'];
    $nama_acara = $_POST['nama_acara'];
    $tgl_acara = $_POST['tgl_acara'];
    $lokasi_acara = $_POST['lokasi_acara'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE acara SET 
              nama_acara='$nama_acara', tgl_acara='$tgl_acara', lokasi_acara='$lokasi_acara', deskripsi='$deskripsi' 
              WHERE acara_id=$acara_id";
    $result = mysqli_query($db, $query);

    if ($result) {
        $_SESSION['notifikasi'] = "Data acara berhasil diperbarui!";
        header('Location: index.php');
    } else {
        $_SESSION['notifikasi'] = "Gagal memperbarui data acara.";
        header('Location: index.php');
    }
} else {
    die("Akses dilarang...");
}
?>
