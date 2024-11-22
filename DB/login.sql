-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 07:15 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int UNSIGNED NOT NULL,
  `ref_no` varchar(100) NOT NULL COMMENT 'System generated Reference Number',
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created` varchar(200) NOT NULL,
  `edited` varchar(200) NOT NULL,
  `deleted` varchar(200) DEFAULT NULL,
  `status` mediumint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='register the Employee';

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `ref_no`, `username`, `email`, `password`, `photo`, `created`, `edited`, `deleted`, `status`) VALUES
(1, '3421732217326', 'pratik', 'pratik@gmail.com', 'Zit5RnJvbG8zcjg5R3I2U0JMTFJGZz09', '4991732218594.webp', '21-11-2024 19:28:46', '21-11-2024 19:50:07', '', 1),
(2, '4361732264815', 'test', 'test@gmail.com', 'MVRZTDJzRjNiUnIvRTNmZlNRcVZtZz09', '3881732264815.webp', '22-11-2024 08:40:15', '22-11-2024 08:40:15', NULL, 1),
(3, '6001732265776', 'Pm', 'p@gmail.com', 'ZGJuWERyaFAwbXhFelFUcE4weFM3UT09', '8041732265776.webp', '22-11-2024 08:56:16', '22-11-2024 08:56:16', NULL, 1),
(4, '8601732265867', 'Shubham', 'Sh@gmail.com', 'TitldjlDaS85WUx0SlREczljVWF3QT09', '8731732272779.png', '22-11-2024 08:57:47', '22-11-2024 11:07:12', NULL, 1),
(5, '5441732266001', 'pratikM', 'pratikM@gmail.com', 'Zit5RnJvbG8zcjg5R3I2U0JMTFJGZz09', '2601732266001.webp', '22-11-2024 09:00:01', '22-11-2024 09:00:01', NULL, 1),
(8, '1751732291917', 'Vaibha', 'vaibhav@gmail.com', 'MS8yZDBHeGpldUh4dkRtbXdpRllRQT09', '3821732291917.png', '22-11-2024 16:11:57', '22-11-2024 16:11:57', NULL, 1),
(9, '6861732292057', 'Madan', 'madan@gmail.com', 'c21uOXVMdFJVelhhai9HNG5XZUoxUT09', '3151732292880.webp', '22-11-2024 16:14:17', '22-11-2024 16:28:00', NULL, 1),
(11, '8021732295636', 'Sunil', 'sunil@gmail.com', 'VFVEY1ZaWFBqdXJ6Ylhqc1puN3FMQT09', '1281732295636.png', '22-11-2024 17:13:56', '22-11-2024 17:13:56', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `photo` (`photo`),
  ADD KEY `created` (`created`),
  ADD KEY `edited` (`edited`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `ref_no` (`ref_no`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
