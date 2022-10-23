<?php 
    include('koneksi.php');

    $tgl = $_GET['tgl'];
    $id_kategori = $_GET['id_kategori'];
    $debet = $_GET['debet'];
    $kredit = $_GET['kredit'];

    $query_dana = mysqli_query($koneksi, 'SELECT * FROM saldo');
    $dana_desa = mysqli_fetch_array($query_dana);
    $saldo_sementara;

    if($debet != 0){
        $saldo_sementara = $dana_desa['saldo'] + $debet;
    }else if($kredit != 0){
        $saldo_sementara = $dana_desa['saldo'] - $kredit;
    }

    // echo var_dump($saldo_sementara);

    $query = mysqli_query($koneksi,"INSERT INTO kas (tgl, keterangan, debet, kredit, saldo) VALUES ('$tgl','$id_kategori','$debet','$kredit', '$saldo_sementara')");
    
    // perubahan dana kas desa
    mysqli_query($koneksi, "UPDATE saldo SET saldo = '$saldo_sementara' WHERE id = 1");


    if ($query) {
        header("location:kas.php"); 
    }
    else{
        echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
    }

?>