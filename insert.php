<?php
    include "koneksi.php";
    if(isset($_POST['input'])){
        $id=$_POST['id_user'];
        $email=$_POST['email'];
        $namauser=$_POST['namauser'];
        $password=$_POST['password'];
        
        $insert="insert into user(id_user,email,namauser,password) 
        values('$id','$email','$namauser','$password')";
        $query=mysqli_query($conn, $insert);
        if($query){
            ?>
            <script>alert('Data berhasil ditambahkan!');
            document.location='view.php';
            </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
           body{
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #ff6c00, #ffc100);

           } 
           .container {
            max-width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            }
            .input-container {
            margin-bottom: 20px;
            }

            .judul {
            display: block;
            margin-bottom: 0;
            }
            h1 {
            text-align: center;
            margin-bottom: 20px;
            }
            .submit{
                background-color: red;
                color:white;
                border:2px solid white;

            }
            .submit:hover{
                background-color: yellow;
                color: black;
                box-shadow: 1px 1px white;
                border-color: yellow;
            }

            </style>
<body>

<form action='<?php $_SERVER['PHP_SELF']?>' name='insert' method='post' enctype='multipart/form-data'>
<table align='center' class="container">
    <tr>
        
        <td colspan="2"><h1>LOGIN</h1></td>
        
        </tr>
        <tr>
            <td class="judul">ID user</td>
            <td>
                <input type='text' name='id_user'/>
            </td>
        </tr>
        <tr>
            
        <tr>
            <td class="judul">Email</td>
            <td>
                <input type='email' name='email'/>
            </td>
        </tr>
        <td class="judul">Nama</td>
            <td>
                <input type='text' name='namauser'/>
            </td>
        </tr>
        <tr class="input-container">
            <td class="judul">Password</td>
            <td>
                <input name='password' id='password'/>
            </td>
        </tr>
        <tr>
        <td></td>
            <td>
            <input class="submit" type='submit' name='input' value='submit'/>
            </td>
        </tr>
</table>
</form>
</body>