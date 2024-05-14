<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$sql_delete_references = "DELETE FROM log_hitung WHERE id_user = '$_SESSION[id_user]'";
if ($conn->query($sql_delete_references) === TRUE) {
    // Langkah 2: Hapus akun dari tabel utama
    $sql_delete_user = "DELETE FROM user WHERE id_user = 'id_user'";

    if ($conn->query($sql_delete_user) === TRUE) {
        // Hapus sesi dan redirect ke halaman login
        session_destroy();
        header("Location: welcome.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "Error deleting references: " . $conn->error;
}

$conn->close();
?>