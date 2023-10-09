-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 07:04 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putera_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(8) NOT NULL,
  `emp_id` int(8) NOT NULL,
  `work_date` date NOT NULL,
  `shift_in` time NOT NULL,
  `shift_out` time NOT NULL,
  `absence_in` time NOT NULL,
  `absence_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `emp_id`, `work_date`, `shift_in`, `shift_out`, `absence_in`, `absence_out`) VALUES
(1, 1, '2021-02-01', '08:30:00', '17:30:00', '08:12:00', '16:35:00'),
(2, 2, '2021-02-01', '08:30:00', '17:30:00', '09:53:00', '17:32:00'),
(3, 3, '2021-02-01', '08:30:00', '17:30:00', '08:24:00', '22:15:00'),
(4, 4, '2021-02-01', '08:30:00', '17:30:00', '10:40:00', '17:45:00'),
(5, 5, '2021-02-01', '08:30:00', '17:30:00', '08:04:00', '14:30:00'),
(6, 6, '2021-02-01', '08:30:00', '17:30:00', '08:35:00', '17:40:00'),
(8, 1, '2021-02-02', '08:30:00', '17:30:00', '09:40:00', '22:00:00'),
(9, 2, '2021-02-02', '08:30:00', '17:30:00', '08:20:00', '14:40:00'),
(10, 3, '2021-02-02', '08:30:00', '17:30:00', '08:05:00', '19:30:00'),
(11, 4, '2021-02-02', '08:30:00', '17:30:00', '07:05:00', '18:30:00'),
(12, 5, '2021-02-02', '08:30:00', '17:30:00', '08:20:00', '22:45:00'),
(13, 6, '2023-09-29', '08:30:00', '17:30:00', '10:15:00', '21:43:00'),
(15, 1, '2021-02-03', '08:30:00', '17:30:00', '08:20:00', '12:40:00'),
(16, 2, '2021-02-03', '08:30:00', '17:30:00', '08:05:00', '19:35:00'),
(17, 3, '2021-02-03', '08:30:00', '17:30:00', '09:45:00', '21:05:00'),
(18, 4, '2021-02-03', '08:30:00', '17:30:00', '12:45:00', '17:50:00'),
(19, 5, '2021-02-03', '08:30:00', '17:30:00', '11:32:00', '17:35:00'),
(20, 6, '2021-02-03', '08:30:00', '17:30:00', '07:53:00', '12:35:00'),
(22, 1, '2021-02-02', '08:30:00', '17:30:00', '07:35:00', '19:32:00'),
(23, 2, '2021-02-04', '08:30:00', '17:30:00', '07:30:00', '12:00:00'),
(24, 3, '2021-02-04', '08:30:00', '17:30:00', '08:14:00', '14:30:00'),
(25, 4, '2021-02-04', '08:30:00', '17:30:00', '10:40:00', '16:00:00'),
(26, 5, '2021-02-04', '08:30:00', '17:30:00', '08:13:00', '15:05:00'),
(27, 6, '2021-02-04', '08:30:00', '17:30:00', '07:45:00', '22:35:00'),
(29, 1, '2021-02-05', '08:30:00', '17:30:00', '08:03:00', '23:35:00'),
(30, 2, '2021-02-05', '08:30:00', '17:30:00', '08:25:00', '22:35:00'),
(31, 3, '2021-02-05', '08:30:00', '17:30:00', '08:20:00', '11:45:00'),
(32, 4, '2021-02-05', '08:30:00', '17:30:00', '07:55:00', '18:35:00'),
(33, 5, '2021-02-05', '08:30:00', '17:30:00', '08:23:00', '17:35:00'),
(34, 6, '2021-02-05', '08:30:00', '17:30:00', '08:10:00', '17:48:00'),
(36, 1, '2021-02-08', '08:30:00', '17:30:00', '09:35:00', '20:40:00'),
(37, 2, '2021-02-08', '08:30:00', '17:30:00', '08:15:00', '17:45:00'),
(38, 3, '2021-02-08', '08:30:00', '17:30:00', '10:20:00', '19:05:00'),
(39, 4, '2021-02-08', '08:30:00', '17:30:00', '08:14:00', '20:50:00'),
(40, 5, '2021-02-08', '08:30:00', '17:30:00', '10:25:00', '19:25:00'),
(41, 6, '2021-02-08', '08:30:00', '17:30:00', '07:10:00', '12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(8) NOT NULL,
  `first_name` varchar(155) NOT NULL,
  `last_name` varchar(155) NOT NULL,
  `birth_place` date NOT NULL,
  `hire_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `status` varchar(155) NOT NULL,
  `sallary` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_karyawan`
--

CREATE TABLE `table_karyawan` (
  `id` int(11) NOT NULL,
  `first_name` varchar(155) DEFAULT NULL,
  `last_name` varchar(155) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `termination_date` varchar(155) DEFAULT NULL,
  `status` varchar(155) NOT NULL,
  `sallary` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_karyawan`
--

INSERT INTO `table_karyawan` (`id`, `first_name`, `last_name`, `birth_place`, `birth_date`, `hire_date`, `termination_date`, `status`, `sallary`) VALUES
(5, 'John', 'Smith', 'Oregon', '1970-06-12', '1992-02-01', '', 'PERMANENT', 8000000),
(6, 'Oliver', 'Reighn', 'Minnesota', '1973-04-14', '2000-03-15', '', 'PERMANENT', 7600000),
(7, 'Andrea', 'Wilson', 'Nevada', '1976-01-31', '1991-12-21', '', 'PERMANENT', 14000000),
(8, 'Emilie', 'Johnson', 'Ohio', '1967-03-12', '1990-06-29', '', 'PERMANENT', 11000000),
(9, 'William', 'Baker', 'Minnesota', '1969-07-01', '1994-05-01', '', 'PERMANENT', 97000000),
(10, 'Richard', 'Kelly', 'Kansas', '1989-12-03', '2010-09-08', '', 'CONTRACT', 5300000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_karyawan`
--
ALTER TABLE `table_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_karyawan`
--
ALTER TABLE `table_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
