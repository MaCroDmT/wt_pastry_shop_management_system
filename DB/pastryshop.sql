-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 06:25 PM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `paddress` varchar(64) NOT NULL,
  `daddress` varchar(64) NOT NULL,
  `phone` int(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `gender`, `paddress`, `daddress`, `phone`, `email`, `pass`) VALUES
(1, 'Fardin Abu Ubaid', 22, 'male', 'Nikunja2, Khilkhet', 'H10, R15, Nikunja2, Khilkhet', 1770366022, 'fardinkenway7560@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` int(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `doj` varchar(16) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `sal` int(7) NOT NULL DEFAULT 0,
  `pos` varchar(32) NOT NULL DEFAULT 'Waiter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `email`, `address`, `doj`, `pass`, `sal`, `pos`) VALUES
(1, 'Fardin Abu Ubaid', 1770366022, 'fardinkenway7560@gmail.com', 'Nikunja2, Khilkhet', '12/02/2024', '123', 0, 'Waiter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
