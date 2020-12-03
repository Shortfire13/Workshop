<?php
	$koneksi = mysqli_connect("localhost","root","","webbootstrap");

	if(mysqli_connect_error()){
		echo "koneksi database gagal :".mysql_connect_error(); 
	}
	?>