-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 06:34 PM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kritik_saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `kritik_saran`) VALUES
(1, 'Ahmad Saifur Rohman', 'e41201456@student.polije.ac.id', 'cukup ngeri'),
(6, 'M Hasan', 'hasan12@gmail.com', 'Interface sangat friendly mantap\r\n'),
(7, 'bayu cahya ky', 'ashurayudha@gmail.com', 'saya yang awam akan teknologi bisa mengunakan web ini dengan mudah semoga web ini bisa berkembang dengan semestinya'),
(8, 'tyo', 'setyo@mail.com', 'aplikasi ini sangat membantu masyarakat dalam mencari hiburan atau pagelaran untuk acara mereka');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_seni`
--

CREATE TABLE `gambar_seni` (
  `sn_id` int(11) NOT NULL,
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
(2, 'Tari'),
(3, 'Kekawin'),
(4, 'Musik Tradisional'),
(5, 'Wayang'),
(6, 'Pahat'),
(7, 'Lukis'),
(10, 'rohani');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_admin`
--

CREATE TABLE `mstr_admin` (
  `adm_id` int(11) NOT NULL,
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
(1, 'Ahmad Saifur Rohman', 'L', 'Jember', '2021-11-17', '082214100363', 'e41201456@student.polije.ac.id', 'tanggul', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'adm4_1105901.jpg'),
(4, 'Ahmad Saifur ', 'L', 'Jember', '2021-12-03', '082214100363', 'e41201456@student.polije.ac.id', 'Jl. Merbabu Rt.2 Rw.20 Kec.Tanggul, Kab.Jember, Prov.Jawa Timur', 'operator', '4b583376b2767b923c3e1da60d10de59', 2, 'adm4_musik daul.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_seniman`
--

CREATE TABLE `mstr_seniman` (
  `snm_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `nama_snm` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `snm_foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstr_seniman`
--

INSERT INTO `mstr_seniman` (`snm_id`, `usr_id`, `nama_snm`, `telp`, `email`, `alamat`, `snm_foto`) VALUES
(1, 15, 'Albanjari', '082267687322', 'saifur@gmail.com', 'Jl. Merbabu Rt.2 Rw.20 Tanggul Wetan, Kec.Tnggul, Kab.Jember, Prov.Jawa Timur', 'coba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mstr_user`
--

CREATE TABLE `mstr_user` (
  `usr_id` int(11) NOT NULL,
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
(1, 'Saya Saifur', 'L', 'Jember', '2021-11-03', '082267687322', 'saifur@gmail.com', 'vuvlsiubfvfuvnsjdfvnjfnvonosnvsbvp9sbeunhv9ehg-wnv8hwnv9hw9cwh-m8xw-0f8wgn9-vermeje', 'd9dd38cb53a5cfcfaee9bacabe84f247', 'ef0eaa51c8fbb3f47915b123beb06dd2', 0, 'usr1_foto resmi.jpg'),
(2, 'Saya Saifur', 'L', 'Jember', '2021-11-03', '082267687322', 'saifur@gmail.com', 'vuvlsiubfvfuvnsjdfvnjf nvonosnvsbvp9sbeunhv9ehg-wnv8hwnv9hw9cwh-m8xw-0hhhhhhhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbf8wgn9-vermeje', '335517fb305839c7fbdb4b960d158bc5', '9d1ae14f98b98dbe78ff45b0e7cc8174', 0, 'usr2_91257-1.png'),
(3, 'M Hasan', 'L', 'Probolinggo', '2001-08-08', '082232132812', 'hasan@tif.com', 'Kerpangan Leces Probolinggo', '9576755dbb49ce40f85b439efdaa5e71', '202cb962ac59075b964b07152d234b70', 0, 'usr3_43941.jpg'),
(4, 'Dina Jali', 'P', 'Bandung', '2000-01-03', '089213231391', 'dina@gmail.com', 'Jln Panjaitan 28 Soreang Bandung', 'e274648aed611371cf5c30a30bbe1d65', '202cb962ac59075b964b07152d234b70', 0, 'usr4_hadrah2.jpg'),
(5, 'Andi Sucipto', 'L', 'Malang', '1999-08-01', '081312412121', 'andi@gmail.com', 'Jl. Sudirman 55 Singosari Malang', 'andi', '123', 0, 'usr5.jpg'),
(6, 'Diky Setiawan', 'L', 'Pamekasan', '1997-10-08', '082192102111', 'diky@gmail.com', 'Manunggal Kejayan Pamekasan', 'diky', '1234', 0, 'usr6.jpg'),
(7, 'Lina Aprilia', 'P', 'Jakarta', '1990-05-02', '082713104121', 'lina@gmail.com', 'Simpang Lima Gang.05 Bundaran HI Jakarta Selatan', 'lina', '12321', 0, 'usr7.jpg'),
(8, 'Suci Wardani', 'P', 'Lumajang', '2002-09-01', '081212910211', 'suci@gmail.com', 'Sukodono Lumajang', 'suci', '1234', 0, 'usr8.jpg'),
(9, 'Raditia Akbar', 'L', 'Probolinggo', '1999-09-09', '082912012931', 'akbar@gmail.com', 'Jln Raya Pantura Paiton Probolinggo', 'akbar', '1234', 0, 'usr9.jpg'),
(13, 'Saaayaaa', 'P', 'Jemberrrrrr', '0000-00-00', '082214100363', 'e41201456@student.polije.ac.id', 'tanggul', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 0, 'usr3_43941.jpg'),
(14, 'Ahmad Saifur Rohman', 'L', 'Jember', '0000-00-00', '082214100363', 'e41201456@student.polije.ac.id', 'tanggul', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 0, 'usr3_43941.jpg'),
(15, 'Ahmad Saifur Rohman', 'L', 'Jember', '2021-12-12', '082214100363', 'e41201456@student.polije.ac.id', 'Jl. Merbabu rt.2 rw.20 Kec. Tanggul, Kab. Jember, Prov. Jawa Timur', 'asrsaif04', '52c305280518a633a85558a4985811fa', 1, '15_Wallpaper Laptop Biro SI.png'),
(16, 'Ahmad Saifur Rohman', 'L', 'Jember', '2021-12-15', '082214100363', 'e41201456@student.polije.ac.id', 'Jl. Merbabu rt.2 rw.20 Kec. Tanggul, Kab. Jember, Prov. Jawa Timur', 'tes', 'tes', 0, ''),
(18, 'Ahmad Saifur Rohman', 'L', 'Jember', '0000-00-00', '082214100363', 'e41201456@student.polije.ac.id', 'Jl. Merbabu rt.2 rw.20 Kec. Tanggul, Kab. Jember, Prov. Jawa Timur', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1, ''),
(19, 'saif', 'L', 'jbr', '0000-00-00', '082214100363', 'abc@a.bc', 'jemberrrrr', 'saya', '20c1a26a55039b30866c9d0aa51953ca', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `seni`
--

CREATE TABLE `seni` (
  `sn_id` int(11) NOT NULL,
  `snm_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jns_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jangkauan` varchar(50) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seni`
--

INSERT INTO `seni` (`sn_id`, `snm_id`, `judul`, `kategori`, `jns_id`, `keterangan`, `jangkauan`, `harga`, `gambar`, `status`) VALUES
(1, 1, 'Tari Saman', 'Kelompok', 2, 'Tari Saman adalah sebuah tarian suku Gayo yang biasa ditampilkan untuk merayakan peristiwa-peristiwa penting dalam adat. Syair dalam tarian saman mempergunakan bahasa Gayo. Selain itu biasanya tarian ini juga ditampilkan untuk merayakan kelahiran Nabi Muhammad SAW', 'Kecamatan', '2000000', '1 tari saman.png', 1),
(2, 1, 'Tari Kecak', 'Kelompok', 2, 'Tari kecak adalah seni tari yang berasal dari Bali. Seni tari kecak ini dipertunjukkan oleh puluhan penari laki-laki yang duduk berbaris dengan pola melingkar dan dengan irama tertentu menyerukan cak, cak, cak serta mengangkat kedua lengan.', 'Kecamatan', '2500000', '4 tari kecak.png', 1),
(3, 1, 'Hadrah Banjari', 'Kelompok', 10, 'Hadrah banjari merupakan jenis hadroh yang menekankan pada nada pelan dan seirama sehingga membuat pendengar merasa nyaman dengan ritmenya, menggunakan personel yang secukupnya dan alat musik yang jenisnya masih tidak terlalu banyak.', 'Kabupaten', '1300000', '8 hadroh.png', 1),
(4, 1, 'Wayang Kulit', 'Kelompok', 5, 'PERTUNJUKAN WAYANG KULIT. Mahakarya Seni Pertunjukan Jawa. Seni pertunjukan yang telah berusia lebih dari lima abad. Membawa kisah Ramayana dan Mahabharata, pagelaran selama semalam suntuk ini menjadi ruang yang tepat untuk melewatkan malam, berefleksi dan memahami filosofi hidup Jawa.', 'Kecamatan', '2000000', '7 wayang.png', 1),
(5, 1, 'Ludruk', 'Kelompok', 4, 'Pertunjukan spekatakuler melibatkan drama dari berbagai lakon yang bertemakan mengenai kerajaan masa lalu', 'Kabupaten', '3000000', '6 ludruk.png', 1),
(6, 1, 'Tari Pendet', 'Individu', 2, 'Menerima permintaan lukis perorangan untuk kebutuhan hiasan rumah, kamar, ruang tamu dll. Sesuai permintaan dari pelanggan ', 'Kecamatan', '3100000', '3 Tari-Pendet.png', 1),
(7, 1, 'Tari Topeng Bondres', 'Individu', 2, 'Menerima permintaan patung perorangan untuk kebutuhan hiasan rumah, kamar, ruang tamu dll. Sesuai permintaan dari pelanggan ', 'Kecamatan', '2100000', '9 tari topeng bondres.png', 1),
(8, 1, 'Reog Ponorogo', 'Kelompok', 4, 'Reog Ponorogo adalah tari tradisional yang berasal dari daerah Barat-Laut Provinsi Jawa Timur dan Ponorogo.Kata reog sendiri berasa dari kata riyokun yang artinya khusnul khotimah.Tarian yang terkenal dengan Singo Barongnya ini dinilai masih kental dengan ilmu kebatinan dan hal-hal mistis lainnya. Selain itu, tari Reog Ponorogo dibawakan dengan beberapa jenis alat musik iringan, seperti kendang, demung, saron, peking, gong, kempul, dan juga slenthem.', 'Kabupaten', '1400000', '2 reog ponorogo.png', 0),
(9, 1, 'Tari Suanggi', 'Kelompok', 2, 'Patrol merupakan salah satu kesenian lokal yang berkembang di beberapa daerah Jawa Timur, di antaranya adalah Kota Sidoarjo. Kesenian berupa aransemen musik ini memiliki keunikan karena alat musik utamanya berupa kentongan yang terbuat dari bambu atau kayu. Saat bulan Ramadan, patrol juga digunakan untuk membangunkan warga saat menjelang sahur.', 'Kecamatan', '3000000', '10 tari suanggi.png', 1),
(15, 1, 'tari kembang empul', 'Kelompok', 2, '<p>tari merupakan sebuah tari yang menarian tarian tari</p><li>blakbjjd</li><li>jdbfkvnkf</li><li>akbjbfa</li><li>bakjbfkjbkjbaf</li>', 'Jember', '4000000', '20211215_05-00-45_10_musik daul.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `sn_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jml` int(11) NOT NULL,
  `ttl_harga` int(12) NOT NULL,
  `transport` int(12) NOT NULL,
  `t_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tgl_pemesanan`, `sn_id`, `usr_id`, `tgl_kegiatan`, `tgl_akhir`, `jml`, `ttl_harga`, `transport`, `t_status`) VALUES
(2021121720, '2021-12-17', 6, 15, '2021-12-30', '2021-12-30', 1, 3100000, 800000, 2),
(2021121721, '2021-12-17', 1, 15, '2021-12-27', '2021-12-27', 1, 2000000, 0, 2),
(2021121722, '2021-12-17', 2, 15, '2021-12-17', '2021-12-17', 1, 2500000, 400000, 2),
(2021121723, '2021-12-17', 9, 18, '2021-12-31', '2021-12-31', 1, 3000000, 500000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mstr_seniman`
--
ALTER TABLE `mstr_seniman`
  ADD PRIMARY KEY (`snm_id`);

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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mstr_admin`
--
ALTER TABLE `mstr_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mstr_seniman`
--
ALTER TABLE `mstr_seniman`
  MODIFY `snm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mstr_user`
--
ALTER TABLE `mstr_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seni`
--
ALTER TABLE `seni`
  MODIFY `sn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
