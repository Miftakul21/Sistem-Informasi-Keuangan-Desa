<?php 
    include('koneksi.php');

    $id = $_GET['id'];
    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $no_telepon = $_GET['no_telepon'];
    $dukuh = $_GET['dukuh'];
    $alamat = $_GET['alamat'];
    $nominal_pinjam = $_GET['nominal_pinjam'];
    $jum_pokok = $_GET['jum_pokok'];
    $jum_jasa = $_GET['jum_jasa'];
    $jangka_pinjaman = $_GET['jangka_pinjaman'];

    $query_pinjam = mysqli_query($koneksi, "SELECT * FROM anggota_pinjam WHERE id = '$id'");
    $id_pinjam = mysqli_fetch_array($query_pinjam);
    $id_anggota_pinjam = $id_pinjam['id_pinjam'];
    
    // echo var_dump($id.' '.$kode.' '.$nama.' '.$no_telepon.' '.$dukuh.' '.$alamat);

    $query = mysqli_query($koneksi,"UPDATE anggota_pinjam SET kode = '$kode', nama = '$nama', no_telepon = '$no_telepon', dukuh = '$dukuh', alamat = '$alamat', nominal_pinjam = '$nominal_pinjam', jum_pokok = '$jum_pokok', jum_jasa = '$jum_jasa', jangka_pinjaman = '$jangka_pinjaman', id_pinjam = '$id_anggota_pinjam' WHERE id = '$id'");

    if ($query) {
        header("location:pinjaman.php"); 
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }

?>