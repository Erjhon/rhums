-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 10:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit` date NOT NULL,
  `incident` date NOT NULL,
  `source` varchar(20) NOT NULL,
  `part` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `ownercon` varchar(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `assigned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animalbite`
--

INSERT INTO `animalbite` (`pid`, `patientId`, `pfname`, `pcontact`, `gender`, `dob`, `age`, `paddress`, `CreationDate`, `visit`, `incident`, `source`, `part`, `category`, `type`, `owner`, `ownercon`, `location`, `remark`, `assigned`) VALUES
(21, 0, 'Joshua Nilo', '09093698614', 'Male', '2002-01-20', 20, 'Santo Domingo, Nabua', '2022-12-06 05:24:56', '2022-12-06', '2022-11-28', 'Dog', 'Left Leg', 'I', 'Bite', 'Test', '09310967681', 'Residence', 'test', 'Erjhon Baldoza'),
(27, 0, 'Vice Ganda', '09657431235', 'Male', '2000-12-24', 21, 'Lourdes Old, Nabua', '2022-12-06 05:26:36', '2022-12-06', '2022-11-29', 'Cat', 'right leg', 'III', 'Scratch', 'Jenny', '09672342321', 'lpncs', 'Lorem ipsum dolor si', 'Super Admin'),
(29, 0, 'Kaela', '09324364564', 'Female', '2000-10-10', 22, 'Bustrac, Nabua', '2022-12-07 01:08:31', '2022-12-07', '2022-11-30', 'Cat', 'right leg', 'I', 'Bite', 'Jenny', '09242423432', 'lpncs', 'sffdsfdsfsdfdd fdsfsdfjshfjsfhm dsfdsjfdsjfhsdjshfs feirlaskrar', 'Super Admin'),
(35, 0, 'Kiarra', '09123461343', 'Female', '2000-02-04', 22, 'San Antonio Ogbon, Nabua', '2022-12-07 13:14:12', '2022-12-07', '2022-11-27', 'Cat', 'right arm', 'II', 'Bite', 'Jenny', '09098765433', 'lpncs', 'sds sadsggrtrbrgtrtr fdgdterr', 'Super Admin');

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
(7, 27, '2022-12-07', 'Dog', 'right arm', 'II', 'Scratch', 'sf', '09098765433', 'dfLorem ipsum dolor ', 'Lorem ipsum dolor si', '2022-12-06 09:02:36', 'Super Admin');

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
(21, 21, '2022-12-06 08:00:00', 'Animal Bite', 1, '2022-12-05 21:10:25', 1, 0, 'Super Admin'),
(22, 22, '2022-12-06 08:20:00', 'Check-up', 1, '2022-12-05 21:11:09', 0, 55, 'Patient'),
(23, 23, '2022-12-06 08:40:00', 'Check-up', 1, '2022-12-05 21:12:58', 22, 0, 'Erjhon Baldoza'),
(25, 25, '2022-12-06 09:20:00', 'Check-up', 1, '2022-12-05 21:17:14', 22, 0, 'Erjhon Baldoza'),
(31, 36, '2022-12-08 13:18:00', 'Immunization for Child', 1, '2022-12-07 21:19:09', 1, 0, 'Super Admin'),
(35, 36, '2022-12-12 08:00:00', 'Check-up', 1, '2022-12-11 07:44:37', 0, 55, 'Patient');

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
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit` varchar(20) NOT NULL,
  `bloodpress` varchar(20) NOT NULL,
  `bloodsugar` varchar(20) NOT NULL,
  `bodytemp` varchar(20) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `bmi` decimal(10,0) NOT NULL,
  `complaints` varchar(150) NOT NULL,
  `remark` varchar(150) NOT NULL,
  `assigned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`pid`, `patientId`, `pfname`, `pcontact`, `gender`, `dob`, `age`, `placebirth`, `guardian`, `paddress`, `CreationDate`, `visit`, `bloodpress`, `bloodsugar`, `bodytemp`, `weight`, `height`, `bmi`, `complaints`, `remark`, `assigned`) VALUES
(24, 0, 'Crizel B Domagsang', '09109598455', 'Female', '2000-06-13', 22, '', '', 'La Purisima, Nabua', '2022-12-06 10:25:56', '2022-12-07', '100/10', '12', '35', '53', '160', '21', 'sdvas dfjkfhfkjhfksjfa fsafaksfnskjhfefkjf mskfbskfjhskfehjfajnasc ckasfffjdfkjahskdas', 'kdsfhsdfkjd sfskjfnsfkjhdskfjdhfsks kjdsgksdhjsdfjasklv siobrhugrds kvdsgstjtk vdsghdkfzxvdjgkkdshtw ', 'Super Admin'),
(25, 0, 'Ma. Hanna Hernandez', '09109598455', 'Female', '2000-03-21', 22, 'La Purisima', 'May Yaga', 'Inapatan, Nabua', '2022-12-05 13:33:11', '2022-12-06', '120/80', '70', '36.5', '50', '163', '19', 'test', 'test', 'Erjhon Baldoza'),
(30, 0, 'Rosie', '09123456890', 'Male', '2022-12-12', 0, 'as', 'ds', 'San Esteban, Nabua', '2022-12-07 01:09:28', '2022-12-06', '120/12', '60', '35', '53', '160', '21', 'sdasd', 'dsa', 'Super Admin'),
(36, 0, 'Erjhon A Baldoza', '09381858656', 'Male', '2000-11-10', 22, '', 'Erma Baldoza', 'La Purisima, Nabua', '2022-12-10 23:46:43', '2022-12-12', '120/80', '70', '36.5', '50', '160', '20', 'test', 'test', 'Super Admin');

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
(55, 'Erjhon', 'A', 'Baldoza', 'tamih', '', 'e10adc3949ba59abbe56e057f20f883e', '', '09381858656', 'Male', '2000-11-10', 'La Purisima, Nabua'),
(56, 'Crizel', 'B', 'Domagsang', 'mamih', '', '9e086fb199ba5f83885b522690b8f176', '', '09109598455', 'Female', '2000-06-13', 'La Purisima, Nabua'),
(57, 'Hazel', 'N', 'Hernandez', 'hazel123', '', 'c5a4563b1753fb9975402ff0db890ed1', '', '09386522402', 'Female', '2000-12-10', 'Paloyon Proper, Nabua'),
(62, 'Lisa', 'N', 'Manoban', 'lisa12', 'ma.hernandez@my.cspc.edu.ph', '5573e1bff824c4560d8bb8ca1beb3ce6', '', '09386522402', 'Female', '2000-10-10', 'Angustia, Nabua'),
(63, 'Kim', 'C', 'Chui', 'kim123', 'hernandezmahanna6@gmail.com', '98467a817e2ff8c8377c1bf085da7138', '', '09386522402', 'Female', '2000-10-10', 'La Purisima, Nabua');

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
(44, 25, '2022-12-06 03:53:01', '120/80', '70', '36.5', '50', '153', '21', 'test', 'test', 'Erjhon Baldoza');

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_list`
--

INSERT INTO `patient_list` (`id`, `name`, `date_created`, `user_id`) VALUES
(21, 'Joshua Nilo', '2022-12-05 21:10:25', 0),
(22, 'Erjhon A Baldoza', '2022-12-05 21:11:09', 0),
(23, 'Crizel Domagsang', '2022-12-05 21:12:58', 0),
(25, 'Ma. Hanna Hernandez', '2022-12-05 21:17:14', 0),
(34, 'Rose Luzon', '2022-12-07 21:11:43', 0),
(35, 'Kiarra', '2022-12-07 21:14:12', 1),
(36, 'Kent', '2022-12-07 21:19:09', 0);

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
(206, 22, 'id', '', '2022-12-05 21:11:09'),
(207, 22, 'patient_id', '', '2022-12-05 21:11:09'),
(208, 22, 'name', 'Erjhon A Baldoza', '2022-12-05 21:11:09'),
(209, 22, 'email', '', '2022-12-05 21:11:09'),
(210, 22, 'contact', '09381858656', '2022-12-05 21:11:09'),
(211, 22, 'gender', 'Male', '2022-12-05 21:11:09'),
(212, 22, 'dob', '2000-11-10', '2022-12-05 21:11:09'),
(213, 22, 'address', 'La Purisima, Nabua', '2022-12-05 21:11:09'),
(214, 22, 'created', 'Patient', '2022-12-05 21:11:09'),
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
(287, 36, 'id', '', '2022-12-07 21:19:09'),
(288, 36, 'patient_id', '', '2022-12-07 21:19:09'),
(289, 36, 'name', 'Kent', '2022-12-07 21:19:09'),
(290, 36, 'email', '', '2022-12-07 21:19:09'),
(291, 36, 'contact', '09381858656', '2022-12-07 21:19:09'),
(292, 36, 'gender', 'Male', '2022-12-07 21:19:09'),
(293, 36, 'dob', '2002-02-12', '2022-12-07 21:19:09'),
(294, 36, 'address', 'Aro-aldao, Nabua', '2022-12-07 21:19:09'),
(295, 36, 'created', 'Super Admin', '2022-12-07 21:19:09'),
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
(1, 'Super', 'Admin', 'admin', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'uploads/1668776580_profile.jpg', NULL, 1, '2021-01-20 14:02:37', '2022-11-18 21:03:24'),
(22, 'Erjhon', 'Baldoza', 'erjbaldoza', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Staff', 'uploads/1665199200_196a11710c8b16a37c9889155de17ac6.jpg', NULL, 0, '2022-10-08 11:20:41', '2022-12-02 15:52:07'),
(24, 'Joshua', 'Nilo', 'nilojosh', '', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'uploads/1668951060_hutao.png', NULL, 0, '2022-11-20 21:31:53', '2022-12-19 12:58:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
