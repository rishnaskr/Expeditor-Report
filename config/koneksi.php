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

// Fungsi untuk membersihkan input
function bersihkanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Memeriksa apakah form login sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = bersihkanInput($_POST["username"]);
    $password = bersihkanInput($_POST["password"]);

    // Mengecek keberadaan username dalam database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Username ditemukan, memeriksa password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password benar, login berhasil
            echo "Login berhasil!";
        } else {
            // Password salah, menampilkan notifikasi
            echo "Password salah!";
        }
    } else {
        // Username tidak ditemukan, menampilkan notifikasi
        echo "Pengguna tidak ditemukan!";
    }
}

// Menutup koneksi ke database
$koneksi->close();
?>