
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['id_user'])) {
  header("Location: login.php");
  exit();
}

$id_user = $_SESSION['id_user'];
$sql = "DELETE FROM user WHERE id_user = $id_user";

if ($conn->query($sql) === TRUE) {
    echo "Akun berhasil dihapus";
    header('Location: login.php');
} else {
    echo "Error: " . $conn->error;
}


$conn->close();
?>