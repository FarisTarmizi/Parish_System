-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2024 at 01:01 PM
-- Server version: 8.0.39-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kptsspbc_masjidalimran`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajk`
--

CREATE TABLE `ajk` (
  `Idajk` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ajk`
--

INSERT INTO `ajk` (`Idajk`, `username`, `password`) VALUES
(1, 'masjidulupauh', 'ajk123');

-- --------------------------------------------------------

--
-- Table structure for table `aktiviti`
--

CREATE TABLE `aktiviti` (
  `idaktiviti` int NOT NULL,
  `gambar` varchar(10000) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `butiran` text NOT NULL,
  `tarikhtamat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bantuan`
--

CREATE TABLE `jenis_bantuan` (
  `idbantuan` int NOT NULL,
  `nama` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_bantuan`
--

INSERT INTO `jenis_bantuan` (`idbantuan`, `nama`) VALUES
(1, 'SKIM AGIHAN SARA HIDUP'),
(2, 'Skim Agihan Sarahidup Bulanan'),
(3, 'Skim Agihan Perubatan'),
(4, 'Skim Agihan Persekolahan Rendah/Menegah'),
(5, 'Skim Agihan Program Peningkatan Ekonomi Asnaf'),
(6, 'Skim Agihan Bekalan Elektrik/Air'),
(7, 'Skim Agihan baik pulih rumah/Bina Baru'),
(8, 'Skim Agihan Mikro baik pulih rumah'),
(9, 'Skim Agihan Bencana'),
(10, 'Skim Agihan kecemasan Ibnu Sabil'),
(11, 'Skim Agihan Saguhati Motivasi Memeluk Islam'),
(12, 'Skim Agihan Pelajaran Serta Merta IPT'),
(13, 'Skim Agihan Zakat Pelajaran Dermasiswa Luar Negara(Timur tengah)'),
(14, 'Skim Agihan Aktiviti Dakwah dan Kemasyarakatan MAIPs'),
(15, 'Skim Bantuan Kebajikan(Jabatan Kebajikan Masyarakat)'),
(16, 'MyKasih'),
(17, 'LAIN-LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `kariah`
--

CREATE TABLE `kariah` (
  `Idkariah` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zon` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kpekerjaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ic` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gaji` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bangsa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bantuan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `menghuni` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namawaris` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icwaris` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaanwaris` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kpekerjaanwaris` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `oku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `joku` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kadoku` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kahwin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kodsumbangan` int DEFAULT NULL,
  `asnaf` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kariah`
--

INSERT INTO `kariah` (`Idkariah`, `nama`, `tel`, `alamat`, `zon`, `pekerjaan`, `kpekerjaan`, `ic`, `status`, `gaji`, `bangsa`, `bantuan`, `menghuni`, `namawaris`, `icwaris`, `pekerjaanwaris`, `kpekerjaanwaris`, `oku`, `joku`, `kadoku`, `kahwin`, `kodsumbangan`, `asnaf`) VALUES
(1, 'JAILANI BIN ABDUL KADIR', '0199009824', 'NO. 3, JALAN DUA, TAMAN DESA ULU PAUH, ARAU', 'Zon 002', 'GURU', 'Kerajaan', '700101038903', 'Disahkan', '10971-15040', 'Melayu', 'Tidak Terima', 'rsendiri', 'RODZIAH BT ISMAIL', '760116035208', 'GURU', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, ''),
(4, 'MOHD FADHLI BIN AHMAD', '0129094503', 'TAMAN KURUNG ANAI', 'Zon 001', 'PENSYARAH POLITEKNIK', 'Kerajaan', '820809035587', 'Disahkan', '10971-15040', 'Melayu', 'Tidak Terima', 'rsendiri', 'NIK SAKINAH BT NIK MUSTAFA', 'tiada', 'GURU', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(5, 'MOHAMMAD NAZIR BIN ISMAIL', '01113078533', '105, KAMPUNG BUKIT, ULU PAUH ', 'Zon 009', 'PENOREH GETAH', 'Sendiri', '731126025377', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'AZEMIYAH BINTI SALLEH', '760401095074', 'tiada', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(6, 'IDRIS BIN OMAR', '01158880605', 'KAMPUNG FELCRAH ULU PAUH,PERLIS', 'Zon', '             TIADA', 'Sendiri', '440706025293', 'Disahkan', '<2500', 'Melayu', 'SKIM AGIHAN SARA HIDUP', 'rsendiri', 'HABSAH BINTI MAT KASSIM', '480901095090', 'SURI RUMAH', 'Sendiri', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(7, 'KU MOHD FAIZAL BIN KU HASHIM', '0194572319', 'LOT 5743 KAMPUNG HILIR ULU PAUH', 'Zon 001', '             TIADA', 'Kerajaan', '810529095105', 'Disahkan', '10971-15040', 'Melayu', 'Tidak Terima', 'rsendiri', 'SURIANY BINTI IDRIS', '821006095046', 'GURU', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(8, 'ZAMRI BIN MAT ZAIN', '0134108922', 'NO.56,LORONG 1 FELCRA,ULU PAUH', 'Zon 001', 'PEGAWAL KESELAMATAN', 'Swasta', '7204-10-8922', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'ROSMEZA BINTI ABDULLAH', '730801025756', 'SURI RUMAH', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(9, 'ZULKIFLI BIN SULAIMAN', '0139827746', 'NO. 19, JALAN 3, TAMAN KURUNG ANAI, ULU PAUH', 'Zon 001', 'PENSYARAH POLITEKNIK', 'Kerajaan', '770616036943', 'Disahkan', '10971-15040', 'Bangsa', 'Tidak Terima', 'rsendiri', 'NURUL HUDA BINTI MOHAMED ALIH', '810527036056', 'GURU', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(10, 'ROSYAZI BIN AHMAD', '01111935901', 'JALAN KUARI, KG BUKIT MAS ULU PAUH', 'Zon 010', 'BURUH', 'Sendiri', '771028095087', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'NOORHASYIMAH BT HAMBALI', '790127025352', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(11, 'MOHD ZULKIFLI BIN MANAF', '0199001007', 'NO.3 JALAN 2, TAMAN KURUNG ANAI, ULU PAUH', 'Zon 001', 'PENSYARAH POLITEKNIK', 'Kerajaan', '820430035785', 'Disahkan', '10971-15040', 'Melayu', 'Tidak Terima', 'rsendiri', 'NORAINI BINTI MUHAMMAD', '830427095268', 'PENSYARAH POLITEKNIK', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(12, 'MOHD SHAHAROM BIN IDRIS', '01164171097', 'LOT 1581, JLN KG TENGAH, ULU PAUH', 'Zon 005', 'PERKHIDMATAN SEWAAN KERETA/MOTOR', 'Sendiri', '811029025439', 'Disahkan', '7101-10970', 'Melayu', 'Tidak Terima', 'rsendiri', 'NORZALINA BT JAMALUDDIN', '860210085488', 'GURU', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(13, 'MOHD SHAHAROM BIN IDRIS', '01164171097', 'LOT 1581, JLN KG TENGAH, ULU PAUH', 'Zon 005', 'PERKHIDMATAN SEWAAN KERETA/MOTOR', 'Sendiri', '811029025439', 'Disahkan', '7101-10970', 'Melayu', 'Tidak Terima', 'rsendiri', 'NORZALINA BT JAMALUDDIN', '860210085488', 'GURU', 'Kerajaan', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(14, 'MUSTAFA BIN AHMAD', '0124645844', 'KG LALANG ULU PAUH', 'Zon 004', 'KERJA KAMPUNG', 'Sendiri', '520801025515', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'SARAH BT IBRAHIM', '570112025558', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(15, 'MUHAMMAD AZMIR BIN AZIZ', '0124501987', 'KG FELCRA HULU PAUH, JALAN ULU PAUH', 'Zon 001', 'SENDIRI', 'Sendiri', '870216095029', 'Disahkan', '<2500', 'Melayu', 'SKIM AGIHAN SARA HIDUP', 'rsendiri', 'NORAINI BINTI AHMAD', '890914026002', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(16, 'ASHIKAH BINTI SALLEH', '01113035531', '105, KAMPUNG BUKIT, ULU PAUH', 'Zon 009', 'PENGASUH ANAK', 'Sendiri', '661211095002', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'tiada', 'tiada', 'tiada', 'tiada', 'tidak', 'tiada', 'tiada', 'Janda', NULL, NULL),
(17, 'ROSLAN BIN DOHAT', '01111456443', '125 A, JALAN BUKIT MAS, PAUH', 'Zon 010', 'KERANI', 'Kerajaan', '700719095029', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'SHAHIDAH BINTI MOHD SHARIN', '761010095194', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(18, 'ROHANI BINTI SALLEH', '01159588827', '105, KAMPUNG BUKIT, ULU PAUH', 'Zon 010', 'TIADA', 'Sendiri', '711204095058', 'Disahkan', '<2500', 'Melayu', 'BANTUAN ILAT', 'rsendiri', 'TIADA', 'tiada', 'tiada', 'tiada', 'tidak', 'tiada', 'tiada', 'Bujang', NULL, NULL),
(19, 'ZAINAB @ TIMAH BT SAAD', '0134108922', 'NO. 56, LORONG 1, FELCRA ULU PAUH', 'Zon 001', 'TIADA', 'Tidak bekerja', '401229095026', 'Disahkan', '<2500', 'Melayu', 'BAITULMAL (JKM)', 'rsendiri', 'TIADA', 'tiada', 'tiada', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(20, 'AZIZ BIN HASSAN', '0194787844', 'NO. 3, KAMPUNG BUKIT MAS, JALAN ULU PAUH', 'Zon 010', 'TIADA', 'Tidak bekerja', '630608025457', 'Disahkan', '<2500', 'Melayu', 'BANTUAN SARA HIDUP', 'rsendiri', 'JAMILAH BINTI IDRIS', '670304025740', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(21, 'MOHD SAIDI BIN ALWI', '0194703898', 'NO. 3, JALAN KAMPONG LALANG, ULU PAUH', 'Zon 005', 'PASARA FELDA', 'Pencen', '610828095029', NULL, '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'SITI AJAR  BT SHAARUL', '641216025486', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(22, 'DOYAH BT MAT', '019', 'KAMPUNG ULU PAUH', 'Zon 005', 'SENDIRI', 'Tidak bekerja', '360410095102', NULL, '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'ABDUL PUTRA BIN ISMAIL', '720312095105', 'TIADA', 'Sendiri', 'tidak', 'tiada', 'tiada', 'Janda', NULL, NULL),
(23, 'ABDUL GHAFUR BIN SAMSUDDIN', '0133629824', '122, KG BARU ULU PAUH', 'Zon 003', 'Swasta', 'Swasta', '861118025701', NULL, '2501-3170', 'Melayu', 'Tidak Terima', 'rsendiri', 'NASUHA IZZATI BINTI NAYAN', '920627095118', 'SECURITY', 'Swasta', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(24, 'AHMAD FAUZI BIN SALLEH', '01111711885', 'NO. 461, KAMPUNG LALANG', 'Zon 004', 'PENGAWAL KESELAMATAN', 'Swasta', '681209025329', NULL, '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'SITI RUSNITA BT ABD RAZAK', '681209025329', 'CLEANER', 'Swasta', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(25, 'KHALID BIN HASSAN', '0194336686', 'NO. 121, JALAN KAMPUNG  ULU PAUH', 'Zon 005', 'PENOREH GETAH', 'Sendiri', '590112009518', NULL, '<2500', 'Melayu', 'Skim Bantuan Kebajikan(Jabatan Kebajikan Masyarakat)', 'rsendiri', 'TIADA', 'tiada', 'TIADA', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Bujang', NULL, NULL),
(26, 'ROSMAH BINTI YAHAYA', '0105258938', 'B-26, KG. ULU PAUH', 'Zon 002', 'KERANI', 'Kerajaan', '690221095068', NULL, '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'MOHD NASIR BIN YAACOB', '730705095017', 'tiada', 'Sendiri', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(27, 'ZARINA BT MUSTAFA', '0168487108', 'KAMPUNG LALANG ULU PAUH', 'Zon 004', 'SURI RUMAH', 'Tidak bekerja', '810322025708', NULL, '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'RUMINI BIN AHMAD JUNUS', 'tiada', 'tiada', 'Sendiri', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(28, 'MUHAMMAD AFDZAL BIN MD. RODZRI', '01112528030', 'B-26, KAMPUNG ULU PAUH', 'Zon 002', 'BURUH', 'Swasta', '950203095011', NULL, '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'NORSHAHIRA BINTI REJAB', '991021095054', 'tiada', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(29, 'MUSTAFA B. AHMAD', '0182827977', 'KG. LALANG ULU PAUH', 'Zon 004', 'SENDIRI', 'Sendiri', '580809022570', 'Disahkan', '<2500', 'Melayu', 'Tidak Terima', 'rsendiri', 'NORAINI BINTI ALWI', 'tiada', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL),
(30, 'ZAIDI B. HAMDAN', '0173904106', 'NO. 38, KG BARU ULU PAUH', 'Zon 003', 'KAFE POLITEKNIK', 'Swasta', '690604095057', 'Disahkan', '<2500', 'Melayu', 'STR', 'rsendiri', 'NUR RUZITA ZAKARIYA', 'tiada', 'SURI RUMAH', 'Tidak bekerja', 'tidak', 'tiada', 'tiada', 'Kahwin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masjid`
--

CREATE TABLE `masjid` (
  `Idmasjid` int NOT NULL,
  `latarbelakang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organisasi` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masjid`
--

INSERT INTO `masjid` (`Idmasjid`, `latarbelakang`, `organisasi`) VALUES
(1, 'Masjid ini terletak di Kampung Ulu Pauh, Perlis. Dibina pada tahun 90-an dengan ahli kariah seramai 5,000 orang. Masjid Al-Imran digunakan oleh masyarakat setempat sebagai satu tempat beribadat dan aktiviti masyarakat seperti perlaksanaan ibadah korban. Ia juga digunakan bagi melaksanakan solat Jumaat pada setiap minggu.                                                                                                                                                                          ', '657a80987c30b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE `sumbangan` (
  `idsumbangan` int NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `tempat` text NOT NULL,
  `bil_penerima` int NOT NULL,
  `dana` varchar(1000) NOT NULL,
  `lain` varchar(1000) NOT NULL,
  `masa` date NOT NULL,
  `nama_pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanggungan`
--

CREATE TABLE `tanggungan` (
  `Idtanggungan` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `ic` varchar(50) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `oku` char(3) NOT NULL,
  `kadoku` char(3) NOT NULL,
  `yatim` char(3) NOT NULL,
  `kariah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggungan`
--

INSERT INTO `tanggungan` (`Idtanggungan`, `nama`, `ic`, `hubungan`, `pekerjaan`, `oku`, `kadoku`, `yatim`, `kariah`) VALUES
(1, 'UMMI SYAFIQAH', '980305035762', 'ANAK', 'SWASTA', 'No', 'No', 'No', 1),
(2, 'HASSAN NASRULLAH', '071208090147', 'ANAK', 'MATRI', 'No', 'No', 'No', 1),
(3, 'UWAIS HABIBULLAH', '111093009005', 'ANAK', 'SMK SERI 3', 'No', 'No', 'No', 1),
(4, 'MUHAMMAD AIZAR HAZIQ', '030424090079', 'ANAK', 'SWASTA', 'No', 'No', 'No', 5),
(5, 'SITI NURJEHA ', '060826090028', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 5),
(6, 'MOHAMMAD AMZAR HAZIM', '090315090023', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 5),
(7, 'AHMAD DANIAL ZAMRI', '991213026491', 'ANAK', '', 'No', 'No', 'No', 8),
(8, 'MUHAMMAD ADAM', '', 'ANAK', '', 'No', 'No', 'No', 9),
(9, 'NUR BALQIS', '', 'ANAK', '', 'No', 'No', 'No', 9),
(10, 'NUR DAMIA', '', 'ANAK', '', 'No', 'No', 'No', 9),
(11, 'NUR AUNI', '', 'ANAK', '', 'No', 'No', 'No', 9),
(12, 'MOHD ILHAN', '', 'ANAK', '', 'No', 'No', 'No', 10),
(13, 'AININ YASMIN', '', 'ANAK', '', 'No', 'No', 'No', 10),
(14, 'MOHD ASSAF KHALIFAH', '', 'ANAK', '', 'No', 'No', 'No', 10),
(15, '', '', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 11),
(16, 'AHMAD DARWIFY ZULQARNAIN', '', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 11),
(17, 'DAUD', '', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 11),
(18, 'YUSUF DAYYAN', '', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 11),
(19, 'ADAM MUSLIM', '110119090179', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 12),
(20, 'ADAM MUSLIM', '110119090179', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 13),
(21, 'NUR MARDHIAH', '', 'ANAK', 'SEKOLAH', 'No', 'No', 'No', 15),
(22, 'ATHIRAH', '', 'ANAK', 'BELUM BERSEKOLAH', 'No', 'No', 'No', 15),
(23, 'ABDUL AZIB AZRI BIN ABDUL MANAP', '040228090169', 'ANAK', '', 'No', 'No', 'No', 16),
(24, 'NURUL ARIANA BINTI ABDUL HAFIZ', '', 'ANAK ANGKAT', 'SEKOLAH', 'No', 'No', 'No', 17),
(25, 'AT-TARMIZI BIN GHAZALI', '821212095207', 'ANAK', '', 'No', 'No', 'No', 19),
(26, 'MUHAMMAD AMINUDDIN', '001129090049', 'ANAK', '', 'No', 'No', 'No', 20),
(27, 'NUR AISYA HUMAIRA', '090507090052', '', 'SEKOLAH', 'No', 'No', 'No', 20),
(28, 'ARFAN ANAQI', '180508090053', 'ANAK', '', 'No', 'No', 'No', 23),
(29, 'AMMAR AMSYAR', '', 'ANAK', '', 'No', 'No', 'No', 23),
(30, 'AYDSN ASYRAF', '231003090119', 'ANAK', '', 'No', 'No', 'No', 23),
(31, 'MUHAMMAD FIRDAUS', '', 'ANAK', '', 'No', 'No', 'No', 24),
(32, '', '', '', '', 'No', 'No', 'No', 24),
(33, 'NURADIBAH BINTI MD RODZRI', '980506095120', 'ANAK', '', 'No', 'No', 'No', 26),
(34, 'MUHD ALIF NAZHAN BIN MOHD NASIR', '041027090167', 'ANAK', '', 'No', 'No', 'No', 26),
(35, 'NUR ALYA ZULAIKA', '', 'ANAK', '', 'No', 'No', 'No', 27),
(36, 'MUHAMMAD ALIFF RAHIMI', '', 'ANAK', '', 'No', 'No', 'No', 27),
(37, 'NIRAT  BINTI MAT JAM', '480122095024', 'IBU/NENEK', '', 'No', 'No', 'No', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajk`
--
ALTER TABLE `ajk`
  ADD PRIMARY KEY (`Idajk`);

--
-- Indexes for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD PRIMARY KEY (`idaktiviti`);

--
-- Indexes for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  ADD PRIMARY KEY (`idbantuan`);

--
-- Indexes for table `kariah`
--
ALTER TABLE `kariah`
  ADD PRIMARY KEY (`Idkariah`),
  ADD KEY `kariah_ibfk_1` (`kodsumbangan`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`Idmasjid`);

--
-- Indexes for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`idsumbangan`);

--
-- Indexes for table `tanggungan`
--
ALTER TABLE `tanggungan`
  ADD PRIMARY KEY (`Idtanggungan`),
  ADD KEY `tanggungan_ibfk_1` (`kariah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajk`
--
ALTER TABLE `ajk`
  MODIFY `Idajk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktiviti`
--
ALTER TABLE `aktiviti`
  MODIFY `idaktiviti` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `idbantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kariah`
--
ALTER TABLE `kariah`
  MODIFY `Idkariah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `Idmasjid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumbangan`
--
ALTER TABLE `sumbangan`
  MODIFY `idsumbangan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanggungan`
--
ALTER TABLE `tanggungan`
  MODIFY `Idtanggungan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kariah`
--
ALTER TABLE `kariah`
  ADD CONSTRAINT `kariah_ibfk_1` FOREIGN KEY (`kodsumbangan`) REFERENCES `sumbangan` (`idsumbangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggungan`
--
ALTER TABLE `tanggungan`
  ADD CONSTRAINT `tanggungan_ibfk_1` FOREIGN KEY (`kariah`) REFERENCES `kariah` (`Idkariah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
