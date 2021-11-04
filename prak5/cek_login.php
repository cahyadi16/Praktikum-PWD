<?php
include "koneksi.php";
// menangkap dari variable id_user dan password
$id_user = $_POST['id_user'];
$pass = md5($_POST['paswd']);
// query untuk mengambil data dari database yang id_user dan passwornya sudah ada pada tabel users
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
$login = mysqli_query($con, $sql);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// melakukan pengecekan terhadap inputan user dan data yang ada pada database
// jika ketemu datanya
if ($ketemu > 0) {
  // menjalankan/memulai session pada server
  session_start();
  // membuat session id_user dan password user
  $_SESSION['iduser'] = $r['id_user'];
  $_SESSION['passuser'] = $r['password'];
  // mencetak pesan berhasil dan menampilkan iduser dan passwordnya
  echo "USER BERHASIL LOGIN<br>";
  echo "id user =", $_SESSION['iduser'], "<br>";
  echo "password=", $_SESSION['passuser'], "<br>";
  echo "<a href=logout.php><b>LOGOUT</b></a></center>";

  // jika tidak ada
} else {
  // akan muncul pesan login gagal dan password tidak benar
  echo "<center>Login gagal! username & password tidak benar<br>";
  echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
mysqli_close($con);
