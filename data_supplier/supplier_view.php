<?php
    include "../admin/config.php";
    include '../template/header_view.php';
    if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
    $querySup = "SELECT * FROM supplier";
    $resultSup = mysqli_query($koneksi, $querySup);
    $countSup = mysqli_num_rows($resultSup);  
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
                    <li>
                        <a class="nav-link" href="../data_barang/barang_view.php">
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
                    <li  class="nav-item active">
                        <a class="nav-link" href="#">
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
                    <a class="navbar-brand" href="#"> Data Supplier </a>
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
    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambahModal">Tambah Data Supplier
    </button>
    </div>
    <br>
    <div class="container">
    <div class="container-fluid">
    <div class="fresh-datatables toolbar-color-blue">
    <table id="fresh-datatables" class="table table-striped table-no-bordered table-hover">
    <thead>
        <tr>
            <th>Nama Supplier</th>
            <th class="disabled-sorting">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nama Supplier</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        <?php if($countSup > 0 ){
                 while($dataSup = mysqli_fetch_array($resultSup)){
        ?>
        <tr>
            <td><?= "$dataSup[1]"; ?></td>
            <td>
                <a href="supplier_edit.php?id_supplier=<?= "$dataSup[0]" ?>" class="edit"><i class="fa fa-edit"></i></a>
                <a href="supplier_delete.php?id_supplier=<?= "$dataSup[0]" ?>" class="remove"><i class="fa fa-times"></i></a>
            </td>
        </tr>
       <?php
             } 
                } else {
                    echo "<tr>
                            <td></td>
                            <td align='center'>
                                <div>Belum Ada Data Supplier</div>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <div class="form-group">
               <form enctype="multipart/form-data" method="post" class="formSup">
                    <label style="color: #000">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier">
               </form>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="simpanSup">Save changes</button>
        </div>
        </div>
    </div>
</div>


<?php
    if (isset($_POST['nama_supplier'])) {
        $nama_supplier = $_POST['nama_supplier'];
        $insertSup = "INSERT INTO supplier VALUES ('','$nama_supplier')";
        $querySup = mysqli_query($koneksi, $insertSup);
    }
?>

</body>


<script type="text/javascript">
    $(document).ready(function(){
        $("#simpanSup").click(function(){
            dataSup();
        });
    });

    function dataSup(){
        var data = $('.formSup').serialize();
            $.ajax({
                type: 'POST',
                url: "supplier_view.php",
                data: data,
                success: function() {
                location.href = "http://localhost/uas_pwl/master_penjualan/data_supplier/supplier_view.php";
                }
            });
    }
</script>

<?php include '../template/footer_view.php' ?>