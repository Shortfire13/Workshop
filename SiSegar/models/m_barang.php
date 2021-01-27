<?php
class Barang {

    private $mysqli;

    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori";
        if($id != null){
            $sql .= " WHERE id_produk = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tampil_tgl($tgl1, $tgl2){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM produk WHERE tgl_masuk BETWEEN '$tgl1' AND '$tgl2'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($id_kategori, $nama_produk, $harga, $stok, $berat, $foto_produk , $deskripsi){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO produk VALUES ('','$id_kategori','$nama_produk','$harga','$stok','$berat','$foto_produk','$deskripsi', now())") or die ($db->error); 
    }

    public function edit($sql) {
      $db = $this->mysqli->conn;
      $db->query($sql) or die ($db->error);
    }

    public function hapus($id){
      $db = $this->mysqli->conn;
      $db->query("DELETE FROM produk WHERE id_produk = '$id'") or die ($db->error);
    }

    function __desctruct(){
      $db = $this->mysqli->conn;
      $db->close();
    }
}

?>