-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 10:26 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bos`
--

CREATE TABLE IF NOT EXISTS `bos` (
  `id_bos` int(11) NOT NULL,
  `id_siswa_kelas` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cek_smester`
--
CREATE TABLE IF NOT EXISTS `cek_smester` (
`idtahun` int(10)
,`nama_smester` varchar(30)
,`awal_smester` date
,`akhir_smester` date
,`jenis_smester` varchar(20)
,`tahun_pelajaran` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idkelas` int(10) NOT NULL COMMENT 'id kode kelas',
  `namakelas` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namakelas`) VALUES
(1, 'Array'),
(2, 'X5'),
(3, 'X6'),
(4, 'X7'),
(5, 'XI IPA 1'),
(6, 'XI IPA 2'),
(7, 'XI IPS 1'),
(8, 'XI IPS 2');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE IF NOT EXISTS `komponen` (
  `idkomponen` int(10) NOT NULL,
  `nama_komp` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponen_setting`
--

CREATE TABLE IF NOT EXISTS `komponen_setting` (
  `idkompsetting` int(10) NOT NULL,
  `idkomp` int(10) NOT NULL,
  `iuran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `idsiswa` int(10) NOT NULL COMMENT 'id table',
  `nim` int(20) NOT NULL COMMENT 'nim siswa',
  `namasiswa` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tmlahir` varchar(11) NOT NULL COMMENT 'tempat lahir',
  `tgllahir` date NOT NULL COMMENT 'tanggal lahir',
  `idtahun` varchar(4) NOT NULL,
  `namawali` varchar(50) NOT NULL COMMENT 'nama wali'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nim`, `namasiswa`, `gender`, `alamat`, `tmlahir`, `tgllahir`, `idtahun`, `namawali`) VALUES
(1, 327981, 'rizal', 'L', 'Yogyakarta', '0', '1994-02-11', '5', 'vidi'),
(3, 34567, 'jono', 'L', 'Sleman', '0', '1994-02-12', '5', 'vidi'),
(4, 21567, 'Dono', 'L', 'Gunung Kidul', '0', '1994-03-15', '5', 'aldi'),
(5, 190867, 'Amin', 'L', 'Bantul', '0', '1994-02-12', '5', 'Dhoni'),
(6, 31350, 'Jeny', 'P', 'Kaliurang', '0', '1994-02-11', '5', 'Deni'),
(7, 56789, 'Ria', 'P', 'Paris', '0', '1994-03-15', '5', 'Hadi'),
(8, 27890, 'Riki', 'L', 'Garut', 'Bandung', '1994-05-12', '6', 'Toni'),
(9, 37098, 'Rio', 'L', 'Magelang', '0', '1994-02-11', '5', 'Bambang'),
(12, 14567, 'Rere', 'P', 'Ponorogo', 'Madiun', '2015-09-07', '', 'Prapto');

-- --------------------------------------------------------

--
-- Stand-in structure for view `siswa_belum_dapat_kelas`
--
CREATE TABLE IF NOT EXISTS `siswa_belum_dapat_kelas` (
`idsiswa` int(10)
,`nim` int(20)
,`namasiswa` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kelas`
--

CREATE TABLE IF NOT EXISTS `siswa_kelas` (
  `id_siswa_kelas` int(10) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `idkelas` int(10) NOT NULL,
  `idtahun` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id_siswa_kelas`, `idsiswa`, `idkelas`, `idtahun`) VALUES
(9, 8, 5, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `siswa_sudah_punya_kelas`
--
CREATE TABLE IF NOT EXISTS `siswa_sudah_punya_kelas` (
`idsiswa` int(10)
,`nim` int(20)
,`namasiswa` varchar(50)
,`namakelas` varchar(10)
,`alamat` varchar(30)
,`namawali` varchar(50)
,`gender` enum('L','P')
,`tmlahir` varchar(11)
,`tgllahir` date
,`tahun_pelajaran` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE IF NOT EXISTS `spp` (
  `idspp` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `transaksi` varchar(20) NOT NULL,
  `idtahun` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `sppstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spp_detail`
--

CREATE TABLE IF NOT EXISTS `spp_detail` (
  `idsppdetail` int(10) NOT NULL,
  `idspp` int(10) NOT NULL,
  `idkomp` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spp_setting`
--

CREATE TABLE IF NOT EXISTS `spp_setting` (
  `idsppsetting` int(10) NOT NULL,
  `idkelas` int(10) NOT NULL,
  `idkomponen` int(10) NOT NULL,
  `idtahun` int(10) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
  `idtahun` int(10) NOT NULL,
  `nama_smester` varchar(30) NOT NULL,
  `awal_smester` date NOT NULL,
  `akhir_smester` date NOT NULL,
  `jenis_smester` varchar(20) NOT NULL,
  `tahun_pelajaran` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`idtahun`, `nama_smester`, `awal_smester`, `akhir_smester`, `jenis_smester`, `tahun_pelajaran`) VALUES
(1, 'Genap', '2015-09-04', '2016-04-01', 'Genap', '2015'),
(2, 'Ganjil', '2015-09-04', '2016-05-07', 'Ganjil', '2015'),
(3, 'Ganjil', '2015-09-04', '2016-02-04', 'Ganjil', '2015/2016'),
(4, 'Genap', '2015-09-04', '2016-04-04', 'Genap', '2015/2016'),
(5, 'Genap', '2016-07-01', '2017-07-01', 'Genap', '2016/2017'),
(6, 'Ganjil', '2017-07-01', '2018-07-01', 'Ganjil', '2017/2018');

-- --------------------------------------------------------

--
-- Structure for view `cek_smester`
--
DROP TABLE IF EXISTS `cek_smester`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cek_smester` AS select `tahun`.`idtahun` AS `idtahun`,`tahun`.`nama_smester` AS `nama_smester`,`tahun`.`awal_smester` AS `awal_smester`,`tahun`.`akhir_smester` AS `akhir_smester`,`tahun`.`jenis_smester` AS `jenis_smester`,`tahun`.`tahun_pelajaran` AS `tahun_pelajaran` from `tahun` order by `tahun`.`idtahun` desc limit 1;

-- --------------------------------------------------------

--
-- Structure for view `siswa_belum_dapat_kelas`
--
DROP TABLE IF EXISTS `siswa_belum_dapat_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswa_belum_dapat_kelas` AS select `siswa`.`idsiswa` AS `idsiswa`,`siswa`.`nim` AS `nim`,`siswa`.`namasiswa` AS `namasiswa` from `siswa` where (not(`siswa`.`idsiswa` in (select `siswa_kelas`.`idsiswa` from (`siswa_kelas` join `cek_smester`) where (`siswa_kelas`.`idtahun` = `cek_smester`.`idtahun`))));

-- --------------------------------------------------------

--
-- Structure for view `siswa_sudah_punya_kelas`
--
DROP TABLE IF EXISTS `siswa_sudah_punya_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswa_sudah_punya_kelas` AS select `siswa`.`idsiswa` AS `idsiswa`,`siswa`.`nim` AS `nim`,`siswa`.`namasiswa` AS `namasiswa`,`kelas`.`namakelas` AS `namakelas`,`siswa`.`alamat` AS `alamat`,`siswa`.`namawali` AS `namawali`,`siswa`.`gender` AS `gender`,`siswa`.`tmlahir` AS `tmlahir`,`siswa`.`tgllahir` AS `tgllahir`,`tahun`.`tahun_pelajaran` AS `tahun_pelajaran` from (((`siswa` join `kelas`) join `siswa_kelas`) join `tahun`) where ((`siswa_kelas`.`idsiswa` = `siswa`.`idsiswa`) and (`siswa_kelas`.`idkelas` = `kelas`.`idkelas`) and (`siswa_kelas`.`idtahun` = `tahun`.`idtahun`)) order by `tahun`.`tahun_pelajaran` desc;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bos`
--
ALTER TABLE `bos`
  ADD PRIMARY KEY (`id_bos`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`idkomponen`);

--
-- Indexes for table `komponen_setting`
--
ALTER TABLE `komponen_setting`
  ADD PRIMARY KEY (`idkompsetting`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indexes for table `spp_detail`
--
ALTER TABLE `spp_detail`
  ADD PRIMARY KEY (`idsppdetail`);

--
-- Indexes for table `spp_setting`
--
ALTER TABLE `spp_setting`
  ADD PRIMARY KEY (`idsppsetting`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`idtahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bos`
--
ALTER TABLE `bos`
  MODIFY `id_bos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id kode kelas',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `idkomponen` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komponen_setting`
--
ALTER TABLE `komponen_setting`
  MODIFY `idkompsetting` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id table',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id_siswa_kelas` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spp_detail`
--
ALTER TABLE `spp_detail`
  MODIFY `idsppdetail` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spp_setting`
--
ALTER TABLE `spp_setting`
  MODIFY `idsppsetting` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `idtahun` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
