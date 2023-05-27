-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 10:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`id`, `name`, `email`, `password_hash`) VALUES
(9, 'Abhi', 'abhi@gmail.com', '$2y$10$npgHUDXuqBf2w/ldQCdToeD01ZFJx46LIxhyeX43Hj/V3HkyNJ4Qi'),
(10, 'Debasis', 'debasis@gmail.com', '$2y$10$I.uEOoR47eYctCe/B0XlGeJOykz5XUKSz7YzF5aZ6Igw8jXbD40su'),
(11, 'Rakesh', 'rakesh@gmail.com', '$2y$10$kaIHvjpVFU3kUeZ/zIhyfOPIhz94i3gGc8swgN7grvWCMPZQgW20S');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empid` int(11) NOT NULL,
  `empname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cno` bigint(15) UNSIGNED NOT NULL,
  `dob` date NOT NULL,
  `section` varchar(20) NOT NULL,
  `deskno` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empid`, `empname`, `email`, `cno`, `dob`, `section`, `deskno`) VALUES
(14, 'Debasis1', 'Debasis1@gmail.com', 789456121, '2023-05-01', 'manegment', '01'),
(18, 'Pratima1', 'pratima@gmail.com', 8658521161, '2023-05-15', 'manegment', '87'),
(19, 'Subrat', 'subrat@gmail.com', 7894561230, '2023-05-16', 'development', '303');

-- --------------------------------------------------------

--
-- Table structure for table `problemlist`
--

CREATE TABLE `problemlist` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `deskno` varchar(50) NOT NULL,
  `empcode` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `forward` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problemlist`
--

INSERT INTO `problemlist` (`id`, `title`, `description`, `deskno`, `empcode`, `status`, `forward`) VALUES
(2, 'keyboard ', 'The key was not working.\r\nAlso showing the warning messages.  ', '123456', '123456', 'resolve', 15),
(4, 'Faulty or Damaged Wiring', 'Cables which are frayed, loose or have exposed wires should be attended to and replaced.', 'c-0001', 'EMP-01', 'resolve', 15),
(5, 'Worn and damaged equipment', 'With how busy the team can be, sometimes appliances and electronics in the office are neglected. They assume everything is working properly until the equipment gets damaged or worse, they get an electrical shock. ', 'c-0010', 'EMP-20', 'pending', NULL),
(6, 'Insufficient grounding', 'This is perhaps the most common electrical hazard in the workplace. Without correct grounding, the risk of electrocution is higher. Have your grounding properly inspected by professionals.', 'c-0007', 'EMP-23', 'resolve', NULL),
(7, 'Overloaded circuits', 'There may not be enough outlets in your office for the number of people who work there so you depend on extension cords. Always make sure that these extension cords are distributed evenly to avoid overloading the circuits. They must be placed neatly where they won’t be a trip hazard or get water splashed on them. It’s best to use smart extension cords with integrated on/off switches and have overload protection. Using adaptors is also a good idea.', 'c-0006', 'EMP-03', 'resolve', NULL),
(8, 'Damaged insulation', 'Inspect the insulation on your equipment and make sure power is switched off when you do this. If it’s in poor quality, replace it with new high-quality insulation. Never use tape as a quick-fix to repair visible damage as this won’t hold and will be dangerous.', 'c-0002', 'EMP-78', 'resolve', NULL),
(9, 'Exposed electrical components', 'Temporary lighting, detached insulation on power cords, open power units… These are some examples of exposed electrical components, which can cause electric shocks and burns. ', 'c-0099', 'EMP-99', 'resolve', NULL),
(12, 'Schedule Inflexibility', 'People lead complicated lives that don’t always fit with the Monday to Friday, 9-5 work schedule. While some businesses need their employees to work a fixed schedule, there are many that don’t.', 'c-0013', 'EMP-55', 'pending', NULL),
(13, 'Poor Work-Life Balance', 'As a business owner and manager, important thing to remember is that more time spent at work doesn’t necessarily mean you get more work done, and it certainly doesn’t guarantee quality.', 'c-0001', 'EMP-03', 'pending', NULL),
(14, 'Insufficient Training', 'A lack of training leads to a number of workplace issues. The most obvious one is that employees aren’t able to do their jobs as well as they would like, but it goes deeper than this.', '123455', '123456', 'resolve', 15),
(15, 'stryhryhj', 'sdryhuctjyundtgj', 'ddhfgh', '123456', 'pending', 15),
(16, 'srtuyuhdj', 'dyjutdyjdyjdt', '123456', '123456', 'resolve', 15),
(17, 'ageredtg', 'edrtgtghstg', '123456', '123456', 'resolve', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cno` bigint(10) NOT NULL,
  `empcode` varchar(10) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `cno`, `empcode`, `password_hash`, `status`) VALUES
(7, 'litu', 'litu@gmail.com', 9873482312, '123456', '$2y$10$J3v.ADSWL16zCsQC.1xPZuD7ihCX1wycXfhn0DRwd32WBnRHwV0Jy', 'active'),
(11, 'Prasant', 'prasant@gmail.com', 7008552690, 'EMP-01', '$2y$10$XZwqf5mavBrEJH9b.jz/s.5HzDHwXm0p.8gTX6kvskd6kBHqm/aYK', 'active'),
(12, 'Debasis', 'debasis@gmail.com', 7750808817, 'EMP-09', '$2y$10$lmla7HPfu4sd0C7zcWgaq.7kEVj7jRfVkdo7/l.JgTi80scyFjoMq', 'active'),
(15, 'Rakesh', 'rakesh5@gmail.com', 1234567890, 'EMP-01', '$2y$10$/Dq9aIKal0bPKkucZH23NOSwZe8124NE.l6ZC9fFl7lgtZjc8n.MS', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `deskno` (`deskno`);

--
-- Indexes for table `problemlist`
--
ALTER TABLE `problemlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forward` (`forward`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `problemlist`
--
ALTER TABLE `problemlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `problemlist`
--
ALTER TABLE `problemlist`
  ADD CONSTRAINT `problemlist_ibfk_1` FOREIGN KEY (`forward`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
