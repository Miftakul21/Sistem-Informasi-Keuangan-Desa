<?php
    include('koneksi.php');

    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $dukuh = $_GET['dukuh'];
    $alamat = $_GET['alamat'];
    $nominal_pinjam = $_GET['nominal_pinjam'];
    $jangka_pinjaman = $_GET['jangka_pinjaman'];

    $query_pinjam = mysqli_query($koneksi, "SELECT *, COUNT(*) AS jum_anggota_peminjam FROM anggota_pinjam");
    $jum_anggota_peminjam = mysqli_fetch_array($query_pinjam);
    $cek_jumlah_anggota = mysqli_num_rows($query_pinjam);
    $temp;
    // echo var_dump($kode.' '.$nama.' '.$dukuh.' '.$alamat.' '.$nominal_pinjam.' '.$jangka_pinjaman);

    // Rumus
    $pokok = $nominal_pinjam / 10;
    $jasa = ($nominal_pinjam * 2) / 100;
    $total_pinjaman = $jasa + $pokok;
    $pinjaman_penelusuran = $nominal_pinjam;
    $pinjaman_gabungan = $total_pinjaman * $jangka_pinjaman;

    // tambah data anggota
    $query = mysqli_query($koneksi,"INSERT INTO anggota_pinjam (kode, nama, dukuh, alamat) VALUES ('$kode', '$nama', '$dukuh', '$alamat')");

    $id_pinjaman =  mysqli_insert_id($koneksi);
    // tambah data pinjaman
    $query_data_pinjaman = mysqli_query($koneksi, "INSERT INTO pinjaman (id_pinjaman, nominal_pinjaman, pokok, jasa, total_pokok_jasa, pinjaman_penelusuran, pinjaman_gabungan, jangka_pinjaman, keterangan) VALUES ('$id_pinjaman', '$nominal_pinjam', '$pokok', '$jasa', '$total_pinjaman','$pinjaman_penelusuran', '$pinjaman_gabungan', '$jangka_pinjaman', '')");

    if ($query) {
        header("location:pinjaman.php"); 
    }
    else{
        echo "ERROR, data gagal ditambah". mysqli_error($koneksi);
    }
?>