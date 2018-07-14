<?php 
	session_start();
	if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
  	}
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "uas_pwl";
	$koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$koneksi){
		die("Koneksi dengan database gagal!");
	}
?>