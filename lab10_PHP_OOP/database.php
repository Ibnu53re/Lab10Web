<?php
class Database {
    // Properti koneksi (gunakan protected untuk keamanan)
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    public $conn;

    // Konstruktor otomatis jalan saat class dibuat
    public function __construct() {
        // Konfigurasi koneksi
        $this->host = "localhost";
        $this->user = "root";
        $this->password = ""; // biarkan kosong jika XAMPP default
        $this->db_name = "latihan1";

        // Membuat koneksi ke MySQL
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        // Cek koneksi berhasil atau tidak
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method untuk menampilkan data
    public function tampil($table) {
        $sql = "SELECT * FROM $table";
        $result = $this->conn->query($sql);
        return $result;
    }

    // Method untuk menambah data
    public function tambah($table, $data) {
        $columns = implode(",", array_keys($data));
        $values  = implode("','", array_values($data));
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
        return $this->conn->query($sql);
    }

    // Method untuk mengubah data
    public function ubah($table, $data, $filter) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key='$value'";
        }
        $set_str = implode(",", $set);
        $sql = "UPDATE $table SET $set_str $filter";
        return $this->conn->query($sql);
    }

    // Method untuk menghapus data
    public function hapus($table, $filter) {
        $sql = "DELETE FROM $table $filter";
        return $this->conn->query($sql);
    }

    // Getter untuk ambil nama database (menghindari error "protected property")
    public function getDbName() {
        return $this->db_name;
    }
}
?>
