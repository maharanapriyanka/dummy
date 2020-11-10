-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 06:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `morefield`
--

CREATE TABLE `morefield` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` int(12) NOT NULL,
  `state` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `check_field` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `morefield`
--

INSERT INTO `morefield` (`id`, `name`, `contact`, `state`, `gender`, `check_field`, `image`) VALUES
(1, 'baba', 2147483647, 'odisha', 'male', '', ''),
(2, 'mama', 2147483647, 'up', 'male', '', ''),
(3, 'pappu', 2147483647, 'delhi', '', '', ''),
(4, 'upload', 3254789, 'up', 'male', '', ''),
(27, '', 0, '', '', '', 'IMG-20181217-WA0043.jpg'),
(44, 'jjaka', 33232, 'up', 'male', '', 'IMG-20190113-WA01031.jpg'),
(45, 'insrted', 123, 'odisha', 'male', '', 'IMG-20190206-WA0040.jpg'),
(46, 'next', 321, 'up', '', '', 'tuna_k_s_naga_20190414_101210.jpg'),
(47, 'last', 654, 'mumbai', '', '', 'Atma_Ram_20190515_230916.jpg'),
(48, 'cheking', 889, 'mumbai', 'male', 'c', 'IMG-20181217-WA00461.jpg'),
(49, 'kaka', 2355, 'mumbai', 'female', 'c', 'IMG-20181217-WA0037.jpg'),
(50, 'raja', 1236547, 'delhi', 'male', 'checkcheck1check2', 'IMG-20190113-WA0072.jpg'),
(51, 'waiz', 2456987, 'delhi', 'male', 'check,check1', 'IMG-20190210-WA0015.jpg'),
(52, 'checking1', 2455, 'mumbai', 'male', 'check1,check2,check,check1,check2', 'IMG-20190113-WA0081.jpg'),
(53, 'checking again', 32456, 'up', '', 'check1,check2,check,check1,check2', 'IMG-20181217-WA0040.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `morefield`
--
ALTER TABLE `morefield`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `morefield`
--
ALTER TABLE `morefield`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
