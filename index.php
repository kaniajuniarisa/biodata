<?php
$koneksi = new mysqli("localhost","root","","kampus");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Mahasiswa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #74ebd5, #9face6); margin:0; padding:0; }
        h2,h3 { text-align:center; color:#fff; margin-top:20px; }
        .container { max-width:900px; margin:30px auto; padding:20px; }
        
        /* Form */
        form { background:#fff; padding:25px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.2); margin-bottom:30px; }
        form input, form select { width:100%; padding:12px; margin:10px 0; border:2px solid #ddd; border-radius:8px; transition:0.3s; font-size:14px; }
        form input:focus, form select:focus { border-color:#6a11cb; outline:none; box-shadow:0 0 6px rgba(106,17,203,0.4); }
        form button { width:100%; padding:12px; background:linear-gradient(135deg,#6a11cb,#2575fc); color:white; border:none; border-radius:8px; cursor:pointer; font-size:16px; font-weight:bold; transition:transform 0.2s, box-shadow 0.2s; }
        form button:hover { transform:translateY(-2px); box-shadow:0 6px 12px rgba(0,0,0,0.2); }

        /* Tombol tambah siswa */
        #btnTambahSiswa { 
            display:block; 
            margin:0 auto 20px auto; 
            padding:12px 20px; 
            background: linear-gradient(135deg,#9face6,#4418e4ff); 
            color:white; 
            border:none; 
            border-radius:8px; 
            cursor:pointer; 
            font-size:16px; 
            font-weight:bold; 
            transition: transform 0.2s, box-shadow 0.2s; 
        }
        #btnTambahSiswa:hover { transform:translateY(-2px); box-shadow:0 6px 12px rgba(0,0,0,0.2); }

        /* Tabel */
        table { width:100%; border-collapse:collapse; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 6px 15px rgba(0,0,0,0.2); }
        th,td { padding:12px; text-align:center; font-size:14px; }
        th { background:linear-gradient(135deg,#6a11cb,#2575fc); color:white; font-size:15px; }
        tr:nth-child(even) { background:#f9f9f9; }
        tr:hover { background:#f1f1f1; transition:0.3s; }

        /* Notifikasi */
        #notif { display:none; text-align:center; margin:20px auto; padding:12px; border-radius:8px; width:50%; font-weight:bold; background:#3f5be8; color:white; animation:slideDown 0.5s ease; }

        @keyframes slideDown { from {transform:translateY(-20px);opacity:0;} to {transform:translateY(0);opacity:1;} }

        /* Tombol action tabel */
        .btn-action { padding:6px 12px; border:none; border-radius:6px; cursor:pointer; margin:0 2px; color:white; font-size:13px; font-weight:bold; }
        .btn-edit { background:#f39c12; }
        .btn-edit:hover { background:#e67e22; }
        .btn-delete { background:#e74c3c; }
        .btn-delete:hover { background:#c0392b; }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Biodata Mahasiswa</h2>
    <div id="notif"></div>

    <!-- Form Mahasiswa -->
    <form id="formOrang">
    <input type="text" name="Nama" placeholder="Nama" required>
    <input type="number" name="Umur" placeholder="Umur" required>
    <select name="Jurusan" required>
        <option value="">-- Pilih Jurusan --</option>
        <?php
        $koneksi = new mysqli("localhost","root","","kampus");
        $jurusan = $koneksi->query("SELECT nama FROM jurusan1 ORDER BY nama ASC");
        while($j = $jurusan->fetch_assoc()){
            echo "<option value='".$j['nama']."'>".$j['nama']."</option>";
        }
        ?>
    </select>
    <button type="submit" id="btnSimpan">Simpan</button>
</form>

    <!-- Tombol Tambah Data Siswa -->
    <button id="btnTambahSiswa">➕ Tambah Data Siswa</button>

    <h3>List Mahasiswa</h3>
    <table id="tabelOrang">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Tombol Dashboard -->
<div style="text-align:center; margin:20px 0;">
    <a href="dashboard/dashboard.php">
        <button type="button" style="
            background: linear-gradient(135deg, #2749f3ff, #324ff5ff);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            cursor: pointer;
            font-weight: bold;
            font-size:16px;
            transition: transform 0.2s, box-shadow 0.2s;
        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.2)';"
           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
            Kembali Ke Dashboard
        </button>
    </a>
</div>
</div>



<script>
let editId = null;

// Tampilkan data dari tampil.php
function loadData() {
    $.get("tampil.php", function(data){
        $("#tabelOrang tbody").html(data);
    });
}
loadData();

// Tombol tambah siswa toggle form
$("#btnTambahSiswa").on("click", function(){
    $("#formOrang").slideToggle();
});

// Submit form
$("#formOrang").on("submit", function(e){
    e.preventDefault();
    let nama = $("input[name='Nama']").val();
    let umur = $("input[name='Umur']").val();
    let jurusan = $("select[name='Jurusan']").val(); 

    if(editId === null){
        $.post("simpan.php", { Nama:nama, Umur:umur, Jurusan:jurusan }, function(res){
            $("#notif").text("✅ "+res).fadeIn().delay(2000).fadeOut();
            $("#formOrang")[0].reset();
            loadData();
        });
    } else {
        $.post("ACTION/edit.php", { id:editId, Nama:nama, Umur:umur, Jurusan:jurusan }, function(res){
            $("#notif").text("✏️ "+res).fadeIn().delay(2000).fadeOut();
            $("#formOrang")[0].reset();
            $("#btnSimpan").text("Simpan");
            editId = null;
            loadData();
        });
    }
});

// Hapus data
function deleteData(id){
    if(confirm("Yakin mau hapus data ini?")){
        $.get("ACTION/delete.php?id="+id, function(res){
            $("#notif").text("🗑️ "+res).fadeIn().delay(2000).fadeOut();
            loadData();
        });
    }
}

// Edit data
function editData(id,nama,umur,jurusan){
    $("input[name='Nama']").val(nama);
    $("input[name='Umur']").val(umur);
    $("select[name='Jurusan']").val(jurusan);
    $("#btnSimpan").text("Update");
    editId = id;
}
</script>
</body>
</html>
