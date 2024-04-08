-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 07:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byte`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `first_name` varchar(50) NOT NULL COMMENT 'the user''s first name',
  `last_name` varchar(50) NOT NULL COMMENT 'the user''s last name',
  `email` varchar(50) NOT NULL COMMENT 'the user''s email',
  `password` varchar(300) NOT NULL COMMENT 'the user''s password',
  `phone` varchar(50) DEFAULT NULL COMMENT 'the user''s phone',
  `profile_picture` varchar(100) DEFAULT NULL COMMENT 'the user''s profile picture'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='A table that represents a user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `profile_picture`) VALUES
(0, 'Filip', 'Filchev', 'filip@email.com', '$2y$10$QdXJrjhm0UAqE9rA36x1H.D31w5tqR7y4kK7ra5nTJkq5azE9wHNa', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(30)),
  ADD UNIQUE KEY `phone` (`phone`(30));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
