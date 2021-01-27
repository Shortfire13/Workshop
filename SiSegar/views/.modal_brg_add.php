<?php
require_once '../koneksi/koneksi.php';
?>
<h2>Tambah Produk</h2>

<form action="../models/proses_add.php" method="post" enctype="multipart/form-data">
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
    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
</form>