-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 05:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `animalbite`
--

CREATE TABLE `animalbite` (
  `pid` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `pfname` varchar(20) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `age` int(100) NOT NULL,
  `paddress` varchar(20) NOT NULL,
  `visit` date NOT NULL,
  `incident` date NOT NULL,
  `source` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `ownercon` varchar(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `remark` varchar(20) NOT NULL,
  `assigned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalbite`
--

INSERT INTO `animalbite` (`pid`, `patientId`, `pfname`, `pcontact`, `gender`, `dob`, `age`, `paddress`, `visit`, `incident`, `source`, `part`, `category`, `type`, `owner`, `ownercon`, `location`, `remark`, `assigned`) VALUES
(21, 0, 'Joshua Nilo', '09093698614', 'Male', '2002-01-20', 20, 'Santo Domingo, Nabua', '2022-12-06', '2022-11-28', 'Dog', 'Left Leg', 'I', 'Bite', 'Test', '09310967681', 'Residence', 'test', 'Erjhon Baldoza');

-- --------------------------------------------------------

--
-- Table structure for table `animalbite_history`
--

CREATE TABLE `animalbite_history` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `incident` date NOT NULL,
  `source` varchar(10) NOT NULL,
  `part` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `ownercon` varchar(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `remark` varchar(20) NOT NULL,
  `assigned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalbite_history`
--

INSERT INTO `animalbite_history` (`id`, `patientId`, `incident`, `source`, `part`, `category`, `type`, `owner`, `ownercon`, `location`, `remark`, `assigned`) VALUES
(2, 21, '2022-11-29', 'Dog', 'Left Leg', 'I', 'Bite', 'test', '09310967681', 'test', 'test', 'Erjhon Baldoza');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(30) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date_sched` datetime NOT NULL,
  `reason` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `date_sched`, `reason`, `status`, `date_created`, `user_id`, `p_id`, `created`) VALUES
(35, 36, '2022-12-12 08:00:00', 'Check-up', 1, '2022-12-11 07:44:37', 0, 55, 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `pid` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `pfname` varchar(20) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `age` int(100) NOT NULL,
  `placebirth` varchar(20) NOT NULL,
  `guardian` varchar(20) NOT NULL,
  `paddress` varchar(20) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit` varchar(20) NOT NULL,
  `bloodpress` varchar(20) NOT NULL,
  `bloodsugar` varchar(20) NOT NULL,
  `bodytemp` varchar(20) NOT NULL,
  `weight` decimal(6,2) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `bmi` decimal(10,0) NOT NULL,
  `complaints` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `assigned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`pid`, `patientId`, `pfname`, `pcontact`, `gender`, `dob`, `age`, `placebirth`, `guardian`, `paddress`, `CreationDate`, `visit`, `bloodpress`, `bloodsugar`, `bodytemp`, `weight`, `height`, `bmi`, `complaints`, `remark`, `assigned`) VALUES
(25, 0, 'Ma. Hanna Hernandez', '09109598455', 'Female', '2000-03-21', 22, 'La Purisima', 'May Yaga', 'Inapatan, Nabua', '2022-12-05 13:33:11', '2022-12-06', '120/80', '70', '36.5', '50.00', '163', '19', 'test', 'test', 'Erjhon Baldoza'),
(36, 0, 'Erjhon A Baldoza', '09381858656', 'Male', '2000-11-10', 22, '', 'Erma Baldoza', 'La Purisima, Nabua', '2022-12-10 23:46:43', '2022-12-12', '120/80', '70', '36.5', '50.00', '160', '20', 'test', 'test', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `immunization_child`
--

CREATE TABLE `immunization_child` (
  `id` int(11) NOT NULL,
  `dor` date NOT NULL,
  `dob` date NOT NULL,
  `fsn` int(20) NOT NULL,
  `child` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `mother` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `cpab` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `blength` int(100) NOT NULL,
  `bweight` int(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `breastfeed` date NOT NULL,
  `bcg` date NOT NULL,
  `hepa` date NOT NULL,
  `monthage` varchar(100) NOT NULL,
  `ltaken` date NOT NULL,
  `wtaken` date NOT NULL,
  `weightgiven` varchar(100) NOT NULL,
  `for1month` date DEFAULT NULL,
  `for2month` date DEFAULT NULL,
  `for3month` date DEFAULT NULL,
  `immunization` varchar(20) NOT NULL,
  `dose` varchar(20) NOT NULL,
  `doi` date NOT NULL,
  `exbf` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_child`
--

INSERT INTO `immunization_child` (`id`, `dor`, `dob`, `fsn`, `child`, `sex`, `mother`, `address`, `cpab`, `age`, `blength`, `bweight`, `status`, `breastfeed`, `bcg`, `hepa`, `monthage`, `ltaken`, `wtaken`, `weightgiven`, `for1month`, `for2month`, `for3month`, `immunization`, `dose`, `doi`, `exbf`, `remarks`) VALUES
(40, '0000-00-00', '2000-11-10', 0, 'Erjhon A. Baldoza', 'Male', 'Ariel Baldoza', 'La Purisima Nabua', 'TT2/Td2', '1-3M', 34, 43, 'Select Status', '0000-00-00', '0000-00-00', '0000-00-00', '13', '0000-00-00', '0000-00-00', '3months', '0000-00-00', '0000-00-00', '2022-12-12', 'DPT-HIB-HepB', '3rd Dose', '2022-12-13', 'on', 'test'),
(41, '0000-00-00', '2002-03-21', 1234, 'yhera', 'Male', 'erma', 'La Purisima Nabua', 'TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)', 'Newborn', 0, 0, 'Select Status', '2022-12-12', '2022-12-12', '2022-12-12', '', '0000-00-00', '0000-00-00', 'Select month/s', '0000-00-00', '0000-00-00', '0000-00-00', 'Select Immunization', 'Select Dose', '0000-00-00', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middleInitial` varchar(1) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `middleInitial`, `lastname`, `username`, `password`, `image`, `contact`, `gender`, `dob`, `address`) VALUES
(55, 'Erjhon', 'A', 'Baldoza', 'tamih', 'e10adc3949ba59abbe56e057f20f883e', '', '09381858656', 'Male', '2000-11-10', 'La Purisima, Nabua'),
(56, 'Crizel', 'B', 'Domagsang', 'mamih', '9e086fb199ba5f83885b522690b8f176', '', '09109598455', 'Female', '2000-06-13', 'La Purisima, Nabua');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `visit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bloodpress` varchar(20) NOT NULL,
  `bloodsugar` varchar(20) NOT NULL,
  `bodytemp` varchar(20) NOT NULL,
  `weight` decimal(6,2) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `bmi` decimal(10,0) NOT NULL,
  `complaints` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `assigned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`id`, `patientId`, `visit`, `bloodpress`, `bloodsugar`, `bodytemp`, `weight`, `height`, `bmi`, `complaints`, `remark`, `assigned`) VALUES
(44, 25, '2022-12-06 03:53:01', '120/80', '70', '36.5', '50.00', '153', '21', 'test', 'test', 'Erjhon Baldoza');

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `date_created`, `user_id`) VALUES
(36, 'Erjhon A Baldoza', '2022-12-11 07:44:37', 0),
(37, '', '2022-12-13 19:11:22', 1),
(38, 'yhera', '2022-12-13 19:13:57', 1),
(39, 'yhera', '2022-12-13 19:15:41', 1),
(40, 'Erjhon A. Baldoza', '2022-12-14 00:14:04', 1),
(41, 'yhera', '2022-12-14 00:20:39', 1),
(42, '76', '2022-12-14 00:34:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_meta`
--

CREATE TABLE `patient_meta` (
  `id` int(11) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_meta`
--

INSERT INTO `patient_meta` (`id`, `patient_id`, `meta_field`, `meta_value`, `date_created`) VALUES
(323, 36, 'id', '', '2022-12-11 07:44:37'),
(324, 36, 'patient_id', '', '2022-12-11 07:44:37'),
(325, 36, 'name', 'Erjhon A Baldoza', '2022-12-11 07:44:37'),
(326, 36, 'email', '', '2022-12-11 07:44:37'),
(327, 36, 'contact', '09381858656', '2022-12-11 07:44:37'),
(328, 36, 'gender', 'Male', '2022-12-11 07:44:37'),
(329, 36, 'dob', '2000-11-10', '2022-12-11 07:44:37'),
(330, 36, 'address', 'La Purisima, Nabua', '2022-12-11 07:44:37'),
(331, 36, 'created', 'Patient', '2022-12-11 07:44:37');

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
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `id` int(100) NOT NULL,
  `PatientID` int(100) NOT NULL,
  `BloodPressure` varchar(200) NOT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(200) NOT NULL,
  `Temperature` varchar(200) NOT NULL,
  `MedicalPres` mediumtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL,
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
(1, 'Super', 'Admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'uploads/1668776580_profile.jpg', NULL, 1, '2021-01-20 14:02:37', '2022-11-18 21:03:24'),
(22, 'Erjhon', 'Baldoza', 'staff', '81dc9bdb52d04dc20036dbd8313ed055', 'Staff', 'uploads/1665199200_196a11710c8b16a37c9889155de17ac6.jpg', NULL, 0, '2022-10-08 11:20:41', '2022-12-09 16:58:00'),
(24, 'Joshua', 'Nilo', 'nilojosh', '81dc9bdb52d04dc20036dbd8313ed055', 'Staff', 'uploads/1668951060_hutao.png', NULL, 0, '2022-11-20 21:31:53', '2022-11-20 23:26:18'),
(25, 'tam', 'tam', 'tams', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', NULL, NULL, 0, '2022-11-23 16:29:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animalbite`
--
ALTER TABLE `animalbite`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `animalbite_history`
--
ALTER TABLE `animalbite_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_ibfk_3` (`patient_id`),
  ADD KEY `appointments_ibfk_4` (`p_id`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `immunization_child`
--
ALTER TABLE `immunization_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `patient_list`
--
ALTER TABLE `patient_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
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
-- AUTO_INCREMENT for table `animalbite`
--
ALTER TABLE `animalbite`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `animalbite_history`
--
ALTER TABLE `animalbite_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `immunization_child`
--
ALTER TABLE `immunization_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `patient_meta`
--
ALTER TABLE `patient_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animalbite_history`
--
ALTER TABLE `animalbite_history`
  ADD CONSTRAINT `animalbite_history_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `animalbite` (`pid`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD CONSTRAINT `patient_history_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `checkup` (`pid`);

--
-- Constraints for table `patient_meta`
--
ALTER TABLE `patient_meta`
  ADD CONSTRAINT `patient_meta_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
