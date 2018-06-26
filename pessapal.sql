-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2018 at 02:33 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.7-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pessapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'example@email.com', 'Teacher', '$2y$10$lgu4j1r/67TEPSeDCR7y8eyWAu1FDvxZhCGk80VlHl6GYmM6jWbwW', NULL, '2018-06-21 11:52:52', '2018-06-21 11:52:52');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_21_070557_create_admins_table', 1),
(4, '2018_06_23_192327_create_transactions_table', 2),
(5, '2018_06_23_195123_create_transactions_table', 3),
(6, '2018_06_23_195406_create_transactions_table', 4),
(7, '2018_06_24_035848_create_table_tran', 5),
(8, '2018_06_24_040100_create_table_tran', 6);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `price`, `actor`) VALUES
(15, 'Blood Fight', 600, 'Vet Name'),
(17, 'Little Angel', 900, 'James Hog');

-- --------------------------------------------------------

--
-- Table structure for table `movies1`
--

CREATE TABLE `movies1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies2`
--

CREATE TABLE `movies2` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies2`
--

INSERT INTO `movies2` (`id`, `name`, `price`, `actor`, `email`, `file`) VALUES
(28, 'Gere', 1200, 'Okel', 'okellojoelacaye@gmail.com', 'storage/NcWPoVMkAyke3MAxTHNONNLzHJZPSm0v8LqvOKSR.jpeg'),
(29, 'Okello', 1200, 'Okello', 'opiojoshuaoc@gmail.com', 'storage/AyCh9IcuTGOuL6h1njlknFHitDhj9iR7UNW9V70x.gif');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('example@email.com', '$2y$10$XQx7nYryx4glQLO3Z45PqOnfwQaD8FIdpJ8P3cXcLsHjvtsMR4jsS', '2018-06-21 14:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `first name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description of payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `first name`, `last name`, `email`, `amount`, `phone`, `payment status`, `description of payment`, `created_at`, `updated_at`) VALUES
(1, 'Joel', 'Okello', 'example@email.com', 8000, '0777521185', 'COMPLETED', 'hollo', '2018-06-24 01:06:04', '2018-06-24 01:06:04'),
(2, '9ii', 'hj jh', 'example@email.com', 0, '890', 'COMPLETED', 'bnb', '2018-06-24 01:39:16', '2018-06-24 01:39:16'),
(3, 'Joel', 'Okello', 'example@email.com', 100000, '088', 'COMPLETED', '12jjj', '2018-06-24 01:51:53', '2018-06-24 01:51:53'),
(4, 'Joel', 'Okello', 'example@email.com', 1000000, '0777521185', 'COMPLETED', 'Hello there', '2018-06-24 01:56:41', '2018-06-24 01:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Okello', 'okellojoelacaye@gmail.com', '$2y$10$epqBTuSxayu7wgF3RTi7eeXbXfSSlaEur8BbabGZ.vng/6VTL3xci', 'm0CCkVf0skl2GqVlETNSCc5oqpM5mIge3YE9gGztnSRKS2F0rn3UwXGxLoV6', '2018-06-21 05:33:09', '2018-06-22 03:07:16'),
(2, 'Hope', 'aber@gmail.com', '$2y$10$KKD9ry2mIELtzU4KTwzPdO3HQCyIFszFkbDOIvqwgocg2X3.PUw.e', '9u5KbwhQlIobmQZ8Twubi9Euxhg7RYMSMhRehIWxTtBrab4TWDatm0UfKAJF', '2018-06-25 11:50:11', '2018-06-25 11:50:11'),
(3, 'Opio', 'opiojoshuaoc@gmail.com', '$2y$10$Gl89FBKNmvSzMIQdDAofjeJJ0dTxqsnGMEJcy5CR1tYMpGQQylJbC', 'z37rT20sNZONCf0g3qAgvTxobsCEurEzOGs6kiIvjT2XusdF3eUuD2zpHoQ2', '2018-06-26 08:30:27', '2018-06-26 08:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies2`
--
ALTER TABLE `movies2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `movies2`
--
ALTER TABLE `movies2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
