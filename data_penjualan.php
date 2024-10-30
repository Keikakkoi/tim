<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Query untuk mengambil data dari tabel penjualan
$sql = "SELECT id_penjualan, tanggal_penjualan, total_harga, tahun, harga FROM penjualan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID Penjualan</th><th>Tanggal Penjualan</th><th>Total Harga</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_penjualan"]. "</td><td>" . $row["tanggal_penjualan"]. "</td><td>" . $row["total_harga"]. "</td><td>" . $row["id_mobil"]. "</td><td>" . $row["id_pembeli"]. "</td><td>" . $row["id_karyawan"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>