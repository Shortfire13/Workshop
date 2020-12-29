<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>SiSEGAR - Registrasi</title>
</head>
<body>


<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->    




<div class="body">
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-lx-9 card flex-row mx-auto px-0">
            <img src="assets/images/Vege.jpg" alt="" class="img-left d-none d-md-flex">
                   
                <div class="card-body">
                        <h4 class="title text-center mt-4">Registrasi</h4>
                        <!--PHP-->
              <?php
              if (isset($_GET['pesan'])) {
                $pesan = $_GET['pesan'];
                if ($pesan == "uname") {
                  ?>
                  <div class="alert alert-danger">
                  Username anda masukkan telah terdaftar
                  </div>
                <?php
                } if ($pesan == "pass") {
                  ?>
                  <div class="alert alert-danger">
                    Password konfirmasi anda tidak sama
                  </div>
                  <?php
                }if ($pesan == "nama") {
                  ?>
                  <div class="alert alert-danger">
                    Nama yang anda masukkan telah terdaftar
                  </div>
                  <?php
                }if ($pesan == "pass2") {
                  ?>
                  <div class="alert alert-danger">
                    Password harus lebih dari 6 huruf atau angka
                  </div>
                  <?php
                
                }

              }
              ?>
                        <form action="register-aksi.php" method="POST" class="form-box px-3">
                            <div class="form-input">
                                <span> <i class="fa fa-user"></i> </span>
                                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-envelope-o"></i> </span>
                                <input type="text" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-address-book"></i> </span>
                                <input type="text" name="notelp" placeholder="No Handphone" required>
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-address-book-o"></i> </span>
                                <input type="text" name="alamat" placeholder="Alamat" required>
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-lock"></i> </span>
                                <input type="password" name="password" placeholder="Password" required> 
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-lock"></i> </span>
                                <input type="password" name="repassword" placeholder="Konfirmasi Password" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-block btn-block text-uppercase">Daftar</button>
                            </div>
                            
                            <hr class="my-3">

                            <div class="text-center mb-2">
                                Sudah memiliki akun? <a href="login.php" class="register-link">Masuk Disini</a>
                            </div>


                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>


 <!-- jQuery -->
 <script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/mixitup.js"></script> 
<script src="assets/js/accordions.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

</body>
</html>