<?php
    session_start();
    require_once "koneksi/koneksi.php";

    $id_user = $_SESSION["id_user"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    $query = mysqli_query($koneksi, "UPDATE user SET password_user='$password' where id_user='$id_user'");

    // Verifikasi password baru
    if($password !== $repassword){
        header("Location: lupa-password-form.php?pesan=tidak-cocok");
    }
    if($query){
        header("Location: login.php?pesan=berhasil");
    }
?>