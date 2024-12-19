<?php
$servername = "localhost"; // atau gunakan 127.0.0.1
$username = "root"; // Default user MySQL
$password = ""; // Default password kosong untuk XAMPP
$dbname = "mainphp"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = mysqli_connect("localhost", "root", "", "mainphp");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
