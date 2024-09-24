-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 10:38 AM
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
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `NAME`) VALUES
(1, 'Light'),
(2, 'Dark'),
(3, 'Medium'),
(4, 'The Building of Coffe'),
(5, 'Fruity'),
(6, 'Classic'),
(7, 'Rich'),
(8, 'Single Origin '),
(9, 'Blend'),
(22, 'le'),
(1222, '2asd');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `picture` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `idCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `NAME`, `description`, `picture`, `price`, `stock_quantity`, `idCat`) VALUES
(48, 'ádasdasd', 'ádasdsd', 'uploads/gangtay.webp', 12222.00, 0, 22),
(49, 'Bolivia Finca Tacu Java Natural', 'asdasd', 'uploads/5.webp', 22.00, 0, 3),
(50, 'liems', 'ádasdsa', 'uploads/5.webp', 12222.00, 0, 8),
(58, 'dasd', 'asdasd', 'uploads/doroCopy.jpg', 22.00, 0, 2),
(59, 'asdsad', 'asddasd', 'uploads/doroCopy1.jpg', 222.00, 0, 2),
(61, 'redroooster', 'sadad', 'uploads/1Copy.webp', 20222.00, 0, 7),
(62, 'Costa Rica Las Lajas Typica Black Honey', 'asd', 'uploads/coffe11Copy.png', 200000.00, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(33, 'kha', '$2y$10$GoDEKJrIy6e3vlpKWWwJROhSt.tai644simsqxcXuVFHiSxR5sFPK', 'khadpkps39702@gmail.com'),
(34, 'ccddc', '$2y$10$aFqVqgpAKc/Mh9kKdU73GuyeYQV0s4sbN9ygdEUezso6cHFD853JO', 'khadoan.190809@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCat` (`idCat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1223;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
