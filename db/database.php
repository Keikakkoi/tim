<?php
// database_connection.php

$host = 'localhost';
$db   = 'car_sales_db';
$user = 'root';
$pass = ''; // Sesuaikan dengan password MySQL Anda jika ada
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function getDashboardData($pdo) {
    $data = [];
    
    // Total penjualan
    $stmt = $pdo->query('SELECT SUM(price) as total_sales FROM sales');
    $data['total_sales'] = $stmt->fetch()['total_sales'];

    // Mobil terjual
    $stmt = $pdo->query('SELECT COUNT(*) as cars_sold FROM sales');
    $data['cars_sold'] = $stmt->fetch()['cars_sold'];

    // Pelanggan baru (misalnya, dalam 30 hari terakhir)
    $stmt = $pdo->query('SELECT COUNT(*) as new_customers FROM customers WHERE id IN (SELECT DISTINCT customer_id FROM sales WHERE date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))');
    $data['new_customers'] = $stmt->fetch()['new_customers'];

    // Data penjualan untuk grafik (6 bulan terakhir)
    $stmt = $pdo->query('SELECT DATE_FORMAT(date, "%Y-%m") as month, SUM(price) as total 
                         FROM sales 
                         WHERE date >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
                         GROUP BY month
                         ORDER BY month');
    $data['sales_chart'] = $stmt->fetchAll();

    return $data;
}

function getInventory($pdo) {
    $stmt = $pdo->query('SELECT * FROM inventory');
    return $stmt->fetchAll();
}

function getSales($pdo) {
    $stmt = $pdo->query('SELECT s.id, s.date, c.name as customer, CONCAT(i.brand, " ", i.model) as car, s.price 
                         FROM sales s
                         JOIN customers c ON s.customer_id = c.id
                         JOIN inventory i ON s.inventory_id = i.id
                         ORDER BY s.date DESC');
    return $stmt->fetchAll();
}

function getCustomers($pdo) {
    $stmt = $pdo->query('SELECT * FROM customers');
    return $stmt->fetchAll();
}

// Endpoint untuk mengambil data
if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    switch ($_GET['action']) {
        case 'dashboard':
            echo json_encode(getDashboardData($pdo));
            break;
        case 'inventory':
            echo json_encode(getInventory($pdo));
            break;
        case 'sales':
            echo json_encode(getSales($pdo));
            break;
        case 'customers':
            echo json_encode(getCustomers($pdo));
            break;
        default:
            echo json_encode(['error' => 'Invalid action']);
    }
    exit;
}
?>