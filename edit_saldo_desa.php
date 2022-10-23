<?php 
include('koneksi.php');
$id = $_GET['id'];
$saldo = $_GET['saldo'];
$query = mysqli_query($koneksi,"UPDATE saldo SET saldo = '$saldo' WHERE id = '$id'");

if ($query) {
    header("location:kas.php"); 
}
else{
    echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
}

?>