<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <!-- Dashboard HTML di sini -->
  </head>
  <body>
    <h1>Selamat datang di Dashboard Admin</h1>
    <p>Ini hanya bisa dilihat oleh admin.</p>
  </body>
</html>
