<?php

include "database.php";

$query = "DELETE FROM orang WHERE id='$_GET[id]'";
$data = $db->prepare($query);
$data->execute();

//redirect ke index.php
header("location: index.php");