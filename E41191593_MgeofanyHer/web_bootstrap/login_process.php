

<?php
    session_start();
    include 'koneksi.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $querysql = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");
    $data = mysqli_fetch_array($querysql);

    if($email == $data['email']){
        if($password == $data['password']){
            $_SESSION['email'] = $email;
            header("location:index.php?pesan=berhasil");
        } else {
            header("location:login.php?pesan=passwordSalah");
        }
     }else{
            header("location:login.php?pesan=emailSalah");
        }
    ?>