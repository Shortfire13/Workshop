<?php
    include "koneksi/koneksi.php";
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $berat = $_POST['berat'];
    $foto_produk = $_POST['foto_produk'];
    $deskripsi = $_POST['deskripsi'];
    $query_mysql = mysqli_query($koneksi, "insert into produk value ('', '', '', $nama_produk, $harga, $berat, $foto_produk, $deskripsi)");

    header("location:SaveImage.php?pesan=input");
?>