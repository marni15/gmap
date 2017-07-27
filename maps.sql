-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 08:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(1, 'hakko', 'hakko', 'Hakko Bio Richard', 'gambar_admin/avatar5.png'),
(2, 'Admin', 'admin', 'Hakko Bio Richard', 'gambar_admin/4.jpg'),
(3, 'oke', '098', 'mita', 'gambar_admin/swin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_lbs`
--

CREATE TABLE `data_lbs` (
  `id` int(4) NOT NULL,
  `nomor` int(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `penyulang` varchar(255) NOT NULL,
  `north` varchar(255) NOT NULL,
  `east` varchar(255) NOT NULL,
  `baterai` varchar(255) NOT NULL,
  `ratu_mcb` varchar(255) NOT NULL,
  `jarak_trafo` varchar(255) NOT NULL,
  `supply_rtu` varchar(255) NOT NULL,
  `tinggi_panel` varchar(255) NOT NULL,
  `grounding` varchar(255) NOT NULL,
  `no_kontrak` varchar(255) NOT NULL,
  `kd_rayon` varchar(255) NOT NULL,
  `kode_lbs` varchar(255) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lbs`
--

INSERT INTO `data_lbs` (`id`, `nomor`, `alamat`, `merk`, `model`, `type`, `penyulang`, `north`, `east`, `baterai`, `ratu_mcb`, `jarak_trafo`, `supply_rtu`, `tinggi_panel`, `grounding`, `no_kontrak`, `kd_rayon`, `kode_lbs`, `keterangan`) VALUES
(0, 12, 'jl', '1323', '31r', 'L', 'fses', 'fes', 'fasa', 'L', 'L', 'fwae', 'P', 'fwaea', 'P', 'asfsea', 'L', 'feweq', 'L');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
