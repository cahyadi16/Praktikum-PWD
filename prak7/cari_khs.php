<?php
// import file koneksi
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<!-- Form untuk melakukan pencarian -->
<form action="" method="get">
  <label>Cari :</label>
  <input type="text" name="cari">
  <input type="submit" value="Cari">
</form>
<!-- End Form pencarian -->
<!-- melakukan pengecekan jika user memasukan kata kunci -->
<?php
if (isset($_GET['cari'])) {
  $cari = $_GET['cari'];
  // mencetak hasil dari kata kunci yang di inputkan user
  echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
  <tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama Mhs</th>
    <th>Kode Matkul</th>
    <th>Nama Matkul</th>
    <th>Nilai</th>
  </tr>
  <?php
  // menampilkan data yang dicari oleh user ssuai dengan kata kunci yang dicari yang ada dalam table khs
  if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $sql = "select * from khs where nim like '%" . $cari . "%'";
    $tampil = mysqli_query($con, $sql);
  } else {
    $sql = "select * from khs";
    $tampil = mysqli_query($con, $sql);
  }
  // perulangan yang dilakukan untuk menampilkan data nim, kodemk dan nilai
  $no = 1;
  while ($r = mysqli_fetch_array($tampil)) {
  ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $r['nim']; ?></td>
      <td><?php echo $r['nama_mhs']; ?></td>
      <td><?php echo $r['kodemk']; ?></td>
      <td><?php echo $r['nama_mk']; ?></td>
      <td><?php echo $r['nilai']; ?></td>
    </tr>
  <?php } ?>
  <!-- end perulangan -->
</table>