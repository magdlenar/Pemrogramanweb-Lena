<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];

if (isset($_POST['submit'])) {
    
    $namauser = $_POST['namauser'];
    $email = $_POST['email'];

    
    $update_query = "UPDATE user SET namauser='$namauser', email='$email' WHERE id_user='$id_user'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        ?>
        <script>
            alert('Update berhasil');
        </script>
        <?php
        header("Location: view.php");
    } else {
        ?>
        <script>
            alert('Update gagal');
        </script>
        <?php
    }
}

$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = mysqli_query($conn, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css "
    />
    <link rel="stylesheet" href="styleupdate.css" media="screen" title="no title" />
    <title>Update</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>" name="formulir" method="post" enctype="multipart/form-data">
        <div class="input">
            <h1>UPDATE ACCOUNT</h1>
            <div class="id">
                <input type="text" name="id_user" value="<?php echo $user['id_user']; ?>" readonly />
            </div>
            <div class="Nama">
                <input type="text" name="namauser" value="<?php echo $user['namauser']; ?>" required />
            </div>
            <div class="email">
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required />
            </div>
            
            <button type="submit" name="submit" class="btn-input">Update</button>
        </div>
    </form>
</body>
</html>
