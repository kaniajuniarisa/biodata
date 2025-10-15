<?php
$koneksi = new mysqli("localhost", "root", "", "kampus");
$data = $koneksi->query("SELECT * FROM mahasiswa1 ORDER BY id DESC");
$no = 1;

while($row = $data->fetch_assoc()){
    echo "
        <tr>
            <td>".$no++."</td>
            <td>".$row['Nama']."</td>
            <td>".$row['Umur']."</td>
            <td>".$row['Jurusan']."</td>
            <td>
                <button class='btn-edit' onclick=\"editData('".$row['id']."','".addslashes($row['Nama'])."','".$row['Umur']."','".addslashes($row['Jurusan'])."')\">✏️ Edit</button>
                <button class='btn-delete' onclick=\"deleteData('".$row['id']."')\">🗑️ Delete</button>
            </td>
        </tr>
    ";
}
?>
