<?php
// memanggil file koneksi ke database
include "koneksi.php";
// deklarasi variable sql yang digunakan mengambil data mahasiswa berdasarkan nim
$sql = "select * from mahasiswa order by nim";
$tampil = mysqli_query($con, $sql);
// melakukan pencarian data jika datanya ada
if (mysqli_num_rows($tampil) > 0) {
  $no = 1;
  // deklarasi respons data kedalam objek assosiativ array
  $response = array();
  $response["data"] = array();
  while ($r = mysqli_fetch_array($tampil)) {
    // menampilkan data sesuai dengan isi yang ada di table
    $h['nim'] = $r['nim'];
    $h['nama'] = $r['nama'];
    $h['jkel'] = $r['jkel'];
    $h['alamat'] = $r['alamat'];
    $h['tgllhr'] = $r['tgllhr'];
    array_push($response["data"], $h);
  }
  // menampilkan data respons kedalam bentuk json
  echo json_encode($response);
  // jika tidak ada data makan cetak pesan tidak ada data
} else {
  $response["message"] = "tidak ada data";
  echo json_encode($response);
}
