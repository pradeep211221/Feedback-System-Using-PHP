-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 04:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedbacksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `S_NO` int(11) NOT NULL,
  `User` varchar(15) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`S_NO`, `User`, `Email`, `Password`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `S_no` int(10) NOT NULL,
  `Name_` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_Number` bigint(10) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`S_no`, `Name_`, `Email`, `Phone_Number`, `Department`, `Designation`, `Course`) VALUES
(18, 'rajkumara', 'raj@gmail.com', 456789, 'Engineering', 'Sr Lec', 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `S_NO` int(100) NOT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `feedback_about` varchar(10) DEFAULT NULL,
  `faculty_rating` varchar(10) NOT NULL,
  `management_rating` varchar(10) DEFAULT NULL,
  `course_content` varchar(10) DEFAULT NULL,
  `teaching_methods` varchar(10) DEFAULT NULL,
  `communication_clarity` varchar(10) DEFAULT NULL,
  `assignments_feedback` varchar(10) DEFAULT NULL,
  `access_availability` varchar(10) DEFAULT NULL,
  `classroom_environment` varchar(10) DEFAULT NULL,
  `encouragement` varchar(10) DEFAULT NULL,
  `suggestions` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`S_NO`, `branch`, `section`, `feedback_about`, `faculty_rating`, `management_rating`, `course_content`, `teaching_methods`, `communication_clarity`, `assignments_feedback`, `access_availability`, `classroom_environment`, `encouragement`, `suggestions`, `date`) VALUES
(2, '', '', '', 'good', '', 'good', 'average', 'good', 'average', 'good', 'good', 'average', 'poor', NULL),
(3, '', '', '', 'good', '', 'average', 'average', 'good', 'average', 'average', 'good', 'average', 'good', NULL),
(4, '', '', '', 'good', '', 'good', 'average', 'average', 'good', 'average', 'good', 'average', 'good', NULL),
(5, '', '', '', 'good', '', 'good', 'average', 'good', 'good', 'good', 'average', 'good', 'good', NULL),
(6, '', '', '', 'good', '', 'excellent', 'good', 'good', 'good', 'excellent', 'good', 'good', 'good', NULL),
(7, '', '', '', 'good', '', '', 'excellent', 'average', 'good', 'good', 'average', 'good', 'average', NULL),
(8, '', '', '', 'excellent', '', 'average', 'poor', 'good', 'average', 'excellent', 'average', 'excellent', 'average', '2023-12-11'),
(9, '', '', '', 'poor', '', 'good', 'good', 'average', 'good', 'average', 'good', 'average', 'excellent', '2023-12-11'),
(10, '', '', '', 'good', '', 'good', 'average', 'good', 'average', 'good', 'average', 'good', 'average', '2023-12-11'),
(11, 'me', 'sectionB', 'faculty', 'good', '', 'average', 'good', 'average', 'good', 'average', 'good', 'average', 'good', '2023-12-12'),
(12, 'ece', 'sectionC', 'management', 'good', 'average', '', '', '', '', '', '', '', '', '2023-12-12'),
(13, 'civil', 'sectionB', 'faculty', 'good', '', 'average', 'poor', 'poor', 'good', 'poor', 'good', '', 'good', '2023-12-12'),
(14, 'ece', 'sectionB', 'management', 'good', 'average', '', '', '', '', '', '', '', '', '2023-12-12'),
(15, 'ece', 'sectionC', 'management', 'good', 'poor', '', '', '', '', '', '', '', '', '2023-12-12'),
(16, 'me', 'sectionB', 'management', 'good', 'average', '', '', '', '', '', '', '', '', '2023-12-13'),
(17, 'ece', 'sectionA', 'management', 'good', 'average', '', '', '', '', '', '', '', '', '2023-12-13'),
(18, 'ece', 'sectionC', 'management', 'good', 'average', '', '', '', '', '', '', '', '', '2023-12-13'),
(19, 'me', 'sectionC', 'management', 'good', 'average', '', '', '', '', '', '', '', '', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_NO` int(11) NOT NULL,
  `Full_Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password_` varchar(20) NOT NULL,
  `Student_Id` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Course` varchar(15) NOT NULL,
  `Date_Of_Registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_NO`, `Full_Name`, `Email`, `Password_`, `Student_Id`, `Gender`, `Course`, `Date_Of_Registration`) VALUES
(24, 'anji', 'anji@gmail.com', '123456', 'BEST2002', 'male', 'CSE', '2023-10-22'),
(28, 'madhu', 'madhu@gmail.com', 'madhu', 'BESTIU20009', 'male', 'MECH', '2023-10-28'),
(30, 'venkat', 'venkat@gmail.com', 'venkat', '200018', 'male', 'MECH', '2023-11-01'),
(31, 'anjali', 'anjali@gmail.com', 'anjali', 'best123', 'female', 'ECE', '2023-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `Serial No` (`S_NO`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`S_no`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`S_NO`),
  ADD KEY `Serial No` (`S_NO`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `S_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `S_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `S_NO` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
