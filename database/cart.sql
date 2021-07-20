-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 06:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp_brs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `book_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `book_id`) VALUES
(5, 1, '8URjCwAAQBAJ'),
(6, 2, '2oCTDwAAQBAJ'),
(7, 2, 'R7TtDwAAQBAJ'),
(9, 3, 'EjX-DwAAQBAJ'),
(10, 3, 'MqdSIpKgEZMC'),
(11, 4, 'kU5sAAAAQBAJ'),
(14, 1, 'R6FZwlmQMuoC'),
(15, 4, 'RBFxBAAAQBAJ'),
(16, 6, 'aIRSDwAAQBAJ'),
(17, 6, '2SnvBQAAQBAJ'),
(18, 7, 'Amg_BAAAQBAJ'),
(19, 7, 'A0F9AwAAQBAJ'),
(20, 8, 'SJXkCgAAQBAJ'),
(21, 8, 'IqPcAwAAQBAJ'),
(22, 9, '6fljDwAAQBAJ'),
(23, 9, 'o2kaAwAAQBAJ'),
(24, 10, 'xogGqJzowKYC'),
(25, 10, '5HAWEAAAQBAJ'),
(26, 11, 'CQXFDwAAQBAJ'),
(27, 11, 'EmMGEAAAQBAJ'),
(28, 13, '0b6z-FayzAwC'),
(29, 13, '8w5FDwAAQBAJ'),
(30, 12, '6E-SDwAAQBAJ'),
(31, 12, 'RYkHEAAAQBAJ'),
(32, 14, '3FlxiXCk6SEC'),
(33, 14, 'BClH3ZE3iPAC'),
(34, 15, 'WhsEAwAAQBAJ'),
(35, 15, '5AtwDQAAQBAJ'),
(36, 16, '-Edm774ZhVwC'),
(37, 16, '6Hf3DwAAQBAJ'),
(38, 17, '2qMvDwAAQBAJ'),
(39, 18, 'Xc4apEZIM0AC'),
(40, 18, 'KCJjDwAAQBAJ'),
(41, 19, 'FhF4BgAAQBAJ'),
(42, 19, '3nZpBAAAQBAJ'),
(43, 20, 'N2AuDwAAQBAJ'),
(44, 20, '594WCQAAQBAJ'),
(45, 21, '1HJODwAAQBAJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
