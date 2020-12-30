<?php
require_once('koneksi.php');

	
	if(!empty($_POST['nm_brg'])){
		
		$nm_brg = $_POST['nm_brg'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];

		$data[] = $nm_brg;
		$data[] = $stok;
		$data[] = $harga;
		
		
		
		
		$sql = 'INSERT INTO barang (nm_brg,stok,harga)VALUES (?,?,?)';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		echo '<script>alert("Berhasil Tambah Data");window.location="index.php"</script>';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Barang</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Tambah Barang</h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
						 <div class="form-group">
							 <label>Nama Barang</label>
							 <input type="text" value="" class="form-control" name="nm_brg">
						 </div>
						 <div class="form-group">
							 <label>Stok</label>
							 <input type="number" value="" class="form-control" name="stok">
						 </div>
						 <div class="form-group">
							 <label>Harga Barang</label>
							 <input type="text" value="" class="form-control" name="harga">
						 </div>
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Create</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>