<?php
require_once('koneksi.php');
	
 
	if(!empty($_POST['nm_brg'])){
	 
		$nm_brg = $_POST['nm_brg'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];
		
		$id = $_POST['id_brg'];
		
		$data[] = $nm_brg;
		$data[] = $stok;
		$data[] = $harga;
	
		$data[] = $id;
		
		
		
		$sql = 'UPDATE barang SET nm_brg=?,stok=?,harga=? WHERE id_brg=?';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		
		
		echo '<script>alert("Berhasil Edit Data");window.location="index.php"</script>';
	}
	
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
						 
						 <input type="hidden" value="<?php echo $hasil['id_brg'];?>" name="id_brg">
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>