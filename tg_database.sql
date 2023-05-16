-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 02:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tg_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `locations` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `passenger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `locations`, `destination`, `passenger`) VALUES
('34', 'Block 1', 'Block 8', 3),
('35', 'Block 2', '', 0),
('39', 'Block 5', 'Block 1', 5),
('50', 'Block 7', 'Block 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `booked_by` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `role`, `username`, `password`, `date_created`, `booked_by`) VALUES
(32, 'ryan', 'driver', 'driver', 'driver', '2023-03-07 10:42:37', 50),
(33, 'kim', 'driver', 'test', 'test', '2023-03-07 10:42:37', 50),
(34, 'joyce', 'driver', 'joyse', 'test', '2023-03-07 10:43:21', 0),
(35, '', 'driver', 'test', 'driver', '2023-03-07 11:35:47', 0),
(36, 'ryan', 'driver', 'driver123', 'driver123', '2023-03-07 11:43:58', 0),
(37, 'asdasd', 'driver', 'raiiraii', 'kaiikaii', '2023-03-07 11:49:35', 0),
(38, '', 'passenger', 'testasdasdasda', 'testtest', '2023-03-07 13:59:26', 0),
(39, '', 'passenger', 'testsdfsdf', 'testtest', '2023-03-07 14:03:13', 0),
(40, '', 'driver', 'kaiikaii', 'kaiikaii', '2023-03-07 14:23:13', 50),
(41, 'adasdasdas', 'driver', 'ryanc', 'raiiraii', '2023-03-07 14:23:41', 0),
(42, 'adasdasdas', 'driver', 'raiiraii', 'testtest', '2023-03-07 14:25:17', 0),
(43, 'tertert', 'driver', 'test', 'testicles', '2023-03-07 14:25:19', 0),
(44, 'tertert', 'passenger', 'testewewqeq', 'testtest', '2023-03-07 14:25:24', 0),
(45, 'asdasdadas', 'passenger', 'test123123123', 'testtest', '2023-03-07 14:26:14', 0),
(46, 'asdasdadas', 'passenger', 'test123123123123123', 'testtest', '2023-03-07 14:26:23', 0),
(47, 'asdasdadas', 'passenger', 'test123123123123123q213123', 'testtest', '2023-03-07 14:26:48', 0),
(48, 'qweqweqw', 'passenger', 'testa123123', 'testtest', '2023-03-07 14:27:25', 0),
(49, 'wqeqe', 'passenger', 'test123123123dfsdfsdf', 'testtest', '2023-03-07 14:27:59', 0),
(50, 'ryan calvelo', 'passenger', 'raiiraii23', 'kaiikaii23', '2023-03-07 14:44:57', 0),
(51, 'raiiraii', 'passenger', 'raiiraii123', 'kaiikaii23', '2023-03-07 14:45:56', 0),
(52, 'asdasdasdasdas', 'passenger', 'testasdad', 'testtest', '2023-03-07 14:47:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`session_id`, `user_id`, `timestamp`) VALUES
(11, 40, '2023-04-26 12:46:45'),
(12, 32, '2023-04-26 12:47:10'),
(13, 33, '2023-04-26 13:03:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
