<?php
require 'koneksi/koneksi.php';
session_start();

    //set cookie
    if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        //ambil username berdasarkan id
        $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE id_admin = $id");
        $data = mysqli_fetch_assoc($result);
        
        //cek cookie dan username
        if ($key === hash('sha256', $data['username'])) {
            $_SESSION['login'] = true;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
<?php
	if (isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if ($pesan == "input"){
			echo "Data berhasil di input";
		} elseif($pesan == "update") {
			echo "Data berhasil di update";
		} elseif ($pesan == "hapus") {
			echo "Data berhasil di hapus";
		}
	}
	?>
        <h1>Form produk</h1>
        <form action="saveimage-aksi.php" method="post">
            <table>
                <tr>
                    <td>Nama Produk :</td>
                    <td><input type="text" name="nama_produk"></td>
                </tr>
                <tr>
                    <td>harga :</td>
                    <td><input type="text" name="harga"></td>
                </tr>
                <tr>
                    <td>Stok :</td>
                    <td><input type="text" name="stok"></td>
                </tr>
                <tr>
                    <td>Berat :</td>
                    <td><input type="text" name="berat"></td>
                </tr>
                <tr>
                    <td>Pilih File : </td>
                    <td><input type="file" name=""> <input type="submit" value="Upload"></td>
                </tr>
                <tr>
                    <td>Deskripsi :</td>
                    <td><input type="text" name="deskripsi"></td>
                </tr>
                <tr>
                    <td></td>
				    <td><input type="submit" name="Simpan"></td>
    			</tr>
            </table>
        </form>
</body>
</html>