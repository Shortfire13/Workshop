<?php

  require 'koneksi/koneksi.php';
  session_start();
  
      //set cookie
      if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
          $id = $_COOKIE['id'];
          $key = $_COOKIE['key'];
  
          //ambil username berdasarkan id
          $result = mysqli_query($koneksi, "SELECT username FROM admin WHERE id_admin = $id");
          $data = mysqli_fetch_assoc($result);
          
          //cek cookie dan username
          if ($key === hash('sha256', $data['username'])) {
              $_SESSION['login'] = true;
          }
      }
  
  
  
  $id_produk = $_GET["id_produk"];
  $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk' ");
  $data = mysqli_fetch_array($produk);
  $p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Si Segar </title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

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
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Si Segar<em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                             <?php
                                if (isset($_SESSION["login"]) && isset($_SESSION["username_user"]) && isset($_SESSION["id_user"])) {
                                    $username = $_SESSION['username_user'];

                                    echo "<li class='dropdown'>";
                                    echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>Halo, $username </a>";
                                    echo "<div class='dropdown-menu'>";
                                    echo "<a class='dropdown-item' href='profile.php'>Profile Saya</a>";
                                    echo "<a class='dropdown-item' href='keranjang.php'>Keranjang</a>";
                                    echo "<a class='dropdown-item' href='riwayat.php'>Riwayat Transaksi</a>";
                                    echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                                    echo "</div>";
                                    echo "</li>";
                                } else {
                                    echo "<li></li>";
                                    echo "<li><a href='register.php'>Daftar</a></li>";
                                    echo "<li><a href='login.php'>Masuk</a></li>";
                                }
                            ?> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Produk Detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section">
        <div class="container">
            <br>
            <br>

            <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">

                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100 image-size" src="assets/img/barang/<?php echo $data['foto_produk'] ?>" alt="First slide">
                    </div>
                  </div>
                </div>

                <br>
              </div>

              <div class="col-md-4">
                <div class="contact-form">
                <form action="tambah-keranjang.php?idproduk=<?php echo $id_produk;?>" method='GET'>
                  <div class="form-group">
                      <h2><?php echo $data['nama_produk']; ?></h2>
                      <hr>
                      <h6>Harga : Rp <?php echo number_format($data['harga'],0,'','.'); ?> </h6>
                      <h6>Stok : <?php echo $data['stok'];?> <strong>@<?php echo $data['berat'];?>gram<strong></h6>
                      <br>
                      <h5>Deskripsi :</h5>
                      <p><?php echo $data['deskripsi']; ?></p>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Quantity</label>
                        <input type="hidden" name="id_produk" value="<?php echo $id_produk;?>">
                        <input type="number" placeholder="1" name="jumlah" min="1" max="<?php echo $data['stok']?>" required>
                      </div>
                    </div>
                    
                    <div class="main-button">
                        <button class='btn btn-primary' type='submit'>
                          Tambah Keranjang
                        </button>
                    </div>
                  </form>
                </div>

                <br>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <?php include 'footer.php'?>
  
    

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
