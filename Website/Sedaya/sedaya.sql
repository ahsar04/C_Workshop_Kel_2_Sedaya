-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 11:57 AM
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
(2, 'Tari'),
(3, 'Musik Tradisional'),
(4, 'Wayang'),
(5, 'Teater'),
(6, 'Lukis'),
(7, 'Pahat');

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
('adm3', 'Ahmad Saifur Rohman', 'L', 'Jember', '2001-09-04', '082214100363', 'e41201456@student.polije.ac.id', 'tanggul', '2dd4936f1ec4e5e6f5497e555ba0b7a4', '2dd4936f1ec4e5e6f5497e555ba0b7a4', 2, 'avatar5.png');

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
('usr1', 'Saya Saifur', 'L', 'Jember', '2021-11-03', '082267687322', 'saifur@gmail.com', 'vuvlsiubfvfuvnsjdfvnjfnvonosnvsbvp9sbeunhv9ehg-wnv8hwnv9hw9cwh-m8xw-0f8wgn9-vermeje', 'd9dd38cb53a5cfcfaee9bacabe84f247', 'ef0eaa51c8fbb3f47915b123beb06dd2', 0, 'usr1_foto resmi.jpg'),
('usr2', 'Saya Saifur', 'L', 'Jember', '2021-11-03', '082267687322', 'saifur@gmail.com', 'vuvlsiubfvfuvnsjdfvnjf nvonosnvsbvp9sbeunhv9ehg-wnv8hwnv9hw9cwh-m8xw-0hhhhhhhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbf8wgn9-vermeje', '335517fb305839c7fbdb4b960d158bc5', '9d1ae14f98b98dbe78ff45b0e7cc8174', 0, 'usr2_91257-1.png'),
('usr3', 'M Hasan', 'L', 'Probolinggo', '2001-08-08', '082232132812', 'hasan@tif.com', 'Kerpangan Leces Probolinggo', 'mhasan', '123', 0, 'usr3.jph'),
('usr4', 'Dina Jali', 'P', 'Bandung', '2000-01-03', '089213231391', 'dina@gmail.com', 'Jln Panjaitan 28 Soreang Bandung', 'dina', '123', 0, 'usr4.jpg'),
('usr5', 'Andi Sucipto', 'L', 'Malang', '1999-08-01', '081312412121', 'andi@gmail.com', 'Jl. Sudirman 55 Singosari Malang', 'andi', '123', 0, 'usr5.jpg'),
('usr6', 'Diky Setiawan', 'L', 'Pamekasan', '1997-10-08', '082192102111', 'diky@gmail.com', 'Manunggal Kejayan Pamekasan', 'diky', '1234', 0, 'usr6.jpg'),
('usr7', 'Lina Aprilia', 'P', 'Jakarta', '1990-05-02', '082713104121', 'lina@gmail.com', 'Simpang Lima Gang.05 Bundaran HI Jakarta Selatan', 'lina', '12321', 0, 'usr7.jpg'),
('usr8', 'Suci Wardani', 'P', 'Lumajang', '2002-09-01', '081212910211', 'suci@gmail.com', 'Sukodono Lumajang', 'suci', '1234', 0, 'usr8.jpg'),
('usr9', 'Raditia Akbar', 'L', 'Probolinggo', '1999-09-09', '082912012931', 'akbar@gmail.com', 'Jln Raya Pantura Paiton Probolinggo', 'akbar', '1234', 0, 'usr9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seni`
--

CREATE TABLE `seni` (
  `sn_id` varchar(11) NOT NULL,
  `usr_id` varchar(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jns_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jangkauan` varchar(50) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seni`
--

INSERT INTO `seni` (`sn_id`, `usr_id`, `judul`, `kategori`, `jns_id`, `keterangan`, `jangkauan`, `harga`, `status`) VALUES
('sn1', 'usr1', 'Tari Piring', 'Kelompok', 1, 'jhbdkbdbvdkvbdkbvkdbkadkjadjncnkndckjbclcblizdfaluifgdkifgbaisgbakidugbcduifgblodugfb;oldugefq;aoudefqa;oldufqa;oleufhqao;lefuhqau', 'Kecamatan', '1500000', 1),
('sn2', 'usr2', 'Tari Kecak', 'Kelompok', 2, 'Tari kecak adalah seni tari yang berasal dari Bali. Seni tari kecak ini dipertunjukkan oleh puluhan penari laki-laki yang duduk berbaris dengan pola melingkar dan dengan irama tertentu menyerukan \"cak, cak, cak\" serta mengangkat kedua lengan.', 'Kecamatan', '200000', 0),
('sn3', 'usr3', 'Hadrah Banjari', 'Kelompok', 3, 'Hadrah banjari merupakan jenis hadroh yang menekankan pada nada pelan dan seirama sehingga membuat pendengar merasa nyaman dengan ritmenya, menggunakan personel yang secukupnya dan alat musik yang jenisnya masih tidak terlalu banyak.', 'Kabupaten', '300000', 0),
('sn4', 'usr4', 'Wayang Kulit', 'Kelompok', 4, 'PERTUNJUKAN WAYANG KULIT. Mahakarya Seni Pertunjukan Jawa. Seni pertunjukan yang telah berusia lebih dari lima abad. Membawa kisah Ramayana dan Mahabharata, pagelaran selama semalam suntuk ini menjadi ruang yang tepat untuk melewatkan malam, berefleksi dan memahami filosofi hidup Jawa.', 'Kecamatan', '2000000', 0),
('sn5', 'usr5', 'Drama Kolosal', 'Kelompok', 5, 'Pertunjukan spekatakuler melibatkan drama dari berbagai lakon yang bertemakan mengenai kerajaan masa lalu', 'Kabupaten', '300000', 0),
('sn6', 'usr6', 'Lukis Custom', 'Individu', 6, 'Menerima permintaan lukis perorangan untuk kebutuhan hiasan rumah, kamar, ruang tamu dll. Sesuai permintaan dari pelanggan ', 'Kecamatan', '100000', 0),
('sn7', 'usr7', 'Patung Relief', 'Individu', 7, 'Menerima permintaan patung perorangan untuk kebutuhan hiasan rumah, kamar, ruang tamu dll. Sesuai permintaan dari pelanggan ', 'Kecamatan', '100000', 0),
('sn8', 'usr5', 'Reog Ponorogo', 'Kelompok', 2, 'Reog Ponorogo adalah tari tradisional yang berasal dari daerah Barat-Laut Provinsi Jawa Timur dan Ponorogo.\r\nKata “reog” sendiri berasa dari kata “riyokun” yang artinya khusnul khotimah.\r\nTarian yang terkenal dengan Singo Barongnya ini dinilai masih kental dengan ilmu kebatinan dan hal-hal mistis lainnya\r\nSelain itu, tari Reog Ponorogo dibawakan dengan beberapa jenis alat musik iringan, seperti kendang, demung, saron, peking, gong, kempul, dan juga slenthem.', 'Kabupaten', '400000', 0),
('sn9', 'usr4', 'Patrol Talangsari', 'Kelompok', 3, 'Patrol merupakan salah satu kesenian lokal yang berkembang di beberapa daerah Jawa Timur, di antaranya adalah Kota Sidoarjo. Kesenian berupa aransemen musik ini memiliki keunikan karena alat musik utamanya berupa kentongan yang terbuat dari bambu atau kayu. Saat bulan Ramadan, patrol juga digunakan untuk membangunkan warga saat menjelang sahur.', 'Kecamatan', '300000', 0);

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
  MODIFY `jns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
