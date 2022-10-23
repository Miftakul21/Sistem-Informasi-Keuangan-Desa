<?php 
    include('koneksi.php');

    $id = $_GET['id_kas'];
    $tgl = $_GET['tgl'];
    $id_kategori = $_GET['id_kategori'];
    $debet = $_GET['debet'];
    $kredit = $_GET['kredit'];

    // echo var_dump($id.' '.$tgl.' '.$id_kategori.' '.$debet.' '.$kredit.' ');

    $query_dana = mysqli_query($koneksi, 'SELECT * FROM saldo');
    $dana_desa = mysqli_fetch_array($query_dana);
    $saldo_sementara;

    if($debet != 0){
        $saldo_sementara = (int) $dana_desa['saldo'] + (int) $debet;
    } else if($kredit != 0){
        $saldo_sementara = (int) $dana_desa['saldo'] - (int) $kredit;
    }

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