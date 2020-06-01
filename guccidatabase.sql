-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 05:54 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guccidatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conv_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conv_id`, `title`, `creator_id`, `channel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1000, 'First Conversation', 22, 2, '2017-11-26 21:36:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1001, 'SECOND', 24, 111, '2017-11-26 22:17:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendship_id` int(11) NOT NULL,
  `user_one_id` int(11) NOT NULL,
  `user_two_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `rel_stat` varchar(2000) NOT NULL,
  `request_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friendship_id`, `user_one_id`, `user_two_id`, `status`, `rel_stat`, `request_date`) VALUES
(1, 22, 21, 1, '', '2017-11-15 04:15:10'),
(2, 22, 24, 1, '', '0000-00-00 00:00:00'),
(4, 21, 22, 1, '', '2017-11-01 00:00:00'),
(5, 22, 19, 1, '', '0000-00-00 00:00:00'),
(6, 19, 22, 1, '', '2017-11-21 00:00:00'),
(7, 24, 22, 1, '', '2017-11-21 00:00:00'),
(8, 24, 19, 1, '', '0000-00-00 00:00:00'),
(9, 19, 24, 1, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `getfriendlist`
-- (See below for the actual view)
--
CREATE TABLE `getfriendlist` (
`member_id` int(11)
,`user_id` int(11)
,`lastname` varchar(2000)
,`firstname` varchar(2000)
,`birthdate` datetime
,`gender` varchar(50)
,`referrer` int(11)
,`last_seen` datetime
,`status` varchar(100)
,`datejoined` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(1, '0000-00-00 00:00:00'),
(1, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00'),
(2, '2017-11-20 16:27:33'),
(20, '2017-11-21 07:38:41'),
(19, '2017-11-21 10:48:11'),
(20, '2017-11-21 06:14:54'),
(22, '2017-11-21 06:36:24'),
(22, '2017-11-21 10:42:44'),
(19, '2017-11-25 10:57:11'),
(19, '2017-11-26 12:00:38'),
(19, '2017-11-26 12:00:43'),
(19, '2017-11-26 12:00:47'),
(19, '2017-11-26 01:14:49'),
(24, '2017-11-26 03:58:23'),
(22, '2017-11-26 01:58:59'),
(22, '2017-11-26 03:19:26'),
(19, '2017-11-26 07:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `conv_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `message_type` varchar(500) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `attachment_thumb_url` varchar(2000) NOT NULL,
  `attachment_url` varchar(2000) NOT NULL,
  `send_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guid` varchar(200) NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `conv_id`, `sender_id`, `participants_id`, `message_type`, `message`, `attachment_thumb_url`, `attachment_url`, `send_date`, `guid`, `deleted_at`) VALUES
(1000, 1000, 22, 19, 'normal', 'first', '', '', '2017-11-26 21:38:13', '\r\n', '0000-00-00 00:00:00'),
(1001, 1000, 19, 22, 'normal', 'reply', '', '', '2017-11-26 22:03:58', '', '0000-00-00 00:00:00'),
(1002, 1001, 24, 22, 'nrmal', 'yo', '', '', '2017-11-26 22:18:23', '', '0000-00-00 00:00:00'),
(1003, 1001, 22, 24, 'normal', 'supp?', '', '', '2017-11-26 22:19:25', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `usersession_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `last_seen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userauth`
--

CREATE TABLE `userauth` (
  `user_id` int(11) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `pwd` varchar(20000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userauth`
--

INSERT INTO `userauth` (`user_id`, `uid`, `pwd`, `name`, `add_date`) VALUES
(19, 'damian@ggnakopota.com', '111', 'last resort', '2017-11-21 03:20:32'),
(21, 'asdasd@aw55.com', '111', '2asd', '2017-11-21 03:28:26'),
(22, 'asdasd@aw.com', '222', 'jakenbo', '2017-11-21 03:29:10'),
(24, 'ordeal222@gmail.com.ph', '1111', 'ordeal', '2017-11-21 04:10:31'),
(25, 'wazowski@gmail.com', '123', 'mike wazowski', '2017-11-21 17:53:23'),
(26, '6mikelogan9@gmail.com', 'asylum69!', 'john mar', '2017-11-25 19:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_image` varchar(2000) NOT NULL,
  `lastname` varchar(2000) NOT NULL,
  `firstname` varchar(2000) NOT NULL,
  `usernick` varchar(500) NOT NULL,
  `birthdate` datetime NOT NULL,
  `gender` varchar(50) NOT NULL,
  `referrer` int(11) NOT NULL,
  `last_seen` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `datejoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`member_id`, `user_id`, `user_image`, `lastname`, `firstname`, `usernick`, `birthdate`, `gender`, `referrer`, `last_seen`, `status`, `datejoined`) VALUES
(4, 0, '', '', '', '', '0000-00-00 00:00:00', 'Male', 0, '2017-11-20 20:20:32', 'Offline', '2017-11-21 03:20:32'),
(5, 19, 'profile-default.png\r\n', '', '', 'last resort', '0000-00-00 00:00:00', 'Male', 0, '2017-11-26 09:21:50', 'Online', '2017-11-21 03:27:05'),
(6, 21, 'profile-default.png', '', '', '2asd', '0000-00-00 00:00:00', 'Male', 0, '2017-11-20 20:28:26', 'Offline', '2017-11-21 03:28:26'),
(7, 22, '21(20171121032826).jpg', 'John Mar', 'Lorenzo', 'jakenbo', '0000-00-00 00:00:00', 'Male', 0, '2017-12-03 02:24:47', 'Offline', '2017-11-21 03:29:10'),
(8, 24, 'profile-default.png\r\n', '', '', 'ordeal', '0000-00-00 00:00:00', 'Male', 0, '2017-12-03 06:11:54', 'Online', '2017-11-21 04:10:31'),
(9, 25, 'profile-default.png', '', '', 'mike wazowski', '0000-00-00 00:00:00', 'Male', 0, '2017-11-21 06:15:20', 'Offline', '2017-11-21 17:53:23'),
(10, 26, 'profile-default.png', '', '', 'john mar', '0000-00-00 00:00:00', 'Male', 0, '2017-11-25 09:02:54', 'Online', '2017-11-25 19:55:54');

-- --------------------------------------------------------

--
-- Structure for view `getfriendlist`
--
DROP TABLE IF EXISTS `getfriendlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getfriendlist`  AS  select `users`.`member_id` AS `member_id`,`users`.`user_id` AS `user_id`,`users`.`lastname` AS `lastname`,`users`.`firstname` AS `firstname`,`users`.`birthdate` AS `birthdate`,`users`.`gender` AS `gender`,`users`.`referrer` AS `referrer`,`users`.`last_seen` AS `last_seen`,`users`.`status` AS `status`,`users`.`datejoined` AS `datejoined` from `users` where `users`.`user_id` in (select `friends`.`user_two_id` from `friends` where ((`friends`.`user_one_id` = 22) and (`friends`.`status` = 1))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conv_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendship_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`usersession_id`);

--
-- Indexes for table `userauth`
--
ALTER TABLE `userauth`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `usersession_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userauth`
--
ALTER TABLE `userauth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
