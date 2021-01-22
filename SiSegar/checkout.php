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

    if (!isset($_SESSION["login"])) {
        header('Location:login.php');
        exit;
    }
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
                        <a href="index.php" class="logo">Si <em> Segar</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="checkout.php" class="active">Checkout</a></li>
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Ayo <em>Bayar !!</em></h2>
                        <p>SEGERA LAKUKAN TRANSAKSI AGAR PESANANMU CEPAT SAMPAI</p>
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
                        <form id="contact" action="checkout-proses.php" method="post">
                        <?php
                        $id = $_SESSION['id_user'];
                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
                        $data = mysqli_fetch_array($query);
                        $subtotal = $_GET['total'];
                        $ongkir = 5000;
                        $total = $subtotal + $ongkir;
                        ?>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Nama:</label>
                                     <input type="text" name="nama" value="<?php echo $data['nama_user']; ?>" disabled>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>No. Tlpn/WA:</label>
                                     <input type="number" name="telepon" value="<?php echo $data['no_tlp']; ?>" require>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Lokasi Pengiriman:</label>
                                     <input type="text" name="lokasi" value="<?php echo $data['alamat']; ?>" require>
                                     <input type="hidden" name="total" value="<?php echo $total; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="keranjang.php">Back</a>
                                        <button type="submit">Finish</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                </div>

                <div class="col-md-4">
                    <ul class="list-group list-group-no-border">
                      <li class="list-group-item" style="margin:0 0 -1px">
                         <div class="row">
                            <div class="col-6">
                                <strong>Sub-total</strong>
                            </div>

                            <div class="col-6">
                                <h5 class="text-right">Rp <?php echo number_format($subtotal,0,'','.');?></h5>
                            </div>
                         </div>
                      </li>

                      <li class="list-group-item" style="margin:0 0 -1px">
                         <div class="row">
                            <div class="col-6">
                                <strong>Ongkir</strong>
                            </div>

                            <div class="col-6">
                                <h5 class="text-right">Rp <?php echo number_format($ongkir,0,'','.');?></h5>
                            </div>
                         </div>
                      </li>
                      <li class="list-group-item" style="margin:0 0 -1px">
                         <div class="row">
                            <div class="col-6">
                                <h4><strong>Total</strong></h4>
                            </div>

                            <div class="col-6">
                                <h4 class="text-right">Rp <?php echo number_format($total,0,'','.');?></h4>
                            </div>
                         </div>
                      </li>
                    </ul>

                    <br>
                </div>
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