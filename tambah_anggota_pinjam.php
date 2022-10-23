<?php
    include('koneksi.php');

    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $no_telepon = $_GET['no_telepon'];
    $dukuh = $_GET['dukuh'];
    $alamat = $_GET['alamat'];
    $nominal_pinjam = $_GET['nominal_pinjam'];
    $pokok = $_GET['pokok'];
    $jasa = $_GET['jasa'];
    $jangka_pinjaman = $_GET['jangka_pinjaman'];

    $query_pinjam = mysqli_query($koneksi, "SELECT *, COUNT(*) AS jum_anggota_peminjam FROM anggota_pinjam");
    $jum_anggota_peminjam = mysqli_fetch_array($query_pinjam);
    $cek_jumlah_anggota = mysqli_num_rows($query_pinjam);
    $temp;

    if($cek_jumlah_anggota > 0) {
        // jika sudah ada anggota
        $temp = $jum_anggota_peminjam['jum_anggota_peminjam'] + 1;
    } else {
        // jika belum ada anggota / kosong
        $temp = 1;
    }

    // echo var_dump($kode.' '.$nama.' '.$dukuh.' '.$alamat.' '.$nominal_pinjam.' '.$pokok.' '.$jasa.' '.$temp);

    $query = mysqli_query($koneksi,"INSERT INTO anggota_pinjam (kode, nama, no_telepon, dukuh, 'alamat', 'id_pinjam') VALUES ('$kode', '$nama', '$no_telepon', '$dukuh', '$alamat', '$temp') ");

    if ($query) {
        header("location:pengeluaran.php"); 
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
?>