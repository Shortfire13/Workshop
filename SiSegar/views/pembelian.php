<?php
require_once '../koneksi/koneksi.php';
?>
<h2>Data Pembelian</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pembeli</th>
            <th>Tanggal</th>
            <th>Alamat</th>
            <th>Total Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $ambil = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN user ON transaksi.id_user=user.id_user");
        while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td align="center"><?php echo $no++."."; ?></td>
            <td><?php echo $pecah['nama_user'] ;?></td>
            <td><?= date('d F Y', strtotime ($pecah['tgl_beli'])) ;?></td>
            <td><?php echo $pecah['alamat'] ;?></td>
            <td><?php echo "Rp. ".number_format($pecah['total'],2, ",", ".") ;?></td>
            <td>
                <a href="index.php?page=detail&id=<?php echo $pecah['id_transaksi'];?>" class="btn btn-info">Details</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>