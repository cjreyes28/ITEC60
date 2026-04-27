-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 01:53 PM
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
-- Database: `itec60`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `tbl_user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` int(6) NOT NULL,
  `is_verify` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`tbl_user_id`, `first_name`, `last_name`, `contact_number`, `email`, `username`, `password`, `verification_code`, `is_verify`) VALUES
(1, 'Lorem', 'Ipsum', '2147483647', 'lorem.ipsum.sample.email@gail.com', 'admin', 'admin', 965225, 0),
(8, 'john', 'las', '87978', 'johndavid.parado@cvsu.edu.ph', 'daiZ', '$2y$10$4RIT/hFIL6cSHlVrENoS6ObPA5kJQFy5Azz8jmkA7EMFWdpxOhoQW', 160022, 1),
(9, 'john', 'pass', '87979', 'johndavidparado2@gmail.com', 'david', '$2y$10$kTU5hUO8tnW00e89y5ekaeBiahqjmFolvJZwFY4nza2Af4/fNbXnO', 505744, 1),
(10, 'johndavid', 'parado', '099991919', 'lastrollomark@gmail.com', 'las', '$2y$10$AHz/ddRIh7OEwt7Qx7zsqOnmIxBCKrZIJv1gvO.VSBy.ITjjAIea.', 186112, 1),
(12, 'mat', 'hatosa', '09556959556', 'johnmathewrhatosa@gmail.com', 'jmhatosa', '$2y$10$fQYx2di6tM/OfK2JCTduaOFC8X3SgUTGeo5yspxHTXnXQWf3RRQMS', 202848, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`tbl_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `tbl_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
