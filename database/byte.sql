-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 12:03 PM
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
  `phone` varchar(50) DEFAULT NULL COMMENT 'the user''s phone'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='A table that represents a user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`) VALUES
(1, 'Filip', 'Filchev', 'filip@email.com', '$2y$10$QdXJrjhm0UAqE9rA36x1H.D31w5tqR7y4kK7ra5nTJkq5azE9wHNa', NULL),
(2, 'admin', 'adminov', 'admin@admin.admin', '$2y$10$Ac6yjsOXdq8tIrHwfFCNdeDJpofDQGU4zlhTdRjXAbhBTT7R8gg0e', NULL);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
