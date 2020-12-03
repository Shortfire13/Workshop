<?php
	require "koneksi.php";
	session_start();
	$email = $_POST["email"];
	$password =  $_POST["password"];

	$sql = "select * from tb_login where email='$email'";
	$query = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($query);
	if($data["password"] ==  $password && $data["email"] == $email){
		header("location: index.php?pesan=berhasil");
		$_SESSION["login"] = 1;
		$_SESSION["id"] = $data["id"];
	}else{
		header("location: login.php?pesan=gagal");
	}

?>

