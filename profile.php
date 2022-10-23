<?php
include 'cek-sesi.php';
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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
    require ('koneksi.php');
    require ('sidebar.php');

    $id = $_SESSION['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id_karyawan = '$id'");
?>
    <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <h1>Halaman Profile</h1>
            <?php require 'user.php'; ?>
        </nav>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <?php foreach($query as $p): ?>
                    <div class="card shadow mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myProfileEdit"><i class="fa fa-edit"> Edit</i></button>
                      </div>
                      <div class="card-body">
                        <table class="table table-borderless">
                          <tbody>
                              <tr>
                                <th scope="row">Nama</th>
                                <td>: <?= $p['nama']; ?></td>
                              </tr>
                          </tbody>
                          <tbody>
                              <tr>
                                <th scope="row">Email</th>
                                <td>: <?= $p['email']; ?></td>
                              </tr>
                          </tbody>
                          <tbody>
                              <tr>
                                <th scope="row">Nomor Telepon</th>
                                <td>: <?= $p['no_telepon']; ?></td>
                              </tr>
                          </tbody>
                          <tbody>
                              <tr>
                                <th scope="row">Alamat</th>
                                <td>: <?= $p['alamat']; ?></td>
                              </tr>
                          </tbody>
                          <tbody>
                              <tr>
                                <th scope="row">Password</th>
                                <td>: <?= str_repeat('*', strlen($p['pass'])); ?></td>
                              </tr>
                          </tbody>
                        </table>                    
                      </div>
                  </div> 
                  <?php endforeach; ?>
                </div>
              </div> 
            </div>

          <!-- Modal Mengedit Profile -->
          <?php foreach($query as $edit_profil): ?>
          <div id="myProfileEdit" class="modal fade" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Edit Profile</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                          <form action="edit_profile.php" method="get">
                              <div class="modal-body">
                                  <div class="mb-3">
                                      <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                      <input type="hidden" name="id_admin" value="<?= $edit_profil['id_karyawan']; ?>"> 
                                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $edit_profil['nama']; ?>">
                                  </div>
                                  <div class="mb-3">
                                      <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="email" name="email" value="<?= $edit_profil['email']; ?>">
                                  </div>
                                  <div class="mb-3">
                                      <label for="no_tlp" class="form-label">Nomor Telepon<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="no_tlp" name="no_telepon" value="<?= $edit_profil['no_telepon']; ?>">
                                  </div>
                                  <div class="mb-3">
                                      <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $edit_profil['alamat']; ?>">
                                  </div>
                                  <div class="mb-3">
                                      <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="password" name="pass" value="<?= str_repeat('*', strlen($edit_profil['pass'])); ?>">
                                  </div>
                              </div>
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
