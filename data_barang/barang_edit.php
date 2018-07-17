<?php
	include "../admin/config.php";
    if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
	$getIdBarang = $_GET["id_barang"];
	$editBarang = "SELECT * FROM barang WHERE id_barang = '$getIdBarang'";
	$resultBarang = mysqli_query($koneksi, $editBarang);
	$dataBarang = mysqli_fetch_array($resultBarang);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Edit Data Barang</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
       
    </head>
    <body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="../index.php" class="simple-text">
                        SI Penjualan
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="../index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard Utama</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../data_barang/barang_view.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Data Jenis Barang</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../data_supplier/supplier_view.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Data Supplier</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../data_pengeluaran/pengeluaran_view.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Data Pengeluaran</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#pablo"> Tabel Barang </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-12">
                	<div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
    </div>
    <br>
    <div class="container">
    	<div class="container-fluid">
    		<div class="fresh-datatables toolbar-color-blue">
    		<?php
				if(!isset($_POST['submit'])){
			?>
    			<form enctype="multipart/form-data" method="post">
    				<div class="form-group row">
    					<div class="form-group col-md-6">
                  	<label>Nama Jenis Barang</label>
                  		<input type="text" hidden="" name="id_barang" value="<?= $dataBarang[0]; ?>">
                  		<input type="text" class="form-control" placeholder="Nama Jenis Barang" name="nama_barang" value="<?= $dataBarang[1]; ?>">
                    <label style="color: #000">Jenis Barang</label>
                    <select name="jenis_barang" class="form-control">
                        <option value="<?= $dataBarang[2]; ?>">-- PILIH --</option>
                        <?php
                            $queryJB = "SELECT id_jenis_barang, nama_jenis_barang FROM jenis_barang";
                            $resultJB = mysqli_query($koneksi,$queryJB);
                            while($dataJB = mysqli_fetch_array($resultJB)){
                                echo "<option value='$dataJB[0]'>$dataJB[1]</option>";
                            }
                        ?>
                    </select>
                    <label style="color: #000">Supplier</label>
                    <select name="supplier" class="form-control">
                        <option value="<?= $dataBarang[3]; ?>">-- PILIH --</option>
                        <?php
                            $querySup = "SELECT id_supplier, nama_supplier FROM supplier";
                            $resultSup = mysqli_query($koneksi,$querySup);
                            while($dataSup = mysqli_fetch_array($resultSup)){
                                echo "<option value='$dataSup[0]'>$dataSup[1]</option>";
                            }
                        ?>
                    </select>
                    <label style="color: #000">Modal</label>
                    <input type="text" class="form-control" name="modal" placeholder="Contoh : 1000" value="<?= $dataBarang[4]; ?>">
                    <label style="color: #000">Harga</label>
                    <input type="text" class="form-control" name="harga" placeholder="Contoh : 5000" value="<?= $dataBarang[5]; ?>">
                    <label style="color: #000">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Barang" value="<?= $dataBarang[6]; ?>">
                    <label style="color: #000">Sisa</label>
                    <input type="text" class="form-control" name="sisa" placeholder="Sisa Barang" value="<?= $dataBarang[7]; ?>">
    					</div>
  					</div>
  					<input type="submit" class="btn btn-danger" name="submit" value="Update Data Jenis Barang">
    			</form><br>
    		<?php
		} else {
			$id_barang    = $_POST["id_barang"];
			$nama_barang  = $_POST["nama_barang"];
            $jenis_barang = $_POST["jenis_barang"];
            $supplier     =  $_POST["supplier"];
            $modal        = $_POST["modal"];
            $harga        = $_POST["harga"];
            $jumlah       = $_POST["jumlah"];
            $sisa         = $_POST["sisa"];

	$updateBarang = "UPDATE barang SET nama_barang = '$nama_barang',id_jenis_barang =            '$jenis_barang',id_supplier = '$supplier', modal = '$modal', harga = 
                    '$harga', jumlah = '$jumlah', sisa = '$sisa'  WHERE id_barang = 
                    '$id_barang'";
			
			
			$queryBarang = mysqli_query($koneksi, $updateBarang);

			// echo "<pre>";
			// print_r($updateBarang);
			// echo "<pre>";
			// die();

			if($queryBarang){
				echo "<script>alert('Data Barang Berhasil Dirubah')</script>";
				echo "<script type='text/javascript'>window.location='barang_view.php'</script>";
				// print_r($updateBarang); 
				// die;
			} else {
				//echo "<script>alert('Data Barang Gagal Dirubah')</script>";
				//echo "<script type='text/javascript'>window.location='barang_view.php'</script>";
				print_r($updateBarang);
				die;
			}
		}
	?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<footer class="footer">
    <div class="container">
        <nav>
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="#">SI Penjualan</a>
            </p>
        </nav>
    </div>
</footer>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
</html>