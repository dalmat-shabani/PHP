-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 06:08 PM
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
-- Database: `event_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('confirmed','canceled') DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `event_id`, `booking_date`, `status`) VALUES
(1, 5, 1, '2025-02-06 18:18:50', 'confirmed'),
(2, 5, 2, '2025-02-06 18:18:53', 'confirmed'),
(3, 5, 2, '2025-02-06 18:18:56', 'confirmed'),
(4, 5, 2, '2025-02-06 18:18:57', 'confirmed'),
(5, 5, 2, '2025-02-06 18:18:57', 'confirmed'),
(6, 5, 2, '2025-02-06 18:20:02', 'confirmed'),
(7, 5, 6, '2025-02-06 18:22:30', 'confirmed'),
(12, 8, 4, '2025-02-11 17:33:05', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `total_slots` int(11) NOT NULL,
  `available_slots` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `location`, `total_slots`, `available_slots`, `created_at`) VALUES
(1, 'Tech Conference 2025', 'A conference on new technology trends.', '2025-06-15 10:00:00', 'New York', 100, 99, '2025-01-30 18:04:16'),
(2, 'Music Festival', 'Live music and entertainment.', '2025-07-20 18:00:00', 'Los Angeles', 500, 495, '2025-01-30 18:04:16'),
(3, 'Metal Concert', 'The best metal concert with top bands', '2025-08-10 20:00:00', 'Chicago', 300, 300, '2025-02-04 17:50:50'),
(4, 'Art & Design Expo', 'Showcasing art and design works', '2025-09-05 11:00:00', 'San Francisco', 200, 199, '2025-02-04 17:50:50'),
(5, 'Coding Bootcamp', 'Intensive coding bootcamp for begginers and pros', '2025-10-12 09:00:00', 'Seattle', 150, 150, '2025-02-04 17:50:50'),
(6, 'Coding Bootcamp', 'Intensive coding bootcamp for begginers and pros', '2025-10-12 09:00:00', 'LA', 150, 149, '2025-02-04 17:50:50'),
(7, 'Coding Bootcamp', 'Intensive coding bootcamp for begginers and pros', '2025-10-12 09:00:00', 'NY', 150, 150, '2025-02-04 17:50:50'),
(8, 'Metal Concert', 'The best metal concert with top bands', '2025-08-10 20:00:00', 'Chicago', 300, 300, '2025-02-04 17:58:01'),
(9, 'Art & Design Expo', 'Showcasing art and design works', '2025-09-05 11:00:00', 'San Francisco', 200, 200, '2025-02-04 17:58:01'),
(10, 'Coding Bootcamp', 'Intensive coding bootcamp for begginers and pros', '2025-10-12 09:00:00', 'Seattle', 150, 150, '2025-02-04 17:58:01'),
(11, 'Coding Bootcamp', 'Intensive coding bootcamp for begginers and pros', '2025-10-12 09:00:00', 'LA', 150, 150, '2025-02-04 17:58:01'),
(12, 'Coding Bootcamp', 'Intensive coding bootcamp for begginers and pros', '2025-10-12 09:00:00', 'NY', 150, 150, '2025-02-04 17:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$10$uUbMQWLJvrOASKczxNR5Rev79CUZUzo1VsWKROkYbtljmnm3vKpZ2', 'admin', '2025-01-30 18:04:16'),
(2, 'John Doe', 'john@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user', '2025-01-30 18:04:16'),
(3, 'John', 'johndoe@gmail.com', '6d7cf284afa7c4f04b146d769924af07', 'user', '2025-02-04 18:13:36'),
(4, 'Dal', 'Dal@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', '2025-02-06 17:44:59'),
(5, 'James', 'James1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', '2025-02-06 17:48:56'),
(6, 'ehe', 'ehe@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', '2025-02-06 17:53:38'),
(7, 'admin', 'admin@gmail.com', '$2y$10$3NEnf7YCgBqxw1BTnqVdSuMhP/SwgPoQrVd7MfmF0zKLp4sTiF2m2', 'user', '2025-02-06 17:55:06'),
(8, 'oha', 'oha@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', '2025-02-11 17:25:15'),
(9, 'bhe', 'bhe@gmail.com', '$2y$10$nTvjFeVFrSEKJYWRyAYAje2rZ4AOw67C.5oeUEWr716Kfx8QUXCIy', 'user', '2025-02-11 18:05:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
