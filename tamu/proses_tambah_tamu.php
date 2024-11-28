<?php
include("../config.php");

if (isset($_POST['simpan'])) {
    $nama_tamu = $_POST['nama_tamu'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $acara_id = $_POST['acara_id'];

    $query = "INSERT INTO tamu (nama_tamu, email, status, acara_id) 
              VALUES ('$nama_tamu', '$email', '$status', '$acara_id')";
    $result = mysqli_query($db, $query);

    if ($result) {
        header('Location: tamu.php');
    } else {
        die("Gagal menyimpan data...");
    }
} else {
    die("Akses dilarang...");
}
?>
