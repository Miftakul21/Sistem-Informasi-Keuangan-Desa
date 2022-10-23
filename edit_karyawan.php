<?php
include('koneksi.php');

$id = $_GET['id_karyawan'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$no_telepon = $_GET['no_telepon'];
$alamat = $_GET['alamat'];
$role = $_GET['role'];
$pass = $_GET['pass'];

$query = mysqli_query($koneksi,"UPDATE karyawan SET nama =  '$nama', email =  '$email', pass =  '$pass', no_telepon = '$no_telepon', alamat =  '$alamat', role = '$role' WHERE id_karyawan = '$id'");

if ($query) {
    header("Location:karyawan.php"); 
} else {
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

?>