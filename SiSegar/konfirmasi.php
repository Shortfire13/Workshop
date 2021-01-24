 <?php  
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($koneksi,"UPDATE transaksi SET status='Barang Sudah Sampai' WHERE id_transaksi=$id");
            header('location:riwayat.php?pesan=konfrimasiberhasil');
        }
    ?>