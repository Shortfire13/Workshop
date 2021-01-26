<!-- Edit -->
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data Barang</h4>
        </div>
        <form id="form" enctype="multipart/form-data">
        <div class="modal-body" id="modal-edit">
            <div class="form-group">
            <label for="nm_brg" class="control-label">Nama Barang</label>
            <input type="hidden" name="id_produk" id="id_produk">
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
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
            <label for="gbr_brg" class="control-label">Gambar Barang</label>
            <div style="padding-bottom:10px">
                <img src="" width="80px" id="pict">
            </div>
            <input type="file" name="foto_produk" class="form-control" id="foto_produk">
            </div>
            <div class="form-group">
            <label for="desc_brg" class="control-label">Deskripsi Barang</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
        </div>
        </form>
    </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#edit_brg", function(){
        var idbrg = $(this).data('id');
        var nmbrg = $(this).data('nama');
        var hrgbrg = $(this).data('harga');
        var stcbrg = $(this).data('stok');
        var gbrbrg = $(this).data('gbr');
        var descbrg = $(this).data('desc');
        $("#modal-edit #nama_produk").val(nmbrg);
        $("#modal-edit #id_produk").val(idbrg);
        $("#modal-edit #harga").val(hrgbrg);
        $("#modal-edit #stok").val(stcbrg); 
        $("#modal-edit #deskripsi").val(descbrg);
        $("#modal-edit #pict").attr("src", "assets/img/barang/"+gbrbrg);
    })

    $(document).ready(function(e){
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url : 'models/proses_edit_barang.php',
                type : 'POST',
                data : new FormData(this),
                contentType : false,
                cache : false,
                processData : false,
                success : function (msg) {
                $('.table').html(msg);
                }
            });
        }));
    })
</script>
<!-- End Edit -->