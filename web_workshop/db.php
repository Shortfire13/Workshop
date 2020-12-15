<?php
$koneksi = mysqli_connect("localhost","root","","db_sisegar");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal :".mysqli_connect_error();
}
?>