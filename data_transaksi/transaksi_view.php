<?php
    include "../admin/config.php";
    include '../template/header_view.php';
    if (!isset($_SESSION["username"])) {
     echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
    }
    $queryTransaksi = "SELECT * FROM transaksi";
    $resultTransaksi = mysqli_query($koneksi, $queryTransaksi);
    $countTransaksi = mysqli_num_rows($resultTransaksi);
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
                    <li class="nav-item active">
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
                    <a class="navbar-brand" href="#"> Data Transaksi </a>
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
    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambahModal">Tambah Data Transaksi
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
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Laba</th>
            <th class="disabled-sorting">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Laba</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        <?php if($countTransaksi > 0 ){
                 while($dataTransaksi = mysqli_fetch_array($resultTransaksi)){
        ?>
        <tr>
            <td><?= "$dataTransaksi[1]"; ?></td>
            <td><?= "$dataTransaksi[2]"; ?></td>
            <td><?= "$dataTransaksi[3]"; ?></td>
            <td><?= "$dataTransaksi[5]"; ?></td>
            <td><?= "$dataTransaksi[5]"; ?></td>
            <td><?= "$dataTransaksi[6]"; ?></td>
            <td>
                <a href="transaksi_edit.php?id_transaksi=<?= "$dataTransaksi[0]" ?>" class="edit"><i class="fa fa-edit"></i></a>
                <a href="transaksi_delete.php?id_transaksi=<?= "$dataTransaksi[0]" ?>" class="remove"><i class="fa fa-times"></i></a>
            </td>
        </tr>
       <?php
             }
                } else {
                    echo "<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align='center'>
                                <div>Belum Ada Data Transaksi</div>
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
               <form enctype="multipart/form-data" method="post" class="formTransaksi">
                    <label style="color: #000">Tanggal</label>
                    <input type="Date" class="form-control" name="tanggal">
                    <label style="color: #000">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" onkeyup="isi_otomatis()" class="form-control">
                    <label style="color: #000">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                    <label style="color: #000">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah">
               </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="simpanTransaksi">Save changes</button>
        </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['nama_barang'])) {
        $nama_barang = $_POST['nama_barang'];
        $tanggal = $_POST["tanggal"];
        $jumlah = $_POST["jumlah"];
        $harga = $_POST["harga"];

        $test = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang = '$nama_barang'");
        $data = mysqli_fetch_array($test);
        $sisa = $data['jumlah']-$jumlah;
        $update_sisa = mysqli_query($koneksi, "UPDATE barang SET jumlah = '$sisa' WHERE nama_barang='$nama_barang'");

        $modal = $data['modal'];
        $lab = $harga-$modal;
        $laba = $lab*$jumlah;
        $total_harga = $harga*$jumlah;


        $insertTransaksi = "INSERT INTO transaksi VALUES ('','$tanggal','$nama_barang','$jumlah','$harga','$total_harga','$laba')";
        $queryTransaksi = mysqli_query($koneksi, $insertTransaksi);
    }

?>

</body>


<script type="text/javascript">
    $(document).ready(function(){
        $("#simpanTransaksi").click(function(){
            dataTransaksi();
        });
    });

    function dataTransaksi(){
        var data = $('.formTransaksi').serialize();
            $.ajax({
                type: 'POST',
                url: "http://localhost/uas_pwl/master_penjualan/data_transaksi/transaksi_view.php",
                data: data,
                success: function() {
                location.href = "http://localhost/uas_pwl/master_penjualan/data_transaksi/transaksi_view.php";
                }
            });
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
            function isi_otomatis(){
                var nama_barang = $("#nama_barang").val();
                $.ajax({
                    url: 'proses-ajax.php',
                    data:"nama_barang="+nama_barang ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#harga').val(obj.harga);
                });
            }
            $("#nama_barang").on("change",function(e){
                console.log($(this).val());
                isi_otomatis();
            });
</script>
<?php include '../template/footer_view.php' ?>