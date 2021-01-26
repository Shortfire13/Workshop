<?php
require_once ('../koneksi/+koneksi.php');
require_once ('../models/database.php');
include "../models/m_barang.php";
$connection = new Database($host,$user,$pass,$database);
$brg = new Barang($connection);

$id_brg = $_POST['id_produk'];
$nm_brg = $connection->conn->real_escape_string($_POST['nama_produk']);
$hrg_brg = $connection->conn->real_escape_string($_POST['harga']);
$st_brg = $connection->conn->real_escape_string($_POST['stok']);
$desc_brg = $connection->conn->real_escape_string($_POST['deskripsi']);
 
$pict = $_FILES['foto_produk']['name'];
$extensi = explode(".", $_FILES['foto_produk']['name']);
$gbr_brg ="brg-".round(microtime(true)).".".end($extensi);
$sumber = $_FILES['foto_produk']['tmp_name'];

if($pict == '') {
    $brg->edit("UPDATE produk SET nama_produk = '$nm_brg', harga = '$hrg_brg', stok = '$st_brg', deskripsi = '$desc_brg' WHERE id_produk = '$id_brg'");
    echo "<script>window.location='?page=barang';</script>";
} else {
    $gbr_awal = $brg->tampil($id_brg)->fetch_object()->gbr_brg;
    unlink("../assets/img/barang/".$gbr_awal);
    
    $upload = move_uploaded_file($sumber, "../assets/img/barang/".$gbr_brg);
    if($upload){
      $brg->edit("UPDATE produk SET nama_produk = '$nm_brg', harga = '$hrg_brg', stok = '$st_brg', deskripsi = '$desc_brg', foto_produk = '$gbr_brg' WHERE id_produk = '$id_brg'");
      echo "<script>window.location='?page=barang';</script>";
    } else {
      echo "<script>alert('Upload Gambar Gagal!')</script>";
    }
}
?>