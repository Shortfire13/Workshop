<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Si Segegar </title>

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
                        <a href="index.php" class="logo">SI SEGAR <em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <li><a href="riwayat.php">Riwayat Transaksi</a></li> 
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Read our <em>Blog</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
       <div class="container">
            <div class="row">
                 <div class="col-lg-12">
                 <br/>
                 <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                 <table class="table table-hover table-bordered" style="margin-top: 10px">
                    <tr class="success">
                        
                        <th>id transaksi</th>
                        <th>id produk</th>
                        <th>tgl Beli</th>
                        <th>status</th>
                         <th>alamat</th>
                         <th>sub total</th>
                          <th>total</th> 
                           <th>opsi bayar</th>                       
                  
                    </tr>
                     <?php
                      include_once "koneksi/koneksi.php";
                    session_start();
                        $id = $_SESSION['id_user'];
                    $query_mysql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_user = '$id' ");
                    while ($data = mysqli_fetch_array($query_mysql)) {
                     ?>
                    <tr>
                        
                        <td><?php echo $data['id_transaksi']?></td>
                        <td><?php echo $data['id_produk'];?></td>
                        <td><?php echo $data['tgl_beli'];?></td>
                        <td><?php echo $data['status'];?></td>
                        <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['sub_total'];?></td>
                        <td><?php echo $data['total'];?></td>
                        <td><?php echo $data['opsi_bayar'];?></td>
                       
                    </tr>
                 
                    
                 </table>
              </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- ***** Blog End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
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