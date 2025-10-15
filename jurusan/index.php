<?php
include '../koneksi.php';
$data = $koneksi->query("SELECT * FROM jurusan1 ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jurusan</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: white;
            margin-top: 30px;
            font-size: 28px;
            text-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        .container {
            width: 80%;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 30px;
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #2575fc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f5ff;
            transition: 0.3s;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-add {
            background-color: #28a745;
        }
        .btn-add:hover {
            background-color: #218838;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #333;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            background-color: rgba(255,255,255,0.2);
            padding: 8px 14px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .back-link:hover {
            background-color: rgba(255,255,255,0.4);
        }

    </style>
</head>
<body>
    <div class="top-bar">
        <h2>📘 Data Jurusan</h2>
        <a href="../dashboard/dashboard.php" class="back-link">🏠 Kembali ke Dashboard</a>

    </div>

    <div class="container">
        <a href="tambah.php" class="btn btn-add">+ Tambah Jurusan</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            while ($row = $data->fetch_assoc()) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>{$row['nama']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                        <a href='hapus.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Yakin mau hapus?\")'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</body>
</html>
