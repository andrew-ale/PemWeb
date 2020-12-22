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
