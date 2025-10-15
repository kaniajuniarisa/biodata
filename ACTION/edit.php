<?php
$koneksi = new mysqli("localhost","root","","kampus");

if(isset($_POST['id'], $_POST['Nama'], $_POST['Umur'], $_POST['Jurusan'])) {
    $id = $_POST['id'];
    $Nama = $_POST['Nama'];
    $Umur = $_POST['Umur'];
    $Jurusan = $_POST['Jurusan'];

    $koneksi->query("UPDATE mahasiswa1 SET Nama='$Nama', Umur='$Umur', Jurusan='$Jurusan' WHERE id='$id'");
    echo "Data berhasil diupdate";
}
?>
