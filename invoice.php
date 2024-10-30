<?php
session_start();
if (!isset($_SESSION['purchases'])) {
    $_SESSION['purchases'] = [];
}

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    $purchase = $_SESSION['purchases'][$index];
} else {
    die('Pembelian tidak ditemukan.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembelian Mobil</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice { margin: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="invoice">
        <h1>Invoice Pembelian Mobil</h1>
        <table>
            <tr>
                <th>Nama Mobil</th>
                <td><?php echo htmlspecialchars($purchase['nama_mobil']); ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?php echo htmlspecialchars($purchase['jumlah_mobil']); ?></td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td><?php echo htmlspecialchars($purchase['nama_pembeli']); ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo htmlspecialchars($purchase['alamat']); ?></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td><?php echo htmlspecialchars($purchase['nomor_telepon']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($purchase['email']); ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><?php echo htmlspecialchars($purchase['total_harga']); ?></td>
            </tr>
        </table>
        <a href="javascript:window.print()">Cetak Invoice</a>
    </div>
</body>
</html> 