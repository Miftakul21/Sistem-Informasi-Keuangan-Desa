-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 05.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_pinjam`
--

CREATE TABLE `anggota_pinjam` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dukuh` varchar(80) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_pinjam`
--

INSERT INTO `anggota_pinjam` (`id`, `kode`, `nama`, `dukuh`, `alamat`) VALUES
(1, 'Pribadi', 'Miftakul Huda', 'Dukuh 1', 'MINGGIRSARI 01/01'),
(2, 'POK 1', 'Bejo Ojo Dumeh', 'Dukuh 2', 'MINGGIRSARI 01/02'),
(3, 'Pribadi', 'Uraraka Ocahaco Chan', 'Dukuh 5', 'MINGGIRSARI 02/02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `id_anggota` varchar(40) NOT NULL,
  `tgl` date NOT NULL,
  `jasa` int(11) NOT NULL,
  `pokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id_anggota`, `tgl`, `jasa`, `pokok`) VALUES
('2', '2022-10-25', 50000, 10000),
('2', '2022-10-25', 5000, 10000),
('2', '2022-10-25', 5000, 10000),
('1', '2022-10-25', 50000, 10000),
('1', '2022-10-25', 5000, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `catatan`) VALUES
(1, 'Semangat Nggeh'),
(2, 'Hari Kamis jam 8 akan ada rapat, diharapkan kepada semua karyawan agar dapat berhadir.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `pass`, `no_telepon`, `alamat`, `role`) VALUES
(1, 'Novandika Yuda P.', 'novandika123@gmail.com', 'admin123', '085204118148', 'Ponorogo', 'admin'),
(4, 'Putra Dwi A.', 'putradwi@gmail.com', '12345678', '12345678', 'Surabaya 1', 'Bendahara'),
(6, 'Rizky FIjar Hidayat', 'rizkyfajar@gmail.com', '123456', '08810367187777', 'Surabaya Kepanjen Rt.1 Rw. 10', 'Sekertaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`id_kas`, `tgl`, `keterangan`, `debet`, `kredit`, `saldo`) VALUES
(2, '2022-10-20', 1, 0, 500000, 300000),
(3, '2022-10-20', 1, 1000000, 0, 1400000),
(5, '2022-10-25', 1, 100000, 0, 6580000),
(6, '2022-10-25', 1, 50000, 0, 6630000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Saldo Awal'),
(2, 'Honor Karyawan'),
(3, 'Pembayaran Wifi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(30) NOT NULL,
  `nominal_pinjaman` int(11) NOT NULL,
  `pokok` int(11) NOT NULL,
  `jasa` int(11) NOT NULL,
  `total_pokok_jasa` int(11) NOT NULL,
  `pinjaman_penelusuran` int(11) NOT NULL,
  `pinjaman_gabungan` int(11) NOT NULL,
  `jangka_pinjaman` varchar(10) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `nominal_pinjaman`, `pokok`, `jasa`, `total_pokok_jasa`, `pinjaman_penelusuran`, `pinjaman_gabungan`, `jangka_pinjaman`, `keterangan`) VALUES
('1', 500000, 50000, 10000, 60000, 500000, 600000, '10', ''),
('2', 2500000, 250000, 50000, 300000, 2500000, 1500000, '5', ''),
('3', 5000000, 500000, 100000, 600000, 5000000, 6000000, '10', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id`, `saldo`) VALUES
(1, 6630000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_pinjam`
--
ALTER TABLE `anggota_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_pinjam`
--
ALTER TABLE `anggota_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
