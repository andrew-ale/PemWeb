<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'northwind');
}

function query($query)
{
  $conn = koneksi();
  $sql = mysqli_query($conn, $query);

  //jika hasilnya hanya ada 1 data
  if (mysqli_num_rows($sql) == 1) {
    return mysqli_fetch_assoc($sql);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($sql)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null, '$nama','$nim','$email','$jurusan','$gambar');
          ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
