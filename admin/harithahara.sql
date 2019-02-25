-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2019 at 01:11 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harithahara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `telephone`, `email`, `profile_pic`) VALUES
('devu1997', 'Devika S', 9497067789, 'smileydevu@gmail.com', 'php4aGfLF');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment` varchar(512) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `commentid` int(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment`, `time`, `commentid`, `username`, `post_id`) VALUES
('nice', '2019-02-23 17:46:09', 1, 'deshank', 11),
('hi deshan', '2019-02-23 17:47:49', 2, 'deshank', 10),
('wow', '2019-02-22 18:38:08', 3, 'deshank', 1),
('hello', '2019-02-22 18:48:11', 4, 'deshank', 2),
('thanks', '2019-02-22 18:48:28', 5, 'deshank', 10),
('wow nice one', '2019-02-23 08:51:32', 6, 'deshank', 16);

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
('', '', '', 0, '', 12.97, 77.59, 0, NULL),
('aysha_b150587cs', 'Aysha', 'ameersuhailpa20@gmail.com', 46765677, 'fghnvghf', 12.97, 77.59, 4325, 'php5LDJva'),
('B150243CS', 'Devika', 'smileydevu@gmail.com', 1132, 'Cherupully House, Manjapra P O, Ernakulam, Kerala - 683581', 34.23, 113.4556, 683581, ''),
('devika_b150243cs', 'ghjk', 'bnm@s.com', 345678, 'cvbnm', 22.97, 77.59, 683581, NULL),
('hikaa', 'ghj', 'a@b.bom', 23456, 'rxghv,jhhj', 15.97, 77.59, 683581, NULL),
('madhumitha', 'Madhumitha', 'madhumitha@s.com', 782437878, 'bsdfjkm,gkdfj', 12.967846236175715, 77.5260212683678, 683581, NULL),
('SAC', 'sdfg', 'hfgh@s.com', 234567890, 'xdcfvgbhnjm', 15.334, 115, 345678, '123.png'),
('SACf', 'sdfg', 'hfgh@s.com', 111111111, 'xdcfvgbhnjm', 1, 113.455, 345678, NULL),
('SACfa', 'sdfg', 'hfgh@s.com', 111111111, 'xdcfvgbhnjm', 1, 112.455, 345678, NULL),
('sdasda', 'sad', 'a@b.bom', 1221231, 'wscdsc', 12.22, 115.22, 231233, NULL),
('venky', 'venkatesh Raju', 'vennevan@gmail.com', 123456789, 'Room no 106, Fhostel,Nitc,Calicut', 24.222, 112.344, 673601, NULL),
('viggnahs', 'viggnah selvaraj', 'viggnah@gmail.com', 123456789, 'Room 105, f hsotel,nitc,calicut', 23.578, 112.455, 673601, '1234.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_request`
--

CREATE TABLE `coordinator_request` (
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followtable`
--

CREATE TABLE `followtable` (
  `followid` int(255) NOT NULL,
  `follower` varchar(255) NOT NULL,
  `followee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followtable`
--

INSERT INTO `followtable` (`followid`, `follower`, `followee`) VALUES
(1, 'deshank', 'venky'),
(3, 'deshank', 'viggnahs'),
(6, 'viggnahs', 'deshank');

-- --------------------------------------------------------

--
-- Table structure for table `liketable`
--

CREATE TABLE `liketable` (
  `postid` int(255) NOT NULL,
  `likeid` int(255) NOT NULL,
  `nolikes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('aysha_b150587cs', 'password', 'COORDINATOR'),
('a_b', 'password', 'VOLUNTEER'),
('a_b150587cs', 'password', 'VOLUNTEER'),
('deshank', 'password', 'COORDINATOR'),
('devu1997', '12345', 'ADMIN'),
('madhumitha', 'password', 'COORDINATOR');

-- --------------------------------------------------------

--
-- Table structure for table `newquestion`
--

CREATE TABLE `newquestion` (
  `question_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('deshank', 2, 'viggnahs followed you', 1);

-- --------------------------------------------------------

--
-- Table structure for table `postdetails`
--

CREATE TABLE `postdetails` (
  `username` varchar(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picture2` varchar(255) NOT NULL,
  `posttype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postdetails`
--

INSERT INTO `postdetails` (`username`, `post_id`, `picture`, `text`, `location`, `time`, `picture2`, `posttype`) VALUES
('deshank', 1, '123.png', 'I found an awesome place to travel. but don\'t forget to carry a plant with u. Plant it there. One day u will be happy.', 'NITC', '2019-02-25 06:05:33', '123.png', 0),
('venky', 2, 'q1.tif', 'wow simply awesome place with green world\r\n#greenArmy\r\n#greenWorld', 'Calicut', '2019-02-25 05:55:41', 'null', 1),
('deshank', 3, 'null', 'Have you seen this? No visit my web Site\r\ndeshankoshala.freeoda.com', 'NITC', '2019-02-22 05:10:18', 'null', 0),
('deshank', 10, 'null', 'Hi guys iam deshan From NITC ', 'NITC', '2019-02-22 12:24:23', 'null', 0),
('deshank', 11, 'q1.tif\n', 'welcome to green world lets rock the world', 'NITC', '2019-02-25 06:05:43', '1235.jpg', 0),
('viggnahs', 15, 'q1.tif\n', 'hi guys how are you ? i found something', 'NITC', '2019-02-25 06:12:17', 'null', 0),
('viggnahs', 16, 'Screenshot.png', 'happy people happy army', 'NITC', '2019-02-23 08:21:41', 'null', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `answer`) VALUES
(11, 'What is the scientific name of Peepal tree?', 'My khnsadajd'),
(12, 'List few shade trees', 'Mahagoby'),
(13, 'Tell me what are the required nutients for a mango tree?', 'A,B,C'),
(14, 'Tell me what are the required nutients for a mango tree?', 'A,B,C'),
(15, 'Tell me what are the required nutients for a mango tree?', 'A,B,C'),
(16, 'List few shade trees', '7y8yuuh');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportid` int(255) NOT NULL,
  `reporter` varchar(255) NOT NULL,
  `postid` int(200) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportid`, `reporter`, `postid`, `reason`) VALUES
(1, 'deshank', 2, 'this image seen to be fake');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  `postalcode` int(6) NOT NULL,
  `image_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`username`, `name`, `email`, `mobile`, `address`, `latitude`, `longitude`, `coordinator`, `postalcode`, `image_id`) VALUES
('a_b', 'Aysha', 'ameersuhailpa20@gmail.com', 46765677, 'fghnvghf', 12.97, 77.59, 'venky', 4325, 'php9bZgDe'),
('deshank', 'Deshan Koshala', 'deshankoshala@gmail.com', 2137027213, 'Room 106 g hostel, nitc,calicut', 28.9999, 112.556, 'mr arjun', 673601, NULL),
('venky', 'venkatesh Raju', 'vennevan@gmail.com', 123456789, 'Room no 106, Fhostel,Nitc,Calicut', 24.222, 112.344, 'Mr arajun', 673601, 'q1.tif'),
('viggnahs', 'viggnah selvaraj', 'viggnah@gmail.com', 123456789, 'Room 105, f hsotel,nitc,calicut', 26.433, 114.322, 'Mr prathap', 673601, '123.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `coordinator_request`
--
ALTER TABLE `coordinator_request`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `followtable`
--
ALTER TABLE `followtable`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `liketable`
--
ALTER TABLE `liketable`
  ADD PRIMARY KEY (`likeid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `newquestion`
--
ALTER TABLE `newquestion`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationid`);

--
-- Indexes for table `postdetails`
--
ALTER TABLE `postdetails`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `followtable`
--
ALTER TABLE `followtable`
  MODIFY `followid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `liketable`
--
ALTER TABLE `liketable`
  MODIFY `likeid` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newquestion`
--
ALTER TABLE `newquestion`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postdetails`
--
ALTER TABLE `postdetails`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
