<?php
session_start();
ob_start();
require_once ('../koneksi/+koneksi.php');
require_once ('../models/database.php');
require ('../koneksi/koneksi.php');



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

$connection = new Database($host,$user,$pass,$database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mitra SiSEGAR</title>

    <!-- Bootstrap core CSS -->
   
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

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
            <li><a href="?page=laporan"><i class="fas fa-clipboard-list"></i> Laporan</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
          <?php
              if (isset($_SESSION["login"]) && isset($_SESSION["nama"]) && isset($_SESSION["id_user"])) {
              $nama_mitra = $_SESSION['nama'];

              echo "<li class='dropdown user-dropdown'>";
              echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='fa fa-user'></i> $nama_mitra <b class='caret'></b></a>";
              echo "<ul class='dropdown-menu'>";
              echo "<li><a href='#'><i class='fa fa-user'></i> Profile</a></li>";
              echo "<li><a href='#'><i class='fa fa-envelope'></i> Inbox <span class='badge'>7</span></a></li>";
              echo "<li><a href='#'><i class='fa fa-gear'></i> Settings</a></li>";
              echo "<li class='divider'></li>";
              echo "<li><a href='logout.php'><i class='fa fa-power-off'></i> Log Out</a></li>";
              echo "</ul>";
              echo "</li>";
              }
          ?>
 
              
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

      <?php
        if(@$_GET['page'] == 'dashboard' || @$_GET['page'] == ''){
          include "../views/dashboard.php";
        } elseif (@$_GET['page'] == 'barang') {
           include "../views/barang.php";
        }
      ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

  </body>
</html>