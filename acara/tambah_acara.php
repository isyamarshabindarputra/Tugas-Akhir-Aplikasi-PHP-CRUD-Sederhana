<!DOCTYPE html>
<html>
<head>
    <title>Tambah Acara</title>
</head>
<body>
    <h1>Tambah Acara</h1>
    <form action="proses_tambah.php" method="POST">
        <p>
            <label>Nama Acara: </label>
            <input type="text" name="nama_acara" required>
        </p>
        <p>
            <label>Tanggal Acara: </label>
            <input type="date" name="tgl_acara" required>
        </p>
        <p>
            <label>Lokasi: </label>
            <input type="text" name="lokasi_acara">
        </p>
        <p>
            <label>Deskripsi: </label>
            <textarea name="deskripsi"></textarea>
        </p>
        <p>
            <button type="submit" name="simpan">Simpan</button>
        </p>
    </form>
</body>
</html>
