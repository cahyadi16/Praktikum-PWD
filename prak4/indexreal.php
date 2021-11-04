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
  // deklarasi variable pesan error yang digunakan jika isiannya kosong
  $namaErr = $emailErr = $genderErr = $websiteErr = "";
  // deklarasi variable nama, email, gender, comment dan website dengan isian kosong
  $nama = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // lakukan pengecekan apakah field nama sudah di isi, jika kosng maka ana ada pesan "Nama harus diisi"
    if (empty($_POST["nama"])) {
      $namaErr = "Nama harus diisi";
    } else {
      $nama = test_input($_POST["nama"]);
    }
    // lakukan pengecekan email apakah field email sudah di isi, jika kosng maka ana ada pesan "Email harus diisi"
    if (empty($_POST["email"])) {
      $emailErr = "Email harus diisi";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak sesuai format";
      }
    }
    // lakukan pengecekan Website apakah field Website sudah di isi, jika kosng maka ana ada pesan "Website harus diisi"
    if (empty($_POST["website"])) {
      $websiteErr = "Website harus di isi";
    } else {
      $website = test_input($_POST["website"]);
    }
    // lakukan pengecekan Comment apakah field Comment sudah di isi, jika kosng maka ana ada pesan "Comment harus diisi"
    if (empty($_POST["comment"])) {
      $commentErr = "Comment harus diisi";
    } else {
      $comment = test_input($_POST["comment"]);
    }
    // lakukan pengecekan Gender apakah field Gender sudah di isi, jika kosng maka ana ada pesan "Gender harus dipilih"
    if (empty($_POST["gender"])) {
      $genderErr = "Gender harus dipilih";
    } else {
      $gender = test_input($_POST["gender"]);
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
  <h2>Posting Komentar </h2>

  <p><span class="error">* Harus Diisi.</span></p>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
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
        <td>Website:</td>
        <td> <input type="text" name="website">
          <span class="error"><?php echo $websiteErr; ?></span>
        </td>
      </tr>

      <tr>
        <td>Komentar:</td>
        <td> <textarea name="comment" rows="5" cols="40"></textarea></td>
      </tr>

      <tr>
        <td>Gender:</td>
        <td>
          <input type="radio" name="gender" value="L">Laki-Laki
          <input type="radio" name="gender" value="P">Perempuan
          <span class="error">* <?php echo $genderErr; ?></span>
        </td>
      </tr>
      <td>
        <input type="submit" name="submit" value="Submit">
      </td>
    </table>
  </form>

  <?php
  echo "<h2>Data yang anda isi:</h2>";
  echo $nama;
  echo "<br>";

  echo $email;
  echo "<br>";

  echo $website;
  echo "<br>";

  echo $comment;
  echo "<br>";

  echo $gender;
  ?>

</body>

</html>