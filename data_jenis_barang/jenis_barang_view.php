<?php
    include "../admin/config.php";
    include '../template/header_view.php';
    if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
    $queryJB = "SELECT * FROM jenis_barang";
    $resultJB = mysqli_query($koneksi, $queryJB);
    $countJB = mysqli_num_rows($resultJB);  
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
                    <a class="navbar-brand" href="#"> Data jenis barang </a>
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
    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambahModal">Tambah Data Jenis Barang
    </button>
    </div>
    <br>
    <div class="container">
    <div class="container-fluid">
    <div class="fresh-datatables toolbar-color-blue">
    <table id="fresh-datatables" class="table table-striped table-no-bordered table-hover">
    <thead>
        <tr>
            <th>Nama Jenis Barang</th>
            <th class="disabled-sorting">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nama Jenis Barang</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        <?php if($countJB > 0 ){
                 while($dataJB = mysqli_fetch_array($resultJB)){
        ?>
        <tr>
            <td><?= "$dataJB[1]"; ?></td>
            <td>
                <a href="jenis_barang_edit.php?id_jenis_barang=<?= "$dataJB[0]" ?>" class="edit"><i class="fa fa-edit"></i></a>
                <a href="jenis_barang_delete.php?id_jenis_barang=<?= "$dataJB[0]" ?>" class="remove"><i class="fa fa-times"></i></a>
            </td>
        </tr>
       <?php
             } 
                } else {
                    echo "<tr>
                            <td></td>
                            <td align='center'>
                                <div>Belum Ada Data Jenis Barang</div>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah data jenis barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <div class="form-group">
               <form enctype="multipart/form-data" method="post" class="formJB">
                    <label style="color: #000">Nama Jenis Barang</label>
                    <input type="text" class="form-control" name="nama_jenis_barang">
               </form>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="simpanJB">Save changes</button>
        </div>
        </div>
    </div>
</div>


<div class="modal-body">
            <div class="form-group">
                <label>Nama Jenis Barang</label>
                <input type="text" hidden="" class="form-control" name="id_jenis_barang">
                <input type="text" class="form-control" name="nama_barang" value="<?= $dataJB[1] ?>">
            </div> 
        </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['nama_jenis_barang'])) {
        $nama_jenis_barang = $_POST['nama_jenis_barang'];
        $insertJB = "INSERT INTO jenis_barang VALUES ('','$nama_jenis_barang')";
        $queryJB = mysqli_query($koneksi, $insertJB);
    }
?>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#simpanJB").click(function(){
            dataJB();
        });
    });
    function dataJB(){
        var data = $('.formJB').serialize();
            $.ajax({
                type: 'POST',
                url: "jenis_barang_view.php",
                data: data,
                success: function() {
                location.href = "http://localhost/uas_pwl/master_penjualan/data_jenis_barang/jenis_barang_view.php";
                }
            });
    }
</script>
<?php include '../template/footer_view.php' ?>