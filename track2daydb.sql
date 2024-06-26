-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `track2daydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_email` varchar(45) NOT NULL,
  `adm_fname` varchar(45) NOT NULL,
  `adm_lname` varchar(45) NOT NULL,
  `adm_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_email`, `adm_fname`, `adm_lname`, `adm_password`) VALUES
('auni@gmail.com', 'Auni', 'Fatihah', 'admin123'),
('faris@gmail.com', 'Ahmad', 'Faris', 'admin123'),
('syakir@gmail.com', 'Syakir', 'Muzaffar', 'admin123'),
('zarith@gmail.com', 'Zarith', 'Adliena', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `journal_id` varchar(11) NOT NULL,
  `journal_title` varchar(45) NOT NULL,
  `journal_date` date NOT NULL,
  `user_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`journal_id`, `journal_title`, `journal_date`, `user_email`) VALUES
('J001', '2024 Monaco Grand Prix', '2024-05-01', 'lando@gmail.com'),
('J002', '2024 Miami Grand Prix', '2024-05-02', 'lando@gmail.com'),
('J003', 'F1 wins history', '2024-05-02', 'lewis@gmail.com'),
('J004', 'F1 91 wins', '2024-05-02', 'max@gmail.com'),
('J005', 'Circuit de Monaco', '2024-05-02', 'carlos@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mood`
--

CREATE TABLE `mood` (
  `mood_id` varchar(11) NOT NULL,
  `mood_score` int(11) NOT NULL,
  `mood_desc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mood`
--

INSERT INTO `mood` (`mood_id`, `mood_score`, `mood_desc`) VALUES
('M001', 1, 'Relaxed, Content'),
('M002', 2, 'Energetic, Motivated'),
('M003', 3, 'Average, Uneventful'),
('M004', 4, 'Sick, Tired, Dull, Unmotivated'),
('M005', 5, 'Sad, Lonely, Numb'),
('M006', 6, 'Frustrated, Anxious, Grumpy');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(45) NOT NULL,
  `task_desc` varchar(45) NOT NULL,
  `task_duration` date DEFAULT NULL,
  `task_status` varchar(45) NOT NULL,
  `user_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_desc`, `task_duration`, `task_status`, `user_email`) VALUES
(1001, 'Task 1', 'Description 1', '2024-06-01', 'Pending', 'max@gmail.com'),
(1002, 'Task 2', 'Description 2', '2024-06-02', 'Completed', 'carlos@gmail.com'),
(1003, 'Task 3', 'Description 3', '2024-06-03', 'Pending', 'lewis@gmail.com'),
(1004, 'Task 4', 'Description 4', '2024-06-04', 'Completed', 'max@gmail.com'),
(1005, 'Task 5', 'Description 5', '2024-06-05', 'Completed', 'lando@gmail.com'),
(1006, 'Lumba haram', 'DDU DDU DDUU', '2024-06-28', 'Completed', 'max@gmail.com'),
(1007, 'Gi masjid', 'coding', '2024-06-01', 'Completed', 'max@gmail.com'),
(1008, 'jumpa max', 'lumba haram', '2024-06-08', 'Completed', 'carlos@gmail.com'),
(1009, 'taubat', 'ingat tuhan', '2024-06-16', 'Completed', 'carlos@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_email` varchar(45) NOT NULL,
  `user_fname` varchar(45) NOT NULL,
  `user_lname` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `adm_email` varchar(45) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_email`, `user_fname`, `user_lname`, `user_password`, `adm_email`, `user_type`) VALUES
('carlos@gmail.com', 'Carlos', 'Sainz', 'password123', 'auni@gmail.com', 'standard'),
('charles@gmail.com', 'Charles', 'Leclerc', 'password123', 'zarith@gmail.com', 'standard'),
('lando@gmail.com', 'Lando', 'Norris', 'password123', 'syakir@gmail.com', 'standard'),
('lewis@gmail.com', 'Lewis', 'Hamilton', 'password123', 'faris@gmail.com', 'standard'),
('max@gmail.com', 'Max', 'Verstappen', 'password123', 'syakir@gmail.com', 'standard'),
('paol@afdfdf.com', 'paolo', 'maldini', 'adsfsafsdf', 'auni@gmail.com', 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `user_mood`
--

CREATE TABLE `user_mood` (
  `week` varchar(20) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `mood_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_mood`
--

INSERT INTO `user_mood` (`week`, `user_email`, `mood_id`) VALUES
('Friday', 'lando@gmail.com', 'M003'),
('Monday', 'carlos@gmail.com', 'M002'),
('Saturday', 'lando@gmail.com', 'M001'),
('Saturday', 'lewis@gmail.com', 'M001'),
('Sunday', 'lando@gmail.com', 'M002'),
('Thursday', 'lando@gmail.com', 'M004'),
('Tuesday', 'charles@gmail.com', 'M005'),
('Wednesday', 'lando@gmail.com', 'M003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_email`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `fk_user_email_journal` (`user_email`);

--
-- Indexes for table `mood`
--
ALTER TABLE `mood`
  ADD PRIMARY KEY (`mood_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_user_email_task` (`user_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_email`),
  ADD KEY `fk_admin_email` (`adm_email`);

--
-- Indexes for table `user_mood`
--
ALTER TABLE `user_mood`
  ADD PRIMARY KEY (`week`,`user_email`,`mood_id`),
  ADD KEY `fk_mood_id_user_mood` (`mood_id`),
  ADD KEY `fk_user_email_user_mood` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `fk_user_email_journal` FOREIGN KEY (`user_email`) REFERENCES `user` (`user_email`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_user_email_task` FOREIGN KEY (`user_email`) REFERENCES `user` (`user_email`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_admin_email` FOREIGN KEY (`adm_email`) REFERENCES `admin` (`adm_email`);

--
-- Constraints for table `user_mood`
--
ALTER TABLE `user_mood`
  ADD CONSTRAINT `fk_mood_id_user_mood` FOREIGN KEY (`mood_id`) REFERENCES `mood` (`mood_id`),
  ADD CONSTRAINT `fk_user_email_user_mood` FOREIGN KEY (`user_email`) REFERENCES `user` (`user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
