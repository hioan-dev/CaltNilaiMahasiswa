<!DOCTYPE html>
<html>
<head>
    <title>Input Nilai Mahasiswa</title>
</head>
<body>
    <h2>Input Nilai Mahasiswa</h2>
    <form method="POST" action="proses.php">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nilai_tugas">Nilai Tugas:</label>
        <input type="number" id="nilai_tugas" name="nilai_tugas" min="0" max="100" required><br><br>

        <label for="nilai_uts">Nilai UTS:</label>
        <input type="number" id="nilai_uts" name="nilai_uts" min="0" max="100" required><br><br>

        <label for="nilai_uas">Nilai UAS:</label>
        <input type="number" id="nilai_uas" name="nilai_uas" min="0" max="100" required><br><br>

        <button type="submit">Proses</button>
    </form>
</body>
</html>
