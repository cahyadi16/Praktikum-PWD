<?php
// Create database connection using config file
include_once("koneksi.php");
// Fetch all users data from database
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>

<head>
  <title>Halaman Utama</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
  <br>
  <h1>Data Mahasiswa</h1>
  <a href="tambah.php" class="btn btn-primary">Tambah Data Baru</a><br /><br />
  <table width='80%' class="table">
    <tr>
      <th>Nim</th>
      <th>Nama</th>
      <th>Gender</th>
      <th>Alamat</th>
      <th>tgl lahir</th>
      <th>Update</th>
    </tr>
    <?php

    while ($user_data = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $user_data['nim'] . "</td>";
      echo "<td>" . $user_data['nama'] . "</td>";
      echo "<td>" . $user_data['jkel'] . "</td>";
      echo "<td>" . $user_data['alamat'] . "</td>";
      echo "<td>" . $user_data['tgllhir'] . "</td>";
      echo "<td> <a class='btn btn-primary' href='edit.php?nim=$user_data[nim]'>Edit </a> | <a class='btn btn-danger' href='delete.php?nim=$user_data[nim]'>Delete</a></td></tr>";
    }
    ?>

  </table>
</body>

</html>