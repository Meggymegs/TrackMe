-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2015 at 08:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trackme`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_measurement_table`
--

CREATE TABLE IF NOT EXISTS `body_measurement_table` (
  `user_id` int(11) NOT NULL,
  `body_measurement_type_id` int(11) NOT NULL,
  `body_measurement_value` double NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `body_measurement_type_table`
--

CREATE TABLE IF NOT EXISTS `body_measurement_type_table` (
`body_measurement_type_id` int(11) NOT NULL,
  `body_measurement_type` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `body_measurement_type_table`
--

INSERT INTO `body_measurement_type_table` (`body_measurement_type_id`, `body_measurement_type`) VALUES
(1, 'height'),
(2, 'weight'),
(3, 'waist'),
(4, 'wrist'),
(5, 'hips'),
(6, 'forearm'),
(7, 'bmi'),
(8, 'bodyfat');

-- --------------------------------------------------------

--
-- Table structure for table `food_served_table`
--

CREATE TABLE IF NOT EXISTS `food_served_table` (
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_serving` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE IF NOT EXISTS `food_table` (
`food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_dist_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_dist_table` (
  `user_id` int(11) NOT NULL,
  `physical_activity_dist_id` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_dist_type_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_dist_type_table` (
`physical_acitivty_dist_id` int(11) NOT NULL,
  `physical_activity_dist_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_rep_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_rep_table` (
  `user_id` int(11) NOT NULL,
  `physical_activity_rep_id` int(11) NOT NULL,
  `number_of_reps` int(11) NOT NULL,
  `number_of_sets` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_rep_type_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_rep_type_table` (
`physical_activity_rep_id` int(11) NOT NULL,
  `physical_activity_rep_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_time_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_time_table` (
  `user_id` int(11) NOT NULL,
  `physical_activity_time_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_activities_time_type_table`
--

CREATE TABLE IF NOT EXISTS `physical_activities_time_type_table` (
`physical_activity_time_id` int(11) NOT NULL,
  `physical_activity_time_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE IF NOT EXISTS `users_table` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs_table`
--

CREATE TABLE IF NOT EXISTS `vital_signs_table` (
  `user_id` int(11) NOT NULL,
  `vital_signs_type_id` int(11) NOT NULL,
  `vital_signs_value` double NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs_type_table`
--

CREATE TABLE IF NOT EXISTS `vital_signs_type_table` (
`vital_signs_type_id` int(11) NOT NULL,
  `vital_signs_type` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vital_signs_type_table`
--

INSERT INTO `vital_signs_type_table` (`vital_signs_type_id`, `vital_signs_type`) VALUES
(1, 'heartrate'),
(2, 'respiratoryrate'),
(3, 'systolic'),
(4, 'diastolic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_measurement_type_table`
--
ALTER TABLE `body_measurement_type_table`
 ADD PRIMARY KEY (`body_measurement_type_id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
 ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `physical_activities_dist_type_table`
--
ALTER TABLE `physical_activities_dist_type_table`
 ADD PRIMARY KEY (`physical_acitivty_dist_id`);

--
-- Indexes for table `physical_activities_rep_type_table`
--
ALTER TABLE `physical_activities_rep_type_table`
 ADD PRIMARY KEY (`physical_activity_rep_id`);

--
-- Indexes for table `physical_activities_time_type_table`
--
ALTER TABLE `physical_activities_time_type_table`
 ADD PRIMARY KEY (`physical_activity_time_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vital_signs_type_table`
--
ALTER TABLE `vital_signs_type_table`
 ADD PRIMARY KEY (`vital_signs_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `body_measurement_type_table`
--
ALTER TABLE `body_measurement_type_table`
MODIFY `body_measurement_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `physical_activities_dist_type_table`
--
ALTER TABLE `physical_activities_dist_type_table`
MODIFY `physical_acitivty_dist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `physical_activities_rep_type_table`
--
ALTER TABLE `physical_activities_rep_type_table`
MODIFY `physical_activity_rep_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `physical_activities_time_type_table`
--
ALTER TABLE `physical_activities_time_type_table`
MODIFY `physical_activity_time_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vital_signs_type_table`
--
ALTER TABLE `vital_signs_type_table`
MODIFY `vital_signs_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
