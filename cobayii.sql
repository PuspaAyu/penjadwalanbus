-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Mei 2018 pada 15.13
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobayii`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `jam_operasional` varchar(10) NOT NULL,
  `id_jurusan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `no_polisi`, `jam_operasional`, `id_jurusan`) VALUES
(1, 'S 7005 US', '0:50:00', 1),
(2, 'S 7351 US', '1:17:00', 2),
(3, 'S 7296 US', '2:00:00', 3),
(4, 'S 7537 US', '3:00:00', 1),
(5, 'S 7330 US', '3:30:00', 3),
(6, 'S 7358 US', '4:00:00', 2),
(7, 'S 7352 US', '4:23:00', 1),
(8, 'S 7335 US', '4:40:00', 1),
(9, 'S 7509 US', '5:02:00', 1),
(10, 'S 7538 US', '5:15:00', 3),
(11, 'S 7357 US', '5:30:00', 1),
(12, 'S 7332 US', '5:50:00', 3),
(13, 'S 7521 US', '6:05:00', 2),
(14, 'S 7355 US', '6:20:00', 1),
(15, 'S 7121 US', '6:33:00', 3),
(16, 'S 0000 US', '6:47:00', 1),
(17, 'S 7535 US', '7:00:00', 1),
(18, 'S 7501 US', '7:15:00', 3),
(19, 'S 7512 US', '7:30:00', 1),
(20, 'S 0000 US', '7:39:00', 1),
(21, 'S 7366 US', '7:40:00', 3),
(22, 'S 7299 US', '8:00:00', 1),
(23, 'S 7511 US', '8:15:00', 2),
(24, 'S 7239 US', '8:30:00', 3),
(25, 'S 7561 US', '8:45:00', 1),
(26, 'S 7522 US', '9:00:00', 1),
(27, 'S 0000 US', '9:09:00', 3),
(28, 'S 7353 US', '9:15:00', 1),
(29, 'S 7500 US', '9:25:00', 2),
(30, 'S 7052 US', '9:40:00', 3),
(31, 'S 7808 US', '10:00:00', 3),
(32, 'S 7806 US', '10:15:00', 1),
(33, 'S 7122 US', '10:30:00', 3),
(34, 'S 7333 US', '10:45:00', 2),
(35, 'S 7151 US', '11:02:00', 3),
(36, 'S 7123 US', '11:20:00', 3),
(37, 'S 0000 US', '11:35:00', 2),
(38, 'S 7036 US', '12:00:00', 3),
(39, 'S 7132 US', '12:15:00', 3),
(40, 'S 7035 US', '12:30:00', 3),
(41, 'S 7198 US', '12:50:00', 3),
(42, 'S 7050 US', '13:05:00', 3),
(43, 'S 0000 US', '13:20:00', 0),
(44, 'S 7367 US', '13:45:00', 2),
(45, 'S 7053 US', '14:00:00', 3),
(46, 'S 7517 US', '14:15:00', 2),
(47, 'S 7133 US', '14:30:00', 3),
(48, 'S 0000 US', '15:30:00', 3),
(49, 'S 7329 US', '15:45:00', 3),
(50, 'S 7150 US', '16:00:00', 3),
(51, 'S 7137 US', '16:15:00', 3),
(52, 'S 7009 US', '16:30:00', 3),
(53, 'S 0000 US', '16:50:00', 3),
(54, 'S 7251 US', '17:00:00', 3),
(55, 'S 7560 US', '17:20:00', 1),
(56, 'S 7339 US', '17:40:00', 2),
(57, 'S 7508 US', '18:00:00', 1),
(58, 'S 7298 US', '18:15:00', 3),
(59, 'S 7368 US', '18:30:00', 3),
(60, 'S 7360 US', '18:45:00', 1),
(61, 'S 7356 US', '19:00:00', 1),
(62, 'S 0000 US', '19:15:00', 1),
(63, 'S 7503 US', '19:30:00', 2),
(64, 'S 7518 US', '19:45:00', 1),
(65, 'S 7369 US', '20:00:00', 1),
(66, 'S 7233 US', '20:09:00', 3),
(67, 'S 7331 US', '20:18:00', 1),
(68, 'S 7502 US', '20:30:00', 2),
(69, 'S 7539 US', '20:45:00', 1),
(70, 'S 7510 US', '21:00:00', 1),
(71, 'S 7519 US', '21:15:00', 1),
(72, 'S 7359 US', '21:30:00', 1),
(73, 'S 7505 US', '21:48:00', 2),
(74, 'S 7520 US', '22:00:00', 1),
(75, 'S 7135 US', '22:09:00', 3),
(76, 'S 7337 US', '22:18:00', 1),
(77, 'S 7515 US', '22:30:00', 3),
(78, 'S 7536 US', '22:45:00', 1),
(79, 'S 0000 US', '23:00:00', 3),
(80, 'S 0000 US', '23:09:00', 1),
(81, 'S 7365 US', '23:18:00', 2),
(82, 'S 7506 US', '23:30:00', 3),
(83, 'S 7513 US', '23:45:00', 1),
(84, 'S 0000 US', '0:00:00', 3),
(85, 'S 7297 US', '0:15:00', 3),
(86, 'S 0000 US', '0:30:00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(10) NOT NULL,
  `jumlah_gaji` int(20) NOT NULL,
  `status_gaji` varchar(10) NOT NULL,
  `waktu_gaji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `jumlah_gaji`, `status_gaji`, `waktu_gaji`) VALUES
(1, 150000, 'ya', '0000-00-00'),
(2, 1000000, 'tidak', '2018-03-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(10) NOT NULL,
  `jumlah_hutang` int(20) NOT NULL,
  `status_hutang` varchar(10) NOT NULL,
  `alasan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `jumlah_hutang`, `status_hutang`, `alasan`) VALUES
(1, 300000, 'belum', 'belum ada uang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(10) NOT NULL,
  `tgl_izin` date NOT NULL,
  `jenis_izin` varchar(20) NOT NULL,
  `id_pegawai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin`
--

INSERT INTO `izin` (`id_izin`, `tgl_izin`, `jenis_izin`, `id_pegawai`) VALUES
(1, '2018-03-10', 'sakit', 0),
(2, '0000-00-00', 'saki', 0),
(3, '0000-00-00', 'sakit', 0),
(4, '2018-03-28', 'sakit', 0),
(5, '2018-03-28', 'pulkam', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jenis_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jenis_jabatan`) VALUES
(1, 'sopir'),
(2, 'kondektur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_bus` int(20) NOT NULL,
  `id_pegawai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_bus`, `id_pegawai`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_bus`
--

CREATE TABLE `jadwal_bus` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_bus` int(10) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  `id_sopir` int(10) NOT NULL,
  `id_kondektur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_bus`
--

INSERT INTO `jadwal_bus` (`id_jadwal`, `tanggal`, `id_bus`, `id_jurusan`, `id_sopir`, `id_kondektur`) VALUES
(1, '2018-04-27', 1, 1, 1, 68),
(2, '2018-04-27', 2, 2, 2, 69),
(3, '2018-04-27', 3, 3, 3, 70),
(4, '2018-04-27', 4, 1, 4, 71),
(5, '2018-04-27', 5, 3, 5, 72),
(6, '2018-04-27', 6, 2, 6, 73),
(7, '2018-04-27', 7, 1, 7, 74),
(8, '2018-04-27', 8, 1, 0, 0),
(9, '2018-04-27', 9, 1, 8, 75),
(10, '2018-04-27', 10, 3, 9, 76),
(11, '2018-04-27', 11, 1, 10, 77),
(12, '2018-04-27', 12, 3, 11, 78),
(13, '2018-04-27', 13, 2, 12, 79),
(14, '2018-04-27', 14, 1, 13, 80),
(15, '2018-04-27', 15, 3, 0, 0),
(16, '2018-04-27', 16, 1, 0, 0),
(17, '2018-04-27', 17, 1, 14, 81),
(18, '2018-04-27', 18, 3, 15, 82),
(19, '2018-04-27', 19, 1, 16, 83),
(20, '2018-04-27', 20, 1, 0, 0),
(21, '2018-04-27', 21, 3, 17, 84),
(22, '2018-04-27', 22, 1, 18, 85),
(23, '2018-04-27', 23, 2, 19, 86),
(24, '2018-04-27', 24, 3, 20, 87),
(25, '2018-04-27', 25, 1, 21, 88),
(26, '2018-04-27', 26, 1, 22, 89),
(27, '2018-04-27', 27, 3, 0, 90),
(28, '2018-04-27', 28, 1, 23, 91),
(29, '2018-04-27', 29, 2, 24, 92),
(30, '2018-04-27', 30, 3, 25, 93),
(31, '2018-04-27', 31, 3, 26, 94),
(32, '2018-04-27', 32, 1, 27, 95),
(33, '2018-04-27', 33, 3, 28, 96),
(34, '2018-04-27', 34, 2, 29, 97),
(35, '2018-04-27', 35, 3, 0, 0),
(36, '2018-04-27', 36, 3, 30, 98),
(37, '2018-04-27', 37, 2, 0, 0),
(38, '2018-04-27', 38, 3, 31, 99),
(39, '2018-04-27', 39, 3, 0, 0),
(40, '2018-04-27', 40, 3, 32, 100),
(41, '2018-04-27', 41, 3, 0, 0),
(42, '2018-04-27', 42, 3, 33, 101),
(43, '2018-04-27', 43, 0, 0, 0),
(44, '2018-04-27', 44, 2, 34, 102),
(45, '2018-04-27', 45, 3, 35, 103),
(46, '2018-04-27', 46, 2, 36, 104),
(47, '2018-04-27', 47, 3, 37, 105),
(48, '2018-04-27', 48, 3, 0, 0),
(49, '2018-04-27', 49, 3, 38, 106),
(50, '2018-04-27', 50, 3, 39, 107),
(51, '2018-04-27', 51, 3, 40, 108),
(52, '2018-04-27', 52, 3, 0, 0),
(53, '2018-04-27', 53, 3, 0, 109),
(54, '2018-04-27', 54, 3, 41, 110),
(55, '2018-04-27', 55, 1, 42, 111),
(56, '2018-04-27', 56, 2, 43, 112),
(57, '2018-04-27', 57, 1, 44, 113),
(58, '2018-04-27', 58, 3, 45, 114),
(59, '2018-04-27', 59, 3, 46, 115),
(60, '2018-04-27', 60, 1, 47, 116),
(61, '2018-04-27', 61, 1, 48, 117),
(62, '2018-04-27', 62, 1, 0, 118),
(63, '2018-04-27', 63, 2, 49, 119),
(64, '2018-04-27', 64, 1, 50, 120),
(65, '2018-04-27', 65, 1, 51, 121),
(66, '2018-04-27', 66, 3, 0, 0),
(67, '2018-04-27', 67, 1, 52, 122),
(68, '2018-04-27', 68, 2, 53, 123),
(69, '2018-04-27', 69, 1, 54, 124),
(70, '2018-04-27', 70, 1, 55, 125),
(71, '2018-04-27', 71, 1, 56, 126),
(72, '2018-04-27', 72, 1, 57, 127),
(73, '2018-04-27', 73, 2, 58, 128),
(74, '2018-04-27', 74, 1, 59, 129),
(75, '2018-04-27', 75, 3, 60, 130),
(76, '2018-04-27', 76, 1, 61, 131),
(77, '2018-04-27', 77, 3, 62, 132),
(78, '2018-04-27', 78, 1, 63, 133),
(79, '2018-04-27', 79, 3, 0, 0),
(80, '2018-04-27', 80, 1, 0, 0),
(81, '2018-04-27', 81, 2, 64, 134),
(82, '2018-04-27', 82, 3, 65, 135),
(83, '2018-04-27', 83, 1, 66, 136),
(84, '2018-04-27', 84, 3, 0, 0),
(85, '2018-04-27', 85, 3, 67, 137),
(86, '2018-04-27', 86, 3, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Magelang'),
(2, 'Semarang'),
(3, 'Jogja'),
(4, 'Cilacap'),
(5, 'Purwokerto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karcis`
--

CREATE TABLE `karcis` (
  `id_karcis` int(10) NOT NULL,
  `karcis_pergi` int(20) NOT NULL,
  `karcis_pulang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karcis`
--

INSERT INTO `karcis` (`id_karcis`, `karcis_pergi`, `karcis_pulang`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(10) NOT NULL,
  `isi_komplain` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `isi_komplain`) VALUES
(1, 'ngebut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1518604793),
('m130524_201442_init', 1518604800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_induk` int(10) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `riwayat_pendidikan` varchar(20) NOT NULL,
  `riwayat_pekerjaan` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `ktp_habis` date NOT NULL,
  `sim_habis` date NOT NULL,
  `shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `no_induk`, `alamat`, `no_tlp`, `id_jabatan`, `riwayat_pendidikan`, `riwayat_pekerjaan`, `tgl_masuk`, `jenis_kelamin`, `status`, `agama`, `kota`, `ktp_habis`, `sim_habis`, `shift`) VALUES
(1, 'Imam. S', 1801, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(2, 'A. Setyanto', 1802, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(3, 'Suhartono', 1803, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(4, 'Purnadi', 1804, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(5, 'Kasari', 1805, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(6, 'A. Harmoko', 1806, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(7, 'Kardi', 1807, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(8, 'Suherman', 1808, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(9, 'Suhadi', 1809, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(10, 'Dodik. H', 1810, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(11, 'N. Ikwan', 1811, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(12, 'Dani', 1812, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(13, 'Mustoalim', 1813, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(14, 'Budi Mulyanto', 1814, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(15, 'Soko. M', 1815, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(16, 'Andik. S', 1816, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(17, 'S. Pramono', 1817, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(18, 'Tamin', 1818, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(19, 'Dodik Eka. W', 1819, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(20, 'Nahmudin', 1820, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(21, 'Supadi', 1821, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(22, 'Kusdianto', 1822, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(23, 'Dedy Wuryanto', 1823, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(24, 'Puji Agus', 1824, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(25, 'Saranto', 1825, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(26, 'Sudarno', 1826, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(27, 'Hermono', 1827, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(28, 'Bambang. P', 1828, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(29, 'Heri Yulianto', 1829, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(30, 'Ida Bagus', 1830, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(31, 'Suyanto', 1831, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(32, 'Heri. S', 1832, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(33, 'Supriyadi', 1833, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(34, 'Hariyadi', 1834, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(35, 'Winarko', 1835, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(36, 'Abd. Rahman', 1836, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(37, 'Isroil', 1837, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(38, 'Wargo', 1838, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(39, 'M. Sokib', 1839, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(40, 'Soifudin', 1840, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(41, 'Ab. Rofik', 1841, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(42, 'Kusno', 1842, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(43, 'Agus Dwi. P', 1843, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(44, 'Feri Chandra', 1844, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(45, 'S. Riyadi', 1845, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(46, 'Nur Kholis', 1846, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(47, 'Bambang', 1847, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(48, 'Agus Toni. H', 1848, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(49, 'N. Haris', 1849, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(50, 'Teguh. H', 1850, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(51, 'Nur Kholik', 1851, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(52, 'Ali Muslyn', 1852, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(53, 'Hariyadi 2', 1853, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(54, 'Sugik', 1854, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(55, 'Isroyin', 1855, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(56, 'Ilyoso', 1856, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(57, 'Joko. W', 1857, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(58, 'Sutjipto', 1858, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(59, 'Triono', 1859, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(60, 'Faizin', 1860, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(61, 'Jokiyono', 1861, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(62, 'Muslimin', 1862, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(63, 'Ansori', 1863, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(64, 'Warsiman', 1864, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(65, 'Muntari', 1901, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(66, 'Muhaji', 1902, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(67, 'Asmuni', 1903, 'Surabaya', 2147483647, 1, 'SMA', 'Sopir', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(68, 'Ach. Rridwan', 1904, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(69, 'Pujianto', 1905, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(70, 'Siswanto', 1906, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(71, 'Trio Aji. C', 1907, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(72, 'Eko Bagus', 1908, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(73, 'Andi Purwanto', 1909, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(74, 'Sukaji', 1910, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(75, 'Iswanto', 1911, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(76, 'M. Saiful', 1912, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(77, 'Choirul Aris', 1913, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(78, 'Tri Candra', 1914, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(79, 'M. Rifandi', 1915, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(80, 'Widarto', 1916, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(81, 'Dwi. S', 1917, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(82, 'Agus Teguh', 1918, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(83, 'Saifudin', 1919, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(84, 'Suprayitno', 1920, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(85, 'Tarmuji', 1921, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(86, 'Wijatmoko', 1922, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(87, 'Sukri', 1923, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(88, 'Amiran', 1924, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(89, 'Puguh. W', 1925, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(90, 'Rizky. BU', 1926, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(91, 'Nanang', 1927, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(92, 'Teki Panca', 1928, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(93, 'Jumadi', 1929, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(94, 'Tamijo', 1930, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(95, 'Slamet. R', 1931, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(96, 'Tri Bowo', 1932, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(97, 'A. Tri Cahyono', 1933, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(98, 'Iqbal Adi', 1934, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(99, 'Mulyadi. M', 1935, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(100, 'Agus. S', 1936, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(101, 'Ilham Budi', 1937, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(102, 'Bayu Joko', 1938, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(103, 'Suwito', 1939, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(104, 'Hermawan', 1940, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(105, 'Choirul. A', 1941, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(106, 'D. Setiawan', 1942, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(107, 'Teguh. N', 1943, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(108, 'Najib', 1944, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(109, 'Eko. P', 1945, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(110, 'Sudarto', 1946, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(111, 'Suyono', 1947, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(112, 'Danang. E', 1948, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(113, 'A. Primadona', 1949, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(114, 'Erka Irawan', 1950, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(115, 'Ismu. R', 1951, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(116, 'Suprayitno. B', 1952, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(117, 'Slamet. K', 1953, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(118, 'Sudarwis', 1954, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(119, 'K. Sampurno', 1955, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(120, 'Andri. M', 1956, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(121, 'Budianto', 1957, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(122, 'Kariyono', 1958, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(123, 'Sukar', 1959, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(124, 'Zaenal. E', 1960, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(125, 'Ach. Yahya', 1961, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(126, 'Wahyu', 1962, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(127, 'Mansur', 1963, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(128, 'Supriyanto', 1964, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(129, 'M. Rudi', 1965, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(130, 'Rino Adi', 1966, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(131, 'Suroto', 1967, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(132, 'Sukepi', 1968, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(133, 'Agus. H', 1969, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(134, 'Nur Ali', 1970, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(135, 'Saiful', 1971, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(136, 'Untung', 1972, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', ''),
(137, 'Aris. K', 1973, 'Surabaya', 2147483647, 2, 'SMA', 'Kondektur', '0000-00-00', 'Laki-laki', 'Belum Nika', 'Islam', 'Surabaya', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setoran`
--

CREATE TABLE `setoran` (
  `id_setoran` int(10) NOT NULL,
  `pendapatan_kotor` int(20) NOT NULL,
  `pendapatan_bersih` int(20) NOT NULL,
  `pinjaman` int(20) NOT NULL,
  `solar` int(20) NOT NULL,
  `ongkos` int(20) NOT NULL,
  `tgl_setor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setoran`
--

INSERT INTO `setoran` (`id_setoran`, `pendapatan_kotor`, `pendapatan_bersih`, `pinjaman`, `solar`, `ongkos`, `tgl_setor`) VALUES
(1, 500000, 400000, 50000, 20000, 30000, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(10) NOT NULL,
  `tipe_karcis` varchar(10) NOT NULL,
  `stok_jmlh_karcis` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `tipe_karcis`, `stok_jmlh_karcis`) VALUES
(1, 'A', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tilangan`
--

CREATE TABLE `tilangan` (
  `id_tilangan` int(10) NOT NULL,
  `tanggal_tilangan` date NOT NULL,
  `denda` varchar(20) NOT NULL,
  `jenis_pelanggaran` varchar(20) NOT NULL,
  `tempat_kejadian` varchar(20) NOT NULL,
  `tanggal_batas_tilang` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tilangan`
--

INSERT INTO `tilangan` (`id_tilangan`, `tanggal_tilangan`, `denda`, `jenis_pelanggaran`, `tempat_kejadian`, `tanggal_batas_tilang`, `status`) VALUES
(1, '0000-00-00', '100000', 'melanggar', 'surabaya', '0000-00-00', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1' COMMENT '1=kabag,2=keuangan,3=karcis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `level`) VALUES
(1, 'puspa', 'YACEdhYhZ3gEEPfLgEOccYUYZHYD_z6y', '$2y$13$2PqPzMAkRWpLhKRrHyt0H.epNJsZm7SNP0rch/REcKwu5D2E5iVaC', NULL, 'puspa@gmail.com', 10, 1518605016, 1518605016, 0),
(2, 'kabag', 'Dm8Fs3QJ8hedGrxZCv2jV3lR_NoC3BqD', '$2y$13$XeCcGYFNKCzHEuFN4VcwlekhrzA49oYOkk07ELiRtWY0dBnO0Vs56', NULL, 'kabag@gmail.com', 10, 1519394488, 1519394488, 1),
(3, 'keuangan', '_KSrmTIBPy5yCYLVzD3NVguXJ0qlfDJK', '$2y$13$gEBurN6NxVwkYYlBDe0ZjeGmXnvbkZbP/n6KnF4rlSo66RjOn7V1e', NULL, 'keuangan@gmail.com', 10, 1519394532, 1519394532, 2),
(4, 'karcis', 'NL_YAgqgWYckH0HHZrVNESA2p7WBHOlK', '$2y$13$a9BGOcZOyHJ2TNF5P8ro2OExv5H/mTriPSLmp9bCWRdxuk5MLWpzi', NULL, 'karcis@gmail.com', 10, 1519394559, 1519394559, 3),
(5, 'ishom', 'w2-U6m-zCIySyqG9aYCUV34TM7atvUmD', '$2y$13$DnA2GL6qE4FIgclQ0m6TNOj6JjjzHWYeLWqiDeq7g7w0/3SQB6Moq', NULL, 'ishom@gmail.com', 10, 1520501033, 1520501033, 1),
(6, 'isho2', '9rQqXeVDDx1gEaNL1eVJL_kGn0fiyZBy', '$2y$13$rgN4MBXqARmFUuNA81FHbOZpjjzqI6Oc1mfTfCiYKl.wCuikpnaiC', NULL, 'isho2@gmail.com', 10, 1520501724, 1520501724, 3),
(7, 'puspa1', '2vhvGWmYefJs0zzYkRssCbOY6iqAw-X_', '$2y$13$NhKwq4a6F.fmPPcGO2N2oex6oMA5KRQv4hQQICbPkM2c4AJfSwQw6', NULL, 'puspa1@gmail.com', 10, 1520513868, 1520513868, 1),
(8, 'puspa2', 'aKKPSzzxJocCz3g7g4iafP4csL-pVIrl', '$2y$13$KsiS/FmvhlNxjCUn0DndfuJbEKbUJFPXQOd/ZTWySmvi7LErG0r16', NULL, 'puspa2@gmail.com', 10, 1520513939, 1520513939, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jadwal_bus`
--
ALTER TABLE `jadwal_bus`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `karcis`
--
ALTER TABLE `karcis`
  ADD PRIMARY KEY (`id_karcis`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id_setoran`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tilangan`
--
ALTER TABLE `tilangan`
  ADD PRIMARY KEY (`id_tilangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jadwal_bus`
--
ALTER TABLE `jadwal_bus`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `karcis`
--
ALTER TABLE `karcis`
  MODIFY `id_karcis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `setoran`
--
ALTER TABLE `setoran`
  MODIFY `id_setoran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tilangan`
--
ALTER TABLE `tilangan`
  MODIFY `id_tilangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
