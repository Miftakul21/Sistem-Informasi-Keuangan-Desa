<?php 
    include('koneksi.php');

    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM kategori WHERE id = $id");
    
    if ($query) {
        header("Location:kategori.php"); 
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

?>