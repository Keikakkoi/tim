<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Query untuk mengambil data dari tabel Karyawan
$sql = "SELECT id_karyawan, nama_karyawan, jabatan, gaji, alamat, tanggal_masuk, email, no_telepon FROM karyawan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID Karyawan</th><th>Nama Karyawan</th><th>Jabatan</th><th>Gaji</th><th>Alamat</th><th>Tanggal Masuk</th><th>Email</th><th>No Telepon</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_Karyawan"]. "</td><td>" . $row["nama_karyawan"]. "</td><td>" . $row["model"]. "</td><td>" . $row["gaji"]. "</td><td>" . $row["alamat"]. "</td><td>" . $row["tanggal_masuk"]. "</td><td>" . $row["email"]. "</td><td>" . $row["no_telepon"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>