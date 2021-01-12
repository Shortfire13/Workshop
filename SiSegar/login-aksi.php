<?php
session_start();
require 'koneksi/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    //Login Mitra
    $query = mysqli_query($koneksi, "SELECT * FROM mitra WHERE username_mitra='$username' ");
    $data = mysqli_fetch_array($query);
    if (($username == $data['username_mitra'])) {
        if (($password == $data['password_mitra'])) {

            //Session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data3['username_mitra'];
            $_SESSION['id'] = $data3['id_mitra'];

            //Remember Me
            if( isset($_POST['remember']) ){
                //Buat Cookie
                setcookie('id', $data['id_mitra'],time() + 3600);
                setcookie('key', hash('sha256', $data['username_mitra'], time() + 3600));
            }

            header("location:mitra/index.php?pesan=Login Mitra Berhasil");
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

                //Session
                $_SESSION['login'] = true;
                $_SESSION['username_user'] = $data3['username_user'];
                $_SESSION['id_user'] = $data3['id_user'];

            //Remember Me
            if( isset($_POST['remember']) ){
                //Buat Cookie
                setcookie('id', $data['id_user'],time() + 3600);
                setcookie('key', hash('sha256', $data['username_user'], time() + 3600));
            }

                header("location:index.php?pesan=Login User Berhasil");
            } else {
                header("location:login.php?pesan=gagal");
            }
    
            } else {
                header("location:login.php?pesan=gagal");
            }
        }

?>
