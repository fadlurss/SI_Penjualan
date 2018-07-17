<?php
    include "../admin/config.php";
    include '../template/header_view.php';
    if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
    
    $queryPengeluaran2 = "SELECT * FROM pengeluaran";
    $resultPengeluaran2 = mysqli_query($koneksi, $queryPengeluaran2);
    $countPengeluaran2 = mysqli_num_rows($resultPengeluaran2);
    if (isset($_POST["tanggal"])) {
        $queryLaba = "SELECT SUM(laba) as laba FROM transaksi";
        $resultLaba = mysqli_query($koneksi, $queryLaba);
        $countLaba = mysqli_num_rows($resultLaba);
        $fetchLaba = mysqli_fetch_array($resultLaba);
        $queryPengeluaran = "SELECT SUM(total_pengeluaran) as pengeluaran FROM pengeluaran";
        $resultPengeluaran = mysqli_query($koneksi, $queryPengeluaran);
        $countPengeluaran = mysqli_num_rows($resultPengeluaran);
        $fetchPengeluaran = mysqli_fetch_array($resultPengeluaran);

        $tanggal = $_POST['tanggal'];
        $alasan = $_POST['alasan'];
        $total_pengeluaran = $_POST['total_pengeluaran'];

        $hasil_laba = $fetchLaba['laba'];
        $jumlah = $hasil_laba-$total_pengeluaran;
        $jumlah2 = $jumlah-$total_pengeluaran;
        if($jumlah2 === $total_pengeluaran){
            echo "<script>alert('Total Pengeluaran tidak boleh melebihi laba keuntungan')</script>";
            echo "<script type='text/javascript'>window.location='transaksi_view.php'</script>";
        }else {
        $insertPengeluaran = "INSERT INTO pengeluaran VALUES ('','$tanggal','$alasan','$total_pengeluaran')";
        $querySql = mysqli_query($koneksi,$insertPengeluaran);
        }


    }   

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
                            <i class="nc-icon nc-notes"></i>
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
                    <li>
                        <a class="nav-link" href="../data_supplier/supplier_view.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Data Supplier</p>
                        </a>
                    </li>
                    <li class="nav-item active">
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
                    <a class="navbar-brand" href="#"> Data pengeluaran </a>
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
    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambahModal">Tambah Data Pengeluaran
    </button>
    </div>
    <br>
    <div class="container">
    <div class="container-fluid">
    <div class="fresh-datatables toolbar-color-blue">
    <table id="fresh-datatables" class="table table-striped table-no-bordered table-hover">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Alasan</th>
            <th>Total Pengeluaran</th>
            <th class="disabled-sorting">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tanggal</th>
            <th>Alasan</th>
            <th>Total Pengeluaran</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        <?php if($countPengeluaran2 > 0 ){
                 while($dataPengeluaran = mysqli_fetch_array($resultPengeluaran2)){
        ?>
        <tr>
            <td><?= "$dataPengeluaran[1]"; ?></td>
            <td><?= "$dataPengeluaran[2]"; ?></td>
            <td><?= "$dataPengeluaran[3]"; ?></td>
            <td>
                <a href="Pengeluaran_edit.php?id_Pengeluaran=<?= "$dataPengeluaran[0]" ?>" class="edit"><i class="fa fa-edit"></i></a>
                <a href="Pengeluaran_delete.php?id_Pengeluaran=<?= "$dataPengeluaran[0]" ?>" class="remove"><i class="fa fa-times"></i></a>
            </td>
        </tr>
       <?php
             }
                } else {
                    echo "<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align='center'>
                                <div>Belum Ada Data Pengeluaran</div>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <div class="form-group">
               <form enctype="multipart/form-data" method="post" id="formPengeluaran" class="formPengeluaran">
                    <label style="color: #000">Tanggal</label>
                    <input type="Date" class="form-control" id="tanggal" name="tanggal">
                    <label style="color: #000">Alasan</label>
                    <input type="text"  class="form-control" id="alasan" name="alasan">
                    <label style="color: #000">Total Pengeluaran</label>
                    <input type="text" class="form-control" id="total_pengeluaran" name="total_pengeluaran">
               </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="simpanPengeluaran">Save changes</button>
        </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#simpanPengeluaran").click(function(){
            dataPengeluaran();
        });
    });

    function dataPengeluaran(){
        var data = $('.formPengeluaran').serialize();
            $.ajax({
                type: 'POST',
                url: "http://localhost/uas_pwl/master_penjualan/data_pengeluaran/pengeluaran_view.php",
                data: data,
                success: function() {
                location.href = "http://localhost/uas_pwl/master_penjualan/data_pengeluaran/pengeluaran_view.php";
                }
            });
    }
</script>
<?php include '../template/footer_view.php' ?>
