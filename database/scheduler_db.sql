-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 04:17 PM
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
  `pfname` varchar(50) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `age` int(100) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalbite`
--

INSERT INTO `animalbite` (`pid`, `patientId`, `pfname`, `pcontact`, `gender`, `dob`, `age`, `paddress`, `CreationDate`) VALUES
(21, 0, 'Joshua Nilo', '09093698614', 'Male', '2002-01-20', 20, 'Santo Domingo, Nabua', '2022-12-06 05:24:56'),
(27, 0, 'Vice Ganda', '09657431235', 'Male', '2000-12-24', 21, 'Lourdes Old, Nabua', '2022-12-06 05:26:36'),
(29, 0, 'Kaela', '09324364564', 'Female', '2000-10-10', 22, 'Bustrac, Nabua', '2022-12-07 01:08:31'),
(35, 0, 'Kiarra', '09123461343', 'Female', '2000-02-04', 22, 'San Antonio Ogbon, Nabua', '2022-12-07 13:14:12'),
(42, 0, 'Animal Bite', '09381858656', 'Male', '2000-11-10', 22, 'San Esteban, Nabua', '2022-12-30 11:49:40'),
(44, 0, 'Animal Bite 1', '09093698614', 'Male', '2000-11-10', 22, 'Angustia, Nabua', '2022-12-30 11:54:10'),
(54, 0, 'tam a. baldoza', '09381858656', 'Antipolo Y', '2000-11-10', 22, 'Male', '2023-01-01 05:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `animalbite_history`
--

CREATE TABLE `animalbite_history` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `incident` date NOT NULL,
  `source` varchar(10) NOT NULL,
  `part` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `ownercon` varchar(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `visit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `assigned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalbite_history`
--

INSERT INTO `animalbite_history` (`id`, `patientId`, `incident`, `source`, `part`, `category`, `type`, `owner`, `ownercon`, `location`, `remark`, `visit`, `assigned`) VALUES
(2, 21, '2022-11-29', 'Dog', 'Left Leg', 'I', 'Bite', 'test', '09310967681', 'test', 'test', '2022-12-19 09:35:06', 'Erjhon Baldoza'),
(5, 21, '2022-12-07', 'Cat', 'right arm', 'III', 'Scratch', 'dsf', '09213123125', 'sdfdss', '', '2022-12-06 09:02:36', ''),
(6, 27, '2022-12-07', 'Dog', 'right arm', 'II', 'Scratch', 'sf', '09098765433', 'dfLorem ipsum dolor ', 'Lorem ipsum dolor si', '2022-12-06 09:02:36', 'Super Admin'),
(7, 27, '2022-12-07', 'Dog', 'right arm', 'II', 'Scratch', 'sf', '09098765433', 'dfLorem ipsum dolor ', 'Lorem ipsum dolor si', '2022-12-06 09:02:36', 'Super Admin'),
(9, 42, '2022-12-30', 'Dog', 'test', 'I', 'Bite', 'test', '09381858656', 'test', 'test', '2022-12-29 16:00:00', 'Super Admin'),
(10, 44, '2022-12-30', 'Dog', 'test', 'I', 'Bite', 'test', '09381858656', 'test', 'test', '2022-12-29 16:00:00', 'Super Admin'),
(11, 44, '2022-12-30', 'Cat', 'test', 'I', 'Scratch', 'name', '09381858656', 'location', 'mark', '2022-12-30 12:05:10', 'Super Admin'),
(12, 54, '2023-01-01', 'Cat', 'test', 'III', 'Bite', 'test', '09381858656', 'test', 'test', '2023-01-02 16:00:00', 'Erjhon Baldoza');

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
(21, 21, '2022-12-06 08:00:00', 'Animal Bite', 0, '2022-12-05 21:10:25', 1, 0, 'Super Admin'),
(23, 23, '2022-12-06 08:40:00', 'Check-up', 0, '2022-12-05 21:12:58', 22, 0, 'Erjhon Baldoza'),
(25, 25, '2022-12-06 09:20:00', 'Check-up', 0, '2022-12-05 21:17:14', 22, 0, 'Erjhon Baldoza'),
(36, 38, '2022-12-29 14:38:00', 'Check-up', 0, '2022-12-28 11:39:03', 1, 0, 'Super Admin'),
(38, 44, '2023-01-02 09:50:00', 'Animal Bite', 0, '2022-12-30 19:50:23', 1, 0, 'Super Admin'),
(39, 45, '2023-01-02 13:00:00', 'Check-up', 0, '2022-12-31 00:44:45', 22, 0, 'Erjhon Baldoza'),
(45, 51, '2023-01-02 14:12:00', 'Check-up', 0, '2022-12-31 01:13:03', 0, 55, 'Patient'),
(46, 52, '2023-01-02 15:13:00', 'Check-up', 0, '2022-12-31 01:13:14', 0, 55, 'Patient'),
(47, 53, '2023-01-02 08:52:00', 'Check-up', 0, '2023-01-01 12:52:14', 22, 0, 'Erjhon Baldoza'),
(48, 54, '2023-01-03 08:00:00', 'Animal Bite', 0, '2023-01-01 12:59:08', 22, 0, 'Erjhon Baldoza'),
(49, 55, '2023-01-03 09:00:00', 'Check-up', 0, '2023-01-02 14:11:01', 22, 0, 'Erjhon Baldoza'),
(50, 56, '2023-01-04 08:00:00', 'Check-up', 1, '2023-01-03 22:03:43', 1, 0, 'Super Admin'),
(55, 61, '2023-01-05 08:00:00', 'Check-up', 1, '2023-01-03 22:38:56', 0, 64, 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `pid` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `pfname` varchar(50) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `age` int(100) NOT NULL,
  `placebirth` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`pid`, `patientId`, `pfname`, `pcontact`, `gender`, `dob`, `age`, `placebirth`, `guardian`, `paddress`, `CreationDate`) VALUES
(24, 0, 'Crizel B Domagsang', '09109598455', 'Female', '2000-06-13', 22, '', '', 'La Purisima, Nabua', '2022-12-06 10:25:56'),
(25, 0, 'Ma. Hanna Hernandez', '09109598455', 'Female', '2000-03-21', 22, 'La Purisima', 'May Yaga', 'Inapatan, Nabua', '2022-12-05 13:33:11'),
(30, 0, 'Rosie', '09123456890', 'Male', '2022-12-12', 0, 'as', 'ds', 'San Esteban, Nabua', '2022-12-07 01:09:28'),
(36, 0, 'Erjhon A Baldoza', '09381858656', 'Male', '2000-11-10', 22, '', 'Erma Baldoza', 'La Purisima, Nabua', '2022-12-10 23:46:43'),
(38, 0, 'Patient 1', '09093698614', 'Male', '2000-11-10', 22, '', '', 'Dolorosa, Nabua', '2022-12-28 03:55:12'),
(40, 0, 'Patient 2', '09381858656', 'Male', '2000-11-10', 0, 'La Purisima', 'Erma Baldoza', 'Malawag, Nabua', '2022-12-28 05:01:27'),
(41, 0, 'Patient 2', '09381858656', 'Male', '2000-11-10', 0, 'La Purisima', 'Erma Baldoza', 'Malawag, Nabua', '2022-12-28 05:01:40'),
(42, 0, 'Patient 3', '09381858656', 'Female', '2000-11-10', 22, 'La Purisima', 'Ariel Baldoza', 'San Antonio Ogbon, Nabua', '2022-12-28 05:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(36, 'hernandezmahanna6@gmail.com', '61836', 1671351979),
(37, 'hernandezmahanna@gmail.com', '21136', 1671353420),
(38, 'hernandezmahanna@gmail.com', '95003', 1671353564),
(39, 'hernandezmahanna6@gmail.com', '96821', 1671353716),
(40, 'hernandezmahanna6@gmail.com', '41536', 1671353744),
(41, 'hernandezmahanna@gmail.com', '19896', 1671353870),
(42, 'hernandezmahanna6@gmail.com', '30614', 1671355023),
(43, 'hernandezmahanna6@gmail.com', '47876', 1671355954),
(44, 'hernandezmahanna6@gmail.com', '34257', 1671356133),
(45, 'hernandezmahanna6@gmail.com', '43125', 1671356332),
(46, 'hernandezmahanna6@gmail.com', '64261', 1671356578),
(47, 'hernandezmahanna@gmail.com', '88529', 1671358834),
(48, 'hernandezmahanna6@gmail.com', '51568', 1671358991),
(49, 'ma.hernandez@my.cspc.edu.ph', '23645', 1671359580),
(50, 'ma.hernandez@my.cspc.edu.ph', '71582', 1671372354),
(51, 'ma.hernandez@my.cspc.edu.ph', '85797', 1671372476),
(52, 'ma.hernandez@my.cspc.edu.ph', '33501', 1671373255),
(53, 'ma.hernandez@my.cspc.edu.ph', '14114', 1671373589),
(54, 'hernandezmahanna@gmail.com', '27569', 1671409317),
(55, 'hernandezmahanna@gmail.com', '73149', 1671409488),
(56, 'hernandezmahanna@gmail.com', '74149', 1671410870),
(57, 'hernandezmahanna@gmail.com', '37063', 1671411582),
(58, 'ma.hernandez@my.cspc.edu.ph', '17211', 1671411814),
(59, 'hernandezmahanna6@gmail.com', '76523', 1671412222),
(60, 'hernandezmahanna@gmail.com', '14389', 1671413691),
(61, 'hernandezmahanna@gmail.com', '44316', 1671414051),
(62, 'hernandezmahanna@gmail.com', '44316', 1671414051),
(63, 'hernandezmahanna@gmail.com', '68903', 1671414104),
(64, 'hernandezmahanna@gmail.com', '68903', 1671414104),
(65, 'hernandezmahanna@gmail.com', '69997', 1671414384),
(66, 'hernandezmahanna@gmail.com', '29386', 1671414944),
(67, 'crizeldomagsang@gmail.com', '77520', 1671419900),
(68, 'hernandezmahanna@gmail.com', '82590', 1671420114),
(69, 'hernandezmahanna@gmail.com', '66813', 1671420221),
(70, 'hernandezmahanna@gmail.com', '17010', 1671420342),
(71, 'hernandezmahanna@gmail.com', '85978', 1671421282),
(72, 'ma.hernandez@my.cspc.edu.ph', '90135', 1671421537),
(73, 'ma.hernandez@my.cspc.edu.ph', '28666', 1671422838),
(74, 'ma.hernandez@my.cspc.edu.ph', '45901', 1671422914),
(75, 'ma.hernandez@my.cspc.edu.ph', '34640', 1671423130),
(76, 'ma.hernandez@my.cspc.edu.ph', '74316', 1671423211),
(77, 'ma.hernandez@my.cspc.edu.ph', '82386', 1671423288),
(78, 'ma.hernandez@my.cspc.edu.ph', '53701', 1671423317),
(79, 'ma.hernandez@my.cspc.edu.ph', '90787', 1671423382),
(80, 'ma.hernandez@my.cspc.edu.ph', '54798', 1671423459),
(81, 'ma.hernandez@my.cspc.edu.ph', '65786', 1671423750),
(82, 'ma.hernandez@my.cspc.edu.ph', '20603', 1671424089),
(83, 'crizeldomagsang13@gmail.com', '80957', 1671424585),
(84, 'ma.hernandez@my.cspc.edu.ph', '87027', 1671426774),
(85, 'ma.hernandez@my.cspc.edu.ph', '72734', 1671442757);

-- --------------------------------------------------------

--
-- Table structure for table `immunization_1to3`
--

CREATE TABLE `immunization_1to3` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cpab` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `blength` int(100) NOT NULL,
  `bweight` int(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `breastfeed` date NOT NULL,
  `bcg` date NOT NULL,
  `hepa` date NOT NULL,
  `monthage` varchar(100) NOT NULL,
  `length` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `ltaken` date NOT NULL,
  `wtaken` date NOT NULL,
  `weightgiven` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `immunization` varchar(20) NOT NULL,
  `dose` varchar(20) NOT NULL,
  `doi` date NOT NULL,
  `exbf` varchar(20) NOT NULL,
  `age11m` int(11) NOT NULL,
  `length11m` decimal(10,0) NOT NULL,
  `ltaken11m` date NOT NULL,
  `weight11m` decimal(10,0) NOT NULL,
  `wtaken11m` date NOT NULL,
  `status11m` varchar(20) NOT NULL,
  `exbf11m` varchar(20) NOT NULL,
  `infant` date NOT NULL,
  `feeding` varchar(20) NOT NULL,
  `breastfed` int(11) NOT NULL,
  `vitamin` date NOT NULL,
  `mnp` date NOT NULL,
  `mcv1` date NOT NULL,
  `mcv2` date NOT NULL,
  `fic` date NOT NULL,
  `cic` date NOT NULL,
  `assigned` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_1to3`
--

INSERT INTO `immunization_1to3` (`id`, `patientId`, `CreationDate`, `cpab`, `age`, `blength`, `bweight`, `status`, `stat`, `breastfeed`, `bcg`, `hepa`, `monthage`, `length`, `weight`, `ltaken`, `wtaken`, `weightgiven`, `birthdate`, `immunization`, `dose`, `doi`, `exbf`, `age11m`, `length11m`, `ltaken11m`, `weight11m`, `wtaken11m`, `status11m`, `exbf11m`, `infant`, `feeding`, `breastfed`, `vitamin`, `mnp`, `mcv1`, `mcv2`, `fic`, `cic`, `assigned`, `remarks`) VALUES
(13, 50, '2022-12-18 15:55:07', 'TT3/Td3 to TT5/Td5 (or TT1/Td1 to TT5/Td5)', '12', 0, 0, 'W-SAM: Wasted SAM', '', '0000-00-00', '0000-00-00', '0000-00-00', '1-3Months', '35', '35', '2022-12-18', '2022-12-18', '1 month', NULL, '', '', '0000-00-00', '', 0, '0', '0000-00-00', '0', '0000-00-00', '', '', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Erjhon Baldoza', 'test'),
(14, 50, '2022-12-18 16:07:10', 'Select Option', '', 0, 0, 'Select Status', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Select Age', '', '', '0000-00-00', '0000-00-00', 'Select month/s', '0000-00-00', 'Select Immunization', 'Select Dose', '0000-00-00', 'Select Dose', 0, '0', '0000-00-00', '0', '0000-00-00', '', '', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Erjhon Baldoza', '');

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
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cpab` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `blength` int(100) NOT NULL,
  `bweight` int(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `breastfeed` date NOT NULL,
  `bcg` date NOT NULL,
  `hepa` date NOT NULL,
  `remarks` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_child`
--

INSERT INTO `immunization_child` (`id`, `dor`, `dob`, `fsn`, `child`, `sex`, `mother`, `address`, `CreationDate`, `cpab`, `age`, `blength`, `bweight`, `status`, `breastfeed`, `bcg`, `hepa`, `remarks`) VALUES
(28, '0000-00-00', '0000-00-00', 0, 'dfs', 'Male', 'dfsd', 'dfsf', '2022-12-06 15:15:55', 'TT2/Td2', 'Newborn', 12, 12, 'Select Status', '2022-12-07', '2022-12-07', '2022-12-07', 'sefrser');

-- --------------------------------------------------------

--
-- Table structure for table `immunization_new`
--

CREATE TABLE `immunization_new` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cpab` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `blength` int(100) NOT NULL,
  `bweight` int(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `breastfeed` date NOT NULL,
  `bcg` date NOT NULL,
  `hepa` date NOT NULL,
  `monthage` varchar(100) NOT NULL,
  `length` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `ltaken` date NOT NULL,
  `wtaken` date NOT NULL,
  `weightgiven` varchar(100) NOT NULL,
  `for1month` date DEFAULT NULL,
  `for2month` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `immunization` varchar(20) NOT NULL,
  `dose` varchar(20) NOT NULL,
  `doi` date NOT NULL,
  `exbf` varchar(20) NOT NULL,
  `age11m` int(11) NOT NULL,
  `length11m` decimal(10,0) NOT NULL,
  `ltaken11m` date NOT NULL,
  `weight11m` decimal(10,0) NOT NULL,
  `wtaken11m` date NOT NULL,
  `status11m` varchar(20) NOT NULL,
  `exbf11m` varchar(20) NOT NULL,
  `infant` date NOT NULL,
  `feeding` varchar(20) NOT NULL,
  `breastfed` int(11) NOT NULL,
  `vitamin` date NOT NULL,
  `mnp` date NOT NULL,
  `mvc1` date NOT NULL,
  `mvc2` date NOT NULL,
  `fic` date NOT NULL,
  `cic` date NOT NULL,
  `assigned` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_new`
--

INSERT INTO `immunization_new` (`id`, `patientId`, `CreationDate`, `cpab`, `age`, `blength`, `bweight`, `status`, `stat`, `breastfeed`, `bcg`, `hepa`, `monthage`, `length`, `weight`, `ltaken`, `wtaken`, `weightgiven`, `for1month`, `for2month`, `date`, `immunization`, `dose`, `doi`, `exbf`, `age11m`, `length11m`, `ltaken11m`, `weight11m`, `wtaken11m`, `status11m`, `exbf11m`, `infant`, `feeding`, `breastfed`, `vitamin`, `mnp`, `mvc1`, `mvc2`, `fic`, `cic`, `assigned`, `remarks`) VALUES
(4, 41, '2022-12-18 14:00:43', 'TT2/Td2', 'Newborn', 13, 13, '', 'L - low < 2500gms', '2022-12-18', '2022-12-18', '2022-12-18', '', '', '', '0000-00-00', '0000-00-00', '', NULL, NULL, NULL, '', '', '0000-00-00', '', 0, '0', '0000-00-00', '0', '0000-00-00', '', '', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Erjhon Baldoza', 'test'),
(7, 50, '2022-12-18 15:32:26', 'Select Option', '1-3Months', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '213', '', '0000-00-00', '0000-00-00', '', NULL, NULL, NULL, '', '', '0000-00-00', '', 0, '0', '0000-00-00', '0', '0000-00-00', '', '', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Erjhon Baldoza', ''),
(8, 50, '2022-12-18 15:32:51', 'Select Option', 'Select Age', 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', NULL, NULL, NULL, '', '', '0000-00-00', '', 0, '0', '0000-00-00', '0', '0000-00-00', '', '', '0000-00-00', '', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Erjhon Baldoza', '');

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
  `email` varchar(100) NOT NULL,
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

INSERT INTO `patient` (`id`, `firstname`, `middleInitial`, `lastname`, `username`, `email`, `password`, `image`, `contact`, `gender`, `dob`, `address`) VALUES
(55, 'Erjhon', 'A', 'Baldoza', 'tamih', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '09381858656', 'Male', '2000-11-10', 'La Purisima, Nabua'),
(56, 'Crizel', 'B', 'Domagsang', 'mamih', '', '9e086fb199ba5f83885b522690b8f176', '', '09109598455', 'Female', '2000-06-13', 'La Purisima, Nabua'),
(57, 'Hazel', 'N', 'Hernandez', 'hazel123', '', 'c5a4563b1753fb9975402ff0db890ed1', '', '09386522402', 'Female', '2000-12-10', 'Paloyon Proper, Nabua'),
(62, 'Lisa', 'N', 'Manoban', 'lisa12', 'ma.hernandez@my.cspc.edu.ph', '5573e1bff824c4560d8bb8ca1beb3ce6', '', '09386522402', 'Female', '2000-10-10', 'Angustia, Nabua'),
(63, 'Kim', 'C', 'Chui', 'kim123', 'hernandezmahanna6@gmail.com', '98467a817e2ff8c8377c1bf085da7138', '', '09386522402', 'Female', '2000-10-10', 'La Purisima, Nabua'),
(64, 'Marianne', 'A', 'Baldoza', 'marianne', 'mar@gmail.com', '9880c35d8804ed40f467de976963966b', '', '09093698614', 'Female', '2005-03-07', 'Lourdes Young, Nabua');

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
  `weight` decimal(10,0) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `bmi` varchar(20) NOT NULL,
  `complaints` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `assigned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`id`, `patientId`, `visit`, `bloodpress`, `bloodsugar`, `bodytemp`, `weight`, `height`, `bmi`, `complaints`, `remark`, `assigned`) VALUES
(44, 25, '2022-12-06 03:53:01', '120/80', '70', '36.5', '50', '153', '21', 'test', 'test', 'Erjhon Baldoza'),
(54, 38, '2022-12-27 16:00:00', '120/80', '70', '36.5', '50', '165', '18.4', 'test', 'test', 'Erjhon Baldoza'),
(56, 41, '2022-12-27 16:00:00', '120/80', '70', '36.5', '50', '165', '', 'test', 'test', 'Erjhon Baldoza'),
(57, 42, '2022-12-25 16:00:00', '120/80', '70', '36.5', '50', '165', '18.4', 'try', 'try', 'Erjhon Baldoza'),
(58, 42, '2022-12-28 05:06:55', '120/100', '60', '42.10', '53', '163', '19.9', 'test', 'test', 'Erjhon Baldoza'),
(59, 24, '2022-12-30 11:59:32', '120/80', '70', '13', '50', '165', '18.4', 'complaint', 'remark', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mname` varchar(2) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `mname`, `lname`, `date_created`, `user_id`) VALUES
(21, 'Joshua Nilo', '', '', '2022-12-05 21:10:25', 0),
(23, 'Crizel', '', '', '2022-12-05 21:12:58', 0),
(25, 'Ma. Hanna Hernandez', '', '', '2022-12-05 21:17:14', 0),
(34, 'Rose Luzon', '', '', '2022-12-07 21:11:43', 0),
(35, 'Kiarra', '', '', '2022-12-07 21:14:12', 1),
(38, 'Patient 1', '', '', '2022-12-28 11:39:03', 0),
(39, 'Patient 2', '', '', '2022-12-28 13:01:10', 22),
(40, 'Patient 2', '', '', '2022-12-28 13:01:27', 22),
(41, 'Patient 2', '', '', '2022-12-28 13:01:40', 22),
(42, 'Animal Bite', '', '', '2022-12-30 19:49:40', 1),
(44, 'Animal Bite 1', '', '', '2022-12-30 19:50:23', 0),
(45, 'Check Up', '', '', '2022-12-31 00:44:45', 0),
(51, 'Erjhon A. Baldoza', '', '', '2022-12-31 01:13:03', 0),
(52, 'Erjhon A. Baldoza', '', '', '2022-12-31 01:13:14', 0),
(53, 'Erjhon', '', '', '2023-01-01 12:52:14', 0),
(54, 'tam', 'a', 'baldoza', '2023-01-01 12:59:08', 0),
(55, 'Marianne', 'A', 'Baldoza', '2023-01-02 14:11:01', 0),
(56, 'Jisoo', 'K', 'Park', '2023-01-03 22:03:43', 0),
(61, 'Marianne', 'A.', 'Baldoza', '2023-01-03 22:38:56', 0);

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
(197, 21, 'id', '', '2022-12-05 21:10:25'),
(198, 21, 'patient_id', '', '2022-12-05 21:10:25'),
(199, 21, 'name', 'Joshua Nilo', '2022-12-05 21:10:25'),
(200, 21, 'email', '', '2022-12-05 21:10:25'),
(201, 21, 'contact', '09093698614', '2022-12-05 21:10:25'),
(202, 21, 'gender', 'Male', '2022-12-05 21:10:25'),
(203, 21, 'dob', '2002-01-20', '2022-12-05 21:10:25'),
(204, 21, 'address', 'Santo Domingo, Nabua', '2022-12-05 21:10:25'),
(205, 21, 'created', 'Super Admin', '2022-12-05 21:10:25'),
(215, 23, 'id', '', '2022-12-05 21:12:58'),
(216, 23, 'patient_id', '', '2022-12-05 21:12:58'),
(217, 23, 'name', 'Crizel Domagsang', '2022-12-05 21:12:58'),
(218, 23, 'email', '', '2022-12-05 21:12:58'),
(219, 23, 'contact', '09093698614', '2022-12-05 21:12:58'),
(220, 23, 'gender', 'Female', '2022-12-05 21:12:58'),
(221, 23, 'dob', '2000-06-13', '2022-12-05 21:12:58'),
(222, 23, 'address', 'La Purisima, Nabua', '2022-12-05 21:12:58'),
(223, 23, 'created', 'Erjhon Baldoza', '2022-12-05 21:12:58'),
(233, 25, 'id', '', '2022-12-05 21:17:14'),
(234, 25, 'patient_id', '', '2022-12-05 21:17:14'),
(235, 25, 'name', 'Ma. Hanna Hernandez', '2022-12-05 21:17:14'),
(236, 25, 'email', '', '2022-12-05 21:17:14'),
(237, 25, 'contact', '09109598455', '2022-12-05 21:17:14'),
(238, 25, 'gender', 'Female', '2022-12-05 21:17:14'),
(239, 25, 'dob', '2000-03-21', '2022-12-05 21:17:14'),
(240, 25, 'address', 'Inapatan, Nabua', '2022-12-05 21:17:14'),
(241, 25, 'created', 'Erjhon Baldoza', '2022-12-05 21:17:14'),
(278, 34, 'id', '', '2022-12-07 21:11:43'),
(279, 34, 'patient_id', '', '2022-12-07 21:11:43'),
(280, 34, 'name', 'Rose Luzon', '2022-12-07 21:11:43'),
(281, 34, 'email', '', '2022-12-07 21:11:43'),
(282, 34, 'contact', '09386522402', '2022-12-07 21:11:43'),
(283, 34, 'gender', 'Female', '2022-12-07 21:11:43'),
(284, 34, 'address', 'La Purisima, Nabua', '2022-12-07 21:11:43'),
(285, 34, 'dob', '2001-10-10', '2022-12-07 21:11:43'),
(286, 34, 'created', 'Guardian', '2022-12-07 21:11:43'),
(332, 38, 'id', '', '2022-12-28 11:39:03'),
(333, 38, 'patient_id', '', '2022-12-28 11:39:03'),
(334, 38, 'name', 'Patient 1', '2022-12-28 11:39:03'),
(335, 38, 'email', '', '2022-12-28 11:39:03'),
(336, 38, 'contact', '09093698614', '2022-12-28 11:39:03'),
(337, 38, 'gender', 'Male', '2022-12-28 11:39:03'),
(338, 38, 'dob', '2000-11-10', '2022-12-28 11:39:03'),
(339, 38, 'address', 'Dolorosa, Nabua', '2022-12-28 11:39:03'),
(340, 38, 'created', 'Super Admin', '2022-12-28 11:39:03'),
(350, 44, 'id', '', '2022-12-30 19:50:23'),
(351, 44, 'patient_id', '', '2022-12-30 19:50:23'),
(352, 44, 'name', 'Animal Bite 1', '2022-12-30 19:50:23'),
(353, 44, 'email', '', '2022-12-30 19:50:23'),
(354, 44, 'contact', '09093698614', '2022-12-30 19:50:23'),
(355, 44, 'gender', 'Male', '2022-12-30 19:50:23'),
(356, 44, 'dob', '2000-11-10', '2022-12-30 19:50:23'),
(357, 44, 'address', 'Angustia, Nabua', '2022-12-30 19:50:23'),
(358, 44, 'created', 'Super Admin', '2022-12-30 19:50:23'),
(359, 45, 'id', '', '2022-12-31 00:44:45'),
(360, 45, 'patient_id', '', '2022-12-31 00:44:45'),
(361, 45, 'name', 'Check Up', '2022-12-31 00:44:45'),
(362, 45, 'email', '', '2022-12-31 00:44:45'),
(363, 45, 'contact', '09093698614', '2022-12-31 00:44:45'),
(364, 45, 'gender', 'Male', '2022-12-31 00:44:45'),
(365, 45, 'dob', '2000-11-10', '2022-12-31 00:44:45'),
(366, 45, 'address', 'Bustrac, Nabua', '2022-12-31 00:44:45'),
(367, 45, 'created', 'Erjhon Baldoza', '2022-12-31 00:44:45'),
(413, 51, 'id', '', '2022-12-31 01:13:03'),
(414, 51, 'patient_id', '', '2022-12-31 01:13:03'),
(415, 51, 'name', 'Erjhon A. Baldoza', '2022-12-31 01:13:03'),
(416, 51, 'email', '', '2022-12-31 01:13:03'),
(417, 51, 'contact', '09381858656', '2022-12-31 01:13:03'),
(418, 51, 'gender', 'Male', '2022-12-31 01:13:03'),
(419, 51, 'dob', '2000-11-10', '2022-12-31 01:13:03'),
(420, 51, 'address', 'La Purisima, Nabua', '2022-12-31 01:13:03'),
(421, 51, 'created', 'Patient', '2022-12-31 01:13:03'),
(422, 52, 'id', '', '2022-12-31 01:13:14'),
(423, 52, 'patient_id', '', '2022-12-31 01:13:14'),
(424, 52, 'name', 'Erjhon A. Baldoza', '2022-12-31 01:13:14'),
(425, 52, 'email', '', '2022-12-31 01:13:14'),
(426, 52, 'contact', '09381858656', '2022-12-31 01:13:14'),
(427, 52, 'gender', 'Male', '2022-12-31 01:13:14'),
(428, 52, 'dob', '2000-11-10', '2022-12-31 01:13:14'),
(429, 52, 'address', 'La Purisima, Nabua', '2022-12-31 01:13:14'),
(430, 52, 'created', 'Patient', '2022-12-31 01:13:14'),
(431, 53, 'id', '', '2023-01-01 12:52:14'),
(432, 53, 'patient_id', '', '2023-01-01 12:52:14'),
(433, 53, 'name', 'Erjhon', '2023-01-01 12:52:14'),
(434, 53, 'lname', 'Baldoza', '2023-01-01 12:52:14'),
(435, 53, 'email', '', '2023-01-01 12:52:14'),
(436, 53, 'contact', '09381858656', '2023-01-01 12:52:14'),
(437, 53, 'gender', 'Male', '2023-01-01 12:52:14'),
(438, 53, 'dob', '2000-11-10', '2023-01-01 12:52:14'),
(439, 53, 'mname', 'A', '2023-01-01 12:52:14'),
(440, 53, 'address', 'Antipolo Young, Nabua', '2023-01-01 12:52:14'),
(441, 53, 'created', 'Erjhon Baldoza', '2023-01-01 12:52:14'),
(442, 54, 'id', '', '2023-01-01 12:59:08'),
(443, 54, 'patient_id', '', '2023-01-01 12:59:08'),
(444, 54, 'name', 'tam', '2023-01-01 12:59:08'),
(445, 54, 'lname', 'baldoza', '2023-01-01 12:59:08'),
(446, 54, 'email', '', '2023-01-01 12:59:08'),
(447, 54, 'contact', '09381858656', '2023-01-01 12:59:08'),
(448, 54, 'gender', 'Male', '2023-01-01 12:59:08'),
(449, 54, 'dob', '2000-11-10', '2023-01-01 12:59:08'),
(450, 54, 'mname', 'a', '2023-01-01 12:59:08'),
(451, 54, 'address', 'Antipolo Young, Nabua', '2023-01-01 12:59:08'),
(452, 54, 'created', 'Erjhon Baldoza', '2023-01-01 12:59:08'),
(453, 55, 'id', '', '2023-01-02 14:11:01'),
(454, 55, 'patient_id', '', '2023-01-02 14:11:01'),
(455, 55, 'name', 'Taehyung', '2023-01-02 14:11:01'),
(456, 55, 'lname', 'Kim', '2023-01-02 14:11:01'),
(457, 55, 'email', '', '2023-01-02 14:11:01'),
(458, 55, 'contact', '09381858656', '2023-01-02 14:11:01'),
(459, 55, 'gender', 'Male', '2023-01-02 14:11:01'),
(460, 55, 'dob', '1995-12-30', '2023-01-02 14:11:01'),
(461, 55, 'mname', 'V', '2023-01-02 14:11:01'),
(462, 55, 'address', 'Bustrac, Nabua', '2023-01-02 14:11:01'),
(463, 55, 'created', 'Erjhon Baldoza', '2023-01-02 14:11:01'),
(464, 56, 'id', '', '2023-01-03 22:03:43'),
(465, 56, 'patient_id', '', '2023-01-03 22:03:43'),
(466, 56, 'name', 'Jisoo', '2023-01-03 22:03:43'),
(467, 56, 'lname', 'Park', '2023-01-03 22:03:43'),
(468, 56, 'email', '', '2023-01-03 22:03:43'),
(469, 56, 'contact', '09109598455', '2023-01-03 22:03:43'),
(470, 56, 'gender', 'Female', '2023-01-03 22:03:43'),
(471, 56, 'dob', '1995-01-03', '2023-01-03 22:03:43'),
(472, 56, 'mname', 'K', '2023-01-03 22:03:43'),
(473, 56, 'address', 'Dolorosa, Nabua', '2023-01-03 22:03:43'),
(474, 56, 'created', 'Super Admin', '2023-01-03 22:03:43'),
(521, 61, 'id', '55', '2023-01-03 23:06:07'),
(522, 61, 'patient_id', '61', '2023-01-03 23:06:07'),
(523, 61, 'name', 'Marianne', '2023-01-03 23:06:07'),
(524, 61, 'lname', 'Baldoza', '2023-01-03 23:06:07'),
(525, 61, 'email', '', '2023-01-03 23:06:07'),
(526, 61, 'contact', '0909093698614', '2023-01-03 23:06:07'),
(527, 61, 'gender', 'Female', '2023-01-03 23:06:07'),
(528, 61, 'dob', '2005-03-07', '2023-01-03 23:06:07'),
(529, 61, 'mname', 'A', '2023-01-03 23:06:07'),
(530, 61, 'address', 'Lourdes Old, Nabua', '2023-01-03 23:06:07'),
(531, 61, 'created', 'Erjhon Baldoza', '2023-01-03 23:06:07');

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
('afternoon_schedule', '13:00,17:00', '2022-09-29 14:25:57'),
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
  `email` varchar(100) NOT NULL,
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

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Super', 'Admin', 'admin', 'erjhon@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'uploads/1668776580_profile.jpg', NULL, 1, '2021-01-20 14:02:37', '2022-12-30 23:38:40'),
(22, 'Erjhon', 'Baldoza', 'erjbaldoza', '', '1253208465b1efa876f982d8a9e73eef', 'Staff', 'uploads/1665199200_196a11710c8b16a37c9889155de17ac6.jpg', NULL, 0, '2022-10-08 11:20:41', '2022-12-31 00:43:59'),
(24, 'Joshua', 'Nilo', 'nilojosh', '', '1253208465b1efa876f982d8a9e73eef', 'Admin', 'uploads/1668951060_hutao.png', NULL, 0, '2022-11-20 21:31:53', '2022-12-30 23:33:54');

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
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expire` (`expire`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `immunization_1to3`
--
ALTER TABLE `immunization_1to3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immunization_child`
--
ALTER TABLE `immunization_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immunization_new`
--
ALTER TABLE `immunization_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `immunization_child`
--
ALTER TABLE `immunization_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `patient_meta`
--
ALTER TABLE `patient_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
