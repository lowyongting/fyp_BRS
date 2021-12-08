-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 11:46 AM
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
  `book_id` varchar(200) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `book_id`, `quantity`) VALUES
(5, 1, '8URjCwAAQBAJ', 1),
(6, 2, '2oCTDwAAQBAJ', 11),
(7, 2, 'R7TtDwAAQBAJ', 13),
(9, 3, 'EjX-DwAAQBAJ', 3),
(10, 3, 'MqdSIpKgEZMC', 2),
(11, 4, 'kU5sAAAAQBAJ', 15),
(15, 4, 'RBFxBAAAQBAJ', 6),
(16, 6, 'aIRSDwAAQBAJ', 1),
(17, 6, '2SnvBQAAQBAJ', 1),
(18, 7, 'Amg_BAAAQBAJ', 1),
(19, 7, 'A0F9AwAAQBAJ', 1),
(20, 8, 'SJXkCgAAQBAJ', 1),
(21, 8, 'IqPcAwAAQBAJ', 1),
(22, 9, '6fljDwAAQBAJ', 1),
(23, 9, 'o2kaAwAAQBAJ', 1),
(24, 10, 'xogGqJzowKYC', 1),
(25, 10, '5HAWEAAAQBAJ', 1),
(26, 11, 'CQXFDwAAQBAJ', 1),
(27, 11, 'EmMGEAAAQBAJ', 1),
(28, 13, '0b6z-FayzAwC', 1),
(29, 13, '8w5FDwAAQBAJ', 1),
(31, 12, 'RYkHEAAAQBAJ', 3),
(32, 14, '3FlxiXCk6SEC', 1),
(33, 14, 'BClH3ZE3iPAC', 1),
(34, 15, 'WhsEAwAAQBAJ', 1),
(35, 15, '5AtwDQAAQBAJ', 1),
(36, 16, '-Edm774ZhVwC', 1),
(37, 16, '6Hf3DwAAQBAJ', 1),
(38, 17, '2qMvDwAAQBAJ', 1),
(41, 19, 'FhF4BgAAQBAJ', 1),
(42, 19, '3nZpBAAAQBAJ', 1),
(43, 20, 'N2AuDwAAQBAJ', 1),
(44, 20, '594WCQAAQBAJ', 1),
(45, 21, '1HJODwAAQBAJ', 4),
(46, 1, '-FgoDwAAQBAJ', 1),
(47, 22, 'BGpACwAAQBAJ', 1),
(48, 22, '76AlAgAAQBAJ', 1),
(49, 3, 'HQqWDwAAQBAJ', 3),
(50, 20, 'BGNjDwAAQBAJ', 1),
(51, 4, 'bC0gk3t8d8AC', 3),
(52, 18, 'PCJjDwAAQBAJ', 5),
(53, 18, 'HeVaDwAAQBAJ', 2),
(54, 18, '1HJODwAAQBAJ', 4),
(57, 18, 'KCJjDwAAQBAJ', 8),
(58, 3, '0cDeDwAAQBAJ', 6);

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
  MODIFY `cart_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
