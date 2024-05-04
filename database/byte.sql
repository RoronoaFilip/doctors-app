-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 03:59 PM
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
(1, '/public/photos/default_profile_picture.png', 'default_profile_picture'),
(20, '/public/profile_pictures/test@test.com.png', 'default_profile_picture'),
(21, '/public/profile_pictures/filip@email.com.png', 'default_profile_picture'),
(22, '/public/profile_pictures/admin@admin.admin.png', 'default_profile_picture');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL COMMENT 'primary key',
  `first_name` varchar(50) NOT NULL COMMENT 'the user''s first name',
  `last_name` varchar(50) NOT NULL COMMENT 'the user''s last name',
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'USER' COMMENT 'foreign key to user''s type',
  `email` varchar(50) NOT NULL COMMENT 'the user''s email',
  `password` varchar(300) NOT NULL COMMENT 'the user''s password',
  `phone` varchar(50) DEFAULT NULL COMMENT 'the user''s phone',
  `profile_picture_id` bigint(60) NOT NULL DEFAULT 1 COMMENT 'Foreign Key to the Profile picture'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='A table that represents a user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `email`, `password`, `phone`, `profile_picture_id`) VALUES
(1, 'Filip', 'Filchev', 'ADMIN', 'filip@email.com', '$2y$10$QdXJrjhm0UAqE9rA36x1H.D31w5tqR7y4kK7ra5nTJkq5azE9wHNa', NULL, 21),
(2, 'admin', 'adminov', 'ADMIN', 'admin@admin.admin', '$2y$10$Ac6yjsOXdq8tIrHwfFCNdeDJpofDQGU4zlhTdRjXAbhBTT7R8gg0e', NULL, 22),
(11, 'doctor', 'doctorov', 'DOCTOR', 'doctor@doctor.com', '$2y$10$lviQpfPc/wE4fgyeQbssfOFw6HcYeFukT/nBLRxESO6U3fCdcKQ2C', NULL, 1),
(12, 'user', 'userov', 'USER', 'user@user.com', '$2y$10$td/LB4feU39ntij6VOlVxuj2qghsVUlSkgXIvCw8.uoap32LxSuYm', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type`) VALUES
('ADMIN'),
('DOCTOR'),
('USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(30)),
  ADD UNIQUE KEY `phone` (`phone`(30)),
  ADD KEY `profile_picture_fk` (`profile_picture_id`),
  ADD KEY `user_type_fk` (`user_type`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(60) NOT NULL AUTO_INCREMENT COMMENT 'ID of the photo', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `profile_pic_fk` FOREIGN KEY (`profile_picture_id`) REFERENCES `photos` (`id`),
  ADD CONSTRAINT `user_type_fk` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
