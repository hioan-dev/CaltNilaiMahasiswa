<?php
require_once 'koneksi.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Ambil data mahasiswa berdasarkan nim
    $query = "SELECT * FROM pemrogramanWeb4TIA WHERE nim = :nim";
    $stmt = $koneksi->prepare($query);
    $stmt->bindParam(':nim', $nim);
    $stmt->execute();

    $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($mahasiswa) {
        ?>
        <h2>Update Nilai Mahasiswa</h2>
        <form method="POST" action="proses.php">
            <input type="hidden" name="nim" value="<?php echo $mahasiswa['nim']; ?>">

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $mahasiswa['nama']; ?>" required><br><br>

            <label for="nilai_tugas">Nilai Tugas:</label>
            <input type="number" id="nilai_tugas" name="nilai_tugas" value="<?php echo $mahasiswa['nilai_tugas']; ?>" min="0" max="100" required><br><br>

            <label for="nilai_uts">Nilai UTS:</label>
            <input type="number" id="nilai_uts" name="nilai_uts" value="<?php echo $mahasiswa['nilai_uts']; ?>" min="0" max="100" required><br><br>

            <label for="nilai_uas">Nilai UAS:</label>
            <input type="number" id="nilai_uas" name="nilai_uas" value="<?php echo $mahasiswa['nilai_uas']; ?>" min="0" max="100" required><br><br>

            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "Mahasiswa dengan NIM $nim tidak ditemukan.";
    }
} else {
    echo "NIM mahasiswa tidak diberikan.";
}
?>
