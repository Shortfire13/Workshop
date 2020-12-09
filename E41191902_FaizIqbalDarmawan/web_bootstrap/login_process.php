<?php
session_start();
include 'koneksi.php';
$email = $_POST['email'];
$password = $_POST['password'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email' ");
$data = mysqli_fetch_array($query);
if (($email == $data['email'])&&($password == $data['password'])) {
    header("location:index.php?pesan=berhasil");
    $_SESSION['status'] = "login";
    $_SESSION['email'] = $email;
}else {
    header("location:login.php?pesan=gagal");
}
?>
