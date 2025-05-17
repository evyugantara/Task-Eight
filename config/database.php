<?php
class Database {
    private $host = "localhost";
    private $db_name = "kosan";  // ganti dengan nama database kamu
    private $username = "root";  // sesuaikan dengan username MySQL kamu
    private $password = "";      // sesuaikan dengan password MySQL kamu
    private $port = 3307;        // sesuaikan port mysql-mu

    public function getConnection() {
        $conn = null;
        try {
            $conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->db_name}",
                            $this->username,
                            $this->password);
            // set error mode ke exception supaya error terlihat jelas
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage();
        }
        return $conn;
    }
}
?>
