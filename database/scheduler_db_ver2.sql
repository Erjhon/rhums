-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 02:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_sched` datetime NOT NULL,
  `reason` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `user_id`, `date_sched`, `reason`, `status`, `date_created`) VALUES
(76, 10, 5, '2022-10-20 15:38:00', 'gdfgfg', 1, '2022-10-27 20:38:38'),
(77, 11, 6, '2022-10-20 08:40:00', 'test2', 1, '2022-10-27 20:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `location` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `max_a_day` int(5) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `description`, `max_a_day`, `date_created`, `date_updated`) VALUES
(1, 'Vaccination Location 1, Sample City, Negros Occidental', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan ac justo consequat dignissim. Nam eget pretium nisl, at tempor velit. Sed vel nisl a metus porta placerat in in neque. Praesent aliquam nisi nisl, eget porta lacus iaculis ac. Fusce dignissim et nibh vel euismod. Vestibulum eget enim metus. Ut faucibus, lectus facilisis eleifend dignissim, ligula lorem porttitor elit, eu placerat odio urna quis augue. Proin rutrum, enim in auctor rhoncus, turpis ipsum rutrum sem, nec varius purus nisi at dolor. Donec porta turpis vel erat iaculis, eget consequat mauris dapibus. Nullam euismod quam sagittis nisl maximus auctor. Duis turpis nisi, condimentum eget interdum ut, ultricies non turpis. Donec auctor a mi at commodo. Vivamus ultrices venenatis orci, vel venenatis sem pharetra ac. Ut scelerisque lorem sed purus facilisis lacinia.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 500, '2021-06-28 09:52:13', '2021-06-28 09:52:39'),
(4, 'Sample location  2', '&lt;p&gt;Sample only&lt;/p&gt;', 100, '2021-06-28 16:19:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `username`, `password`, `image`) VALUES
(5, 'JC', 'Denver', 'Doffie', '202cb962ac59075b964b07152d234b70', ''),
(6, 'JC', 'Digay', 'doffie-JC', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `contactNo` bigint(10) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `medHistory` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `date_created`) VALUES
(7, 'JC Denver', '2022-10-27 20:35:28'),
(8, 'JC Denver', '2022-10-27 20:36:20'),
(9, 'JC Denver', '2022-10-27 20:37:18'),
(10, 'JC Denver', '2022-10-27 20:38:38'),
(11, 'JC Digay', '2022-10-27 20:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `patient_meta`
--

CREATE TABLE `patient_meta` (
  `patient_id` int(30) NOT NULL,
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_meta`
--

INSERT INTO `patient_meta` (`patient_id`, `meta_field`, `meta_value`, `date_created`) VALUES
(10, 'id', '', '2022-10-27 20:38:38'),
(10, 'patient_id', '', '2022-10-27 20:38:38'),
(10, 'name', 'JC Denver', '2022-10-27 20:38:38'),
(10, 'email', '', '2022-10-27 20:38:38'),
(10, 'contact', '09109598455', '2022-10-27 20:38:38'),
(10, 'gender', 'Male', '2022-10-27 20:38:38'),
(10, 'dob', '2022-10-28', '2022-10-27 20:38:38'),
(10, 'address', 'gddgfg', '2022-10-27 20:38:38'),
(11, 'id', '', '2022-10-27 20:40:07'),
(11, 'patient_id', '', '2022-10-27 20:40:07'),
(11, 'name', 'JC Digay', '2022-10-27 20:40:07'),
(11, 'email', '', '2022-10-27 20:40:07'),
(11, 'contact', '09109598455', '2022-10-27 20:40:07'),
(11, 'gender', 'Male', '2022-10-27 20:40:07'),
(11, 'dob', '2022-10-25', '2022-10-27 20:40:07'),
(11, 'address', 'gdfdfg', '2022-10-27 20:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_settings`
--

INSERT INTO `schedule_settings` (`meta_field`, `meta_value`, `date_create`) VALUES
('day_schedule', 'Monday,Tuesday,Wednesday,Thursday,Friday', '2022-09-29 14:25:57'),
('morning_schedule', '08:00,12:00', '2022-09-29 14:25:57'),
('afternoon_schedule', '13:00,17:00', '2022-09-29 14:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Medical Appointment and Record Management System Rural Health Unit II\r\n'),
(6, 'short_name', 'RHU2MS'),
(11, 'logo', 'uploads/1630631400_clinic-logo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1663952460_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(30) NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Admin', 'Admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2022-10-08 10:26:50'),
(22, 'Erjhon', 'Baldoza', 'erjbaldoza', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'uploads/1665199200_196a11710c8b16a37c9889155de17ac6.jpg', NULL, 0, '2022-10-08 11:20:41', '2022-10-20 16:50:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_ibfk_1` (`patient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_list`
--
ALTER TABLE `patient_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_list` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD CONSTRAINT `patient_meta_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;