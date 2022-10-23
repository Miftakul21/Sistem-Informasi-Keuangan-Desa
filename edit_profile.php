<?php 
include('koneksi.php');
$id = $_GET['id_admin'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$no_telepon = $_GET['no_telepon'];
$alamat = $_GET['alamat'];
$pass = $_GET['pass'];

$query = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id_admin = '$id'");
$role = mysqli_fetch_array($query);
$level = $role['role'];

$update_profile = mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', email = '$email', no_telepon = '$no_telepon', alamat = '$alamat', role = '$level' WHERE id_admin = '$id'");

if ($update_profile) {
    header("Location:profile.php"); 
}
else{
    echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
}

?>