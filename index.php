<?php
include_once "config/database.php";
include_once "classes/Penghuni.php";

$database = new Database();
$db = $database->getConnection();

$penghuni = new Penghuni($db);
$stmt = $penghuni->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penghuni Kosan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🏠 Data Penghuni Kosan</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kamar</th>
            <th>No. HP</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kamar'] ?></td>
            <td><?= $row['no_hp'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
