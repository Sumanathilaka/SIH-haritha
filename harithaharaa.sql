-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 09:32 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harithaharaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `username` varchar(255) NOT NULL,
  `stage1` tinyint(1) NOT NULL DEFAULT '0',
  `stage1_pic` varchar(255) DEFAULT NULL,
  `stage1_verified` tinyint(1) NOT NULL DEFAULT '0',
  `stage2` tinyint(1) NOT NULL DEFAULT '0',
  `stage2_pic` varchar(255) DEFAULT NULL,
  `stage2_verified` tinyint(1) NOT NULL DEFAULT '0',
  `stage3` tinyint(1) NOT NULL DEFAULT '0',
  `stage3_pic` varchar(255) DEFAULT NULL,
  `stage3_verified` tinyint(1) NOT NULL DEFAULT '0',
  `stage4` tinyint(1) NOT NULL DEFAULT '0',
  `stage4_pic` varchar(255) DEFAULT NULL,
  `stage4_verified` tinyint(1) NOT NULL DEFAULT '0',
  `stage5` tinyint(1) NOT NULL DEFAULT '0',
  `stage5_pic` varchar(255) DEFAULT NULL,
  `stage5_verified` tinyint(1) NOT NULL DEFAULT '0',
  `challenge_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`username`, `stage1`, `stage1_pic`, `stage1_verified`, `stage2`, `stage2_pic`, `stage2_verified`, `stage3`, `stage3_pic`, `stage3_verified`, `stage4`, `stage4_pic`, `stage4_verified`, `stage5`, `stage5_pic`, `stage5_verified`, `challenge_id`) VALUES
('deshank', 1, 'seed.jpg', 1, 1, 'leaf.jpg', 1, 1, 'flower.jpg', 1, 1, 'fruit.jpg', 0, 0, NULL, 0, 1),
('deshank', 1, 'seed.jpg', 1, 1, 'leaf.jpg', 1, 1, 'flower.jpg', 0, 0, NULL, 0, 0, NULL, 0, 2);

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
('wow nice one', '2019-02-23 08:51:32', 6, 'deshank', 16),
('', '2019-02-25 13:26:36', 7, 'deshank', 3),
('', '2019-02-25 13:26:45', 8, 'deshank', 2),
('Hello', '2019-02-25 13:26:53', 9, 'deshank', 2);

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
('deshank', 1, 'blog-2.jpg', 'I found an awesome place to travel. but don\'t forget to carry a plant with u. Plant it there. One day u will be happy.', 'NITC', '2019-02-21 17:30:00', 'blog-3.jpg', 0),
('venky', 2, 'img_bg_4.jpg', 'wow simply awesome place with green world\r\n#greenArmy\r\n#greenWorld', 'Calicut', '2019-02-23 09:20:29', 'null', 1),
('deshank', 3, 'null', 'Have you seen this? No visit my web Site\r\ndeshankoshala.freeoda.com', 'NITC', '2019-02-22 05:10:18', 'null', 0),
('deshank', 10, 'null', 'Hi guys iam deshan From NITC ', 'NITC', '2019-02-22 12:24:23', 'null', 0),
('deshank', 11, '123.jpg', 'welcome to green world lets rock the world', 'NITC', '2019-02-22 12:31:18', '1235.jpg', 0),
('viggnahs', 15, '123456.png', 'hi guys how are you ? i found something', 'NITC', '2019-02-23 08:16:16', 'null', 0),
('viggnahs', 16, 'Screenshot.png', 'happy people happy army', 'NITC', '2019-02-23 08:21:41', 'null', 0);

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
  `location` varchar(255) NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  `postalcode` int(6) NOT NULL,
  `image_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`username`, `name`, `email`, `mobile`, `address`, `location`, `coordinator`, `postalcode`, `image_id`) VALUES
('deshank', 'Deshan Koshala', 'deshankoshala@gmail.com', 2137027213, 'Room 106 g hostel, nitc,calicut', 'https://goo.gl/maps/1gp4ELP3KWU2', 'mr arjun', 673601, '123.png'),
('venky', 'venkatesh Raju', 'vennevan@gmail.com', 123456789, 'Room no 106, Fhostel,Nitc,Calicut', 'https://goo.gl/maps/1gp4ELP3KWU2', 'Mr arajun', 673601, '123123.png'),
('viggnahs', 'viggnah selvaraj', 'viggnah@gmail.com', 123456789, 'Room 105, f hsotel,nitc,calicut', 'googlemap/f hostel', 'Mr prathap', 673601, '562.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`challenge_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

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
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `challenge_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
