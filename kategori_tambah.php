<?php 
include('koneksi.php');
$kategori = $_GET['kategori'];
$query = mysqli_query($koneksi,"INSERT INTO kategori (kategori) VALUES ('$kategori')");

if ($query) {
    header("location:kategori.php"); 
}
else{
    echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
}

?>