<?php
require_once 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$nilaiTugas = $_POST['nilai_tugas'];
$nilaiUTS = $_POST['nilai_uts'];
$nilaiUAS = $_POST['nilai_uas'];

$nilaiAkhir = 0.4 * $nilaiTugas + 0.3 * $nilaiUTS + 0.3 * $nilaiUAS;

if ($nilaiAkhir >= 90) {
    $nilaiHuruf = 'A';
} elseif ($nilaiAkhir >= 80) {
    $nilaiHuruf = 'B';
} elseif ($nilaiAkhir >= 70) {
    $nilaiHuruf = 'C';
} elseif ($nilaiAkhir >= 60) {
    $nilaiHuruf = 'D';
} else {
    $nilaiHuruf = 'E';
}

// Check if record with the same primary key (nim) already exists
$checkQuery = "SELECT COUNT(*) FROM pemrogramanWeb4TIA WHERE nim = :nim";
$checkStmt = $koneksi->prepare($checkQuery);
$checkStmt->bindParam(':nim', $nim);
$checkStmt->execute();

if ($checkStmt->fetchColumn()) {
    // If record exists, update the existing record
    $updateQuery = "UPDATE pemrogramanWeb4TIA SET nama = :nama, nilai_tugas = :nilaiTugas, nilai_uts = :nilaiUTS, nilai_uas = :nilaiUAS, nilai_akhir = :nilaiAkhir, nilai_huruf = :nilaiHuruf WHERE nim = :nim";
    $stmt = $koneksi->prepare($updateQuery);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nilaiTugas', $nilaiTugas);
    $stmt->bindParam(':nilaiUTS', $nilaiUTS);
    $stmt->bindParam(':nilaiUAS', $nilaiUAS);
    $stmt->bindParam(':nilaiAkhir', $nilaiAkhir);
    $stmt->bindParam(':nilaiHuruf', $nilaiHuruf);
    $stmt->bindParam(':nim', $nim);
} else {
    // If record doesn't exist, insert a new record
    $insertQuery = "INSERT INTO pemrogramanWeb4TIA (nim, nama, nilai_tugas, nilai_uts, nilai_uas, nilai_akhir, nilai_huruf) 
                    VALUES (:nim, :nama, :nilaiTugas, :nilaiUTS, :nilaiUAS, :nilaiAkhir, :nilaiHuruf)";
    $stmt = $koneksi->prepare($insertQuery);
    $stmt->bindParam(':nim', $nim);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nilaiTugas', $nilaiTugas);
    $stmt->bindParam(':nilaiUTS', $nilaiUTS);
    $stmt->bindParam(':nilaiUAS', $nilaiUAS);
    $stmt->bindParam(':nilaiAkhir', $nilaiAkhir);
    $stmt->bindParam(':nilaiHuruf', $nilaiHuruf);
}

if ($stmt->execute()) {
    echo "Data nilai mahasiswa berhasil disimpan.";
    // Button Lihat nilai mahasiswa
    echo "<br><br><a href='tampilnilai.php'>Lihat Nilai Mahasiswa</a>";
} else {
    echo "Gagal menyimpan data nilai mahasiswa.";
}
?>
