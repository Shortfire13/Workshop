<?php
session_start();
include 'koneksi/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    //admin
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' ");
    $data = mysqli_fetch_array($query);
    if (($username == $data['username'])) {
        //$password_user = md5($password_user);
        if (($password == $data['password'])) {
            $_SESSION['submit'] = true;
            $_SESSION['username'] = $username;
            header("location:index.php?pesan=Login Admin Berhasil");
        } else {
            header("location:login.php?pesan=gagal");
        }
    
    

    } else{
        //mitra
        $query2 = mysqli_query($koneksi, "SELECT * FROM mitra WHERE username_mitra='$username' ");
        $data2 = mysqli_fetch_array($query2);
        if (($username == $data2['username_mitra'])) {
            //$password_user = md5($password_user);
            if (($password == $data2['password_mitra'])) {
                $_SESSION['submit'] = true;
                $_SESSION['username_mitra'] = $username;
                header("location:index.php?pesan=Login mitra Berhasil");
            } else {
                header("location:login.php?pesan=gagal");
            }
    
    

    } else {
        //user
        $query3 = mysqli_query($koneksi, "SELECT * FROM user WHERE username_user='$username' ");
        $data3 = mysqli_fetch_array($query3);
        if (($username == $data3['username_user'])) {
            $password = md5($password);
            if (($password == $data3['password_user'])) {
                $_SESSION['submit'] = true;
                $_SESSION['username_user'] = $username;
                header("location:index.php?pesan=Login Berhasil");
            } else {
                header("location:login.php?pesan=gagal login");
            }
    
    

            } else {
                header("location:login.php?pesan=gagal");
            }
        }
}

?>
