<?php
include "use\koneksi.php";

$insert = "insert into pegawai (NIP,nama,tanggal_lahir,alamat,divisi,foto) values ('09','selena Gomez','2001-12-11','New York','IT','image/2.jpg')";
mysqli_query($conn,$insert);
?>