<?php
session_start();
include 'koneksi/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    //Login Mitra
    $query = mysqli_query($koneksi, "SELECT * FROM mitra WHERE username_mitra='$username' ");
    $data = mysqli_fetch_array($query);
    if (($username == $data['username_mitra'])) {
        if (($password == $data['password_mitra'])) {
            header("location:index.php?pesan=Login Mitra Berhasil");
        } else {
            header("location:login.php?pesan=gagal");
        }
    
    
    }else{
        //Login User
        $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username_user='$username' ");
        $data2 = mysqli_fetch_array($query2);
        if (($username == $data2['username_user'])) {
            //Buka Enkripsi
            $password = md5($password);

            if (($password == $data2['password_user'])) {
                header("location:mitra/index.php?pesan=Login User Berhasil");
            } else {
                header("location:login.php?pesan=gagal");
            }
    
            } else {
                header("location:login.php?pesan=gagal");
            }
        }

?>
