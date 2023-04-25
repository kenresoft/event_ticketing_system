-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 09:54 PM
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
-- Database: `events_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Different categories of events that are managed in the system.';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Music'),
(2, 'Comedy'),
(3, 'Fashion'),
(4, 'Sport'),
(5, 'Exhibition'),
(6, 'Live Show'),
(7, 'Party'),
(8, 'Business'),
(9, 'Food & Drink'),
(10, 'Social'),
(11, 'Play'),
(12, 'Gallery');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_date` varchar(30) NOT NULL,
  `comment_time` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='User comments and reactions on events';

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(55) NOT NULL,
  `event_description` text NOT NULL,
  `event_flier` varchar(255) NOT NULL,
  `event_date` varchar(30) NOT NULL,
  `event_time` varchar(30) NOT NULL,
  `event_venue` varchar(150) NOT NULL,
  `event_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Events available for ticket booking';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_flier`, `event_date`, `event_time`, `event_venue`, `event_category`) VALUES
(1, 'Develpers HuB 1.0', 'For all developers', '865d9b61aec9a4d65f1964953f113007.jpg', '2023-02-15', '13:31', 'New york', 8),
(2, 'Comedy Night', 'Come and catch Fun', '538dcf9d8b98ac9a193a01f25d975ad2.jpg', '2023-02-20', '07:20', 'Abuja', 2),
(3, 'CHE HuB 3.0', 'Every registered NSChE student', 'd42e1c4c00c66e7baac353636d765d80.jpg', '2023-02-30', '03:43', 'CHE Department ', 5),
(4, 'Goal', 'kmxkmzxkmvm', '32554b968a0ad569a14dd61adf835bd8.png', '2023-01-19', '20:42', 'ldflleflmlef', 9);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `organizer_id` int(11) NOT NULL,
  `organizer_name` varchar(55) NOT NULL,
  `organizer_description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Event organization/company or planner details';

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`organizer_id`, `organizer_name`, `organizer_description`, `user_id`, `event_id`) VALUES
(1, 'Google', 'Great Tech Company which owns the ALPHABET INC.', 1, 1),
(2, 'EventBox', 'Naija best Media. Trusted and Reliable.', 1, 2),
(3, 'NSChE FUTO Students Chapter', 'Chemical... Processing Raw Materials...', 1, 3),
(4, 'sdmsmd', 'mxmmvz v VenfF fFmrnfmNFkfnmF MKM🎁', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Administrator reply for user comments ';

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `seat_prefix` varchar(15) NOT NULL,
  `seat_maximum` varchar(11) NOT NULL,
  `seat_description` text NOT NULL,
  `seat_price` varchar(11) NOT NULL,
  `seat_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Event seat reservations and details';

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `event_id`, `seat_prefix`, `seat_maximum`, `seat_description`, `seat_price`, `seat_counter`) VALUES
(1, 1, 'VP', '20', 'VIP - Professional Developers', '5000', 14),
(2, 3, 'EX', '15', 'Executives and Cordinators', '3500', 10),
(3, 3, 'REG', '150', 'Regular Members', '500', 3),
(4, 2, 'BL', '350', 'Bleachers', '2500', 6);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `question1` text DEFAULT NULL,
  `question2` text DEFAULT NULL,
  `question3` text DEFAULT NULL,
  `question4` text DEFAULT NULL,
  `question5` text DEFAULT NULL,
  `question6` text DEFAULT NULL,
  `question7` text DEFAULT NULL,
  `question8` text DEFAULT NULL,
  `question9` text DEFAULT NULL,
  `question10` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Surveys for user feedback on events ';

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`survey_id`, `user_id`, `event_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`) VALUES
(7, 1, 3, 'option5', 'Great', 'Awesome', 'option3', 'option3', 'option3', 'yes', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `qr_image` varchar(255) NOT NULL,
  `qr_code` varchar(55) NOT NULL,
  `event_id` int(11) NOT NULL,
  `ticket_date` varchar(30) NOT NULL,
  `ticket_time` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Event tickets and details';

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `qr_image`, `qr_code`, `event_id`, `ticket_date`, `ticket_time`, `user_id`, `seat_id`) VALUES
(1, 'temp/VP-1_3aad61fa90eff2c28d3e3c6462b0bd46.png', 'VP-1', 1, '2022-10-09', '10:29:17 AM', 1, 1),
(5, 'temp/BL-1_1612f44f0fddf50af303238c4b0fe76a.png', 'BL-1', 2, '2023-01-18', '11:33:23 AM', 1, 4),
(6, 'temp/BL-2_b2a6acddf0832cf1ed1f8b760443ff91.png', 'BL-2', 2, '2023-01-18', '11:43:50 AM', 1, 4),
(7, 'temp/EX-4_8bc953ac9f225febc2863b4d67c7fd55.png', 'EX-4', 3, '2023-01-18', '11:45:24 AM', 1, 2),
(8, 'temp/EX-5_7c5a714bd6ff1c9abc1c7310464cd3d4.png', 'EX-5', 3, '2023-01-18', '11:47:13 AM', 1, 2),
(9, 'temp/BL-3_e65f376a6dfe0a51d49e815619bc5924.png', 'BL-3', 2, '2023-01-18', '11:47:49 AM', 1, 4),
(10, 'temp/EX-6_d27148ddee2b3d0358b7f699fdb809ed.png', 'EX-6', 3, '2023-01-18', '11:51:39 AM', 1, 2),
(11, 'temp/EX-7_eca74e9c9cab1a1c600e844bd34bb6be.png', 'EX-7', 3, '2023-01-18', '12:38:35 PM', 1, 2),
(31, 'temp/REG-2_ffc7469599c5c16776da4b7a3f4b3834.png', 'REG-2', 3, '2023-01-19', '04:42:41 PM', 1, 3),
(32, 'temp/EX-10_de24b6de62579027a962c117e092b969.png', 'EX-10', 3, '2023-01-19', '04:45:00 PM', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `update_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Administrator updates on their events';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `access_id` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='All registered users, both Administrators and Ticket buyers.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lastname`, `firstname`, `password`, `email`, `phone`, `access_id`, `status`) VALUES
(1, 'Admin', 'Admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '+44 56373362', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `access_id` int(11) NOT NULL,
  `access_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Access level of users to the system ';

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`access_id`, `access_type`) VALUES
(1, 'Administrator'),
(2, 'Buyer');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `status_id` int(11) NOT NULL,
  `status_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Registration status of users';

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `status_type`) VALUES
(1, 'Active'),
(2, 'Not Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_user_id_users_user_id` (`user_id`),
  ADD KEY `comments_event_id_events_event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `events_event_category_categories_category_id` (`event_category`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`organizer_id`),
  ADD KEY `organizers_user_id_users_user_id` (`user_id`),
  ADD KEY `organizers_event_id_events_event_id` (`event_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `replies_user_id_users_user_id` (`user_id`),
  ADD KEY `replies_comment_id_comments_comment_id` (`comment_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `seats_event_id_events_event_id` (`event_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `surveys_user_id_users_user_id` (`user_id`),
  ADD KEY `surveys_event_id_events_event_id` (`event_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `tickets_event_id_events_event_id` (`event_id`),
  ADD KEY `tickets_user_id_users_user_id` (`user_id`),
  ADD KEY `tickets_seat_id_seats_seat_id` (`seat_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`update_id`),
  ADD KEY `updates_event_id_events_event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_access_id_user_access_access_id` (`access_id`),
  ADD KEY `users_status_user_status_status_id` (`status`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`access_id`),
  ADD UNIQUE KEY `access_type` (`access_type`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status_type` (`status_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_event_category_categories_category_id` FOREIGN KEY (`event_category`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizers`
--
ALTER TABLE `organizers`
  ADD CONSTRAINT `organizers_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organizers_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_comments_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surveys_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_seat_id_seats_seat_id` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `updates_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_access_id_user_access_access_id` FOREIGN KEY (`access_id`) REFERENCES `user_access` (`access_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `users_status_user_status_status_id` FOREIGN KEY (`status`) REFERENCES `user_status` (`status_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
