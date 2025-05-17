<?php
include_once "../config/database.php";
include_once "../classes/Penghuni.php";

$db = (new Database())->getConnection();
$penghuni = new Penghuni($db);

$penghuni->hapus($_GET['id']);
header("Location: ../index.php");
