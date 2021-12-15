<?php
// Melakukan koneksi ke database
include_once("koneksi.php");
// mengambil data dari table mahasiswa
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>

<head>
  <title>Halaman Utama</title>

  <!-- link ke boostrap  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
  <br>
  <h1>Data Mahasiswa</h1>
  <!-- button tambah data -->
  <a href="tambah.php" class="btn btn-primary">Tambah Data Baru</a>
  <!-- button cekak data laporan mahasiswa -->
  <a href="lap_mhs.php" class="btn btn-success">
    Cetak data Mahasiswa
  </a>
  <br> <br>
  <table width='80%' class="table">
    <tr>
      <th>Nim</th>
      <th>Nama</th>
      <th>Gender</th>
      <th>Alamat</th>
      <th>Tanggal lahir</th>
      <th>Update</th>
    </tr>
    <?php
    // perulangan untuk mencetak data dari table 
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