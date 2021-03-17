-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 10:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_question`
--

CREATE TABLE `add_question` (
  `ques_id` int(11) NOT NULL,
  `w_ques` varchar(128) DEFAULT NULL,
  `opt_one` varchar(128) DEFAULT NULL,
  `opt_two` varchar(128) DEFAULT NULL,
  `opt_three` varchar(128) DEFAULT NULL,
  `opt_four` varchar(128) DEFAULT NULL,
  `correct_answer` varchar(128) DEFAULT NULL,
  `marks` varchar(128) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `exam_title` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_question`
--

INSERT INTO `add_question` (`ques_id`, `w_ques`, `opt_one`, `opt_two`, `opt_three`, `opt_four`, `correct_answer`, `marks`, `subject_name`, `exam_title`) VALUES
(1, 'Which franchise won the 1st edition of the Indian Premier League?', 'Chennai Super Kings', 'Mumbai Indians', 'Rajasthan Royals', 'Royal Challengers Bangalore', 'Rajasthan Royals', '5', 'Sports', 'IPL QUIZ'),
(2, 'Which player has taken most number of catches in IPL history?', 'AB deVilliers', 'Suresh Raina', 'Virat Kohli', 'Ravindra Jadeja', 'Suresh Raina', '5', 'Sports', 'IPL QUIZ'),
(3, 'Which player has bowled only one ball in IPL and got a wicket on that ball?', 'MS Dhoni', 'Mahela Jayawardane', 'Shikhar Dhawan', 'Adam Gilchrist', 'Adam Gilchrist', '5', 'Sports', 'IPL QUIZ'),
(4, 'Which team has won the most number of IPL titles?', 'Chennai Super Kings', 'Mumbai Indians', 'Royal Challengers Bangalore', 'Kolkata Knight Riders', 'Mumbai Indians', '5', 'Sports', 'IPL QUIZ'),
(5, 'Which team has lost the most number of IPL finals?', 'Mumbai Indians', 'Chennai Super Kings', 'Royal Challengers Bangalore', 'Sunrisers Hyderabad', 'Chennai Super Kings', '5', 'Sports', 'IPL QUIZ'),
(6, 'Who was the first Indian batsman to score a century in IPL?', 'Sachin Tendulkar', 'Manish Pandey', 'Virender Sehwag', 'Yuvraj Singh', 'Manish Pandey', '5', 'Sports', 'IPL QUIZ'),
(7, 'Which team has never been part of an IPL final?', 'Royal Challengers Bangalore', 'Delhi Capitals', 'Rajasthan Royals', 'Kings XI Punjab', 'Delhi Capitals', '5', 'Sports', 'IPL QUIZ'),
(8, 'Which bowler bowled the first over in IPL?', 'Zaheer Khan', 'Praveen Kumar', 'Irfan Pathan', 'Shoaib Akhtar', 'Praveen Kumar', '5', 'Sports', 'IPL QUIZ');

-- --------------------------------------------------------

--
-- Table structure for table `exam_desc`
--

CREATE TABLE `exam_desc` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(128) DEFAULT NULL,
  `exam_date` varchar(128) DEFAULT NULL,
  `exam_dur` varchar(128) DEFAULT NULL,
  `exam_time` time(2) DEFAULT NULL,
  `exam_year` varchar(128) DEFAULT NULL,
  `instructor_username` varchar(128) DEFAULT NULL,
  `subject_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_desc`
--

INSERT INTO `exam_desc` (`exam_id`, `exam_title`, `exam_date`, `exam_dur`, `exam_time`, `exam_year`, `instructor_username`, `subject_name`) VALUES
(1, 'IPL QUIZ', '2020-10-30', '10', '12:00:00.00', '2', 'Mahela Jayawardane', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `instructor_id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `subject` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`instructor_id`, `username`, `password`, `subject`) VALUES
(1, 'Stephen Flemming', 'Chennai', 'English'),
(2, 'Ricky Ponting', 'Delhi', 'Maths'),
(3, 'Mahela Jayawardane', 'Mumbai', 'Sports'),
(4, 'Simon Katich', 'Bangalore', 'General Knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `exam_title` varchar(128) DEFAULT NULL,
  `marks` varchar(15) DEFAULT NULL,
  `total_marks` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sinfo`
--

CREATE TABLE `sinfo` (
  `student_id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `ac_year` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinfo`
--

INSERT INTO `sinfo` (`student_id`, `username`, `password`, `ac_year`) VALUES
(1, 'Rohit Sharma', 'Mumbai', '2'),
(2, 'Virat Kohli', 'Bangalore', '2'),
(3, 'Shreyas Iyer', 'Delhi', '2'),
(4, 'KL Rahul', 'Punjab', '2'),
(5, 'David Warner', 'Hyderabad', '1'),
(6, 'Eoin Morgan', 'Kolkata', '1'),
(7, 'Steve Smith', 'Rajasthan', '1'),
(8, 'MS Dhoni', 'Chennai', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_question`
--
ALTER TABLE `add_question`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `exam_desc`
--
ALTER TABLE `exam_desc`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `sinfo`
--
ALTER TABLE `sinfo`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_question`
--
ALTER TABLE `add_question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_desc`
--
ALTER TABLE `exam_desc`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sinfo`
--
ALTER TABLE `sinfo`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
