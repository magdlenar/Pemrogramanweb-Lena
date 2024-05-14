<?php
include "koneksi.php";
if (isset($_POST['submit'])){
    $id_user = $_POST['id_user'];
    $email = $_POST['email'];
    $namauser = $_POST['namauser'];
    $password = $_POST['password'];
    $passwordenc=md5("Aplikasi".md5($password));
        $insert = "insert into user(id_user,email,namauser,password) values ('$id_user','$email','$namauser','$passwordenc')";
        
        $query = mysqli_query($conn, $insert);
        if($query){
            ?>
            <script>
            alert('Registrasi berhasil');
            </script>
            <?php
        }else{
            ?>
                <script>
                    alert('Registrasi gagal');
                </script>
                <?php  
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css "
    />
    <link rel="stylesheet" href="style.css" media="screen" title="no title" />
    <title>Register</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'];?>" name="formulir" method="post" enctype="multipart/form-data">
<div class="input">
      <h1>REGISTER</h1>
      <div class="box-input">
        <i class="fas fa-user"></i>
        <input type="text" name="id_user" placeholder="Id User" required/>
      </div>
      <div class="box-input">
        <i class="fas fa-address-book"></i>
        <input type="text" name="namauser" placeholder="Name" required/>
      </div>
      <div class="box-input">
        <i class="fas fa-envelope-open-text"></i>
        <input type="email" name="email" placeholder="Email" required/>
      </div>
      <div class="box-input">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required/>
      </div>
      <button type="submit" name="submit" class="btn-input">Register</button>
      <div class="button">
        <p>
          Sudah punya akun?
          <a href="login.php">Login disini</a>
        </p>
      </div>
    </div>
</form>
        </body>
</html>
