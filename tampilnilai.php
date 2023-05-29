<?php
require_once 'koneksi.php';

$query = "SELECT nim, nama, nilai_tugas, nilai_uts, nilai_uas, nilai_akhir, nilai_huruf FROM pemrogramanWeb4TIA";
$result = $koneksi->query($query);

if ($result && $result->rowCount() > 0) {
    echo "<h2>Daftar Nilai Mahasiswa</h2>";
    echo "<table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Nilai Huruf</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $nim = $row['nim'];
        $nama = $row['nama'];
        $nilaiTugas = $row['nilai_tugas'];
        $nilaiUTS = $row['nilai_uts'];
        $nilaiUAS = $row['nilai_uas'];
        $nilaiAkhir = $row['nilai_akhir'];
        $nilaiHuruf = $row['nilai_huruf'];

        echo "<tr>
                <td>$nim</td>
                <td>$nama</td>
                <td>$nilaiTugas</td>
                <td>$nilaiUTS</td>
                <td>$nilaiUAS</td>
                <td>$nilaiAkhir</td>
                <td>$nilaiHuruf</td>
                <td><a href='update.php?nim=$nim'>Update</a></td>
                <td><a href='delete.php?nim=$nim'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data nilai mahasiswa.";
}
?>
