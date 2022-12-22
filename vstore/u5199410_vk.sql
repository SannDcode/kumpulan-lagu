-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2018 at 08:18 PM
-- Server version: 10.2.18-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5199410_vk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nm_lengkap`) VALUES
(1, 'maul', 'maul', 'maulana muh');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(6) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `satuan` varchar(5) NOT NULL,
  `stok` int(9) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_brg`, `id_kategori`, `harga`, `satuan`, `stok`, `gambar`, `ket`) VALUES
(1, 'Kaffah 08', 2, 25000, 'pcs', 100, '1.jpg', 'motif mobil'),
(2, 'Kaffah 18', 2, 25000, 'pcs', 3, '2.jpg', 'motif bunga hitam'),
(3, 'Kaffah 11', 2, 25000, 'pcs', 93, '3.jpg', 'motif bunga 2'),
(4, 'Kaffah 02', 2, 25000, 'pcs', 2, '4.jpg', 'motif bunga putih'),
(5, 'Kaffah 15', 2, 25000, 'pcs', 5, '5.jpg', 'motif bulat'),
(6, 'Kaffah 09', 2, 25000, 'pcs', 8, '6.jpg', 'motif kaktus'),
(7, 'Kaffah 17', 2, 25000, 'pcs', 5, '7.jpg', ''),
(8, 'Kaffah 07', 2, 25000, 'pcs', 10, '8.jpg', ''),
(9, 'Kaffah 14', 1, 25000, 'pcs', 8, '9.jpg', ''),
(10, 'Kaffah 06', 1, 25000, 'pcs', 10, '10.jpg', ''),
(11, 'Kaffah 01', 1, 25000, 'pcs', 9, '11.jpg', ''),
(12, 'Kaffah 05', 1, 25000, 'pcs', 10, '12.jpg', 'motif bunga '),
(13, 'Kaffah 19', 1, 25000, 'pcs', 10, '13.jpg', ''),
(14, 'Kaffah 12', 1, 25000, 'pcs', 10, '14.jpg', ''),
(15, 'Kaffah 04', 1, 25000, 'pcs', 10, '15.jpg', ''),
(16, 'dfghg', 1, 25500, 'pcs', 10, 'bg-grey3.png', 'contoh ubah'),
(17, 'khfdhgsfh', 1, 1, '', 1, '1', '1'),
(18, 'sdfghj', 1, 1, '', 1, '1', '1'),
(19, 'dgfhjkl', 1, 1, '', 1, '1', '1'),
(20, 'fdghjkl', 1, 1, '', 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `kd_checkout` varchar(20) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_byr` double NOT NULL,
  `diskon` double NOT NULL,
  `tgl_order` date NOT NULL,
  `status_beli` enum('belum bayar','proses pengecekan','sedang dikirim','batal') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`kd_checkout`, `id_tujuan`, `id_user`, `total_byr`, `diskon`, `tgl_order`, `status_beli`) VALUES
('0310201818430', 7, 1, 11000, 0, '2018-10-03', 'belum bayar'),
('0310201814990', 10, 1, 11000, 2500, '2018-10-03', 'belum bayar'),
('0310201822772', 11, 1, 11000, 10000, '2018-10-03', 'belum bayar'),
('031020189464', 12, 1, 101000, 10000, '2018-10-03', 'sedang dikirim'),
('0310201823186', 17, 1, 80000, 7500, '2018-10-04', 'proses pengecekan'),
('0310201826122', 13, 3, 175500, 17500, '2018-10-03', 'belum bayar'),
('031020186308', 14, 3, 35000, 2500, '2018-10-03', 'belum bayar'),
('0310201811899', 15, 3, 57500, 5000, '2018-10-03', 'belum bayar'),
('031020184192', 16, 3, 33500, 2500, '2018-10-03', 'belum bayar'),
('0410201822085', 18, 1, 33500, 2500, '2018-10-04', 'belum bayar'),
('041020189741', 20, 1, 333000, 35000, '2018-10-12', 'proses pengecekan'),
('1210201813202850', 21, 1, 33500, 2500, '2018-10-16', 'belum bayar'),
('16102018102964549', 0, 1, 0, 0, '0000-00-00', 'belum bayar');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kat` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kat`) VALUES
(1, 'Anak-anak'),
(2, 'Dewasa');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `qty` int(150) NOT NULL,
  `harga` double NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kd_checkout` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `jumlah` double NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kd_checkout`, `nama`, `bank`, `jumlah`, `tgl_pembayaran`, `bukti_pembayaran`) VALUES
(1, '031020189464', 'Karjo', 'Mandiri', 101000, '2018-10-04', '201810040349301.jpg'),
(2, '0310201823186', 'qwert', 'fvdd', 80000, '2018-10-04', '201810041305361.jpg'),
(3, '041020189741', 'vita', 'bca', 333000, '2018-10-12', '20181012143540ViethaKumaira.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `kd_checkout` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `qty` int(250) NOT NULL,
  `harga` double NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_keranjang`, `kd_checkout`, `id_user`, `nama_brg`, `qty`, `harga`, `total_harga`) VALUES
(58, 74, '031020186308', 3, 'Kaffah 08', 1, 25000, 25000),
(57, 73, '0310201826122', 3, 'Kaffah 11', 11, 25000, 275000),
(56, 72, '0310201826122', 3, 'Kaffah 08', 4, 25000, 100000),
(55, 71, '031020189464', 1, 'Kaffah 11', 11, 25000, 275000),
(54, 70, '031020189464', 1, 'Kaffah 08', 1, 25000, 25000),
(53, 69, '0310201822772', 1, 'Kaffah 11', 11, 25000, 275000),
(52, 68, '0310201822772', 1, 'Kaffah 08', 3, 25000, 75000),
(59, 75, '0310201811899', 3, 'Kaffah 08', 2, 25000, 50000),
(60, 76, '031020184192', 3, 'Kaffah 08', 1, 25000, 25000),
(61, 77, '0310201823186', 1, 'Kaffah 14', 2, 25000, 50000),
(62, 78, '0310201823186', 1, 'Kaffah 02', 1, 25000, 25000),
(63, 79, '0410201822085', 1, 'Kaffah 08', 1, 25000, 25000),
(64, 80, '041020189741', 1, 'Kaffah 11', 11, 25000, 275000),
(65, 81, '041020189741', 1, 'Kaffah 15', 3, 25000, 75000),
(66, 82, '1210201813202850', 1, 'Kaffah 01', 1, 25000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nm_provinsi` varchar(35) NOT NULL,
  `tarif` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nm_provinsi`, `tarif`) VALUES
(1, 'Jawa Timur', 11000),
(2, 'Jawa Tengah', 12500),
(3, 'Jawa Barat', 18000),
(4, 'Kalimantan Barat', 48500);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `kd_checkout` varchar(20) NOT NULL,
  `nm_penerima` varchar(50) NOT NULL,
  `nm_perum` text NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kd_pos` int(6) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `tlp` varchar(14) NOT NULL,
  `tarif` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `kd_checkout`, `nm_penerima`, `nm_perum`, `provinsi`, `kabupaten`, `kecamatan`, `kd_pos`, `desa`, `tlp`, `tarif`) VALUES
(7, '0310201818430', 'frghj', 'dgfhj', 'Jawa Timur', 'gfhjk', 'gfhj', 3245, 'dgfhj', '3245', 11000),
(8, '0310201818430', 'dfghjk', 'gfhjk', 'Jawa Timur', 'dgfhj', 'fhgjk', 54678, 'gfhjk', '54678', 11000),
(9, '0310201818430', 'ergfhj', 'fdg', 'Jawa Timur', 'sdfghj', 'fghj', 43567, 'dfghjk', '34567', 11000),
(10, '0310201814990', 'rtyu', 'dfghj', 'Jawa Timur', 'fhg', 'gfh', 5467, 'gfhh', '34567', 11000),
(11, '0310201822772', 'rtyu', 'ghjk', 'Jawa Timur', 'fdghj', 'gghjk', 345, 'fg', '43567', 11000),
(12, '031020189464', 'fghj', 'fghj', 'Jawa Timur', 'ghj', 'fghj', 78, 'ghj', '678', 11000),
(13, '0310201826122', 'dian', 'cluster kemangi jl. kedondong ', 'Jawa Barat', 'jakarta', 'jaksel', 9283, 'jak', '0892920209102', 18000),
(14, '031020186308', 'dian', 'dfghjkl', 'Jawa Tengah', 'dfghjk', 'dfghj', 23456, 'fdghj', '34567890', 12500),
(15, '0310201811899', 'dasd', 'dfghj', 'Jawa Tengah', 'ghjkl', 'ghjk', 4567, 'fghjk', '2134', 12500),
(16, '031020184192', 'sd', 'sda', 'Jawa Timur', '123asd', 'asd', 123, 'asd', '123', 11000),
(17, '0310201823186', 'qwerty', 'sdfrg', 'Jawa Tengah', 'erty', 'dfgh', 2345, 'erfgh', '32345678', 12500),
(18, '0410201822085', 'fgh', 'fghj', 'Jawa Timur', 'fghjk', 'fghj', 456, 'fghj', '567', 11000),
(19, '', '', '', '', '', '', 0, '', '', 0),
(20, '041020189741', 'alif', 'gydygueg', 'Jawa Barat', 'bekasi', 'hugh', 176464, 'ituiryu5', '085601476049', 18000),
(21, '1210201813202850', 'qwer', 'sedfg', 'Jawa Timur', 'erty', 'rtyu', 546, 'tgyhu', '1324567', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_lengkap`, `username`, `password`, `akses`, `email`, `alamat`, `tlp`) VALUES
(1, 'maulana', 'maul', '123', 'reseller', 'maul@gmail.com', 'taman indah', '08976262761'),
(3, 'dian', 'dian1', '123', 'agen', 'dian@gmail.com', 'taman', '089512893819'),
(4, 'dina nana', 'dina', '123', 'distributor', 'dina@gmail.com', '', '089282918293');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`kd_checkout`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
