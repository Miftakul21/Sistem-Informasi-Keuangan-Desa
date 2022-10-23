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
    <title>Pinjaman Desa</title>
    <link rel="stylesheet" type="text/css" href="DataTables-1.12.1/css/dataTables.bootstrap5.min.css"/>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
    require ('koneksi.php');
    require ('sidebar.php');

?>
    <!-- Main Content -->
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <h1>BUMDES MINGGIRSARI</h1>
    <?php require 'user.php'; ?>
        </nav>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dana Pinjaman Desa</h1>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pinjaman Bumdes Desa Maju</h6>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myPinjamanTambah"><i class="fa fa-plus"> Tambah Data</i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped w-100" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Dukuh</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                        <th>Lainnya</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1; 
                                        $query_peminjam = mysqli_query($koneksi, "SELECT * FROM anggota_pinjam");
                                        foreach($query_peminjam as $p):
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $p['kode']; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['dukuh']; ?></td>
                                        <td><?= $p['alamat']; ?></td>
                                        <td>
                                            <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
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
        <!-- Modal Menambahkan-->
        <div id="myPinjamanTambah" class="modal fade" role="dialog">
            <div class="modal-dialog model-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <form action="tambah_anggota_pinjam.php" method="GET">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dukuh" class="form-label">Dukuh<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="dukuh" name="dukuh" placeholder="Masukkan Dukuh">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nominal" class="form-label">Nominal Pinjaman<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="nominal" name="nominal_pinjam" placeholder="Masukkan Nominal Pinjaman">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pokok" class="form-label">Jumlah Pokok<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="pokok" name="pokok" placeholder="Masukkan Jumlah Pokok">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jasa" class="form-label">Jumlah Jasa<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="jasa" name="jasa" placeholder="Masukkan Jumlah Jasa">
                                    </div> 
                                    <div class="mb-3">
                                        <label for="jangka_pinjam" class="form-label">Jangka Pinjaman<span class="text-danger">*</span></label>
                                        <select name="jangka_pinjam" id="jangka_pinjam" class="form-control">
                                            <option value="-">-- Bulan --</option>
                                            <option value="1">1</option>                                                  
                                            <option value="2">2</option>                                                  
                                            <option value="3">3</option>                                                  
                                            <option value="4">4</option>                                                  
                                            <option value="5">5</option>                                                  
                                            <option value="6">6</option>                                                  
                                            <option value="7">7</option>                                                  
                                            <option value="8">8</option>                                                  
                                            <option value="9">9</option>                                                  
                                            <option value="10">10</option>                                                  
                                            <option value="11">11</option>                                                  
                                            <option value="12">12</option>                                                  
                                        </select>
                                    </div>
                                </div>  
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Tambah</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php require 'footer.php'?>
    </div>
</div>
    <?php require 'logout-modal.php'; ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
    </body>
</html>
