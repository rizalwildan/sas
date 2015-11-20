-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2015 at 07:29 PM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sas_ta`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `cek_tahun_pelajaran`
--
CREATE TABLE IF NOT EXISTS `cek_tahun_pelajaran` (
`id_tahun` int(10)
,`nama_tahun_pelajaran` varchar(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(10),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
`ID` int(10) unsigned NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `id_folder` int(11) NOT NULL DEFAULT '1',
  `readed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(10) NOT NULL COMMENT 'id kode kelas',
  `jenis_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `jenis_kelas`, `nama_kelas`) VALUES
(1, 1, 'X1'),
(2, 1, 'X2'),
(3, 1, 'X3'),
(4, 1, 'X4'),
(5, 1, 'X5'),
(6, 1, 'X6'),
(7, 1, 'X7'),
(8, 1, 'X8'),
(9, 1, 'X9'),
(10, 2, 'XI IPA 1'),
(11, 2, 'XI IPA 2'),
(12, 2, 'XI IPA 3'),
(13, 2, 'XI IPA 4'),
(14, 2, 'XI IPA 5'),
(15, 2, 'XI IPS 1'),
(16, 2, 'XI IPS 2'),
(17, 2, 'XI IPS 3'),
(18, 2, 'XI IPS 4'),
(19, 2, 'XI IPS 5'),
(20, 3, 'XII IPA 1'),
(21, 3, 'XII IPA 2'),
(22, 3, 'XII IPA 3'),
(23, 3, 'XII IPA 4'),
(24, 3, 'XII IPA 5'),
(25, 3, 'XII IPS 1'),
(26, 3, 'XII IPS 2'),
(27, 3, 'XII IPS 3'),
(28, 3, 'XII IPS 4'),
(29, 3, 'XII IPS 5');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_pembayaran`
--

CREATE TABLE IF NOT EXISTS `komponen_pembayaran` (
`id_komponen` int(10) NOT NULL,
  `nama_komponen` varchar(100) NOT NULL,
  `deskripsi_komponen` text NOT NULL,
  `iuran` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_pembayaran`
--

INSERT INTO `komponen_pembayaran` (`id_komponen`, `nama_komponen`, `deskripsi_komponen`, `iuran`) VALUES
(6, 'internet', 'biaya internet', 20000),
(13, 'iuran biasa', 'default', 10000),
(14, 'asdfghsdfg', 'dfbrb', 10000),
(15, 'huhuhahahsdhushuda', 'qwqwqw', 10000),
(18, 'Iuran Wisata', 'Iuran Wisata Ke Bali', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
`ID` int(10) unsigned NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES
('2015-11-18 16:20:40', '2015-11-18 16:20:40', '2015-11-18 16:20:40', NULL, '085793452', 'Default_No_Compression', NULL, -1, 'Putra/putri anda belum melakukan pembayaran pada periode ...', 94, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ' '),
('2015-11-18 16:20:40', '2015-11-18 16:20:40', '2015-11-18 16:20:40', NULL, '085793452', 'Default_No_Compression', NULL, -1, 'Putra/putri anda belum melakukan pembayaran pada periode ...', 93, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ' '),
('2015-11-18 16:20:40', '2015-11-18 16:20:40', '2015-11-18 16:20:40', NULL, '085793452', 'Default_No_Compression', NULL, -1, 'Putra/putri anda belum melakukan pembayaran pada periode ...', 91, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ' '),
('2015-11-18 16:20:40', '2015-11-18 16:20:40', '2015-11-18 16:20:40', NULL, '085793452', 'Default_No_Compression', NULL, -1, 'Putra/putri anda belum melakukan pembayaran pada periode ...', 92, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ' '),
('2015-11-18 16:20:40', '2015-11-18 16:20:40', '2015-11-18 16:20:40', NULL, '085793452', 'Default_No_Compression', NULL, -1, 'Putra/putri anda belum melakukan pembayaran pada periode ...', 89, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ' '),
('2015-11-18 16:20:40', '2015-11-18 16:20:40', '2015-11-18 16:20:40', NULL, '085793452', 'Default_No_Compression', NULL, -1, 'Putra/putri anda belum melakukan pembayaran pada periode ...', 90, 'false', -1, NULL, '0000-00-00 00:00:00', 'default', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) DEFAULT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('', '2015-02-21 11:32:09', '2015-02-21 11:23:31', '2015-02-21 11:32:19', 'yes', 'yes', '012345678901234', 'Gammu 1.24.92, Windows Server 2007 SP1, GCC 4.3, MinGW 3.15', 0, -1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  `id_folder` int(11) NOT NULL DEFAULT '3'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`id_siswa` int(10) NOT NULL COMMENT 'id table',
  `nis` int(20) NOT NULL COMMENT 'nim siswa',
  `nama_siswa` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tempat_lahir` varchar(11) NOT NULL COMMENT 'tempat lahir',
  `tgl_lahir` date NOT NULL COMMENT 'tanggal lahir',
  `no_hp_wali` varchar(30) NOT NULL,
  `nama_wali` varchar(50) NOT NULL COMMENT 'nama wali'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `gender`, `alamat`, `tempat_lahir`, `tgl_lahir`, `no_hp_wali`, `nama_wali`) VALUES
(1, 327981, 'rizal', 'L', 'Yogyakarta', '0', '1994-02-11', '085793452', 'vidi'),
(3, 34567, 'jono', 'L', 'Sleman', '0', '1994-02-12', '085793452', 'vidi'),
(4, 21567, 'Dono', 'L', 'Gunung Kidul', '0', '1994-03-15', '085793452', 'aldi'),
(5, 190867, 'Amin', 'L', 'Bantul', '0', '1994-02-12', '085793452', 'Dhoni'),
(6, 31350, 'Jeny', 'P', 'Kaliurang', '0', '1994-02-11', '085793452', 'Deni'),
(8, 27890, 'Riki A', 'L', 'Garut josss\r\n', 'Bandung', '1994-05-12', '085793452', 'Toni blank'),
(9, 37098, 'Rio', 'L', 'Magelang', '0', '1994-02-11', '085793452', 'Bambang'),
(12, 14567, 'Rere', 'P', 'Ponorogo', 'Madiun', '2015-09-07', '085793452', 'Prapto'),
(13, 34678, 'Reno', 'L', 'Gresik', 'Gresik', '2015-11-11', '085793452', 'Hadi');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kelas`
--

CREATE TABLE IF NOT EXISTS `siswa_kelas` (
`id_siswa_kelas` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id_siswa_kelas`, `id_siswa`, `id_kelas`, `id_tahun`) VALUES
(8, 6, 6, 6),
(9, 8, 5, 6),
(10, 1, 2, 6),
(11, 3, 1, 6),
(12, 5, 1, 6),
(13, 9, 1, 6),
(14, 13, 5, 6),
(15, 12, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE IF NOT EXISTS `spp` (
`id_spp` int(10) NOT NULL,
  `tgl_transaksi` varchar(15) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `id_tahun` varchar(11) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  `id_kelas` varchar(30) NOT NULL,
  `iduser` int(20) NOT NULL,
  `nominal_spp` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tgl_transaksi`, `periode`, `id_tahun`, `id_siswa`, `id_kelas`, `iduser`, `nominal_spp`) VALUES
(1, '12 Nov 2015', 'Juli', '6', 12, '6', 1, 30000),
(2, '12 Nov 2015', 'Juli', '6', 8, '5', 1, 30000),
(3, '17 Nov 2015', 'Juli', '6', 1, '2', 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `spp_setting`
--

CREATE TABLE IF NOT EXISTS `spp_setting` (
`id_spp_setting` int(10) NOT NULL,
  `jenis_kelas` int(10) NOT NULL,
  `id_komponen` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp_setting`
--

INSERT INTO `spp_setting` (`id_spp_setting`, `jenis_kelas`, `id_komponen`, `id_tahun`, `periode`) VALUES
(1, 1, 1, 6, 'juli'),
(2, 2, 1, 6, 'juli'),
(3, 2, 2, 6, 'juli'),
(4, 3, 2, 1, 'juli'),
(5, 3, 1, 1, 'juli'),
(6, 3, 6, 6, 'juli'),
(7, 1, 6, 6, 'Maret'),
(8, 1, 6, 6, 'Maret'),
(9, 1, 13, 6, 'Maret'),
(10, 3, 6, 6, 'Juni'),
(11, 3, 13, 6, 'Juni'),
(12, 3, 14, 6, 'Juni'),
(13, 3, 15, 6, 'Juni'),
(14, 3, 16, 6, 'Juni'),
(15, 1, 6, 6, 'Juli'),
(16, 1, 13, 6, 'Juli'),
(17, 2, 14, 6, 'Juli'),
(18, 2, 15, 6, 'Juli'),
(19, 2, 16, 6, 'Juli'),
(20, 1, 14, 6, 'Agustus'),
(21, 1, 15, 6, 'Agustus'),
(22, 1, 6, 6, 'Agustus');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_pelajaran` (
`id_tahun` int(10) NOT NULL,
  `nama_tahun_pelajaran` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id_tahun`, `nama_tahun_pelajaran`) VALUES
(1, '2015'),
(2, '2015'),
(3, '2015/2016'),
(4, '2015/2016'),
(5, '2016/2017'),
(6, '2017/2018');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`iduser` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `level`) VALUES
(1, 'root', 'root', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_komponenperkelas`
--
CREATE TABLE IF NOT EXISTS `view_komponenperkelas` (
`jenis_kelas` int(10)
,`nama_komponen` varchar(100)
,`iuran` int(10)
,`id_tahun` int(10)
,`nama_tahun_pelajaran` varchar(11)
,`periode` varchar(20)
,`id_spp_setting` int(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa_belum_dapat_kelas`
--
CREATE TABLE IF NOT EXISTS `view_siswa_belum_dapat_kelas` (
`id_siswa` int(10)
,`nis` int(20)
,`nama_siswa` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa_sudah_dapat_kelas`
--
CREATE TABLE IF NOT EXISTS `view_siswa_sudah_dapat_kelas` (
`id_siswa` int(10)
,`nis` int(20)
,`nama_siswa` varchar(50)
,`id_kelas` int(10)
,`jenis_kelas` int(2)
,`nama_kelas` varchar(10)
,`alamat` varchar(30)
,`nama_wali` varchar(50)
,`no_hp_wali` varchar(30)
,`gender` enum('L','P')
,`tempat_lahir` varchar(11)
,`tgl_lahir` date
,`nama_tahun_pelajaran` varchar(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_spp`
--
CREATE TABLE IF NOT EXISTS `view_spp` (
`id_spp` int(10)
,`id_siswa` int(10)
,`nis` int(20)
,`nama_siswa` varchar(50)
,`id_kelas` int(10)
,`nama_kelas` varchar(10)
,`periode` varchar(20)
,`nominal_spp` int(10)
,`id_tahun` int(10)
,`nama_tahun_pelajaran` varchar(11)
);
-- --------------------------------------------------------

--
-- Structure for view `cek_tahun_pelajaran`
--
DROP TABLE IF EXISTS `cek_tahun_pelajaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cek_tahun_pelajaran` AS select `tahun_pelajaran`.`id_tahun` AS `id_tahun`,`tahun_pelajaran`.`nama_tahun_pelajaran` AS `nama_tahun_pelajaran` from `tahun_pelajaran` order by `tahun_pelajaran`.`id_tahun` desc limit 1;

-- --------------------------------------------------------

--
-- Structure for view `view_komponenperkelas`
--
DROP TABLE IF EXISTS `view_komponenperkelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_komponenperkelas` AS select `spp_setting`.`jenis_kelas` AS `jenis_kelas`,`komponen_pembayaran`.`nama_komponen` AS `nama_komponen`,`komponen_pembayaran`.`iuran` AS `iuran`,`tahun_pelajaran`.`id_tahun` AS `id_tahun`,`tahun_pelajaran`.`nama_tahun_pelajaran` AS `nama_tahun_pelajaran`,`spp_setting`.`periode` AS `periode`,`spp_setting`.`id_spp_setting` AS `id_spp_setting` from ((`spp_setting` join `komponen_pembayaran`) join `tahun_pelajaran`) where ((`spp_setting`.`id_komponen` = `komponen_pembayaran`.`id_komponen`) and (`spp_setting`.`id_tahun` = `tahun_pelajaran`.`id_tahun`)) order by `spp_setting`.`jenis_kelas`;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa_belum_dapat_kelas`
--
DROP TABLE IF EXISTS `view_siswa_belum_dapat_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa_belum_dapat_kelas` AS select `siswa`.`id_siswa` AS `id_siswa`,`siswa`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa` from `siswa` where (not(`siswa`.`id_siswa` in (select `siswa_kelas`.`id_siswa` from (`siswa_kelas` join `cek_tahun_pelajaran`) where (`siswa_kelas`.`id_tahun` = `cek_tahun_pelajaran`.`id_tahun`))));

-- --------------------------------------------------------

--
-- Structure for view `view_siswa_sudah_dapat_kelas`
--
DROP TABLE IF EXISTS `view_siswa_sudah_dapat_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa_sudah_dapat_kelas` AS select `siswa`.`id_siswa` AS `id_siswa`,`siswa`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa`,`kelas`.`id_kelas` AS `id_kelas`,`kelas`.`jenis_kelas` AS `jenis_kelas`,`kelas`.`nama_kelas` AS `nama_kelas`,`siswa`.`alamat` AS `alamat`,`siswa`.`nama_wali` AS `nama_wali`,`siswa`.`no_hp_wali` AS `no_hp_wali`,`siswa`.`gender` AS `gender`,`siswa`.`tempat_lahir` AS `tempat_lahir`,`siswa`.`tgl_lahir` AS `tgl_lahir`,`tahun_pelajaran`.`nama_tahun_pelajaran` AS `nama_tahun_pelajaran` from (((`siswa` join `kelas`) join `siswa_kelas`) join `tahun_pelajaran`) where ((`siswa_kelas`.`id_siswa` = `siswa`.`id_siswa`) and (`siswa_kelas`.`id_kelas` = `kelas`.`id_kelas`) and (`siswa_kelas`.`id_tahun` = `tahun_pelajaran`.`id_tahun`)) order by `tahun_pelajaran`.`nama_tahun_pelajaran` desc;

-- --------------------------------------------------------

--
-- Structure for view `view_spp`
--
DROP TABLE IF EXISTS `view_spp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_spp` AS select `spp`.`id_spp` AS `id_spp`,`siswa`.`id_siswa` AS `id_siswa`,`siswa`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa`,`kelas`.`id_kelas` AS `id_kelas`,`kelas`.`nama_kelas` AS `nama_kelas`,`spp`.`periode` AS `periode`,`spp`.`nominal_spp` AS `nominal_spp`,`tahun_pelajaran`.`id_tahun` AS `id_tahun`,`tahun_pelajaran`.`nama_tahun_pelajaran` AS `nama_tahun_pelajaran` from (((`spp` join `siswa`) join `tahun_pelajaran`) join `kelas`) where ((`spp`.`id_siswa` = `siswa`.`id_siswa`) and (`spp`.`id_kelas` = `kelas`.`id_kelas`) and (`spp`.`id_tahun` = `tahun_pelajaran`.`id_tahun`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komponen_pembayaran`
--
ALTER TABLE `komponen_pembayaran`
 ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
 ADD PRIMARY KEY (`ID`), ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`), ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
 ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
 ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
 ADD PRIMARY KEY (`ID`,`SequencePosition`), ADD KEY `sentitems_date` (`DeliveryDateTime`), ADD KEY `sentitems_tpmr` (`TPMR`), ADD KEY `sentitems_dest` (`DestinationNumber`), ADD KEY `sentitems_sender` (`SenderID`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`id_siswa`), ADD UNIQUE KEY `nim` (`nis`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
 ADD PRIMARY KEY (`id_siswa_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
 ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `spp_setting`
--
ALTER TABLE `spp_setting`
 ADD PRIMARY KEY (`id_spp_setting`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
 ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id kode kelas',AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `komponen_pembayaran`
--
ALTER TABLE `komponen_pembayaran`
MODIFY `id_komponen` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id table',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
MODIFY `id_siswa_kelas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
MODIFY `id_spp` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `spp_setting`
--
ALTER TABLE `spp_setting`
MODIFY `id_spp_setting` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
MODIFY `id_tahun` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
