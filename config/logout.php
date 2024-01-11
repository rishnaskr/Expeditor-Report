<?php
// Mulai sesi (pastikan ini ditempatkan di awal file)
session_start();

// Cek apakah pengguna sudah login
if(isset($_SESSION['username'])) {
    // Hapus semua variabel sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Redirect atau lakukan tindakan lain setelah logout
    header("Location: ../login.php");
    exit();
} else {
    // Pengguna tidak login, lakukan sesuatu (mungkin mengarahkan ke halaman login)
    header("Location: ../login.php");
    exit();
}
?>