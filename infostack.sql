-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 09:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infostack`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `answer_desc` text NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `q_id`, `u_id`, `answer_desc`, `user_email`) VALUES
(83, 44, 63186, 'Everything that a user can see on his side is a part of Frontend. You can use HTML, CSS, JS for Frontend dev. Framework and libraries can also be used for development for example Bootstrap, React, JQuery etc.', 'muzamil@gmail.com'),
(84, 44, 63186, 'For learning this tech, Ping me', 'muzamil@gmail.com'),
(85, 50, 63186, 'You should learn soft skills as well.', 'muzamil@gmail.com'),
(86, 51, 63186, 'Yeah, there is no doubt about it.', 'muzamil@gmail.com'),
(87, 52, 63186, 'From Hisham Sarwar or other YouTube channels', 'muzamil@gmail.com'),
(88, 53, 63186, 'As per my info \"Android\" ', 'muzamil@gmail.com'),
(89, 54, 63186, 'Information Technology', 'muzamil@gmail.com'),
(90, 55, 63186, 'Lahore, Punjab, Pakistan', 'muzamil@gmail.com'),
(91, 49, 6318683, 'Yeah I wanna learn it from you.', 'hassaan@gmail.com'),
(92, 50, 6318683, 'I dont know', 'hassaan@gmail.com'),
(93, 51, 6318683, 'yes', 'hassaan@gmail.com'),
(94, 49, 6318801, 'yes sir', 'rashidkhan@gmail.com'),
(95, 51, 6318801, 'yup', 'rashidkhan@gmail.com'),
(96, 53, 6318801, 'Samsung', 'rashidkhan@gmail.com'),
(97, 54, 6318801, 'Info Tech', 'rashidkhan@gmail.com'),
(98, 57, 631887, 'No sir', 'zeeshan@gmail.com'),
(99, 44, 631887, 'Web Ui', 'zeeshan@gmail.com'),
(100, 51, 631887, 'yes', 'zeeshan@gmail.com'),
(101, 57, 63187, 'Yes Sir', 'asadbhutta@gmail.com'),
(102, 44, 2147483647, 'React', 'basithafeez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `company` varchar(150) NOT NULL,
  `account` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`full_name`, `email`, `company`, `account`, `message`) VALUES
('Hassaan Malick', 'hassaan@gmail.com', 'C Invents', 1, 'Hi I am Hassaan'),
('Hassaan Malick', 'hassaanmalick2001@gmail.com', 'Corporate Invents', 1, 'Hi I am Hassaan');

-- --------------------------------------------------------

--
-- Table structure for table `dislike_system`
--

CREATE TABLE `dislike_system` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `disliked_username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dislike_system`
--

INSERT INTO `dislike_system` (`id`, `question_id`, `disliked_username`) VALUES
(25, 55, 'muzamil'),
(26, 50, 'hassaan'),
(27, 55, 'hassaan');

-- --------------------------------------------------------

--
-- Table structure for table `like_system`
--

CREATE TABLE `like_system` (
  `like_id` int(200) NOT NULL,
  `question_id` int(200) NOT NULL,
  `liked_username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_system`
--

INSERT INTO `like_system` (`like_id`, `question_id`, `liked_username`) VALUES
(75, 44, 'muzamil'),
(76, 49, 'muzamil'),
(77, 44, 'asadbhutta'),
(78, 50, 'asadbhutta'),
(79, 44, 'raoqurban'),
(80, 49, 'raoqurban'),
(81, 49, 'rashidkhan'),
(82, 50, 'rashidkhan'),
(83, 53, 'awaishanif'),
(84, 49, 'basithafeez'),
(85, 50, 'muzamil'),
(86, 51, 'muzamil'),
(87, 52, 'muzamil'),
(88, 53, 'muzamil'),
(89, 54, 'muzamil'),
(90, 57, 'muzamil'),
(91, 49, 'hassaan'),
(92, 51, 'hassaan'),
(93, 52, 'hassaan'),
(94, 54, 'hassaan'),
(95, 53, 'hassaan'),
(96, 57, 'hassaan'),
(97, 57, 'zeeshan'),
(98, 44, 'zeeshan'),
(99, 51, 'zeeshan'),
(100, 52, 'zeeshan'),
(101, 54, 'zeeshan'),
(102, 57, 'asadbhutta'),
(103, 44, 'basithafeez'),
(104, 50, 'hassaan'),
(105, 44, 'hassaan');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `u_name` varchar(225) NOT NULL,
  `question` varchar(500) NOT NULL,
  `likes` int(225) NOT NULL,
  `dislikes` int(225) NOT NULL,
  `user_image` varchar(900) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `user_email`, `u_name`, `question`, `likes`, `dislikes`, `user_image`, `date`) VALUES
(44, 'hassaan@gmail.com', 'hassaan', 'What do you know about Frontend Dev, What technologies should be used in it.?', 6, 0, 'user-profile-pictures/hassaan280491325_1411238559321015_3113009553759949496_n.jpg', '07-09-2022'),
(49, 'muzamil@gmail.com', 'muzamil', 'I am an expert in Database, would you like to learn from me?', 5, 0, 'user-profile-pictures/muzamil92248825_3120065374681949_2235557286753861632_n.jpg', '07-09-2022'),
(50, 'asadbhutta@gmail.com', 'asadbhutta', 'What is the future of a Property Dealer in Pakistan?', 4, 1, 'user-profile-pictures/asadbhutta283267057_1910644155794358_6708760833479254357_n.jpg', '07-09-2022'),
(51, 'raoqurban@gmail.com', 'raoqurban', 'React Js have a future or not?', 3, 0, 'user-profile-pictures/raoqurban279929180_703295224058349_6035670022623838679_n.jpg', '07-09-2022'),
(52, 'rashidkhan@gmail.com', 'rashidkhan', 'From where I should learn Freelancing', 3, 0, 'user-profile-pictures/rashidkhan282849455_1688042118261135_7901285242358900886_n.jpg', '07-09-2022'),
(53, 'awaishanif@gmail.com', 'awaishanif', 'Which mobile phone have a wide number of users in Pakistan', 3, 0, 'user-profile-pictures/awaishanif296128831_112097598253415_5811060608791605856_n.jpg', '07-09-2022'),
(54, 'basithafeez@gmail.com', 'basithafeez', 'What is meant by IT?', 3, 0, 'user-profile-pictures/basithafeez79159916_974878249560409_1842021708437913600_n.jpg', '07-09-2022'),
(55, 'husman@gmail.com', 'husman', 'What is the capital of Punjab?', 0, 2, 'user-profile-pictures/adminWhatsApp_Image_2022-05-11_at_1.12.30_AM-removebg-preview (2).png', '07-09-2022'),
(57, 'muzamil@gmail.com', 'muzamil', 'Any one have any Question?', 4, 0, 'user-profile-pictures/muzamil92248825_3120065374681949_2235557286753861632_n.jpg', '07-09-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user_iformation`
--

CREATE TABLE `user_iformation` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` text NOT NULL,
  `user_image` varchar(900) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_iformation`
--

INSERT INTO `user_iformation` (`user_id`, `user_name`, `user_fullname`, `user_email`, `user_password`, `user_image`, `status`) VALUES
(63186, 'muzamil', 'Muzamil Mehboob', 'muzamil@gmail.com', 'muzamil', 'user-profile-pictures/muzamil92248825_3120065374681949_2235557286753861632_n.jpg', 0),
(63187, 'asadbhutta', 'Asad Bhutta', 'asadbhutta@gmail.com', 'asadbhutta', 'user-profile-pictures/asadbhutta283267057_1910644155794358_6708760833479254357_n.jpg', 0),
(631887, 'zeeshan', 'Zeeshan Latif', 'zeeshan@gmail.com', 'zeeshan', 'user-profile-pictures/zeeshan124695504_2531550770478315_5508603449957624249_n.jpg', 0),
(6318683, 'hassaan', 'Hassaan', 'hassaan@gmail.com', 'hassaan', 'user-profile-pictures/hassaan280491325_1411238559321015_3113009553759949496_n.jpg', 1),
(6318800, 'raoqurban', 'Rao Qurban', 'raoqurban@gmail.com', 'raoqurban', 'user-profile-pictures/raoqurban279929180_703295224058349_6035670022623838679_n.jpg', 0),
(6318801, 'rashidkhan', 'Rashid Khan', 'rashidkhan@gmail.com', 'rashidkhan', 'user-profile-pictures/rashidkhan282849455_1688042118261135_7901285242358900886_n.jpg', 0),
(6318807, 'awaishanif', 'Awais Hanif', 'awaishanif@gmail.com', 'awaishanif', 'user-profile-pictures/awaishanif296128831_112097598253415_5811060608791605856_n.jpg', 0),
(63186929, 'husman', 'Hafiz Usman', 'husman@gmail.com', 'husman', 'user-profile-pictures/adminWhatsApp_Image_2022-05-11_at_1.12.30_AM-removebg-preview (2).png', 0),
(2147483647, 'basithafeez', 'Basit Hafeez', 'basithafeez@gmail.com', 'basithafeez', 'user-profile-pictures/basithafeez79159916_974878249560409_1842021708437913600_n.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question` (`q_id`),
  ADD KEY `user` (`u_id`);

--
-- Indexes for table `dislike_system`
--
ALTER TABLE `dislike_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_system`
--
ALTER TABLE `like_system`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `test` (`question_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `user_iformation`
--
ALTER TABLE `user_iformation`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `dislike_system`
--
ALTER TABLE `dislike_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `like_system`
--
ALTER TABLE `like_system`
  MODIFY `like_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `question` FOREIGN KEY (`q_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_system`
--
ALTER TABLE `like_system`
  ADD CONSTRAINT `test` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
