<?php
	include("../admin/config.php");
	if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
	$id_jenis_barang = $_GET["id_jenis_barang"];
	$delJB = "DELETE FROM jenis_barang WHERE id_jenis_barang = '$id_jenis_barang'";
	$resultJB = mysqli_query($koneksi, $delJB);

	if($resultJB){
		echo "<script>alert('Data Jenis Barang Berhasil Dihapus')</script>";
		echo "<script type='text/javascript'>window.location='jenis_barang_view.php'</script>";
		// print_r($resultJB);
		// die;
	} else {
		echo "<script>alert('Data Jenis Barang Gagal Dihapus')</script>";
		echo "<script type='text/javascript'>window.location='jenis_barang_view.php'</script>";
		// print_r($resultJB);
		// die;
	}
?>