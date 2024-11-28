<?php
include("../config.php");
session_start();

// Ambil data acara beserta tamunya
$query = "SELECT acara.*, 
tamu.nama_tamu, tamu.email, tamu.status 
FROM acara 
LEFT JOIN tamu ON acara.acara_id = tamu.acara_id
ORDER BY acara.tgl_acara ASC, tamu.nama_tamu ASC";
$result = mysqli_query($db, $query);
$total_acara = mysqli_num_rows($result);
$current_acara_id = null; 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Acara dan Tamu</title>
    <style>
        table,thead,th,td{
            border:1px solid black;
            border-collapse:collapse;
            padding:10px;
        }
    </style>
</head>
<body>

    <h1>Daftar Acara</h1>
    <?php if (isset($_SESSION['notifikasi'])): ?>
        <p><?= $_SESSION['notifikasi']; ?></p>
        <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>
    <ul>
    <li><a href="index.php">Data acara</a></li>
    <li><a href="../tamu/tamu.php">Data Tamu</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>Nama Acara</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Tamu</th>
                <th><a href="tambah_acara.php">Tambah acara</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <?php 
                // Jika acara baru, tampilkan detail acara
                if ($row['acara_id'] != $current_acara_id): 
                    $current_acara_id = $row['acara_id']; 
                ?>
                    <tr>
                        <td><?= $row['nama_acara']; ?></td>
                        <td><?= $row['tgl_acara']; ?></td>
                        <td><?= $row['lokasi_acara']; ?></td>
                        <td><?= $row['deskripsi']; ?></td>
                        <td>
                            <?php if ($row['nama_tamu']): ?>
                                <strong><?= $row['nama_tamu']; ?></strong> (<?= $row['email']; ?>) - <?= $row['status']; ?><br>
                            <?php else: ?>
                                <em>Tidak ada tamu.</em>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit_acara.php?acara_id=<?= $row['acara_id']; ?>">Edit Acara</a> | 
                            <a href="hapus_acara.php?acara_id=<?= $row['acara_id']; ?>" onclick="return confirm('Hapus acara ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php else: ?>
                    <!-- Jika sudah ada acara yang ditampilkan, hanya tampilkan tamu -->
                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <?php if ($row['nama_tamu']): ?>
                                <strong><?= $row['nama_tamu']; ?></strong> (<?= $row['email']; ?>) - <?= $row['status']; ?><br>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
<p><strong>Total Acara: <?= $total_acara; ?></strong></p>
</html>
