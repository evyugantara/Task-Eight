<?php
include_once "config/database.php";
include_once "classes/Penghuni.php";

$db = (new Database())->getConnection();
$penghuni = new Penghuni($db);
$data = $penghuni->getAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Penghuni Kosan</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        /* Reset & Font */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            margin: 0; padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        /* Container */
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
        }

        /* Button */
        .btn {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }
        .btn:hover {
            background-color: #219150;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #2980b9;
            color: white;
            font-weight: 700;
            letter-spacing: 0.05em;
        }
        tr:hover {
            background-color: #f1f8ff;
        }

        /* Action Buttons */
        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background-color: #f39c12;
        }
        .btn-edit:hover {
            background-color: #d48806;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            tr {
                margin-bottom: 15px;
            }
            th {
                display: none;
            }
            td {
                padding-left: 50%;
                text-align: left;
                position: relative;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                font-weight: 700;
                text-transform: uppercase;
                font-size: 0.85em;
                color: #555;
            }
            .btn {
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm("Yakin ingin menghapus data ini?")) {
                window.location.href = 'proses/hapus_penghuni.php?id=' + id;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Data Penghuni Kosan</h1>
        <a href="tambah.php" class="btn">➕ Tambah Penghuni Baru</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kamar</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
                    <td data-label="Nama"><?= htmlspecialchars($row['nama']) ?></td>
                    <td data-label="Kamar"><?= htmlspecialchars($row['kamar']) ?></td>
                    <td data-label="No HP"><?= htmlspecialchars($row['no_hp']) ?></td>
                    <td data-label="Aksi">
                        <a href="ubah.php?id=<?= $row['id'] ?>" class="btn-edit" title="Ubah">✏️</a>
                        <a href="#" onclick="confirmDelete(<?= $row['id'] ?>)" class="btn-delete" title="Hapus">🗑️</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
