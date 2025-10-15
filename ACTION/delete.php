<?php
$koneksi = new mysqli("localhost", "root", "", "kampus");
$id = $_GET['id'];
$koneksi->query("DELETE FROM mahasiswa1 WHERE id='$id'");
echo "Data berhasil dihapus";
?>
