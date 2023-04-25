-- Disable Foreign key checks
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS `seats`;
DROP TABLE IF EXISTS `tickets`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `replies`;
DROP TABLE IF EXISTS `updates`;
DROP TABLE IF EXISTS `organizers`;
DROP TABLE IF EXISTS `user_access`;
DROP TABLE IF EXISTS `user_status`;
DROP TABLE IF EXISTS `surveys`;

-- Enable Foreign key checks
SET FOREIGN_KEY_CHECKS=1;


CREATE TABLE `events` (
`event_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`event_title` VARCHAR(55) NOT NULL,
`event_description` TEXT NOT NULL,
`event_flier` VARCHAR(255) NOT NULL,
`event_date` VARCHAR(30) NOT NULL,
`event_time` VARCHAR(30) NOT NULL,
`event_venue` VARCHAR(150) NOT NULL,
`event_category` INT(11) NOT NULL)
COMMENT = 'Events available for ticket booking';

CREATE TABLE `seats` (
`seat_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`event_id` INT(11) NOT NULL,
`seat_prefix` VARCHAR(15) NOT NULL,
`seat_maximum` VARCHAR(11) NOT NULL,
`seat_description` TEXT(255) NOT NULL,
`seat_price` VARCHAR(11) NOT NULL,
`seat_counter` INT(11) NOT NULL)
COMMENT = 'Event seat reservations and details';

CREATE TABLE `tickets` (
`ticket_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`qr_image` VARCHAR(255) NOT NULL,
`qr_code` VARCHAR(55) NOT NULL,
`event_id` INT(11) NOT NULL,
`ticket_date` VARCHAR(30) NOT NULL,
`ticket_time` VARCHAR(30) NOT NULL,
`user_id` INT(11) NOT NULL,
`seat_id` INT(11) NOT NULL)
COMMENT = 'Event tickets and details';

CREATE TABLE `users` (
`user_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`lastname` VARCHAR(55) NOT NULL,
`firstname` VARCHAR(55) NOT NULL,
`password` VARCHAR(55) NOT NULL UNIQUE,
`email` VARCHAR(45) NOT NULL,
`phone` VARCHAR(13) NOT NULL,
`access_id` INT(11) NOT NULL DEFAULT 2,
`status` INT(11) NOT NULL DEFAULT 2)
COMMENT = 'All registered users, both Administrators and Ticket buyers.';

CREATE TABLE `categories` (
`category_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`category` VARCHAR(55) NOT NULL)
COMMENT = 'Different categories of events that are managed in the system.';

CREATE TABLE `comments` (
`comment_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`comment_date` VARCHAR(30) NOT NULL,
`comment_time` VARCHAR(30) NOT NULL,
`user_id` INT(11) NOT NULL,
`event_id` INT(11) NOT NULL)
COMMENT = 'User comments and reactions on events';

CREATE TABLE `replies` (
`reply_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`user_id` INT(11) NOT NULL,
`comment_id` INT(11) NOT NULL)
COMMENT = 'Administrator reply for user comments ';

CREATE TABLE `updates` (
`update_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`event_id` INT(11) NOT NULL)
COMMENT = 'Administrator updates on their events';

CREATE TABLE `organizers` (
`organizer_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`organizer_name` VARCHAR(55) NOT NULL,
`organizer_description` TEXT NOT NULL,
`user_id` INT(11) NOT NULL,
`event_id` INT(11) NOT NULL)
COMMENT = 'Event organization/company or planner details';

CREATE TABLE `user_access` (
`access_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`access_type` VARCHAR(55) NOT NULL UNIQUE)
COMMENT = 'Access level of users to the system ';

CREATE TABLE `user_status` (
`status_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`status_type` VARCHAR(55) NOT NULL UNIQUE)
COMMENT = 'Registration status of users';

CREATE TABLE `surveys` (
`survey_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
`user_id` INT(11) NOT NULL,
`event_id` INT(11) NOT NULL,
`question1` TEXT,
`question2` TEXT,
`question3` TEXT,
`question4` TEXT,
`question5` TEXT,
`question6` TEXT,
`question7` TEXT,
`question8` TEXT,
`question9` TEXT,
`question10` TEXT)
COMMENT = 'Surveys for user feedback on events ';

ALTER TABLE `events` ADD CONSTRAINT `events_event_category_categories_category_id` FOREIGN KEY (`event_category`) REFERENCES `categories`(`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `seats` ADD CONSTRAINT `seats_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tickets` ADD CONSTRAINT `tickets_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tickets` ADD CONSTRAINT `tickets_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tickets` ADD CONSTRAINT `tickets_seat_id_seats_seat_id` FOREIGN KEY (`seat_id`) REFERENCES `seats`(`seat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `users` ADD CONSTRAINT `users_access_id_user_access_access_id` FOREIGN KEY (`access_id`) REFERENCES `user_access`(`access_id`) ON DELETE SET DEFAULT ON UPDATE CASCADE;
ALTER TABLE `users` ADD CONSTRAINT `users_status_user_status_status_id` FOREIGN KEY (`status`) REFERENCES `user_status`(`status_id`) ON DELETE SET DEFAULT ON UPDATE CASCADE;
ALTER TABLE `comments` ADD CONSTRAINT `comments_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `comments` ADD CONSTRAINT `comments_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `replies` ADD CONSTRAINT `replies_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `replies` ADD CONSTRAINT `replies_comment_id_comments_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comments`(`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `updates` ADD CONSTRAINT `updates_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `organizers` ADD CONSTRAINT `organizers_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `organizers` ADD CONSTRAINT `organizers_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `surveys` ADD CONSTRAINT `surveys_user_id_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `surveys` ADD CONSTRAINT `surveys_event_id_events_event_id` FOREIGN KEY (`event_id`) REFERENCES `events`(`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
