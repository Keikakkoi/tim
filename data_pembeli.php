<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Query untuk mengambil data dari tabel pembeli
$sql = "SELECT id_pembeli, nama_pembeli, alamat, email, no_telepon FROM pembeli";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID Pembeli</th><th>Nama Pembeli</th><th>Alamat</th><th>Email</th><th>No Telepon</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_pembeli"]. "</td><td>" . $row["nama_pembeli"]. "</td><td>" . $row["alamat"]. "</td><td>" . $row["email"]. "</td><td>" . $row["no_telepon"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>