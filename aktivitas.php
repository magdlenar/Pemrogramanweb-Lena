<?php

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aktivitas</title>
    <link rel="stylesheet" href="akun.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
    <body>
      <div>
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
      <main class="table">
        <style>
          #box1 {
            width: 650px;
            height: 600px;
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
          th {padding: 20px;
    color: white;
    
  }
  tr{
    background: #e84393;
  }
  td{
    padding: 20px;
    
    background-color: white;
  }

  table {
    margin-bottom: 20px;
    padding-top: 30px;
    width: 580px;
    border-color: white;
    
  }
        </style>
      
          <h1>Aktivitas</h1>
        <table>
            <tr>
              <th>Aktivitas</th>
              <th>Durasi</th>
              <th>Kalori</th>
            </tr>
          
        <?php
        $sql = "select * from aktivitas order by nama_aktivitas asc";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            echo " 
            <tr> 
                <td>$row[nama_aktivitas]</td>
                <td>$row[durasi]</td>
                <td>$row[kalori]</td>
                
            </tr>
            
            ";
        }
        ?>
        </table>
</center>
      </body>
      </html>