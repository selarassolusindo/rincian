-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2021 at 01:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rincian`
--

-- --------------------------------------------------------

--
-- Table structure for table `t00_sekolah`
--

CREATE TABLE `t00_sekolah` (
  `idsekolah` int(11) NOT NULL,
  `kode` varchar(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(25) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t00_sekolah`
--

INSERT INTO `t00_sekolah` (`idsekolah`, `kode`, `nama`, `alamat`, `nomor_telepon`, `logo`) VALUES
(1, '01', 'MINU UNGGULAN BOJONEGORO', 'JL. JAMBEAN BOJONEGORO', '', ''),
(2, '02', 'MINU KARAKTER BOJONEGORO', 'JL. JAMBEAN BOJONEGORO', '', ''),
(3, '03', 'MI ICP NURUL ULUM BOJONEGORO', 'JL. JAMBEAN BOJONEGORO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t01_tahunajaran`
--

CREATE TABLE `t01_tahunajaran` (
  `idtahunajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t01_tahunajaran`
--

INSERT INTO `t01_tahunajaran` (`idtahunajaran`, `tahun_ajaran`) VALUES
(1, '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `t02_kelas`
--

CREATE TABLE `t02_kelas` (
  `idkelas` int(11) NOT NULL,
  `sekolah` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `sub_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_kelas`
--

INSERT INTO `t02_kelas` (`idkelas`, `sekolah`, `kelas`, `sub_kelas`) VALUES
(1, 3, '1', 'SHAFA'),
(2, 3, '1', 'MARWA'),
(3, 3, '1', 'MASJIDIL HARAM'),
(4, 3, '2', 'ISRO\''),
(5, 3, '2', 'MI\'ROJ'),
(6, 3, '2', 'TAHFIDZ'),
(7, 3, '3', 'Ka\'bah'),
(8, 3, '3', 'Hajar Aswad');

-- --------------------------------------------------------

--
-- Table structure for table `t03_tagihan`
--

CREATE TABLE `t03_tagihan` (
  `idtagihan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t03_tagihan`
--

INSERT INTO `t03_tagihan` (`idtagihan`, `nama`) VALUES
(1, 'SYARIAH'),
(2, 'CATERING'),
(3, 'WORKSHEET');

-- --------------------------------------------------------

--
-- Table structure for table `t04_rincian`
--

CREATE TABLE `t04_rincian` (
  `idrincian` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `sekolah` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t05_rinciandetail`
--

CREATE TABLE `t05_rinciandetail` (
  `idrinciandetail` int(11) NOT NULL,
  `rincian` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t30_transaksi`
--

CREATE TABLE `t30_transaksi` (
  `idtr` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_jt` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_reg` varchar(10) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `sub_kelas` varchar(255) NOT NULL,
  `jns_tgh` varchar(255) NOT NULL,
  `jumlah` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_transaksi`
--

INSERT INTO `t30_transaksi` (`idtr`, `no_urut`, `tgl_buat`, `tgl_jt`, `nama`, `no_reg`, `kelas`, `sub_kelas`, `jns_tgh`, `jumlah`, `status`, `sekolah`, `tahun_ajaran`) VALUES
(1, 1, '2021-07-09', '2021-07-31', 'Abdullah Basit Al Hamiz Zada', '002972', '1', 'MASJIDIL HARAM', 'SPP [Jul]', 10, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(2, 3, '2021-07-09', '2021-07-31', 'Adam syah wahyu maulana', '002862', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(3, 4, '2021-07-09', '2021-07-31', 'Akhdan Hilmi Almirza', '002863', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(4, 5, '2021-07-09', '2021-07-31', 'Annastasya Dia Putri Agung', '002864', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(5, 6, '2021-07-09', '2021-07-31', 'AUFARO ZAFRANEZA RIZKY', '002865', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(6, 7, '2021-07-15', '2021-07-31', 'AUFARO ZAFRANEZA RIZKY', '002865', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(7, 8, '2021-07-09', '2021-07-31', 'AZKA PRIYA RAISHATAMA', '002866', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(8, 9, '2021-07-09', '2021-07-31', 'Deandra Felicia Tajusa', '002867', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(9, 10, '2021-07-09', '2021-07-31', 'Dwi adinda azza Allah hana', '002869', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(10, 11, '2021-07-09', '2021-07-31', 'Elvaro Rakha Purwanto', '002870', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(11, 12, '2021-07-09', '2021-07-31', 'Hadziq Danial Fayyadl', '002871', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(12, 13, '2021-07-09', '2021-07-31', 'IFTAH AULIA ELFARAH', '002872', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(13, 14, '2021-07-09', '2021-07-31', 'JIHAN TALITA SEPTYASA', '002873', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(14, 15, '2021-07-09', '2021-07-31', 'KALEA MAZAYA ADAWIYAH', '002874', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(15, 16, '2021-07-09', '2021-07-31', 'Muhammad afiq rahim savafu', '002875', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(16, 17, '2021-07-09', '2021-07-31', 'Muhammad Azka Syazani Thamrin', '002877', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(17, 18, '2021-07-09', '2021-07-31', 'MUHAMMAD SYAFIIQ HABIBULLOH', '002878', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(18, 19, '2021-07-09', '2021-07-31', 'Raffandra Gusty Wicaksono', '002879', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(19, 20, '2021-07-09', '2021-07-31', 'RAMANIYA SALMAPUTRI SUHAILI', '002880', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(20, 21, '2021-07-09', '2021-07-31', 'Rizki Avian Maulana', '002881', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(21, 22, '2021-07-09', '2021-07-31', 'Sam Ibrahim El-Mirza', '002882', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(22, 23, '2021-07-09', '2021-07-31', 'SHEVA AHMAD IVANOVIC', '002883', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(23, 24, '2021-07-09', '2021-07-31', 'TABINA MARITZA ZAHIRAH AZIGHAH', '002884', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(24, 25, '2021-07-09', '2021-07-31', 'DHAFINDRA ATHALA OKTAVIASYAH\n\n', '002868', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(25, 26, '2021-07-09', '2021-07-31', 'Muhammad Aufar Rafka Alkhalifi', '002876', '2', 'ISRO\'', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(26, 27, '2021-07-09', '2021-07-31', 'A. Kaafin Mangkuridlo Wicaksono1', '002885', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(27, 28, '2021-07-09', '2021-07-31', 'ADINDA BELLVANIA SANJAYA', '002886', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(28, 29, '2021-07-09', '2021-07-31', 'Ahmad Nazirul Asrofi', '002887', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(29, 30, '2021-07-09', '2021-07-31', 'Airlangga irfan fawwaz', '002888', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(30, 31, '2021-07-09', '2021-07-31', 'AISYA DARA FARADISA', '002889', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(31, 32, '2021-07-09', '2021-07-31', 'Al fatih abimanyu sakti susetyo', '002891', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(32, 33, '2021-07-09', '2021-07-31', 'ANANDAKA MAULADDIANSYACH ROSIT', '002892', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(33, 34, '2021-07-09', '2021-07-31', 'ATHARIZ PARAMARTADHYASTA HARIYANTI', '002893', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(34, 35, '2021-07-09', '2021-07-31', 'Bahruddin Al Ghozali', '002894', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(35, 36, '2021-07-09', '2021-07-31', 'Dherra khaiyilla arlovayza', '002895', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(36, 37, '2021-07-09', '2021-07-31', 'FARIN AULIA ELFARAH', '002896', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(37, 38, '2021-07-09', '2021-07-31', 'Favian Hafidhiyansha Prabowo', '002897', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(38, 39, '2021-07-09', '2021-07-31', 'Haris Arthur Saputra', '002898', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(39, 40, '2021-07-09', '2021-07-31', 'Ibrahim Erlangga Sudarsono', '002899', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(40, 41, '2021-07-09', '2021-07-31', 'KHARISA ALIFAH SUGIONO', '002901', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(41, 42, '2021-07-09', '2021-07-31', 'Mezzaziazan haruni nirwasita', '002902', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(42, 43, '2021-07-09', '2021-07-31', 'MUHAMMAD DANISH YUSUF', '002903', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(43, 44, '2021-07-09', '2021-07-31', 'Muhamad Desta Bafeli Syahputra', '002904', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(44, 45, '2021-07-09', '2021-07-31', 'NUR SOFIYAN AL MAHDI', '002905', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(45, 46, '2021-07-09', '2021-07-31', 'Prisadeyla khaira lubna', '002906', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(46, 47, '2021-07-09', '2021-07-31', 'Sakha syailendra abimana', '002907', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(47, 48, '2021-07-09', '2021-07-31', 'NABILA ABIDAH ZAHRA', '002931', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(48, 49, '2021-07-09', '2021-07-31', 'AKMAL SHOLEHUDDIN PRABASWORO WAKARRUSNI', '002890', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(49, 50, '2021-07-09', '2021-07-31', 'Khansa Wulan rabbani', '002900', '2', 'MI\'ROJ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(50, 51, '2021-07-09', '2021-07-31', 'Aliya Ameeray Utomo', '002908', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(51, 52, '2021-07-09', '2021-07-31', 'Amira Adila Falasifa', '002909', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(52, 53, '2021-07-09', '2021-07-31', 'ANANTAVIRYA MUHAMMAD AL BAZIL', '002910', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(53, 54, '2021-07-09', '2021-07-31', 'Arthur azka soebiyanto', '002911', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(54, 55, '2021-07-09', '2021-07-31', 'Bianca Almaqhvira Deana', '002912', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(55, 56, '2021-07-09', '2021-07-31', 'DAARIZ MUHAMMAD RAFIF', '002913', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(56, 57, '2021-07-09', '2021-07-31', 'DIMAS DWI SETYAWAN', '002914', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(57, 58, '2021-07-09', '2021-07-31', 'Fidelya Khanza Azzivana', '002916', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(58, 59, '2021-07-09', '2021-07-31', 'HUSNA RAMADHANI PUTRI', '002917', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(59, 60, '2021-07-09', '2021-07-31', 'Muhammad altair zhafir al ghifary', '002919', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(60, 61, '2021-07-09', '2021-07-31', 'MUHAMMAD BAGAS AKHTARSYAH', '002920', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(61, 62, '2021-07-09', '2021-07-31', 'MUHAMMAD NAJIH AUFARRIZQO AL MUIZZU', '002921', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(62, 63, '2021-07-09', '2021-07-31', 'MUHAMMAD WILDAN AFRIZAL', '002922', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(63, 64, '2021-07-09', '2021-07-31', 'PARISYA WASI NADHIFA', '002923', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(64, 65, '2021-07-09', '2021-07-31', 'RAMDAN HAFIZ SETIYAWAN', '002924', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(65, 66, '2021-07-09', '2021-07-31', 'TSANIA FARRADHIBA ANSHORY', '002925', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(66, 67, '2021-07-09', '2021-07-31', 'Zahra khoirunisa fathiyyatu rahma', '002926', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(67, 68, '2021-07-09', '2021-07-31', 'Zakia Izzatunnisa', '002927', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(68, 69, '2021-07-09', '2021-07-31', 'Zhafira Nur Azizah', '002928', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(69, 70, '2021-07-09', '2021-07-31', 'Zizi Hayfa Mughni Nayyara', '002929', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(70, 71, '2021-07-09', '2021-07-31', 'Manggala Mu\'adz Zain', '002918', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(71, 72, '2021-07-09', '2021-07-31', 'Anisa Salma Rosyida', '002811', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(72, 73, '2021-07-09', '2021-07-31', 'AZARINE TSANIA NAURAH DINUATHA', '002813', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(73, 74, '2021-07-09', '2021-07-31', 'AZKA MAULIDINA FARRAS', '002814', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(74, 75, '2021-07-09', '2021-07-31', 'Bilfaqih Rey alteza', '002815', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(75, 76, '2021-07-09', '2021-07-31', 'Candra Dewi Rendrasta', '002816', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(76, 77, '2021-07-09', '2021-07-31', 'Danendra Kenzo Alvaro', '002817', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(77, 78, '2021-07-09', '2021-07-31', 'FARHAN ABQARI ARSYAD', '002818', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(78, 79, '2021-07-09', '2021-07-31', 'Izza lailatul ramadhani firdaus', '002819', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(79, 80, '2021-07-09', '2021-07-31', 'Janeeta Hasna Atha Mohammad', '002820', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(80, 81, '2021-07-09', '2021-07-31', 'Mochamad Rafie Al Wida Dutra', '002823', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(81, 82, '2021-07-09', '2021-07-31', 'MUHAMMAD ISYA\' HAKEIZHA', '002824', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(82, 83, '2021-07-09', '2021-07-31', 'NIZAM HAKIM', '002826', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(83, 84, '2021-07-09', '2021-07-31', 'Olivinno Geonesha Atmajana', '002827', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(84, 85, '2021-07-09', '2021-07-31', 'pranaja mahfud junio alvaro', '002828', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(85, 86, '2021-07-09', '2021-07-31', 'Raihana Bulghaturrizqi Irtiya', '002829', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(86, 87, '2021-07-09', '2021-07-31', '\nRAISSA CANTIKA AZ-ZAHRA', '002830', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(87, 88, '2021-07-09', '2021-07-31', 'RAVASYA ADHIATMA', '002831', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(88, 89, '2021-07-09', '2021-07-31', 'ARHAM PUTRA NUR BAASITH\n', '002812', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(89, 90, '2021-07-09', '2021-07-31', 'Kayla azura saluzya', '002821', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(90, 91, '2021-07-09', '2021-07-31', 'Abdullah As\'ad Muwaffaq', '002833', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(91, 92, '2021-07-09', '2021-07-31', 'AHMAD NAFI DARUT TAUHID AZ-ZAM ZAMI', '002834', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(92, 93, '2021-07-09', '2021-07-31', 'Aldy Dwi Nooryanto', '002836', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(93, 94, '2021-07-09', '2021-07-31', 'AUFAA AZIELDA VABRAZIA', '002839', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(94, 95, '2021-07-09', '2021-07-31', 'AYUDYA RAHMIRAYYA', '002840', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(95, 96, '2021-07-09', '2021-07-31', 'Bima Achmad Fawwaz ', '002841', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(96, 97, '2021-07-09', '2021-07-31', 'CALYA INDRESWARI WIDIANTO', '002842', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(97, 98, '2021-07-09', '2021-07-31', 'hasqil eka pradipta', '002844', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(98, 99, '2021-07-09', '2021-07-31', 'KENZIE FARRASYA RACHMAT', '002845', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(99, 100, '2021-07-09', '2021-07-31', 'Muhammad Raziq Hanan', '002848', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(100, 101, '2021-07-09', '2021-07-31', 'Nabila Najwa \'Aliya', '002849', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(101, 102, '2021-07-09', '2021-07-31', 'NADHIF SEVENTIAWAN', '002850', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(102, 103, '2021-07-09', '2021-07-31', 'NEVARA AZZAHRIA MUHLINA', '002851', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(103, 104, '2021-07-09', '2021-07-31', 'Sofia Ariendra Putri', '002852', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(104, 105, '2021-07-09', '2021-07-31', 'VINO MAULIT HENRATA', '002853', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(105, 106, '2021-07-09', '2021-07-31', 'WAFIDA FARHATUL KHOLIDIYYAH', '002854', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(106, 107, '2021-07-09', '2021-07-31', 'Zara trisya achmad', '002855', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(107, 108, '2021-07-09', '2021-07-31', 'NAYYARA NAFEEZA ATHALLA', '002857', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(108, 109, '2021-07-09', '2021-07-31', 'Aliya elfarida anwar', '002837', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(109, 110, '2021-07-09', '2021-07-31', 'LUTHFI NUR FALIH', '002846', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(110, 111, '2021-07-09', '2021-07-31', 'Muhammad Jeffry Athallah Baihaqi', '002847', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(111, 112, '2021-07-09', '2021-07-31', 'AISYAH YASMIN HAMIDAH', '002835', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(112, 113, '2021-07-09', '2021-07-31', 'Ahmad Maulana Adiatma', '002758', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(113, 114, '2021-07-09', '2021-07-31', 'Aisha Nareswari Alini Putri', '002759', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(114, 115, '2021-07-09', '2021-07-31', 'AYYATUL HUSNIA', '002760', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(115, 116, '2021-07-09', '2021-07-31', 'Danella Prawita Putri', '002761', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(116, 117, '2021-07-09', '2021-07-31', 'FAIQ FIRZANA ASYSYAFI', '002762', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(117, 118, '2021-07-09', '2021-07-31', 'Fiorenza avril almaghvira', '002764', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(118, 119, '2021-07-09', '2021-07-31', 'Hilma Ziyadatu Rahma Karien', '002766', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(119, 120, '2021-07-09', '2021-07-31', 'Muhammad Attarrayhan Adji Alhafidz', '002767', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(120, 121, '2021-07-09', '2021-07-31', 'MUHAMMAD RADITYA EKA PUTRA', '002769', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(121, 122, '2021-07-09', '2021-07-31', 'MUHAMMAD ZAIN AL GHIFFARI', '002772', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(122, 123, '2021-07-09', '2021-07-31', 'Najwa nauval syaputra', '002773', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(123, 124, '2021-07-09', '2021-07-31', 'Rajendra Davintarma asrama dhani', '002775', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(124, 125, '2021-07-09', '2021-07-31', 'SAFIRA RAHMA FIRRIDHANI', '002776', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(125, 126, '2021-07-09', '2021-07-31', 'SYIFA SUAQIYA ARLOVA', '002777', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(126, 127, '2021-07-09', '2021-07-31', 'THALITA RAHMA PUTRI RIHANA', '002778', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(127, 128, '2021-07-09', '2021-07-31', 'VANIA AKILA RAFA ANINDITA', '002779', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(128, 129, '2021-07-09', '2021-07-31', 'Zaki Adnan Suherman', '002780', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(129, 130, '2021-07-09', '2021-07-31', 'ZLATAN APRILLIO ANDRIAN', '002781', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(130, 131, '2021-07-09', '2021-07-31', 'IBRAHIM KURNIAWAN', '002861', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(131, 132, '2021-07-09', '2021-07-31', 'MUHAMMAD RIFKY ABDULLAH', '002771', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(132, 133, '2021-07-09', '2021-07-31', 'MUHAMMAD RAKHA AL RASYID VIDIANSYAH', '002770', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(133, 134, '2021-07-09', '2021-07-31', 'Ahmad Azzam Akbar Al Gholibi', '002782', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(134, 135, '2021-07-09', '2021-07-31', 'ALDiAN FIRMANSYAH', '002783', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(135, 136, '2021-07-09', '2021-07-31', 'ALIFIA ILMI LIERNADI PUTRI', '002784', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(136, 137, '2021-07-09', '2021-07-31', 'AURELIA ZIVANA FEBRINA PUTRI', '002785', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(137, 138, '2021-07-09', '2021-07-31', 'DENDRA DIRGANTARA NUGRAHA', '002786', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(138, 139, '2021-07-09', '2021-07-31', 'DHELLIZIA DEVINA LYSANDRA', '002787', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(139, 140, '2021-07-09', '2021-07-31', 'Fathi Balyandra Muhammad', '002788', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(140, 141, '2021-07-09', '2021-07-31', 'FAUZUL WILLIAM ALFAREZKI', '002789', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(141, 142, '2021-07-09', '2021-07-31', 'FIONA ELMA SHINTA', '002790', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(142, 143, '2021-07-09', '2021-07-31', 'Garry Maulana Hidayat', '002791', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(143, 144, '2021-07-09', '2021-07-31', 'M. Fiza Ikramullah', '002793', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(144, 145, '2021-07-09', '2021-07-31', 'Maulida Febby Rahma Inayanti', '002794', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(145, 146, '2021-07-09', '2021-07-31', 'Moch. Putra Dwi Ramadan', '002795', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(146, 147, '2021-07-09', '2021-07-31', 'Muhammad Nayif Khalwani', '002796', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(147, 148, '2021-07-09', '2021-07-31', 'MUHAMMAD ALVINO NURDIANSYAH', '002797', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(148, 149, '2021-07-09', '2021-07-31', 'Muhammad Azzam Habiburrahman', '002798', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(149, 150, '2021-07-09', '2021-07-31', 'Muhammad Rikza Naufal', '002799', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(150, 151, '2021-07-09', '2021-07-31', 'Naghita queentiyan maulida', '002801', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(151, 152, '2021-07-09', '2021-07-31', 'Satria Ramadhan', '002802', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(152, 153, '2021-07-09', '2021-07-31', 'Syifa Allif Maulida Munir', '002803', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(153, 154, '2021-07-09', '2021-07-31', 'ZAHIRA SHILVANYA PUTRI', '002804', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(154, 155, '2021-07-09', '2021-07-31', 'Zhafran Safee Setiawan', '002805', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(155, 156, '2021-07-09', '2021-07-31', 'Daffa Aliqa Adhystha', '002860', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(156, 157, '2021-07-09', '2021-07-31', 'Ainiya Cantika Faida Azmi', '002731', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(157, 158, '2021-07-09', '2021-07-31', 'Anissa maulidya putri ', '002733', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(158, 159, '2021-07-09', '2021-07-31', 'CALLISTA EMILIA RABBANI', '002735', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(159, 160, '2021-07-09', '2021-07-31', 'GALANG NARENDRA PERWIRA WARDHANA', '002736', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(160, 161, '2021-07-09', '2021-07-31', 'GUYNESS YASMARA AYOGHI', '002737', '5', 'MINA', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(161, 162, '2021-07-09', '2021-07-31', 'Ibtihal Javas Renata Putra', '002738', '5', 'MINA', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(162, 163, '2021-07-09', '2021-07-31', 'IRFA ROBBY DZURRY', '002739', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(163, 164, '2021-07-09', '2021-07-31', 'Kheisya syifa nathania', '002741', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(164, 165, '2021-07-09', '2021-07-31', 'MUHAMMAD FATIH IZZUDDIN SHIDQI', '002743', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(165, 166, '2021-07-09', '2021-07-31', 'MUHAMMAD NAJMUL FATA', '002744', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(166, 167, '2021-07-09', '2021-07-31', 'MUHAMMAD RASTRA SATRIA WIBOWO', '002746', '5', 'MINA', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(167, 168, '2021-07-09', '2021-07-31', 'Naufal arsya kamil harahap', '002747', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(168, 169, '2021-07-09', '2021-07-31', 'QORIB FIRMANSYAH', '002749', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(169, 170, '2021-07-09', '2021-07-31', 'SAFINATUN NAJA MAHMUD', '002752', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(170, 171, '2021-07-09', '2021-07-31', 'TITIAN LINTANG AULIA SYIFA', '002753', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(171, 172, '2021-07-09', '2021-07-31', 'ALMEIRA NOVISYA PUTRI', '002807', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(172, 173, '2021-07-09', '2021-07-31', 'Linggabima azzam gaisan', '002808', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(173, 174, '2021-07-09', '2021-07-31', 'PANCA PRADIPA WYASA UNTARA', '002748', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(174, 175, '2021-07-09', '2021-07-31', 'Rizqullah Hylmi Batubara', '002751', '5', 'MINA', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(175, 176, '2021-07-09', '2021-07-31', 'Muhammad Nazih Murtadlo Sholahuddin', '002745', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(176, 177, '2021-07-09', '2021-07-31', 'Rahma Tsurayya Izzaty', '002750', '5', 'MINA', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(177, 178, '2021-07-09', '2021-07-31', 'ALFA SOLLA AN-NAFI\"', '002709', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(178, 179, '2021-07-09', '2021-07-31', 'ALTHAFUNNISA ZAAHIRA SALSABILA NURAINI', '002710', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(179, 180, '2021-07-09', '2021-07-31', 'ARYA DEVANO NAYOTTAMA', '002713', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(180, 181, '2021-07-09', '2021-07-31', 'Azzahra Belva Chrisandy', '002715', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(181, 182, '2021-07-09', '2021-07-31', 'Dinda naura aqnavis safina', '002716', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(182, 183, '2021-07-09', '2021-07-31', 'Elisa Fatimatus Zahra', '002717', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(183, 184, '2021-07-09', '2021-07-31', 'FITRI AULIA WAHYU NINGTYAS', '002718', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(184, 185, '2021-07-09', '2021-07-31', 'Ghifari Ramadhan Alamsyah', '002719', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(185, 186, '2021-07-09', '2021-07-31', 'HAFIDZ RAFIE RABBANI', '002720', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(186, 187, '2021-07-09', '2021-07-31', 'MUHAMAD FAUZAN LATIFA ERSA', '002722', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(187, 188, '2021-07-09', '2021-07-31', 'MUHAMMAD FURQON AZKAL WAFA', '002723', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(188, 189, '2021-07-09', '2021-07-31', 'MUHAMMAD IRSYAD CHOIR', '002724', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(189, 190, '2021-07-09', '2021-07-31', 'Nur Azizah Firmaningtyas', '002725', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(190, 191, '2021-07-09', '2021-07-31', 'RAINAR AIDIN PASHA ', '002726', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(191, 192, '2021-07-09', '2021-07-31', 'SABRINA TSANIA MUMTAZ', '002727', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(192, 193, '2021-07-09', '2021-07-31', 'SYAFIRA AZALIA SAFITRI ', '002728', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(193, 194, '2021-07-09', '2021-07-31', 'YORIZKA SALSABILLA NAHARIYA', '002729', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(194, 195, '2021-07-09', '2021-07-31', 'ARIF TIRTA BAYU DIWANGKARA', '002712', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(195, 196, '2021-07-09', '2021-07-31', 'KENZIE ARVINO ANDANA', '002721', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(196, 197, '2021-07-09', '2021-07-31', 'KHAILA RAFIFAH SUGIONO', '002740', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(197, 198, '2021-07-09', '2021-07-31', 'Muhammad Ashif Al Barkhiya', '002742', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(198, 199, '2021-07-09', '2021-07-31', 'Ahmad Sirojuddin Naufal', '002859', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(199, 200, '2021-07-09', '2021-07-31', 'Keysha ayu ramadhani', '002792', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(200, 201, '2021-07-09', '2021-07-31', 'Muna Ishmatul Wafda', '002800', '4', 'MADINAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(201, 202, '2021-07-09', '2021-07-31', 'AHMAD IRSYAD WAFA HASFANUDIN GHOZALI', '002809', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(202, 203, '2021-07-09', '2021-07-31', 'NARUNA KENZIE YUDA NARRAYA', '002825', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(203, 204, '2021-07-09', '2021-07-31', 'Virzana Aisha Hafidzah', '002832', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(204, 205, '2021-07-09', '2021-07-31', 'FARIS NABIL MUTTAQIN', '002843', '3', 'Hajar Aswad', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(205, 206, '2021-07-09', '2021-07-31', 'Abimanyu Muqoddas Al-Asy\'ari', '002706', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(206, 207, '2021-07-09', '2021-07-31', 'AHMAD FAHMI HAIKAL', '002708', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(207, 208, '2021-07-09', '2021-07-31', 'AQILA QUEENA BATRISYA', '002711', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(208, 209, '2021-07-09', '2021-07-31', 'AZKA AGHNIYA MAULANA', '002714', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(209, 210, '2021-07-09', '2021-07-31', 'MUNAYA LUBNA KAMILA', '002856', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(210, 211, '2021-07-09', '2021-07-31', 'PUTRI QURROTA A\'YUN ', '002858', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(211, 212, '2021-07-09', '2021-07-31', 'Abdillah Ferhan Ariyanto', '002930', '5', 'MUZDALIFAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(212, 213, '2021-07-09', '2021-07-31', 'Aufklara Haura Insiyyah', '002654', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(213, 214, '2021-07-09', '2021-07-31', 'AULIA CAHYA KUSUMA WARDHANI', '002655', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(214, 215, '2021-07-09', '2021-07-31', 'DZAKA SYAUQIN NAF\'A', '002656', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(215, 216, '2021-07-09', '2021-07-31', 'Evan Praditya Farzana Daniswara', '002657', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(216, 217, '2021-07-09', '2021-07-31', 'Fanny anindita puteri', '002658', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(217, 218, '2021-07-09', '2021-07-31', 'FIKA MILWA AQLIYAH', '002659', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(218, 219, '2021-07-09', '2021-07-31', 'GHAIZAN ACHMAD ZAHIRUDDIN ', '002660', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(219, 220, '2021-07-09', '2021-07-31', 'Hanung Bramastyo Wibowo', '002661', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(220, 221, '2021-07-09', '2021-07-31', 'Kalyana Tiara Dewi', '002663', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(221, 222, '2021-07-09', '2021-07-31', 'LABIB HUSEIN AHMAD', '002664', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(222, 223, '2021-07-09', '2021-07-31', 'M. AZRUL IRSYAD MAULA', '002665', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(223, 224, '2021-07-09', '2021-07-31', 'MOHAMMAD ABDHE NEGARA MAULIDIAN', '002666', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(224, 225, '2021-07-09', '2021-07-31', 'Muhammad Azzam Rafadinka Nashira', '002667', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(225, 226, '2021-07-09', '2021-07-31', 'MUHAMMAD FAHRUR ROZI', '002668', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(226, 227, '2021-07-09', '2021-07-31', 'MUHAMMAD RAHAL ELVINOFATIH ERMAWAN', '002669', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(227, 228, '2021-07-09', '2021-07-31', 'Najwa Belvana Hafis', '002670', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(228, 229, '2021-07-09', '2021-07-31', 'Rafa Dzaky Fairuza', '002671', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(229, 230, '2021-07-09', '2021-07-31', 'Salma Aulia rahman', '002673', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(230, 231, '2021-07-09', '2021-07-31', 'Sinar Ratu Kirana Putri Tamtomo Resta', '002674', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(231, 232, '2021-07-09', '2021-07-31', 'SYAHIDA AULIA RAHMA ZAKARIA', '002675', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(232, 233, '2021-07-09', '2021-07-31', 'VELINSYA SHAFA AL ZAHRA', '002676', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(233, 234, '2021-07-09', '2021-07-31', 'Wilda Ariesta Fadlilatunnisa\'', '002677', '6', 'JABAL RAHMAH', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(234, 235, '2021-07-09', '2021-07-31', 'FATHIYA NURIN NAFISAH', '002915', '2', 'TAHFIDZ', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(235, 236, '2021-07-09', '2021-07-31', 'CHIEFTA RAFIDA PUTRI FADLY', '002680', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(236, 237, '2021-07-09', '2021-07-31', 'Farhan Aulia Arrosyiid', '002682', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(237, 238, '2021-07-09', '2021-07-31', 'REGINA NADHIFA PUTRI YUDHA', '002694', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(238, 239, '2021-07-09', '2021-07-31', 'Faza agnia rosyada', '002763', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(239, 240, '2021-07-09', '2021-07-31', 'Haidar Abe El-Anshar', '002765', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(240, 241, '2021-07-09', '2021-07-31', 'Muhammad Fadly Akbar', '002768', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(241, 242, '2021-07-09', '2021-07-31', 'NAURA QAIREEN PRAMESWARI', '002774', '4', 'MEKAH', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(242, 243, '2021-07-09', '2021-07-31', 'ALFINA RAMADHANIA AGUSTIN', '002810', '3', 'Ka\'bah', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(243, 244, '2021-07-15', '2021-07-31', 'Ahmad Rafa Fauzan Abiyu', '002730', '5', 'MINA', 'SPP [Jul]', 500000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(244, 245, '2021-07-09', '2021-07-31', 'ACHMAD NOUVAL FADHLAN', '002678', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(245, 246, '2021-07-09', '2021-07-31', 'AHMAD HUSNU ZIYAD', '002679', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(246, 247, '2021-07-09', '2021-07-31', 'Chumaira Fatimah Azzahra', '002681', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(247, 248, '2021-07-09', '2021-07-31', 'JASMINE MARDHATILLAH MAYLAFFAYZA', '002683', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(248, 249, '2021-07-09', '2021-07-31', 'RAINA OKTI FEDORA', '002692', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(249, 250, '2021-07-09', '2021-07-31', 'Valencia sasta deby angelica', '002698', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(250, 251, '2021-07-09', '2021-07-31', 'YUNANTA PUTRA ANDHIKA', '002700', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(251, 252, '2021-07-09', '2021-07-31', 'AULIA GIZELE DIANITA', '002806', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(252, 253, '2021-07-09', '2021-07-31', 'MOKTIKA JAVIER FAJARINA', '002685', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(253, 254, '2021-07-09', '2021-07-31', 'NABILLA ANDINI PUTRI FINANTI', '002688', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Belum Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(254, 255, '2021-07-09', '2021-07-31', 'Naylla eka novia', '002689', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(255, 256, '2021-07-09', '2021-07-31', 'Rozana Alya Majida Wahyudi', '002695', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(256, 257, '2021-07-09', '2021-07-31', 'Tsabita Dia Putri Agung', '002697', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(257, 258, '2021-07-09', '2021-07-31', 'Wildan Achmad Ridho', '002699', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022'),
(258, 259, '2021-07-09', '2021-07-31', 'Zahrotusyifa\' lextya putri ramadhani', '002701', '6', 'ZAM-ZAM', 'SPP [Jul]', 400000, 'Sudah Dibayar', 'MI ICP NURUL ULUM BOJONEGORO', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `t88_menus`
--

CREATE TABLE `t88_menus` (
  `idmenus` int(11) NOT NULL,
  `menus` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t88_menus`
--

INSERT INTO `t88_menus` (`idmenus`, `menus`, `kode`) VALUES
(13, 'Master - Sekolah', 'sekolah'),
(14, 'Master - Tahun Ajaran', 'tahunajaran'),
(15, 'Master - Kelas', 'kelas'),
(16, 'Master - Tagihan', 'tagihan'),
(17, 'Master - Rincian', 'rincian'),
(18, 'Transaksi - Transaksi', 'transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `t89_users_menus`
--

CREATE TABLE `t89_users_menus` (
  `idusersmenus` int(11) NOT NULL,
  `idusers` int(11) UNSIGNED NOT NULL,
  `idmenus` int(11) NOT NULL,
  `rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t89_users_menus`
--

INSERT INTO `t89_users_menus` (`idusersmenus`, `idusers`, `idmenus`, `rights`) VALUES
(1, 2, 1, 7),
(2, 1, 1, 7),
(3, 2, 2, 7),
(4, 1, 2, 7),
(5, 2, 3, 7),
(6, 1, 3, 7),
(7, 2, 4, 7),
(8, 1, 4, 7),
(9, 2, 5, 7),
(10, 1, 5, 7),
(11, 2, 6, 7),
(12, 1, 6, 7),
(13, 2, 7, 7),
(14, 1, 7, 7),
(15, 2, 8, 7),
(16, 1, 8, 7),
(17, 2, 9, 7),
(18, 1, 9, 7),
(19, 2, 10, 7),
(20, 1, 10, 7),
(21, 4, 10, 7),
(22, 4, 9, 7),
(23, 4, 8, 7),
(24, 4, 7, 7),
(25, 4, 6, 7),
(26, 4, 5, 7),
(27, 4, 4, 7),
(28, 4, 3, 7),
(29, 4, 2, 7),
(30, 4, 1, 7),
(31, 5, 10, 7),
(32, 5, 9, 7),
(33, 5, 8, 7),
(34, 5, 7, 7),
(35, 5, 6, 7),
(36, 5, 5, 7),
(37, 5, 4, 7),
(38, 5, 3, 7),
(39, 5, 2, 7),
(40, 5, 1, 7),
(41, 3, 1, 7),
(42, 3, 2, 7),
(43, 3, 3, 7),
(44, 3, 4, 7),
(45, 3, 5, 7),
(46, 3, 6, 7),
(47, 3, 7, 7),
(48, 3, 8, 7),
(49, 3, 9, 7),
(50, 3, 10, 7),
(56, 5, 11, 7),
(57, 4, 11, 7),
(58, 3, 11, 7),
(59, 2, 11, 7),
(60, 1, 11, 7),
(61, 5, 12, 7),
(62, 4, 12, 7),
(63, 3, 12, 7),
(64, 2, 12, 7),
(65, 1, 12, 7),
(66, 5, 13, 7),
(67, 4, 13, 7),
(68, 3, 13, 7),
(69, 2, 13, 7),
(70, 1, 13, 7),
(71, 5, 14, 7),
(72, 4, 14, 7),
(73, 3, 14, 7),
(74, 2, 14, 7),
(75, 1, 14, 7),
(76, 5, 15, 7),
(77, 4, 15, 7),
(78, 3, 15, 7),
(79, 2, 15, 7),
(80, 1, 15, 7),
(81, 5, 16, 7),
(82, 4, 16, 7),
(83, 3, 16, 7),
(84, 2, 16, 7),
(85, 1, 16, 7),
(86, 5, 17, 7),
(87, 4, 17, 7),
(88, 3, 17, 7),
(89, 2, 17, 7),
(90, 1, 17, 7),
(91, 5, 18, 7),
(92, 4, 18, 7),
(93, 3, 18, 7),
(94, 2, 18, 7),
(95, 1, 18, 7);

-- --------------------------------------------------------

--
-- Table structure for table `t90_users`
--

CREATE TABLE `t90_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t90_users`
--

INSERT INTO `t90_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$dPHoARWNwi3q8RSaACTb6O0dK8fTNUfJ7K52jxOG7Bn15x2WHOciu', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1630232217, 1, 'Administrator', 'istrator', 'ADMIN', '0'),
(2, '::1', 'dodo', '$2y$10$45w8AaYwozR/hjmH.Qm0.OMxwJJs6BmFBbn2AIQP16NuDDDxbfvU6', 'e135146@f135146.g135146', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625399506, 1628410468, 1, 'Dodo Ananto', NULL, NULL, NULL),
(3, '::1', 'budi', '$2y$10$MvzwSXUbEi.0mYppxcxc9.6u1lE2K13ELcpw8GJkr1Xdo9co9aOjC', 'e195422@f195422.g195422', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1626198862, 1627203728, 1, 'Budi Wiranto', NULL, NULL, NULL),
(4, '::1', 'ilham', '$2y$10$X9GVQQk4pD5UPWgbM8Qgq.4ljAUX.Fjytf3vXg5CahIcfMRDA6ac.', 'e212914@f212914.g212914', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1626204554, NULL, 1, 'Ilham', NULL, NULL, NULL),
(5, '::1', 'rido', '$2y$10$irQ9LsaHnSWuORf0iep/yeTA1KRzE43lj6jqQB4miJUjEjnFqKJVi', 'e215310@f215310.g215310', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1626205990, NULL, 1, 'Rido', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t91_groups`
--

CREATE TABLE `t91_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t91_groups`
--

INSERT INTO `t91_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `t92_users_groups`
--

CREATE TABLE `t92_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t92_users_groups`
--

INSERT INTO `t92_users_groups` (`id`, `user_id`, `group_id`) VALUES
(11, 1, 1),
(12, 1, 2),
(14, 2, 1),
(15, 2, 2),
(16, 3, 2),
(17, 4, 2),
(18, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t93_login_attempts`
--

CREATE TABLE `t93_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t93_login_attempts`
--

INSERT INTO `t93_login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(8, '::1', 'admin@admin.com', 1630209915);

-- --------------------------------------------------------

--
-- Table structure for table `t97_saldoawal`
--

CREATE TABLE `t97_saldoawal` (
  `kode` varchar(25) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `saldo_awal_tahun` double NOT NULL DEFAULT 0,
  `bulan_01` double NOT NULL DEFAULT 0,
  `bulan_02` double NOT NULL DEFAULT 0,
  `bulan_03` double NOT NULL DEFAULT 0,
  `bulan_04` double NOT NULL DEFAULT 0,
  `bulan_05` double NOT NULL DEFAULT 0,
  `bulan_06` double NOT NULL DEFAULT 0,
  `bulan_07` double NOT NULL DEFAULT 0,
  `bulan_08` double NOT NULL DEFAULT 0,
  `bulan_09` double NOT NULL DEFAULT 0,
  `bulan_10` double NOT NULL DEFAULT 0,
  `bulan_11` double NOT NULL DEFAULT 0,
  `bulan_12` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t97_saldoawal`
--

INSERT INTO `t97_saldoawal` (`kode`, `tahun`, `saldo_awal_tahun`, `bulan_01`, `bulan_02`, `bulan_03`, `bulan_04`, `bulan_05`, `bulan_06`, `bulan_07`, `bulan_08`, `bulan_09`, `bulan_10`, `bulan_11`, `bulan_12`) VALUES
('1', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('11', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1101', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1101001', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1102', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1102001', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1102002', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1102003', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1102004', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1102005', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103001', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103001001', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103001002', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103002', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103002001', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103002002', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103002003', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103002004', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1103002005', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('12', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1201', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1202', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1203', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1204', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1801', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1802', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('1803', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('21', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2101', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2102', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2103', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('22', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2201', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('23', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2301', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('24', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2401', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2402', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2403', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2404', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2405', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2406', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('3', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('31', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('32', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('33', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('34', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('35', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('36', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('4', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('41', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('4101', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('4102', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('42', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('4201', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('4202', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('5', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('51', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('5101', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('5102', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('61', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6101', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6102', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6103', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6104', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6105', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6106', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6107', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6108', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6109', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6110', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6111', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6112', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6113', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6114', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6115', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6116', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('62', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6201', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6202', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('63', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6301', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6302', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6303', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('64', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6401', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('65', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6501', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6502', '2021', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t98_akun`
--

CREATE TABLE `t98_akun` (
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `induk` varchar(25) NOT NULL,
  `urutan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t98_akun`
--

INSERT INTO `t98_akun` (`kode`, `nama`, `induk`, `urutan`) VALUES
('1', 'AKTIVA ', '-', '1000000000000'),
('11', 'AKTIVA LANCAR', '1', '1100000000000'),
('1101', 'KAS', '11', '1101000000000'),
('1101001', 'KAS', '1101', '1101001000000'),
('1102', 'BANK', '11', '1102000000000'),
('1102001', 'BANK BCA - LUTINUS', '1102', '1102001000000'),
('1102002', 'BANK MANDIRI - LUTINUS', '1102', '1102002000000'),
('1102003', 'GIRO MANDIRI - LUTINUS', '1102', '1102003000000'),
('1102004', 'BANK MANDIRI - VISTA', '1102', '1102004000000'),
('1102005', 'AYAT SILANG', '1102', '1102005000000'),
('1103', 'PIUTANG', '11', '1103000000000'),
('1103001', 'PIUTANG USAHA', '1103', '1103001000000'),
('1103001001', 'PIUTANG USAHA DOMESTIK', '1103001', '1103001001000'),
('1103001002', 'PIUTANG USAHA INTERNASIONAL', '1103001', '1103001002000'),
('1103002', 'PIUTANG LAIN-LAIN', '1103', '1103002000000'),
('1103002001', 'BIAYA DIBAYAR DIMUKA', '1103002', '1103002001000'),
('1103002002', 'PPH PSL. 23', '1103002', '1103002002000'),
('1103002003', 'PPH PSL 25', '1103002', '1103002003000'),
('1103002004', 'SEWA DIBAYAR DIMUKA', '1103002', '1103002004000'),
('1103002005', 'PPN MASUKAN', '1103002', '1103002005000'),
('12', 'AKTIVA TETAP', '1', '1200000000000'),
('1201', 'TANAH', '12', '1201000000000'),
('1202', 'BANGUNAN', '12', '1202000000000'),
('1203', 'KENDARAAN', '12', '1203000000000'),
('1204', 'INVENTARIS', '12', '1204000000000'),
('18', 'AKUMULASI PENYUSUTAN', '1', '1800000000000'),
('1801', 'AKUMULASI PENYUSUTAN BANGUNAN', '18', '1801000000000'),
('1802', 'AKUMULASI PENYUSUTAN KENDARAAN', '18', '1802000000000'),
('1803', 'AKUMULASI PENYUSUTAN INVENTARIS', '18', '1803000000000'),
('2', 'HUTANG', '-', '2000000000000'),
('21', 'HUTANG LANCAR', '2', '2100000000000'),
('2101', 'HUTANG USAHA DOMESTIK', '21', '2101000000000'),
('2102', 'HUTANG USAHA INTERNASIONAL', '21', '2102000000000'),
('2103', 'HUTANG REFUND', '21', '2103000000000'),
('22', 'KEWAJIBAN JANGKA PANJANG', '2', '2200000000000'),
('2201', 'HUTANG JANGKA PANJANG LAINNYA', '22', '2201000000000'),
('23', 'HUTANG USAHA LAINNYA', '2', '2300000000000'),
('2301', 'HUTANG BANK', '23', '2301000000000'),
('24', 'HUTANG PPN', '2', '2400000000000'),
('2401', 'HUTANG PPH PSL. 21', '24', '2401000000000'),
('2402', 'HUTANG PPH PSL. 23', '24', '2402000000000'),
('2403', 'HUTANG PPH PSL. 25', '24', '2403000000000'),
('2404', 'HUTANG PPH PSL. 4 (2)', '24', '2404000000000'),
('2405', 'HUTANG PPH PSL. 29', '24', '2405000000000'),
('2406', 'BIAYA YMH DIBAYAR LAINNYA', '24', '2406000000000'),
('3', 'MODAL', '-', '3000000000000'),
('31', 'MODAL SAHAM', '3', '3100000000000'),
('32', 'DEVIDEN', '3', '3200000000000'),
('33', 'PRIVE', '3', '3300000000000'),
('34', 'LABA ( RUGI ) DITAHAN', '3', '3400000000000'),
('35', 'LABA ( RUGI ) TAHUN BERJALAN', '3', '3500000000000'),
('36', 'LABA ( RUGI ) BULAN BERJALAN', '3', '3600000000000'),
('4', 'PENDAPATAN', '-', '4000000000000'),
('41', 'PENDAPATAN JASA FREIGHT', '4', '4100000000000'),
('4101', 'PENDAPATAN FREIGHT DOMESTIK', '41', '4101000000000'),
('4102', 'PENDAPATAN FREIGHT INTERNASIONAL', '41', '4102000000000'),
('42', 'PENDAPATAN LAIN', '4', '4200000000000'),
('4201', 'PENDAPATAN BUNGA BANK', '42', '4201000000000'),
('4202', 'PENDAPATAN LAIN-LAIN', '42', '4202000000000'),
('5', 'HARGA POKOK PENJUALAN', '-', '5000000000000'),
('51', 'HARGA POKOK FREIGHT', '5', '5100000000000'),
('5101', 'HARGA POKOK FREIGHT DOMESTIK', '51', '5101000000000'),
('5102', 'HARGA POKOK FREIGHT INTERNASIONAL', '51', '5102000000000'),
('6', 'BIAYA', '-', '6000000000000'),
('61', 'BIAYA USAHA', '6', '6100000000000'),
('6101', 'BIAYA GAJI', '61', '6101000000000'),
('6102', 'BIAYA PARKIR, TOL DAN BBM', '61', '6102000000000'),
('6103', 'BIAYA LISTRIK', '61', '6103000000000'),
('6104', 'BIAYA TELEPON, FAX DAN INTERNET', '61', '6104000000000'),
('6105', 'IURAN, RETRIBUSI AIR DAN PBB', '61', '6105000000000'),
('6106', 'PERLENGKAPAN DAN KEPERLUAN KANTOR', '61', '6106000000000'),
('6107', 'ALAT TULIS KANTOR', '61', '6107000000000'),
('6108', 'KONSUMSI', '61', '6108000000000'),
('6109', 'PEMELIHARAAN KENDARAAN', '61', '6109000000000'),
('6110', 'ENTERTAINMENT', '61', '6110000000000'),
('6111', 'BIAYA SEWA', '61', '6111000000000'),
('6112', 'INSENTIF MARKETING', '61', '6112000000000'),
('6113', 'BONUS TAHUNAN', '61', '6113000000000'),
('6114', 'ASURANSI KENDARAAN', '61', '6114000000000'),
('6115', 'BIAYA KENDARAAN', '61', '6115000000000'),
('6116', 'PAJAK PENGHASILAN', '61', '6116000000000'),
('62', 'BIAYA PEMELIHARAAN', '6', '6200000000000'),
('6201', 'PEMELIHARAAN PERALATAN DAN PERLENGKAPAN KANTOR', '62', '6201000000000'),
('6202', 'PEMELIHARAAN BANGUNAN KANTOR', '62', '6202000000000'),
('63', 'BIAYA PENYUSUTAN', '6', '6300000000000'),
('6301', 'PENYUSUTAN BANGUNAN', '63', '6301000000000'),
('6302', 'PENYUSUTAN KENDARAAN', '63', '6302000000000'),
('6303', 'PENYUSUTAN INVENTARIS', '63', '6303000000000'),
('64', 'BIAYA PAJAK', '6', '6400000000000'),
('6401', 'BIAYA PAJAK PPH 21', '64', '6401000000000'),
('65', 'BEBAN LAIN', '6', '6500000000000'),
('6501', 'BIAYA ADMINISTRASI BANK', '65', '6501000000000'),
('6502', 'BEBAN LAIN-LAIN', '65', '6502000000000');

-- --------------------------------------------------------

--
-- Table structure for table `t99_company`
--

CREATE TABLE `t99_company` (
  `idcompany` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t99_company`
--

INSERT INTO `t99_company` (`idcompany`, `nama`, `alamat`, `kota`) VALUES
(1, 'MINU', 'JL. JAMBEAN', 'BOJONEGORO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t00_sekolah`
--
ALTER TABLE `t00_sekolah`
  ADD PRIMARY KEY (`idsekolah`);

--
-- Indexes for table `t01_tahunajaran`
--
ALTER TABLE `t01_tahunajaran`
  ADD PRIMARY KEY (`idtahunajaran`);

--
-- Indexes for table `t02_kelas`
--
ALTER TABLE `t02_kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `t03_tagihan`
--
ALTER TABLE `t03_tagihan`
  ADD PRIMARY KEY (`idtagihan`);

--
-- Indexes for table `t04_rincian`
--
ALTER TABLE `t04_rincian`
  ADD PRIMARY KEY (`idrincian`);

--
-- Indexes for table `t05_rinciandetail`
--
ALTER TABLE `t05_rinciandetail`
  ADD PRIMARY KEY (`idrinciandetail`);

--
-- Indexes for table `t30_transaksi`
--
ALTER TABLE `t30_transaksi`
  ADD PRIMARY KEY (`idtr`);

--
-- Indexes for table `t88_menus`
--
ALTER TABLE `t88_menus`
  ADD PRIMARY KEY (`idmenus`);

--
-- Indexes for table `t89_users_menus`
--
ALTER TABLE `t89_users_menus`
  ADD PRIMARY KEY (`idusersmenus`),
  ADD UNIQUE KEY `users_menus` (`idusers`,`idmenus`),
  ADD KEY `idmenus` (`idmenus`);

--
-- Indexes for table `t90_users`
--
ALTER TABLE `t90_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_username` (`username`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `t91_groups`
--
ALTER TABLE `t91_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t92_users_groups`
--
ALTER TABLE `t92_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `t93_login_attempts`
--
ALTER TABLE `t93_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t97_saldoawal`
--
ALTER TABLE `t97_saldoawal`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `t98_akun`
--
ALTER TABLE `t98_akun`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `t99_company`
--
ALTER TABLE `t99_company`
  ADD PRIMARY KEY (`idcompany`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t00_sekolah`
--
ALTER TABLE `t00_sekolah`
  MODIFY `idsekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t01_tahunajaran`
--
ALTER TABLE `t01_tahunajaran`
  MODIFY `idtahunajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t02_kelas`
--
ALTER TABLE `t02_kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t03_tagihan`
--
ALTER TABLE `t03_tagihan`
  MODIFY `idtagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t04_rincian`
--
ALTER TABLE `t04_rincian`
  MODIFY `idrincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t05_rinciandetail`
--
ALTER TABLE `t05_rinciandetail`
  MODIFY `idrinciandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t30_transaksi`
--
ALTER TABLE `t30_transaksi`
  MODIFY `idtr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `t88_menus`
--
ALTER TABLE `t88_menus`
  MODIFY `idmenus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t89_users_menus`
--
ALTER TABLE `t89_users_menus`
  MODIFY `idusersmenus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `t90_users`
--
ALTER TABLE `t90_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t91_groups`
--
ALTER TABLE `t91_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t92_users_groups`
--
ALTER TABLE `t92_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t93_login_attempts`
--
ALTER TABLE `t93_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t99_company`
--
ALTER TABLE `t99_company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
