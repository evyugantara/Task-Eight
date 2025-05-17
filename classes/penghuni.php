<?php
class Penghuni {
    private $conn;
    private $table = "penghuni";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($nama, $kamar, $no_hp) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (nama, kamar, no_hp) VALUES (?, ?, ?)");
        return $stmt->execute([$nama, $kamar, $no_hp]);
    }

    public function ubah($id, $nama, $kamar, $no_hp) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET nama = ?, kamar = ?, no_hp = ? WHERE id = ?");
        return $stmt->execute([$nama, $kamar, $no_hp, $id]);
    }

    public function hapus($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
