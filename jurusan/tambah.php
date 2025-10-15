<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $koneksi->query("INSERT INTO jurusan1 (nama) VALUES ('$nama')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jurusan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 6px rgba(106,17,203,0.3);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }

    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 15px;
        background: #ddd;
        color: #333;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.3s;
        font-weight: bold;
    }

    .back-link {
        background: #bbb;
    }
    </style>
</head>
<body>
    <div class="form-container">
    <h2>Tambah Jurusan</h2>
    
    <!-- Tombol Kembali -->
    <a href="../dashboard/dashboard.php" class="back-link">← Kembali ke Dashboard</a>
    
    <form method="POST">
        <label>Nama Jurusan</label>
        <input type="text" name="nama" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>
    
</body>
</html>
