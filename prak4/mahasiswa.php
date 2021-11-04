<html>

<head>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <?php
  $namaErr = $nimErr = $emailErr = $prodiErr = $alamatErr = $ttlErr = "";
  $nama = $nim = $email = $prodi = $alamat = $website = $ttl = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nim"])) {
      $nimErr = "NIM harus diisi";
    } else {
      $nim = test_input($_POST["nim"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email harus diisi";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak sesuai format";
      }
    }

    if (empty($_POST["nama"])) {
      $namaErr = "Nama harus di isi";
    } else {
      $nama = test_input($_POST["nama"]);
    }

    if (empty($_POST["prodi"])) {
      $prodiErr = "Prodi harus diisi";
    } else {
      $prodi = test_input($_POST["prodi"]);
    }

    if (empty($_POST["alamat"])) {
      $alamatErr = "alamat harus di isi";
    } else {
      $alamat = test_input($_POST["alamat"]);
    }

    if (empty($_POST["ttl"])) {
      $ttlErr = "Tempat Tanggal Lahir harus diisi";
    } else {
      $ttl = test_input($_POST["ttl"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <h2>Data Mahasiswa </h2>

  <p><span class="error">* Harus Diisi.</span></p>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
      <tr>
        <td>NIM:</td>
        <td><input type="number" name="nim">
          <span class="error">* <?php echo $nimErr; ?></span>
        </td>
      </tr>
      <tr>
        <td>Nama:</td>
        <td><input type="text" name="nama">
          <span class="error">* <?php echo $namaErr; ?></span>
        </td>
      </tr>
      <tr>
        <td>E-mail: </td>
        <td><input type="text" name="email">
          <span class="error">* <?php echo $emailErr; ?></span>
        </td>
      </tr>
      <tr>
        <td>Prodi:</td>
        <td><input type="text" name="prodi">
          <span class="error">* <?php echo $prodiErr; ?></span>
        </td>
      </tr>

      <tr>
        <td>TTL:</td>
        <td> <input type="text" name="ttl">
          <span class="error">*<?php echo $ttlErr; ?></span>
        </td>
      </tr>

      <tr>
        <td>Alamat:</td>
        <td> <textarea name="alamat" rows="5" cols="40"></textarea> </td>
      </tr>

      <td>
        <input type="submit" name="submit" value="Submit">
      </td>
    </table>
  </form>
  <?php
  echo "<h2>Data yang anda isi:</h2>";
  echo "Nama : " . $nama;
  echo "<br>";
  echo "NIM : " . $nim;
  echo "<br>";
  echo "Email : " . $email;
  echo "<br>";
  echo "Prodi : " . $prodi;
  echo "<br>";
  echo "TTL : " . $ttl;
  echo "<br>";
  echo "Alamat : " . $alamat;
  echo "<br>";
  ?>

</body>

</html>