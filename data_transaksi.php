<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Query untuk mengambil data dari tabel transaksi
$sql = "SELECT id_transaksi, tanggal_transaksi, jumlah_bayar, metode_pembayaran, id_penjualan FROM transaksi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID Transaksi</th><th>Tanggal Transaksi</th><th>Jumlah Bayar</th><th>Metode Pembayaran</th><th>ID Penjualan</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_transaksi"]. "</td><td>" . $row["id_penjualan"]. "</td><td>" . $row["tanggal_transaksi"]. "</td><td>" . $row["jumlah_bayar"]. "</td><td>" . $row["metode_pembayaran"]. "</td><td>" . $row["id_penjualan"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>