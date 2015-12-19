-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 11:33 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheapodb`
--
CREATE DATABASE IF NOT EXISTS `cheapodb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cheapodb`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `recipient_ids` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `body`, `subject`, `user_id`, `recipient_ids`) VALUES
(1, 'Hello! This is your first message! :)', 'First Message', '2', '1'),
(2, 'Testing the multiple recipients functionality', 'Test Subject', '2', '2;1'),
(3, 'Hello there! :)', 'Testing self', '2', '1'),
(4, 'Hello from the other side', 'Hola', '3', '5'),
(5, 'Blah Blah', 'Blah', '4', '1;2;3;4;5'),
(6, 'Yeah yeah', 'Yeah', '5', '1;3;4;5'),
(7, 'gjbnvnbnv', 'vbfgfgf', '1', '1;2;3;4;5'),
(8, 'gnvbvbvvc', 'Tester', '1', '1;2;3;4'),
(9, 'fhfhvb', 'Star Wars', '3', '3;4;5;1'),
(10, 'fgjnjdfnjng', 'Subject', '3', '1;2;3;4;5');

-- --------------------------------------------------------

--
-- Table structure for table `message_read`
--

CREATE TABLE `message_read` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_read`
--

INSERT INTO `message_read` (`id`, `message_id`, `reader_id`, `date`) VALUES
(1, 1, 1, '2015-12-18'),
(2, 1, 1, '2015-12-18'),
(3, 1, 1, '2015-12-18'),
(4, 1, 1, '2015-12-18'),
(5, 1, 1, '2015-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `password`, `username`) VALUES
(1, 'Shane', 'Summers', 'asd123', 'Admin'),
(2, 'Elizabeth', 'Clarje', 'qwerty123', 'lizie'),
(3, 'Mateo', 'Bale', 'd0aabe9a362cb2712ee90e04810902f3', 'relapse'),
(4, 'Saint', 'Marshall', 'Angel', 'Angel'),
(5, 'Claudia', 'Mendez', 'hello', 'holaChica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_read`
--
ALTER TABLE `message_read`
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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `message_read`
--
ALTER TABLE `message_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
