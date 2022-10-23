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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require ('sidebar.php'); ?>   
     <!-- Main Content -->
      <div id="content">

<?php require ('navbar.php'); ?> 

		    <!-- Begin Page Content -->
        <div class="container-fluid">
   <!-- Content Row -->
          <div class="row">
			           <!-- DataTales Example -->
					   <div class="col-xl-15 col-lg-12">
					  
             


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Data</h6>
            </div>
            <div class="card-body" style="max-width: 1000px;">
              <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Code</th>
                      <th>Dukuh</th>
					            <th>Nama</th>
                      <th>Alamat</th>
                      <th>Jangka Pinjaman</th>
                      <th>Nominal Pinjaman Awal</th>
                      <th>Pokok</th>
                      <th>Jasa</th>
                      <th>Total Pokok Jasa</th>
                      <th>Sisa Pinjaman Penelusuran (Belum Jasa)</th>
                      <th>Sisa Pinjaman (Pokok +Jasa)</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Total</th>
                      <th></th>
                      <th></th>
                      <th></th>
					            <th></th>
                      <th></th>
                      <th></th>
                      <th>Nominal Pinjaman Awal</th>
                      <th>Pokok</th>
                      <th>Jasa</th>
                      <th>Total Pokok Jasa</th>
                      <th>Sisa Pinjaman Penelusuran (Belum Jasa)</th>
                      <th>Sisa Pinjaman (Pokok +Jasa)</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM angsuran");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <td><?=$data['id_angsuran']?></td>
                      <td><?=$data['tanggal']?></td>
                      <td><?=$data['code']?></td>
                      <td><?=$data['dukuh']?></td>
                      <td><?=$data['nama']?></td>
                      <td><?=$data['alamat']?></td>
                      <td><?=$data['jangka_pinjaman']?></td>
                      <td>Rp. <?=number_format($data['nominal_pinjaman_awal'],2,',','.');?></td>
                      <td>Rp. <?=number_format($data['pokok'],2,',','.');?></td>
                      <td>Rp. <?=number_format($data['jasa'],2,',','.');?></td>
                      <td>Rp. <?=number_format($data['Total_pokok_jasa'],2,',','.');?></td>
                      <td>Rp. <?=number_format($data['sisa_pinjaman_belum_jasa'],2,',','.');?></td>
                      <td>Rp. <?=number_format($data['sisa_pinjaman_pokok_dan_jasa'],2,',','.');?></td>
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_angsuran']; ?>"></a>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_pemasukan']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Pemasukan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-angsuran.php" method="get">

<?php
$id = $data['id_pemasukan']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE id_pemasukan='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_pemasukan" value="<?php echo $row['id_pemasukan']; ?>">

<div class="form-group">
<label>Id</label>
<input type="text" name="id_pemasukan" class="form-control" value="<?php echo $row['id_pemasukan']; ?>" disabled>      
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tgl_pemasukan" class="form-control" value="<?php echo $row['tgl_pemasukan']; ?>">      
</div>

<div class="form-group">
<label>Jumlah</label>
<input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
</div>

<div class="form-group">
<label>Sumber</label>
<?php
if ($row['id_sumber'] == 1){
	$querynama1 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=1");
	$querynama1 = mysqli_fetch_array($querynama1);
} else if ($row['id_sumber'] == 2){
	$querynama2 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=2");
	$querynama2 = mysqli_fetch_array($querynama2);
} else if ($row['id_sumber'] == 3){
	$querynama3 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=3");
	$querynama3 = mysqli_fetch_array($querynama3);
} else if ($row['id_sumber'] == 4){
	$querynama4 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=4");
	$querynama4 = mysqli_fetch_array($querynama4);
}
 else if ($row['id_sumber'] == 5){
	$querynama5 = mysqli_query($koneksi, "SELECT nama FROM sumber where id_sumber=5");
	$querynama5 = mysqli_fetch_array($querynama5);
}
?>

<select class="form-control" name='id_sumber'>
<?php 
$queri = mysqli_query($koneksi, "SELECT * FROM sumber");
	$no = 1;
	$noo = 1;
while($querynama = mysqli_fetch_array($queri)){

echo '<option value="'.$no++.'">'.$noo++.'.'.$querynama["nama"].'</option>';
}
?>
</select>     
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<a href="hapus-pemasukan.php?id_pemasukan=<?=$row['id_pemasukan'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



 <!-- Modal -->
  <div id="myAngsuranTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Angsuran</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-angsuran.php" method="get">
        <div class="modal-body">
		Tanggal : 
         <input type="date" class="form-control" name="tanggal">
        Code : 
         <input type="text" class="form-control" name="code">
        Dukuh : 
         <select class="form-control" name="dukuh">
		 <option value="1" >Dukuh 1</option>
		 <option value="2" >Dukuh 2</option>
		 <option value="3" >Dukuh 3</option>
		 </select>
        Nama : 
         <input type="text" class="form-control" name="nama">
        Alamat : 
         <input type="text" class="form-control" name="alamat">
		Jangka Pinjaman : 
         <input type="number" class="form-control" name="jangka_pinjaman">
        Nominal Pinjaman Awal: 
         <input type="number" class="form-control" name="nominal_pinjaman_awal">
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
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
		  </div>


       </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>