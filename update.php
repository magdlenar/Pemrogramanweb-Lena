<?php
include "koneksi.php";
$id1=$_GET['id_user'];
if(isset($_POST['update'])){
        $id=$_POST['id_user'];
        $email=$_POST['email'];
        $namauser=$_POST['namauser'];
        $password=$_POST['password'];
            $update="update user set id_user='$id',email='$email',namauser='$namauser',password='$password' where id_user='$id1' ";

        $query=mysqli_query($conn, $update);  
        if($query){
            ?>
            <script>alert('Data berhasil diubah!');
            document.location='view.php';
            </script>
            <?php
        }
}


$row=mysqli_fetch_array(mysqli_query($conn,"select * from user where id_user='$id1'"));
if($row['id_user']!=""){
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title></title>
            <style>
                body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background: linear-gradient(45deg, white, #ffc100);
           } 
            .container{
                max-width: 300px;
                margin: 100px auto;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.5);
                border-radius: 10px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
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
    <form action='<?php $_SERVER['PHP_SELF']?>' name='update' method='post' enctype='multipart/form-data'>
    <table align='center' class="container">
        <tr>
            <td>ID User</td>
            <td>
                <input type='text' name='id_user' value='<?php echo $row['id_user'];?>'/>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type='email' name='email' value='<?php echo $row['email'];?>'/>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>
                <input type='text' name='namauser' value='<?php echo $row['namauser'];?>'/>
            </td>
        </tr>
        <tr>
        <td></td>
            <td>
            <input class="submit" type='submit' name='update' value='Ubah Data'/>
            </td>
        </tr>
    </table>

</form>
    <?php
}
?>
</body>
</html>
