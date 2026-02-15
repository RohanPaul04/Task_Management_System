-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2026 at 05:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_db`
--

CREATE TABLE `task_db` (
  `task_id` varchar(15) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_db`
--

INSERT INTO `task_db` (`task_id`, `title`, `description`, `status`, `due_date`) VALUES
('EJ63417261', 'Review client feedback', 'Review all the client feedbacks', 'pending', '2026-02-06'),
('MZ64062636', 'Fix website bugs', 'Fix all the current website bugs', 'pending', '2026-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `email`, `password`, `confirm`, `role`) VALUES
('jfofo', 'paulrohan0304@gmail.com', 'Rohan12', 'Rohan12', 'admin'),
('bnn', 'paulrohan0304@gmail.com', 'wer234', 'dffhj', 'admin'),
('bnn', 'paulrohan0304@gmail.com', 'fryyf', 'ddfgfggh', 'admin'),
('bnn', 'paulrohan0304@gmail.com', 'dghh', 'dfgh', 'admin'),
('bnn', 'paulrohan0304@gmail.com', 'Rohan12', 'Rohan12', 'admin'),
('bnn', 'paulrohan0304@gmail.com', 'Rohan12', 'Rohan12', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_db`
--
ALTER TABLE `task_db`
  ADD PRIMARY KEY (`task_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
