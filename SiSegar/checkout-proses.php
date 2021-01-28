<?php
    session_start();
    require 'koneksi/koneksi.php';
    $id = $_SESSION['id_user'];
    $tanggal = date("Y-m-d");
    $status = 'Transaksi Diproses';
    $lokasi = $_POST['lokasi'];
    $telepon = $_POST['telepon'];
    $total = $_POST['total'];


    //menambah transaksi
    $sql_transaksi = "INSERT INTO transaksi VALUES(NULL, $id, '$tanggal', '$status', '$lokasi',  '$telepon', $total)";
    $query_transaksi = mysqli_query($koneksi, $sql_transaksi);

    // Cari id transaksi yang terakhir ditambahkan
    $sql_cari_id = "SELECT id_transaksi from transaksi order by id_transaksi desc limit 1";
    $query_cari_id = mysqli_query($koneksi, $sql_cari_id);
    $data_cari_id = mysqli_fetch_array($query_cari_id);
    $id_transaksi = $data_cari_id["id_transaksi"];

    // Mendapatkan data dari keranjang
    $sql_keranjang = "SELECT * FROM keranjang WHERE id_user=$id";
    $query_keranjang = mysqli_query($koneksi, $sql_keranjang);

    while($data_keranjang = mysqli_fetch_array($query_keranjang)){
        // Tambahkan data ke detail transaksi
        $id_produk = $data_keranjang["id_produk"];
        $jumlah = $data_keranjang["jumlah"];
        $sql_detail_transaksi = "INSERT INTO detail_transaksi VALUES($id_transaksi, $id_produk, $jumlah)";
        $query_detail_transaksi = mysqli_query($koneksi, $sql_detail_transaksi);
    }




        //cek stok
        $sql_cek_keranjang = "SELECT * FROM transaksi WHERE id_transaksi = (SELECT MAX(id_transaksi) FROM transaksi)";
        $query_cek_keranjang = mysqli_query($koneksi, $sql_cek_keranjang);
        $data_cek_keranjang = mysqli_fetch_array($query_cek_keranjang);
        $id_transaksi = $data_cek_keranjang['id_transaksi'];
    
        $sql_cek_stok = "SELECT * FROM ((detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk) inner join transaksi on detail_transaksi.id_transaksi = transaksi.id_transaksi) where transaksi.id_user=$id AND transaksi.id_transaksi = $id_transaksi";
        $query_cek_stok = mysqli_query($koneksi, $sql_cek_stok);
        $data_cek_stok = mysqli_fetch_array($query_cek_stok);
        while($data_cek_stok){
            if(($data_cek_stok["stok"] - $data_cek_stok["jumlah"]) < 0){
                $nama_barang = $data_cek_stok['nama_produk'];
                header("Location: keranjang.php?status=stok&barang=".$nama_barang);
                return 0;
            }else{
                // Mengurangi stok pada produk
                $stok_sisa = $data_cek_stok["stok"] - $data_cek_stok["jumlah"];
                $id_produk = $data_cek_stok['id_produk'];
                $sql_stok = "UPDATE produk SET stok = $stok_sisa WHERE id_produk=$id_produk";
                $query_stok = 
                mysqli_query($koneksi, $sql_stok);
            }
        }

            // Menghapus data keranjang ketika sudah terbeli
    $sql_hapus = "DELETE FROM keranjang WHERE id_user = $id";
    $query_hapus = mysqli_query($koneksi,$sql_hapus);
    header("Location: products.php?status=done");
    
?>