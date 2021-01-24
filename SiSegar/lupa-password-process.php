<?php
    session_start();
    require_once "koneksi/koneksi.php";


    $username = $_POST["username"];
    $no_telp = $_POST["notelp"];

    // Cek email sudah terdaftar atau belum
    $sql = "SELECT * FROM user WHERE username_user='$username'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    if($data['no_tlp'] !== $no_telp){
        header("Location: lupa-password.php?pesan=telp-not-found");
        if($data['username_user'] !== $username){
            header("Location: lupa-password.php?pesan=not-found");
        }
    }else{

        $_SESSION["id_user"] = $data['id_user'];
        header("Location: lupa-password-form.php");
    }

    
?>