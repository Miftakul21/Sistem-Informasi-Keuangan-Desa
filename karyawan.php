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
?>
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <h1>Halaman Karyawan</h1>
    <?php require 'user.php'; ?>
        </nav>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Karyawan Bumdes Maju</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myKaryawanTambah"><i class="fa fa-plus"> Tambah Data</i></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped w-100" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Nomor Telepon</th>
                                                <th>Alamat</th>
                                                <th>Role</th>
                                                <th>Password</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $data = mysqli_query($koneksi, 'SELECT * FROM karyawan WHERE id_karyawan > 1');
                                                $no = 1;
                                                foreach($data as $d):
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $d['nama']; ?></td>
                                                <td><?= $d['email']; ?></td>
                                                <td><?= $d['no_telepon']; ?></td>
                                                <td><?= $d['alamat']; ?></td>
                                                <td><?= $d['role']; ?></td>
                                                <td><?= str_repeat('*', strlen($d['pass'])); ?></td>
                                                <td>
                                                    <button class="btn btn-warning fa fa-edit" data-toggle="modal" data-target="#myKaryawanEdit<?= $d['id_karyawan'] ?>"></button>
                                                    <a href="hapus_karyawan.php?id_karyawan=<?= $d['id_karyawan']; ?>" onclick="return confirm('Anda ingin menghapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
            k
            <?php 
                $data = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id_karyawan > 1");
                foreach($data as $d):
            ?>
            <!-- Modal Mengedit Karyawan-->
            <div id="myKaryawanEdit<?= $d['id_karyawan']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <!-- body modal -->
                            <form action="edit_karyawan.php" method="GET">
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                            <input type="hidden" class="form-control"  name="id_karyawan" value="<?= $d['id_karyawan']; ?>">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $d['email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_telepon" class="form-label">Nomor Telepon<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="<?= $d['no_telepon']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $d['alamat']; ?>">
                                        </div>                                            
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role<span class="text-danger">*</span></label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="-">-- Pilih Role --</option>
                                                <option value="Bendahara">Bendahara</option>                                                  
                                                <option value="Sekertaris">Sekertaris</option>                                                  
                                                <option value="Petugas">Petugas</option>                                                  
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pass" class="form-label">Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="pass" name="pass" value="<?= $d['pass']; ?>">
                                        </div>  
                                    </div>    
                                </div>
                            <!-- footer modal -->
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary">Ubah Data</button>
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
            })
        </script>
    </body>
</html>
