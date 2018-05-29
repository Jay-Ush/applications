-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 05:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_priority`
--

CREATE TABLE `task_priority` (
  `priority_id` int(11) NOT NULL,
  `priority_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_priority`
--

INSERT INTO `task_priority` (`priority_id`, `priority_name`) VALUES
(1, 'highest'),
(2, 'medium'),
(3, 'lowest');

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_of_task` date NOT NULL,
  `priority_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `task_deadline` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`task_id`, `user_id`, `date_of_task`, `priority_id`, `task_name`, `task_description`, `task_deadline`) VALUES
(1, 2, '2017-05-02', 1, 'Repair Photocopy Machine ', 'The machine got broken and I had to send it for a repair.', '12:00:00'),
(2, 2, '2017-01-01', 3, 'Prepare for Valentine''s day', 'My valentine day preparation.', '00:59:00'),
(3, 2, '2017-12-02', 2, 'Call mum', 'Check on her', '11:00:00'),
(4, 2, '2017-05-02', 2, 'Type minutes', 'Type and send minutes of the last meeting', '17:30:00'),
(5, 3, '2017-05-22', 1, 'Call Aunty Oby', 'Call her and inform her about the driver''s license for the guarantor''s form', '19:00:00'),
(6, 3, '2017-05-24', 2, 'Prepare for CDS', 'Get up early and prepare for CDS', '07:00:00'),
(7, 3, '2017-05-23', 2, 'Call Ifeanyi Agbasi', 'Get more information about the sensitization exercise on Wednesday.', '12:00:00'),
(8, 3, '2017-05-27', 3, 'Meet up with CK', 'Its been a long time... Find out how he''s doing', '17:00:00'),
(9, 3, '2017-05-24', 3, 'Meet up with Nelson', 'Thank him for the birthday gesture, and ask about the gym appointment', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `email`, `password`) VALUES
(2, 'Isebor', 'Joshua', 'joshua.isebor@gmail.com', 'bad164ea36bffbb105767ba8d'),
(3, 'Isebor', 'Nkemdilim', 'jjhorni@yahoo.com', '85d4193ff4c1deb12258dda3e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_priority`
--
ALTER TABLE `task_priority`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `priority_id` (`priority_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD CONSTRAINT `todo_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `todo_list_ibfk_2` FOREIGN KEY (`priority_id`) REFERENCES `task_priority` (`priority_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
