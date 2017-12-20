-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2017 at 12:38 PM
-- Server version: 10.0.31-MariaDB-cll-lve
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
-- Database: `batechnol_cisco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `email`, `phone`, `password`) VALUES
(1, 'ciscoadmin', 'admin@gmail.com', '9995551110', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'admin', 'admin@gmail.com', '9876543210', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `userid`, `filename`, `name`, `description`) VALUES
(3, '5', 'testmachine4.ovf', '', ''),
(4, '6', 'sampleovf.ovf', '', ''),
(5, '9', 'test1.ovf', 'test', 'testf'),
(6, '9', 'test1 (1).ovf', 'sha', 'sha'),
(7, '9', 'test1 (1) (1).ovf', 'test', 'test'),
(8, '12', 'testmachine8.ovf', 'new test file', 'test new file'),
(9, '13', 'gn.ovf', 'First_batch', '1st test file'),
(10, '14', 'virl.ovf', 'virl', 'gyii');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `lastname`, `email`, `password`, `status`) VALUES
(1, 'ciscouser', '', 'user123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'active'),
(3, 'test', '', 'test@gmaail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'deactive'),
(5, 'test', '', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'active'),
(6, 'madhu', '', 'madhu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active'),
(7, 'rash', '', 'rash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active'),
(8, 'rash', '', 'rash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'deactive'),
(9, 'sharan', 'balaji', 'sharan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'active'),
(11, 'mani', 'kandan', 'mani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active'),
(12, 'madhu', 'mitha', 'madhu123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'active'),
(13, 'Gns3', 'Topology', 'gn3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active'),
(14, 'virl', 'team', 'virl@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'active'),
(15, 'gns3', 'team', 'gns3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'notactive'),
(16, 'gns3', 'team', 'gns3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'notactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
