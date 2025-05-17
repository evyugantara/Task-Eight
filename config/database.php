<?php
class Database {
    private $host = "localhost";
    private $port = "3307"; // disesuaikan
    private $db_name = "kosan";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
