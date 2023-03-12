-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2023 at 02:12 AM
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
-- Database: `poly_quizzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` text DEFAULT NULL,
  `ip` varchar(225) DEFAULT NULL,
  `device` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `ip`, `device`, `created_at`) VALUES
(1, 1, 'Register account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 11:55:36'),
(2, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 11:56:06'),
(3, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 11:57:09'),
(4, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 11:58:41'),
(5, 1, 'Login account', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023-02-21 16:58:05'),
(6, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 17:31:06'),
(7, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 18:17:00'),
(8, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 19:28:59'),
(9, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 19:41:01'),
(10, 1, 'Login account', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36', '2023-02-21 20:41:13'),
(11, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 20:55:17'),
(12, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 20:55:42'),
(13, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 21:00:51'),
(14, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:19:31'),
(15, 2, 'Register account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:22:23'),
(16, 2, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:22:50'),
(17, 2, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:25:36'),
(18, 2, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:25:41'),
(19, 1, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:26:42'),
(20, 2, 'Login account', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '2023-02-21 22:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question_title` text NOT NULL,
  `answer_a` varchar(225) NOT NULL,
  `answer_b` varchar(225) NOT NULL,
  `answer_c` varchar(225) DEFAULT NULL,
  `answer_d` varchar(225) DEFAULT NULL,
  `answer` char(10) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic_id`, `question_title`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `answer`, `status`) VALUES
(13, 7, 'The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?', '2001', '1983', '1788', '1938', 'answer_d', 'on'),
(14, 7, 'January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?', 'Bligh\'s Blight', 'The Soldiers\' Stand\n', 'New South Wales Nuisance', 'Rum Rebellion', 'answer_b', 'on'),
(15, 7, 'The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?', '1998', '1972', '1988', '1901', 'answer_a', 'on'),
(16, 7, 'What country, other than Australia, celebrates a national public holiday on January 26?', 'India', 'New Zealand', 'USA', 'Ghana\n', 'answer_a', 'on'),
(17, 6, 'What is the capital of Delaware?\n', 'Dover', 'Wilmington', 'Providence', 'Annapolis', 'answer_a', 'on'),
(18, 6, 'What is the capital of Oklahoma?', 'Cheyenne', 'Tulsa', 'Oklahoma City', 'Jackson', 'answer_c', 'on'),
(19, 6, 'What is the capital of Hawaii?', 'Honolulu', 'Helena', 'Kailua', 'Juneau', 'answer_a', 'on'),
(20, 6, 'What is the capital of Wyoming?\n', 'Raleigh', 'Boise', 'Jackson', 'Cheyenne', 'answer_d', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `data` longtext NOT NULL,
  `scored` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `user_id`, `code`, `data`, `scored`, `created_at`) VALUES
(21, 1, '85NJ7', '[{\"id\":\"13\",\"topic_id\":\"7\",\"question_title\":\"The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?\",\"answer_a\":\"2001\",\"answer_b\":\"1983\",\"answer_c\":\"1788\",\"answer_d\":\"1938\",\"answer\":\"answer_d\",\"status\":\"on\"},{\"id\":\"14\",\"topic_id\":\"7\",\"question_title\":\"January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?\",\"answer_a\":\"Bligh\'s Blight\",\"answer_b\":\"The Soldiers\' Stand\\n\",\"answer_c\":\"New South Wales Nuisance\",\"answer_d\":\"Rum Rebellion\",\"answer\":\"answer_b\",\"status\":\"on\"},{\"id\":\"15\",\"topic_id\":\"7\",\"question_title\":\"The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?\",\"answer_a\":\"1998\",\"answer_b\":\"1972\",\"answer_c\":\"1988\",\"answer_d\":\"1901\",\"answer\":\"answer_a\",\"status\":\"on\"}]', NULL, '2023-02-21 21:16:23'),
(22, 1, 'S4VJ9', '[{\"id\":\"13\",\"topic_id\":\"7\",\"question_title\":\"The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?\",\"answer_a\":\"2001\",\"answer_b\":\"1983\",\"answer_c\":\"1788\",\"answer_d\":\"1938\",\"answer\":\"answer_d\",\"status\":\"on\"},{\"id\":\"14\",\"topic_id\":\"7\",\"question_title\":\"January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?\",\"answer_a\":\"Bligh\'s Blight\",\"answer_b\":\"The Soldiers\' Stand\\n\",\"answer_c\":\"New South Wales Nuisance\",\"answer_d\":\"Rum Rebellion\",\"answer\":\"answer_b\",\"status\":\"on\"},{\"id\":\"15\",\"topic_id\":\"7\",\"question_title\":\"The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?\",\"answer_a\":\"1998\",\"answer_b\":\"1972\",\"answer_c\":\"1988\",\"answer_d\":\"1901\",\"answer\":\"answer_a\",\"status\":\"on\"}]', NULL, '2023-02-21 21:16:41'),
(23, 1, 'UAWB4', '[{\"id\":\"13\",\"topic_id\":\"7\",\"question_title\":\"The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?\",\"answer_a\":\"2001\",\"answer_b\":\"1983\",\"answer_c\":\"1788\",\"answer_d\":\"1938\",\"answer\":\"answer_d\",\"status\":\"on\"},{\"id\":\"14\",\"topic_id\":\"7\",\"question_title\":\"January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?\",\"answer_a\":\"Bligh\'s Blight\",\"answer_b\":\"The Soldiers\' Stand\\n\",\"answer_c\":\"New South Wales Nuisance\",\"answer_d\":\"Rum Rebellion\",\"answer\":\"answer_b\",\"status\":\"on\"},{\"id\":\"15\",\"topic_id\":\"7\",\"question_title\":\"The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?\",\"answer_a\":\"1998\",\"answer_b\":\"1972\",\"answer_c\":\"1988\",\"answer_d\":\"1901\",\"answer\":\"answer_a\",\"status\":\"on\"}]', NULL, '2023-02-21 21:16:46'),
(24, 1, 'CTMWE', '[{\"id\":\"13\",\"topic_id\":\"7\",\"question_title\":\"The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?\",\"answer_a\":\"2001\",\"answer_b\":\"1983\",\"answer_c\":\"1788\",\"answer_d\":\"1938\",\"answer\":\"answer_d\",\"status\":\"on\"},{\"id\":\"14\",\"topic_id\":\"7\",\"question_title\":\"January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?\",\"answer_a\":\"Bligh\'s Blight\",\"answer_b\":\"The Soldiers\' Stand\\n\",\"answer_c\":\"New South Wales Nuisance\",\"answer_d\":\"Rum Rebellion\",\"answer\":\"answer_b\",\"status\":\"on\"},{\"id\":\"15\",\"topic_id\":\"7\",\"question_title\":\"The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?\",\"answer_a\":\"1998\",\"answer_b\":\"1972\",\"answer_c\":\"1988\",\"answer_d\":\"1901\",\"answer\":\"answer_a\",\"status\":\"on\"}]', NULL, '2023-02-21 21:45:29'),
(25, 1, 'HIN59', '[{\"id\":\"13\",\"topic_id\":\"7\",\"question_title\":\"The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?\",\"answer_a\":\"2001\",\"answer_b\":\"1983\",\"answer_c\":\"1788\",\"answer_d\":\"1938\",\"answer\":\"answer_d\",\"status\":\"on\"},{\"id\":\"14\",\"topic_id\":\"7\",\"question_title\":\"January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?\",\"answer_a\":\"Bligh\'s Blight\",\"answer_b\":\"The Soldiers\' Stand\\n\",\"answer_c\":\"New South Wales Nuisance\",\"answer_d\":\"Rum Rebellion\",\"answer\":\"answer_b\",\"status\":\"on\"},{\"id\":\"15\",\"topic_id\":\"7\",\"question_title\":\"The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?\",\"answer_a\":\"1998\",\"answer_b\":\"1972\",\"answer_c\":\"1988\",\"answer_d\":\"1901\",\"answer\":\"answer_a\",\"status\":\"on\"}]', NULL, '2023-02-21 22:01:35'),
(26, 1, '8IP04', '[{\"id\":\"13\",\"topic_id\":\"7\",\"question_title\":\"The first large protest to be reported as declaring January 26 as a day of mourning was held in Sydney in what year?\",\"answer_a\":\"2001\",\"answer_b\":\"1983\",\"answer_c\":\"1788\",\"answer_d\":\"1938\",\"answer\":\"answer_d\",\"status\":\"on\"},{\"id\":\"14\",\"topic_id\":\"7\",\"question_title\":\"January 26, 1808 saw a coup d\'etat in the colony of New South Wales when 400 soldiers marched on Government House to arrest the governor, William Bligh. This uprising became known as?\",\"answer_a\":\"Bligh\'s Blight\",\"answer_b\":\"The Soldiers\' Stand\\n\",\"answer_c\":\"New South Wales Nuisance\",\"answer_d\":\"Rum Rebellion\",\"answer\":\"answer_b\",\"status\":\"on\"},{\"id\":\"15\",\"topic_id\":\"7\",\"question_title\":\"The Aboriginal Tent Embassy was first erected on the lawns of Parliament House in Canberra on January 26 in what year?\",\"answer_a\":\"1998\",\"answer_b\":\"1972\",\"answer_c\":\"1988\",\"answer_d\":\"1901\",\"answer\":\"answer_a\",\"status\":\"on\"}]', NULL, '2023-02-22 00:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `status_captcha` enum('on','off') NOT NULL DEFAULT 'off',
  `time_session` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `keywords`, `status`, `status_captcha`, `time_session`) VALUES
(1, 'POLY', 'POLY', '', 'on', 'off', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(225) NOT NULL,
  `topic_status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_status`, `created_at`) VALUES
(6, 'Geography', 'on', '2023-02-21 20:51:43'),
(7, 'History', 'on', '2023-02-21 20:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `ip` varchar(225) DEFAULT NULL,
  `token` text NOT NULL,
  `time_session` int(11) DEFAULT NULL,
  `time_request` int(11) DEFAULT NULL,
  `status` enum('on','off') DEFAULT 'on',
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `ip`, `token`, `time_session`, `time_request`, `status`, `role`, `created_at`, `created_by`) VALUES
(1, 'Nguyễn ', 'Văn Thảo', 'thaotoiday@gmail.com', 'cf718aaf2b0f37ae6f771d7f0e3ae0cf', '::1', '9737128fc6e877ccf3111c814acd7473', 1677018402, 1677018402, 'on', 'user', '2023-02-21 22:26:42', 'user'),
(2, 'Admin', 'Admin', 'thaolaptrinh@gmail.com', 'cf718aaf2b0f37ae6f771d7f0e3ae0cf', '::1', 'cc0ff910dc9bf077ae13f742f28fc72c', 1677018411, 1677018411, 'on', 'admin', '2023-02-21 22:26:51', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_ibfk_1` (`topic_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
