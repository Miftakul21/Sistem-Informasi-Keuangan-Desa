<?php
include('koneksi.php');
$id = $_GET['id'];

// hapus untuk anggota pinjaman
$query = mysqli_query($koneksi,"DELETE FROM anggota_pinjam WHERE id = '$id'");

// hapus untuk data anggota pinjaman
$query_data_pinjaman = mysqli_query($koneksi, "DELETE FROM pinjaman WHERE id_pinjaman = '$id'");

if ($query) {
    header("location:pinjaman.php"); 
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

?>