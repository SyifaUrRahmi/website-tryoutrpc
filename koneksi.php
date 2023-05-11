<?php

  $host       = "localhost";
  $user       = "u1579522_Sy1f4";
  $pass       = "30M1424h_Sy1f4";
  $db         = "u1579522_tryoutrpc";

  $koneksi    = mysqli_connect($host, $user, $pass, $db);
  if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
  }
  
?>