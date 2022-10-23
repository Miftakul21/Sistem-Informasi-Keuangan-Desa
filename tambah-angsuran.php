<?php
//include('dbconnected.php');
include('koneksi.php');

$tanggal = $_GET['tanggal'];
$code = $_GET['code'];
$dukuh = $_GET['dukuh'];
$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
$jangka_pinjaman = $_GET['jangka_pinjaman'];
$nominal_pinjaman_awal = $_GET['nominal_pinjaman_awal'];
$pokok = $nominal_pinjaman_awal/$jangka_pinjaman;
$jasa = $nominal_pinjaman_awal/50;
$total_pokok_jasa = $pokok+$jasa;
$sisapinjaman1 = $nominal_pinjaman_awal;
$sisapinjaman2 = $total_pokok_jasa*$jangka_pinjaman;
//query update
$query = mysqli_query($koneksi,"INSERT INTO `angsuran` (`tanggal`, `code`, `dukuh`, `nama`, `alamat`, `jangka_pinjaman`, `nominal_pinjaman_awal`, `pokok`, `jasa`, `Total_pokok_jasa`, `sisa_pinjaman_belum_jasa`, `sisa_pinjaman_pokok_dan_jasa`) VALUES ('$tanggal', '$code', '$dukuh', '$nama', '$alamat', '$jangka_pinjaman', '$nominal_pinjaman_awal', '$pokok', '$jasa', '$total_pokok_jasa'
, '$sisapinjaman1', '$sisapinjaman2')");

if ($query) {
 # credirect ke page index
 header("location:angsuran.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>