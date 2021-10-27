<?php

// untuk file koneksi ke database
// inisialilasi hostname 
$host = "localhost";
// inisialisasi username
$username = "root";
// inisialisasi password localserver
$password = "";
// inisialisasi nama database
$databasename = "prak4";

// melakukan koneksi ke database berdasarkan inisialisasi yang dilakukan di atas
$con = @mysqli_connect($host, $username, $password, $databasename);
// mengecek apakah sesuai dan bisa koneksi atau tidak
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
