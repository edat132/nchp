-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparatus_list`
--

CREATE TABLE `apparatus_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apparatus_list`
--

INSERT INTO `apparatus_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Men&#039;s Prison', 1, 1, '2022-05-31 09:03:13', '2025-07-04 07:24:17'),
(2, 'Women&#039;s Prison', 1, 1, '2022-05-31 09:03:23', '2025-07-04 07:24:21'),
(3, 'Test - updated', 0, 1, '2022-05-31 09:03:31', '2022-05-31 09:03:45'),
(4, 'analytical balance', 1, 0, '2025-07-04 07:23:54', '2025-07-04 07:23:54'),
(5, 'electronic analytical balance', 1, 0, '2025-07-04 07:24:11', '2025-07-04 07:24:11'),
(6, 'Fourier Transform Infrared (FTIR) Spectrometer', 1, 0, '2025-07-04 07:24:43', '2025-07-04 07:24:43'),
(7, 'bench-type digital pH meter', 1, 0, '2025-07-04 07:24:53', '2025-07-04 07:24:53'),
(8, 'Fourier Transform Infrared (FTIR) Spectroscopy System', 1, 0, '2025-07-04 07:25:02', '2025-07-04 07:25:02'),
(9, 'Universal Testing Machine (UTM)', 1, 0, '2025-07-04 07:25:10', '2025-07-04 07:25:10'),
(10, 'benchtop X-ray diffractometer (XRD)', 1, 0, '2025-07-04 07:25:54', '2025-07-04 07:25:54'),
(11, 'X-ray fluorescence (XRF) spectrometer', 1, 0, '2025-07-04 07:26:03', '2025-07-04 07:26:03'),
(12, 'ss', 1, 0, '2025-07-18 14:15:05', '2025-07-18 14:15:05'),
(13, 'sssdfdfd', 1, 0, '2025-07-18 14:15:45', '2025-07-18 14:15:45'),
(14, 'ed', 1, 0, '2025-07-18 15:15:43', '2025-07-18 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_list`
--

CREATE TABLE `equipment_list` (
  `id` int(30) NOT NULL,
  `apparatus_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_list`
--

INSERT INTO `equipment_list` (`id`, `apparatus_id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 1, 'Block 1 Cell 1001', 1, 1, '2022-05-31 09:16:32', '2025-07-04 07:26:16'),
(2, 1, 'Block 1 Cell 1002', 1, 1, '2022-05-31 09:17:07', '2025-07-04 07:26:22'),
(3, 1, 'Block 1 Cell 1003', 1, 1, '2022-05-31 09:17:18', '2025-07-04 07:26:28'),
(4, 1, 'Block 1 Cell 1004', 1, 1, '2022-05-31 09:17:25', '2025-07-04 07:26:35'),
(5, 1, 'Block 2 Cell 1001', 1, 1, '2022-05-31 09:17:34', '2025-07-04 07:26:43'),
(6, 1, 'Block 2 Cell 1002', 1, 1, '2022-05-31 09:17:43', '2025-07-04 07:26:47'),
(7, 4, 'Analytical Balance - CARAT Series PAG 1003', 1, 0, '2022-05-31 09:17:52', '2025-07-04 07:27:04'),
(8, 5, 'Analytical Balance - PIONEER PA 214 ', 1, 0, '2022-05-31 09:17:58', '2025-07-04 07:27:45'),
(9, 6, 'Handheld Agilent 4300', 1, 0, '2022-05-31 09:18:07', '2025-07-04 07:28:15'),
(10, 7, 'pH meter - Ohaus Starter 300', 1, 0, '2022-05-31 09:18:16', '2025-07-04 07:28:49'),
(11, 8, 'Shimadzu IR-Tracer 100 AIM 9000 ', 1, 0, '2022-05-31 09:18:26', '2025-07-04 07:29:19'),
(12, 2, 'Block 1 Cell 1001', 1, 1, '2022-05-31 09:18:36', '2025-07-04 07:26:19'),
(13, 2, 'Block 1 Cell 1002', 1, 1, '2022-05-31 09:18:41', '2025-07-04 07:26:25'),
(14, 2, 'Block 1 Cell 1003', 1, 1, '2022-05-31 09:18:49', '2025-07-04 07:26:31'),
(15, 2, 'Block 1 Cell 1004', 1, 1, '2022-05-31 09:18:55', '2025-07-04 07:26:39'),
(16, 2, 'test - updated', 0, 1, '2022-05-31 09:19:06', '2022-05-31 09:19:29'),
(17, 9, 'Shimadzu Universal Testing Machine - Autograph AG-X plus ', 1, 0, '2025-07-04 07:29:38', '2025-07-04 07:29:38'),
(18, 6, 'Tabletop Agilent CARY 630', 1, 0, '2025-07-04 07:30:08', '2025-07-04 07:30:08'),
(19, 10, 'X-Ray Diffractometer - Olympus BTX-II ', 1, 0, '2025-07-04 07:30:27', '2025-07-04 07:30:27'),
(21, 11, 'X-Ray Fluorescence Spectrometer - Olympus', 1, 0, '2025-07-04 07:30:55', '2025-07-04 07:30:55'),
(22, 10, 'aaa', 1, 0, '2025-07-18 14:11:30', '2025-07-18 14:11:30'),
(23, 10, 'ddssss', 1, 0, '2025-07-18 14:15:58', '2025-07-18 14:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `name` varchar(155) NOT NULL,
  `filename` varchar(155) NOT NULL,
  `batch` varchar(155) NOT NULL,
  `equipment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `filename`, `batch`, `equipment`) VALUES
(1, 'result', 'XPowder Software for Olympus BTX-II XRD Graphic Output 2.jpg', '1', 'zzz');

-- --------------------------------------------------------

--
-- Table structure for table `record_list`
--

CREATE TABLE `record_list` (
  `id` int(30) NOT NULL,
  `sample_id` int(30) NOT NULL,
  `action_id` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sample_list`
--

CREATE TABLE `sample_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `eye_color` text NOT NULL,
  `complexion` text NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `sentence` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `emergency_name` text DEFAULT NULL,
  `emergency_contact` text DEFAULT NULL,
  `emergency_relation` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `visiting_privilege` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documentation` varchar(255) NOT NULL,
  `lab_remarks_documentation` text NOT NULL,
  `compressive` varchar(255) NOT NULL,
  `utm` varchar(255) NOT NULL,
  `rebounds` varchar(255) NOT NULL,
  `particle_size` varchar(255) NOT NULL,
  `physicalprop` varchar(255) NOT NULL,
  `moisture` varchar(255) NOT NULL,
  `water_absorption` varchar(255) NOT NULL,
  `remarks_documentation` text DEFAULT NULL,
  `remarks_compressive` text DEFAULT NULL,
  `remarks_utm` text DEFAULT NULL,
  `remarks_rebounds` text DEFAULT NULL,
  `remarks_particle_size` text DEFAULT NULL,
  `remarks_physicalprop` text DEFAULT NULL,
  `remarks_moisture` text DEFAULT NULL,
  `remarks_water_absorption` text DEFAULT NULL,
  `remarks_ph` text DEFAULT NULL,
  `remarks_binder` text DEFAULT NULL,
  `remarks_xrf` text DEFAULT NULL,
  `remarks_XRD_Analysis` text DEFAULT NULL,
  `remarks_ftir` text DEFAULT NULL,
  `lab_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_list`
--

INSERT INTO `sample_list` (`id`, `code`, `firstname`, `middlename`, `lastname`, `sex`, `dob`, `address`, `marital_status`, `eye_color`, `complexion`, `equipment_id`, `sentence`, `date_from`, `date_to`, `emergency_name`, `emergency_contact`, `emergency_relation`, `image_path`, `status`, `visiting_privilege`, `date_created`, `date_updated`, `documentation`, `lab_remarks_documentation`, `compressive`, `utm`, `rebounds`, `particle_size`, `physicalprop`, `moisture`, `water_absorption`, `remarks_documentation`, `remarks_compressive`, `remarks_utm`, `remarks_rebounds`, `remarks_particle_size`, `remarks_physicalprop`, `remarks_moisture`, `remarks_water_absorption`, `remarks_ph`, `remarks_binder`, `remarks_xrf`, `remarks_XRD_Analysis`, `remarks_ftir`, `lab_remarks`) VALUES
(53, '1212121', 'Edward', 'Dajes', 'Bollena', 'Male', '2025-07-18', 'd', '', '', '', 9, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, 1, 1, '2025-07-18 10:52:00', '2025-07-18 10:52:00', 'Documentation', '', '', 'utm', '', '', '', '', '', 'awfuel', NULL, 'dfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"documentation\":\"awfuel\",\"utm\":\"dfdf\"}');

-- --------------------------------------------------------

--
-- Table structure for table `sample_status`
--

CREATE TABLE `sample_status` (
  `sample_id` int(30) NOT NULL,
  `status_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_status`
--

INSERT INTO `sample_status` (`sample_id`, `status_id`) VALUES
(53, 7);

-- --------------------------------------------------------

--
-- Table structure for table `serial_list`
--

CREATE TABLE `serial_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serial_list`
--

INSERT INTO `serial_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'SN 6461664-Analytical Balance - PIONEER PA 214', 1, 0, '2022-05-31 11:56:31', '2025-07-04 07:33:23'),
(2, 'SN:131365-Analytical Balance - CARAT Series PAG 1003 ', 1, 0, '2022-05-31 11:58:03', '2025-07-04 07:32:49'),
(3, 'SN 116545-Agilent 4300 nsported for Trial', 1, 1, '2022-05-31 11:59:14', '2025-07-04 07:36:35'),
(4, 'test - updated', 1, 1, '2022-05-31 11:59:34', '2022-05-31 11:59:49'),
(5, 'a', 1, 0, '2025-07-18 11:39:16', '2025-07-18 11:39:16'),
(6, 'dfdf', 1, 0, '2025-07-18 14:22:49', '2025-07-18 14:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `status_list`
--

CREATE TABLE `status_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_list`
--

INSERT INTO `status_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Decommissioned ', 1, 0, '2022-05-31 09:25:05', '2025-07-04 07:31:57'),
(2, 'Homicide', 1, 1, '2022-05-31 09:25:13', '2025-07-04 07:31:11'),
(3, 'Murder', 1, 1, '2022-05-31 09:25:20', '2025-07-04 07:31:13'),
(4, 'Attempted Murder', 1, 1, '2022-05-31 09:25:34', '2025-07-04 07:31:03'),
(5, 'Child Abuse', 1, 1, '2022-05-31 09:26:14', '2025-07-04 07:31:06'),
(6, 'Fraud', 1, 1, '2022-05-31 09:26:33', '2025-07-04 07:31:08'),
(7, 'Calibrated', 1, 0, '2022-05-31 09:26:57', '2025-07-04 07:31:35'),
(8, 'Sexual Assult', 1, 1, '2022-05-31 09:27:06', '2025-07-04 07:31:23'),
(9, 'Terrorism', 1, 1, '2022-05-31 09:27:26', '2025-07-04 07:31:17'),
(10, 'Stalking and Harassment', 1, 1, '2022-05-31 09:27:43', '2025-07-04 07:31:20'),
(11, 'Under Maintenance ', 1, 0, '2025-07-04 07:32:14', '2025-07-04 07:32:14'),
(12, 'sssa', 1, 0, '2025-07-18 14:22:39', '2025-07-18 14:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Laboratory Information Management System'),
(6, 'short_name', 'lims'),
(11, 'logo', 'uploads/logo.png?v=1653957857'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1653957858'),
(17, 'phone', '456-987-1231'),
(18, 'mobile', '09123456987 / 094563212222 '),
(19, 'email', 'info@musicschool.com'),
(20, 'address', 'Here St, Down There City, Anywhere Here, 2306 -updated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='2';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', '', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1649834664', NULL, 1, '2021-01-20 14:02:37', '2022-05-16 14:17:49'),
(6, 'Mike', '', 'Williams', 'mwilliams', '3cc93e9a6741d8b40460457139cf8ced', 'uploads/avatars/6.png?v=1653980749', NULL, 2, '2022-05-31 15:05:49', '2022-05-31 15:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `visit_list`
--

CREATE TABLE `visit_list` (
  `id` int(30) NOT NULL,
  `inmate_id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `relation` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparatus_list`
--
ALTER TABLE `apparatus_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_list`
--
ALTER TABLE `equipment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prison_id` (`apparatus_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_list`
--
ALTER TABLE `record_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`sample_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `sample_list`
--
ALTER TABLE `sample_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cell_id` (`equipment_id`);

--
-- Indexes for table `sample_status`
--
ALTER TABLE `sample_status`
  ADD KEY `inmate_id` (`sample_id`),
  ADD KEY `crime_id` (`status_id`);

--
-- Indexes for table `serial_list`
--
ALTER TABLE `serial_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_list`
--
ALTER TABLE `status_list`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `visit_list`
--
ALTER TABLE `visit_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparatus_list`
--
ALTER TABLE `apparatus_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `equipment_list`
--
ALTER TABLE `equipment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `record_list`
--
ALTER TABLE `record_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sample_list`
--
ALTER TABLE `sample_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `serial_list`
--
ALTER TABLE `serial_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_list`
--
ALTER TABLE `status_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visit_list`
--
ALTER TABLE `visit_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_list`
--
ALTER TABLE `equipment_list`
  ADD CONSTRAINT `prison_id_fk_cl` FOREIGN KEY (`apparatus_id`) REFERENCES `equipment_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `record_list`
--
ALTER TABLE `record_list`
  ADD CONSTRAINT `action_id_fk_rl` FOREIGN KEY (`action_id`) REFERENCES `serial_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inmate_id_fk_rl` FOREIGN KEY (`sample_id`) REFERENCES `sample_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sample_list`
--
ALTER TABLE `sample_list`
  ADD CONSTRAINT `cell_id_fk_il` FOREIGN KEY (`equipment_id`) REFERENCES `equipment_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sample_status`
--
ALTER TABLE `sample_status`
  ADD CONSTRAINT `crime_id_fk_ic` FOREIGN KEY (`status_id`) REFERENCES `status_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inmate_id_fk_ic` FOREIGN KEY (`sample_id`) REFERENCES `sample_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `visit_list`
--
ALTER TABLE `visit_list`
  ADD CONSTRAINT `inmate_id_fk_vl` FOREIGN KEY (`inmate_id`) REFERENCES `sample_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
