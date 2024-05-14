-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 04:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaloriku`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `nama_aktivitas` varchar(20) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `kalori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`nama_aktivitas`, `durasi`, `kalori`) VALUES
('Berenang', '10 menit', '110 kkal'),
('Bersepeda', '10 menit', '120 kkal'),
('Jalan Kaki', '30 menit', '97 kkal'),
('Jogging', '30 menit', '190 kkal'),
('Membaca buku', '30 menit', '34-47 kkal'),
('Tidur', '6-8 jam', '50-100 kkal');

-- --------------------------------------------------------

--
-- Table structure for table `log_hitung`
--

CREATE TABLE `log_hitung` (
  `id_log` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `hasil` float NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tinggi_badan` int(5) NOT NULL,
  `berat_badan` int(5) NOT NULL,
  `usia` int(5) NOT NULL,
  `level_aktivitas` set('1.2','1.375','1.55','1.725','1.9') NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_hitung`
--

INSERT INTO `log_hitung` (`id_log`, `id_user`, `hasil`, `jk`, `tinggi_badan`, `berat_badan`, `usia`, `level_aktivitas`, `nama`) VALUES
('2023-11-29 15:39:00', 333, 1575, 'Perempuan', 153, 44, 18, '1.375', 'lena'),
('2023-11-29 15:41:00', 333, 1362, 'Perempuan', 153, 44, 20, '1.2', 'Lena');

-- --------------------------------------------------------

--
-- Table structure for table `saran_menu`
--

CREATE TABLE `saran_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(300) NOT NULL,
  `porsi` varchar(30) NOT NULL,
  `jenjang_kalori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran_menu`
--

INSERT INTO `saran_menu` (`id_menu`, `menu`, `porsi`, `jenjang_kalori`) VALUES
(101, 'Nasi Goreng', '198 gram', '329 kkal'),
(102, 'Ayam Geprek', '185 gram', '263 kkal'),
(103, 'Bubur Ayam', '240 gram', '372 kkal'),
(104, 'Mie Ayam', '240 gram', '421 kkal'),
(105, 'Kopi Susu', '190 ml', '90 kkal'),
(106, 'Es Teh', '190 ml', '112 kkal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `namauser`, `password`) VALUES
(333, 'bismillah@gmail.com', 'Lena', '51e28f15de28d9a4ee6b27d9100c35ca'),
(555, 'kinntin@gmail.com', 'Kintan', 'afd2fcabb098e13e1c23b9e40cbf36c1');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `before_user_delete` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
    DELETE FROM log_hitung WHERE id_user = OLD.id_user;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`nama_aktivitas`);

--
-- Indexes for table `log_hitung`
--
ALTER TABLE `log_hitung`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_loghitung1` (`id_user`);

--
-- Indexes for table `saran_menu`
--
ALTER TABLE `saran_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_hitung`
--
ALTER TABLE `log_hitung`
  ADD CONSTRAINT `fk_loghitung1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
