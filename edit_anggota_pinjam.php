<?php 
    include('koneksi.php');

    $id = $_GET['id_kas'];
    $tgl = $_GET['tgl'];
    $id_kategori = $_GET['id_kategori'];
    $debet = $_GET['debet'];
    $kredit = $_GET['kredit'];
    
    $query = mysqli_query($koneksi,"UPDATE kas SET tgl = '$tgl', keterangan = '$id_kategori', debet = '$debet', kredit = '$kredit', saldo = '$saldo_sementara' WHERE id_kas = '$id'");
    
    // perubahan dana kas desa
    mysqli_query($koneksi, "UPDATE saldo SET saldo = '$saldo_sementara' WHERE id = 1");


    if ($query) {
        header("location:kas.php"); 
    }
    else{
        echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
    }

?>