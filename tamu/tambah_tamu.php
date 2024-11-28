<?php
include("../config.php");

// Ambil daftar acara untuk dropdown
$query_acara = "SELECT * FROM acara";
$result_acara = mysqli_query($db, $query_acara);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tamu</title>
</head>
<body>
    <h1>Tambah Tamu</h1>
    <form action="proses_tambah_tamu.php" method="POST">
        <p>
            <label>Nama Tamu: </label>
            <input type="text" name="nama_tamu" required>
        </p>
        <p>
            <label>Email: </label>
            <input type="email" name="email">
        </p>
        <p>
            <label>Status: </label>
            <select name="status">
                <option value="belum dikonfirmasi">Belum Dikonfirmasi</option>
                <option value="hadir">Hadir</option>
                <option value="tidak hadir">Tidak Hadir</option>
            </select>
        </p>
        <p>
            <label>Acara: </label>
            <select name="acara_id" required>
                <option value="">Pilih Acara</option>
                <?php while ($acara = mysqli_fetch_assoc($result_acara)): ?>
                    <option value="<?= $acara['acara_id']; ?>"><?= $acara['nama_acara']; ?></option>
                <?php endwhile; ?>
            </select>
        </p>
        <p>
            <button type="submit" name="simpan">Simpan</button>
        </p>
    </form>
</body>
</html>
