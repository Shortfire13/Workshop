<?php
require_once ('../koneksi/+koneksi.php');
require_once ('../models/database.php');
include "../models/m_barang.php";
$connection = new Database($host,$user,$pass,$database);
$brg = new  Barang($connection);

$content = '
<style>
  .table {border-collapse:collapse;}
  .table th {padding:8px 5px; background-color:#A1FF81; color:#black }
</style>
';

$content .= '
<page>
    <div style="padding:4mm; border:1px solid; background-color:#A1FF81;" align="center">
        <span style="font-size:35px;">SiSegar</span>
    </div>

    <div style="padding:20px 0 10px 0; font-size:20px;">
        Laporan Data Barang
    </div>

    <table border="1px" class="table">
      <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Stok Barang</th>
        <th>Kategori Barang</th>
      </tr>';
      $no = 1;
      if(@$_POST['cetak_barang']){
        $tampil = $brg->tampil_tgl(@$_POST['tgl_a'], @$_POST['tgl_b']);
      }else {
        $tampil = $brg->tampil();
      }
      while ($data = $tampil->fetch_object()){
        $content .= '
          <tr>
            <td align="center">'.$no++.'</td>
            <td>'.$data->nama_produk.'</td>
            <td>Rp. '.number_format($data->harga,2, ",", ".").'</td>
            <td>'.$data->stok.'</td>
            <td>'.$data->nama_kategori.'</td>
          </tr>
        ';
      }
 $content .= '     
    </table>
</page>
';



require('../assets/vendor/autoload.php');
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
$html2pdf->output('laporan_barang.pdf');
?>