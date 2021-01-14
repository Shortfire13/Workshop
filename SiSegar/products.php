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
                            <li class='dropdown'>
                            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Menu</a>
                            <div class='dropdown-menu'>
                            <a class='dropdown-item' href='blog.php'>Keranjang</a>
                            <a class='dropdown-item' href='profile.php'>MY Profile</a>
                             <a class='dropdown-item' href='testimonials.php'>Testimonials</a>
                                    <a class='dropdown-item' href='logout.php'>Logout</a>
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
                        <h2>Kesegaran Bagimu Adalah</h2>
                        <h2><em>Kepuasan Kami</em></h2>
                        <p>Dapatkan Bahan-Bahan Masakmu Disini !!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->

    <section class="section" id="trainers">
        <div class="container">

            <div class="row">
                  <div class="container">
    <div class="search-box">
  <form action="products.php" class="form-inline">
    <input class="form-control mr-sm-3" type="search" name="cari" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button> 

  </form>

</div>
</div>
            <?php
            session_start();
            include_once "koneksi/koneksi.php";
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $query_mysql = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$cari%'");
            }else{
                $query_mysql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk");
            }
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
            
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/<?php echo $data['foto_produk'] ?>">
                        </div>
                        <div class="down-content">  
                            <h4><?php echo $data['nama_produk']?></h4>
                            <h4>Rp.<?php echo $data['harga'] ?></h4>
                            
                           <ul>
                                <a href="product-details.php?id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-warning btn-md">Beli Sekarang</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
        <br>
    </section>
    <footer>
        <div class="footer">
            <p><a href="#">Fanspage</a> || <a href="#">Instagram</a> || <a href="#">Facebook</a>
            <br>&copy Copyright SiSegar 2020</p>
        </div>
    </footer>

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