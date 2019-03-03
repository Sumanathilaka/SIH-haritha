-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2019 at 11:35 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HarithaHara`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `postalcode` int(6) NOT NULL,
  `image_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`username`, `name`, `email`, `mobile`, `address`, `latitude`, `longitude`, `postalcode`, `image_id`) VALUES
('venky', 'venkatesh Raju', 'vennevan@gmail.com', 123456789, 'Room no 106, Fhostel,Nitc,Calicut', 24.222, 112.344, 673601, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','volunteer','coordinator','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `email`, `password`, `role`) VALUES
('evan', 'vennevan@gmail.com', 'hello', 'volunteer'),
('evanvenn', 'vennevan@gmail.com', 'hello', 'volunteer'),
('vennevan', 'vennevan@gmail.com', 'hello', 'volunteer'),
('venkatesh', 'vennevan@gmail.com', 'hello', 'volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `username` varchar(255) NOT NULL,
  `notificationid` int(255) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `notificationtype` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`username`, `notificationid`, `notification`, `notificationtype`) VALUES
('venkatesh', 1, 'A volunteer has been registered', 5);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `coordinator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`name`, `username`, `email`, `mobile`, `address`, `city`, `pincode`, `state`, `country`, `longitude`, `latitude`, `coordinator`) VALUES
('evan', 'evan', 'vennevan@gmail.com', 918137093628, 'H.no 10-5-7/2,R.L nagar,rampally', 'HYDERABAD', 673601, 'india', 'India', 77.0273229, 29.2057032, 'venky'),
('evan', 'evanvenn', 'vennevan@gmail.com', 918137093628, 'H.no 10-5-7/2,R.L nagar,rampally', 'HYDERABAD', 673601, 'india', 'India', 77.0273229, 29.2057032, 'venky'),
('evan', 'venkatesh', 'vennevan@gmail.com', 918137093628, 'H.no 10-5-7/2,R.L nagar,rampally', 'HYDERABAD', 673601, 'india', 'India', 77.0273229, 29.2057032, 'venky'),
('evan', 'vennevan', 'vennevan@gmail.com', 918137093628, 'H.no 10-5-7/2,R.L nagar,rampally', 'HYDERABAD', 673601, 'india', 'India', 77.0273229, 29.2057032, 'venky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationid`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
