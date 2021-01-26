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
                        <a href="index.php" class="logo">SI SEGAR <em> Website</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Riwayat <em>Transaksi</em></h2>
                        <p>Cek Transaksimu Disini</p>
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
                
                 <table class="table table-hover table-bordered" style="margin-top: 10px">
                    <tr class="success">
                        <th>No</th>
                        <th>id transaksi</th>
                        <th>tgl Beli</th>
                         <th>alamat</th>
                         <th>sub total</th>
                          <th>Status</th> 
                           <th>Action</th>                       
                  
                    </tr>
                     <?php
                      include_once "koneksi/koneksi.php";
                  
                        $id = $_SESSION['id_user'];
                $query_mysql = mysqli_query($koneksi, "SELECT * FROM transaksi t INNER JOIN user u ON t.id_user = u.id_user WHERE u.id_user = '$id' ");
                $no = 1;
                while ($data = mysqli_fetch_array($query_mysql)) {
                     ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['id_transaksi'];?></td>
                        <td><?php echo $data['tgl_beli'];?></td>
                       <td><?php echo $data['alamat'];?></td>
                        <td><?php echo $data['total'];?></td>
                         <td><?php echo $data['status'];?></td>
                          <td>
                            <?php if ($data['status'] != 'Barang Sudah Sampai'): ?>
                                <a href="riwayat.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-warning btn-md">Konfirmasi</a> |
                            <?php endif ?>
                            <a href="detailriwayat.php?id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-warning btn-md">Detail</a>
                        </td> 
                    </tr>
                 <?php } ?>
                    
                 </table>
              </div>
            </div>
            
        </div>
    </section>
    <?php  
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($koneksi,"UPDATE transaksi SET status='Barang Sudah Sampai' WHERE id_transaksi=$id");
            header('Location: riwayat.php?pesan=konfrimasiberhasil');
        }
    ?>
    <!-- ***** Blog End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Sisegar
                        
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