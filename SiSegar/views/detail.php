<?php
require_once '../koneksi/koneksi.php';
?>
<h2>Detail Pembelian</h2>
<?php
    $sql_detail = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN user ON transaksi.id_user=user.id_user
    WHERE transaksi.id_transaksi='$_GET[id]'");
    $detail = mysqli_fetch_array($sql_detail);
?>
<p>
    <?php echo $detail['no_tlp'] ;?> <br>
    <?php echo $detail['alamat'] ;?>
</p>

<p>
    Tanggal : <?=date('d F Y', strtotime($detail['tgl_beli'])) ;?> <br>
    Total Pembelian : <?php echo "Rp. ".number_format($detail['total'],2, ",", ".") ;?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        $sql_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi JOIN produk ON detail_transaksi.id_produk=produk.id_produk WHERE detail_transaksi.id_transaksi='$_GET[id]'");
        while($data_detail = mysqli_fetch_array($sql_detail)){ ?>
            <tr>
                <td align="center"><?php echo $no++."."; ?></td>
                <td><?php echo $data_detail['nama_produk'] ;?></td>
                <td><?php echo "Rp. ".number_format($data_detail['harga'],2, ",", ".");?></td>
                <td><?php echo $data_detail['jumlah'];?></td>
                <td><?php echo "Rp. ".number_format($data_detail['harga']*$data_detail['jumlah'],2, ",", ".");?></td>
            </tr>
       <?php } ?>
    </tbody>
</table>