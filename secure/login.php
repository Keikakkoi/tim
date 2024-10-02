<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Contoh username dan password sederhana (ganti dengan verifikasi dari database)
    $valid_username = 'admin';
    $valid_password = 'password123';

    if ($username === $valid_username && password_verify($password, password_hash($valid_password, PASSWORD_DEFAULT))) {
        $_SESSION['loggedin'] = true;
        header('Location: admin-dashboard.php');
    } else {
        echo "Username atau password salah!";
    }
}
?>
