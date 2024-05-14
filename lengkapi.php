<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: lengkapi.php");
    exit();
}

$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="kalku.css" />
    <link
      rel="stylesheet"
      href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <title>Bismillah Kalkulator</title>
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
      </div>
<section>
<div id="box1">
            <div >
              <div class="container">
                <p>
                  <style>
                    input {
                      margin: 3px 0;
                    }

                    .button.color1 {
                      text-transform: uppercase;
                    }
                  </style>
                </p>

                <div class="calculator-holder">
                  <div>
                    <h1 align="center">
                      <b>Hitung kebutuhan kalori harian anda</b>
                    </h1>
    <form action="" name="formulir" method="post" enctype="multipart/form-data">
        <div class="form">
            <div class="tinggi">
                <input type="datetime-local" name="id_log" placeholder="Time" required/>
            </div>
                  </div>
                  <div class="form-row">
            <div class="col">
                <input type="text" name="nama" placeholder="Nama" required/>
            </div>
            </div>
                  <div class="form-row">
            <div class="col">
                <input type="text" name="usia" placeholder="Umur" required/>
            </div>
            </div>
            <div class="form-row">
            <div class="tinggi">
                <input type="text" name="tinggi_badan" placeholder="Tinggi Badan" required/>
            </div>
                  </div>
                  <div class="form-row">
            <div class="berat">
                <input type="text" name="berat_badan" placeholder="Berat Badan" required/>
            </div>
                  </div>
                  <div class="row">
            <div class="jk">
                <label>Jenis Kelamin</label><br>
                <select name="jk" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                  </select>
            </div>
                  </div>
            <div class="row">
            <div class="aktivitas">
                <label>Aktivitas:</label>
                <select name="level_aktivitas" required>
                        <option value="">Pilih aktivitas harian </option>
                        <option value="1.2">SMinimal, Suka Rebahan</option>
                        <option value="1.375">Aktivitas ringan, Olahraga 1-3 kali/minggu</option>
                        <option value="1.55">Aktivitas menengah, olahraga 3-5 kali/minggu</option>
                        <option value="1.725">Aktivitas berat, olahraga 6-7 kali/minggu</option>
                        <option value="1.9">Pekerja fisik, olahraga 2 kali/hari</option>
                </select>
            </div>
                  </div>
                  <div class="button">
                    <input type="submit" name="submit" class="button" onclick="hitungKalori()" value="Hitung"/>
                  </div>
                  <div
                      class="notif"
                      style="
                        border-radius: 8px;
                        background: #fff;
                        padding: 4px;
                        text-align: center;
                        box-shadow: 2px 2px 4px #cc9c91 inset;
                      "
                    >
                      <div class="notifi">
                        <span class="notifiksasi">
                          <span></span>
                        </span>
                        <span class="notification-text"> <?php
                        if (isset($_POST['submit'])) {
                          $id_log = $_POST['id_log'];
                          $usia = $_POST['usia'];
                          $tinggi_badan = $_POST['tinggi_badan'];
                          $berat_badan = $_POST['berat_badan'];
                          $jk = $_POST['jk'];
                          $level_aktivitas = $_POST['level_aktivitas'];
                          $nama = $_POST['nama'];
                         
                          $hasil = hitungKalori($usia, $tinggi_badan, $berat_badan, $jk, $level_aktivitas);
                          $insert_query = "INSERT INTO log_hitung (id_log, id_user, usia, tinggi_badan, berat_badan, jk, hasil, level_aktivitas, nama)
                                          VALUES ('$id_log','$id_user', '$usia', '$tinggi_badan', '$berat_badan', '$jk', '$hasil','$level_aktivitas', '$nama')";
                          $insert_result = mysqli_query($conn, $insert_query);
                      
                          if ($insert_result) {
                            ?>
                            <script>
                                alert('Data berhasil disimpan');
                            </script>
                            <?php
                            echo "<p> Kebutuhan kalori harian kamu adalah $hasil kkal/hari. Selamat berat badan kamu ideal. Jika kamu ingin mempertahankan berat badan kamu ! kamu membutuhkan $hasil kkal/hari.  </p>";
                        } else {
                            ?>
                            <script>
                                alert('Gagal menyimpan data');
                            </script>
                            <?php
                        }
                      }
                      
                      
                      function hitungKalori($usia, $tinggi_badan, $berat_badan, $jk, $level_aktivitas) {
                        
                        $bmr = ($jk === "Laki-laki") ? 10 * $berat_badan + 6.25 * $tinggi_badan - 5 * $usia + 5 : 10 * $berat_badan + 6.25 * $tinggi_badan - 5 * $usia - 161;
                        
                        
                        $totalCalories = round($bmr * $level_aktivitas);
                      
                        return $totalCalories;
                      }
                        ?></span>
                        <a href="#" class="notification-close"></a>
                      </div>
                    </div>
                  </div>

            </div>
              </div>
            <div class="jenis">
                <h2>Jenis-jenis aktivitas harian</h2>&nbsp;
                <ol>
                  <li>Sedentary (banyak duduk), contohnya: kerja kantoran.</li>
                  <li>
                    Aktivitas ringan, contohnya: jogging 30 menit atau lebih,
                    lebih banyak berdiri.
                  </li>
                  <li>
                    Aktivitas menengah, contohnya: Menyapu lantai, membersihkan
                    kaca, dance, aerobik. Pekerja dengan aktivitas moderate
                    contohnya adalah kurir, pelayan, cleaning service.
                  </li>
                  <li>
                    Aktivitas Ekstrim, contohnya: Jogging 2 jam/hari. Pekerja
                    dengan aktivitas ekstrim adalah pekerja bangunan dan atlet.
                  </li>
                </ol>
              </div>

              </div>
              <div> 
                     
        </form>
            
              </div>
            </div>
    </section>

    <section></section>
        <div id="box2">
          <div class="widget" style="text-align: center">
            <h2>Metode Penghitungan Kebutuhan Kalori Harian</h2>
          </div>
          <div id="krb">
            Kebutuhan kalori anda diukur dengan menggunakan rumus
            <strong>Mifflin St. Jeor</strong> :<br />
            <br />
            <dl>
              <dt><b>BMR (Basal Metabolic Rate)</b></dt>
              <dt style="text-align: left">
                BMR adalah jumlah kalori yang dibutuhkan untuk melakukan aktivitas
                minimum seperti bernafas. Kalkulator ini menghitung BMR
                menggunakan rumus
                <strong>Mifflin St. Jeor</strong>
                sebagai berikut.
              </dt>
            </dl>
            <div
              style="
                margin: 4px auto;
                background: #fff;
                padding: 8px;
                border-radius: 8px;
                display: block;
                box-shadow: 2px 2px 4px #cc9c91 inset;
                max-width: 350px;
              "
            >
              <strong>Pria</strong>
              = 10 x BB + 6.25 x TB - 5 x U + 5<br />
              <strong>Wanita</strong>
              = 10 x BB + 6.25 x TB - 5 x U - 161
            </div>
            <ol>
              <li>BB adalah berat badan anda dalam Kilogram (Kg).</li>
              <li>TB adalah tinggi badan anda dalam centimeter (cm).</li>
              <li>U adalah umur dalam satuan Tahun.</li>
            </ol>
            <dl>
              <dt><b>Kebutuhan Kalori Harian (TDEE)</b></dt>
              <dt>
                TDEE (Total Daily Energy Expenditure) adalah total kalori yang
                anda butuhkan dalam melakukan aktivitas sehari-hari.
                <strong>Mifflin St. Jeor</strong>
                mengelompokkan TDEE ke dalam beberapa kategori sebagai berikut.
              </dt>
            </dl>
            <ul>
              <li>Minimal bergerak atau kerja kantoran, pengali TDEE = 1.2</li>
              <li>
                Aktivitas ringan, olahraga 1-2 kali/minggu, pengali TDEE = 1.375
              </li>
              <li>
                Aktivitas sedang, olahraga 3-5 kali/minggu, pengali TDEE = 1.55
              </li>
              <li>
                Aktivitas berat, olahraga 6-7 kali/minggu, pengali TDEE = 1.725
              </li>
              <li>
                Aktivitas ekstrim, olahraga 2 kali sehari atau lebih, pengali TDEE
                = 1.9
              </li>
            </ul>
          </div>

          <div class="container 2">
            <div
              style="
                margin: 4px auto;
                background: #fff;
                padding: 8px;
                border-radius: 8px;
                display: inline-block;
                box-shadow: 2px 2px 4px #cc9c91 inset;
              "
            >
              <i class="fa fa-exclamation-circle"></i>
              <b>Disclaimer</b>
              <p style="text-align: left">
                Perlu diketahui bahwa Kebutuhan Kalori setiap individu juga dapat
                dipengaruhi oleh faktor lain seperti kondisi tubuh. Selain itu,
                kondisi medis tertentu dapat mempengaruhi kebutuhan kalori harian.
                Sebelum mengubah pola diet, pastikan anda konsultasi dengan dokter
                terlebih dahulu untuk menemukan metode yang paling sesuai untuk
                anda.
              </p>
            </div>
          </div>
        </div>
        </div>
    </section>
  </body>
</html>
