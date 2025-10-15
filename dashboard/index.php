<?php
$koneksi = new mysqli("localhost", "root", "", "kampus");

// Hitung jumlah siswa
$jmlSiswa = $koneksi->query("SELECT COUNT(*) as total FROM siswa")->fetch_assoc()['total'];

// Hitung jumlah jurusan
$jmlJurusan = $koneksi->query("SELECT COUNT(*) as total FROM jurusan")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Akademik</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 85%;
            margin: 40px auto;
            color: white;
            text-align: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 40px;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        .card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            width: 250px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, background 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.25);
        }
        .card h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 36px;
            margin: 0;
            font-weight: bold;
        }
        .menu {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 40px;
        }
        .menu a {
            text-decoration: none;
            background: white;
            color: #007bff;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
        }
        .menu a:hover {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Dashboard Akademik</h1>

        <div class="cards">
            <div class="card">
                <h2>Total Siswa</h2>
                <p><?= $jmlSiswa ?></p>
            </div>
            <div class="card">
                <h2>Total Jurusan</h2>
                <p><?= $jmlJurusan ?></p>
            </div>
        </div>

        <div class="menu">
            <a href="index_siswa.php">👩‍🎓 Kelola Siswa</a>
            <a href="jurusan/index.php">🏫 Kelola Jurusan</a>
        </div>
    </div>
</body>
</html>
