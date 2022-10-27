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
    <title>Kategori Keuangan Desa</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
    require ('koneksi.php');
    require ('sidebar.php');

    $query = mysqli_query($koneksi, 'SELECT * FROM saldo LIMIT 1');
    $dana_desa = mysqli_fetch_array($query);
?>
    <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <h1>BUMDES DESA MAJU MAKMUR</h1>
    <?php require 'user.php'; ?>
        </nav>
            <!-- Konten -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Kategori Dana Desa</h6>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myKategori"><i class="fa fa-plus"> Tambah Data</i></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $data = mysqli_query($koneksi, 'SELECT * FROM kategori');
                                                $no = 1;
                                                foreach($data as $d):
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                <td><?= $d['kategori']; ?></td>
                                                <td>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#myKategoriEdit<?= $d['id']; ?>"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger" data-id="<?= $d['id'] ?>" onclick="hapus(this)"><i class="fa fa-trash"></i></button>
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

            <!-- Modal Menambahkan -->
            <div id="myKategori" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <!-- body modal -->
                            <form action="kategori_tambah.php" method="get">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="kategori" placeholder="Masukkan kategori" name="kategori">
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

            <!-- Mengedit -->
            <?php foreach($data as $d): ?>
            <div id="myKategoriEdit<?= $d['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <!-- body modal -->
                            <form action="kategori_edit.php" method="get">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori<span class="text-danger">*</span></label>
                                        <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $d['kategori']; ?>">
                                    </div>
                                </div>
                            <!-- footer modal -->
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" >Ubah</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php require 'footer.php'?>
    </div>
</div>
    <?php require 'logout-modal.php'; ?>
        <script src="js/jquery.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script>
            const hapus = (el) => {
                let id = $(el).data('id');
                let konfirmasi = confirm('Anda ingin menghapus?');

                if(konfirmasi) {
                    $.ajax({
                        url: 'hapus_kategori.php',
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
