-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 09:10 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelolagardu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `datagarduinduk_tb`
--

CREATE TABLE `datagarduinduk_tb` (
  `id_tb_gardu_induk` int(11) NOT NULL,
  `nama_gardu_induk` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datagarduinduk_tb`
--

INSERT INTO `datagarduinduk_tb` (`id_tb_gardu_induk`, `nama_gardu_induk`) VALUES
(13, 'GI NEGARA'),
(23, 'GI GILIMANUK'),
(85, 'GI PEMARON'),
(222, 'GI PESANGGARAN'),
(226, 'GIS BANDARA'),
(244, 'GI PADANG SAMBIAN'),
(310, 'PLTS SERANGAN'),
(414, 'GI PEMECUTAN KELOD'),
(418, 'GI NUSA DUA'),
(424, 'GI KAPAL'),
(437, 'GI SANUR'),
(444, 'GI BATURITI'),
(666, 'GI PAYANGAN'),
(674, 'GI AMLAPURA'),
(675, 'PLTD NUSA PENIDA'),
(689, 'GI ANTOSARI');

-- --------------------------------------------------------

--
-- Table structure for table `datagardupenyulang_tb`
--

CREATE TABLE `datagardupenyulang_tb` (
  `id_tb_gardu_penyulang` int(11) NOT NULL,
  `nama_penyulang` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datagardupenyulang_tb`
--

INSERT INTO `datagardupenyulang_tb` (`id_tb_gardu_penyulang`, `nama_penyulang`) VALUES
(276, 'BANDARA'),
(277, 'DUTY FREE'),
(278, 'EX EXP TUBAN'),
(279, 'REAGEN'),
(280, 'DERMAGA'),
(281, 'MANDIRA'),
(282, 'BANTENG'),
(283, 'PERCOT'),
(285, 'EXP LEGIAN'),
(286, 'KARTIKA'),
(319, 'TIMPAG'),
(323, 'BELAYU'),
(325, 'PENEBEL'),
(326, 'CARGO'),
(352, 'ABIAN BASE'),
(312, 'TEUKU UMAR'),
(320, 'PANJER');

-- --------------------------------------------------------

--
-- Table structure for table `datagardu_tb`
--

CREATE TABLE `datagardu_tb` (
  `id_tb_gardu_induk` int(11) NOT NULL,
  `id_tb_gardu_penyulang` int(11) NOT NULL,
  `jns_gardu` enum('Portal','Cantol') NOT NULL DEFAULT 'Portal',
  `no_gardu` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `merk_trafo` text NOT NULL,
  `no_seri_trafo` text NOT NULL,
  `daya_trafo` int(11) NOT NULL,
  `fasa` varchar(50) NOT NULL,
  `tap` int(5) NOT NULL,
  `jml_jurusan` int(11) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datagardu_tb`
--

INSERT INTO `datagardu_tb` (`id_tb_gardu_induk`, `id_tb_gardu_penyulang`, `jns_gardu`, `no_gardu`, `lokasi`, `merk_trafo`, `no_seri_trafo`, `daya_trafo`, `fasa`, `tap`, `jml_jurusan`, `latitude`, `longitude`) VALUES
(437, 312, 'Portal', 'DB0969', 'JL. Patih Jelantik', 'TRAFINDO', '55TF0100009692', 250, 'A', 0, 1, '-8.66859393391364', '115.217422973966'),
(437, 320, 'Portal', 'DS0332', 'Jl. Tukad Badung\r\n', 'BAMBANG DJAJA', '55TF0100005660', 250, 'A', 0, 4, '-8.684436666742', '115.238022333492');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `level` enum('User','Admin') NOT NULL DEFAULT 'User'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(1, 'admin', 'admin', 'Eka Yuliana', 'Admin'),
(2, 'test', '123', 'tester', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `ukurgardu_tb`
--

CREATE TABLE `ukurgardu_tb` (
  `id_ukur_gardu` int(15) NOT NULL,
  `no_gardu` varchar(50) NOT NULL,
  `nama_petugas1` text NOT NULL,
  `nama_petugas2` text NOT NULL,
  `no_kontrak` text NOT NULL,
  `tgl_pengukuran` date NOT NULL,
  `wkt_pengukuran` time NOT NULL,
  `arus_R` varchar(11) NOT NULL,
  `arus_S` varchar(11) NOT NULL,
  `arus_T` varchar(11) NOT NULL,
  `arus_N` varchar(11) NOT NULL,
  `teg_RN` varchar(11) NOT NULL,
  `teg_SN` varchar(11) NOT NULL,
  `teg_TN` varchar(11) NOT NULL,
  `teg_RS` varchar(11) NOT NULL,
  `teg_RT` varchar(11) NOT NULL,
  `teg_ST` varchar(11) NOT NULL,
  `id_jurusan1` varchar(11) NOT NULL,
  `arus_R_jurusan1` varchar(11) NOT NULL,
  `arus_S_jurusan1` varchar(11) NOT NULL,
  `arus_T_jurusan1` varchar(11) NOT NULL,
  `arus_N_jurusan1` varchar(11) NOT NULL,
  `teg_RN_jurusan1` varchar(11) NOT NULL,
  `teg_SN_jurusan1` varchar(11) NOT NULL,
  `teg_TN_jurusan1` varchar(11) NOT NULL,
  `teg_RS_jurusan1` varchar(11) NOT NULL,
  `teg_RT_jurusan1` varchar(11) NOT NULL,
  `teg_ST_jurusan1` varchar(11) NOT NULL,
  `id_jurusan2` varchar(11) NOT NULL,
  `arus_R_jurusan2` varchar(11) NOT NULL,
  `arus_S_jurusan2` varchar(11) NOT NULL,
  `arus_T_jurusan2` varchar(11) NOT NULL,
  `arus_N_jurusan2` varchar(11) NOT NULL,
  `teg_RN_jurusan2` varchar(11) NOT NULL,
  `teg_SN_jurusan2` varchar(11) NOT NULL,
  `teg_TN_jurusan2` varchar(11) NOT NULL,
  `teg_RS_jurusan2` varchar(11) NOT NULL,
  `teg_RT_jurusan2` varchar(11) NOT NULL,
  `teg_ST_jurusan2` varchar(11) NOT NULL,
  `id_jurusan3` varchar(11) NOT NULL,
  `arus_R_jurusan3` varchar(11) NOT NULL,
  `arus_S_jurusan3` varchar(11) NOT NULL,
  `arus_T_jurusan3` varchar(11) NOT NULL,
  `arus_N_jurusan3` varchar(11) NOT NULL,
  `teg_RN_jurusan3` varchar(11) NOT NULL,
  `teg_SN_jurusan3` varchar(11) NOT NULL,
  `teg_TN_jurusan3` varchar(11) NOT NULL,
  `teg_RS_jurusan3` varchar(11) NOT NULL,
  `teg_RT_jurusan3` varchar(11) NOT NULL,
  `teg_ST_jurusan3` varchar(11) NOT NULL,
  `id_jurusan4` varchar(11) NOT NULL,
  `arus_R_jurusan4` varchar(11) NOT NULL,
  `arus_S_jurusan4` varchar(11) NOT NULL,
  `arus_T_jurusan4` varchar(11) NOT NULL,
  `arus_N_jurusan4` varchar(11) NOT NULL,
  `teg_RN_jurusan4` varchar(11) NOT NULL,
  `teg_SN_jurusan4` varchar(11) NOT NULL,
  `teg_TN_jurusan4` varchar(11) NOT NULL,
  `teg_RS_jurusan4` varchar(11) NOT NULL,
  `teg_RT_jurusan4` varchar(11) NOT NULL,
  `teg_ST_jurusan4` varchar(11) NOT NULL,
  `id_jurusank1` varchar(11) NOT NULL,
  `arus_R_jurusank1` varchar(11) NOT NULL,
  `arus_S_jurusank1` varchar(11) NOT NULL,
  `arus_T_jurusank1` varchar(11) NOT NULL,
  `arus_N_jurusank1` varchar(11) NOT NULL,
  `teg_RN_jurusank1` varchar(11) NOT NULL,
  `teg_SN_jurusank1` varchar(11) NOT NULL,
  `teg_TN_jurusank1` varchar(11) NOT NULL,
  `teg_RS_jurusank1` varchar(11) NOT NULL,
  `teg_RT_jurusank1` varchar(11) NOT NULL,
  `teg_ST_jurusank1` varchar(11) NOT NULL,
  `id_jurusank2` varchar(11) NOT NULL,
  `arus_R_jurusank2` varchar(11) NOT NULL,
  `arus_S_jurusank2` varchar(11) NOT NULL,
  `arus_T_jurusank2` varchar(11) NOT NULL,
  `arus_N_jurusank2` varchar(11) NOT NULL,
  `teg_RN_jurusank2` varchar(11) NOT NULL,
  `teg_SN_jurusank2` varchar(11) NOT NULL,
  `teg_TN_jurusank2` varchar(11) NOT NULL,
  `teg_RS_jurusank2` varchar(11) NOT NULL,
  `teg_RT_jurusank2` varchar(11) NOT NULL,
  `teg_ST_jurusank2` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ukurgardu_tb`
--

INSERT INTO `ukurgardu_tb` (`id_ukur_gardu`, `no_gardu`, `nama_petugas1`, `nama_petugas2`, `no_kontrak`, `tgl_pengukuran`, `wkt_pengukuran`, `arus_R`, `arus_S`, `arus_T`, `arus_N`, `teg_RN`, `teg_SN`, `teg_TN`, `teg_RS`, `teg_RT`, `teg_ST`, `id_jurusan1`, `arus_R_jurusan1`, `arus_S_jurusan1`, `arus_T_jurusan1`, `arus_N_jurusan1`, `teg_RN_jurusan1`, `teg_SN_jurusan1`, `teg_TN_jurusan1`, `teg_RS_jurusan1`, `teg_RT_jurusan1`, `teg_ST_jurusan1`, `id_jurusan2`, `arus_R_jurusan2`, `arus_S_jurusan2`, `arus_T_jurusan2`, `arus_N_jurusan2`, `teg_RN_jurusan2`, `teg_SN_jurusan2`, `teg_TN_jurusan2`, `teg_RS_jurusan2`, `teg_RT_jurusan2`, `teg_ST_jurusan2`, `id_jurusan3`, `arus_R_jurusan3`, `arus_S_jurusan3`, `arus_T_jurusan3`, `arus_N_jurusan3`, `teg_RN_jurusan3`, `teg_SN_jurusan3`, `teg_TN_jurusan3`, `teg_RS_jurusan3`, `teg_RT_jurusan3`, `teg_ST_jurusan3`, `id_jurusan4`, `arus_R_jurusan4`, `arus_S_jurusan4`, `arus_T_jurusan4`, `arus_N_jurusan4`, `teg_RN_jurusan4`, `teg_SN_jurusan4`, `teg_TN_jurusan4`, `teg_RS_jurusan4`, `teg_RT_jurusan4`, `teg_ST_jurusan4`, `id_jurusank1`, `arus_R_jurusank1`, `arus_S_jurusank1`, `arus_T_jurusank1`, `arus_N_jurusank1`, `teg_RN_jurusank1`, `teg_SN_jurusank1`, `teg_TN_jurusank1`, `teg_RS_jurusank1`, `teg_RT_jurusank1`, `teg_ST_jurusank1`, `id_jurusank2`, `arus_R_jurusank2`, `arus_S_jurusank2`, `arus_T_jurusank2`, `arus_N_jurusank2`, `teg_RN_jurusank2`, `teg_SN_jurusank2`, `teg_TN_jurusank2`, `teg_RS_jurusank2`, `teg_RT_jurusank2`, `teg_ST_jurusank2`) VALUES
(1, 'DB0969', '', '', '', '2016-06-24', '12:40:00', '15', '3', '15', '15', '231', '237', '236', '409', '415', '403', '', '', '', '', '', '', '', '', '', '', '', '2A', '5', '0', '6', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1A', '10', '3', '9', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'DS0332', '', '', '', '2016-03-21', '20:15:00', '271', '264', '287', '68', '227', '237', '230', '403', '412', '395', '1A', '71', '100', '104', '32', '222', '229', '225', '386', '398', '388', '', '', '', '', '', '', '', '', '', '', '', '3A', '206', '155', '180', '62', '215', '229', '220', '389', '380', '379', '4A', '0', '0', '0', '0', '227', '237', '230', '403', '395', '412', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduimbang1`
--
CREATE TABLE `v_rekap_garduimbang1` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`ratarata` decimal(26,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduimbang2`
--
CREATE TABLE `v_rekap_garduimbang2` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`id_tb_gardu_induk` int(11)
,`id_tb_gardu_penyulang` int(11)
,`ratarata` decimal(26,2)
,`const_a` decimal(26,2)
,`const_b` decimal(26,2)
,`const_c` decimal(26,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduimbang3`
--
CREATE TABLE `v_rekap_garduimbang3` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`nama_gardu_induk` text
,`nama_penyulang` text
,`ratarata` decimal(26,2)
,`const_a` decimal(26,2)
,`const_b` decimal(26,2)
,`const_c` decimal(26,2)
,`prosen_imbang` varchar(37)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduimbangfix`
--
CREATE TABLE `v_rekap_garduimbangfix` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`nama_gardu_induk` text
,`nama_penyulang` text
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`arus_R` varchar(11)
,`arus_S` varchar(11)
,`arus_T` varchar(11)
,`ratarata` decimal(26,2)
,`const_a` decimal(26,2)
,`const_b` decimal(26,2)
,`const_c` decimal(26,2)
,`prosen_imbang` varchar(37)
,`status_beban` varchar(12)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduob1`
--
CREATE TABLE `v_rekap_garduob1` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`id_tb_gardu_induk` int(11)
,`id_tb_gardu_penyulang` int(11)
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`daya_trafo` int(11)
,`arus_R` varchar(11)
,`arus_S` varchar(11)
,`arus_T` varchar(11)
,`teg_RN` varchar(11)
,`teg_SN` varchar(11)
,`teg_TN` varchar(11)
,`beban_trafo` decimal(26,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduob2`
--
CREATE TABLE `v_rekap_garduob2` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`nama_gardu_induk` text
,`nama_penyulang` text
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`daya_trafo` int(11)
,`arus_R` varchar(11)
,`arus_S` varchar(11)
,`arus_T` varchar(11)
,`teg_RN` varchar(11)
,`teg_SN` varchar(11)
,`teg_TN` varchar(11)
,`beban_trafo` decimal(26,2)
,`prosen_beban` varchar(33)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_garduobfix`
--
CREATE TABLE `v_rekap_garduobfix` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`nama_gardu_induk` text
,`nama_penyulang` text
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`daya_trafo` int(11)
,`arus_R` varchar(11)
,`arus_S` varchar(11)
,`arus_T` varchar(11)
,`teg_RN` varchar(11)
,`teg_SN` varchar(11)
,`teg_TN` varchar(11)
,`beban_trafo` decimal(26,2)
,`prosen_beban` varchar(33)
,`status_gardu` varchar(12)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_tegujung1`
--
CREATE TABLE `v_rekap_tegujung1` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`id_tb_gardu_induk` int(11)
,`id_tb_gardu_penyulang` int(11)
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`Stat_TUJurusan1` varchar(6)
,`Stat_TUJurusan2` varchar(6)
,`Stat_TUJurusan3` varchar(6)
,`Stat_TUJurusan4` varchar(6)
,`Stat_TUJurusank1` varchar(6)
,`Stat_TUJurusank2` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_tegujungfix`
--
CREATE TABLE `v_rekap_tegujungfix` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`nama_gardu_induk` text
,`nama_penyulang` text
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`Stat_TUJurusan1` varchar(6)
,`Stat_TUJurusan2` varchar(6)
,`Stat_TUJurusan3` varchar(6)
,`Stat_TUJurusan4` varchar(6)
,`Stat_TUJurusank1` varchar(6)
,`Stat_TUJurusank2` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_ukurgardu`
--
CREATE TABLE `v_rekap_ukurgardu` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`id_tb_gardu_induk` int(11)
,`id_tb_gardu_penyulang` int(11)
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`nama_petugas1` text
,`nama_petugas2` text
,`no_kontrak` text
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`arus_R` varchar(11)
,`arus_S` varchar(11)
,`arus_T` varchar(11)
,`arus_N` varchar(11)
,`teg_RN` varchar(11)
,`teg_SN` varchar(11)
,`teg_TN` varchar(11)
,`teg_RS` varchar(11)
,`teg_RT` varchar(11)
,`teg_ST` varchar(11)
,`id_jurusan1` varchar(11)
,`arus_R_jurusan1` varchar(11)
,`arus_S_jurusan1` varchar(11)
,`arus_T_jurusan1` varchar(11)
,`arus_N_jurusan1` varchar(11)
,`teg_RN_jurusan1` varchar(11)
,`teg_SN_jurusan1` varchar(11)
,`teg_TN_jurusan1` varchar(11)
,`teg_RS_jurusan1` varchar(11)
,`teg_RT_jurusan1` varchar(11)
,`teg_ST_jurusan1` varchar(11)
,`id_jurusan2` varchar(11)
,`arus_R_jurusan2` varchar(11)
,`arus_S_jurusan2` varchar(11)
,`arus_T_jurusan2` varchar(11)
,`arus_N_jurusan2` varchar(11)
,`teg_RN_jurusan2` varchar(11)
,`teg_SN_jurusan2` varchar(11)
,`teg_TN_jurusan2` varchar(11)
,`teg_RS_jurusan2` varchar(11)
,`teg_RT_jurusan2` varchar(11)
,`teg_ST_jurusan2` varchar(11)
,`id_jurusan3` varchar(11)
,`arus_R_jurusan3` varchar(11)
,`arus_S_jurusan3` varchar(11)
,`arus_T_jurusan3` varchar(11)
,`arus_N_jurusan3` varchar(11)
,`teg_RN_jurusan3` varchar(11)
,`teg_SN_jurusan3` varchar(11)
,`teg_TN_jurusan3` varchar(11)
,`teg_RS_jurusan3` varchar(11)
,`teg_RT_jurusan3` varchar(11)
,`teg_ST_jurusan3` varchar(11)
,`id_jurusan4` varchar(11)
,`arus_R_jurusan4` varchar(11)
,`arus_S_jurusan4` varchar(11)
,`arus_T_jurusan4` varchar(11)
,`arus_N_jurusan4` varchar(11)
,`teg_RN_jurusan4` varchar(11)
,`teg_SN_jurusan4` varchar(11)
,`teg_TN_jurusan4` varchar(11)
,`teg_RS_jurusan4` varchar(11)
,`teg_RT_jurusan4` varchar(11)
,`teg_ST_jurusan4` varchar(11)
,`id_jurusank1` varchar(11)
,`arus_R_jurusank1` varchar(11)
,`arus_S_jurusank1` varchar(11)
,`arus_T_jurusank1` varchar(11)
,`arus_N_jurusank1` varchar(11)
,`teg_RN_jurusank1` varchar(11)
,`teg_SN_jurusank1` varchar(11)
,`teg_TN_jurusank1` varchar(11)
,`teg_RS_jurusank1` varchar(11)
,`teg_RT_jurusank1` varchar(11)
,`teg_ST_jurusank1` varchar(11)
,`id_jurusank2` varchar(11)
,`arus_R_jurusank2` varchar(11)
,`arus_S_jurusank2` varchar(11)
,`arus_T_jurusank2` varchar(11)
,`arus_N_jurusank2` varchar(11)
,`teg_RN_jurusank2` varchar(11)
,`teg_SN_jurusank2` varchar(11)
,`teg_TN_jurusank2` varchar(11)
,`teg_RS_jurusank2` varchar(11)
,`teg_RT_jurusank2` varchar(11)
,`teg_ST_jurusank2` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_ukurgardufix`
--
CREATE TABLE `v_rekap_ukurgardufix` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`nama_gardu_induk` text
,`nama_penyulang` text
,`lokasi` text
,`latitude` varchar(200)
,`longitude` varchar(200)
,`nama_petugas1` text
,`nama_petugas2` text
,`no_kontrak` text
,`tgl_pengukuran` date
,`wkt_pengukuran` time
,`arus_R` varchar(11)
,`arus_S` varchar(11)
,`arus_T` varchar(11)
,`arus_N` varchar(11)
,`teg_RN` varchar(11)
,`teg_SN` varchar(11)
,`teg_TN` varchar(11)
,`teg_RS` varchar(11)
,`teg_RT` varchar(11)
,`teg_ST` varchar(11)
,`id_jurusan1` varchar(11)
,`arus_R_jurusan1` varchar(11)
,`arus_S_jurusan1` varchar(11)
,`arus_T_jurusan1` varchar(11)
,`arus_N_jurusan1` varchar(11)
,`teg_RN_jurusan1` varchar(11)
,`teg_SN_jurusan1` varchar(11)
,`teg_TN_jurusan1` varchar(11)
,`teg_RS_jurusan1` varchar(11)
,`teg_RT_jurusan1` varchar(11)
,`teg_ST_jurusan1` varchar(11)
,`id_jurusan2` varchar(11)
,`arus_R_jurusan2` varchar(11)
,`arus_S_jurusan2` varchar(11)
,`arus_T_jurusan2` varchar(11)
,`arus_N_jurusan2` varchar(11)
,`teg_RN_jurusan2` varchar(11)
,`teg_SN_jurusan2` varchar(11)
,`teg_TN_jurusan2` varchar(11)
,`teg_RS_jurusan2` varchar(11)
,`teg_RT_jurusan2` varchar(11)
,`teg_ST_jurusan2` varchar(11)
,`id_jurusan3` varchar(11)
,`arus_R_jurusan3` varchar(11)
,`arus_S_jurusan3` varchar(11)
,`arus_T_jurusan3` varchar(11)
,`arus_N_jurusan3` varchar(11)
,`teg_RN_jurusan3` varchar(11)
,`teg_SN_jurusan3` varchar(11)
,`teg_TN_jurusan3` varchar(11)
,`teg_RS_jurusan3` varchar(11)
,`teg_RT_jurusan3` varchar(11)
,`teg_ST_jurusan3` varchar(11)
,`id_jurusan4` varchar(11)
,`arus_R_jurusan4` varchar(11)
,`arus_S_jurusan4` varchar(11)
,`arus_T_jurusan4` varchar(11)
,`arus_N_jurusan4` varchar(11)
,`teg_RN_jurusan4` varchar(11)
,`teg_SN_jurusan4` varchar(11)
,`teg_TN_jurusan4` varchar(11)
,`teg_RS_jurusan4` varchar(11)
,`teg_RT_jurusan4` varchar(11)
,`teg_ST_jurusan4` varchar(11)
,`id_jurusank1` varchar(11)
,`arus_R_jurusank1` varchar(11)
,`arus_S_jurusank1` varchar(11)
,`arus_T_jurusank1` varchar(11)
,`arus_N_jurusank1` varchar(11)
,`teg_RN_jurusank1` varchar(11)
,`teg_SN_jurusank1` varchar(11)
,`teg_TN_jurusank1` varchar(11)
,`teg_RS_jurusank1` varchar(11)
,`teg_RT_jurusank1` varchar(11)
,`teg_ST_jurusank1` varchar(11)
,`id_jurusank2` varchar(11)
,`arus_R_jurusank2` varchar(11)
,`arus_S_jurusank2` varchar(11)
,`arus_T_jurusank2` varchar(11)
,`arus_N_jurusank2` varchar(11)
,`teg_RN_jurusank2` varchar(11)
,`teg_SN_jurusank2` varchar(11)
,`teg_TN_jurusank2` varchar(11)
,`teg_RS_jurusank2` varchar(11)
,`teg_RT_jurusank2` varchar(11)
,`teg_ST_jurusank2` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stattujur1`
--
CREATE TABLE `v_stattujur1` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`Stat_TUJurusan1` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stattujur2`
--
CREATE TABLE `v_stattujur2` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`Stat_TUJurusan2` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stattujur3`
--
CREATE TABLE `v_stattujur3` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`Stat_TUJurusan3` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stattujur4`
--
CREATE TABLE `v_stattujur4` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`Stat_TUJurusan4` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stattujurk1`
--
CREATE TABLE `v_stattujurk1` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`Stat_TUJurusank1` varchar(6)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stattujurk2`
--
CREATE TABLE `v_stattujurk2` (
`id_ukur_gardu` int(15)
,`no_gardu` varchar(50)
,`Stat_TUJurusank2` varchar(6)
);

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduimbang1`
--
DROP TABLE IF EXISTS `v_rekap_garduimbang1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduimbang1`  AS  select `ukurgardu_tb`.`id_ukur_gardu` AS `id_ukur_gardu`,`ukurgardu_tb`.`no_gardu` AS `no_gardu`,cast((((`ukurgardu_tb`.`arus_R` + `ukurgardu_tb`.`arus_S`) + `ukurgardu_tb`.`arus_T`) / 3) as decimal(26,2)) AS `ratarata` from `ukurgardu_tb` ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduimbang2`
--
DROP TABLE IF EXISTS `v_rekap_garduimbang2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduimbang2`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`cc`.`id_tb_gardu_induk` AS `id_tb_gardu_induk`,`cc`.`id_tb_gardu_penyulang` AS `id_tb_gardu_penyulang`,`aa`.`ratarata` AS `ratarata`,cast((`bb`.`arus_R` / `aa`.`ratarata`) as decimal(26,2)) AS `const_a`,cast((`bb`.`arus_S` / `aa`.`ratarata`) as decimal(26,2)) AS `const_b`,cast((`bb`.`arus_T` / `aa`.`ratarata`) as decimal(26,2)) AS `const_c` from ((`v_rekap_garduimbang1` `aa` join `ukurgardu_tb` `bb` on((`aa`.`id_ukur_gardu` = `bb`.`id_ukur_gardu`))) join `datagardu_tb` `cc` on((`aa`.`no_gardu` = `cc`.`no_gardu`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduimbang3`
--
DROP TABLE IF EXISTS `v_rekap_garduimbang3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduimbang3`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`nama_gardu_induk` AS `nama_gardu_induk`,`cc`.`nama_penyulang` AS `nama_penyulang`,`aa`.`ratarata` AS `ratarata`,`aa`.`const_a` AS `const_a`,`aa`.`const_b` AS `const_b`,`aa`.`const_c` AS `const_c`,concat(round(((((abs((`aa`.`const_a` - 1)) + abs((`aa`.`const_b` - 1))) + abs((`aa`.`const_c` - 1))) / 3) * 100),2),' %') AS `prosen_imbang` from ((`v_rekap_garduimbang2` `aa` join `datagarduinduk_tb` `bb` on((`aa`.`id_tb_gardu_induk` = `bb`.`id_tb_gardu_induk`))) join `datagardupenyulang_tb` `cc` on((`aa`.`id_tb_gardu_penyulang` = `cc`.`id_tb_gardu_penyulang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduimbangfix`
--
DROP TABLE IF EXISTS `v_rekap_garduimbangfix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduimbangfix`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`aa`.`nama_gardu_induk` AS `nama_gardu_induk`,`aa`.`nama_penyulang` AS `nama_penyulang`,`cc`.`lokasi` AS `lokasi`,`cc`.`latitude` AS `latitude`,`cc`.`longitude` AS `longitude`,`bb`.`tgl_pengukuran` AS `tgl_pengukuran`,`bb`.`wkt_pengukuran` AS `wkt_pengukuran`,`bb`.`arus_R` AS `arus_R`,`bb`.`arus_S` AS `arus_S`,`bb`.`arus_T` AS `arus_T`,`aa`.`ratarata` AS `ratarata`,`aa`.`const_a` AS `const_a`,`aa`.`const_b` AS `const_b`,`aa`.`const_c` AS `const_c`,`aa`.`prosen_imbang` AS `prosen_imbang`,if((`aa`.`prosen_imbang` > 20),'Tidak Imbang','Imbang') AS `status_beban` from ((`v_rekap_garduimbang3` `aa` join `ukurgardu_tb` `bb` on((`aa`.`id_ukur_gardu` = `bb`.`id_ukur_gardu`))) join `datagardu_tb` `cc` on((`aa`.`no_gardu` = `cc`.`no_gardu`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduob1`
--
DROP TABLE IF EXISTS `v_rekap_garduob1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduob1`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`id_tb_gardu_induk` AS `id_tb_gardu_induk`,`bb`.`id_tb_gardu_penyulang` AS `id_tb_gardu_penyulang`,`bb`.`lokasi` AS `lokasi`,`bb`.`latitude` AS `latitude`,`bb`.`longitude` AS `longitude`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`bb`.`daya_trafo` AS `daya_trafo`,`aa`.`arus_R` AS `arus_R`,`aa`.`arus_S` AS `arus_S`,`aa`.`arus_T` AS `arus_T`,`aa`.`teg_RN` AS `teg_RN`,`aa`.`teg_SN` AS `teg_SN`,`aa`.`teg_TN` AS `teg_TN`,cast(((((`aa`.`arus_R` * `aa`.`teg_RN`) + (`aa`.`arus_S` * `aa`.`teg_SN`)) + (`aa`.`arus_T` * `aa`.`teg_TN`)) / 1000) as decimal(26,2)) AS `beban_trafo` from (`ukurgardu_tb` `aa` join `datagardu_tb` `bb` on((`aa`.`no_gardu` = `bb`.`no_gardu`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduob2`
--
DROP TABLE IF EXISTS `v_rekap_garduob2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduob2`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`nama_gardu_induk` AS `nama_gardu_induk`,`cc`.`nama_penyulang` AS `nama_penyulang`,`aa`.`lokasi` AS `lokasi`,`aa`.`latitude` AS `latitude`,`aa`.`longitude` AS `longitude`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`aa`.`daya_trafo` AS `daya_trafo`,`aa`.`arus_R` AS `arus_R`,`aa`.`arus_S` AS `arus_S`,`aa`.`arus_T` AS `arus_T`,`aa`.`teg_RN` AS `teg_RN`,`aa`.`teg_SN` AS `teg_SN`,`aa`.`teg_TN` AS `teg_TN`,`aa`.`beban_trafo` AS `beban_trafo`,concat(round(((`aa`.`beban_trafo` / `aa`.`daya_trafo`) * 100),2),'%') AS `prosen_beban` from ((`v_rekap_garduob1` `aa` join `datagarduinduk_tb` `bb` on((`aa`.`id_tb_gardu_induk` = `bb`.`id_tb_gardu_induk`))) join `datagardupenyulang_tb` `cc` on((`aa`.`id_tb_gardu_penyulang` = `cc`.`id_tb_gardu_penyulang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_garduobfix`
--
DROP TABLE IF EXISTS `v_rekap_garduobfix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_garduobfix`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`aa`.`nama_gardu_induk` AS `nama_gardu_induk`,`aa`.`nama_penyulang` AS `nama_penyulang`,`aa`.`lokasi` AS `lokasi`,`aa`.`latitude` AS `latitude`,`aa`.`longitude` AS `longitude`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`aa`.`daya_trafo` AS `daya_trafo`,`aa`.`arus_R` AS `arus_R`,`aa`.`arus_S` AS `arus_S`,`aa`.`arus_T` AS `arus_T`,`aa`.`teg_RN` AS `teg_RN`,`aa`.`teg_SN` AS `teg_SN`,`aa`.`teg_TN` AS `teg_TN`,`aa`.`beban_trafo` AS `beban_trafo`,`aa`.`prosen_beban` AS `prosen_beban`,if((`aa`.`prosen_beban` > 80),'Gardu OB',if((`aa`.`prosen_beban` > 50),'Mendekati OB','Aman')) AS `status_gardu` from `v_rekap_garduob2` `aa` ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_tegujung1`
--
DROP TABLE IF EXISTS `v_rekap_tegujung1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_tegujung1`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`id_tb_gardu_induk` AS `id_tb_gardu_induk`,`bb`.`id_tb_gardu_penyulang` AS `id_tb_gardu_penyulang`,`bb`.`lokasi` AS `lokasi`,`bb`.`latitude` AS `latitude`,`bb`.`longitude` AS `longitude`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`qq`.`Stat_TUJurusan1` AS `Stat_TUJurusan1`,`ww`.`Stat_TUJurusan2` AS `Stat_TUJurusan2`,`ee`.`Stat_TUJurusan3` AS `Stat_TUJurusan3`,`rr`.`Stat_TUJurusan4` AS `Stat_TUJurusan4`,`tt`.`Stat_TUJurusank1` AS `Stat_TUJurusank1`,`yy`.`Stat_TUJurusank2` AS `Stat_TUJurusank2` from (((((((`ukurgardu_tb` `aa` join `datagardu_tb` `bb` on((`aa`.`no_gardu` = `bb`.`no_gardu`))) join `v_stattujur1` `qq` on((`aa`.`id_ukur_gardu` = `qq`.`id_ukur_gardu`))) join `v_stattujur2` `ww` on((`aa`.`id_ukur_gardu` = `ww`.`id_ukur_gardu`))) join `v_stattujur3` `ee` on((`aa`.`id_ukur_gardu` = `ee`.`id_ukur_gardu`))) join `v_stattujur4` `rr` on((`aa`.`id_ukur_gardu` = `rr`.`id_ukur_gardu`))) join `v_stattujurk1` `tt` on((`aa`.`id_ukur_gardu` = `tt`.`id_ukur_gardu`))) join `v_stattujurk2` `yy` on((`aa`.`id_ukur_gardu` = `yy`.`id_ukur_gardu`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_tegujungfix`
--
DROP TABLE IF EXISTS `v_rekap_tegujungfix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_tegujungfix`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`nama_gardu_induk` AS `nama_gardu_induk`,`cc`.`nama_penyulang` AS `nama_penyulang`,`aa`.`lokasi` AS `lokasi`,`aa`.`latitude` AS `latitude`,`aa`.`longitude` AS `longitude`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`aa`.`Stat_TUJurusan1` AS `Stat_TUJurusan1`,`aa`.`Stat_TUJurusan2` AS `Stat_TUJurusan2`,`aa`.`Stat_TUJurusan3` AS `Stat_TUJurusan3`,`aa`.`Stat_TUJurusan4` AS `Stat_TUJurusan4`,`aa`.`Stat_TUJurusank1` AS `Stat_TUJurusank1`,`aa`.`Stat_TUJurusank2` AS `Stat_TUJurusank2` from ((`v_rekap_tegujung1` `aa` join `datagarduinduk_tb` `bb` on((`aa`.`id_tb_gardu_induk` = `bb`.`id_tb_gardu_induk`))) join `datagardupenyulang_tb` `cc` on((`aa`.`id_tb_gardu_penyulang` = `cc`.`id_tb_gardu_penyulang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_ukurgardu`
--
DROP TABLE IF EXISTS `v_rekap_ukurgardu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_ukurgardu`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`id_tb_gardu_induk` AS `id_tb_gardu_induk`,`bb`.`id_tb_gardu_penyulang` AS `id_tb_gardu_penyulang`,`bb`.`lokasi` AS `lokasi`,`bb`.`latitude` AS `latitude`,`bb`.`longitude` AS `longitude`,`aa`.`nama_petugas1` AS `nama_petugas1`,`aa`.`nama_petugas2` AS `nama_petugas2`,`aa`.`no_kontrak` AS `no_kontrak`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`aa`.`arus_R` AS `arus_R`,`aa`.`arus_S` AS `arus_S`,`aa`.`arus_T` AS `arus_T`,`aa`.`arus_N` AS `arus_N`,`aa`.`teg_RN` AS `teg_RN`,`aa`.`teg_SN` AS `teg_SN`,`aa`.`teg_TN` AS `teg_TN`,`aa`.`teg_RS` AS `teg_RS`,`aa`.`teg_RT` AS `teg_RT`,`aa`.`teg_ST` AS `teg_ST`,`aa`.`id_jurusan1` AS `id_jurusan1`,`aa`.`arus_R_jurusan1` AS `arus_R_jurusan1`,`aa`.`arus_S_jurusan1` AS `arus_S_jurusan1`,`aa`.`arus_T_jurusan1` AS `arus_T_jurusan1`,`aa`.`arus_N_jurusan1` AS `arus_N_jurusan1`,`aa`.`teg_RN_jurusan1` AS `teg_RN_jurusan1`,`aa`.`teg_SN_jurusan1` AS `teg_SN_jurusan1`,`aa`.`teg_TN_jurusan1` AS `teg_TN_jurusan1`,`aa`.`teg_RS_jurusan1` AS `teg_RS_jurusan1`,`aa`.`teg_RT_jurusan1` AS `teg_RT_jurusan1`,`aa`.`teg_ST_jurusan1` AS `teg_ST_jurusan1`,`aa`.`id_jurusan2` AS `id_jurusan2`,`aa`.`arus_R_jurusan2` AS `arus_R_jurusan2`,`aa`.`arus_S_jurusan2` AS `arus_S_jurusan2`,`aa`.`arus_T_jurusan2` AS `arus_T_jurusan2`,`aa`.`arus_N_jurusan2` AS `arus_N_jurusan2`,`aa`.`teg_RN_jurusan2` AS `teg_RN_jurusan2`,`aa`.`teg_SN_jurusan2` AS `teg_SN_jurusan2`,`aa`.`teg_TN_jurusan2` AS `teg_TN_jurusan2`,`aa`.`teg_RS_jurusan2` AS `teg_RS_jurusan2`,`aa`.`teg_RT_jurusan2` AS `teg_RT_jurusan2`,`aa`.`teg_ST_jurusan2` AS `teg_ST_jurusan2`,`aa`.`id_jurusan3` AS `id_jurusan3`,`aa`.`arus_R_jurusan3` AS `arus_R_jurusan3`,`aa`.`arus_S_jurusan3` AS `arus_S_jurusan3`,`aa`.`arus_T_jurusan3` AS `arus_T_jurusan3`,`aa`.`arus_N_jurusan3` AS `arus_N_jurusan3`,`aa`.`teg_RN_jurusan3` AS `teg_RN_jurusan3`,`aa`.`teg_SN_jurusan3` AS `teg_SN_jurusan3`,`aa`.`teg_TN_jurusan3` AS `teg_TN_jurusan3`,`aa`.`teg_RS_jurusan3` AS `teg_RS_jurusan3`,`aa`.`teg_RT_jurusan3` AS `teg_RT_jurusan3`,`aa`.`teg_ST_jurusan3` AS `teg_ST_jurusan3`,`aa`.`id_jurusan4` AS `id_jurusan4`,`aa`.`arus_R_jurusan4` AS `arus_R_jurusan4`,`aa`.`arus_S_jurusan4` AS `arus_S_jurusan4`,`aa`.`arus_T_jurusan4` AS `arus_T_jurusan4`,`aa`.`arus_N_jurusan4` AS `arus_N_jurusan4`,`aa`.`teg_RN_jurusan4` AS `teg_RN_jurusan4`,`aa`.`teg_SN_jurusan4` AS `teg_SN_jurusan4`,`aa`.`teg_TN_jurusan4` AS `teg_TN_jurusan4`,`aa`.`teg_RS_jurusan4` AS `teg_RS_jurusan4`,`aa`.`teg_RT_jurusan4` AS `teg_RT_jurusan4`,`aa`.`teg_ST_jurusan4` AS `teg_ST_jurusan4`,`aa`.`id_jurusank1` AS `id_jurusank1`,`aa`.`arus_R_jurusank1` AS `arus_R_jurusank1`,`aa`.`arus_S_jurusank1` AS `arus_S_jurusank1`,`aa`.`arus_T_jurusank1` AS `arus_T_jurusank1`,`aa`.`arus_N_jurusank1` AS `arus_N_jurusank1`,`aa`.`teg_RN_jurusank1` AS `teg_RN_jurusank1`,`aa`.`teg_SN_jurusank1` AS `teg_SN_jurusank1`,`aa`.`teg_TN_jurusank1` AS `teg_TN_jurusank1`,`aa`.`teg_RS_jurusank1` AS `teg_RS_jurusank1`,`aa`.`teg_RT_jurusank1` AS `teg_RT_jurusank1`,`aa`.`teg_ST_jurusank1` AS `teg_ST_jurusank1`,`aa`.`id_jurusank2` AS `id_jurusank2`,`aa`.`arus_R_jurusank2` AS `arus_R_jurusank2`,`aa`.`arus_S_jurusank2` AS `arus_S_jurusank2`,`aa`.`arus_T_jurusank2` AS `arus_T_jurusank2`,`aa`.`arus_N_jurusank2` AS `arus_N_jurusank2`,`aa`.`teg_RN_jurusank2` AS `teg_RN_jurusank2`,`aa`.`teg_SN_jurusank2` AS `teg_SN_jurusank2`,`aa`.`teg_TN_jurusank2` AS `teg_TN_jurusank2`,`aa`.`teg_RS_jurusank2` AS `teg_RS_jurusank2`,`aa`.`teg_RT_jurusank2` AS `teg_RT_jurusank2`,`aa`.`teg_ST_jurusank2` AS `teg_ST_jurusank2` from (`ukurgardu_tb` `aa` join `datagardu_tb` `bb` on((`aa`.`no_gardu` = `bb`.`no_gardu`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_ukurgardufix`
--
DROP TABLE IF EXISTS `v_rekap_ukurgardufix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_ukurgardufix`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,`bb`.`nama_gardu_induk` AS `nama_gardu_induk`,`cc`.`nama_penyulang` AS `nama_penyulang`,`aa`.`lokasi` AS `lokasi`,`aa`.`latitude` AS `latitude`,`aa`.`longitude` AS `longitude`,`aa`.`nama_petugas1` AS `nama_petugas1`,`aa`.`nama_petugas2` AS `nama_petugas2`,`aa`.`no_kontrak` AS `no_kontrak`,`aa`.`tgl_pengukuran` AS `tgl_pengukuran`,`aa`.`wkt_pengukuran` AS `wkt_pengukuran`,`aa`.`arus_R` AS `arus_R`,`aa`.`arus_S` AS `arus_S`,`aa`.`arus_T` AS `arus_T`,`aa`.`arus_N` AS `arus_N`,`aa`.`teg_RN` AS `teg_RN`,`aa`.`teg_SN` AS `teg_SN`,`aa`.`teg_TN` AS `teg_TN`,`aa`.`teg_RS` AS `teg_RS`,`aa`.`teg_RT` AS `teg_RT`,`aa`.`teg_ST` AS `teg_ST`,`aa`.`id_jurusan1` AS `id_jurusan1`,`aa`.`arus_R_jurusan1` AS `arus_R_jurusan1`,`aa`.`arus_S_jurusan1` AS `arus_S_jurusan1`,`aa`.`arus_T_jurusan1` AS `arus_T_jurusan1`,`aa`.`arus_N_jurusan1` AS `arus_N_jurusan1`,`aa`.`teg_RN_jurusan1` AS `teg_RN_jurusan1`,`aa`.`teg_SN_jurusan1` AS `teg_SN_jurusan1`,`aa`.`teg_TN_jurusan1` AS `teg_TN_jurusan1`,`aa`.`teg_RS_jurusan1` AS `teg_RS_jurusan1`,`aa`.`teg_RT_jurusan1` AS `teg_RT_jurusan1`,`aa`.`teg_ST_jurusan1` AS `teg_ST_jurusan1`,`aa`.`id_jurusan2` AS `id_jurusan2`,`aa`.`arus_R_jurusan2` AS `arus_R_jurusan2`,`aa`.`arus_S_jurusan2` AS `arus_S_jurusan2`,`aa`.`arus_T_jurusan2` AS `arus_T_jurusan2`,`aa`.`arus_N_jurusan2` AS `arus_N_jurusan2`,`aa`.`teg_RN_jurusan2` AS `teg_RN_jurusan2`,`aa`.`teg_SN_jurusan2` AS `teg_SN_jurusan2`,`aa`.`teg_TN_jurusan2` AS `teg_TN_jurusan2`,`aa`.`teg_RS_jurusan2` AS `teg_RS_jurusan2`,`aa`.`teg_RT_jurusan2` AS `teg_RT_jurusan2`,`aa`.`teg_ST_jurusan2` AS `teg_ST_jurusan2`,`aa`.`id_jurusan3` AS `id_jurusan3`,`aa`.`arus_R_jurusan3` AS `arus_R_jurusan3`,`aa`.`arus_S_jurusan3` AS `arus_S_jurusan3`,`aa`.`arus_T_jurusan3` AS `arus_T_jurusan3`,`aa`.`arus_N_jurusan3` AS `arus_N_jurusan3`,`aa`.`teg_RN_jurusan3` AS `teg_RN_jurusan3`,`aa`.`teg_SN_jurusan3` AS `teg_SN_jurusan3`,`aa`.`teg_TN_jurusan3` AS `teg_TN_jurusan3`,`aa`.`teg_RS_jurusan3` AS `teg_RS_jurusan3`,`aa`.`teg_RT_jurusan3` AS `teg_RT_jurusan3`,`aa`.`teg_ST_jurusan3` AS `teg_ST_jurusan3`,`aa`.`id_jurusan4` AS `id_jurusan4`,`aa`.`arus_R_jurusan4` AS `arus_R_jurusan4`,`aa`.`arus_S_jurusan4` AS `arus_S_jurusan4`,`aa`.`arus_T_jurusan4` AS `arus_T_jurusan4`,`aa`.`arus_N_jurusan4` AS `arus_N_jurusan4`,`aa`.`teg_RN_jurusan4` AS `teg_RN_jurusan4`,`aa`.`teg_SN_jurusan4` AS `teg_SN_jurusan4`,`aa`.`teg_TN_jurusan4` AS `teg_TN_jurusan4`,`aa`.`teg_RS_jurusan4` AS `teg_RS_jurusan4`,`aa`.`teg_RT_jurusan4` AS `teg_RT_jurusan4`,`aa`.`teg_ST_jurusan4` AS `teg_ST_jurusan4`,`aa`.`id_jurusank1` AS `id_jurusank1`,`aa`.`arus_R_jurusank1` AS `arus_R_jurusank1`,`aa`.`arus_S_jurusank1` AS `arus_S_jurusank1`,`aa`.`arus_T_jurusank1` AS `arus_T_jurusank1`,`aa`.`arus_N_jurusank1` AS `arus_N_jurusank1`,`aa`.`teg_RN_jurusank1` AS `teg_RN_jurusank1`,`aa`.`teg_SN_jurusank1` AS `teg_SN_jurusank1`,`aa`.`teg_TN_jurusank1` AS `teg_TN_jurusank1`,`aa`.`teg_RS_jurusank1` AS `teg_RS_jurusank1`,`aa`.`teg_RT_jurusank1` AS `teg_RT_jurusank1`,`aa`.`teg_ST_jurusank1` AS `teg_ST_jurusank1`,`aa`.`id_jurusank2` AS `id_jurusank2`,`aa`.`arus_R_jurusank2` AS `arus_R_jurusank2`,`aa`.`arus_S_jurusank2` AS `arus_S_jurusank2`,`aa`.`arus_T_jurusank2` AS `arus_T_jurusank2`,`aa`.`arus_N_jurusank2` AS `arus_N_jurusank2`,`aa`.`teg_RN_jurusank2` AS `teg_RN_jurusank2`,`aa`.`teg_SN_jurusank2` AS `teg_SN_jurusank2`,`aa`.`teg_TN_jurusank2` AS `teg_TN_jurusank2`,`aa`.`teg_RS_jurusank2` AS `teg_RS_jurusank2`,`aa`.`teg_RT_jurusank2` AS `teg_RT_jurusank2`,`aa`.`teg_ST_jurusank2` AS `teg_ST_jurusank2` from ((`v_rekap_ukurgardu` `aa` join `datagarduinduk_tb` `bb` on((`aa`.`id_tb_gardu_induk` = `bb`.`id_tb_gardu_induk`))) join `datagardupenyulang_tb` `cc` on((`aa`.`id_tb_gardu_penyulang` = `cc`.`id_tb_gardu_penyulang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stattujur1`
--
DROP TABLE IF EXISTS `v_stattujur1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stattujur1`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,(case when (((`aa`.`teg_RN_jurusan1` >= 160) and (`aa`.`teg_RN_jurusan1` < 198)) or ((`aa`.`teg_SN_jurusan1` >= 160) and (`aa`.`teg_SN_jurusan1` < 198)) or ((`aa`.`teg_TN_jurusan1` >= 160) and (`aa`.`teg_TN_jurusan1` < 198))) then 'Drop' when ((`aa`.`teg_RN_jurusan1` >= 198) or (`aa`.`teg_SN_jurusan1` >= 198) or (`aa`.`teg_TN_jurusan1` >= 198)) then 'Normal' else '' end) AS `Stat_TUJurusan1` from `ukurgardu_tb` `aa` ;

-- --------------------------------------------------------

--
-- Structure for view `v_stattujur2`
--
DROP TABLE IF EXISTS `v_stattujur2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stattujur2`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,(case when (((`aa`.`teg_RN_jurusan2` >= 160) and (`aa`.`teg_RN_jurusan2` < 198)) or ((`aa`.`teg_SN_jurusan2` >= 160) and (`aa`.`teg_SN_jurusan2` < 198)) or ((`aa`.`teg_TN_jurusan2` >= 160) and (`aa`.`teg_TN_jurusan2` < 198))) then 'Drop' when ((`aa`.`teg_RN_jurusan2` >= 198) or (`aa`.`teg_SN_jurusan2` >= 198) or (`aa`.`teg_TN_jurusan2` >= 198)) then 'Normal' else '' end) AS `Stat_TUJurusan2` from `ukurgardu_tb` `aa` ;

-- --------------------------------------------------------

--
-- Structure for view `v_stattujur3`
--
DROP TABLE IF EXISTS `v_stattujur3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stattujur3`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,(case when (((`aa`.`teg_RN_jurusan3` >= 160) and (`aa`.`teg_RN_jurusan3` < 198)) or ((`aa`.`teg_SN_jurusan3` >= 160) and (`aa`.`teg_SN_jurusan3` < 198)) or ((`aa`.`teg_TN_jurusan3` >= 160) and (`aa`.`teg_TN_jurusan3` < 198))) then 'Drop' when ((`aa`.`teg_RN_jurusan3` >= 198) or (`aa`.`teg_SN_jurusan3` >= 198) or (`aa`.`teg_TN_jurusan3` >= 198)) then 'Normal' else '' end) AS `Stat_TUJurusan3` from `ukurgardu_tb` `aa` ;

-- --------------------------------------------------------

--
-- Structure for view `v_stattujur4`
--
DROP TABLE IF EXISTS `v_stattujur4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stattujur4`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,(case when (((`aa`.`teg_RN_jurusan4` >= 160) and (`aa`.`teg_RN_jurusan4` < 198)) or ((`aa`.`teg_SN_jurusan4` >= 160) and (`aa`.`teg_SN_jurusan4` < 198)) or ((`aa`.`teg_TN_jurusan4` >= 160) and (`aa`.`teg_TN_jurusan4` < 198))) then 'Drop' when ((`aa`.`teg_RN_jurusan4` >= 198) or (`aa`.`teg_SN_jurusan4` >= 198) or (`aa`.`teg_TN_jurusan4` >= 198)) then 'Normal' else '' end) AS `Stat_TUJurusan4` from `ukurgardu_tb` `aa` ;

-- --------------------------------------------------------

--
-- Structure for view `v_stattujurk1`
--
DROP TABLE IF EXISTS `v_stattujurk1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stattujurk1`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,(case when (((`aa`.`teg_RN_jurusank1` >= 160) and (`aa`.`teg_RN_jurusank1` < 198)) or ((`aa`.`teg_SN_jurusank1` >= 160) and (`aa`.`teg_SN_jurusank1` < 198)) or ((`aa`.`teg_TN_jurusank1` >= 160) and (`aa`.`teg_TN_jurusank1` < 198))) then 'Drop' when ((`aa`.`teg_RN_jurusank1` >= 198) or (`aa`.`teg_SN_jurusank1` >= 198) or (`aa`.`teg_TN_jurusank1` >= 198)) then 'Normal' else '' end) AS `Stat_TUJurusank1` from `ukurgardu_tb` `aa` ;

-- --------------------------------------------------------

--
-- Structure for view `v_stattujurk2`
--
DROP TABLE IF EXISTS `v_stattujurk2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stattujurk2`  AS  select `aa`.`id_ukur_gardu` AS `id_ukur_gardu`,`aa`.`no_gardu` AS `no_gardu`,(case when (((`aa`.`teg_RN_jurusank2` >= 160) and (`aa`.`teg_RN_jurusank2` < 198)) or ((`aa`.`teg_SN_jurusank2` >= 160) and (`aa`.`teg_SN_jurusank2` < 198)) or ((`aa`.`teg_TN_jurusank2` >= 160) and (`aa`.`teg_TN_jurusank2` < 198))) then 'Drop' when ((`aa`.`teg_RN_jurusank2` >= 198) or (`aa`.`teg_SN_jurusank2` >= 198) or (`aa`.`teg_TN_jurusank2` >= 198)) then 'Normal' else '' end) AS `Stat_TUJurusank2` from `ukurgardu_tb` `aa` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datagarduinduk_tb`
--
ALTER TABLE `datagarduinduk_tb`
  ADD PRIMARY KEY (`id_tb_gardu_induk`);

--
-- Indexes for table `datagardupenyulang_tb`
--
ALTER TABLE `datagardupenyulang_tb`
  ADD PRIMARY KEY (`id_tb_gardu_penyulang`);

--
-- Indexes for table `datagardu_tb`
--
ALTER TABLE `datagardu_tb`
  ADD PRIMARY KEY (`no_gardu`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `ukurgardu_tb`
--
ALTER TABLE `ukurgardu_tb`
  ADD PRIMARY KEY (`id_ukur_gardu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ukurgardu_tb`
--
ALTER TABLE `ukurgardu_tb`
  MODIFY `id_ukur_gardu` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
