<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penghuni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Penghuni Baru</h1>
    <form method="POST" action="proses/tambah_penghuni.php">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="kamar" placeholder="Kamar" required>
        <input type="text" name="no_hp" placeholder="No HP" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">🔙 Kembali</a>
</body>
</html>
