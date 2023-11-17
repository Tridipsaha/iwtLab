-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 07:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin&employe`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(100) NOT NULL,
  `name` varchar(11) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(80) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `dob` date DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `roll` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `email`, `password`, `gender`, `dob`, `course`, `roll`) VALUES
(5, 'Tridip saha', 'tridipsaha@gmail.com', '123', 'M', '2023-10-25', 'MSC', 'employe'),
(6, 'TRIDIP SAHA', '22352072@po', '111', '', NULL, NULL, 'admin'),
(7, 'TRIDIP SAHA', '22352072@po', '111', '', NULL, NULL, 'admin'),
(8, 'indra', 'indra@gmail', '222', '', NULL, NULL, 'admin'),
(9, 'tapas', 'tapas123@gmail.com', '111', 'M', '2023-10-02', 'M.Tech', 'employe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
