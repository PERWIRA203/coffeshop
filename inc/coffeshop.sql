-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 04:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 'Onion Rings', 'Gorengan bawang bombay dengan saus lezat.', 20000.00, 'onion-rings.jpg'),
(2, 'Mie Goreng Jawa', 'Mie goreng khas Jawa dengan bumbu rempah.', 20000.00, 'mie-jawa.jpg'),
(3, 'Roti Bakar Coklat Keju', 'Roti bakar dengan coklat lumer dan keju gurih.', 15000.00, 'roti-bakar.jpg'),
(5, 'Sandwich Ayam Crispy', 'Ayam crispy dibalut roti lembut dan sayuran segar.', 25000.00, 'sandwich.jpg'),
(6, 'Nasi Goreng Special ', 'Gurih, pedas, dan penuh topping spesial.', 18000.00, 'nasgor.png'),
(7, 'Martabak Mini', 'Gigitan kecil dengan rasa besar.', 25000.00, 'martabak.png'),
(8, 'Lumpia Basah', 'Segar, lembut, dan penuh isi.', 18000.00, 'lumpia.png'),
(9, 'Kentang Goreng', 'Sensasi Renyah di luar, lembut di dalam.', 25000.00, 'kentang.png'),
(10, 'Pisang Goreng Madu', 'Manis alami berpadu madu hangat.', 15000.00, 'pisang.png'),
(11, 'Sosis Bakar Pedas Manis', 'Gurih asap dengan sensasi pedas manis.', 15000.00, 'sosis.png');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 'Chocolate Mint Frappe', 'Coklat segar dipadukan dengan mint yang menyegarkan.', 20000.00, 'choco-mint.jpg'),
(2, 'Matcha Latte', 'Teh hijau matcha premium dicampur dengan susu segar.', 20000.00, 'matcha.jpg'),
(3, 'Avocado Coffee', 'Perpaduan alpukat segar dan espresso pilihan.', 20000.00, 'avocado-coffee.jpg'),
(5, 'Kopi Susu Gula Aren', 'Kopi robusta dengan manis alami gula aren.', 20000.00, 'gula-aren.jpg'),
(6, 'Es Kopi Coconut Latte', 'Kopi creamy dengan sentuhan kelapa.', 20000.00, 'coconut.webp'),
(7, 'Thai Tea', 'Teh susu khas Thailand, manis & segar.', 20000.00, 'thaitea.png'),
(8, 'Lemon Tea', 'Teh segar berpadu kesegaran lemon.', 20000.00, 'lemontea.png'),
(9, 'Smoothie Strawberry', 'Segar, manis, dan penuh vitamin.', 20000.00, 'strawberry.png'),
(10, 'Es Cincau Susu', 'Cincau lembut dengan susu segar.', 20000.00, 'cincau.png'),
(11, 'Wedang Jahe', 'Hangat, menenangkan, penuh rempah.', 20000.00, 'jahe.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `comment`, `created_at`) VALUES
(1, 2, 'Cafenya nyaman banget, cocok buat nongkrong lama atau kerja santai. Makanannya enak, porsinya pas, dan pelayanannya ramah banget. Salah satu tempat favorit baru saya di kota ini!', '2025-10-13 08:06:02'),
(2, 3, 'Thai Tea dan Lemon Tea di sini segar banget. Tempatnya juga kekinian dan instagramable. Sayang parkirnya terbatas, jadi kalau bawa mobil agak susah. Tapi tetap jadi tempat favorit buat ngopi.', '2025-10-13 08:38:57'),
(3, 2, 'makanan disini enak', '2025-10-14 07:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `topmenu`
--

CREATE TABLE `topmenu` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topmenu`
--

INSERT INTO `topmenu` (`id`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(5, 'Onion Rings', 'Gorengan bawang bombay dengan saus lezat.', 20000.00, 'onion-rings.jpg'),
(6, 'Mie Goreng Jawa', 'Mie goreng khas Jawa dengan bumbu rempah.', 20000.00, 'mie-jawa.jpg'),
(7, 'Roti Bakar Coklat Keju', 'Roti bakar dengan coklat lumer dan keju gurih.', 15000.00, 'roti-bakar.jpg'),
(8, 'Sandwich Ayam Crispy', 'Ayam crispy dibalut roti lembut dan sayuran segar.', 25000.00, 'sandwich.jpg'),
(9, 'Chocolate Mint Frappe', 'Coklat segar dipadukan dengan mint yang menyegarkan.', 20000.00, 'choco-mint.jpg'),
(10, 'Matcha Latte', 'Teh hijau matcha premium dicampur dengan susu segar.', 20000.00, 'matcha.jpg'),
(11, 'Avocado Coffee', 'Perpaduan alpukat segar dan espresso pilihan.', 20000.00, 'avocado-coffee.jpg'),
(12, 'Kopi Susu Gula Aren', 'Kopi robusta dengan manis alami gula aren.', 20000.00, 'gula-aren.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `phonenumber` int(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `birthdate`, `phonenumber`, `picture`, `role`) VALUES
(2, 'perwira2007@gmail.com', '$2y$10$J0YE45VXntVB5RgjI..owuyQmCMmKnQ1IfMsy/mcIk6zNrq7NCJAK', 'Favian Hakim Perwira', '0000-00-00', 0, 'favian.jpeg', 'client'),
(3, 'admin17@gmail.com', '$2y$10$tECvvGmWemGLMmPlyIX91eFtfEEZQJRlQC3GqgjdkUbXNrUUgn2Ve', 'Udin Santoso', '0000-00-00', 0, '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topmenu`
--
ALTER TABLE `topmenu`
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
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topmenu`
--
ALTER TABLE `topmenu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
