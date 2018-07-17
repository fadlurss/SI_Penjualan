<?php
	session_start();
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "uas_pwl";
	$koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$koneksi){
		die("Koneksi dengan database gagal!");
	}
?>
