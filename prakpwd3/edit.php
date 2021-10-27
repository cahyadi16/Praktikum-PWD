<?php
// koneksi ke database
include_once("koneksi.php");
// mengecek apakah ada iputan dari user
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $alamat = $_POST['alamat'];
    $tgllhir = $_POST['tgllhir'];
    // query update data user berdasarkan nim
    $result = mysqli_query($con, "UPDATE mahasiswa SET
nama='$nama',jkel='$jkel',alamat='$alamat',tgllhir='$tgllhir' WHERE nim='$nim'");
    // diarahkan ke file index
    header("Location: index.php");
}
?>
<?php
// menampilkan data berdasarkan nim
$nim = $_GET['nim'];
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
while ($user_data = mysqli_fetch_array($result)) {
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $jkel = $user_data['jkel'];
    $alamat = $user_data['alamat'];
    $tgllhir = $user_data['tgllhir'];
}
?>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />
    <!-- form yang mengarah pada edit.php -->
    <form name="update_mahasiswa" method="post" action="edit.php">
        <table border="0">
            <!-- menampilkan data yang ada di database dan bisa untuk melakukan ubah pada formnya -->
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim" value=<?php echo $nim; ?>></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="jkel" value=<?php echo $jkel; ?>></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat; ?>></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tgllhir" value=<?php echo $tgllhir; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nim" value=<?php echo $_GET['nim']; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>