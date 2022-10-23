<?php
include('koneksi.php');

$nama = $_GET['nama'];
$email = $_GET['email'];
$no_telepon = $_GET['no_telepon'];
$alamat = $_GET['alamat'];
$role = $_GET['role'];
$pass = $_GET['pass'];

$query = mysqli_query($koneksi,"INSERT INTO karyawan (nama, email, pass, no_telepon, alamat, role) VALUES ('$nama', '$email', '$pass', '$no_telepon', '$alamat', '$role')");

if ($query) {
    header("Location:karyawan.php"); 
} else {
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

?>