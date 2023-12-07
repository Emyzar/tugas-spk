-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi-spkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(12) NOT NULL,
  `kode` varchar(12) NOT NULL,
  `kriteria` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `kriteria`) VALUES
(1, 'K1', 'IPK'),
(2, 'K2', 'Masa Studi'),
(3, 'K3', 'Prestasi'),
(7, 'K4', 'Tugas Akhir ');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `ipk` varchar(4) NOT NULL,
  `ms_studi` varchar(40) NOT NULL,
  `prestasi` varchar(40) NOT NULL,
  `na` varchar(4) NOT NULL,
  `peringkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `tahun_masuk`, `ipk`, `ms_studi`, `prestasi`, `na`, `peringkat`) VALUES
('2011102412002', 'JARIE CHANDRA MEIDIANTA', 'Tenggorong ', '1997-05-30', '2020', '', '', '', '', ''),
('2011102412004', 'SURYA RAKHMAT HIDAYAT', 'Melak ', '1996-07-30', '2020', '', '', '', '', ''),
('2011102412005', 'DINA YUNITA', 'Kota Bangun ', '1997-06-16', '2020', '', '', '', '', ''),
('2011102412007', 'IRVAN EFENDI', 'Karya Bhakti ', '1997-04-21', '2020', '', '', '', '', ''),
('2011102412008', 'DEDE DAMARA PUTRA', 'Sotek ', '1996-04-01', '2020', '', '', '', '', ''),
('2011102412009', 'ETA FATRIANY', 'Samarinda ', '1993-05-05', '2020', '', '', '', '', ''),
('2011102412010', 'FATIMAH', 'Melak ', '1997-03-03', '2020', '', '', '', '', ''),
('2011102412011', 'FEBRI TRI RAHAYU', 'Tulung Agung ', '1997-02-24', '2020', '', '', '', '', ''),
('2011102412012', 'ERY MURNISIAH', 'Balikpapan ', '1982-04-22', '2020', '', '', '', '', ''),
('2011102412015', 'RAUDATHUL ADAWIYAH', 'Tenggarong ', '1997-03-19', '2020', '', '', '', '', ''),
('2011102412016', 'FRAGA BATARA KRAYANA TAMA', 'Tanjung Selor ', '1997-04-21', '2020', '', '', '', '', ''),
('2011102412017', 'NAIIDIYATY NUR RAHIMI', 'Balikpapan ', '1997-09-24', '2020', '', '', '', '', ''),
('2011102412019', 'NOVRIDA AYU MARYANI', 'Suatang Baru', '1996-12-01', '2020', '', '', '', '', ''),
('2011102412020', 'ABDUL MUIS', 'Balikpapan ', '1997-08-19', '2020', '', '', '', '', ''),
('2011102412021', 'SULASTRE', 'Karangan 06-08-1996', '1996-08-06', '2020', '', '', '', '', ''),
('2011102412022', 'KARMILA MAINIKE PUTRI', 'Kota Bangun ', '1992-02-07', '2020', '', '', '', '', ''),
('2011102412023', 'ANNISA YULIAH', 'Samarinda ', '1997-07-21', '2020', '', '', '', '', ''),
('2011102412024', 'PUTRI NUR FITRIA', 'Samarinda ', '1996-02-13', '2020', '', '', '', '', ''),
('2011102412025', 'RAINALDY SANJAYA', 'Linggang Bigung ', '1994-04-28', '2020', '', '', '', '', ''),
('2011102412026', 'SELVA RAHMADHAYANTI', 'Tenggarong ', '1998-02-07', '2020', '', '', '', '', ''),
('2011102412027', 'HARDIYANTI WARDANAH', 'Liang ', '1996-11-20', '2020', '', '', '', '', ''),
('2011102412028', 'NADIA NUR HAIDAH', 'Kutai ', '1997-05-24', '2020', '', '', '', '', ''),
('2011102412029', 'LIDYA VERA SIANTURI', 'Samarinda ', '1987-09-17', '2020', '', '', '', '', ''),
('2011102412030', 'TASYA AYUNITA', 'Tenggarong ', '1997-09-13', '2020', '', '', '', '', ''),
('2011102412031', 'ABDUL SALAM NUR', 'Tanjung Tengah ', '1994-12-05', '2020', '', '', '', '', ''),
('2011102412033', 'ANIKA PRAMESTI REGITA', 'Samboja ', '1998-05-20', '2020', '', '', '', '', ''),
('2011102412034', 'JULITA PRATIWI', 'Samarinda ', '1998-07-10', '2020', '', '', '', '', ''),
('2011102412035', 'WA ODE NURHAZNI RIDA', 'Buton ', '1999-04-04', '2020', '', '', '', '', ''),
('2011102412036', 'INOR FITRI', 'Rebaq Rinding ', '1997-09-01', '2020', '', '', '', '', ''),
('2011102412037', 'NURWIDYA ADE PUTRI', 'Balikpapan ', '1998-03-27', '2020', '', '', '', '', ''),
('2011102412038', 'UMIL MAKARIM', 'Samarinda ', '1998-05-18', '2020', '', '', '', '', ''),
('2011102412039', 'JAYUNI SAHARA', 'Karya Bhakti ', '1998-06-08', '2020', '', '', '', '', ''),
('2011102412040', 'CITRA RAHAYU', 'Loa Duri ', '1998-09-24', '2020', '', '', '', '', ''),
('2011102412041', 'WILMA WILISANDI', 'Loa Janan ', '1998-08-11', '2020', '', '', '', '', ''),
('2011102412043', 'ERIKA AMELIA IDRIS', 'Balikpapan ', '1998-03-16', '2020', '', '', '', '', ''),
('2011102412044', 'JANNISA FADHILA', 'Jakarta ', '1998-05-05', '2020', '', '', '', '', ''),
('2011102412045', 'AYU PERMATA SARI', 'Samarinda ', '1997-06-01', '2020', '', '', '', '', ''),
('2011102412046', 'SARTIKA WULANDARI', 'Loa Janan ', '1998-04-10', '2020', '', '', '', '', ''),
('2011102412048', 'SINDI NAISA NABILA SARI J', 'Muam Pahu ', '1998-06-20', '2020', '', '', '', '', ''),
('2011102412049', 'RIA JAYANTI', 'Long Iram Bayan ', '1998-09-21', '2020', '', '', '', '', ''),
('2011102412051', 'NILUH KRISMAYANTI PRASTIKA', 'Palaran ', '1998-02-08', '2020', '', '', '', '', ''),
('2011102412052', 'JIHAN SAFITRI', 'Muara Pahu ', '1998-02-18', '2020', '', '', '', '', ''),
('2011102412053', 'NUR ASIYAH', 'Pulang Pisau ', '1996-02-23', '2020', '', '', '', '', ''),
('2011102412054', 'EKSA HENTIN SEKARNINGRUM', 'Waru ', '1998-07-22', '2020', '', '', '', '', ''),
('2011102412055', 'NURWINDAWATI', 'Samarinda ', '1998-06-06', '2020', '', '', '', '', ''),
('2011102412056', 'RESTA REVALDA NINGSIH', 'Samarinda ', '1998-10-28', '2020', '', '', '', '', ''),
('2011102412057', 'CISADA IKE WULANDARI', 'Teluk Bayur ', '1998-08-13', '2020', '', '', '', '', ''),
('2011102412058', 'ARINI PUTRI', 'Loa Kulu ', '1997-10-09', '2020', '', '', '', '', ''),
('2011102412060', 'SRI WAHYUNI', 'Tenggarong ', '1991-02-16', '2020', '', '', '', '', ''),
('2011102412061', 'SHELA ERNITA', 'Tarakan ', '0000-00-00', '2020', '', '', '', '', ''),
('2011102412062', 'EVIE JUMIATIS .', 'Samarinda ', '1985-10-18', '2020', '', '', '', '', ''),
('2011102412063', 'JITA INDAH SARI', 'Samarinda ', '1994-02-09', '2020', '', '', '', '', ''),
('2011102412064', 'NOLVA INDAH PERMATA', 'Samarinda ', '1992-09-16', '2020', '', '', '', '', ''),
('2011102412065', 'IMENTARI APRIANI', 'Sangkulirang ', '1998-08-20', '2020', '', '', '', '', ''),
('2011102412066', 'ADITYA SEPTIADINATA', 'Samarinda ', '1998-09-19', '2020', '', '', '', '', ''),
('2011102412067', 'MUHAMMAD WAHYU RAMDANI', 'Muara Wis ', '1995-11-23', '2020', '', '', '', '', ''),
('2011102412068', 'DIAH SUUD', 'Jombang ', '1999-02-08', '2020', '', '', '', '', ''),
('2011102412069', 'DINDA AYU FRAMAISELLA', 'Nenang ', '1998-06-16', '2020', '', '', '', '', ''),
('2011102412070', 'RISKI NOVILIA', 'UPT Schakung III ', '1997-11-11', '2020', '', '', '', '', ''),
('2011102412071', 'INTANIA AYUNINOTIAS', 'Balikpapan ', '1997-08-01', '2020', '', '', '', '', ''),
('2011102412073', 'MIRAWATI', 'Samarinda ', '1998-08-07', '2020', '', '', '', '', ''),
('2011102412074', 'REDI OKTAVIAN NUR', 'Sebulu ', '1995-10-31', '2020', '', '', '', '', ''),
('2011102412075', 'NURALIM SETIAWICAKSANA', 'Malang ', '1997-06-09', '2020', '', '', '', '', ''),
('2011102412076', 'DESWITA PUSPA SARI', 'Muara Ancalong ', '1998-06-06', '2020', '', '', '', '', ''),
('2011102412078', 'MUHAMMAD REZZA', 'Balikpapan ', '1991-03-15', '2020', '', '', '', '', ''),
('2011102412079', 'MARISA SALSABELLA', 'Samarinda ', '1999-02-28', '2020', '', '', '', '', ''),
('2011102412080', 'LISNAWATI', 'Muara Kaman ', '1999-03-24', '2020', '', '', '', '', ''),
('2011102412081', 'SRI INDAH DAKMAWATI', 'Sebulu ', '1997-02-10', '2020', '', '', '', '', ''),
('2011102412082', 'RISCANANDA NOVIA ARMAH', 'Samarinda ', '1997-11-06', '2020', '', '', '', '', ''),
('2011102412083', 'SAVITRI ISKA SARI', 'Marangkayu ', '1998-03-27', '2020', '', '', '', '', ''),
('2011102412084', 'NADIA SETYORINI UTAMI', 'Kahala ', '1998-11-19', '2020', '', '', '', '', ''),
('2011102412085', 'MUHAMMAD SARKAWI', 'Samarinda ', '1998-02-28', '2020', '', '', '', '', ''),
('2011102412086', 'MAY FAJRIANI', 'Samarinda ', '1999-05-01', '2020', '', '', '', '', ''),
('2011102412087', 'ACHMAT RIYADI', 'Samarinda ', '1999-02-28', '2020', '', '', '', '', ''),
('2011102412088', 'REKA LADINA SAQILA', 'Tenggarong ', '1998-10-29', '2020', '', '', '', '', ''),
('2011102412090', 'ADE INDRAMAWAN', 'Samarinda ', '1998-05-04', '2020', '', '', '', '', ''),
('2011102412091', 'LULUK MUFLIKHATUL MAULIDIYAH', 'Kodiri ', '1997-07-18', '2020', '', '', '', '', ''),
('2011102412092', 'GRADIAN PUTRA ANANTA', 'Petung ', '1998-08-15', '2020', '', '', '', '', ''),
('2011102412094', 'NUR HABIBAH AINI', 'Tenggarong ', '1997-07-27', '2020', '', '', '', '', ''),
('2011102412095', 'ANGGUN FERANI', 'Bengalon ', '1996-04-15', '2020', '', '', '', '', ''),
('2011102412096', 'IDHAM KHALID', 'Samarinda ', '1997-11-21', '2020', '', '', '', '', ''),
('2011102412098', 'FITRI WULANDARI', 'Samarinda ', '1998-10-04', '2020', '', '', '', '', ''),
('2011102412099', 'ELLYA NUR SAFITRI', 'Samarinda ', '1999-02-07', '2020', '', '', '', '', ''),
('2011102412100', 'SITI LESTARI NURHAMIDAH', 'Muara Komam ', '1998-11-22', '2020', '', '', '', '', ''),
('2011102412102', 'VIVI FARWITA PUTRI', 'Tarakan ', '1996-08-12', '2020', '', '', '', '', ''),
('2011102412103', 'CAROLINA NOPITRI B.', 'Samarinda ', '1989-11-25', '2020', '', '', '', '', ''),
('2011102412104', 'M. AIDIL ASPAD', 'Tenggarong ', '1998-04-19', '2020', '', '', '', '', ''),
('2011102412106', 'MUHAMMAD RIZKI SAPUTRA', 'Samarinda ', '1998-10-19', '2020', '', '', '', '', ''),
('2011102412108', 'NUR SALIMAH', 'Berau ', '1996-10-21', '2020', '', '', '', '', ''),
('2011102412109', 'NIZAR ZAIN ILMY', 'Samarinda ', '1998-08-16', '2020', '', '', '', '', ''),
('2011102412111', 'MOH . SATRIA DIANTORO', 'Tenggarong ', '1997-11-14', '2020', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(12) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ipk` varchar(4) NOT NULL,
  `ms_studi` varchar(30) NOT NULL,
  `prestasi` varchar(55) NOT NULL,
  `na` varchar(5) NOT NULL,
  `peringkat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `nim`, `nama`, `ipk`, `ms_studi`, `prestasi`, `na`, `peringkat`) VALUES
(1, '2011102412069', 'DINDA AYU FRAMAISELLA', '', '', '', '', ''),
(2, '2011102412007', 'IRVAN EFENDI', '', '', '', '', ''),
(3, '2011102441127', 'Rendy Nurdiansyah', '', '', '', '', ''),
(4, '2011102412062', ' EVIE JUMIATI S.', '', '', '', '', ''),
(5, '2011102412055', 'NURWINDAWATI', '', '', '', '', ''),
(6, '2011102412015', 'Raudahthul Adawiyah', '', '', '', '', ''),
(7, '2011102412012', 'ERY MURNISIAH', '', '', '', '', ''),
(8, '2011102412016', 'FRAGA BATARA KRAYANA TAMA', '', '', '', '', ''),
(9, '2011102412027', 'HARDIYANTI WARDANAH ', '', '', '', '', ''),
(10, '2011102412063', 'JITA INDAH SARI ', '', '', '', '', ''),
(11, '2011102412029', 'LIDYA VERA SIANTURI ', '', '', '', '', ''),
(12, '2011102412020', 'ABDUL MUIS ', '', '', '', '', ''),
(13, '2011102412087', 'ACHMAT RIYADI', '', '', '', '', ''),
(14, '2011102412033', 'ANIKA PRAMESTI REGITA', '', '', '', '', ''),
(15, '2011102412053', 'EKSA HENTIN SEKARNINGRUM', '', '', '', '', ''),
(16, '2011102412009', 'ETA FATRIANY ', '', '', '', '', ''),
(17, '2011102412010', 'FATIMAH ', '', '', '', '', ''),
(18, '2011102412011', 'Febri Tri Rahayu', '', '', '', '', ''),
(19, '2011102412092', 'GRADIAN PUTRA ANANTA', '', '', '', '', ''),
(20, '2011102412022', 'KARMILA MAINIKE PUTRI ', '', '', '', '', ''),
(21, '2011102412086', 'MAY FAJRIANI ', '', '', '', '', ''),
(22, '2011102412073', 'Mirawati', '', '', '', '', ''),
(23, '2011102412078', 'MUHAMMAD REZZA ', '', '', '', '', ''),
(24, '2011102412017', 'Naiidiyanty Nur Rahma', '', '', '', '', ''),
(25, '2011102412088', 'Reka Ladina Saqila', '', '', '', '', ''),
(26, '2011102412056', 'Resta Revalda Ningsih', '', '', '', '', ''),
(27, '2011102412082', 'Riscananda Novia Armah', '', '', '', '', ''),
(28, '2011102412061', 'Shela Erninta', '', '', '', '', ''),
(29, '2011102412060', 'Sri Wahyuni', '', '', '', '', ''),
(30, '2011102412004', 'Surya Rakhmat Hidayat', '', '', '', '', ''),
(31, '2011102412067', 'Muhammad Wahyu Ramdani', '', '', '', '', ''),
(32, '2011102412028', 'Nadia Nur Haidah', '', '', '', '', ''),
(33, '2011102412008', 'Dede Damara Putra', '', '', '', '', ''),
(34, '2011102412065 ', 'MENTARI APRIANI ', '', '', '', '', ''),
(35, '2011102412038 ', 'UMIL MAKARIM', '', '', '', '', ''),
(36, '2011102412066 ', 'ADITYA SEPTIADINATA', '', '', '', '', ''),
(37, '2011102412098 ', 'FITRI WULANDARI', '', '', '', '', ''),
(38, '2011102412034 ', 'JULITA PRATIWI', '', '', '', '', ''),
(39, '2011102412051 ', 'NILUH KRISMAYANTI PRASTIKA', '', '', '', '', ''),
(40, '2011102412064 ', 'NOLVA INDAH PERMATA', '', '', '', '', ''),
(41, '2011102412100 ', 'SITI LESTARI NURHAMIDAH', '', '', '', '', ''),
(42, '2011102412090 ', 'ADE INDRAMAWAN', '', '', '', '', ''),
(43, '2011102412095 ', 'ANGGUN FERANI', '', '', '', '', ''),
(44, '2011102412058 ', 'ARINI PUTRI', '', '', '', '', ''),
(45, '2011102412076 ', 'DESWITA PUSPA SARI', '', '', '', '', ''),
(46, '2011102412071 ', 'INTANIA AYUNINGTIAS', '', '', '', '', ''),
(47, '2011102412052 ', 'JIHAN SAFITRI', '', '', '', '', ''),
(48, '2011102412079 ', 'MARISA SALSABELLA', '', '', '', '', ''),
(49, '2011102412085 ', 'MUHAMMAD SARKAWI', '', '', '', '', ''),
(50, '2011102412084 ', 'NADIA SETYORINI UTAMI', '', '', '', '', ''),
(51, '2011102412024 ', 'PUTRI NUR FITRIA', '', '', '', '', ''),
(52, '2011102412074 ', 'REDI OKTAVIAN NUR', '', '', '', '', ''),
(53, '2011102412102 ', 'VIVI FARWITA PUTRI', '', '', '', '', ''),
(54, '2011102412041 ', 'WILMA WILISANDI', '', '', '', '', ''),
(55, '2011102412031 ', 'ABDUL SALAM NUR', '', '', '', '', ''),
(56, '2011102412091 ', 'LULUK MUFLIKHATUL MAULIDIYAH', '', '', '', '', ''),
(57, '2011102412094 ', 'NUR HABIBAH AINI', '', '', '', '', ''),
(58, '2011102412021 ', 'SULASTRI', '', '', '', '', ''),
(59, '2011102412109 ', 'NIZAR ZAIN ILMY', '', '', '', '', ''),
(60, '2011102412075', 'NURALIM SETIAWICAKSANA', '', '', '', '', ''),
(61, '2011102412025', ' RAINALDY SANJAYA', '', '', '', '', ''),
(62, '2011102412046 ', 'SARTIKA WULANDARI', '', '', '', '', ''),
(63, '2011102412030 ', 'TASYA AYUNITA', '', '', '', '', ''),
(64, '2011102412103 ', 'CAROLINA NOPITRI B. ', '', '', '', '', ''),
(65, '2011102412099 ', 'ELLYA NUR SAFITRI ', '', '', '', '', ''),
(66, '2011102412026', ' SELVA RAHMADHAYANTI', '', '', '', '', ''),
(67, '2011102412023', ' ANNISA YULIAH', '', '', '', '', ''),
(68, '2011102412039', ' AYUNI SAHARA ', '', '', '', '', ''),
(69, '2011102412013 ', 'GALANG ANTAR NUSA ', '', '', '', '', ''),
(70, '2011102412070', ' RISKI NOVILIA', '', '', '', '', ''),
(71, '2011102412083 ', 'SAVITRI ISKA SARI', '', '', '', '', ''),
(72, '2011102412044 ', 'ANNISA FADHILA ', '', '', '', '', ''),
(73, '2011102412002', ' ARIE CHANDRA MEIDIANTA', '', '', '', '', ''),
(74, '2011102412040 ', 'CITRA RAHAYU ', '', '', '', '', ''),
(75, '2011102412106 ', 'MUHAMMAD RIZKI SAPUTRA', '', '', '', '', ''),
(76, '2011102412048 ', 'SINDI NAISA NABILA SARI . J', '', '', '', '', ''),
(77, '2011102412045', ' AYU PERMATA SARI ', '', '', '', '', ''),
(78, '2011102412014 ', 'ADAM MUH. AGUSSALIM ', '', '', '', '', ''),
(79, '2011102412006', ' DESTI FITRIANTI', '', '', '', '', ''),
(80, '2011102412068 ', 'DIAH SUUD', '', '', '', '', ''),
(81, '2011102412043 ', 'ERIKA AMELIA IDRIS', '', '', '', '', ''),
(82, '2011102412096 ', 'IDHAM KHALID', '', '', '', '', ''),
(83, '2011102412036', ' NOR FITRI ', '', '', '', '', ''),
(84, '2011102412081', ' SRI INDAH DAKMAWATI', '', '', '', '', ''),
(85, '2011102412005 ', 'DINA YUNITA', '', '', '', '', ''),
(86, '2011102412080', ' LISNAWATI', '', '', '', '', ''),
(87, '2011102412111', ' MOH. SATRIA DIANTORO', '', '', '', '', ''),
(88, '2011102412035 ', 'WA ODE NUR HAZNI RIDA', '', '', '', '', ''),
(89, '2011102412104 ', 'M. AIDIL ASPAD ', '', '', '', '', ''),
(90, '2011102412049 ', 'RIA JAYANTI', '', '', '', '', ''),
(91, '2011102412019 ', 'NOVRIDA AYU MARYANI ', '', '', '', '', ''),
(92, '2011102412057 ', 'CISADA IKE WULANDARI ', '', '', '', '', ''),
(93, '2011102412037', ' NURWIDYA ADE PUTRI ', '', '', '', '', ''),
(94, '2011102412108 ', 'NUR SALIMAH ', '', '', '', '', ''),
(95, '2011102441240', 'Emyzar Haflida', '', '', '', '', ''),
(96, '2011102412019', 'NOVRIDA AYU MARYANI', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(12) NOT NULL,
  `kriteria_id` int(12) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `bobot` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nama_sub`, `bobot`) VALUES
(1, 1, '4.00', 5),
(2, 1, '3.80-3.99', 4),
(3, 1, '3.70-3.79', 3),
(4, 1, '3.50-3.69', 2),
(5, 1, '2.76-3.49', 1),
(6, 2, '1 Tahun', 5),
(7, 2, '2 Tahun', 3),
(8, 2, '3 Tahun ', 1),
(9, 3, 'Internasional', 5),
(10, 4, 'Nasional', 4),
(11, 3, 'Regional ', 2),
(12, 3, 'Tidak Ada', 1),
(13, 4, 'A', 5),
(14, 4, 'AB', 3),
(15, 4, 'B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin@gmail.com', '2023', 'admin'),
(2, 'mahasiswa', 'mahasiswa@gmail.com', '2023', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
