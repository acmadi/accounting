-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Mei 2014 pada 06.11
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lela`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_agama` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `agama_kd_agama_unique` (`kd_agama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id`, `kd_agama`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'Hindu', '2014-05-19 02:39:10', '2014-05-20 07:59:30'),
(3, 'A002', 'Islam', '2014-05-20 07:59:19', '2014-05-20 07:59:19'),
(4, 'A003', 'Budha', '2014-05-20 07:59:45', '2014-05-20 07:59:45'),
(5, 'A004', 'Kristen', '2014-05-20 08:00:12', '2014-05-20 08:00:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE IF NOT EXISTS `departemen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_dep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_dep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `departemen_kd_dep_unique` (`kd_dep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id`, `kd_dep`, `nama_dep`, `created_at`, `updated_at`) VALUES
(2, 'D002', 'IT', '2014-05-13 08:46:13', '2014-05-14 04:47:52'),
(3, 'D001', 'Agama', '2014-05-14 01:13:09', '2014-05-14 04:29:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_gol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gol_pok` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tun_jab` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `golongan_kd_gol_unique` (`kd_gol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `kd_gol`, `gol_pok`, `tun_jab`, `created_at`, `updated_at`) VALUES
(1, 'G001', '3A', 120000, '2014-05-14 02:41:15', '2014-05-14 02:46:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_jab` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_jabatan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tun_kes` int(11) NOT NULL,
  `tun_mkn` int(11) NOT NULL,
  `tun_transport` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jabatan_kd_jab_unique` (`kd_jab`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `kd_jab`, `nama_jabatan`, `tun_kes`, `tun_mkn`, `tun_transport`, `created_at`, `updated_at`) VALUES
(2, 'J002', 'Pegawai', 50000, 60000, 70000, '2014-05-13 01:21:09', '2014-05-13 04:16:42'),
(3, 'J003', 'asdf', 2222, 111, 555, '2014-05-13 03:40:21', '2014-05-13 03:40:21'),
(4, 'J001', 'Direktur', 45000, 50000, 60000, '2014-05-13 04:27:28', '2014-05-13 04:27:28'),
(5, 'J004', 'kamndo', 1200, 13000, 14000, '2014-05-13 07:28:16', '2014-05-13 07:28:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_agama` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_dep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_jab` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_gol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_statuskawin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_karyawan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nik` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama_depan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jen_kel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_masuk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_keluar` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `propinsi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `no_telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_handphone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `karyawan_kd_karyawan_unique` (`kd_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `kd_agama`, `kd_dep`, `kd_jab`, `kd_gol`, `kd_statuskawin`, `kd_karyawan`, `nik`, `nama_depan`, `nama_belakang`, `jen_kel`, `tempat_lahir`, `tgl_lahir`, `pendidikan`, `tgl_masuk`, `tgl_keluar`, `alamat`, `desa`, `kota`, `propinsi`, `kode_pos`, `no_telephone`, `no_handphone`, `email`, `npwp`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'D002', 'J001', 'G001', 'P002', 'K001', '123', 'raden', 'ahmad', 'laki-laki', 'gresik', '15 juli 1992', 'S1 Sistem Informasi', '17 juli 1992', '25 juli 1992', 'jl. nirwana no. 1', 'sawahmulya', 'sangkapura', 'jawa timur', '61181', '081804109307', '081804109307', 'msbdiy@yahoo.com', '1234', 'me.jpg', '2014-05-20 02:25:14', '2014-05-21 07:50:16'),
(4, 'A001', 'D001', 'J001', 'G001', 'P001', 'K002', '4786', 'dono', 'arius', 'perempuan', 'jogjakarta', '30 juli 2010', 'teknik informatika', '2 juli 2011', '5 juli 2012', 'Jl. Nirwana no. 1', 'kebo harjo', 'banguntapan', 'jawa Tengah', '51172', '0856987678', '0816987678', 'rdn_trik@yahoo.com', '12345678', 'subarjo.png', '2014-05-20 04:38:55', '2014-05-20 04:38:55'),
(5, 'A003', 'D002', 'J003', 'G001', 'P003', 'K004', '8976', 'Subagio', 'Sumarjan', 'Perempuan', 'surabaya', '15 juli 1992', 'Guru', '16 juli 1992', '25 juli 1992', 'Jl. Anggrek No.2 ', 'Giri', 'Jogja', 'Jawa Barat', '9878', '23423434', '070127312', 'elga@yahoo.com', '00898', '', '2014-05-20 08:02:51', '2014-05-26 01:40:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `marketing`
--

CREATE TABLE IF NOT EXISTS `marketing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_marketing` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_depan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `propinsi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kode_pos` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `marketing_kd_marketing_unique` (`kd_marketing`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `marketing`
--

INSERT INTO `marketing` (`id`, `kd_marketing`, `nama_depan`, `nama_belakang`, `username`, `password`, `email`, `no_hp`, `alamat`, `kota`, `propinsi`, `kode_pos`, `created_at`, `updated_at`) VALUES
(2, 'M003', 'Doni', 'Arius', 'doniarius', '$2y$10$zNMv6.Lu/YV4LBXrviw6NO/b074CKDnng/MN6QyfYd9BqK4bdECKG', 'doniarius@yahoo.com', '081804109307', 'Jl. Nusa Indah No. 4', 'Yogyakarta', 'jawa Tengah', '5678', '2014-05-16 03:48:57', '2014-05-26 03:40:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_06_132149_buat_tabel-users', 1),
('2014_04_06_163057_create_session_table', 1),
('2014_04_07_193037_buat_tabel_perusahaan', 1),
('2014_04_07_204429_buat_tabel_pemasok', 1),
('2014_04_18_181631_buat_tabel_pelanggan', 1),
('2014_04_19_173441_buat_tabel_pemasukan', 1),
('2014_04_20_203320_buat_tabel_pembelian', 1),
('2014_04_30_200730_buat_tabel_pengeluaran', 1),
('2014_04_30_221209_buat_tabel_barang', 1),
('2014_05_05_004843_buat_tabel_penjualan', 1),
('2014_05_12_092915_create_agama_table', 2),
('2014_05_12_142925_create_departemen_table', 3),
('2014_05_13_090223_create_jabatan_table', 4),
('2014_05_13_134815_create_departemen_table', 5),
('2014_05_13_145522_create_departemenme_table', 6),
('2014_05_14_083827_create_golongan_table', 7),
('2014_05_14_095234_create_ptkp_table', 8),
('2014_05_14_130151_create_perusahaan_table', 9),
('2014_05_16_082607_create_marketing_table', 10),
('2014_05_19_084737_create_owner_table', 11),
('2014_05_19_085509_create_karyawan_table', 11),
('2014_05_19_093635_create_agama_table', 12),
('2014_05_19_101501_create_karyawan_table', 13),
('2014_05_20_160923_create_owner_table', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_karyawan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_perusahaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_marketing` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_owner` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama_depan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `handphone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `propinsi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `owner_kd_owner_unique` (`kd_owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`id`, `kd_karyawan`, `kd_perusahaan`, `kd_marketing`, `kd_owner`, `username`, `password`, `nama_depan`, `nama_belakang`, `handphone`, `npwp`, `alamat`, `kota`, `propinsi`, `kode_pos`, `email`, `created_at`, `updated_at`) VALUES
(2, 'K002', 'PR001', 'M003', 'OW001', 'raden ahmad', 'fasdfasdfa', 'ainul', 'yakin', '081804109307', '00898', 'Jl. Kusuma warga', 'Jogja', 'jawa tengah', '87789', 'msbdiy33@yahoo.com', '2014-05-21 06:09:37', '2014-05-21 09:41:15'),
(3, 'K002', 'PR001', 'M003', 'OW003', 'sani', 'adfasdf', 'suni', 'sunirahman', '081867949678', '00898', 'Jl. Nusa Indah No. 4', 'sangkapura', 'jawa tengah', '61181', 'rdn_trik@yahoo.com', '2014-05-26 01:39:45', '2014-05-26 01:39:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pelanggan_kode_unique` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode`, `nama`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'C001', 'CAHYANGGA', '0856 3452 7364', 'Jl. Yudhawastu No. 23', '2014-05-13 06:34:07', '2014-05-13 06:34:07'),
(2, 'C002', 'IMAS', '022 8654 4434', 'Jl. Ciwastra No. 95', '2014-05-13 06:34:07', '2014-05-13 06:34:07'),
(3, 'C003', 'ASEP', '022 3890 4590', 'Jl. Ciwidey No. 11', '2014-05-13 06:34:07', '2014-05-13 06:34:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `logo`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'logo_21052014132900.jpg', 'Ahmad Corp', 'JL..', '2014-05-13 06:34:06', '2014-05-21 06:29:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan1`
--

CREATE TABLE IF NOT EXISTS `perusahaan1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_perusahaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `propinsi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `handphone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `perusahaan1_kd_perusahaan_unique` (`kd_perusahaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `perusahaan1`
--

INSERT INTO `perusahaan1` (`id`, `kd_perusahaan`, `nama_perusahaan`, `alamat`, `kota`, `propinsi`, `kode_pos`, `handphone`, `telephone`, `fax`, `email`, `created_at`, `updated_at`) VALUES
(1, 'PR001', 'mediaku', 'solution', 'business', 'jawa', '9878', '081804109307', '0274897789', '02749874565', 'msbdiy@yahoo.com', '2014-05-14 02:16:16', '2014-05-16 01:16:57'),
(2, 'PR002', 'smart', 'jl. smart', 'sleman', 'jawa tengah', '6787', '081867949678', '0274786786', '0274786786', 'amikom.me@gmail.com', '2014-05-14 08:32:51', '2014-05-14 08:32:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptkp`
--

CREATE TABLE IF NOT EXISTS `ptkp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_statuskawin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_ptkp` int(11) NOT NULL,
  `status_kawin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ptkp_kd_statuskawin_unique` (`kd_statuskawin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `ptkp`
--

INSERT INTO `ptkp` (`id`, `kd_statuskawin`, `jumlah_ptkp`, `status_kawin`, `created_at`, `updated_at`) VALUES
(2, 'P001', 2, 'sudah kawin', '2014-05-14 04:09:44', '2014-05-14 04:41:47'),
(3, 'P002', 4, 'belum kawin', '2014-05-14 04:10:11', '2014-05-14 04:42:31'),
(4, 'P003', 6, 'sudah kawin', '2014-05-14 04:43:32', '2014-05-14 04:43:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `last_activity`) VALUES
('f8d1c40d050c85c29e79d8523a76706616c3375a', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMDJ5SU1KSlVWS3RrakpMcTMwUkxWOWlaOTYzV04wR1dvVlpqSmFHUSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9sZWxhL3B1YmxpYy9sb2dvdXQiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDAxMDc3NDg1O3M6MToiYyI7aToxNDAxMDY2NDQxO3M6MToibCI7czoxOiIwIjt9fQ==', 1401077485);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `akses` smallint(6) NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `nama`, `nama_belakang`, `email`, `akses`, `alamat`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, '', 'Admin', '', 'admin@local.com', 3, 'Bandung', 'admin', '$2y$10$6W2rexU5XTCRRA6snDPXZO27/lBf3RtFbpZ8qaaJNoiyP8HnC2YcC', '2014-05-13 06:34:05', '2014-05-13 06:34:05'),
(3, '', 'Ibnu Rusdianto', '', 'ibnu@local.com', 1, 'Cigugur', 'inugrepes', '$2y$10$T03sOsnYwBnpkA.izeyxdOLKLifuGi21X4bn3sgyLo8uL8A/ntXqi', '2014-05-13 06:34:05', '2014-05-13 06:34:05'),
(6, 'foto_22052014132842.PNG', 'asdfasd', 'fadsfasdf', 'rdn_trik@yahoo.com', 2, 'adfasdf', 'fasdf', '$2y$10$lGxMZrt2GDu5mTjB4DC.SeFoi4YHVaQ4tgJF40YEZ7MrJI0MsZzo6', '2014-05-22 06:28:42', '2014-05-22 06:28:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
