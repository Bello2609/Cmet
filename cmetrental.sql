-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 11:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmetrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `room_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_price` varchar(100) NOT NULL,
  `room_location` varchar(100) NOT NULL,
  `room_available` varchar(20) NOT NULL,
  `room_description` varchar(500) NOT NULL,
  `room_category` varchar(50) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `profile_url` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `room_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_details`
--
ALTER TABLE `room_details`
  ADD CONSTRAINT `room_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
