-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 08:42 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) NOT NULL COMMENT 'the appointments id',
  `doctor_id` bigint(20) NOT NULL COMMENT 'foreign key to the doctor',
  `user_id` bigint(20) NOT NULL COMMENT 'foreign key to the user',
  `date` datetime NOT NULL COMMENT 'the date and time of the appointment',
  `comment` text NOT NULL COMMENT 'comment to the appointment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `user_id`, `date`, `comment`) VALUES
(1, 11, 12, '2024-07-15 10:00:00', 'Some description for a Test Appointment'),
(2, 11, 12, '2023-07-15 10:00:00', 'Year 2023'),
(3, 11, 12, '2024-07-15 10:00:00', 'Year 2024'),
(4, 11, 12, '2025-07-15 10:00:00', 'Year 2025'),
(5, 11, 12, '2026-07-15 10:00:00', 'Year 2026'),
(6, 26, 2, '2024-05-31 20:33:00', 'Test Create Future'),
(7, 26, 2, '2024-05-06 20:31:00', 'Test Create Past'),
(8, 11, 2, '2024-05-30 13:41:00', 'Test 213213'),
(9, 11, 12, '2024-02-15 21:21:00', 'з123123'),
(10, 11, 12, '2024-03-15 21:22:00', '12312');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_info`
--

CREATE TABLE `doctors_info` (
  `id` bigint(20) NOT NULL COMMENT 'foreign key to the User id in the users table',
  `specialty` varchar(50) NOT NULL COMMENT 'the doctor''s specialty',
  `education` varchar(100) NOT NULL COMMENT 'the doctor''s university'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_info`
--

INSERT INTO `doctors_info` (`id`, `specialty`, `education`) VALUES
(11, 'Дерматолог', 'Медицински Университет София'),
(26, 'Зъболекар', 'Доктор');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(60) NOT NULL,
  `doctor_id` bigint(60) DEFAULT NULL,
  `user_id` bigint(60) DEFAULT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `doctor_id`, `user_id`, `question`, `answer`) VALUES
(3, 26, 2, 'asd', NULL),
(4, 11, 2, 'Zdr', 'здр'),
(5, 11, 2, 'zdr 2', 'здр2'),
(6, 11, 2, 'zdr3', 'здр3'),
(7, 11, 2, 'zdr4', 'zd5641231234'),
(8, 11, 2, 'zdr5', '123123'),
(9, 11, 12, '123123123213', '123213');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL COMMENT 'primary key',
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'the user''s first name',
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'the user''s last name',
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'USER' COMMENT 'foreign key to user''s type',
  `email` varchar(50) NOT NULL COMMENT 'the user''s email',
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'the user''s password',
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'the user''s phone',
  `profile_picture_id` bigint(60) NOT NULL DEFAULT 1 COMMENT 'Foreign Key to the Profile picture'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='A table that represents a user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `email`, `password`, `phone`, `profile_picture_id`) VALUES
(1, 'Filip', 'Filchev', 'ADMIN', 'filip@email.com', '$2y$10$QdXJrjhm0UAqE9rA36x1H.D31w5tqR7y4kK7ra5nTJkq5azE9wHNa', NULL, 1),
(2, 'admin', 'adminov', 'ADMIN', 'admin@admin.admin', '$2y$10$Ac6yjsOXdq8tIrHwfFCNdeDJpofDQGU4zlhTdRjXAbhBTT7R8gg0e', '+00000', 1),
(11, 'Доктор', 'Докторов', 'DOCTOR', 'doctor@doctor.com', '$2y$10$lviQpfPc/wE4fgyeQbssfOFw6HcYeFukT/nBLRxESO6U3fCdcKQ2C', '123123', 1),
(12, 'user', 'userov', 'USER', 'user@user.com', '$2y$10$td/LB4feU39ntij6VOlVxuj2qghsVUlSkgXIvCw8.uoap32LxSuYm', '+12412421', 1),
(26, 'Doki', 'Dok', 'DOCTOR', 'doktora@abv.bg', '$2y$10$L.u.dxRBozNytUxMM0NEeu1YWiICowAffIgo1YsoQ08rLt.EYWIwi', '08888888', 1);

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_fk` (`doctor_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `doctors_info`
--
ALTER TABLE `doctors_info`
  ADD KEY `user_id_fk` (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'the appointments id', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(60) NOT NULL AUTO_INCREMENT COMMENT 'ID of the photo', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `doctor_fk` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctors_info`
--
ALTER TABLE `doctors_info`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
