-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2015 at 12:22 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trackme`
--
CREATE DATABASE IF NOT EXISTS `trackme` DEFAULT COLLATE utf8_general_ci;
USE `trackme`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `body_measurement_table`
--

CREATE TABLE IF NOT EXISTS `body_measurement_table` (
  `user_id` int(10) NOT NULL,
  `body_measurement_type_id` int(11) NOT NULL,
  `body_measurement_value` int(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `body_measurement_type_table`
--

CREATE TABLE IF NOT EXISTS `body_measurement_type_table` (
  `body_measurement_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `body_measurement_type` varchar(50) NOT NULL,
  PRIMARY KEY (body_measurement_type_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body_measurement_type_table`
--

INSERT INTO `body_measurement_type_table` (`body_measurement_type`) VALUES
('height'),
('weight'),
('waist'),
('wrist'),
('hips'),
('forearm'),
('bmi'),
('bodyfat');

-- --------------------------------------------------------

--
-- Table structure for table `food_served_table`
--

CREATE TABLE IF NOT EXISTS `food_served_table` (
  `user_id` int(10) NOT NULL,
  `food_id` int(255) NOT NULL,
  `food_serving` float NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE IF NOT EXISTS `food_table` (
  `food_id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) NOT NULL,
  `food_calories` int(255) NOT NULL,
  PRIMARY KEY (food_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_dist_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_dist_table` (
  `user_id` int(10) NOT NULL,
  `physical_activity_dist_id` int(10) NOT NULL,
  `distance` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_dist_type_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_dist_type_table` (
  `physical_activity_dist_id` int(10) NOT NULL AUTO_INCREMENT,
  `physical_activity_dist_type` varchar(50) NOT NULL,
  PRIMARY KEY (physical_activity_dist_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_rep_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_rep_table` (
  `user_id` int(10) NOT NULL,
  `physical_activity_rep_id` int(10) NOT NULL,
  `number_of_reps` int(255) NOT NULL,
  `number_of_sets` int(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_rep_type_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_rep_type_table` (
  `physical_activity_rep_id` int(10) NOT NULL AUTO_INCREMENT,
  `physical_activity_rep_type` varchar(50) NOT NULL,
  PRIMARY KEY (physical_activity_rep_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_time_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_time_table` (
  `user_id` int(10) NOT NULL,
  `physical_activity_time_id` int(10) NOT NULL,
  `time` int(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_time_type_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_time_type_table` (
  `physical_activity_time_id` int(10) NOT NULL AUTO_INCREMENT,
  `physical_activity_time_type` varchar(50) NOT NULL,
  PRIMARY KEY (physical_activity_time_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE IF NOT EXISTS `users_table` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(320) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_profile_pic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`first_name`, `last_name`, `user_email`, `user_password`, `user_birthdate`, `user_profile_pic`) VALUES
('Mark Genesis', 'Romantigue', 'markg.romantigue@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1995-10-13', 'assets/images/profilePic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs_table`
--

CREATE TABLE IF NOT EXISTS `vital_signs_table` (
  `user_id` int(10) NOT NULL,
  `vital_signs_type_id` int(10) NOT NULL,
  `vital_signs_value` int(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs_type_table`
--

CREATE TABLE IF NOT EXISTS `vital_signs_type_table` (
  `vital_signs_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `vital_signs_type` varchar(50) NOT NULL,
  PRIMARY KEY (vital_signs_type_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vital_signs_type_table`
--

INSERT INTO `vital_signs_type_table` (`vital_signs_type`) VALUES
('heartrate'),
('respiratoryrate'),
('systolic'),
('diastolic');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
