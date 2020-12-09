<?php

	session_start();
    include 'koneksi.php';
    $email = $_POST['email'];
	$password = $_POST['password'];
	
    $sql = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");
    $data = mysqli_fetch_array($sql);

    if($email == $data['email']){
        if($password == $data['password']){
			header("location:index.php?pesan=berhasil");
			$_SESSION['status'] = "aktif";
            $_SESSION['email'] = $email;
        } else {
			header("location:login.php?pesan=gagal");
		}
	}else {
		header("location:login.php?pesan=emailSalah");
	}
?>