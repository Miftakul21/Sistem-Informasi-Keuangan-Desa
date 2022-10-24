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

    if($cek_jumlah_anggota > 0) {
        // jika sudah ada anggota
        $temp = $jum_anggota_peminjam['jum_anggota_peminjam'] + 1;
    } else {
        // jika belum ada anggota / kosong
        $temp = 1;
    }

    // Rumus
    $pokok = $nominal_pinjam / 10;
    $jasa = ($nominal_pinjam * 2) / 100;
    $pinjaman_penelusuran = $nominal_pinjam;
    $total_pinjaman = $jasa + $pokok;
    $pinjaman_gabungan = $total_pinjaman * $jangka_pinjaman;

    // tambah data anggota
    $query = mysqli_query($koneksi,"INSERT INTO anggota_pinjam (kode, nama, dukuh, alamat, id_pinjam) VALUES ('$kode', '$nama', '$dukuh', '$alamat', '$temp')");
    // tambah data pinjaman
    $query_data_pinjaman = mysqli_query($koneksi, "INSERT INTO pinjaman (id_pinjaman, nominal_pinjaman, pokok, jasa, total_pokok_jasa, pinjaman_penelusuran, pinjaman_gabungan, jangka_pinjaman, keterangan) VALUES ('$temp', '$nominal_pinjam', '$pokok', '$jasa', '$total_pinjaman','$pinjaman_penelusuran', '$pinjaman_gabungan', '$jangka_pinjaman', '')");

    if ($query) {
        header("location:pinjaman.php"); 
    }
    else{
        echo "ERROR, data gagal ditambah". mysqli_error($koneksi);
    }
?>