<?php
class Barang {

    private $mysqli;

    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function tampil($id = null){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM barang";
        if($id != null){
            $sql .= " WHERE id_brg = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($nm_brg, $hrg_brg, $st_brg, $gbr_brg , $desc_brg, $ktg_brg){
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO barang VALUES ('','$nm_brg','$hrg_brg','$st_brg','$gbr_brg','$desc_brg','$ktg_brg')") or die ($db->error); 
    }

    public function edit($sql) {
      $db = $this->mysqli->conn;
      $db->query($sql) or die ($db->error);
    }

    public function hapus($id){
      $db = $this->mysqli->conn;
      $db->query("DELETE FROM barang WHERE id_brg = '$id'") or die ($db->error);
    }

    function __desctruct(){
      $db = $this->mysqli->conn;
      $db->close();
    }
}

?>