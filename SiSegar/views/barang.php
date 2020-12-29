<?php
include "../models/m_barang.php";

$brg = new Barang($connection);

if(@$_GET['act'] == ''){
?>
<div class="row">
          <div class="col-lg-12">
            <h1>Barang <small>Data Barang</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Barang</a></li>
            </ol>
          </div>
        </div>
      <!-- Tabel Data -->
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-border table-hover table-triped">
                <tr>
                  <th>No. </th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Stok Barang</th>
                  <th>Gambar Barang</th>
                  <th>Deskripsi Barang</th>
                  <th>Kategori Barang</th>
                  <th>Opsi</th>
                </tr>
                <?php
                $no = 1;
                $tampil = $brg->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo $data->nama_brg; ?></td>
                  <td><?php echo $data->harga; ?></td>
                  <td><?php echo $data->stok; ?></td>
                  <td align="center">
                    <img src="assets/img/barang/<?php echo $data->gbr_brg;?>" width="70px">
                  </td>
                  <td><?php echo $data->deskripsi; ?></td>
                  <td><?php echo $data->kategori; ?></td>
                  <td align="center">
                  <a id="edit_brg" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_brg; ?>" data-nama="<?php echo $data->nama_brg; ?>" data-harga="<?php echo $data->harga; ?>" data-stok="<?php echo $data->stok; ?>" data-gbr="<?php echo $data->gbr_brg; ?>" data-desc="<?php echo $data->deskripsi; ?>" data-ktg="<?php echo $data->kategori; ?>"> 
                    <button type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</button></a>
                    <a href="?page=barang&act=del&id=<?php echo $data->id_brg;?>" onclick="return confirm('Yakin Akan Menghapus Data Ini?')">
                      <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</button>
                    </a>
                </tr>
                <?php
                } ?>
              </table>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
        <!-- End Table Data -->

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
                        <input type="text" name="nm_brg" class="form-control" id="nm_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="hrg_brg" class="control-label">Harga Barang</label>
                        <input type="number" name="hrg_brg" class="form-control" id="hrg_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="st_brg" class="control-label">Stok Barang</label>
                        <input type="number" name="st_brg" class="form-control" id="st_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="gbr_brg" class="control-label">Gambar Barang</label>
                        <input type="file" name="gbr_brg" class="form-control" id="gbr_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="desc_brg" class="control-label">Deskripsi Barang</label>
                        <input type="text" name="desc_brg" class="form-control" id="desc_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="ktg_brg" class="control-label">Kategori Barang</label>
                        <input type="text" name="ktg_brg" class="form-control" id="ktg_brg" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                    </div>
                  </form>

                  <?php
                  if(@$_POST['tambah']){
                    $nm_brg = $connection->conn->real_escape_string($_POST['nm_brg']);
                    $hrg_brg = $connection->conn->real_escape_string($_POST['hrg_brg']);
                    $st_brg = $connection->conn->real_escape_string($_POST['st_brg']);
                    $desc_brg = $connection->conn->real_escape_string($_POST['desc_brg']);
                    $ktg_brg = $connection->conn->real_escape_string($_POST['ktg_brg']);

                    $extensi = explode(".", $_FILES['gbr_brg']['name']);
                    $gbr_brg ="brg-".round(microtime(true)).".".end($extensi);
                    $sumber = $_FILES['gbr_brg']['tmp_name'];
                    
                    $upload = move_uploaded_file($sumber, "assets/img/barang/".$gbr_brg);
                    if($upload){
                      $brg->tambah($nm_brg, $hrg_brg, $st_brg, $gbr_brg , $desc_brg, $ktg_brg);
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
                        <input type="hidden" name="id_brg" id="id_brg">
                        <input type="text" name="nm_brg" class="form-control" id="nm_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="hrg_brg" class="control-label">Harga Barang</label>
                        <input type="number" name="hrg_brg" class="form-control" id="hrg_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="st_brg" class="control-label">Stok Barang</label>
                        <input type="number" name="st_brg" class="form-control" id="st_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="gbr_brg" class="control-label">Gambar Barang</label>
                        <div style="padding-bottom:10px">
                          <img src="" width="80px" id="pict">
                        </div>
                        <input type="file" name="gbr_brg" class="form-control" id="gbr_brg">
                      </div>
                      <div class="form-group">
                        <label for="desc_brg" class="control-label">Deskripsi Barang</label>
                        <input type="text" name="desc_brg" class="form-control" id="desc_brg" required>
                      </div>
                      <div class="form-group">
                        <label for="ktg_brg" class="control-label">Kategori Barang</label>
                        <input type="text" name="ktg_brg" class="form-control" id="ktg_brg" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <script src="assets/js/jquery-1.10.2.js"></script>
            <script type="text/javascript">
              $(document).on("click", "#edit_brg", function(){
                  var idbrg = $(this).data('id');
                  var nmbrg = $(this).data('nama');
                  var hrgbrg = $(this).data('harga');
                  var stcbrg = $(this).data('stok');
                  var gbrbrg = $(this).data('gbr');
                  var descbrg = $(this).data('desc');
                  var ktgbrg = $(this).data('ktg');
                  $("#modal-edit #nm_brg").val(nmbrg);
                  $("#modal-edit #id_brg").val(idbrg);
                  $("#modal-edit #hrg_brg").val(hrgbrg);
                  $("#modal-edit #st_brg").val(stcbrg); 
                  $("#modal-edit #desc_brg").val(descbrg);
                  $("#modal-edit #ktg_brg").val(ktgbrg);
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
          </div>
        </div>
<?php
} else if (@$_GET['act'] == 'del') {
  $gbr_awal = $brg->tampil($_GET['id'])->fetch_object()->gbr_brg;
  unlink("assets/img/barang/".$gbr_awal);

  $brg->hapus($_GET['id']);
  header("location: ?page=barang");
}