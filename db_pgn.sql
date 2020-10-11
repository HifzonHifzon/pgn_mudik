-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2020 pada 08.33
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pgn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `prodi` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`) VALUES
('1139744', 'Muller', 'Sistem Komputer'),
('1210158', 'M Fikri', 'Sistem Informasi'),
('1210381', 'Amber Heard', 'Akuntansi'),
('1210382', 'Joko', 'Teknik Sipil'),
('1219482', 'Mario', 'Psikologi'),
('1324387', 'Daniell Champbell', 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pagination`
--

CREATE TABLE `pagination` (
  `nim` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pagination`
--

INSERT INTO `pagination` (`nim`, `nama`, `jurusan`, `alamat`) VALUES
(111999014, 'Rahmayanti', 'PGSD', 'Kp. Mekarsari RT.15/03 No.33'),
(111999021, 'Muhammad Yusuf Hamdani', 'Teknik Informatika', 'Jln. Cipaku Haji RT.02/07 No.15'),
(111999023, 'Putri Andini', 'Sistem Informasi', 'Kp. Mekarsari RT/RW 22/55 No.34'),
(111999025, 'Anggra Triawan Skom', 'Teknik Infirmatika S2', 'Kp. Buntar RT.02 / RW.09 Kel. Ciawi Kec.Bogor Selatan'),
(111999027, 'Alisya Rahmadani', 'PGBK', 'Perumahan Pakuan Hill, Monte carlo, Ciawi Bogor Selatan'),
(111999029, 'Muhammad Afnan', 'Hukum', 'Perumahan Pakuan Hill, Monte carlo, Ciawi Bogor Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_berangkat`
--

CREATE TABLE `tbl_jadwal_berangkat` (
  `id_berangkat` int(11) NOT NULL,
  `id_transportasi` varchar(45) DEFAULT NULL,
  `id_rute` varchar(45) DEFAULT NULL,
  `tanggal_berangkat` date DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal_berangkat`
--

INSERT INTO `tbl_jadwal_berangkat` (`id_berangkat`, `id_transportasi`, `id_rute`, `tanggal_berangkat`, `status`) VALUES
(1, '6', '2', '2020-10-10', 1),
(2, '7', '2', '2020-10-11', 1),
(3, '8', '3', '2020-10-11', 1),
(4, '9', '3', '2020-10-11', 1),
(5, '10', '3', '2020-10-11', 1),
(6, '11', '2', '2020-10-11', 1),
(7, '7', '3', '2020-10-14', NULL),
(8, '6', '2', '2020-10-10', NULL),
(9, '6', '2', '2020-10-10', NULL),
(10, '6', '2', '2020-10-10', NULL),
(11, '6', '2', '2020-10-10', NULL),
(12, NULL, NULL, NULL, NULL),
(13, '7', '4', '2020-10-31', NULL),
(14, '8', '3', '2020-10-28', NULL),
(15, '6', '2', '2020-08-20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_jenis_transportasi`
--

CREATE TABLE `tbl_master_jenis_transportasi` (
  `id_jenis_transportasi` int(11) NOT NULL,
  `name_jenis` varchar(20) DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_master_jenis_transportasi`
--

INSERT INTO `tbl_master_jenis_transportasi` (`id_jenis_transportasi`, `name_jenis`, `status`) VALUES
(1, 'BIS', 1),
(2, 'KAPAL', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_rute`
--

CREATE TABLE `tbl_master_rute` (
  `id_rute` int(11) NOT NULL,
  `asal` varchar(45) DEFAULT NULL,
  `tujuan` varchar(45) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_master_rute`
--

INSERT INTO `tbl_master_rute` (`id_rute`, `asal`, `tujuan`, `aktif`) VALUES
(2, 'Bandung ', 'Jakarta', 1),
(3, 'Surabaya', 'Jakarta', NULL),
(4, 'asd', 'asdas', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_transportasi`
--

CREATE TABLE `tbl_master_transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `kode_transportas` varchar(45) DEFAULT NULL,
  `name_transportasi` varchar(20) DEFAULT NULL,
  `jenis_transportasi` int(11) DEFAULT NULL,
  `slot` int(11) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `status_aktif` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_master_transportasi`
--

INSERT INTO `tbl_master_transportasi` (`id_transportasi`, `kode_transportas`, `name_transportasi`, `jenis_transportasi`, `slot`, `image`, `status_aktif`) VALUES
(5, 'BIS005', 'BIS DESA', 1, 23, 'bis2.jpg', 1),
(6, 'KAP001', 'KAPAL JAYA', 2, 30, 'kapal1.jpg', 1),
(7, 'KAP002', 'KAPAL INDO', 2, 32, 'kapal2.jpg', 1),
(8, 'KAP003', 'KAPAL RAYA', 2, 35, 'kapal4.jpg', 1),
(10, 'asdad', 'asdas', 1, 20, 'bis4.jpg', NULL),
(11, 'aasd', 'BIS SANY', 1, 31, 'bis8.jpg', NULL),
(13, 'asd', 'asdsa', NULL, NULL, NULL, NULL),
(14, 'asdasdas', 'sadas', NULL, NULL, NULL, NULL),
(15, 'd', 'asdasd', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_peserta` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `img1` varchar(40) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `img2` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_berangkat`
--

CREATE TABLE `tbl_transaksi_berangkat` (
  `id_transaksi_berangkat` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_jadwal_berangkat` int(11) DEFAULT NULL,
  `jumlah_peserta` varchar(45) DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `verifikasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tbl_jadwal_berangkat`
--
ALTER TABLE `tbl_jadwal_berangkat`
  ADD PRIMARY KEY (`id_berangkat`);

--
-- Indeks untuk tabel `tbl_master_jenis_transportasi`
--
ALTER TABLE `tbl_master_jenis_transportasi`
  ADD PRIMARY KEY (`id_jenis_transportasi`);

--
-- Indeks untuk tabel `tbl_master_rute`
--
ALTER TABLE `tbl_master_rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indeks untuk tabel `tbl_master_transportasi`
--
ALTER TABLE `tbl_master_transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indeks untuk tabel `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `tbl_transaksi_berangkat`
--
ALTER TABLE `tbl_transaksi_berangkat`
  ADD PRIMARY KEY (`id_transaksi_berangkat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal_berangkat`
--
ALTER TABLE `tbl_jadwal_berangkat`
  MODIFY `id_berangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_master_jenis_transportasi`
--
ALTER TABLE `tbl_master_jenis_transportasi`
  MODIFY `id_jenis_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_master_rute`
--
ALTER TABLE `tbl_master_rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_master_transportasi`
--
ALTER TABLE `tbl_master_transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi_berangkat`
--
ALTER TABLE `tbl_transaksi_berangkat`
  MODIFY `id_transaksi_berangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
