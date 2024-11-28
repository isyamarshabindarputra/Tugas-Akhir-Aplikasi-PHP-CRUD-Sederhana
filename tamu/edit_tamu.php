<?php
include("../config.php");

$id = $_GET['tamu_id'];
$query = "SELECT * FROM tamu WHERE tamu_id=$id";
$result = mysqli_query($db, $query);
$tamu = mysqli_fetch_assoc($result);

$query_acara = "SELECT * FROM acara";
$result_acara = mysqli_query($db, $query_acara);

if (mysqli_num_rows($result) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tamu</title>
</head>
<body>
    <h1>Edit Tamu</h1>
    <form action="proses_edit_tamu.php" method="POST">
        <input type="hidden" name="tamu_id" value="<?= $tamu['tamu_id']; ?>">
        <p>
            <label>Nama Tamu: </label>
            <input type="text" name="nama_tamu" value="<?= $tamu['nama_tamu']; ?>" required>
        </p>
        <p>
            <label>Email: </label>
            <input type="email" name="email" value="<?= $tamu['email']; ?>">
        </p>
        <p>
            <label>Status: </label>
            <select name="status">
                <option value="belum dikonfirmasi" <?= $tamu['status'] == 'belum dikonfirmasi' ? 'selected' : ''; ?>>Belum Dikonfirmasi</option>
                <option value="hadir" <?= $tamu['status'] == 'hadir' ? 'selected' : ''; ?>>Hadir</option>
                <option value="tidak hadir" <?= $tamu['status'] == 'tidak hadir' ? 'selected' : ''; ?>>Tidak Hadir</option>
            </select>
        </p>
        <p>
            <label>Acara: </label>
            <select name="acara_id" required>
                <?php while ($acara = mysqli_fetch_assoc($result_acara)): ?>
                    <option value="<?= $acara['acara_id']; ?>" <?= $tamu['acara_id'] == $acara['acara_id'] ? 'selected' : ''; ?>><?= $acara['nama_acara']; ?></option>
                <?php endwhile; ?>
            </select>
        </p>
        <p>
            <button type="submit" name="simpan">Simpan</button>
        </p>
    </form>
</body>
</html>
