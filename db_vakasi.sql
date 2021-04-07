-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2021 at 03:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vakasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

CREATE TABLE `t_dosen` (
  `id` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `kode_dosen` varchar(100) NOT NULL,
  `nidn` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_dosen`
--

INSERT INTO `t_dosen` (`id`, `nama_dosen`, `kode_dosen`, `nidn`, `pendidikan_terakhir`) VALUES
(4, 'dosen', 'kode', 'nidn', 'pendidikan terakhir'),
(6, 'Agastya Pandu', 'AP', '1217619', 'S1'),
(9, 'pandu', 'PDN', '192837', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `tanggal_ujian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jadwal`
--

INSERT INTO `t_jadwal` (`id`, `id_matkul`, `id_dosen`, `id_tahun`, `hari`, `jam`, `tanggal_ujian`) VALUES
(2, 11, 6, 2, 'senin', '12.00-13.00', '2021-03-01'),
(3, 9, 9, 0, 'senin', '8:55 PM', '2021-04-07'),
(4, 9, 4, 0, 'senin', '10.00-12.00', '2021-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id`, `nama_kelas`, `kode_kelas`) VALUES
(4, 'reguler', 'RGL'),
(5, 'karyawan', 'KYN'),
(6, 'Eksekutif', 'EKF');

-- --------------------------------------------------------

--
-- Table structure for table `t_matkul`
--

CREATE TABLE `t_matkul` (
  `id` int(11) NOT NULL,
  `kode_matkul` varchar(100) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `jenis_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_matkul`
--

INSERT INTO `t_matkul` (`id`, `kode_matkul`, `nama_matkul`, `sks`, `jenis_kelas`) VALUES
(3, 'mk', 'Matkul', 2, '2'),
(5, 'mk', 'mk', 5, '5'),
(6, 'METLIT', 'mk', 5, '5'),
(7, 'Pemograman 2', 'mk', 5, '5'),
(8, 'KWU', 'Kewirausahaan', 2, '5'),
(9, 'mk', 'mk', 5, '5'),
(10, 'mk', 'mkedit', 5, '5'),
(11, 'P1', 'Pemograman 1', 3, '5');

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai`
--

CREATE TABLE `t_nilai` (
  `id` int(11) NOT NULL,
  `kode_nilai` varchar(50) NOT NULL,
  `nama_nilai` varchar(50) NOT NULL,
  `harga_nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_nilai`
--

INSERT INTO `t_nilai` (`id`, `kode_nilai`, `nama_nilai`, `harga_nilai`) VALUES
(1, 'EKS', 'Eksekutif', '3000'),
(2, 'REG', 'Reguler', '3000'),
(3, 'KAR', 'Karyawan', '3000'),
(4, 'KREG', 'Khusus Reguler', '60000'),
(5, 'KTA', 'Khusus TA', '80000'),
(6, 'TSK', 'Tasik', '5000'),
(7, 'KEKS', 'Khusus Eksekutif', '100000'),
(8, 'MP', 'Mini Project', '85000');

-- --------------------------------------------------------

--
-- Table structure for table `t_privatekey`
--

CREATE TABLE `t_privatekey` (
  `description` text NOT NULL,
  `privateKey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_privatekey`
--

INSERT INTO `t_privatekey` (`description`, `privateKey`) VALUES
('dont delete this if you want program normal if you want this program please contact author thanks and regards\r\n', 'e1596e365839f2d266006d0b095c29ce');

-- --------------------------------------------------------

--
-- Table structure for table `t_rekap`
--

CREATE TABLE `t_rekap` (
  `id` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `nilai_if` varchar(10) DEFAULT NULL,
  `nilai_si` varchar(10) DEFAULT NULL,
  `jumlah_soal` varchar(10) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_rekap`
--

INSERT INTO `t_rekap` (`id`, `id_matkul`, `id_dosen`, `id_nilai`, `id_tahun`, `id_jadwal`, `hari`, `jam`, `tanggal_ujian`, `nilai_if`, `nilai_si`, `jumlah_soal`, `status`) VALUES
(1, 11, 6, 3, 2, 2, 'senin', '12.00-13.00', '2021-03-01', '1', '1', '1', '1'),
(2, 11, 6, 1, 2, 2, 'senin', '12.00-13.00', '2021-03-01', '2', '2', '3', '1'),
(3, 9, 9, 2, 2, 3, 'senin', '8:55 PM', '2021-04-07', '5', '5', '3', '1'),
(4, 9, 4, 0, 1, 4, 'senin', '10.00-12.00', '2021-04-07', NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `t_rekap_nom`
--

CREATE TABLE `t_rekap_nom` (
  `id` int(11) NOT NULL,
  `id_rekap` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `jumlah_soal` varchar(20) NOT NULL,
  `harga_soal` varchar(20) NOT NULL,
  `jumlah_nilai` varchar(20) NOT NULL,
  `harga_nilai` varchar(20) NOT NULL,
  `jenis_ujian` varchar(5) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `tanggal_pengumpulan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_rekap_nom`
--

INSERT INTO `t_rekap_nom` (`id`, `id_rekap`, `id_nilai`, `id_tahun`, `id_jadwal`, `jumlah_soal`, `harga_soal`, `jumlah_nilai`, `harga_nilai`, `jenis_ujian`, `jumlah`, `tanggal_ujian`, `tanggal_pengumpulan`) VALUES
(1, 1, 3, 2, 2, '1', '10000', '2', '6000', 'UTS', '16000', '2021-04-07', '2021-04-07'),
(2, 2, 1, 2, 2, '3', '30000', '4', '12000', 'UTS', '42000', '2021-03-01', '2021-04-07'),
(3, 3, 2, 2, NULL, '3', '30000', '10', '40000', 'UTS', '70000', '2021-04-07', '2021-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `t_tahun`
--

CREATE TABLE `t_tahun` (
  `id` int(11) NOT NULL,
  `kode_tahun` varchar(50) NOT NULL,
  `nama_tahun` varchar(50) NOT NULL,
  `tahun_akhir` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_tahun`
--

INSERT INTO `t_tahun` (`id`, `kode_tahun`, `nama_tahun`, `tahun_akhir`) VALUES
(1, '20', '2020', 2021),
(2, '21', '2021', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'nana', 'nana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2),
(3, 'muji', 'muji', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_matkul`
--
ALTER TABLE `t_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_rekap`
--
ALTER TABLE `t_rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_rekap_nom`
--
ALTER TABLE `t_rekap_nom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tahun`
--
ALTER TABLE `t_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_dosen`
--
ALTER TABLE `t_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_matkul`
--
ALTER TABLE `t_matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_nilai`
--
ALTER TABLE `t_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_rekap`
--
ALTER TABLE `t_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_rekap_nom`
--
ALTER TABLE `t_rekap_nom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_tahun`
--
ALTER TABLE `t_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
