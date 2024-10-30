<?php
session_start();
if (!isset($_SESSION['purchases'])) {
    $_SESSION['purchases'] = [];
}

if (isset($_GET['hapus'])) {
    unset($_SESSION['purchases'][$_GET['hapus']]);
    $_SESSION['purchases'] = array_values($_SESSION['purchases']); // Reindex array
    header('Location: output.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian Mobil</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
}

.output-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 800px;
}

h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #007BFF;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="output-container">
            <h2>Daftar Pembelian</h2>
            <table>
                <tr>
                    <th>Nama Mobil</th>
                    <th>Jumlah</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Total Harga</th>
                    <th>Bukti Transfer</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($_SESSION['purchases'] as $index => $purchase): ?>
                <tr>
                    <td><?php echo htmlspecialchars($purchase['nama_mobil']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['jumlah_mobil']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['nama_pembeli']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['nomor_telepon']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['email']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['total_harga']); ?></td>
                    <td><a href="uploads/<?php echo htmlspecialchars($purchase['bukti_transfer']); ?>" target="_blank">Lihat</a></td>
                    <td><a href="?hapus=<?php echo $index; ?>">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><a href="form.php">Kembali ke Form Pembelian</a></p>
        </div>
    </div>
</body>
</html>