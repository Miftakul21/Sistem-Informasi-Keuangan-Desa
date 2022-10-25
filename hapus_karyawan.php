<?php 
    include('koneksi.php');

    $id = $_GET['id_karyawan'];
    $query = mysqli_query($koneksi,"DELETE FROM karyawan WHERE id_karyawan = $id");
    
    if ($query) {
        header("Location:karyawan.php"); 
    }
    else{
        echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
    }
?>