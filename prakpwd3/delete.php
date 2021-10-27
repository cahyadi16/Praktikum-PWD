<?php
// koneksi ke database
include_once("koneksi.php");
// mengambil nim user
$nim = $_GET['nim'];
// delete berdasarkan data mahasiswa berdasarkan nim
$result = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim=’$nim’");
// di arahkan ke index setelah hapus
header("Location:index.php");
