<?php
include('koneksi.php');

$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM anggota_pinjam WHERE id = '$id'");

if ($query) {
    header("location:pinjaman.php"); 
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

?>