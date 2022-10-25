<?php 
include('koneksi.php');
$id = $_GET['id'];
$kategori = $_GET['kategori'];

$query = mysqli_query($koneksi,"UPDATE kategori SET kategori = '$kategori' WHERE id = '$id'");

if ($query) {
    header("Location:kategori.php"); 
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

?>