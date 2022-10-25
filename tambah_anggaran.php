<?php 
    include('koneksi.php');

    $id_pinjaman = $_GET['id_anggota'];
    $tgl = $_GET['tgl'];
    $pokok = $_GET['pokok'];
    $jasa = $_GET['jasa'];

    $query = mysqli_query($koneksi,"INSERT INTO angsuran (id_anggota, tgl, pokok, jasa) VALUES ('$id_pinjaman', '$tgl', '$pokok', '$jasa')");    

    if ($query) {
        header("location:detail_anggota_pinjam.php?id_anggota_pinjam=".$id_pinjaman); 
    }
    else{
        echo "ERROR, data gagal ditambahkan". mysqli_error($koneksi);
    }

?>