-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 10:07 AM
-- Server version: 10.0.25-MariaDB-0ubuntu0.15.10.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ztopsis_ternak`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`) VALUES
(6, 'Harga', 5),
(7, 'Berat', 3),
(8, 'Usia', 4),
(9, 'Kegunaan', 4),
(10, 'Warna', 2),
(11, 'Jenis Lembu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_lists`
--

CREATE TABLE `kriteria_lists` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `list_label` varchar(30) NOT NULL,
  `list_value` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_lists`
--

INSERT INTO `kriteria_lists` (`id`, `kriteria_id`, `list_label`, `list_value`) VALUES
(2, 6, '10,000,000 - 15,900,000', '1'),
(3, 6, '16,000,000 - 20,000,000', '2'),
(4, 6, '21,000,000 - 26,000,000', '3'),
(5, 6, '26,000,000 - 30,000,000', '4'),
(6, 6, '30,000,000 - 36,000,000', '5'),
(7, 7, '80kg-85kg', '1'),
(8, 7, '85kg-90kg', '2'),
(9, 7, ' 90kg-95kg', '3'),
(10, 7, '95kg-100kg', '2.5'),
(11, 7, '100kg-110kg', '3'),
(12, 8, '6 Bulan-8 Bulan', '1'),
(13, 8, '8 Bulan-10 Bulan', '2'),
(14, 8, '10 Bulan-13 Bulan', '3'),
(15, 8, '13 Bulan-17 Bulan', '4'),
(16, 8, '17 Bulan-22 Bulan', '3'),
(17, 9, 'Kurban', '3'),
(18, 9, 'Acara Nikahan', '2'),
(19, 9, 'Upacara Adat', '1'),
(20, 10, 'Coklat', '1'),
(21, 10, 'Corak', '2'),
(22, 10, 'Putih', '1'),
(23, 10, 'Hitam', '0.5'),
(24, 11, 'Bali', '3'),
(25, 11, 'Limosim', '1.5'),
(26, 11, 'Kampung', '1'),
(27, 11, 'Jawa', '2');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `file_name`) VALUES
(1, '2019_05_18_04_58_09_create_kriteria_lists.json');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `penjual_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `deskripsi`, `harga`, `gambar`, `kategori`, `penjual_id`) VALUES
(34, 'Sapi A', 'harga : 10000000-15000000\r\nBerat : 80kg-85kg\r\nUsia : 6 Bulan-8 Bulan\r\nwarna : coklat', '10000000', 'sapi coklat bali.jpg', 'Jantan', 0),
(35, 'Sapi B', 'Harga : 16000000-20000000\r\nBerat : 85kg-90kg\r\nUsia : 8 Bulan-10 Bulan\r\nWarna : Corak', '16000000', 'corak.jpg', 'Betina', 0),
(36, 'Sapi C', 'harga : 21000000-26000000\r\nberat : 90kg-95kg\r\nUsia : 10 Bulan-13 Bulan\r\nwarna : putih ', '21000000', 'sapi jawa.jpg', 'Betina', 0),
(40, 'Test Sapiii', 'des', '100000000', 'peternak_sapi.jpg', 'Jantan', 2),
(41, 'Test Sapi 2', 'des', '2500000000', 'cow-1472655_960_720.png', 'Jantan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_topsis`
--

CREATE TABLE `product_topsis` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_topsis`
--

INSERT INTO `product_topsis` (`id`, `product_id`, `kriteria_id`, `nilai`) VALUES
(109, 34, 6, 1),
(110, 34, 7, 1),
(111, 34, 8, 1),
(112, 34, 9, 3),
(113, 34, 10, 1),
(114, 34, 11, 3),
(115, 35, 6, 2),
(116, 35, 7, 2),
(117, 35, 8, 1),
(118, 35, 9, 2),
(119, 35, 10, 2),
(120, 35, 11, 1.5),
(121, 36, 6, 3),
(122, 36, 7, 3),
(123, 36, 8, 3),
(124, 36, 9, 1),
(125, 36, 10, 1),
(126, 36, 11, 1),
(145, 40, 6, 1),
(146, 40, 7, 1),
(147, 40, 8, 1),
(148, 40, 9, 3),
(149, 40, 10, 1),
(150, 40, 11, 3),
(151, 41, 6, 1),
(152, 41, 7, 1),
(153, 41, 8, 1),
(154, 41, 9, 3),
(155, 41, 10, 1),
(156, 41, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `product_id`, `pembeli_id`, `bukti`, `status`, `created_at`, `updated_at`) VALUES
(35, 36, 8, 'instal-language.png', '3', '2019-05-21 14:00:55', '2019-05-21 14:00:55'),
(36, 34, 9, '', '1', '2019-05-23 17:32:58', '2019-05-23 17:32:58'),
(37, 34, 12, '', '1', '2019-05-27 02:39:22', '2019-05-27 02:39:22'),
(38, 34, 11, '', '1', '2019-05-27 02:41:52', '2019-05-27 02:41:52'),
(39, 36, 11, '', '1', '2019-05-27 02:48:58', '2019-05-27 02:48:58'),
(40, 34, 2, 'cow-1472655_960_720.png', '3', '2019-05-27 06:00:25', '2019-05-27 06:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `nama_lengkap`, `alamat`, `no_telepon`) VALUES
(1, 'admin', 'admin', 1, '', '', ''),
(2, 'test', 'test', 3, 'Test', 'test', '08123123123'),
(3, 'danil', '123', 2, 'danil', 'kisaran', '0987654'),
(4, '12', '12', 2, 'rani', 'kisa', '098765'),
(5, 'kisaran1', 'kisaran1', 2, ' rani', 'kisaran', '98765436'),
(6, 'samaaja', 'samaaja', 2, 'jadgfjwfdf', 'dfhsd', '08765432'),
(7, 'Ra', 'ra', 2, 'Rani', 'Silo lama', '082276471067 '),
(8, 'rani', 'rani', 2, 'Maharani', 'silo lama', '082276471067'),
(9, 'Ri', 'ri', 2, 'Rani', 'Silo', '082276471067'),
(10, '90', '90', 2, 'Say', 'Say', '98'),
(11, 'budi123', 'budi123', 2, 'budi', 'Kisaran', '083453455'),
(12, 'iz', 'iz', 2, 'izah', 'silo lama', '0q037372'),
(13, 'penjual1', 'penjual1', 3, 'Penjual', 'kisaran', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_lists`
--
ALTER TABLE `kriteria_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_lists_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_topsis`
--
ALTER TABLE `product_topsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_topsis_ibfk_1` (`product_id`),
  ADD KEY `product_topsis_ibfk_2` (`kriteria_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kriteria_lists`
--
ALTER TABLE `kriteria_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `product_topsis`
--
ALTER TABLE `product_topsis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria_lists`
--
ALTER TABLE `kriteria_lists`
  ADD CONSTRAINT `kriteria_lists_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_topsis`
--
ALTER TABLE `product_topsis`
  ADD CONSTRAINT `product_topsis_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_topsis_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
