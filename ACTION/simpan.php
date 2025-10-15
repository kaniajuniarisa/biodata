<?php
include '../koneksi.php'; // karena file koneksi ada di luar folder ACTION

if (isset($_POST['Nama']) && isset($_POST['Umur'])) {
    $nama = $_POST['Nama'];
    $umur = $_POST['Umur'];

    $sql = "INSERT INTO siswa (nama, umur, created_at) VALUES ('$nama', '$umur', NOW())";
    if ($koneksi->query($sql)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
} else {
    echo "Data tidak lengkap!";
}
?>
