<?php
require_once('koneksi.php');
	
	// berikut script untuk proses edit barang ke database 
	if(!empty($_POST['nm_brg'])){
		// menangkap data post 
		$nm_brg = $_POST['nm_brg'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$id = $_POST['id_brg'];
		
		$data[] = $nm_brg;
		$data[] = $stok;
		$data[] = $harga;
		$data[] = $tgl_masuk;
		$data[] = $id;
		
		// simpan data barang
		
		$sql = 'UPDATE barang SET nm_brg=?,stok=?,harga=?,tgl_masuk=? WHERE id_brg=?';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		
		// redirect
		echo '<script>alert("Berhasil Edit Data");window.location="index.php"</script>';
	}
	// untuk menampilkan data barang berdasarkan id barang
	$id = $_GET['id'];
	$sql = "SELECT *FROM barang WHERE id_brg= ?";
	$row = $koneksi->prepare($sql);
	$row->execute(array($id));
	$hasil = $row->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Barang - <?php echo $hasil['nm_brg'];?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Edit Barang - <?php echo $hasil['nm_brg'];?></h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
						 <div class="form-group">
							 <label>Nama Barang</label>
							 <input type="text" value="<?php echo $hasil['nm_brg'];?>" class="form-control" name="nm_brg">
						 </div>
						 <div class="form-group">
							 <label>Stok</label>
							 <input type="number" value="<?php echo $hasil['stok'];?>" class="form-control" name="stok">
						 </div>
						 <div class="form-group">
							 <label>Harga Barang</label>
							 <input type="text" value="<?php echo $hasil['harga'];?>" class="form-control" name="harga">
						 </div>
						 <div class="form-group">
							 <label>Tanggal</label>
							 <input type="date" value="<?php echo $hasil['tgl_masuk'];?>" class="form-control" name="tgl_masuk">
						 </div>
						 <input type="hidden" value="<?php echo $hasil['id_brg'];?>" name="id_brg">
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>