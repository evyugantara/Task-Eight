<?php
include_once "../config/database.php";
include_once "../classes/Penghuni.php";

$db = (new Database())->getConnection();
$penghuni = new Penghuni($db);

$penghuni->tambah($_POST['nama'], $_POST['kamar'], $_POST['no_hp']);
header("Location: ../index.php");
