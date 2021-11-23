-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 03:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sedaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar_seni`
--

CREATE TABLE `gambar_seni` (
  `sn_id` varchar(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jns_id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jns_id`, `jenis`) VALUES
(1, 'Kekawin'),
(2, 'Tari');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_admin`
--

CREATE TABLE `mstr_admin` (
  `adm_id` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstr_admin`
--

INSERT INTO `mstr_admin` (`adm_id`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `telp`, `email`, `alamat`, `username`, `password`, `status`, `foto`) VALUES
('adm1', 'Ahmad Saifur R', 'L', 'Jember', '2001-09-04', '082267687322', 'saifur@gmail.com', 'jalan jalan', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 1, 'default.jpg'),
('adm3', 'Ahmad Saifur Rohman', 'L', 'Jember', '2001-09-04', '082214100363', 'e41201456@student.polije.ac.id', 'tanggul', '4b583376b2767b923c3e1da60d10de59', '4b583376b2767b923c3e1da60d10de59', 2, 'adm3_IMG_20210920_095258.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_user`
--

CREATE TABLE `mstr_user` (
  `usr_id` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstr_user`
--

INSERT INTO `mstr_user` (`usr_id`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `telp`, `email`, `alamat`, `username`, `password`, `status`, `foto`) VALUES
('usr1', 'Saya Saifur', 'L', 'Jember', '2021-11-03', '082267687322', 'saifur@gmail.com', 'vuvlsiubfvfuvnsjdfvnjfnvonosnvsbvp9sbeunhv9ehg-wnv8hwnv9hw9cwh-m8xw-0f8wgn9-vermeje', '335517fb305839c7fbdb4b960d158bc5', '9d1ae14f98b98dbe78ff45b0e7cc8174', 0, 'usr1_hadrah2.jpg'),
('usr2', 'Saya Saifur', 'L', 'Jember', '2021-11-03', '082267687322', 'saifur@gmail.com', 'vuvlsiubfvfuvnsjdfvnjfnvonosnvsbvp9sbeunhv9ehg-wnv8hwnv9hw9cwh-m8xw-0hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbf8wgn9-vermeje', '52c305280518a633a85558a4985811fa', '6774b084b4e8c3189c507afa8a861a2d', 1, 'usr2_musik daul.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seni`
--

CREATE TABLE `seni` (
  `sn_id` varchar(11) NOT NULL,
  `usr_id` varchar(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` int(1) NOT NULL,
  `jns_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jangkauan` varchar(50) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(11) NOT NULL,
  `tgl_transaksi` varchar(10) NOT NULL,
  `sn_id` varchar(11) NOT NULL,
  `usr_id` varchar(11) NOT NULL,
  `tgl_mulai` varchar(10) NOT NULL,
  `tgl_akhir` varchar(10) NOT NULL,
  `jml` int(11) NOT NULL,
  `ttl_harga` varchar(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar_seni`
--
ALTER TABLE `gambar_seni`
  ADD KEY `mempunyai` (`sn_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jns_id`);

--
-- Indexes for table `mstr_admin`
--
ALTER TABLE `mstr_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `mstr_user`
--
ALTER TABLE `mstr_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `seni`
--
ALTER TABLE `seni`
  ADD PRIMARY KEY (`sn_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar_seni`
--
ALTER TABLE `gambar_seni`
  ADD CONSTRAINT `mempunyai` FOREIGN KEY (`sn_id`) REFERENCES `seni` (`sn_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
