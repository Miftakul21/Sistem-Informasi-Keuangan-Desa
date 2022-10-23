<?php
session_start();
include 'koneksi.php';
$email =mysqli_real_escape_string($koneksi,$_POST['email']);
$pass =mysqli_real_escape_string($koneksi, $_POST['pass']);

$data = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE email='$email' AND pass='$pass'");
$role = mysqli_fetch_array($data);
$cek = mysqli_num_rows($data);

if($cek > 0) {
	$sesi = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE email='$email' AND pass='$pass'");
	$sesi = mysqli_fetch_assoc($sesi);
	if($role['role'] == 'admin') {
		$_SESSION['id'] = $sesi['id_karyawan'];
		$_SESSION['nama'] = $sesi['nama'];
		$_SESSION['status'] = "login";
		header('Location:index.php');
	} else if($role['role'] == 'sekertaris') {
		$_SESSION['id'] = $sesi['id_karyawan'];
		$_SESSION['nama'] = $sesi['nama'];
		$_SESSION['status'] = "login";
		// header()
	} else if($role['role'] == 'bendahara') {

	}
} else {
	echo "<script>return alert('Akun Tidak Terdaftar!!!');</script>";
	header('Location:login.php');
}
?>