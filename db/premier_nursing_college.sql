-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 07:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `premier_nursing_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Sirname` varchar(30) NOT NULL,
  `Mtitle` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Institution` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Phone`, `Institution`, `Password`, `Email`) VALUES
(1, 'Patrick', 'Mvuma', 'Mr', '0999107724', '', '1234554321', 'mvumapatrick@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `Serial`, `Pin`) VALUES
(1900, '123456789', '123456789'),
(1901, '122345678', '122345678');

-- --------------------------------------------------------

--
-- Table structure for table `applicants2`
--

CREATE TABLE `applicants2` (
  `id` int(11) NOT NULL,
  `Othername` varchar(300) NOT NULL,
  `Surname` varchar(300) NOT NULL,
  `DOB` varchar(300) NOT NULL,
  `Gender` varchar(300) NOT NULL,
  `PlaceOfbirth` varchar(300) NOT NULL,
  `Hometown` varchar(300) NOT NULL,
  `Country` varchar(300) NOT NULL,
  `State` varchar(300) NOT NULL,
  `Localgvt` varchar(300) NOT NULL,
  `Appresaddress` varchar(300) NOT NULL,
  `Appcoraddress` varchar(300) NOT NULL,
  `Gname` varchar(300) NOT NULL,
  `Gplace` varchar(300) NOT NULL,
  `Ghometown` varchar(300) NOT NULL,
  `Gcountry` varchar(300) NOT NULL,
  `Gstate` varchar(300) NOT NULL,
  `Glocalgvt` varchar(300) NOT NULL,
  `Gaddress` varchar(300) NOT NULL,
  `Gmobile` varchar(300) NOT NULL,
  `Applicantphone` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  `matric` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `lga` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `personal_info` text DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `serial`, `pin`, `title`, `surname`, `other_name`, `matric`, `gender`, `email`, `phone`, `dob`, `pob`, `marital_status`, `rel`, `country`, `state`, `town`, `lga`, `address`, `personal_info`, `department`, `level`, `degree`) VALUES
(2, '123456789', '123456789', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `courseapplied`
--

CREATE TABLE `courseapplied` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `declared`
--

CREATE TABLE `declared` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Size` decimal(10,0) DEFAULT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `Title`, `Name`, `Type`, `Size`, `content`) VALUES
(1, 'guides', 'guides.docx', 'application/vnd.ms-docx', 88, ''),
(2, 'Serial_Pin_Bulk', 'Serial_Pin_Bulk.csv', 'application/vnd.ms-excel', 76, '');

-- --------------------------------------------------------

--
-- Table structure for table `localgovernment`
--

CREATE TABLE `localgovernment` (
  `id` int(11) NOT NULL,
  `Statesid` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `olevel`
--

CREATE TABLE `olevel` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Results` varchar(5000) NOT NULL,
  `ExamDate` varchar(300) NOT NULL,
  `ExamIndex` varchar(300) NOT NULL,
  `ExamBody` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `olevel`
--

INSERT INTO `olevel` (`id`, `Serial`, `Pin`, `Results`, `ExamDate`, `ExamIndex`, `ExamBody`) VALUES
(6, '123456789', '123456789', '{}', '[, ]', '[, ]', '[WAEC, WAEC]');

-- --------------------------------------------------------

--
-- Table structure for table `previousxul`
--

CREATE TABLE `previousxul` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Froms` varchar(30) NOT NULL,
  `Tos` varchar(300) NOT NULL,
  `Qualification` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilepictures`
--

CREATE TABLE `profilepictures` (
  `id` int(11) NOT NULL,
  `Serial` varchar(300) NOT NULL,
  `Pin` varchar(300) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmechoices`
--

CREATE TABLE `programmechoices` (
  `id` int(11) NOT NULL,
  `choiceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programmechoices`
--

INSERT INTO `programmechoices` (`id`, `choiceName`) VALUES
(1, 'Nursing'),
(2, 'Midwifery'),
(3, 'Nutrition'),
(4, 'Medical Laboratory Technology');

-- --------------------------------------------------------

--
-- Table structure for table `schoolchoices`
--

CREATE TABLE `schoolchoices` (
  `id` int(11) NOT NULL,
  `Serial` varchar(50) NOT NULL,
  `Pin` varchar(50) NOT NULL,
  `FirstChoice` varchar(100) DEFAULT NULL,
  `SecondChoice` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schoolchoices`
--

INSERT INTO `schoolchoices` (`id`, `Serial`, `Pin`, `FirstChoice`, `SecondChoice`) VALUES
(2, '123456789', '123456789', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schoolgrades`
--

CREATE TABLE `schoolgrades` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schoolgrades`
--

INSERT INTO `schoolgrades` (`id`, `Name`) VALUES
(1, 'A1'),
(2, 'B2'),
(3, 'B3'),
(4, 'C4'),
(5, 'C5'),
(6, 'C6'),
(7, 'D7'),
(8, 'E8'),
(9, 'F9');

-- --------------------------------------------------------

--
-- Table structure for table `schoolsubjects`
--

CREATE TABLE `schoolsubjects` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schoolsubjects`
--

INSERT INTO `schoolsubjects` (`id`, `Name`) VALUES
(1, 'Core Mathematics'),
(2, 'English Language'),
(3, 'Social Studies'),
(4, 'Inte. Science'),
(5, 'Physics'),
(6, 'Biology'),
(7, 'Elective Mathematics'),
(8, 'Chemistry'),
(9, 'History'),
(10, 'Food and Nutrition'),
(11, 'Clothing and Textiles'),
(12, 'Literature'),
(13, 'Religious Studies'),
(14, 'Geography');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobileNumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Serial` varchar(20) DEFAULT NULL,
  `Pin` varchar(20) DEFAULT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `isSubmitted` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `surname`, `firstName`, `middleName`, `email`, `mobileNumber`, `password`, `Serial`, `Pin`, `registrationDate`, `isSubmitted`, `status`) VALUES
(1, 'itpapp.site', 'Abdulsamad', '', '', 'abdulsamadbalogun25@gmail.com', '', '12345678', '', '', '2023-11-30 18:05:55', '0', 'pending'),
(2, 'r24r24r', 'r24r23r', 'Zainab Oyindamola', '', 'Zainabbalogun866@gmail.com', '2348050363172', '12345678', '', '', '2023-11-30 18:09:07', '0', 'pending'),
(3, 'r24r24rewfwef', 'r24r23r', 'Zainab Oyindamola', 'efefwefre', 'Zainabbaelogun866@gmail.com', '2348050363172', '12345678', '', '', '2023-11-30 18:11:06', '0', 'pending'),
(4, '1111113', 'Abdulsamad', 'Dev', 'r44f4', 'abdulsamadbalogun26@gmail.com', '08117084647', '12345678', '123456789', '123456789', '2023-11-30 18:14:52', '1', 'pending'),
(5, 'itpsite', 'Balogun', 'Zainab Oyindamola', '', 'Zainabbaloegun866@gmail.com', '2348050363172', '12345678', '123456789', '123456789', '2023-11-30 18:28:48', '1', 'pending'),
(6, 'abdulsamadbalogun25@gmail.com', 'fwfgrwgwrg', 'Balogun', 'gregwrgwr', 'abdulsameadbalogun25@gmail.com', '2348050363172', '12345678', '123456789', '123456789', '2023-11-30 18:30:10', '1', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `Serial` varchar(255) NOT NULL,
  `Pin` varchar(255) NOT NULL,
  `fileArray` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `Serial`, `Pin`, `fileArray`) VALUES
(1, '123456789', '123456789', '{\"passport\":\"uploads/6568fb103af3a_1701378832.png\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants2`
--
ALTER TABLE `applicants2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseapplied`
--
ALTER TABLE `courseapplied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declared`
--
ALTER TABLE `declared`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localgovernment`
--
ALTER TABLE `localgovernment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olevel`
--
ALTER TABLE `olevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previousxul`
--
ALTER TABLE `previousxul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepictures`
--
ALTER TABLE `profilepictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmechoices`
--
ALTER TABLE `programmechoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolchoices`
--
ALTER TABLE `schoolchoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolgrades`
--
ALTER TABLE `schoolgrades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolsubjects`
--
ALTER TABLE `schoolsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1902;

--
-- AUTO_INCREMENT for table `applicants2`
--
ALTER TABLE `applicants2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courseapplied`
--
ALTER TABLE `courseapplied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `declared`
--
ALTER TABLE `declared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `localgovernment`
--
ALTER TABLE `localgovernment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `olevel`
--
ALTER TABLE `olevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `previousxul`
--
ALTER TABLE `previousxul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilepictures`
--
ALTER TABLE `profilepictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmechoices`
--
ALTER TABLE `programmechoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schoolchoices`
--
ALTER TABLE `schoolchoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolgrades`
--
ALTER TABLE `schoolgrades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schoolsubjects`
--
ALTER TABLE `schoolsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
