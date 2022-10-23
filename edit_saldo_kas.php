<?php 
    include('koneksi.php');

    $id_saldo = $_GET['id_saldo'];
    $saldo = $_GET['saldo'];

    echo var_dump($id_saldo.' '.$saldo);
    
    $query = mysqli_query($koneksi,"UPDATE saldo SET saldo = '$saldo' WHERE id = $id_saldo");

    if ($query) {
        header("location:kas.php"); 
    }
    else{
        echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
    }

?>