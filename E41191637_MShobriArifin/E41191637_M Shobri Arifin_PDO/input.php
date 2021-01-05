<?php

include "database.php";

$query = "INSERT INTO orang Values ('NULL', '$_POST[nama]', '$_POST[alamat]')";
$data = $db->prepare($query);

//jalankan perintah query SQL
$data->execute();
//redirect to index.php
header("location: index.php");