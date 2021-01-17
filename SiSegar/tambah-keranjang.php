<?php
session_start();
$id_user = $_SESSION["id_user"];
require_once 'koneksi/koneksi.php';
$id_produk = $_GET["id_produk"];
$sql = "select * from keranjang where id_produk='$id_produk' and id_user='$id_user'";
    $query1 = mysqli_query($koneksi, $sql);
    $data = mysqli_num_rows($query1);
    if($data != 0){
        header("Location: keranjang.php?status=exist");
        return 0;
    }else{
        // Tambah produk ke keranjang
        $quantity = $_GET["jumlah"];
        $query = mysqli_query($koneksi, "INSERT into keranjang values ($id_user, $id_produk, $quantity); ");
        header('location:keranjang.php');
    }

?>