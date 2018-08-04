-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2018 at 04:25 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schola34_karansorey`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Karan de homo', 'karankalikadien@hotmail.com', '1ca93ae77f0e14b13df744be48a1a80f'),
(2, 'Test', 'test@admin.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `zipcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `company_name`, `email`, `city`, `address`, `zipcode`) VALUES
(2, ' Gay BV', 'karankalikadien@hotmail.com', 'Zoetermeer', 'Cyprus, 57', '2721 LM'),
(3, 'Escort', 'jason@gmail.com', 'rotterdam', 'klaaner12', '2734gas'),
(5, 'Toorsol', 'contact@toorsol.com', 'Islamabad', 'Office # 5, Masco Plaza, Opp. Stock Exchange Tower', '44000'),
(6, 'karan', 'karansorey@gmail.com', 'levftesnue', 'rees', '2546hg'),
(7, 'test2', 'karankalikadien@hotmail.com', 'laan', 'test', '2453hs'),
(8, 'karansorey1', 'karansorey@gmail.com', 'testen', 'test2', '2456pk');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `major_bug` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `description` longtext,
  `accept` int(11) NOT NULL,
  `accept_date` text,
  `accept_time` text,
  `accepted_by` text,
  `accepted_by_sig` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `company_name`, `major_bug`, `date`, `time`, `description`, `accept`, `accept_date`, `accept_time`, `accepted_by`, `accepted_by_sig`) VALUES
(1, 'silence', 'Major', '1111-11-11', '11:11', '<p>dddd</p>', 0, NULL, NULL, NULL, ''),
(4, 'Toorsol', 'Bug Fix', '2018-06-08', '14:22', '<p>Sample form by karensorey</p>', 1, '2018-06-09', '08:06', 'Toor', 'doc_signs/41050b2fba98773f7f9ce90a287fd5bd.png'),
(5, 'karan', 'Major', '2018-11-11', '11:11', '<p>update patch</p>', 1, '2018-06-09', '10:06', 'karan', 'doc_signs/f919f25b1e5307772c01c3ad9b6e815c.png'),
(8, 'Toorsol', 'Major', '2018-06-08', '00:12', '<p>acbiab coihbc oushb uhb cusdhcuhsadhus dh ush usadh us</p>', 1, '2018-06-10', '13:24', 'Toor', 'doc_signs/7a52092b1b99aab8b36778570dacf1be.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
