<?php
include("../admin/config.php");
if (!isset($_SESSION["username"])) {
    echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
}

$id_transaksi = $_GET["id_transaksi"];
$del_transaksi = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
$result_transaksi = mysqli_query($koneksi, $del_transaksi);

if($result_transaksi){
	echo "<script>alert('Data Transaksi Berhasil Dihapus')</script>";
	echo "<script type='text/javascript'>window.location='transaksi_view.php'</script>";
	// print_r($result_transaksi);
	// die;
} else {
	echo "<script>alert('Data Transaksi Gagal Dihapus')</script>";
	echo "<script type='text/javascript'>window.location='transaksi_view.php'</script>";
	// print_r($result_transaksi);
	// die;
}
?>