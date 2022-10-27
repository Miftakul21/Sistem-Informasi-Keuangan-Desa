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
    <title>Dashboard - Admin</title>
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
            <h1>BUMDES DESA MAJU MAKMUR</h1>
    <?php require 'user.php'; ?>
        </nav>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dana Keuangan Desa</h1>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Keuangan Bumdes Desa Maju</h6>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myAngsuranTambah"><i class="fa fa-plus"> Tambah Data</i></button>
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
                    <div class="col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Dana Kas Desa</h6>
                                <div class="container-button d-flex flex-row justify-content-between">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#mySaldoEdit1"><i class="fa fa-edit"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <h1>Rp. 
                                    <?= 
                                        number_format(isset($dana_desa['saldo']) ? $dana_desa['saldo'] : 0,2,',','.'); 
                                    ?>
                                </h1>                  
                            </div>
                        </div>  
                    </div>
                </div>

            </div>
            <!-- Modal Menambahkan-->
            <div id="myAngsuranTambah" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <!-- body modal -->
                            <form action="tambah_anggaran_kas.php" method="GET">
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">Tanggal<span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="tanggal" name="tgl">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="debet" class="form-label">Debet<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="debet" name="debet" value="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="kredit" class="form-label">Kredit<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="kredit" name="kredit" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Keterangan<span class="text-danger">*</span></label>
                                            <select name="id_kategori" id="kategori" class="form-control">
                                            <option>--Pilih Kategori--</option>
                                            <?php
                                                $kategori = mysqli_query($koneksi, 'SELECT * FROM kategori'); 
                                                foreach($kategori as $k): 
                                            ?>
                                                <option value="<?= $k['id']; ?>"><?= $k['kategori'] ?></option>
                                            <?php endforeach; ?>
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

            <?php 
                $data = mysqli_query($koneksi, 'SELECT kas.*, kategori.kategori, kategori.id FROM kas JOIN kategori ON kas.keterangan = kategori.id');
                foreach($data as $d):
            ?>
            <!-- Modal Mengedit Angsuran-->
            <div id="myAngsuranEdit<?= $d['id_kas'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <!-- body modal -->
                            <form action="edit_anggaran_kas.php" method="GET">
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" value="<?= $d['id_kas']; ?>" name="id_kas">
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">Tanggal<span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="tanggal" name="tgl" value="<?= $d['tgl']; ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="debet" class="form-label">Debet<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="debet" name="debet" value="<?= $d['debet'] ?>">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="kredit" class="form-label">Kredit<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="kredit" name="kredit" value="<?= $d['kredit'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Keterangan<span class="text-danger">*</span></label>
                                            <select name="id_kategori" id="kategori" class="form-control">
                                                <option>--Pilih Kategori--</option>
                                                <?php
                                                    $kategori = mysqli_query($koneksi, 'SELECT * FROM kategori'); 
                                                    foreach($kategori as $k): 
                                                ?>
                                                    <option value="<?= $k['id']; ?>"><?= $k['kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <!-- footer modal -->
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" >Ubah Data</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Modal Mengedit Saldo -->
            <div id="mySaldoEdit1" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Saldo Desa</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <?php 
                                $query_saldo = mysqli_query($koneksi, "SELECT * FROM saldo LIMIT 1");
                                foreach($query_saldo as $s): 
                            ?>
                            <form action="edit_saldo_desa.php" method="get">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Saldo<span class="text-danger">*</span></label>
                                        <input type="hidden" name="id" value="<?= $s['id']; ?>">
                                        <input type="number" class="form-control" id="number" name="saldo" value="<?= $s['saldo'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" >Ubah</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>    
        </div>
    <?php require 'footer.php'?>
    </div>
</div>
    <?php require 'logout-modal.php'; ?>
        <script src="js/jquery.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>                                                
        <script src="js/jquery.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script type="text/javascript" src="DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript">
            $(document).ready(() => {
                $('#dataTable').DataTable();
            });
            
            const hapus = (el) => {
                let id = $(el).data('id');
                let konfirmasi = confirm('Anda ingin menghapus?');

                if(konfirmasi) {
                    $.ajax({
                        url: 'hapus_anggaran_kas.php',
                        type: 'GET',
                        data: {
                            id_kas: id
                        },
                        cache: false,
                        success: (data) => {
                            console.log('');
                            location.reload(true);
                        }
                    })
                } 
            }
        </script>
    </body>
</html>
