<?php
include_once "config/database.php";
include_once "classes/Penghuni.php";

$db = (new Database())->getConnection();
$penghuni = new Penghuni($db);
$data = $penghuni->getById($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Penghuni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ubah Data Penghuni</h1>
    <form method="POST" action="proses/ubah_penghuni.php">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>
        <input type="text" name="kamar" value="<?= $data['kamar'] ?>" required>
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">🔙 Kembali</a>
</body>
</html>
