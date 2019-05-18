-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2019 at 08:46 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis_ternak`
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
(2, 6, '10,000,000 - 15,000,000', '5'),
(3, 6, '16,000,000 - 20,000,000', '4'),
(4, 6, '21,000,000 - 26,000,000', '3'),
(5, 6, '26,000,000 - 30,000,000', '2'),
(6, 6, '30,000,000 - 36,000,000', '1'),
(7, 7, '80kg-85kg', '1'),
(8, 7, '85kg-90kg', '1.5'),
(9, 7, ' 90kg-95kg', '2'),
(10, 7, '95kg-100kg', '2.5'),
(11, 7, '100kg-110kg', '3'),
(12, 8, '6 Bulan-8 Bulan', '1'),
(13, 8, '8 Bulan-10 Bulan', '2'),
(14, 8, '10 Bulan-13 Bulan', '2.5'),
(15, 8, '13 Bulan-17 Bulan', '4'),
(16, 8, '17 Bulan-22 Bulan', '3'),
(17, 9, 'Kurban', '3'),
(18, 9, 'Acara Nikahan', '2'),
(19, 9, 'Upacara Adat', '1'),
(20, 10, 'Coklat', '2'),
(21, 10, 'Corak', '1.5'),
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
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `deskripsi`, `harga`, `gambar`, `kategori`) VALUES
(15, 'Sapi limosim', 'Berat 3.5kg\r\nWarna coklat\r\nSehat\r\nUsia 3 tahun', '3000000000', 'sapi-simental.jpg', 'Jantan'),
(16, 'Sapi bali', 'Berat 3kg\r\nSehat fisik\r\nUsia 3 tahun\r\nWarna coklat', '3500000000', 'sapi-bali-1024x675(2).jpg', 'Betina'),
(17, 'Sapi jawa', 'Warna putih\r\nBerat 2.5kg\r\nSehat\r\nUsia 2.5 tahun', '2500000000', '682472madura1.jpg', 'Jantan');

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
(1, 15, 6, 3),
(2, 15, 7, 1.5),
(3, 15, 8, 2.5),
(4, 15, 9, 3),
(5, 15, 10, 1),
(6, 15, 11, 1.5),
(7, 16, 6, 5),
(8, 16, 7, 1),
(9, 16, 8, 1),
(10, 16, 9, 3),
(11, 16, 10, 2),
(12, 16, 11, 3),
(13, 17, 6, 2),
(14, 17, 7, 2.5),
(15, 17, 8, 4),
(16, 17, 9, 2),
(17, 17, 10, 1.5),
(18, 17, 11, 1);

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
(1, 15, 2, 'd5sdfv1-24d0d609-23b3-4ec2-9ac3-dfe2684c89e6.png', '3', '2019-05-12 03:49:46', '2019-05-12 03:49:46'),
(22, 17, 2, '', '1', '2019-05-12 04:57:03', '2019-05-12 04:57:03'),
(23, 17, 2, '', '1', '2019-05-12 04:57:08', '2019-05-12 04:57:08'),
(24, 17, 2, '', '1', '2019-05-12 04:57:09', '2019-05-12 04:57:09'),
(25, 17, 2, '', '1', '2019-05-12 04:57:10', '2019-05-12 04:57:10'),
(26, 17, 2, '', '1', '2019-05-12 04:57:11', '2019-05-12 04:57:11'),
(27, 15, 3, 'Hydrangeas.jpg', '3', '2019-05-12 05:44:30', '2019-05-12 05:44:30');

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
(2, 'test', 'test', 2, 'Test', 'test', '08123123123'),
(3, 'danil', '123', 2, 'danil', 'kisaran', '0987654');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product_topsis`
--
ALTER TABLE `product_topsis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
