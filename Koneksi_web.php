<?php
// Mengatur data koneksi
$host = "localhost"; //Alamat server MySQL (biasanya localhost)
$user = "root"; // Username MySQL (default: root)
$pass = ""; // Password MySQL (default: kosong)
$dbname = "Kelas E Malam"; // Nama Database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

// cek apakah koneksi berhasil
if (!$conn) {
    die("koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil";
?>