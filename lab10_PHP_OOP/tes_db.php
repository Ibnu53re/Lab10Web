<?php
include "database.php";

$db = new Database();
echo "<h3 style='color:green'>Koneksi ke database <b>" . $db->getDbName() . "</b> berhasil!</h3>";
?>
