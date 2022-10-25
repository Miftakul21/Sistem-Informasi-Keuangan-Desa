<?php 
    include('koneksi.php');

    $id = $_GET['id'];
    $kode = $_GET['kode'];
    $nama = $_GET['nama'];
    $dukuh = $_GET['dukuh'];
    $alamat = $_GET['alamat'];
    $nominal_pinjam = $_GET['nominal_pinjam'];
    $jangka_pinjaman = $_GET['jangka_pinjaman'];    

    $query = mysqli_query($koneksi,"UPDATE anggota_pinjam SET kode = '$kode', nama = '$nama', dukuh = '$dukuh', alamat = '$alamat' WHERE id = '$id'");
    
    // data pinjaman
    $pokok = $nominal_pinjam / 10;
    $jasa = ($nominal_pinjam * 2) / 100;
    $total_pinjaman = $jasa + $pokok;
    $pinjaman_penelusuran = $nominal_pinjam;
    $pinjaman_gabungan = $total_pinjaman * $jangka_pinjaman;

    $query2 = mysqli_query($koneksi, "UPDATE pinjaman SET nominal_pinjaman = '$nominal_pinjam', pokok = '$pokok', jasa = '$jasa', total_pokok_jasa = '$total_pinjaman', pinjaman_penelusuran = '$pinjaman_penelusuran', pinjaman_gabungan = '$pinjaman_gabungan', jangka_pinjaman = '$jangka_pinjaman', keterangan = '' WHERE id_pinjaman = '$id'");

    if ($query) {
        header("location:pinjaman.php"); 
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }

?>