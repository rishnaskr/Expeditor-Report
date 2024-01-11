<?php
$server = "151.106.97.204";
$user = "u349600776_reeshdev";
$pass = "Hostinger123!";
$database = "u349600776_reeshdev";
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
