-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assgn2`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(2) NOT NULL,
  `stud_id` int(6) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `marks` varchar(3) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `pointer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `stud_id`, `sub_id`, `marks`, `grade`, `pointer`) VALUES
(1, 100001, 0, '88', 'A-', '3.75');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_name` text NOT NULL,
  `stud_matricno` varchar(12) NOT NULL,
  `stud_id` int(6) NOT NULL,
  `stud_age` int(3) NOT NULL,
  `stud_course` varchar(7) NOT NULL,
  `stud_sem` int(2) NOT NULL,
  `stud_credithour` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_name`, `stud_matricno`, `stud_id`, `stud_age`, `stud_course`, `stud_sem`, `stud_credithour`) VALUES
('Farah hasanah', 'd201212345', 100001, 21, 'AC10', 3, 13),
('fathin', 'd123456789', 100002, 21, 'AC10', 3, 18),
('George ', 'd1111111', 100003, 22, 'AC10', 3, 18),
('haziq', 'd20171076706', 100004, 23, 'AC10', 6, 118),
('nashrah', 'D20171076789', 100005, 22, 'AC10', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(10) NOT NULL,
  `sub_code` varchar(10) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `credit_hour` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
