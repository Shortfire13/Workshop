<?php
  session_start();
  
  $koneksi = new mysqli('localhost','root','','db_sisegar');

  echo "<pre>";
  print_r($_SESSION['keranjang']);
  echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Si Segar</title>

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
                        <a href="index.php" class="logo">Food Store <em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="checkout.php" class="active">Checkout</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.php">About Us</a>
                                    <a class="dropdown-item" href="blog.php">Blog</a>
                                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                    <a class="dropdown-item" href="terms.php">Terms</a>
                                </div>
                            </li>
                            <li><a href="contact.php">Yuk Jualan</a></li> 
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Keranjang <em>Belanja</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                           <div class="row">
                             <table class="table table-border text-center">
                               <thead>
                                 <tr>
                                   <th class="text-center">No</th>
                                   <th class="text-center">Id Produk</th>
                                   <th class="text-center">Nama Produk</th>
                                   <th class="text-center">Jumlah Beli</th>
                                   <th class="text-center">SubTotal</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php foreach ($_SESSION['keranjang']  as $id_produk => $jumlah); ?>
                                 <?php 
                                 $ambil = $koneksi->query("SELECT * FROM barang Where id_barang = $id_produk");
                                 $pecah = $ambil->fetch_assoch();
                                 echo "<pre>";
                                 print_r($pecah);
                                 echo "</pre>";
                                 ?>
                                 <tr>
                                   <td></td>
                                 </tr>
                               </tbody>
                             </table>
                                <!-- <div class="col-sm-6 col-xs-12">
                                     <label>Title:</label>
                                     <select data-msg-required="This field is required.">
                                          <option value="">-- Choose --</option>
                                          <option value="dr">Dr.</option>
                                          <option value="miss">Miss</option>
                                          <option value="mr">Mr.</option>
                                          <option value="mrs">Mrs.</option>
                                          <option value="ms">Ms.</option>
                                          <option value="other">Other</option>
                                          <option value="prof">Prof.</option>
                                          <option value="rev">Rev.</option>
                                     </select>
                                </div> 
                                <div class="col-sm-6 col-xs-12">
                                     <label>Nama:</label>
                                     <input type="text" require>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Email:</label>
                                     <input type="text" require>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>No. Tlpn/WA:</label>
                                     <input type="text" require>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Alamat:</label>
                                     <input type="text" require>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Kota:</label>
                                     <input type="text" require>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Kecamatan:</label>
                                     <input type="text" require>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Desa:</label>
                                     <input type="text" require>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Metode Pembayaran</label>
                                     
                                     <select>
                                          <option value="">-- Pilih --</option>
                                          <option value="bank">Transfer Bank</option>
                                          <option value="cash">Tunai</option>
                                     </select>
                                </div>
                           </div>-->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <div class="float-left">
                                            <a href="index.php">Lanjut Belanja</a>
                                        </div>

                                        <div class="float-right ml-4">
                                            <a href="checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                </div>
        </div>
    </section>

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
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