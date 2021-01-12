<?php
require_once 'koneksi/koneksi.php';
$id_user = $_SESSION['id_user'];
$id_produk = $_GET['id_produk'];
$quantity = $_GET['quantity'];
$query = mysqli_query($koneksi, ("INSERT INTO keranjang VALUES ($id_user, $id_produk, $jumlah)"));