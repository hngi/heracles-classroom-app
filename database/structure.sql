-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2019 at 12:15 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `networth-calc`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('asset','liability') NOT NULL,
  `value` double NOT NULL,
  `date_added` date NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `value`, `date_added`, `category`, `user_id`) VALUES
(1, 'cars', 'asset', 1500000, '2019-09-25', 'property', 3),
(2, 'savings account', 'asset', 25000000, '2019-09-25', 'cash', 3),
(3, 'student load', 'liability', 300000, '2019-09-25', 'loans', 3),
(4, 'mortgages', 'liability', 750000, '2019-09-25', 'bills due', 3);

-- --------------------------------------------------------

--
-- Table structure for table `networth`
--

CREATE TABLE `networth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` double DEFAULT NULL,
  `asset` double DEFAULT NULL,
  `liability` double DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `networth`
--

INSERT INTO `networth` (`id`, `user_id`, `value`, `asset`, `liability`, `date`) VALUES
(1, 3, 11000.5, 11000.5, 0, '2019-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`) VALUES
(1, 'Akuagwu ', 'Philemon', 'phpmyadmin', '', 'phpmyadmin'),
(2, 'Akuagwu ', 'Philemon', 'phpmyadmin@gmail.com', 'phpmyadmin', '$2y$10$nGoMhHnhinGohjIAUoUI3ecci/hT9LulIqhXDkrLZI7NytFyiGv2K'),
(3, 'Abdulwahab', 'Nasir', 'weybansky@gmail.com', '08147638236', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `networth`
--
ALTER TABLE `networth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_networth` (`user_id`);

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `networth`
--
ALTER TABLE `networth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `user_item` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `networth`
--
ALTER TABLE `networth`
  ADD CONSTRAINT `user_networth` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
