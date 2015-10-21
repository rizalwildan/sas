-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2015 at 10:02 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bos`
--

CREATE TABLE IF NOT EXISTS `bos` (
  `id_bos` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_kelas` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_bos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cek_smester`
--
CREATE TABLE IF NOT EXISTS `cek_smester` (
`idtahun` int(10)
,`awal_tahun_pelajaran` date
,`akhir_tahun_pelajaran` date
,`tahun_pelajaran` varchar(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idkelas` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id kode kelas',
  `jenis_kelas` int(2) NOT NULL,
  `namakelas` varchar(10) NOT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `jenis_kelas`, `namakelas`) VALUES
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
-- Table structure for table `komponen`
--

CREATE TABLE IF NOT EXISTS `komponen` (
  `idkomponen` int(10) NOT NULL AUTO_INCREMENT,
  `nama_komp` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `iuran` int(10) NOT NULL,
  PRIMARY KEY (`idkomponen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`idkomponen`, `nama_komp`, `deskripsi`, `iuran`) VALUES
(6, 'internet', 'biaya internet', 20000),
(13, 'iuran biasa', 'default', 10),
(14, 'asdfghsdfg', 'dfbrb', 10000),
(15, 'huhuhahahsdhushuda', 'qwqwqw', 10000),
(16, 'asd', 'asdsasdsasd', 10),
(17, 'komputer', 'komputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\ndomputer yang digunakan untuk keperluan belajar mengajar di dalamm lab maupun yang ada di halaman sekolah   skldhaslfjbwksjdfbsld\nvsdvsodjfbvlksrdg\nvrsdg\nvs\ndgv\ndfb\nrsdhfvdjfcvs\ndvdf\ncv\ndfcb\nd\n ', 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_setting`
--

CREATE TABLE IF NOT EXISTS `komponen_setting` (
  `idkompsetting` int(10) NOT NULL AUTO_INCREMENT,
  `idkomponen` int(10) NOT NULL,
  `iuran` int(10) NOT NULL,
  PRIMARY KEY (`idkompsetting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `komponen_setting`
--

INSERT INTO `komponen_setting` (`idkompsetting`, `idkomponen`, `iuran`) VALUES
(1, 1, 200000),
(2, 2, 40000),
(3, 4, 30000),
(4, 5, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `idlevel` int(10) NOT NULL,
  `namalevel` varchar(20) NOT NULL,
  PRIMARY KEY (`idlevel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idlevel`, `namalevel`) VALUES
(1, 'root'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `idsiswa` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id table',
  `nim` int(20) NOT NULL COMMENT 'nim siswa',
  `namasiswa` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tmlahir` varchar(11) NOT NULL COMMENT 'tempat lahir',
  `tgllahir` date NOT NULL COMMENT 'tanggal lahir',
  `idtahun` varchar(4) NOT NULL,
  `namawali` varchar(50) NOT NULL COMMENT 'nama wali',
  PRIMARY KEY (`idsiswa`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(8, 27890, 'Riki', '', 'Garut josss\r\n', 'Bandung', '1994-05-12', '', 'Toni blank'),
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
  `id_siswa_kelas` int(10) NOT NULL AUTO_INCREMENT,
  `idsiswa` int(10) NOT NULL,
  `idkelas` int(10) NOT NULL,
  `idtahun` int(10) NOT NULL,
  PRIMARY KEY (`id_siswa_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id_siswa_kelas`, `idsiswa`, `idkelas`, `idtahun`) VALUES
(8, 6, 6, 6),
(9, 8, 5, 6),
(10, 1, 2, 6),
(11, 3, 1, 6),
(12, 5, 1, 6),
(13, 9, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE IF NOT EXISTS `spp` (
  `idspp` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(15) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `tahun` varchar(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `jeniskelas` int(2) NOT NULL,
  `nominalspp` int(10) NOT NULL,
  `danabos` int(10) NOT NULL,
  `sppstatus` varchar(50) NOT NULL,
  PRIMARY KEY (`idspp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `tanggal`, `periode`, `tahun`, `nim`, `namasiswa`, `jeniskelas`, `nominalspp`, `danabos`, `sppstatus`) VALUES
(5, '21 Oct 2015', 'Juli', '2017/2018', 27890, 'Riki', 1, 50, 20060, 'lunas'),
(6, '21 Oct 2015', 'Maret', '2017/2018', 27890, 'Riki', 1, 30, 40040, 'lunas'),
(7, '21 Oct 2015', 'Juli', '2017/2018', 31350, 'Jeny', 1, 70, 20080, 'lunas'),
(8, '21 Oct 2015', 'Maret', '2017/2018', 31350, 'Jeny', 1, 30, 40040, 'lunas'),
(12, '21 Oct 2015', 'Juli', '2017/2018', 37098, 'Rio', 1, 20010, 0, 'lunas'),
(13, '21 Oct 2015', 'Juli', '2017/2018', 190867, 'Amin', 1, 70, 20080, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `spp_detail`
--

CREATE TABLE IF NOT EXISTS `spp_detail` (
  `idsppdetail` int(10) NOT NULL AUTO_INCREMENT,
  `idspp` int(10) NOT NULL,
  `idsppsetting` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`idsppdetail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `spp_setting`
--

CREATE TABLE IF NOT EXISTS `spp_setting` (
  `idsppsetting` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_kelas` int(10) NOT NULL,
  `idkomponen` int(10) NOT NULL,
  `idtahun` int(10) NOT NULL,
  `periode` varchar(20) NOT NULL,
  PRIMARY KEY (`idsppsetting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `spp_setting`
--

INSERT INTO `spp_setting` (`idsppsetting`, `jenis_kelas`, `idkomponen`, `idtahun`, `periode`) VALUES
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
(19, 2, 16, 6, 'Juli');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
  `idtahun` int(10) NOT NULL AUTO_INCREMENT,
  `awal_tahun_pelajaran` date NOT NULL,
  `akhir_tahun_pelajaran` date NOT NULL,
  `tahun_pelajaran` varchar(11) NOT NULL,
  PRIMARY KEY (`idtahun`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`idtahun`, `awal_tahun_pelajaran`, `akhir_tahun_pelajaran`, `tahun_pelajaran`) VALUES
(1, '2015-09-04', '2016-04-01', '2015'),
(2, '2015-09-04', '2016-05-07', '2015'),
(3, '2015-09-04', '2016-02-04', '2015/2016'),
(4, '2015-09-04', '2016-04-04', '2015/2016'),
(5, '2016-07-01', '2017-07-01', '2016/2017'),
(6, '2017-07-01', '2018-07-01', '2017/2018');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tampil_user`
--
CREATE TABLE IF NOT EXISTS `tampil_user` (
`iduser` int(10)
,`username` varchar(30)
,`password` varchar(30)
,`namalevel` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `idlevel` int(10) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `idlevel`) VALUES
(1, 'root', 'root', 1),
(2, 'admin', 'admin', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_komponenperkelas`
--
CREATE TABLE IF NOT EXISTS `view_komponenperkelas` (
`jenis_kelas` int(10)
,`nama_komp` varchar(100)
,`iuran` int(10)
,`tahun_pelajaran` varchar(11)
,`periode` varchar(20)
,`idsppsetting` int(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa_sudah_punya_kelas`
--
CREATE TABLE IF NOT EXISTS `view_siswa_sudah_punya_kelas` (
`idsiswa` int(10)
,`nim` int(20)
,`namasiswa` varchar(50)
,`namakelas` varchar(10)
,`jenis_kelas` int(2)
,`alamat` varchar(30)
,`namawali` varchar(50)
,`gender` enum('L','P')
,`tmlahir` varchar(11)
,`tgllahir` date
,`tahun_pelajaran` varchar(11)
);
-- --------------------------------------------------------

--
-- Structure for view `cek_smester`
--
DROP TABLE IF EXISTS `cek_smester`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cek_smester` AS select `tahun`.`idtahun` AS `idtahun`,`tahun`.`awal_tahun_pelajaran` AS `awal_tahun_pelajaran`,`tahun`.`akhir_tahun_pelajaran` AS `akhir_tahun_pelajaran`,`tahun`.`tahun_pelajaran` AS `tahun_pelajaran` from `tahun` order by `tahun`.`idtahun` desc limit 1;

-- --------------------------------------------------------

--
-- Structure for view `siswa_belum_dapat_kelas`
--
DROP TABLE IF EXISTS `siswa_belum_dapat_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswa_belum_dapat_kelas` AS select `siswa`.`idsiswa` AS `idsiswa`,`siswa`.`nim` AS `nim`,`siswa`.`namasiswa` AS `namasiswa` from `siswa` where (not(`siswa`.`idsiswa` in (select `siswa_kelas`.`idsiswa` from (`siswa_kelas` join `cek_smester`) where (`siswa_kelas`.`idtahun` = `cek_smester`.`idtahun`))));

-- --------------------------------------------------------

--
-- Structure for view `tampil_user`
--
DROP TABLE IF EXISTS `tampil_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampil_user` AS select `user`.`iduser` AS `iduser`,`user`.`username` AS `username`,`user`.`password` AS `password`,`level`.`namalevel` AS `namalevel` from (`user` join `level`) where (`user`.`idlevel` = `level`.`idlevel`);

-- --------------------------------------------------------

--
-- Structure for view `view_komponenperkelas`
--
DROP TABLE IF EXISTS `view_komponenperkelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_komponenperkelas` AS select `spp_setting`.`jenis_kelas` AS `jenis_kelas`,`komponen`.`nama_komp` AS `nama_komp`,`komponen`.`iuran` AS `iuran`,`tahun`.`tahun_pelajaran` AS `tahun_pelajaran`,`spp_setting`.`periode` AS `periode`,`spp_setting`.`idsppsetting` AS `idsppsetting` from ((`spp_setting` join `komponen`) join `tahun`) where ((`spp_setting`.`idkomponen` = `komponen`.`idkomponen`) and (`spp_setting`.`idtahun` = `tahun`.`idtahun`)) order by `spp_setting`.`jenis_kelas`;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa_sudah_punya_kelas`
--
DROP TABLE IF EXISTS `view_siswa_sudah_punya_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa_sudah_punya_kelas` AS select `siswa`.`idsiswa` AS `idsiswa`,`siswa`.`nim` AS `nim`,`siswa`.`namasiswa` AS `namasiswa`,`kelas`.`namakelas` AS `namakelas`,`kelas`.`jenis_kelas` AS `jenis_kelas`,`siswa`.`alamat` AS `alamat`,`siswa`.`namawali` AS `namawali`,`siswa`.`gender` AS `gender`,`siswa`.`tmlahir` AS `tmlahir`,`siswa`.`tgllahir` AS `tgllahir`,`tahun`.`tahun_pelajaran` AS `tahun_pelajaran` from (((`siswa` join `kelas`) join `siswa_kelas`) join `tahun`) where ((`siswa_kelas`.`idsiswa` = `siswa`.`idsiswa`) and (`siswa_kelas`.`idkelas` = `kelas`.`idkelas`) and (`siswa_kelas`.`idtahun` = `tahun`.`idtahun`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
