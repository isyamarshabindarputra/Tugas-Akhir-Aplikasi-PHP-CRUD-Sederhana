<?php
include("../config.php");

$id = $_GET['acara_id'];
$query = "SELECT * FROM acara WHERE acara_id=$id";
$result = mysqli_query($db, $query);
$acara = mysqli_fetch_assoc
($result);

if (mysqli_num_rows($result) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Acara</title>
</head>
<body>
    <h1>Edit Acara</h1>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="acara_id" value="<?= $acara['acara_id']; ?>">
        <p>
            <label>Nama Acara: </label>
            <input type="text" name="nama_acara" value="<?= $acara['nama_acara']; ?>" required>
        </p>
        <p>
            <label>Tanggal Acara: </label>
            <input type="date" name="tgl_acara" value="<?= $acara['tgl_acara']; ?>" required>
        </p>
        <p>
            <label>Lokasi: </label>
            <input type="text" name="lokasi_acara" value="<?= $acara['lokasi_acara']; ?>">
        </p>
        <p>
            <label>Deskripsi: </label>
            <textarea name="deskripsi"><?= $acara['deskripsi']; ?></textarea>
        </p>
        <p>
            <button type="submit" name="simpan">Simpan</button>
        </p>
    </form>
</body>
</html>
