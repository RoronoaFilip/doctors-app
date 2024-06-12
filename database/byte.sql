-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 06:14 PM
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
(11, 30, 32, '2024-06-11 20:25:00', 'Може да закъснея около 5 минути. Извинявам се!'),
(12, 30, 32, '2024-06-25 12:26:00', 'Вторичен преглед.');

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
(30, 'Дерматолог', 'Софийски Медицински Университет'),
(31, 'Зъболекар', 'Пловдивски Медицински Университет');

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
(10, 30, 28, 'Каква е цената на прегледа Ви?', '50 лв.'),
(11, 31, 28, 'Какво е работното Ви време?', '10ч. - 18ч.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(60) NOT NULL,
  `doctor_id` bigint(60) DEFAULT NULL,
  `client_id` bigint(60) DEFAULT NULL,
  `rating` bigint(60) NOT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `doctor_id`, `client_id`, `rating`, `comment`) VALUES
(0, 30, 28, 5, 'Много добро отношение!'),
(0, 31, 28, 3, 'Работи малко прибързано. Иначе нямам други забележки');

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
(28, 'Диан', 'Василев', 'USER', 'dido@email.com', '$2y$10$vIOY/jiV8XbP6HXok/DmqukTqM3s6/qA4/24le2ttec4CGxc2Akli', '+123456', 1),
(30, 'Александър', 'Ангелов', 'DOCTOR', 'nacho@email.com', '$2y$10$qBQH0iFIqmseDBFrAmBClOdiqFrlguT4Q52HTxG80k04NG3oPYQhy', NULL, 1),
(31, 'Филип', 'Филчев', 'DOCTOR', 'filip@email.com', '$2y$10$/NvaI.GIZjvvGpN.lL.5u.kLLd7jgN3AZNTHsYlD5HnNSh6LyXqZO', NULL, 1),
(32, 'Иван', 'Иванов', 'USER', 'ivan@email.com', '$2y$10$ai8lMJiJdWrFcC6H3d/BDeHoHs0jHSiPXMBuUUXDEy85Z6SJiUVn.', '', 1);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `doctor_id_fk` (`doctor_id`),
  ADD KEY `client_id_fk` (`client_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'the appointments id', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(60) NOT NULL AUTO_INCREMENT COMMENT 'ID of the photo', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=33;

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
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `client_id_fk` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `doctor_id_fk` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

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
