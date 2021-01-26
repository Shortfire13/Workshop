<!-- Tambah Barang -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Barang</h4>
        </div>
        <form action="" method="Post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
            <label for="nm_brg" class="control-label">Nama Barang</label>
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
            </div>
            <div class="form-group">
            <label for="mitra" class="control-label">Mitra</label>
            <select name="mitra" id="mitra" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="hrg_brg" class="control-label">Harga Barang</label>
            <input type="number" name="harga" class="form-control" id="harga" required>
            </div>
            <div class="form-group">
            <label for="st_brg" class="control-label">Stok Barang</label>
            <input type="number" name="stok" class="form-control" id="stok" required>
            </div>
            <div class="form-group">
            <label for="st_brg" class="control-label">Kategori</label>
            <input type="number" name="stok" class="form-control" id="stok" required>
            </div>
            <div class="form-group">
            <label for="gbr_brg" class="control-label">Gambar Barang</label>
            <input type="file" name="foto_produk" class="form-control" id="foto_produk" required>
            </div>
            <div class="form-group">
            <label for="desc_brg" class="control-label">Deskripsi Barang</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
        </form>

        <?php
        if(@$_POST['tambah']){
        $nm_brg = $connection->conn->real_escape_string($_POST['nama_produk']);
        $hrg_brg = $connection->conn->real_escape_string($_POST['harga']);
        $st_brg = $connection->conn->real_escape_string($_POST['stok']);
        $desc_brg = $connection->conn->real_escape_string($_POST['deskripsi']);

        $extensi = explode(".", $_FILES['foto_produk']['name']);
        $gbr_brg ="brg-".round(microtime(true)).".".end($extensi);
        $sumber = $_FILES['foto_produk']['tmp_name'];
        
        $upload = move_uploaded_file($sumber, "assets/img/barang/".$gbr_brg);
        if($upload){
            $brg->tambah($nm_brg, $hrg_brg, $st_brg, $gbr_brg , $desc_brg);
            header("location: ?page=barang");
        } else {
            echo "<script>alert('Upload Gambar Gagal!')</script>";
        }
        
        }
        ?>
    </div>
    </div>
    </div>
    <!-- End Tambah -->