<?php

session_start();  
require 'koneksi/koneksi.php';

$nama_user = $_POST['nama'];
$username_user = $_POST['username'];
$password_user = $_POST['password'];
$repassword = $_POST['repassword'];

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['nama']) && isset($_POST['repassword'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username_user = validate($_POST['username']);
        $password_user = validate($_POST['password']);
        $repassword = validate($_POST['repassword']);
        $nama_user = validate($_POST['nama']);

        $user_data = 'username='. $username_user. '&nama='. $nama_user;


        if (empty($username_user)) {
            header("Location: register.php?error=User Name is required&$user_data");
            exit();
        } elseif (empty($password_user)) {
            header("Location: register.php?error=Password is required&$user_data");
            exit();
        } elseif (empty($repassword)) {
            header("Location: register.php?error=Repassword is required&$user_data");
            exit();
        } elseif (empty($nama_user)) {
            header("Location: register.php?error=Name is required&$user_data");
            exit();
        } elseif (strlen($password_user)  < 6) {
            header("Location: register.php?pesan=pass2");
            exit();
        } elseif ($password_user !== $repassword) {
            header("Location: register.php?pesan=pass");
            exit();
        } else {



            $sqluname = "SELECT * FROM user WHERE username_user='$username_user' ";
            $result = mysqli_query($koneksi, $sqluname);
            $sqlname = "SELECT * FROM user WHERE nama_user='$nama_user'";
            $result2 = mysqli_query($koneksi, $sqlname);
            if (mysqli_num_rows($result) > 0) {
                header("Location: register.php?pesan=uname");
                exit();
            } if (mysqli_num_rows($result2) > 0) {
                header("Location: register.php?pesan=nama");
                exit();
            }             
            else {
                $sql = "INSERT INTO user VALUES('','$nama_user','$username_user', '$password_user', '' ,  '')";
                $result2 = mysqli_query($koneksi, $sql);
                if ($result2) {
                    header("Location: login.php?success=Your account has been created successfully");
                    exit();
                } else {
                    header("Location: register.php?error=unknown error occurred&$user_data");
                    exit();
                }
            }
        }
    }
else{
    header("Location: register.php?Error");
    exit();
}

?>