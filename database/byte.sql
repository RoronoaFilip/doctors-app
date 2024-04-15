-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 10:15 AM
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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(60) NOT NULL COMMENT 'ID of the photo',
  `photo_url` mediumtext NOT NULL,
  `alt` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Photos by url used in the application';

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_url`, `alt`) VALUES
(1, '/public/photos/default_profile_picture.png', 'default_profile_picture');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) NOT NULL COMMENT 'restaurant''s id',
  `name` varchar(50) NOT NULL COMMENT 'restaurant''s name',
  `location` varchar(100) NOT NULL COMMENT 'restaurant''s location',
  `capacity` bigint(20) NOT NULL COMMENT 'restaurant''s capacity',
  `rating` float NOT NULL COMMENT 'restaurant''s raiting',
  `phone` varchar(50) NOT NULL,
  `picture` bigint(60) NOT NULL COMMENT 'Foreign key to pictures',
  `email` varchar(50) NOT NULL COMMENT 'Restaurant''s email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `capacity`, `rating`, `phone`, `picture`, `email`) VALUES
(1, 'Грог', 'ж.к. Петко Р. Славейков, ж.к. Славейков 135, 8005 Бургас', 60, 4.4, '0876332988', 0, ''),
(2, 'Romance Pizza', 'Парк Славейков до бл. 62, 8000 Бургас', 80, 4.5, '070020011', 0, ''),
(3, ' Петте кьошета 3', 'Варна ЦентърОдесос, ул. „Македония“ 44, 9002 Варна', 50, 4.4, '0879313176', 0, ''),
(4, 'Ресторант Санторини', 'Варна ЦентърПриморски, бул. „Цар Освободител“ 76г, 9000 Варна', 40, 4, '0898728807', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL COMMENT 'primary key',
  `first_name` varchar(50) NOT NULL COMMENT 'the user''s first name',
  `last_name` varchar(50) NOT NULL COMMENT 'the user''s last name',
  `email` varchar(50) NOT NULL COMMENT 'the user''s email',
  `password` varchar(300) NOT NULL COMMENT 'the user''s password',
  `phone` varchar(50) DEFAULT NULL COMMENT 'the user''s phone',
  `profile_picture_id` bigint(60) NOT NULL DEFAULT 1 COMMENT 'Foreign Key to the Profile picture'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='A table that represents a user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `profile_picture_id`) VALUES
(1, 'Filip', 'Filchev', 'filip@email.com', '$2y$10$QdXJrjhm0UAqE9rA36x1H.D31w5tqR7y4kK7ra5nTJkq5azE9wHNa', NULL, 1),
(2, 'admin', 'adminov', 'admin@admin.admin', '$2y$10$Ac6yjsOXdq8tIrHwfFCNdeDJpofDQGU4zlhTdRjXAbhBTT7R8gg0e', NULL, 1),
(10, 'Test', 'Testov', 'test@test.com', '$2y$10$t/MqRWX69mC98Nmwp3TQWebnKPK5mN1DjH2pW8BO/7/m60m.yq2pq', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`name`,`email`) USING BTREE,
  ADD KEY `picture_foreign_key` (`picture`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(30)),
  ADD UNIQUE KEY `phone` (`phone`(30)),
  ADD KEY `profile_picture_fk` (`profile_picture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(60) NOT NULL AUTO_INCREMENT COMMENT 'ID of the photo', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `profile_picture_fk` FOREIGN KEY (`profile_picture_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
