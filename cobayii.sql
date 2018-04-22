-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Apr 2018 pada 09.10
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
  `id_bus` int(10) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `jam_operasional` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `no_polisi`, `jam_operasional`) VALUES
(1, '12345', '08'),
(2, '1234', '11:31:05'),
(3, '123456', '05:00:00'),
(4, '2345', '08'),
(5, '2345', '08'),
(6, '2345', '08'),
(7, '2345', '08');

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
  `id_jadwal` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_berangkat` time(6) NOT NULL,
  `id_bus` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `jam_datang` time(6) NOT NULL,
  `id_jurusan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_pegawai` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_induk` int(10) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
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

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `no_induk`, `alamat`, `no_tlp`, `jabatan`, `riwayat_pendidikan`, `riwayat_pekerjaan`, `tgl_masuk`, `jenis_kelamin`, `status`, `agama`, `kota`, `ktp_habis`, `sim_habis`, `shift`) VALUES
(1, 'puspa', 2103151007, 'mojokerto', 2147483647, 'sopir', 'sma', 'sma', '0000-00-00', 'perempuan', 'mahasiswa', 'islam', 'mjkert', '0000-00-00', '0000-00-00', ''),
(2, 'ayu', 2103151008, 'surabaya', 2147483647, 'kondektur', 'sma', 'sma', '0000-00-00', 'perempuan', 'pelajar', 'islam', 'surabaya', '0000-00-00', '0000-00-00', ''),
(3, 'anggraini', 2103151007, 'mojokerto', 2147483647, 'sopir', 'sma', 'sma', '0000-00-00', 'perempuan', 'mahasiswa', 'islam', 'mjkert', '0000-00-00', '0000-00-00', '');

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
  MODIFY `id_bus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
