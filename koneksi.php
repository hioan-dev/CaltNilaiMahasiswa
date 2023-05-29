<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kampus';

try {
    $dsn = "mysql:host=$host;dbname=$database";
    $koneksi = new PDO($dsn, 'root', '');
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    exit();
}
?>
