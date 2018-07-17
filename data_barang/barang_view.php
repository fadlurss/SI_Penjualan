<?php
    include "../admin/config.php";
    include '../template/header_view.php';
    if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
    $queryBarang = "SELECT 
                   barang.id_barang,
                   barang.nama_barang AS 'Nama Barang',
                   jenis_barang.nama_jenis_barang AS 'Jenis Barang',
                   supplier.nama_supplier 'Supplier',
                   barang.modal,
                   barang.harga,
                   barang.jumlah,
                   barang.sisa
         FROM barang
         INNER JOIN jenis_barang ON jenis_barang.id_jenis_barang = barang.id_jenis_barang
         INNER JOIN supplier ON supplier.id_supplier = barang.id_supplier
         ORDER BY barang.id_barang";
    $resultBarang = mysqli_query($koneksi, $queryBarang);
    $countBarang = mysqli_num_rows($resultBarang);  
?>
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
                        <a class="nav-link" href="../data_transaksi/transaksi_view.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Data Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../data_jenis_barang/jenis_barang_view.php">
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
                    <a class="navbar-brand" href="#pablo"> Data Barang </a>
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
    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambahModal">Tambah Data Barang
    </button>
    </div>
    <br>
    <div class="container">
    <div class="container-fluid">
    <div class="fresh-datatables toolbar-color-blue">
    <table id="fresh-datatables" class="table table-striped table-no-bordered table-hover">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Supplier</th>
            <th>Modal</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sisa</th>
            <th class="disabled-sorting">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Supplier</th>
            <th>Modal</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sisa</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        <?php if($countBarang > 0 ){
                 while($dataBarang = mysqli_fetch_array($resultBarang)){
        ?>
        <tr>
            <td><?= "$dataBarang[1]"; ?></td>
            <td><?= "$dataBarang[2]"; ?></td>
            <td><?= "$dataBarang[3]"; ?></td>
            <td><?= "$dataBarang[4]"; ?></td>
            <td><?= "$dataBarang[5]"; ?></td>
            <td><?= "$dataBarang[6]"; ?></td>
            <td><?= "$dataBarang[7]"; ?></td>
            <td>
                <a href="barang_edit.php?id_barang=<?= "$dataBarang[0]" ?>" class="edit"><i class="fa fa-edit"></i></a>
                <a href="barang_delete.php?id_barang=<?= "$dataBarang[0]" ?>" class="remove"><i class="fa fa-times"></i></a>
            </td>
        </tr>
       <?php
             } 
                } else {
                    echo "<tr>
                            <td></td>
                            <td align='center'>
                                <div>Belum Ada Data Barang</div>
                            </td>
                          </tr>";
                }
                echo "</tbody>";
                echo "</table>";
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


<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah data Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <div class="form-group">
               <form enctype="multipart/form-data" method="post" class="formBarang">
                    <label style="color: #000">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                    <label style="color: #000">Jenis Barang</label>
                    <select name="jenis_barang" class="form-control">
                        <option value="">-- PILIH --</option>
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
                        <option value="">-- PILIH --</option>
                        <?php
                            $querySup = "SELECT id_supplier, nama_supplier FROM supplier";
                            $resultSup = mysqli_query($koneksi,$querySup);
                            while($dataSup = mysqli_fetch_array($resultSup)){
                                echo "<option value='$dataSup[0]'>$dataSup[1]</option>";
                            }
                        ?>
                    </select>
                    <label style="color: #000">Modal</label>
                    <input type="text" class="form-control" name="modal" placeholder="Contoh : 1000">
                    <label style="color: #000">Harga</label>
                    <input type="text" class="form-control" name="harga" placeholder="Contoh : 5000">
                    <label style="color: #000">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Barang">
                    <label style="color: #000">Sisa</label>
                    <input type="text" class="form-control" name="sisa" placeholder="Sisa Barang">
               </form>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="simpanBarang">Save changes</button>
        </div>
        </div>
    </div>
</div>



<?php
    if (isset($_POST['nama_barang'])) {
        $nama_barang = $_POST['nama_barang'];
        $jenis_barang = $_POST["jenis_barang"];
        $supplier = $_POST["supplier"];
        $modal = $_POST["modal"];
        $harga = $_POST["harga"];
        $jumlah = $_POST["jumlah"];
        $sisa = $_POST["sisa"];
        $insertBarang = "INSERT INTO barang VALUES ('','$nama_barang','$jenis_barang','$supplier','$modal','$harga','$jumlah','$sisa')";
        $queryBarang = mysqli_query($koneksi, $insertBarang);
        print_r($queryBarang);
        die();
    }
?>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#simpanBarang").click(function(){
            dataBarang();
        });
    });

    function dataBarang(){
        var data = $('.formBarang').serialize();
            $.ajax({
                type: 'POST',
                url: "barang_view.php",
                data: data,
                success: function() {
                location.href = "http://localhost/uas_pwl/master_penjualan/data_barang/barang_view.php";
                }
            });
    }
</script>
<?php include '../template/footer_view.php' ?>