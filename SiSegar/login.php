<?php
session_start();

if (isset($_SESSION["login"])) {
    header('Location:index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>Login Form</title>
</head>
<body>
    <div class="body">
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-lx-9 card flex-row mx-auto px-0">

                    <img src="assets/images/Vege.jpg" alt="" class="img-left d-none d-md-flex">
                   
                <div class="card-body">
                        <h4 class="title text-center mt-4">SiSEGAR</h4>
                        <?php
                  if (isset($_GET['pesan'])) {
                    $pesan = $_GET['pesan'];
                    if ($pesan == "gagal") {
                      ?>
                      <div class="alert alert-danger">
                      <strong>Login Gagal.</strong> Coba periksa username atau password Anda.
                      </div>
                    <?php
                    }
                  }
                  ?>
                        <form action="login-aksi.php" method="POST" class="form-box px-3">
                            <div class="form-input">
                                <span> <i class="fa fa-envelope-o"></i> </span>
                                <input type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-key"></i> </span>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1" name="remember">
                                    <Label class="custom-control-label" for="cb1">Ingat saya</Label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-block btn-block text-uppercase" name="submit">Masuk</button>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="text-center" mb-2>
                                <a href="#" class="forget-link">Lupa Password?</a>
                            </div>

                            <div class="text-center mb-2">
                                Belum memiliki akun? <a href="register.php" class="register-link">Daftar Disini</a>
                            </div>


                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>   
</body>
</html>