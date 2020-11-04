-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2020 at 08:26 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `manage_address`
--

DROP TABLE IF EXISTS `manage_address`;
CREATE TABLE IF NOT EXISTS `manage_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_student_id` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `city` varchar(64) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_address`
--

INSERT INTO `manage_address` (`address_id`, `ref_student_id`, `address`, `city`) VALUES
(1, 1, 'Hno. 75', 'Ekta VIhar'),
(2, 1, 'Hno. 23', 'Ganesh'),
(3, 2, 'Hn 22', 'Khelan'),
(4, 3, 'Hn 45', 'Mahesh Nagar'),
(5, 4, 'Hn. 46', 'Gobind nagar'),
(6, 5, 'Hno. 47', 'Green park'),
(7, 6, 'Hno. 89', 'Shahpur'),
(8, 7, 'Hn. 7', 'Mahesh Nagar'),
(9, 0, 'Hno . 111 ', 'Ajit Nagar'),
(10, 0, '123', 'Test City');

-- --------------------------------------------------------

--
-- Table structure for table `manage_classes`
--

DROP TABLE IF EXISTS `manage_classes`;
CREATE TABLE IF NOT EXISTS `manage_classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 2 = inactive, 3=pending',
  `sort_order` int(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_classes`
--

INSERT INTO `manage_classes` (`class_id`, `class_name`, `status`, `sort_order`, `date_added`, `date_modified`) VALUES
(1, 'Nursury', 1, 1, '2020-10-06 12:05:55', '2020-10-06 12:05:55'),
(2, 'KG', 1, 2, '2020-10-06 12:05:55', '2020-10-06 12:05:55'),
(3, '1st', 1, 2, '2020-10-06 12:05:55', '2020-10-06 12:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `manage_sections`
--

DROP TABLE IF EXISTS `manage_sections`;
CREATE TABLE IF NOT EXISTS `manage_sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(16) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_sections`
--

INSERT INTO `manage_sections` (`section_id`, `section_name`, `status`, `sort_order`, `date_added`, `date_modified`) VALUES
(1, 'A', 1, 1, '2020-10-06 12:11:52', '2020-10-06 12:11:52'),
(2, 'B', 1, 2, '2020-10-06 12:11:52', '2020-10-06 12:11:52'),
(3, 'C', 1, 3, '2020-10-06 12:11:52', '2020-10-06 12:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `manage_student`
--

DROP TABLE IF EXISTS `manage_student`;
CREATE TABLE IF NOT EXISTS `manage_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(64) NOT NULL,
  `roll_number` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_student`
--

INSERT INTO `manage_student` (`student_id`, `student_name`, `roll_number`, `status`, `date_added`) VALUES
(1, 'Shivang', 0, 0, NULL),
(2, 'Vishnu', 0, 0, NULL),
(3, 'Vikas', 0, 0, NULL),
(4, 'Manish', 0, 0, NULL),
(5, 'Ashish', 0, 0, NULL),
(6, 'Rohit', 0, 0, NULL),
(7, 'Himanshu', 25, 0, NULL),
(8, 'Deepam', 123, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manage_subjects`
--

DROP TABLE IF EXISTS `manage_subjects`;
CREATE TABLE IF NOT EXISTS `manage_subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_subjects`
--

INSERT INTO `manage_subjects` (`subject_id`, `subject_name`, `status`, `sort_order`, `date_added`, `date_modified`) VALUES
(1, 'English', 1, 1, '2020-10-07 11:40:20', '2020-10-07 11:40:20'),
(2, 'Hindi', 1, 2, '2020-10-07 11:40:20', '2020-10-07 11:40:20'),
(3, 'Math', 1, 3, '2020-10-07 11:40:20', '2020-10-07 11:40:20'),
(4, 'Science', 1, 4, '2020-10-07 11:40:20', '2020-10-07 11:40:20'),
(5, 'Social Studies', 1, 5, '2020-10-07 11:40:20', '2020-10-07 11:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `manage_user`
--

DROP TABLE IF EXISTS `manage_user`;
CREATE TABLE IF NOT EXISTS `manage_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_user`
--

INSERT INTO `manage_user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `status`, `date_added`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'admin@admin.com', '9876543210', 1, '2020-10-22 12:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `relation_class_section`
--

DROP TABLE IF EXISTS `relation_class_section`;
CREATE TABLE IF NOT EXISTS `relation_class_section` (
  `class_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(4) NOT NULL,
  `section_id` int(4) NOT NULL,
  PRIMARY KEY (`class_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relation_class_section`
--

INSERT INTO `relation_class_section` (`class_section_id`, `class_id`, `section_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 1),
(8, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `relation_subject_class_section`
--

DROP TABLE IF EXISTS `relation_subject_class_section`;
CREATE TABLE IF NOT EXISTS `relation_subject_class_section` (
  `subject_class_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(4) NOT NULL,
  `class_id` int(4) NOT NULL,
  `section` int(4) NOT NULL,
  PRIMARY KEY (`subject_class_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relation_subject_class_section`
--

INSERT INTO `relation_subject_class_section` (`subject_class_section_id`, `subject_id`, `class_id`, `section`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
