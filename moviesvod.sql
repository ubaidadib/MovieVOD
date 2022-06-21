-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 03:49 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviesvod`
--

-- --------------------------------------------------------

--
-- Table structure for table `movieposter`
--

CREATE TABLE `movieposter` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movieposter`
--

INSERT INTO `movieposter` (`id`, `movie_id`, `post_id`) VALUES
(1, 1, 1),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `languages` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `movie_path` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `publish_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `languages`, `category`, `description`, `movie_path`, `rating`, `duration`, `publish_date`) VALUES
(1, 'ANT-MAN', 'english', 'action,war,romantic', 'ant man, action movie ', 'video1.mp4', 9, '1 hour & 30 min ', '2020/04/18'),
(2, 'MATRIX', 'english', 'action , war ', 'really a good movie shows', 'video1.mp4', 7, '1 & half hours', '2020/04/19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `image_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `category`, `rating`, `post_date`, `image_path`) VALUES
(1, 'ANT-MAN', 'action,war,romantic', 9, '2020-04-18', 'antman.jpg'),
(2, 'عيلة سبع نجوم', 'ضحك, تسلية ,هبل', 9, '2020-04-20', 'fightclub.jpg'),
(3, 'MATRIX', 'action , war ', 7, '2020-04-19', 'matrix.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `languages` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `episodes_number` int(11) NOT NULL,
  `episode_duration` varchar(20) NOT NULL,
  `series_path` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`series_id`, `title`, `description`, `category`, `rating`, `languages`, `date`, `episodes_number`, `episode_duration`, `series_path`) VALUES
(1, 'Musiz Doctor', 'muszi doz', 'drama , action , science ', 9, 'turkish , arabic ', '2020-04-17', 1, '', 'video1.mp4'),
(2, 'عيلة سبع نجوم', 'هبل هبل هبل ضحك ضحك ضحك', 'ضحك, تسلية ,هبل', 9, 'العربية', '2020-04-18', 1, '', 'video1.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `seriesposter`
--

CREATE TABLE `seriesposter` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seriesposter`
--

INSERT INTO `seriesposter` (`id`, `series_id`, `post_id`) VALUES
(1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `role` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `password`, `email`, `address`, `phonenumber`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'adminadmin@gmail.com', 'al badadwi camp ', '06-963258', 1),
(2, 'samer', 'samer', 'samer', '142536', 'samersamer@gmail.com', 'al badawi camp ', '06-986532', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movieposter`
--
ALTER TABLE `movieposter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `poster_id` (`post_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

--
-- Indexes for table `seriesposter`
--
ALTER TABLE `seriesposter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `series_id` (`series_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movieposter`
--
ALTER TABLE `movieposter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seriesposter`
--
ALTER TABLE `seriesposter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movieposter`
--
ALTER TABLE `movieposter`
  ADD CONSTRAINT `movieposter_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movieposter_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seriesposter`
--
ALTER TABLE `seriesposter`
  ADD CONSTRAINT `seriesposter_ibfk_1` FOREIGN KEY (`series_id`) REFERENCES `series` (`series_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seriesposter_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
