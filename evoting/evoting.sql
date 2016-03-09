-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2015 at 09:13 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `evo_candidates`
--

CREATE TABLE IF NOT EXISTS `evo_candidates` (
  `id_candidate` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `place` char(30) NOT NULL,
  `birth_day` date NOT NULL,
  `path_foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_candidate`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `evo_candidates`
--

INSERT INTO `evo_candidates` (`id_candidate`, `name`, `address`, `place`, `birth_day`, `path_foto`) VALUES
(1, 'Hedra Wangsa', 'Jl. Kusuma Bangsa', 'Santa Cruz', '1970-09-20', 'resized5.jpg'),
(2, 'Susi Suanti', 'Jl. Keramat Jati No. 99, Jakarta', 'Malang', '1980-10-28', 'resized3.jpg'),
(3, 'Sukrono Marito', 'Jl. Darma Wangsa No. 1, Surabaya', 'Surabaya', '1960-02-15', 'resized4.jpg'),
(4, 'Azizun Hakim', 'Jl. Teratai No. 999, Bangil, Pasuruan', 'Pasuruan', '1991-02-24', 'resized1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `evo_regionals`
--

CREATE TABLE IF NOT EXISTS `evo_regionals` (
  `id_regional` int(11) NOT NULL AUTO_INCREMENT,
  `regionalname` char(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id_regional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `evo_regionals`
--

INSERT INTO `evo_regionals` (`id_regional`, `regionalname`, `description`) VALUES
(1, 'Jawa Timur', 'Provinsi Di Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `evo_results`
--

CREATE TABLE IF NOT EXISTS `evo_results` (
  `id_results` int(11) NOT NULL AUTO_INCREMENT,
  `id_candidate` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_results`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `evo_results`
--

INSERT INTO `evo_results` (`id_results`, `id_candidate`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `evo_settings`
--

CREATE TABLE IF NOT EXISTS `evo_settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `key` char(20) NOT NULL,
  `value` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `evo_settings`
--

INSERT INTO `evo_settings` (`id_setting`, `name`, `key`, `value`, `id_user`) VALUES
(1, 'Evo Name', 'evoting_name', 'SELAMAT DATANG DI PILPRES 2014', 0),
(2, 'Evo Card Name', 'card_name', 'Pilpres 2014', 0);

-- --------------------------------------------------------

--
-- Table structure for table `evo_users`
--

CREATE TABLE IF NOT EXISTS `evo_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` char(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` char(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `level` enum('Administrator','Crew') NOT NULL,
  `date_create` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `evo_users`
--

INSERT INTO `evo_users` (`id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `username`, `password`, `level`, `date_create`, `last_login`) VALUES
(1, 'Aji Prastiya', 'Jl. Cendrawasih No. 529 Arjosari, Malang', 'Malang', '1993-12-06', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', '2015-03-12 11:56:16', '2015-03-12 11:56:16'),
(2, 'Rudian Syah', 'Jl. Teluk Cendrawasih No. 199, Arjosari Malang', 'Santa Cruz', '1999-02-03', 'moderator', '827ccb0eea8a706c4c34a16891f84e7b', 'Crew', '2015-03-12 11:56:16', '2015-03-12 11:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `evo_voters`
--

CREATE TABLE IF NOT EXISTS `evo_voters` (
  `id_voter` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `place` char(30) NOT NULL,
  `birth_day` date NOT NULL,
  `religion` char(15) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `path_photo` varchar(100) NOT NULL,
  `hash_qr` text NOT NULL,
  `data_finger` char(8) NOT NULL,
  `is_reg` enum('false','true') NOT NULL DEFAULT 'false',
  `is_vote` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id_voter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `evo_voters`
--

INSERT INTO `evo_voters` (`id_voter`, `name`, `address`, `place`, `birth_day`, `religion`, `id_regional`, `path_photo`, `hash_qr`, `data_finger`, `is_reg`, `is_vote`) VALUES
(1, 'Nefri Rahmanda', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-vc.jpg', '%1ui/%1u1/%i11/%i111/%iu1/%iu1/%iu1/%iuuu/%1uu/%iii/%iu1/%1u1u/%u1i/%i1i/%iui/%1i1u/%u1i/%i11/%111/%uiu1/%iii/%iui/%ui1/%1uuo/%1ui/%1u1/%1i1/%uiu1/%u1u/%uiu/%u11/%ui1u', '1uuu1o1u', 'true', 'true'),
(2, 'Indra Utama', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-prof.jpg', '%i11/%1uu/%1i1/%iu11/%u1i/%1uu/%iuu/%iiiu/%u1u/%iui/%ui1/%i11u/%1u1/%iui/%i11/%1uiu/%i1i/%i1i/%iuu/%uiu1/%i11/%u1u/%1u1/%uiuo/%uiu/%1i1/%i1i/%u1uu/%u1u/%1ui/%iii/%u11u', '1uuu1ouu', 'false', 'false'),
(3, 'Dhion Anggar', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-mpu2.jpg', '%ui1/%1uu/%u11/%1u11/%ui1/%1ui/%iui/%1i1u/%1uu/%u11/%ui1/%uiuu/%uiu/%ui1/%i11/%iiiu/%u11/%i1i/%ui1/%i1i1/%u1u/%ui1/%iuu/%1uuo/%iui/%u11/%111/%ui11/%iuu/%1u1/%1i1/%iu1o', '1uuu1o1o', 'false', 'false'),
(4, 'Satrio Ari', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-DSCN1799.JPG', '%ui1/%i1i/%1uu/%1uu1/%1u1/%1ui/%u1i/%iu1u/%1uu/%iuu/%i11/%iuuu/%111/%u1u/%iui/%111u/%iu1/%1i1/%iuu/%u111/%i1i/%1u1/%u1u/%uiuo/%uiu/%1u1/%u1u/%i11u/%111/%u1i/%1ui/%1uu1', '1uuu1ou1', 'false', 'false'),
(5, 'Yuliano Oscar', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-kunci gitar ukulele.png', '%i11/%ui1/%u1u/%iui1/%u1u/%uiu/%iuu/%ui1u/%iui/%iuu/%iui/%i1iu/%u1u/%1ui/%ui1/%ui1u/%iuu/%i11/%1ui/%iuu1/%i1i/%iuu/%iii/%uiuo/%uiu/%u11/%i1i/%iuu1/%i11/%1u1/%i1i/%i111', '1uuu1o11', 'false', 'false'),
(6, 'Andias S', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-bg-edit.png', '%uiu/%1u1/%1u1/%iui1/%iui/%111/%i11/%iu1u/%uiu/%u1i/%iui/%iiiu/%111/%1ui/%1uu/%1i1u/%u1u/%111/%1i1/%uiu1/%iui/%i1i/%uiu/%i11o/%1i1/%u11/%u1i/%i11o/%uiu/%iii/%ui1/%111u', '1uuu1oou', 'false', 'false'),
(7, 'Aji Prastiya', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-visit1.jpg', '%ui1/%iu1/%u1i/%i1i1/%iu1/%111/%iui/%ui1u/%i1i/%u11/%u1i/%1u1u/%1uu/%u1u/%u11/%1i1u/%iui/%u1u/%1uu/%ui11/%u1u/%ui1/%iii/%iu1o/%111/%i11/%u1u/%1i1o/%111/%uiu/%1uu/%u1u1', '1uuu1oo1', 'false', 'false'),
(8, 'Rika Arsita', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-DSC_0029.jpg', '%111/%u1i/%1u1/%uiu1/%iuu/%u11/%iui/%1uuu/%1i1/%111/%i1i/%u1uu/%u11/%iu1/%iu1/%1i1u/%1i1/%u1i/%1u1/%i111/%1uu/%111/%u1u/%i11o/%uiu/%iui/%1i1/%iu1u/%u1u/%1uu/%uiu/%iiio', '1uuu1ouo', 'false', 'false'),
(9, 'Irul M', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-gview.png', '%iu1/%u1u/%uiu/%u1u1/%ui1/%iu1/%iu1/%i11u/%u1i/%1ui/%1u1/%i1iu/%i11/%ui1/%u1u/%iiiu/%1ui/%i1i/%iu1/%u1u1/%ui1/%uiu/%i11/%i1io/%u1i/%iuu/%u11/%i1io/%iuu/%iii/%iii/%u1io', '1uuu1ooo', 'true', 'true'),
(10, 'Rahmanda Bagus', 'Jl. Teluk Banyu Biru No. 31 Arjosari, Malang', 'Malang', '1992-01-01', 'Islam', 1, 'voter-i98.jpg', '%1i1/%u1i/%iui/%iui1/%1uu/%i1i/%u11/%1uuu/%1ui/%1uu/%u1i/%ui1u/%iui/%111/%ui1/%1uuu/%u11/%u1u/%iii/%1111/%iuu/%i11/%i1i/%uiuo/%i11/%iii/%u1u/%ui11/%ui1/%uiu/%i11/%i1iu', '1uuu1o1u', 'false', 'false'),
(11, 'User test', 'Jl.Testing aja', 'test', '1991-01-01', 'Islam', 1, 'voter-mak.png', '%iii/%111/%u1i/%iuu1/%iii/%1i1/%uiu/%1u1u/%1u1/%i1i/%iui/%111u/%1i1/%1i1/%u1i/%i11u/%1uu/%111/%i1i/%1111/%iii/%ui1/%iui/%iiio/%u1i/%1uu/%i1i/%iiiu/%uiu/%u11/%i1i/%1ui1', '1uuu1ou1', 'false', 'false'),
(12, 'wismanu', 'Jl. wisman', 'Malang', '1991-01-01', 'Islam', 1, 'voter-mak.png', '%1i1/%u11/%u1i/%i1i1/%iii/%1uu/%1i1/%1uiu/%uiu/%1i1/%iii/%uiuu/%u11/%1ui/%iuu/%u11u/%ui1/%iii/%iui/%uiu1/%iii/%iii/%iii/%i11o/%uiu/%u1i/%iu1/%1i1u/%u1i/%1u1/%u1u/%uiu1', '1uuu1ou1', 'false', 'false'),
(13, 'coba', 'coba', 'malang', '1992-02-02', 'Islam', 1, 'voter-IMG_20141014_150144.jpg', '%1u1/%u1u/%i1i/%1ui1/%iuu/%1uu/%111/%111u/%u11/%i1i/%u11/%iuu1/%uiu/%u1i/%i11/%i1iu/%ui1/%i11/%1u1/%u111/%iuu/%i11/%iu1/%1uuu/%1u1/%u1i/%i1i/%iui1/%iii/%iui/%u1u/%ui1u', '1u1u1u1u', 'false', 'false'),
(14, 'aa', 'aaa', 'aaa', '1992-02-02', 'Islam', 1, 'voter-cabe.jpg', '%u11/%iu1/%i11/%u111/%111/%u11/%iui/%iiiu/%1uu/%1ui/%1ui/%1uiu/%uiu/%111/%i11/%iuiu/%iui/%uiu/%1ui/%iii1/%1i1/%iu1/%1uu/%iuio/%111/%1u1/%iu1/%u1uu/%1uu/%iii/%i1i/%u111', '1uuu1ou1', 'false', 'false'),
(15, 'indra', 'jl indra', 'malang', '1992-02-02', 'Islam', 1, 'voter-fuck.png', '%1u1/%1i1/%1uu/%i1i1/%iui/%iuu/%1uu/%u11u/%iuu/%iuu/%iui/%u1uu/%u1i/%i1i/%iuu/%1i1u/%1u1/%1i1/%i1i/%1ui1/%uiu/%1u1/%111/%1uio/%u1i/%i11/%iii/%i11u/%i11/%i1i/%1ui/%iuu1', '1uuu1ou1', 'false', 'false');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
