<?php
session_start();
ob_start();
require_once ('../koneksi/+koneksi.php');
require_once ('../models/database.php');

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
  header('Location: ../login.php');
  exit;
}

$connection = new Database($host,$user,$pass,$database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN SiSEGAR</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>

    <!-- Add custom CSS here -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">
              <img src="../assets/img/logo/logofix.png" width="85" height="30">
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="?page=barang"><i class="fas fa-truck"></i> Data Barang</a></li>
            <li><a href="?page=pembelian"><i class="fas fa-shopping-cart"></i> Data Pembelian</a></li>
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
              <!--<ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>-->
        </div><!-- /.navbar-collapse -->
      </nav>

      <script src="../assets/js/jquery-1.10.2.js"></script>
      <div id="page-wrapper">

      <?php
        if(@$_GET['page'] == 'dashboard' || @$_GET['page'] == ''){
          include "../views/dashboard.php";
        } elseif (@$_GET['page'] == 'barang') {
           include "../views/barang.php";
        } elseif (@$_GET['page'] == 'pembelian') {
          include "../views/pembelian.php";
        } elseif (@$_GET['page'] == 'tambahproduk') {
          include "../views/.modal_brg_add.php";
        }elseif (@$_GET['page'] == 'detail') {
          include "../views/detail.php";
        }
      ?>

    </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready( function () {
          $('#datatables').DataTable();
      } );
    </script>

  </body>
</html>