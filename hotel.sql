-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 02:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(150) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `picture`) VALUES
(1, 'admin', 'admin@site.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `viewed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`message_id`, `user_id`, `content`, `viewed`) VALUES
(1, 1, 'Hello Admin, I like your platform, It looks awesome.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` text NOT NULL,
  `gender` text NOT NULL,
  `bank_name` text NOT NULL,
  `account_name` text NOT NULL,
  `account_number` int(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `fullname`, `email`, `phone`, `position`, `gender`, `bank_name`, `account_name`, `account_number`, `address`) VALUES
(3, 'Umar Farooq', 'umarfarooq@mail.com', '07021212121', 'Manager', 'Male', 'GT Bank', 'Umar Farooq', 245500567, 'No 22 sample road barnawa kaduna.'),
(4, 'John Doe', 'john@doe.com', '09024242454', 'Room Service', 'Male', 'Sample Bank', 'John Doe', 980845656, 'No 556 sample street kaduna.');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_rooms`
--

CREATE TABLE `reserved_rooms` (
  `reserved_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved_rooms`
--

INSERT INTO `reserved_rooms` (`reserved_id`, `user_id`, `room_id`) VALUES
(1, 1, 3),
(2, 1, 6),
(3, 1, 11),
(4, 1, 14),
(5, 3, 13),
(6, 5, 3),
(7, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_image` varchar(100) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_price` varchar(20) NOT NULL,
  `room_description` varchar(200) NOT NULL,
  `booked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_image`, `room_name`, `room_price`, `room_description`, `booked`) VALUES
(3, 'crib-5.jpg', 'room 4a', '21,000', 'This is a room with a great ventilation system, the room also has a good water and 24 hours electrical supply.', 1),
(4, 'cedarberg-radisson-blu-hotel-waterfront-business-class-sea-facing-room-4.jpg', 'room 2c', '18,000', 'This is a room with a great ventilation system, the room also has a good water and 24 hours electrical supply.', 1),
(6, 'starling-hotel-geneva-airport-standard-room-business-city.jpg', 'room 4d', '22,000', 'This is a room with a great ventilation system, the room also has a good water and 24 hours electrical supply.', 1),
(7, 'e961g874ifj02da5bch3.jpg', 'Room 5a', '25,000', 'This is a room with a great ventilation system, the room also has a good water and 24 hours electrical supply.', 1),
(8, 'gh729f68c3e5ij10abd4.jpg', 'room 4b', '30,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more the room also has a good water and electrical supply.', 0),
(9, '4g6b139a058echi2j7fd.jpg', 'room 4c', '30,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more the room also has a good water and electrical supply.', 0),
(10, 'jiha925ce4f17g608db3.jpg', 'room 2a', '35,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 0),
(11, 'ei7ahbf40653j81g29dc.jpg', 'room 2b', '28,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 1),
(12, 'b3ch1g582i9a7fd406ej.jpg', 'room 2d', '29,500', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 0),
(13, '081c5jf4eai6d9h327bg.jpg', 'room 5b', '31,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 1),
(14, 'g0ch38b49efd125aij67.jpg', 'room 5c', '31,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 1),
(15, '7i9f6g0b8e14hj53acd2.jpg', 'room 5d', '32,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 0),
(16, 'e419g865bhcj2a3df7i0.jpg', 'room 3a', '25,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 0),
(17, '940jgbahc32f8ie71d65.jpg', 'room 3b', '24,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 0),
(18, 'haj4b56103df8e7i2c9g.jpg', 'room 3c', '26,000', 'This is a room with a great ventilation system, free wifi, hd tv, and more.., the room also has a good water and 24 hours electrical supply.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `picture` varchar(50) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `phone`, `email`, `gender`, `city`, `country`, `state`, `picture`) VALUES
(1, 'Umar', 'Yusuf', 'umaryusuf', '05bb6c809136ad6c24d36012cbc3147e', '08066249684', 'umar@site.com', 'male', 'Barnawa', 'Nigeria', 'Kaduna', 'IMG-20170304-WA0004.jpg'),
(2, 'abdullahi', 'kailani', 'kailaniabdullahi', 'e10adc3949ba59abbe56e057f20f883e', '08066249684', 'abdullahikailani123@gmail.com', 'male', 'rigasa', 'nigeria', 'kaduna', 'user.jpg'),
(3, 'jude', 'john', 'judejohn', '467fc66979dd7259de483080c303b4e8', '08066249684', 'jude@gmail.com', 'male', 'zaria', 'nigeria', 'kaduna', 'user.jpg'),
(4, 'kailani', 'abdullahi', 'yoshi1', 'b068c6257c5c8ab2fa34c6f99f3cae04', '08033231686', 'abdullahikailani123@gmail.com', 'male', 'rigasa', 'nigeria', 'kaduna', 'user.jpg'),
(5, 'okeke', 'jeremiah', 'spokes', 'e10adc3949ba59abbe56e057f20f883e', '08033967677', 'okekejeremiah@gmail.com', 'male', 'okigwe', 'nigeria', 'imo', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_msg`
--

CREATE TABLE `users_msg` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(150) NOT NULL DEFAULT 'admin',
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_msg`
--

INSERT INTO `users_msg` (`msg_id`, `sender`, `content`, `user_id`) VALUES
(1, 'admin', 'Thanks for the comment, we really appreciate it.\r\n', 1),
(2, 'admin', 'tanxs alots', 1),
(3, 'admin', 'we apprecite ur comment', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
  ADD PRIMARY KEY (`reserved_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_msg`
--
ALTER TABLE `users_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
  MODIFY `reserved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_msg`
--
ALTER TABLE `users_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
