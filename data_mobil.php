<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Query untuk mengambil data dari tabel mobil
$sql = "SELECT id_mobil, merek, model, tahun, harga FROM mobil";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID Mobil</th><th>Merek</th><th>Model</th><th>Tahun</th><th>Harga</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id_mobil"]. "</td><td>" . $row["merek"]. "</td><td>" . $row["model"]. "</td><td>" . $row["tahun"]. "</td><td>" . $row["harga"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>