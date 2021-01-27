<?php
include "../models/m_barang.php";

$brg = new Barang($connection);

if(@$_GET['act'] == ''){
?>
<div class="row">
          <div class="col-lg-12">
            <h1>Barang <small>Data Barang</small></h1>
            <ol class="breadcrumb">
              <li><a href="">Barang</a></li>
              <li class="active">Data Barang</li>
            </ol>
          </div>
        </div>
      <!-- Tabel Data -->
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-border table-hover table-triped" id="datatables">
              <thead>
                <tr>
                  <th>No. </th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Stok Barang</th>
                  <th>Kategori</th>
                  <th>Gambar Barang</th>
                  <th>Deskripsi Barang</th>
                  <th>Tanggal Masuk</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tampil = $brg->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
                <tr>
                  <td align="center"><?php echo $no++."."; ?></td>
                  <td><?php echo $data->nama_produk; ?></td>
                  <td><?php echo "Rp. ".number_format($data->harga,2, ",", "."); ?></td>
                  <td><?php echo $data->stok; ?></td>
                  <td><?php echo $data->nama_kategori; ?></td>
                  <td align="center">
                    <img src="assets/img/barang/<?php echo $data->$foto_produk;?>" width="70px">
                  </td>
                  <td><?php echo $data->deskripsi; ?></td>
                  <td><?=date('d F Y', strtotime($data->tgl_masuk)); ?></td>
                  <td align="center">
                  <a id="edit_brg" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_produk; ?>" data-nama="<?php echo $data->nama_produk; ?>" data-harga="<?php echo $data->harga; ?>" data-stok="<?php echo $data->stok; ?>" data-gbr="<?php echo $data->foto_produk; ?>" data-desc="<?php echo $data->deskripsi; ?>"> 
                    <button type="button" class="btn btn-info"><i class="fas fa-edit"></i> Edit</button></a>
                    <a href="?page=barang&act=del&id=<?php echo $data->id_produk;?>" onclick="return confirm('Yakin Akan Menghapus Data Ini?')">
                      <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</button>
                    </a>
                </tr>
                <?php
                } ?>
              </tbody>
              </table>
            </div>
            <a href="index.php?page=tambahproduk" type="button" class="btn btn-primary" ><i class="fa fa-plus"></i> Tambah Data</a>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#cetakpdf"><i class="fa fa-print"></i> Cetak PDF</button>
        <!-- End Table Data -->
          
          <?php
            include ".modal_brg_edit.php";
            include ".modal_brg_cetak.php";
          ?>
          </div>
        </div>
<?php
} else if (@$_GET['act'] == 'del') {
  $gbr_awal = $brg->tampil($_GET['id'])->fetch_object()->foto_produk;
  unlink("../assets/img/barang/".$gbr_awal);

  $brg->hapus($_GET['id']);
  header("location: ?page=barang");
}
