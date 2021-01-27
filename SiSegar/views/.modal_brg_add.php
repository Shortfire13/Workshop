<?php
require_once '../koneksi/koneksi.php';
?>
<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Produk</label>
        <input type="text" name="nama_brg" id="nama_brg" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Harga Produk</label>
        <input type="number" name="harga_brg" id="harga_brg" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Stok Produk</label>
        <input type="number" name="stok_brg" id="stok_brg" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Kategori Produk</label>
        <select name="ktg" id="ktg" class="form-control" required>
        <option value="">-Pilih-</option>
        <?php
        $sql_ktg = mysqli_query($koneksi, "SELECT * FROM kategori") or die (mysqli_error($koneksi));
        while ($data_ktg = mysqli_fetch_array($sql_ktg)) {
            echo '<option value="'.$data_ktg['id_kategori'].'">'.$data_ktg['nama_kategori'].'</option>';
        }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Berat Produk (gr)</label>
        <input type="number" name="berat" id="berat" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Deskripsi Produk</label>
        <textarea name="deskripsi" id="deskripsi" rows="10" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="">Foto Produk</label>
        <input type="file" name="foto" id="foto" class="form-control" required>
    </div>
    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) {
    $nama_brg = trim(mysqli_real_escape_string($koneksi, $_POST['nama_brg']));
    $harga_brg = trim(mysqli_real_escape_string($koneksi, $_POST['harga_brg']));
    $stok_brg = trim(mysqli_real_escape_string($koneksi, $_POST['stok_brg']));
    $ktg = trim(mysqli_real_escape_string($koneksi, $_POST['ktg']));
    $berat = trim(mysqli_real_escape_string($koneksi, $_POST['berat']));
    $deskripsi = trim(mysqli_real_escape_string($koneksi, $_POST['deskripsi']));
    $tanggal = date("Y-m-d");

    $extensi = explode(".", $_FILES['foto']['name']);
    $pict = "brg-".round(microtime(true)).".".end($extensi);
    $sumber = $_FILES['foto']['tmp_name'];
    move_uploaded_file($sumber, "../assets/img/barang/".$pict);

    mysqli_query($koneksi, "INSERT INTO `produk`(`id_produk`, `id_kategori`, `nama_produk`, `harga`, `stok`, `berat`, `foto_produk`, `deskripsi`, `tgl_masuk`) VALUES (null,$ktg,'$nama_brg',$harga_brg,$stok_brg,$berat,'$pict','$deskripsi', '$tanggal')") or die (mysqli_error($koneksi));

    echo "<script>window.location='?page=barang';</script>";
}
?>