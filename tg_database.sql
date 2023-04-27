-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 09:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
('39', 'Block 5', 'Block 1', 5),
('50', 'Block 7', 'Block 1', 5);

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
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `role`, `username`, `password`, `date_created`) VALUES
(32, 'ryan', '', 'driver', 'testtest', '2023-03-07 10:42:37'),
(33, 'kim', 'passenger', 'test', 'testtests', '2023-03-07 10:42:37'),
(34, 'joyce', 'passenger', 'joyse', 'test', '2023-03-07 10:43:21'),
(35, '', '', '', '', '2023-03-07 11:35:47'),
(36, 'ryan', 'passenger', 'tests', 'testtest', '2023-03-07 11:43:58'),
(37, 'asdasd', 'driver', 'testtestestset', 'testtest', '2023-03-07 11:49:35'),
(38, '', 'passenger', 'testasdasdasda', 'testtest', '2023-03-07 13:59:26'),
(39, '', 'passenger', 'testsdfsdf', 'testtest', '2023-03-07 14:03:13'),
(40, '', 'passenger', 'test', 'testtest', '2023-03-07 14:23:13'),
(41, 'adasdasdas', 'passenger', 'test', 'testtest', '2023-03-07 14:23:41'),
(42, 'adasdasdas', 'passenger', 'test', 'testtest', '2023-03-07 14:25:17'),
(43, 'tertert', 'passenger', 'test', 'testtest', '2023-03-07 14:25:19'),
(44, 'tertert', 'passenger', 'testewewqeq', 'testtest', '2023-03-07 14:25:24'),
(45, 'asdasdadas', 'passenger', 'test123123123', 'testtest', '2023-03-07 14:26:14'),
(46, 'asdasdadas', 'passenger', 'test123123123123123', 'testtest', '2023-03-07 14:26:23'),
(47, 'asdasdadas', 'passenger', 'test123123123123123q213123', 'testtest', '2023-03-07 14:26:48'),
(48, 'qweqweqw', 'passenger', 'testa123123', 'testtest', '2023-03-07 14:27:25'),
(49, 'wqeqe', 'passenger', 'test123123123dfsdfsdf', 'testtest', '2023-03-07 14:27:59'),
(50, 'ryan calvelo', 'passenger', 'raiiraii23', 'kaiikaii23', '2023-03-07 14:44:57'),
(51, 'raiiraii', 'passenger', 'raiiraii123', 'kaiikaii23', '2023-03-07 14:45:56'),
(52, 'asdasdasdasdas', 'passenger', 'testasdad', 'testtest', '2023-03-07 14:47:38');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
