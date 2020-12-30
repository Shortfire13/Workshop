<?php
	$user  = 'root';
	$pass = '';
	try {
		
		$koneksi = new PDO('mysql:host=localhost;dbname=databasePDO;',$user,$pass);
		
		$koneksi->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}catch (PDOException $e) {
	
		print "Koneksi atau query bermasalah : " . $e->getMessage() . "<br/>";
		die();
	}
	
?>