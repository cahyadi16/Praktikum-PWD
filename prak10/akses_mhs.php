<?php
// setting url
$url = "http://localhost:8080/Praktikum-PWD/prak10/getdatamhs.php";
// menginisialisasi curl url yang sudah di tampung tadi 
$client = curl_init($url);
// return dari web service menjadi sebuah string
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
// malkukan eksekusi dari web service
$response = curl_exec($client);
// mengubah format data string menjadi format json 

$result = json_decode($response);
// melakukan perulangan data dari data yang kita buat 
foreach ($result as $r) {
  echo "<p>"; //pombuka tag paragraf
  echo "NIM : " . $r->nim . "<br />"; //mencetak nim
  echo "Nama : " . $r->nama . "<br />"; //mencetak nama
  echo "jenis kel : " . $r->jkel . "<br />"; //mencetak jenis kelamin
  echo "Alamat : " . $r->alamat . "<br />"; //mencetak alamat
  echo "Tgl Lahir : " . $r->tgllhr . "<br />"; //mencetak tgl lahir
  echo "</p>"; // penutup tag paragraf
}
