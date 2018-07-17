<?php include '../admin/config.php';
$nama_barang = $_GET['nama_barang'];
$query = mysqli_query($koneksi, "SELECT * from barang where nama_barang='$nama_barang'");
$barang = mysqli_fetch_array($query);
$data = array(
            'harga' => $barang['harga'],);
 echo json_encode($data);
?>