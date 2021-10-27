<html>

<head>
  <title>Tambah data mahasiswa</title>
</head>

<body>
  <a href="index.php">Go to Home</a>
  <br /><br />
  <!-- form untuk melakukan input data -->
  <form action="tambah.php" method="post" name="form1">
    <table width="25%" border="0">
      <tr>
        <td>Nim</td>
        <td><input type="text" name="nim"></td> yang bisa dapat
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td>Gender (L/P)</td>
        <td><input type="text" name="jkel"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><input type="text" name="alamat"></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td><input type="date" name="tgllhir"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Tambah"></td>
      </tr>
    </table>
  </form>
  <?php
  // mengececek data yang sudah di inputkan pada form dan menampungnya kedalam variable
  if (isset($_POST['Submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $alamat = $_POST['alamat'];
    $tgllhir = $_POST['tgllhir'];
    // melakukan koneksi ke database
    include_once("koneksi.php");
    // query untuk menambahkan data ke database
    $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhir)
VALUES('$nim','$nama', '$jkel','$alamat','$tgllhir')");
    // menampilkan pesan berhasil
    echo "Data berhasil disimpan. <a href='index.php'>View Users</a>";
  }
  ?>
</body>

</html>