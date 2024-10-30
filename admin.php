<?php
session_start();
if (!isset($_SESSION['purchases'])) {
    $_SESSION['purchases'] = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            transition: all 0.3s ease;
            position: relative;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .sidebar-header h2,
        .sidebar.collapsed ul li a span {
            display: none;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 20px;
            padding: 5px;
            z-index: 100;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            white-space: nowrap;
        }

        .sidebar ul li a i {
            min-width: 30px;
            text-align: center;
        }

        .sidebar ul li a span {
            margin-left: 10px;
            transition: opacity 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #495057;
        }

        .sidebar ul li a.active {
            background-color: #007bff;
        }

        .sidebar.collapsed ul li a {
            padding: 10px;
            justify-content: center;
        }

        .sidebar.collapsed ul li a i {
            margin-right: 0;
        }

        .sidebar.collapsed ul li {
            position: relative;
        }

        .sidebar.collapsed ul li:hover::after {
            content: attr(data-title);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background-color: #343a40;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            white-space: nowrap;
            z-index: 1000;
            margin-left: 10px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        header {
            margin-bottom: 20px;
        }

        header h1 {
            color: #495057;
        }

        .dashboard-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .card i {
            font-size: 30px;
            margin-right: 15px;
            color: #007bff;
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>Admin Dashboard</h2>
                <button id="toggleSidebar" class="toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <ul>
                <li data-title="Beranda">
                    <a href="index.php" class="active">
                        <i class="fas fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li data-title="Pembelian Mobil">
                    <a href="purchases.php">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Pembelian Mobil</span>
                    </a>
                </li>
                <li data-title="Produk">
                    <a href="products.php">
                        <i class="fas fa-car"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li data-title="Pesanan">
                    <a href="orders.php">
                        <i class="fas fa-file-invoice"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li data-title="Laporan">
                    <a href="reports.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>
        </aside>
        <main class="main-content">
            <header>
                <h1>Selamat Datang di Dashboard Admin</h1>
            </header>
            <div class="dashboard-cards">
                <div class="card">
                    <i class="fas fa-users"></i>
                    <div>
                        <h3>Total Pelanggan</h3>
                        <p>150</p>
                    </div>
                </div>
                <div class="card">
                    <i class="fas fa-car"></i>
                    <div>
                        <h3>Total Mobil</h3>
                        <p>75</p>
                    </div>
                </div>
                <div class="card">
                    <i class="fas fa-shopping-cart"></i>
                    <div>
                        <h3>Total Pembelian</h3>
                        <p>200</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                
                // Menyimpan state sidebar ke localStorage
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            });

             // Mengecek state sidebar dari localStorage saat halaman dimuat
             const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (sidebarCollapsed) {
                sidebar.classList.add('collapsed');
            }
        });
    </script>
</body>
</html>