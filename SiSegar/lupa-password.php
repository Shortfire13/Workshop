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
    <title>SiSegar - Lupa Password</title>
</head>
<body>
    <div class="body">
    <div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-lx-9 card flex-row mx-auto px-0">

                   
                <div class="card-body">
                        <h4 class="title text-center mt-4">Lupa Password</h4>
                        <?php
                  if (isset($_GET['pesan'])) {
                    $pesan = $_GET['pesan'];
                    if ($pesan == "not-found") {
                        ?>
                      <div class="alert alert-danger">
                      <strong>Username</strong> yang anda masukkan salah.
                      </div>
                    <?php
                    }if ($pesan == "telp-not-found"){
                        ?>
                        <div class="alert alert-danger">
                        <strong>No Telepon</strong> yang anda masukkan salah.
                        </div>
                    <?php
                    }
                  }
                  ?>
                        <form action="lupa-password-process.php" method="POST" class="form-box px-3">
                            <div class="form-input">
                                <span> <i class="fa fa-envelope-o"></i> </span>
                                <input type="text" name="username" placeholder="Masukkan username yang terdaftar.." required>
                            </div>
                            <div class="form-input">
                                <span> <i class="fa fa-key"></i> </span>
                                <input type="text" name="notelp" placeholder="Masukkan no telepon yang terdaftar.."onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="15"  required>
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-block btn-block text-uppercase" name="submit">Submit</button>
                            </div>



                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>   
</body>
</html>