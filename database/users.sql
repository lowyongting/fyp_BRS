-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 12:49 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prefer_cate1` varchar(150) NOT NULL,
  `prefer_cate2` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `age`, `gender`, `location`, `email`, `password`, `prefer_cate1`, `prefer_cate2`) VALUES
(1, 'alice', 25, 'Female', 'Malaysia', 'alice@gmail.com', 'alice123', 'Art', 'Business & Economics'),
(2, 'jackson', 28, 'Male', 'Malaysia', 'jackson@yahoo.com', 'jackson', 'Family & Relationships', 'Health & Fitness'),
(3, 'mingjet', 30, 'Male', 'Malaysia', 'ming@gamil.com', 'mingjet', 'Health & Fitness', 'Business & Economics'),
(4, 'michelle', 18, 'Female', 'Malaysia', 'michelle@gmail.com', 'michelle', 'Young Adult Fiction', 'Sports & Recreation'),
(6, 'bernard', 22, 'Male', 'Malaysia', 'bernard@gmail.com', 'bernard', 'History', 'Music'),
(7, 'william', 15, 'Male', 'Malaysia', 'william@gmail.com', 'william', 'Cooking', 'Juvenile Fiction'),
(8, 'thomas', 17, 'Male', 'Malaysia', 'thomas@gmail.com', 'thomas', 'Computers', 'Games & Activities'),
(9, 'robert', 50, 'Male', 'Malaysia', 'robert@gmail.com', 'robert', 'Design', 'Foreign Language Study'),
(10, 'jenkin', 58, 'Male', 'Malaysia', 'jenkin@gmail.com', 'jenkin', 'Body, Mind & Spirit', 'Business & Economics'),
(11, 'rick', 70, 'Male', 'Malaysia', 'rick@gmail.com', 'rickrick', 'Nature', 'Law'),
(12, 'jessica', 52, 'Female', 'Malaysia', 'jessica@gmail.com', 'jessica', 'Cooking', 'Drama'),
(13, 'shirley', 63, 'Female', 'Malaysia', 'shirley@gamil.com', 'shirley', 'Family & Relationships', 'Self-Help'),
(14, 'jack', 33, 'Male', 'Singapore', 'jack@gmail.com', 'jack123', 'Performing Arts', 'Young Adult Nonfiction'),
(15, 'jason', 56, 'Male', 'Singapore', 'jason@yahio.com', 'jasonn', 'Humor', 'Medical'),
(16, 'chris', 65, 'Male', 'Singapore', 'chris@gmail.com', 'chris12', 'Philosophy', 'Biography & Autobiography'),
(17, 'harry', 14, 'Male', 'Singapore', 'harry@gmail.com', 'harryharry', 'Political Science', 'Travel'),
(18, 'amelia', 29, 'Female', 'Singapore', 'amelia@yahoo.com', 'amelia', 'Gardening', 'Pets'),
(19, 'josephine', 19, 'Female', 'Singapore', 'josephine@yahoo.com', 'josephine', 'Young Adult Nonfiction', 'Education'),
(20, 'grace', 69, 'Female', 'Singapore', 'grace@gmail.com', 'grace12', 'Photography', 'Sports & Recreation'),
(21, 'olivia', 49, 'Female', 'Singapore', 'olivia@yahoo.com', 'olivia', 'Crafts & Hobbies', 'Literary Collections');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
