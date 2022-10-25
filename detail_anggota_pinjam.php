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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
  require ('koneksi.php');
  require ('sidebar.php');

  $id = $_GET['id_anggota_pinjam'];
  $query_data_pinjam = mysqli_query($koneksi, "SELECT a.*, b.nominal_pinjaman, b.pokok, b.jasa, b.total_pokok_jasa, b.pinjaman_penelusuran, b.pinjaman_gabungan, b.jangka_pinjaman FROM anggota_pinjam AS a JOIN pinjaman AS b ON a.id = b.id_pinjaman WHERE a.id = '$id'");

  $query_angsuran = mysqli_query($koneksi, "SELECT * FROM angsuran WHERE id_anggota = '$id'");

?>
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex justify-content-between">
            <h1>Data Pinjaman Anggaran</h1>
            <a href="pinjaman.php" class="btn btn-danger">Kembali</a>
        </nav>
        <!-- Informasi Data Anggota Peminjam -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="card mt-2 shadow-sm">
                  <div class="card-header py-1 d-flex flex-row justify-content-between align-items-center">
                      <h6 class="m-0 font-weight-bold text-primary">Data Anggota Pinjaman</h6>
                      <!-- button untuk mengedit keterangan anggaran -->
                      <?php foreach($query_data_pinjam as $d): ?>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myKeteranganAnggota<?= $d['id'] ?>"><i class="fa fa-edit"></i></button>
                      <?php endforeach; ?>
                  </div>
                  <div class="card-body">
                      <div class="row">
                            <?php foreach($query_data_pinjam as $d): ?>
                              <div class="col-md-4">
                                  <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <th>Kode</th>
                                        <td>: <?= $d['kode']; ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Nama</th>
                                        <td>: <?= $d['nama']; ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Dukuh</th>
                                        <td>: <?= $d['dukuh']; ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Alamat</th>
                                        <td>: <?= $d['alamat']; ?></td>
                                      </tr>                               
                                    </tbody>
                                  </table>
                              </div>
                              <div class="col-md-4">
                                  <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <th>Nominal Pinjam</th>
                                        <td>: Rp. <?= number_format($d['nominal_pinjaman'],2,',','.'); ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Jumlah Pokok</th>
                                        <td>: Rp. <?= number_format($d['pokok'],2,',','.'); ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Jumlah Jasa</th>
                                        <td>: Rp. <?= number_format($d['jasa'],2,',','.'); ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Total Pokok & Jasa</th>
                                        <td>: Rp. <?= number_format($d['total_pokok_jasa'],2,',','.'); ?></td>
                                      </tr>                               
                                    </tbody>
                                  </table>
                              </div>
                              <div class="col-md-4">
                                  <table class="table table-borderless">
                                    <tbody>
                                      <tr>
                                        <th>Jangka Pinjaman</th>
                                        <td>: <?= $d['jangka_pinjaman']; ?> Bulan</td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Pinjaman Penelusuran</th>
                                        <td>: Rp. <?= number_format($d['pinjaman_penelusuran'],2,',','.'); ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Pinjaman Gabungan</th>
                                        <td>: Rp. <?= number_format($d['pinjaman_gabungan'],2,',','.'); ?></td>
                                      </tr>                               
                                    </tbody>
                                    <tbody>
                                      <tr>
                                        <th>Keterangan</th>
                                        <td>
                                          : <?= isset($d['keterangan']) ? $d['keterangan'] : 'kosong'; ?>
                                        </td>
                                      </tr>                               
                                    </tbody>
                                  </table>
                              </div>
                            <?php endforeach; ?>
                      </div>
                  </div>
              </div>
            </div>
            <!-- catatan -->
            <!-- <div class="col-md-3">
              <div class="card mt-2 shadow mb-4">
                    <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Catatan</h6>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myAngsuranTambah"><i class="fa fa-edit"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped w-100" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>                   
                                        <th>Pokok</th>   
                                        <th>Jasa</th>                   
                                        <th>Aksi</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>                    
                    </div>
                </div>
            </div> -->
          </div>
        </div>
        
        <!-- Memasukan Data Angsuran Pinjaman -->
        <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow mb-4">
                    <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Angsuran Bumdes Desa Maju</h6>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myAngsuranTambah"><i class="fa fa-plus"> Tambah Data</i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped w-100" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>                   
                                        <th>Pokok</th>   
                                        <th>Jasa</th>                   
                                        <th>Aksi</th>                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1; 
                                        foreach($query_angsuran as $a):
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $a['tgl'] ?></td>
                                        <td>Rp. <?= number_format($a['pokok'],2,',','.'); ?></td>
                                        <td>Rp. <?= number_format($a['jasa'],2,',','.'); ?></td>
                                        <td>
                                            <button class="btn btn-warning" data-toggle="modal" data-target="#myPinjamanEdit"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger" data-id="" onclick="hapus(this)"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php  endforeach; ?>
                                </tbody>
                            </table>
                        </div>                    
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">

            </div>
          </div>
        </div>
      </div>
      <?php require 'footer.php'?>
    </div>

    <!-- Live Modal Angsuran Pinjaman -->
    <div id="myAngsuranTambah" class="modal fade" role="dialog">
        <div class="modal-dialog model-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <form action="tambah_anggaran.php" method="GET">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="tgl" class="form-label">Tanggal<span class="text-danger">*</span></label>
                                        <input type="hidden" name="id_anggota" value="<?= $id ?>">
                                        <input type="date" class="form-control" id="tgl" name="tgl">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pokok" class="form-label">Pokok<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="pokok" name="pokok" placeholder="contoh: 100000">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jasa" class="form-label">Jasa<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="jasa" name="jasa" placeholder="contoh: 100000">
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

    <!-- Live Modal Untuk Update Keterangan -->
    <?php foreach($query_data_pinjam as $d): ?>
    <div id="myKeteranganAnggota<?= $d['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Keterangan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <form action="tambah_anggota_pinjam.php" method="GET">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="kode" class="form-label">Kode<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $d['kode']; ?>" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama']; ?>" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                            <label for="dukuh" class="form-label">Dukuh<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="dukuh" name="dukuh" value="<?= $d['dukuh']; ?>" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $d['alamat']; ?>" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nominal" class="form-label">Nominal Pinjaman<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="nominal" name="nominal_pinjam" value="<?= $d['nominal_pinjaman']; ?>" disabled>
                                        </div> 
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pokok" class="form-label">Jumlah Pokok<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="pokok" name="pokok" value="<?= $d['pokok']; ?>" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jasa" class="form-label">Jumlah Jasa<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="jasa" name="jasa" value="<?= $d['jasa']; ?>" disabled>
                                        </div> 
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="total_pokok" class="form-label">Total Pokok & Jasa<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="total_pokok" name="total_pokok" value="<?= $d['total_pokok_jasa']; ?>" disabled>
                                        </div> 
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pinjaman_penelusuran" class="form-label">Pinjaman Penelusuran<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="pinjaman_penelusuran" name="pinjaman_penelusuran" value="<?= $d['pinjaman_penelusuran']; ?>" disabled>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pinjaman_gabungan" class="form-label">Pinjaman Gabungan<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="pinjaman_gabungan" name="pinjaman_gabungan" value="<?= $d['pinjaman_gabungan']; ?>" disabled>
                                        </div> 
                                      </div>
                                    </div>                                   
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan<span class="text-danger">*</span></label>
                                        <select name="keterangan" id="keterangan" class="form-control">
                                            <option value="-">-- Pilih Kategori --</option>                                                 
                                            <option value="Belum Lunas">Belum Lunas</option>                                                 
                                            <option value="Perpanjangan">Perpanjangan</option>                                                 
                                            <option value="Lunas">Lunas</option>                                                 
                                            <!-- <option value="Perpanjangan">-- Perpanjangan --</option>                                                                                                                                             -->
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
    <?php endforeach; ?>



  </div>


  <?php require 'logout-modal.php'; ?>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>
