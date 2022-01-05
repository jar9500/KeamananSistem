-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 03:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswafasilkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(15) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama_dosen`, `jenis_kelamin`, `status`) VALUES
(1, '55500123', 'Purwantoro, M.Kom.', 'Laki-laki', 'Aktif'),
(2, '55500248', 'Azhari Ali Ridha, S.Kom., MMSI.', 'Laki-laki', 'Aktif'),
(3, '55500345', 'Betha Nurina Sari, M.Kom.', 'Perempuan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `wali_dosen` varchar(255) NOT NULL,
  `foto_mhs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama_mhs`, `prodi`, `wali_dosen`, `foto_mhs`) VALUES
(19022, 'Fricylia Rusdiana Putri', 'Teknik Informatika', 'Azhari Ali Ridha, S.Kom., MMSI.', '385-cil.jpg'),
(19025, 'Jadid Alif Ramadhan', 'Teknik Informatika', 'Azhari Ali Ridha, S.Kom., MMSI.', '664-IMG_9275.JPG'),
(19026, 'Lintar Muhammad Lias', 'Teknik Informatika', 'Purwantoro, M.Kom.', '394-Lintar (2).jpg'),
(19027, 'Lucky Anis Januar Sigit', 'Sistem Informasi', 'Betha Nurina Sari, M.Kom.', '957-IMG_9267.JPG'),
(19028, 'Maya Maesaroh', 'Teknik Informatika', 'Azhari Ali Ridha, S.Kom., MMSI.', '641-20210627_074004-removebg-preview.png'),
(19067, 'Brian Nur Ardiansyah', 'Teknik Informatika', 'Azhari Ali Ridha, S.Kom., MMSI.', '306-brian unsika.jpg'),
(19122, 'Rico Senjaya', 'Sistem Informasi', 'Betha Nurina Sari, M.Kom.', '66-Rico.jpg'),
(19124, 'Rifaldi Febrianto', 'Teknik Informatika', 'Azhari Ali Ridha, S.Kom., MMSI.', '78-Rifaldi.jpg'),
(19126, 'Rizky Bayu Dwiputra', 'Teknik Informatika', 'Azhari Ali Ridha, S.Kom., MMSI.', '359-20210603_144838-removebg-preview-removebg-preview.png'),
(19171, 'Danu Putra Prasetya', 'Sistem Informasi', 'Betha Nurina Sari, M.Kom.', '340-Mawang.jpg'),
(19173, 'Dendi Nugroho', 'Sistem Informasi', 'Betha Nurina Sari, M.Kom.', '313-denden.jpg'),
(19240, 'Waslim', 'Teknik Informatika', 'Purwantoro, M.Kom.', '959-Waslim.png');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL,
  `jenjang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `jenjang`) VALUES
(10001, 'Teknik Informatika', 'S1'),
(10002, 'Sistem Informasi', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `hak_akses` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `hak_akses`, `username`, `password`) VALUES
(1, 'admin', 'admin', '7dd66913004434da295aefa937f55c8e'),
(2, 'user', 'mahasiswa', '5787be38ee03a9ae5360f54d9026465f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
