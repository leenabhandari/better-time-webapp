-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2017 at 03:37 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `media`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `des` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `des`) VALUES
(2, 'i agree'),
(5, 'publicity stunt');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subject` longtext NOT NULL,
  `description` longtext NOT NULL,
  `agree` int(11) NOT NULL DEFAULT '0',
  `disagree` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `name`, `subject`, `description`, `agree`, `disagree`) VALUES
(1, 'abc', 'Jio broke myth of India not ready for advanced tech.', 'Reliance Industries Chairman Mukesh Ambani said his "biggest personal satisfaction" is that Jio has broken the myth that India is not ready to adopt advanced technology. "The way the country has embraced 4G technology...is already a case study for quantum technology leaps," he added. He further said that in one year, Jio has broken several records in India and globally.', 0, 0),
(2, 'abc', 'Reliance Jio set several records while crossing the 130 million customers', 'Reliance Industries Chairman Mukesh Ambani said his "biggest personal satisfaction" is that Jio has broken the myth that India is not ready to adopt advanced technology. "The way the country has embraced 4G technology...is already a case study for quantum technology leaps," he added. He further said that in one year, Jio has broken several records in India and globally.', 3, 0),
(4, '', 'A Gentleman review', 'This latest outing by Raj and DK is a spy spoof cum thriller cum love story, and while the going is good, itâ€™s not bad. But you have to wait the no-go bits out, and in the two hour and some run time, there are too many of those about.', 2, 1),
(5, 'kk', 'Hrithik Roshan-Kangana Ranaut fight', 'http://indiatoday.intoday.in/story/hrithik-roshan-kangana-ranaut-fight/1/1043798.html', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
