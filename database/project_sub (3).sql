-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 11:10 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sub`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name_admin`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'QuanDau', '2018-05-05 03:22:51', '2018-05-16 09:01:16', 15);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name_branch`, `created_at`, `updated_at`) VALUES
(1, 'Khoa học máy tính', '2018-04-18 04:09:54', '2018-04-18 04:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name_course`, `created_at`, `updated_at`) VALUES
(1, 'K27', '2018-04-18 04:09:35', '2018-04-18 04:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Toán tin', '2018-04-18 04:09:08', '2018-04-18 04:09:08'),
(2, 'Anh ngữ', '2018-04-29 09:24:11', '2018-04-29 09:24:11'),
(3, 'Nhật', '2018-04-29 09:24:11', '2018-04-29 09:24:11'),
(4, 'Điều dưỡng', '2018-04-29 09:24:43', '2018-04-29 09:24:43'),
(5, 'Du lịch', '2018-04-29 09:24:43', '2018-04-29 09:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `field_name`, `created_at`, `updated_at`) VALUES
(1, 'Khoa học Máy tính', '2018-04-18 16:18:22', '2018-05-20 02:00:17'),
(2, 'Nghiên cứu Anh ngữ', '2018-05-20 02:00:31', '2018-05-20 02:00:31'),
(3, 'Nghiên cứu Tiếng Nhật', '2018-05-20 02:00:40', '2018-05-20 02:00:40'),
(4, 'Nghiên cứu dữ liệu', '2018-05-20 02:00:50', '2018-05-20 02:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_lecturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_lecturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address_lecturer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_department` int(10) UNSIGNED DEFAULT NULL,
  `id_field` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name_lecturer`, `address_lecturer`, `email_address_lecturer`, `phone_number`, `id_department`, `id_field`, `created_at`, `updated_at`, `id_user`) VALUES
(23, 'Nguyễn Thị Huệ', 'Hà Nội', 'test_nguyenthihue_tlu@gmail.com', '0123456789', 1, 1, '2018-05-20 01:57:33', '2018-05-20 01:57:33', 26),
(24, 'Nguyễn Thị Nga', 'Hà Nội', 'test_nguyenthinga_tlu@gmail.com', '0123456789', 1, 1, '2018-05-20 01:57:53', '2018-05-20 01:57:53', 27),
(25, 'Nguyễn Văn Duy', 'Hà Nội', 'test_nguyenvanduy_tlu@gmail.com', '0123456789', 1, 4, '2018-05-20 01:58:14', '2018-05-20 02:01:11', 28),
(26, 'Nguyễn Văn Dân', 'Hà Nội', 'test_nguyenvandan_tlu@gmail.com', '0123456789', 1, 4, '2018-05-20 01:58:38', '2018-05-20 02:01:12', 29),
(27, 'Nguyễn Văn Hòa', 'Hà Nội', 'test_nguyenvanhoa_tlu@gmail.com', '0123456789', 1, 1, '2018-05-20 01:58:54', '2018-05-20 01:58:54', 30),
(28, 'Nguyễn Thị Tiếng Anh', 'Hà Nội', 'test_nguyentienganh_tlu@gmail.com', '0123456789', 2, 2, '2018-05-20 01:59:32', '2018-05-20 02:01:05', 31),
(29, 'Nguyễn Thị Tiếng Nhật', 'Hà Nội', 'test_nguyentiengnhat_tlu@gmail.com', '0123456789', 2, 3, '2018-05-20 01:59:52', '2018-05-20 02:01:00', 32);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_protection`
--

CREATE TABLE `lecturer_protection` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_protection` int(10) UNSIGNED NOT NULL,
  `id_lecturer` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturer_protection`
--

INSERT INTO `lecturer_protection` (`id`, `id_protection`, `id_lecturer`, `created_at`, `updated_at`, `position`) VALUES
(102, 9, 25, '2018-05-20 02:02:12', '2018-05-20 02:02:12', 1),
(103, 9, 23, '2018-05-20 02:02:12', '2018-05-20 02:02:12', 2),
(104, 9, 26, '2018-05-20 02:02:12', '2018-05-20 02:02:12', 3),
(105, 9, 27, '2018-05-20 02:02:12', '2018-05-20 02:02:12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_04_17_040916_create_departments_table', 1),
(2, '2018_04_17_041225_create_fields_table', 1),
(3, '2018_04_17_041512_create_protections_table', 1),
(4, '2018_04_17_041642_create_users_table', 2),
(5, '2018_04_17_042019_create_students_table', 2),
(6, '2018_04_17_042404_create_lecturers_table', 3),
(7, '2018_04_17_042825_create_secretaries_table', 3),
(8, '2018_04_17_043024_create_administrators_table', 3),
(9, '2018_04_17_043202_create_topics_table', 3),
(10, '2018_04_17_043416_create_topic_protection_table', 3),
(11, '2018_04_17_044146_create_lecturer_protection_table', 3),
(12, '2018_04_17_141800_create_branches_table', 4),
(13, '2018_04_17_142030_create_courses_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `protections`
--

CREATE TABLE `protections` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_start` date NOT NULL,
  `time_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protections`
--

INSERT INTO `protections` (`id`, `time_start`, `time_end`, `created_at`, `updated_at`, `detail`) VALUES
(9, '2018-05-09', '2018-05-19', '2018-05-14 07:27:08', '2018-05-20 02:02:12', 'Đợt bảo vệ của Toán tin K27'),
(10, '2018-05-18', '2018-05-27', '2018-05-20 02:03:09', '2018-05-20 02:03:09', 'Ngôn ngữ nhật bảo vệ');

-- --------------------------------------------------------

--
-- Table structure for table `secretaries`
--

CREATE TABLE `secretaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_secretary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_secretary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address_secretary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secretaries`
--

INSERT INTO `secretaries` (`id`, `name_secretary`, `address_secretary`, `email_address_secretary`, `phone_number`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'QuanDau', 'HN', 'thuky1@gmail.com', '0123546789', '2018-05-05 03:20:50', '2018-05-05 03:20:50', 13);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_department` int(10) UNSIGNED DEFAULT NULL,
  `id_course` int(10) UNSIGNED DEFAULT NULL,
  `id_branch` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `code`, `student_name`, `address`, `id_department`, `id_course`, `id_branch`, `created_at`, `updated_at`, `password`, `remember_token`) VALUES
(3, 'A1234', 'Đậu Minh Quân', 'Hà Nội', 1, 1, 1, '2018-05-16 08:38:42', '2018-05-16 08:38:42', '$2y$10$xAOcPfP5exCT3Moa.RUUQ..IaxUMUGSWMOmqEy5dGwcRB1lGVeDcO', NULL),
(6, 'a25428', 'Đậu Minh Quân', 'Hà Nội', 1, 1, 1, '2018-05-16 09:08:51', '2018-05-16 09:08:51', '$2y$10$KNJouEbxJJN.tgesfTQ0GezIYQgHusEkQtL3TjkOChDbV5GdqS0bq', 'uPRzQ4ZDUT4zZHL8LtsZFvEvK0WDcAaAplUPtEgn86IIP1DvBobqWbac3kM2');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lecturer` int(10) UNSIGNED NOT NULL,
  `name_topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `accept` tinyint(1) NOT NULL DEFAULT '0',
  `describe` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `id_lecturer`, `name_topic`, `created_at`, `updated_at`, `accept`, `describe`) VALUES
(5, 23, 'Test website Facebook', '2018-05-20 02:06:30', '2018-05-20 02:06:57', 1, 'Tạo tài liệu và các dữ liệu test website Facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `topic_protection`
--

CREATE TABLE `topic_protection` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL,
  `id_topic` int(10) UNSIGNED NOT NULL,
  `id_protection` int(10) UNSIGNED DEFAULT NULL,
  `acceptance` tinyint(1) NOT NULL DEFAULT '0',
  `pass` tinyint(1) NOT NULL DEFAULT '0',
  `scores` float NOT NULL DEFAULT '-1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ok` int(1) NOT NULL DEFAULT '0',
  `time_run` datetime DEFAULT NULL,
  `place` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_protection`
--

INSERT INTO `topic_protection` (`id`, `id_student`, `id_topic`, `id_protection`, `acceptance`, `pass`, `scores`, `created_at`, `updated_at`, `ok`, `time_run`, `place`) VALUES
(2, 6, 5, 9, 1, 1, 10, '2018-05-20 02:07:19', '2018-05-20 02:09:52', 1, '2018-05-23 08:30:00', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `auth`, `created_at`, `updated_at`, `remember_token`) VALUES
(13, 'thuky1@gmail.com', '$2y$10$n0vlVE9eTwfALxoio6VQTu7DG8AUTUKgLUM2JYm8BvF7Ahbp9SydW', 1, '2018-04-22 00:02:45', '2018-04-22 00:02:45', 'yPydeaPXwAgbx75Entl20DJ2RnXO1zHmtZgihqy349iRw5aqnlOG6dc1QWpD'),
(15, 'admin@gmail.com', '$2y$10$n0vlVE9eTwfALxoio6VQTu7DG8AUTUKgLUM2JYm8BvF7Ahbp9SydW', 0, '2018-05-05 03:22:31', '2018-05-05 03:22:31', 'vBTU2uId5d9TkurA2gvrCrla7Hey2vaFs4jBteitTtVBC0KCiZ6x9D45xZRt'),
(26, 'test_nguyenthihue_tlu@gmail.com', '$2y$10$aVGnbiPxMXO00.hNRleavO718ST75kWwYTh6ZdJTOLty3TgWls7fu', 2, '2018-05-20 01:57:33', '2018-05-20 01:57:33', 'KHCU07P1VmTmiRKvdfXABVdXIbeTUyxM4me13vLpgpOwddIqVrC0y4CwVt0F'),
(27, 'test_nguyenthinga_tlu@gmail.com', '$2y$10$Ck5rbwgjYCZASqmESztVsOmpYsyau3qk.VxOhx7a7jHVVJMpukec2', 2, '2018-05-20 01:57:53', '2018-05-20 01:57:53', NULL),
(28, 'test_nguyenvanduy_tlu@gmail.com', '$2y$10$64at0NDdjK0Hm8c5QRFgNOgbdbgYd8bC.WkHEuclxx8fpIeljuRJe', 2, '2018-05-20 01:58:14', '2018-05-20 01:58:14', NULL),
(29, 'test_nguyenvandan_tlu@gmail.com', '$2y$10$N2NQsIHsEIuoL1sGtNgU6eCFGPZYjbPc24EGMl4MrkfGhWOyP3KIS', 2, '2018-05-20 01:58:37', '2018-05-20 01:58:37', NULL),
(30, 'test_nguyenvanhoa_tlu@gmail.com', '$2y$10$v/vjqywtM2347K7jTyrCiefTlYOIjZkAZf7UXekRE5JLcYEdNDi12', 2, '2018-05-20 01:58:54', '2018-05-20 01:58:54', NULL),
(31, 'test_nguyentienganh_tlu@gmail.com', '$2y$10$3mytkEsdi2JKgnkAU2SraeHLJsFEzn4KAF9mpuTRuvQqLqDYkCTa6', 2, '2018-05-20 01:59:31', '2018-05-20 01:59:31', NULL),
(32, 'test_nguyentiengnhat_tlu@gmail.com', '$2y$10$UjKzTSX8m3xHggIS2thaB.Vs4EvtX7RO4rbLqbaztxxDfRdfjgsWy', 2, '2018-05-20 01:59:52', '2018-05-20 01:59:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frk_user` (`id_user`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturers_ibfk_1` (`id_department`),
  ADD KEY `lecturers_ibfk_2` (`id_field`),
  ADD KEY `frk_lec_user` (`id_user`);

--
-- Indexes for table `lecturer_protection`
--
ALTER TABLE `lecturer_protection`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_protection` (`id_protection`,`id_lecturer`),
  ADD KEY `id_lecturer` (`id_lecturer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protections`
--
ALTER TABLE `protections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secretaries`
--
ALTER TABLE `secretaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_code_unique` (`code`),
  ADD KEY `id_branch` (`id_branch`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_department` (`id_department`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecturer` (`id_lecturer`);

--
-- Indexes for table `topic_protection`
--
ALTER TABLE `topic_protection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `topic_protection_ibfk_1` (`id_protection`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `lecturer_protection`
--
ALTER TABLE `lecturer_protection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `protections`
--
ALTER TABLE `protections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `secretaries`
--
ALTER TABLE `secretaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic_protection`
--
ALTER TABLE `topic_protection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `frk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `frk_lec_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lecturers_ibfk_2` FOREIGN KEY (`id_field`) REFERENCES `fields` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lecturer_protection`
--
ALTER TABLE `lecturer_protection`
  ADD CONSTRAINT `lecturer_protection_ibfk_1` FOREIGN KEY (`id_lecturer`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lecturer_protection_ibfk_2` FOREIGN KEY (`id_protection`) REFERENCES `protections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `secretaries`
--
ALTER TABLE `secretaries`
  ADD CONSTRAINT `secretaries_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_branch`) REFERENCES `branches` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`id_department`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`id_lecturer`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topic_protection`
--
ALTER TABLE `topic_protection`
  ADD CONSTRAINT `topic_protection_ibfk_1` FOREIGN KEY (`id_protection`) REFERENCES `protections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_protection_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_protection_ibfk_3` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
