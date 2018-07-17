<?php
include("../admin/config.php");
if (!isset($_SESSION["username"])) {
    echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
}

$id_barang = $_GET["id_barang"];
$delBarang = "DELETE FROM barang WHERE id_barang = '$id_barang'";
$resultBarang = mysqli_query($koneksi, $delBarang);

if($resultBarang){
	echo "<script>alert('Data Barang Berhasil Dihapus')</script>";
	echo "<script type='text/javascript'>window.location='barang_view.php'</script>";
	// print_r($resultBarang);
	// die;
} else {
	echo "<script>alert('Data Barang Gagal Dihapus')</script>";
	echo "<script type='text/javascript'>window.location='barang_view.php'</script>";
	// print_r($resultBarang);
	// die;
}
?>