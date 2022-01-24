<?php
// berfungi untuk melakukan pemanggilan ke file koneksi.php
require_once "../prak9/koneksi.php";
// inisialisasi nim yang digunakan sebgai kata kunci
$nim = '1800018070';
// query yang dugunakan untuk mengambil semua data berdasarkan nim  dari table mahasiswa dan menampungnya kedalam variable sql
$sql = "select * from mahasiswa where nim = '$nim'";
// perintah query ke database mysql
$query = mysqli_query($con, $sql);
// perulangan yang akan menangkap data dari hasil perintah query dan mengembalikannya kedalam array assosiatif
while ($row = mysqli_fetch_assoc($query)) {
  // membuat variable data dalam bentuk array uang akan menampung data dari table mahasiswa
  $data[] = $row;
}
// memanggil content type berupa file json
header('content-type: application/json');
// fungsi yang akan merubah data array tadi kedalam format json
echo json_encode($data);
// memutus koneksi ke database
mysqli_close($con);
