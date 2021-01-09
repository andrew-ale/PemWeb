<?php
// Koneksi ke DB dan pilih database
$servername = "localhost";
$username = "root";
$pass = "";
$db = "northwind";
$conn = mysqli_connect($servername, $username, $pass, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Query isi tabel mahasiswa
$sql = mysqli_query($conn, 'SELECT * FROM mahasiswa');

// Ubah data ke dalam array
// $row = mysqli_fetch_row($res); // array numerik
// $row = mysqli_fetch_assoc($res); // array associative
// $row = mysqli_fetch_array($res); // keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($sql)) {
  $rows[] = $row;
}

// Tampung ke variabel mahasiswa
$mahasiswa = $rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <table border="1" cellpadding="10" cellspacing='0'>
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
        <td><?= $m['nim']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td>
          <a href="">ubah</a> | <a href="">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>