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
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#myPinjamanEdit<?= $p['id']; ?>"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" data-id="<?= $p['id'] ?>" onclick="hapus(this)"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <td>
                                            <a href="detail_anggota_pinjam.php?id_anggota_pinjam=<?= $p['id']; ?>" class="btn btn-primary"><i class="fa fa-info mr-1"></i> Detail</a>
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
                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="contoh: POK 1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="contoh: Joko">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dukuh" class="form-label">Dukuh<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="dukuh" name="dukuh" placeholder="contoh: Dukuh 1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="contoh: MINGGIRSARI 01/01">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nominal" class="form-label">Nominal Pinjaman<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="nominal" name="nominal_pinjam" placeholder="contoh: 1000000">
                                    </div>                                    
                                    <div class="mb-3">
                                        <label for="jangka_pinjaman" class="form-label">Jangka Pinjaman<span class="text-danger">*</span></label>
                                        <select name="jangka_pinjaman" id="jangka_pinjaman" class="form-control">
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
        <!-- Modal Mengedit-->
        <?php 
            $query = mysqli_query($koneksi, "SELECT a.*, b.nominal_pinjaman FROM anggota_pinjam AS a JOIN pinjaman AS b ON a.id = b.id_pinjaman");
            foreach($query as $p):
        ?>
        <div id="myPinjamanEdit<?= $p['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog model-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <form action="edit_anggota_pinjam.php" method="GET">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="kode" class="form-label">Kode<span class="text-danger">*</span></label>
                                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $p['kode']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dukuh" class="form-label">Dukuh<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="dukuh" name="dukuh" value="<?= $p['dukuh']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $p['alamat']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nominal" class="form-label">Nominal Pinjaman<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="nominal" name="nominal_pinjam" value="<?= $p['nominal_pinjaman']; ?>">
                                    </div>                                    
                                    <div class="mb-3">
                                        <label for="jangka_pinjaman" class="form-label">Jangka Pinjaman<span class="text-danger">*</span></label>
                                        <select name="jangka_pinjaman" id="jangka_pinjaman" class="form-control">
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
                            <button type="submit" class="btn btn-secondary">Ubah</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php require 'footer.php'?>
    </div>
</div>
    <?php require 'logout-modal.php'; ?>
        <script src="js/jquery.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
        <script>
            const hapus = (el) => {
                let id = $(el).data('id');
                let konfirmasi = confirm('Anda ingin menghapus?');

                if(konfirmasi) {
                    $.ajax({
                        url: 'hapus_pinjaman.php',
                        type: 'GET',
                        data: {
                            id: id
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
