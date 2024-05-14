<?php
include "koneksi.php";


     ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <title>Bismillah Kalkulator</title>
    <link rel="stylesheet" href="" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <style>
      body {
          font-family: Arial, sans-serif;
          text-align: center;
          margin: 50px;
      }
  </style>
    
  </head>
  <body>
    <section>
      <div
        class="elementor-container elementor-column-gap-default"
        style="
          width: 1000px;
          height: 500px;
          border-radius: solid 2px;
          background-color: #ffe5ec;
          justify-content: center;
          margin: auto;
          font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI',
            Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue',
            sans-serif;
          color: #827f3a;
          padding: 15px;
        ">
            <div >
              <div class="elementor-widget-container">
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
                    <input type="number" id="id_log" name="id_log" min="1" placeholder="Id Hitung" required><br>
                    <input type="number" id="id_user" name="id_user" min="1" placeholder="Id User" required><br>
                    <input type="number" id="tinggi_badan" name="tinggi_badan" min="1" placeholder="Tinggi" required><br>
                    <input type="number" id="berat_badan" name="berat_badan" min="1" placeholder="Berat" required><br>
                    
                    <input type="number" id="usia" name="usia" min="1" placeholder="Umur" required><br>
                    
                    <select id="jk" name="jk">
                      <option value="" selected disabled hidden>- - Jenis Kelamin - -</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select><br>
                    
                    <select id="level_aktivitas" name="level_aktivitas">
                      <option value="" selected disabled hidden>- - Aktivitas - -</option>
                        <option value="1.2">Minimal, Suka Rebahan</option>
                        <option value="1.375">Aktivitas ringan, Olahraga 1-3 kali/minggu</option>
                        <option value="1.55">Aktivitas menengah, olahraga 3-5 kali/minggu</option>
                        <option value="1.725">Aktivitas berat, olahraga 6-7 kali/minggu</option>
                        <option value="1.9">Pekerja fisik, olahraga 2 kali/hari</option>
                    </select><br>
                
                    <button style="
                    margin: 0 auto;
                    position: relative;
                    align-content: center;
                    width: fit-content;
                    color: #827f3a;
                  " onclick="calculateCalories()" name="submit">Hitung Kalori</button>
                
                    <p class="mkd-bmic-notifications-col"
                    style="
                      border-radius: 8px;
                      background: #fff;
                      padding: 4px;
                      text-align: center;
                      box-shadow: 2px 2px 4px #cc9c91 inset;
                    " id="result" name="hasil"></p>
                
                    <script>
                        function calculateCalories() {
                            var jk = document.getElementById("jk").value;
                            var usia = parseInt(document.getElementById("usia").value);
                            var tinggi_badan = parseInt(document.getElementById("tinggi_badan").value);
                            var berat_badan = parseInt(document.getElementById("berat_badan").value);
                            var level_aktivitas = parseFloat(document.getElementById("level_aktivitas").value);
                
                            // Menggunakan rumus Mifflin-St Jeor Equation
                            var bmr = (jk === "male") ? 10 * berat_badan + 6.25 * tinggi_badan - 5 * usia + 5 : 10 * berat_badan + 6.25 * tinggi_badan - 5 * usia - 161;
                            
                            // Mengalikan BMR dengan tingkat aktivitas
                            var totalCalories = Math.round(bmr * level_aktivitas);
                
                            document.getElementById("result").innerHTML = "Kebutuhan Kalori harian kamu adalah " + totalCalories + " kkal/hari";
                        }
                    </script>
                      
                    

<!--notif ketika sudah dihitung-->
                    
            <div>


              <div class="elementor-widget-container">
                <h2>Jenis-jenis aktivitas harian</h2>
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
          </div>
    </section>

    <section>
      <div
        class="container"
        style="
          width: 1000px;
          height: 700px;
          border-radius: solid 2px;
          background-color: #ffe5ec;
          justify-content: center;
          margin: auto;
          font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI',
            Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue',
            sans-serif;
          color: #827f3a;
          padding: 15px;
        "
      >
        <div class="container 1">
          <div class="widget" style="text-align: center">
            <h2>Metode Penghitungan Kebutuhan Kalori Harian</h2>
          </div>
        </div>

        <div class="widget-container">
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

        <div class="widget-container 2">
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
    </section>
    <?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: lengkapi.php");
    exit();
}

$id_user = $_SESSION['id_user'];

if (isset($_POST['submit'])) {
    $id_log = $_POST['id_log'];
    $usia = $_POST['usia'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $jk = $_POST['jk'];
    $level_aktivitas = $_POST['level_aktivitas'];
   
    $hasil = hitungKalori($usia, $tinggi_badan, $berat_badan, $jk, $level_aktivitas);

    
    $insert_query = "INSERT INTO log_hitung (id_log, id_user, usia, tinggi_badan, berat_badan, jk, hasil, level_aktivitas)
                    VALUES ('$id_log','$id_user', '$usia', '$tinggi_badan', '$berat_badan', '$jk', '$hasil','$level_aktivitas')";

    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
      ?>
      <script>
          alert('Data berhasil disimpan');
      </script>
      <?php
      header("Location: lengkapi.php");
  } else {
      ?>
      <script>
          alert('Gagal menyimpan data');
      </script>
      <?php
  }
}

function hitungKalori($usia, $tinggi_badan, $berat_badan, $jk, $level_aktivitas) {
  // Menggunakan rumus Mifflin-St Jeor Equation
  $bmr = ($jk === "Laki-laki") ? 10 * $berat_badan + 6.25 * $tinggi_badan - 5 * $usia + 5 : 10 * $berat_badan + 6.25 * $tinggi_badan - 5 * $usia - 161;
  
  // Mengalikan BMR dengan tingkat aktivitas
  $totalCalories = round($bmr * $level_aktivitas);

  return $totalCalories;
}
?>

<?php
                        $s = "SELECT hasil FROM log_hitung WHERE id_user = '$id_user'";
                        $q = mysqli_query($conn, $s);
                        if(mysqli_num_rows($q) > 0){
                          ?>
                          <table >
                          <tr>
                              <th>Hasil</th>
                        
                          </tr>
                              <?php 
                              $timestamp = time(); 
                              $date = date('Y-m-d H:i:s', $timestamp); // Format timestamp ke dalam tanggal dan waktu
                              $s = "SELECT hasil FROM 
                                    log_hitung WHERE id_user = '$id_user'";
                              $q = mysqli_query($conn, $s);
                                  while($row1=mysqli_fetch_array($q)){
                                      echo "<tr>";
                                      echo "<td>$row1[hasil]</td>";
                                      echo "</tr>";
                                  }
                          ?>
                          </table>
                          <?php
                      }
                  ?>
  </body>
</html>
