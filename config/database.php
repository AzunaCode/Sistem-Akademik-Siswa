<?php 
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$db_name = "siakadsmk";

	//conection to the database
	$koneksi = new mysqli($hostname, $username, $password, $db_name);

	//cek koneksi
	if ($koneksi->connect_errno) {
		printf("connect failed: %s\n", $koneksi->connect_error);
		exit;
	}

 ?>