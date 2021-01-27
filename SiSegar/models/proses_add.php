<?php
require_once '../koneksi/koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_brg = trim(mysqli_real_escape_string($koneksi, $_POST['nama_brg']));
    $harga_brg = trim(mysqli_real_escape_string($koneksi, $_POST['harga_brg']));
    $stok_brg = trim(mysqli_real_escape_string($koneksi, $_POST['stok_brg']));
    $ktg = trim(mysqli_real_escape_string($koneksi, $_POST['ktg']));
    $berat = trim(mysqli_real_escape_string($koneksi, $_POST['berat']));
    $deskripsi = trim(mysqli_real_escape_string($koneksi, $_POST['deskripsi']));

    $extensi = explode(".", $_FILES['foto']['name']);
    $pict = "brg-".round(microtime(true)).".".end($extensi);
    $sumber = $_FILES['foto']['tmp_name'];
    move_uploaded_file($sumber, "../assets/img/barang/".$pict);

    mysqli_query($koneksi, "INSERT INTO produk (id_produk,id_kategori,nama_produk,harga,stok,berat,foto_produk,deskripsi) VALUES ('','$ktg','$nama_brg','$harga_brg','$stok_brg','$berat','$pict','$deskripsi')") or die (mysqli_error($koneksi));
}

?>