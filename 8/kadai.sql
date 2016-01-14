-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2016 at 01:12 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadai`
--

-- --------------------------------------------------------

--
-- Table structure for table `kadai`
--

CREATE TABLE `kadai` (
  `ID` int(12) NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fish` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pet` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hometown` varchar(30) CHARACTER SET ujis NOT NULL,
  `starwars` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datenow` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kadai`
--

INSERT INTO `kadai` (`ID`, `firstname`, `lastname`, `email`, `password`, `fish`, `pet`, `hometown`, `starwars`, `datenow`) VALUES
(6, 'Test', 'Master', 'test@master.com', 'testmaster', 'wefjpo', 'ergioi', 'ç§?ç”°çœŒ', '8', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kadai`
--
ALTER TABLE `kadai`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kadai`
--
ALTER TABLE `kadai`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
