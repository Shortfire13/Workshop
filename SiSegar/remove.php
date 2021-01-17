<?php
    session_start();
    require_once "koneksi/koneksi.php";
    $id_user = $_SESSION["id_user"];
    $id_produk = $_GET["id_produk"];

    $sql = "delete from keranjang where id_user=$id_user and id_produk=$id_produk";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location: keranjang.php");
    }

?>