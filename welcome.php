<?php
session_start();
include "koneksi.php";
$id_user=$_SESSION['id_user'];
$passwordenc=$_SESSION['password'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Kaloriku</title>
    <link rel="stylesheet" href="branda.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
  <body>
    <header>
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
    </header>

    <section>
      <div class="content">
        <h2>Hitung Kalori</h2>
        <span>Apakah anda sudah mengetahui kebutuhan kalori harian anda?</span>
        <p>
          Mengetahui jumlah kalori makanan yang dikonsumsi dan memahami cara
          menghitung kalori merupakan hal penting bagi kebutuhan tubuh loh!
        </p>
        <a href="lengkapi.php" class="btn">Cek Kalori Yuk!</a>
      </div>
    </section>
  </body>
</html>

  </body>
</html