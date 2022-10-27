<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laporan Keuangan Desa</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- link css datatables -->
    <link rel="stylesheet" type="text/css" href="DataTables-1.12.1/css/dataTables.bootstrap5.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
    require ('koneksi.php');
    require ('sidebar.php');

    // saldo desa atau total dana desa
    $query1 = mysqli_query($koneksi,'SELECT * FROM saldo');
    $dana_desa = mysqli_fetch_array($query1);

    // data angsuran debet atau kredit
    $query2 = mysqli_query($koneksi, 'SELECT * FROM kas');
    $dana_kas = mysqli_fetch_array($query2);
?>
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <h1>BUMDES MINGGIRSARI</h1>
    <?php require 'user.php'; ?>
        </nav>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Laporan Dana Desa</h1>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <button class="btn btn-success">Excel</button>
                                
                                <!-- Button Pilih Bulan -->
                                <select class="form-select" aria-label="">
                                    <option selected>Pilih Bulan</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped w-100" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Debet</th>
                                                <th>Kredit</th>
                                                <th>Saldo</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $data = mysqli_query($koneksi, 'SELECT kas.*, kategori.kategori FROM kas JOIN kategori ON kas.keterangan = kategori.id');
                                                $no = 1;
                                                foreach($data as $d):
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                <td><?= $d['tgl']; ?></td>
                                                <td><?= $d['kategori']; ?></td>
                                                <td>Rp. <?= number_format($d['debet'],2,',','.'); ?></td>
                                                <td>Rp. <?= number_format($d['kredit'],2,',','.'); ?></td>
                                                <td>Rp. <?= number_format($d['saldo'],2,',','.'); ?></td>
                                                <td>
                                                    <div class="container d-flex">
                                                        <button class="btn btn-warning fa fa-edit mr-2" data-toggle="modal" data-target="#myAngsuranEdit<?= $d['id_kas']; ?>"></button>
                                                        <button class="btn btn-danger" data-id="<?= $d['id_kas'] ?>" onclick="hapus(this)"><i class="fa fa-trash"></i></button>                                                       
                                                    </div>                                   
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php require 'footer.php'?>
    </div>
</div>
    <?php require 'logout-modal.php'; ?>
        <script src="vendor/jquery/jquery.min.js"></script>                                                
        <script src="js/jquery.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script type="text/javascript" src="DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script>
    </body>
</html>
