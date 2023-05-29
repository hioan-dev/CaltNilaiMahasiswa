<?php
require_once 'koneksi.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Delete data mahasiswa berdasarkan nim
    $query = "DELETE FROM pemrogramanWeb4TIA WHERE nim = :nim";
    $stmt = $koneksi->prepare($query);
    $stmt->bindParam(':nim', $nim);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "Data mahasiswa dengan NIM $nim berhasil dihapus.";
        // Redirect to index.php
        header('Location: index.php');
    } else {
        echo "Gagal menghapus data mahasiswa dengan NIM $nim.";
    }
} else {
    echo "NIM mahasiswa tidak diberikan.";
}
?>
