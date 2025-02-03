-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 07:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pastryshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `ref` varchar(500) NOT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `pass`, `bio`, `ref`, `img`) VALUES
(3, 'Fardin Abu Ubaid', 'fardinkenway@gma', '01678970001', 'ww@', 'hbujujvgu', 'facebook.com/fardin6699898', NULL),
(6, 'DOPHY', 'dophy@gmail.com', 'dophy@gmail.com', 'ww@', 'none none none', 'nune', NULL),
(7, 'Prottoy saha', '01745547575l', 'prottoys28@gmail.com', 'ww@', 'housefull 3', 'none', NULL),
(9, 'prottoy', '01745547578', 'prottoys28@gmail.com', 'wemethey4', 'no boi', 'no ref', NULL),
(11, 'Mohhamad Rakib', 'rakib@gmail.com', '01545547578', 'wemethey4', 'no', 'nai', NULL),
(12, 'Sanjib Saha', '01710475192', 'sahasanjib336616@gmail.com', 'wemethey4', 'none', 'none', NULL),
(13, 'Muhtasib_Ibtida_Kousik', '01145547578', 'sk.muhtasib@gmail.com', 'muhtasib336616', 'nai', 'nai', NULL),
(14, 'Angshu Dey', '0131311313', 'angshu@gmail.com', 'wemethey4', 'bio none', 'no ref', NULL),
(15, 'PronoySaha', '01745547578', 'pronoy336616@gmail.com', 'wemethey4', 'no', 'no', NULL),
(16, 'TanmoySaha', '01745547578', 'tanmoy20@gmail.com', 'wemethey4', 'no bio', 'no ref', NULL),
(17, 'RowdraSaha', '01678970001', 'rowdra336616@gmail.com', 'wemethey4', 'no', 'none', NULL),
(19, 'Nitai Saha', '01745547578', 'nitai@gmail.com', 'wemethey4', 'no bio', 'no ref', NULL),
(20, 'FARDIN ABU UBAID', '01745547578', 'fardin@gmail.com', 'wemethey4', 'no', 'no', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
