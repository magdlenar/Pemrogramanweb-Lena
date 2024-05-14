<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['id_user'])) {
  header('Location: view.php');
  exit();
}

if (isset($_POST['login'])) {
 $id_user = mysqli_real_escape_string($conn, $_POST['id_user']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);
 $passwordenc=md5("Aplikasi".md5($password));
 $sql = "select * from user where id_user='$id_user' and password='$passwordenc' ";
    
 $query = mysqli_query($conn, $sql);
	$hasil = mysqli_fetch_array($query);
 	if($hasil['id_user']==$id_user){
    $_SESSION['id_user']=$hasil['id_user'];
    $_SESSION['password']=$hasil['password'];
    header("Location:welcome.php");
 }else{
    header("Location:login.php");
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
    <title>Login</title>
  </head>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>" name="formulir" method="post" enctype="multipart/form-data">
    <div class="input">
      <h1>LOGIN</h1>
      <div class="box-input">
        <i class="fas fa-envelope-open-text"></i>
        <input type="text" name="id_user" placeholder="Id User" required/>
      </div>
      <div class="box-input">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required/>
      </div>
      <button type="submit" name="login" class="btn-input">Login</button>
      <div class="button">
        <p>
          Belum punya akun?
          <a href="register.php">Register disini</a>
        </p>
      </div>
    </div>
    </form>
</body>
</html>