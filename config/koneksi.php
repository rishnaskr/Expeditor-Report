<?php
// Konfigurasi database
$host = "151.106.97.20";
$username = "u349600776_reeshdev";
$password = "Hostinger123!";
$database = "u349600776_reeshdev";

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

