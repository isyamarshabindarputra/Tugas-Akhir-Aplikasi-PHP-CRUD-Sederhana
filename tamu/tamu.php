<?php
include("../config.php");

// Ambil data tamu beserta acara yang terkait
$query = "SELECT tamu.*, acara.nama_acara 
          FROM tamu 
          LEFT JOIN acara ON tamu.acara_id = acara.acara_id
          ORDER BY tamu.nama_tamu ASC";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tamu</title>
    <style>
        table,thead,th,td{
            border:1px solid black;
            border-collapse:collapse;
            padding:10px;
        }
    </style>
</head>
<body>
    <h1>Daftar Tamu</h1>
    <li><a href="../acara/index.php">data acara</a></li>
    <li><a href="tamu.php"></a>data tamu</li>
    <table>
        <thead>
            <tr align="center">
                <th>Nama Tamu</th>
                <th>Email</th>
                <th>Status</th>
                <th>Acara</th>
                <th><a href="tambah_tamu.php">Tambah tamu</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($tamu = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $tamu['nama_tamu']; ?></td>
                    <td><?= $tamu['email']; ?></td>
                    <td><?= $tamu['status']; ?></td>
                    <td><?= $tamu['nama_acara'] ?: 'Belum terhubung ke acara'; ?></td>
                    <td>
                        <a href="edit_tamu.php?tamu_id=<?= $tamu['tamu_id']; ?>">Edit</a> | 
                        <a href="hapus.tamu.php?tamu_id=<?= $tamu['tamu_id']; ?>" onclick="return confirm('Hapus tamu ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
