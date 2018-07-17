<?php
include("../admin/config.php");
if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
$id_supplier = $_GET["id_supplier"];
$delSup = "DELETE FROM supplier WHERE id_supplier = '$id_supplier'";
$resultSup = mysqli_query($koneksi, $delSup);

if($resultSup){
	echo "<script>alert('Data Supplier Berhasil Dihapus')</script>";
	echo "<script type='text/javascript'>window.location='supplier_view.php'</script>";
	// print_r($resultSup);
	// die;
} else {
	echo "<script>alert('Data Supplier Gagal Dihapus')</script>";
	echo "<script type='text/javascript'>window.location='supplier_view.php'</script>";
	// print_r($resultSup);
	// die;
}
?>