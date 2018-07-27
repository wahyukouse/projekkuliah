-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 05:48 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', 'admin', 'Wahyu Kuncoro');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `no_pembayaran` varchar(18) NOT NULL,
  `nisn` char(10) NOT NULL,
  `id_pembayaran` int(4) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`no_pembayaran`, `nisn`, `id_pembayaran`, `waktu`, `jumlah`, `status`) VALUES
('201712290453540001', '2147483647', 3, '2017-12-29 04:53:54', 350000, 'Disetujui'),
('201804242020540001', '2147483647', 3, '2018-04-24 20:20:54', 350000, 'Belum katif'),
('201807242234170001', '2147483641', 1, '2018-07-24 22:34:18', 0, 'Belum katif');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` char(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `password`, `id_mapel`, `nama_lengkap`, `alamat`, `tempat_lahir`, `tgl_lahir`, `gol_darah`) VALUES
('9112233447', 'guru', 1, 'AMIKOM', 'Condong Catur Depok Sleman Yogyakarta ', 'Stikes Guna Bangsa', '2017-12-09', 'A'),
('9911223343', 'guru', 2, 'Wahyu Kuncoro', 'Condong Catur Depok Sleman Yogyakarta', 'Stikes Guna Bangsa', '2017-12-23', 'AB'),
('9911223348', '', 2, 'SI', 'Condong Catur Depok Sleman Yogyakarta', 'Stikes Guna Bangsa', '2017-12-22', 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `id_tahun` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_mapel` int(2) NOT NULL,
  `nip` char(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_tahun`, `id_kelas`, `id_mapel`, `nip`, `hari`, `jam`, `semester`) VALUES
(11, 13, 6, 1, '9112233447', 'Senin', '07.15-08.00', 'Ganjil'),
(12, 13, 1, 1, '9112233447', 'Senin', '07.15-08.00', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(4) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'XI IPA 1'),
(2, 'XI IPA 2'),
(3, 'XI IPS 1'),
(6, 'XI IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `nip` char(10) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `tgl_upload`, `nip`, `id_tahun`, `id_mapel`) VALUES
(21, '20171127_P2-DDL.pdf', '2017-12-29 12:30:23', '9112233447', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mepel`
--

CREATE TABLE `mepel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mepel`
--

INSERT INTO `mepel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Biologi'),
(8, 'Fisika');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `uts` int(3) NOT NULL,
  `uas` int(3) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nisn`, `id_mapel`, `id_tahun`, `uts`, `uas`, `semester`) VALUES
(26, '2147483641', 1, 13, 80, 68, 'Ganjil'),
(27, '2147483647', 1, 13, 98, 87, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(4) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `jenis`, `biaya`) VALUES
(1, 'Pembelian Seragam dan Daftar Ulang', 750000),
(3, 'Daftar Ulang', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `no_pendaftaran` varchar(12) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_smp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`no_pendaftaran`, `id_tahun`, `nisn`, `nama_lengkap`, `alamat`, `tempat_lahir`, `tgl_lahir`, `asal_smp`) VALUES
('201712290001', 13, '1711190007', 'wahyu kuncoro', 'Jl. kaswari no 75 rt 03 rw 15', 'sleman', '2017-12-13', 'SMP Muhammadiyah 1 Rawa Bening'),
('201801200001', 13, '9911326502', 'wahyu kuncoro', 'Jl. kaswari no 75 rt 03 rw 15', 'sleman', '2018-01-24', 'SMP Muhammadiyah 1 Rawa Bening'),
('201801200002', 13, '9911326509', 'wahyu kuncoro', 'Jl. kaswari no 75 rt 03 rw 15', 'sleman', '2018-01-11', 'SMP Muhammadiyah 1 Rawa Bening');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` char(2) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `asal_smp` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `password`, `id_kelas`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `gol_darah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `asal_smp`, `status`) VALUES
('1711190007', '', 0, 'wahyu kuncoro', 'sleman', '2017-12-13', '-', '-', '-', '-', '-', 'Jl. kaswari no 75 rt 03 rw 15', 'SMP Muhammadiyah 1 Rawa Bening', ''),
('2147483641', 'siswa', 1, 'fsgfsg', 'OKU Timur', '2017-11-10', '-', '-', '-', '-', '-', 'Jl Kaswari no 75 RT 03 RW 15 Mancasan Lor Condong Catur Depok Sleman Yogyakarta', 'dfdf', 'Tidak Aktif'),
('2147483647', 'siswa', 1, 'Wahyu Kuncoro', 'OKU Timur', '1997-09-15', '-', '-', '-', '-', '-', 'Jl Kaswari no 75 RT 03 RW 15 Mancasan Lor Condong Catur Depok Sleman Yogyakarta', 'SMP Muhammadiyah 1 Rawa Bening', 'Aktif'),
('9911326509', 'siswa', 2, 'Wahyu Kuncoro', 'Stikes Guna Bangsa', '2017-12-15', '-', '-', '-', '-', '-', '-', 'SMP Muhammadiyah 1 Rawa Bening', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `thn_ajaran`
--

CREATE TABLE `thn_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `thn_ajaran` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thn_ajaran`
--

INSERT INTO `thn_ajaran` (`id_tahun`, `thn_ajaran`, `status`) VALUES
(2, '2016/2017', 'tidak aktif'),
(13, '2017/2018', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mepel`
--
ALTER TABLE `mepel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `thn_ajaran`
--
ALTER TABLE `thn_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mepel`
--
ALTER TABLE `mepel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thn_ajaran`
--
ALTER TABLE `thn_ajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pembayaran_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mepel` (`id_mapel`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `thn_ajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mepel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mepel` (`id_mapel`) ON DELETE CASCADE,
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `thn_ajaran` (`id_tahun`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `thn_ajaran` (`id_tahun`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mepel` (`id_mapel`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `thn_ajaran` (`id_tahun`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
