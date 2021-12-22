<?php
// memanggil file koneksi
include "koneksi.php";
// melakukan panggilan untuk menampilkan data kedalam bentuk xml
header('Content-Type: text/xml');
// query melakukan pengambilan data dari table mahasiswa
$query = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($con, $query);
// definisi jumlah field yang ada table
$jumField = mysqli_num_fields($hasil);
// mencetak xml dengan versi 1.0
echo "<?xml version='1.0'?>";

echo "<data>";
// melakukan perulangan untuk mencetak data dari table mahasiswa 
while ($data = mysqli_fetch_array($hasil)) {
  echo "<mahasiswa>";
  echo "<nim>", $data['nim'], "</nim>";
  echo "<nama>", $data['nama'], "</nama>";
  echo "<jkel>", $data['jkel'], "</jkel>";
  echo "<alamat>", $data['alamat'], "</alamat>";
  echo "<tgllhr>", $data['tgllhr'], "</tgllhr>";
  echo "</mahasiswa>";
}
echo "</data>";
