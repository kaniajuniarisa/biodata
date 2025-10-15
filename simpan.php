<?php
$koneksi = new mysqli("localhost","root","","kampus");

$Nama = $_POST['Nama'];
$Umur = $_POST['Umur'];
$Jurusan = $_POST['Jurusan']; // ini langsung teks

$koneksi->query("INSERT INTO mahasiswa1 (Nama, Umur, Jurusan) VALUES ('$Nama','$Umur','$Jurusan')");
echo "Data berhasil disimpan";
?>
