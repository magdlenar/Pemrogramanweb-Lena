<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
  }

  $id_user = $_SESSION['id_user'];

$query = "SELECT * FROM log_hitung
          INNER JOIN user ON log_hitung.id_user = user.id_user WHERE user.id_user =  '$_SESSION[id_user]'";
$result = mysqli_query($conn, $query);
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
  $delete_query = "DELETE FROM log_hitung WHERE id_log = '$delete_id'";
  mysqli_query($conn, $delete_query);
  header('Location: view.php'); 
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>History</title>
    <link rel="stylesheet" href="akun.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
</head>
<body>
<div class="header">
      <input type="checkbox" id="chek" />
      <label for="chek" class="fas fa-bars"></label>
      <h1 class="logo">Kalori<span>Ku</span></h1>
      <nav>
        <a href="welcome.php">Beranda</a>
        <a href="lengkapi.php">Cek Kalori</a>
        <a href="view.php">History</a>
        <a href="menu.php">Saran Menu</a>
        <a href="aktivitas.php">Aktivitas</a>
      </nav>
      <div class="icon">
      <a href="updateakun.php" class="fa-sharp fa-solid fa-circle-user"> </a>
      <a class="fa-solid fa-circle-xmark" href="delete.php"></a>
      <a href="logout.php" class="fa-solid fa-door-closed"></a> 
      </div>
    </div>
    <div id="box1">
      <h1>HISTORY KALORI</h1>
   
        <table>
          <style>
              #box1 {
            width: 1100px;
            height: 1800px;
            border-radius: solid 2px;
            background-color: #ffe5ec;
            justify-content: center;
            margin-top: 80px;
            margin-bottom: 50px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont,
              "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans",
              "Helvetica Neue", sans-serif;
            color: #827f3a;
            padding: 35px;
            position: relative;
            text-align: center;
            margin-left: 150px;
            font-size: large;
          }
          * {
            margin: 0;
            padding: 0;

            box-sizing: border-box;
            font-family: sans-serif;
          }
          body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: center;
          }
  th {padding: 10px;
    color: white;
    
  }
  tr{
    background: #e84393;
  }
  td{
    padding: 10px;
    
    background-color: white;
  }

  table {
    padding-top: 30px;
    width: 500px;
    border-color: white;
    
  }
  
  
            </style>
            <center>
            <table>
    <tr>
        <th>ID User</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>Berat Badan</th>
        <th>Tinggi Badan</th>
        <th>Kalori per Hari</th>
        <th>Jenis Aktivitas</th>
        <th>Waktu</th>
        
        

    </tr>
    
    

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
  
        echo "<tr>";
        echo "<td>" . $row['id_user'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['usia'] . "</td>";
        echo "<td>" . $row['jk'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['berat_badan'] . "</td>";
        echo "<td>" . $row['tinggi_badan'] . "</td>";
        echo "<td>" . $row['hasil'] . "</td>";
        echo "<td>" . $row['level_aktivitas'] . "</td>";
        echo "<td>" . $row['id_log'] . "</td>";
        echo "<td><a href='view.php?delete_id=" . $row['id_log'] . "' onClick=\"return confirm('Yakin Ingin Menghapus ?')\">Delete</a></td>";

        echo "</tr>";
        
    }
    ?>
  

</table>
  </center>
    
</div>
</body>
</html>
