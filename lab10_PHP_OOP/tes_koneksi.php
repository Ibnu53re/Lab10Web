<?php
$conn = mysqli_connect("localhost", "root", "", "latihan1");

if ($conn) {
    echo "Koneksi berhasil ke database latihan1";
} else {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>
