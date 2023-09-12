-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2023 at 01:21 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
CREATE TABLE IF NOT EXISTS `cuti` (
  `id_cuti` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `id_status_cuti` int NOT NULL,
  `perihal_cuti` varchar(100) NOT NULL,
  `alasan_verifikasi` text,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_user`, `alasan`, `tgl_diajukan`, `mulai`, `berakhir`, `id_status_cuti`, `perihal_cuti`, `alasan_verifikasi`) VALUES
('cuti-060ae', 'c551fc8847d29dc25a23db5d2cdb941b', 'Cuti Sakit SAkit', '2022-08-06', '2022-08-04', '2022-08-17', 2, 'Cuti Sakit', 'YEs'),
('cuti-714f0', '592d06bdc0ee778dab4e01d55ba8b14c', 'Karena ibu saya sakit', '2022-06-15', '2022-06-12', '2022-06-30', 1, 'Cuti Libur', NULL),
('cuti-99215', 'ebeeaf891bcf293ec607f50475648ddc', 'menemani ibu saya yang sakit, sekarang beliau masih berada dirumah sakit dan butuh saya temani selama seminggu.', '2022-06-06', '2022-06-06', '2022-06-15', 2, 'berobat', NULL),
('cuti-ede81', 'dce802a5e29e9ccabc144dfb6a37abbb', 'Liburan ke lampung', '2022-06-21', '2022-06-21', '2022-06-21', 2, 'Cuti Libur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

DROP TABLE IF EXISTS `jenis_kelamin`;
CREATE TABLE IF NOT EXISTS `jenis_kelamin` (
  `id_jenis_kelamin` int NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `status_cuti`
--

DROP TABLE IF EXISTS `status_cuti`;
CREATE TABLE IF NOT EXISTS `status_cuti` (
  `id_status_cuti` int NOT NULL AUTO_INCREMENT,
  `status_cuti` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status_cuti`
--

INSERT INTO `status_cuti` (`id_status_cuti`, `status_cuti`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Izin Cuti Diterima'),
(3, 'Izin Cuti Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user_level` int NOT NULL,
  `id_user_detail` varchar(256) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('134e349e4f50a051d8ca3687d6a7de1a', 'admin', 'admin', 'admin_utama@gmail.com', 2, '134e349e4f50a051d8ca3687d6a7de1a'),
('98eb4077470a60a0fe0f7b9d01755557', 'user', 'user', 'user@gmail.com', 1, '98eb4077470a60a0fe0f7b9d01755557'),
('f5972fbf4ef53843c1e12c3ae99e5005', 'superadmin', 'superadmin', 'superadmin@gmail.com', 3, 'f5972fbf4ef53843c1e12c3ae99e5005');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `alamat` text,
  `nip` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `alamat`, `nip`, `pangkat`, `jabatan`) VALUES
('134e349e4f50a051d8ca3687d6a7de1a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('98eb4077470a60a0fe0f7b9d01755557', 'Tri Hartono', 1, '0895331309434', 'Jln. Kata siapa Saja Bener', '99.111.004', 'Karyawan Tetap', 'Head of IT - Support'),
('f5972fbf4ef53843c1e12c3ae99e5005', NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
CREATE TABLE IF NOT EXISTS `user_level` (
  `id_user_level` int NOT NULL AUTO_INCREMENT,
  `user_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'pegawai'),
(2, 'admin'),
(3, 'super admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
