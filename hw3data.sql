-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 03:32 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw3data`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `gid` int(11) NOT NULL,
  `genrename` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`gid`, `genrename`) VALUES
(1, 'politics'),
(2, 'entertainment'),
(3, 'comedy'),
(4, 'drama');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `identifier` int(11) NOT NULL,
  `author` varchar(25) DEFAULT NULL,
  `title` varchar(35) DEFAULT NULL,
  `number_of_ratings_so_far` int(11) DEFAULT NULL,
  `sum_of_ratings_so_far` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `submissiondate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`identifier`, `author`, `title`, `number_of_ratings_so_far`, `sum_of_ratings_so_far`, `views`, `submissiondate`) VALUES
(123, 'vasu', 'election 2016', 5, 10, 10, NULL),
(246, 'varun', 'star trek success', 3, 11, 4, NULL),
(248, 'varun', 'Running star trek entity', 3, 12, 4, NULL),
(456, 'khush', 'snl cold open', 4, 16, 11, NULL),
(789, 'vas', 'downton abbey', 5, 25, 15, NULL),
(876, 'janu', 'Running cold open spaces', 2, 8, 3, NULL),
(953, 'murari', 'College humor', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storycontent`
--

CREATE TABLE `storycontent` (
  `identifier` int(11) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storycontent`
--

INSERT INTO `storycontent` (`identifier`, `content`) VALUES
(123, 'jkjbjhbjhbhgvhgvhgvghc hfytfyty'),
(246, 'jbkjebkjbkjbjhb ijuh\r\n\r\nuhiubiubiubiubo\r\n\r\n\r\niuhiuhbiubiubibibiubiubvivy'),
(248, 'nubik bkjb kjbiubiu ikj \r\nkjbibiubiubiubi\r\n\r\njbiuubiyuyvuyvuyvytcyfxtdddgd'),
(456, 'funny cold open sketch from snl'),
(789, 'ijhbijbjhbjhbhgvvhgvgvgvg'),
(876, 'uhhiubiubiub\r\n\r\nuhiubuyhbuyvytfqytreytwfvrhwge\r\n\r\n7jrfghdb gvhd '),
(953, 'oohibjbhubhuvbuvyvyuy');

-- --------------------------------------------------------

--
-- Table structure for table `storygenre`
--

CREATE TABLE `storygenre` (
  `identifier` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storygenre`
--

INSERT INTO `storygenre` (`identifier`, `gid`) VALUES
(123, 1),
(123, 2),
(246, 2),
(248, 3),
(456, 2),
(456, 3),
(789, 4),
(876, 4),
(953, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`identifier`);

--
-- Indexes for table `storycontent`
--
ALTER TABLE `storycontent`
  ADD PRIMARY KEY (`identifier`);

--
-- Indexes for table `storygenre`
--
ALTER TABLE `storygenre`
  ADD PRIMARY KEY (`identifier`,`gid`),
  ADD KEY `gid` (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `storygenre`
--
ALTER TABLE `storygenre`
  ADD CONSTRAINT `storygenre_ibfk_1` FOREIGN KEY (`identifier`) REFERENCES `story` (`identifier`),
  ADD CONSTRAINT `storygenre_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `genre` (`gid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
