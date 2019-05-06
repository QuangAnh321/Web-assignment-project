-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 06:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webassignment`
--
CREATE DATABASE IF NOT EXISTS `webassignment` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `webassignment`;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `photo_title` varchar(100) NOT NULL,
  `photo_description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_title`, `photo_description`, `user_id`, `photo_dir`) VALUES
(33, 'Night sky', 'Beautiful sky ', 4, 'image/test 2.jpg'),
(34, 'The Squad', '3c-16 members', 4, 'image/test.jpg'),
(35, 'O Quy Ho pass', 'O Quy Ho pass near Sapa, Lao Cai', 4, 'image/test 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(29, 'Landscape'),
(30, 'Astrophotography'),
(32, 'People'),
(33, 'Mountainous');

-- --------------------------------------------------------

--
-- Table structure for table `tag_photo`
--

CREATE TABLE `tag_photo` (
  `photo_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_photo`
--

INSERT INTO `tag_photo` (`photo_id`, `tag_id`) VALUES
(33, 29),
(33, 30),
(34, 32),
(35, 29),
(35, 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'abc', '202cb962ac59075b964b07152d234b70', 'abc@gmail.com'),
(2, 'abcd', '81dc9bdb52d04dc20036dbd8313ed055', 'abc@gmail.com'),
(3, 'abc', '81dc9bdb52d04dc20036dbd8313ed055', 'abc@gmail.com'),
(4, 'lmao', '25f9e794323b453885f5181f1b624d0b', 'lmao@gmail.com'),
(7, 'nhathuy7996', '5e36941b3d856737e81516acd45edc50', 'nhat.huy.7996@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `user_id_idx` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tag_photo`
--
ALTER TABLE `tag_photo`
  ADD PRIMARY KEY (`photo_id`,`tag_id`),
  ADD KEY `fk_tag_id_idx` (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tag_photo`
--
ALTER TABLE `tag_photo`
  ADD CONSTRAINT `fk_photo_id` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
