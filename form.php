<?php
session_start();
if (!isset($_SESSION['purchases'])) {
    $_SESSION['purchases'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $purchase = [
        'nama_mobil' => $_POST['nama_mobil'],
        'jumlah_mobil' => $_POST['jumlah_mobil'],
        'nama_pembeli' => $_POST['nama_pembeli'],
        'alamat' => $_POST['alamat'],
        'nomor_telepon' => $_POST['nomor_telepon'],
        'email' => $_POST['email'],
        'total_harga' => $_POST['total_harga'],
        'bukti_transfer' => $_FILES['bukti_transfer']['name']
    ];

    // Simpan bukti transfer
    move_uploaded_file($_FILES['bukti_transfer']['tmp_name'], 'uploads/' . $_FILES['bukti_transfer']['name']);
    $_SESSION['purchases'][] = $purchase;
    
    // Redirect ke halaman output setelah submit
    header('Location: output.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/formpembelian.css">
    <title>Form Pembelian Mobil</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Form Pembelian Mobil</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="nama_mobil" placeholder="Nama Mobil" required>
                <input type="number" name="jumlah_mobil" placeholder="Jumlah Mobil" required>
                <input type="text" name="nama_pembeli" placeholder="Nama Pembeli" required>
                <input type="text" name="alamat" placeholder="Alamat" required>
                <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="number" name="total_harga" placeholder="Total Harga" required>
                <input type="file" name="bukti_transfer" required>
                <button type="submit">Kirim</button>
            </form>
            <p><a href="output.php">Lihat Daftar Pembelian</a></p>
        </div>
    </div>
</body>
</html>