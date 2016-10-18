-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2016 at 05:51 AM
-- Server version: 5.7.15-log
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robruu_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_user`
--

CREATE TABLE `check_user` (
  `id_user` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_user`
--

INSERT INTO `check_user` (`id_user`, `id_question`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `choice_question`
--

CREATE TABLE `choice_question` (
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `num_choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_post` varchar(11) NOT NULL,
  `id_N` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_post`, `id_N`, `comment`, `time`, `id_user`) VALUES
('1', 46, 'jarnold0@list-manage.com', '', 1),
('2', 17, 'aolson1@soundcloud.com', '', 3),
('3', 71, 'jcole2@nature.com', '', 1),
('4', 51, 'lwheeler3@usda.gov', '', 2),
('5', 40, 'tgonzalez4@dropbox.com', '', 3),
('6', 84, 'lsanders5@bandcamp.com', '', 3),
('7', 56, 'jmendoza6@devhub.com', '', 1),
('8', 22, 'nmatthews7@epa.gov', '', 2),
('9', 31, 'jhudson8@oakley.com', '', 1),
('10', 50, 'dgonzales9@seattletimes.com', '', 2),
('11', 22, 'pcastilloa@nytimes.com', '', 2),
('12', 61, 'bjenkinsb@amazon.com', '', 2),
('13', 93, 'lmedinac@msu.edu', '', 1),
('14', 9, 'bwestd@typepad.com', '', 1),
('15', 14, 'dkinge@adobe.com', '', 3),
('16', 87, 'sdavisf@arizona.edu', '', 1),
('17', 4, 'aharveyg@wired.com', '', 3),
('18', 89, 'jgonzalesh@ucsd.edu', '', 3),
('19', 66, 'cgranti@twitter.com', '', 2),
('20', 11, 'schavezj@ibm.com', '', 3),
('58043b652e3', 1, 'sss', 'Tue / 10 / 2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`) VALUES
(3, 1, '58043b652e3cb');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int(11) NOT NULL,
  `id_f` int(5) NOT NULL,
  `id_u` int(5) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `score` int(11) NOT NULL,
  `id_answer` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `id_author`, `name`, `score`, `id_answer`, `rating`) VALUES
(1, 1, 'www.PNG', 1, 2, 0),
(2, 1, 'www.PNG', 1, 2, 0),
(3, 1, 'www.PNG', 1, 2, 0),
(4, 1, 'www.PNG', 1, 2, 0),
(5, 1, 'www.PNG', 1, 2, 0),
(6, 1, 'www.PNG', 1, 2, 0),
(7, 1, 'www.PNG', 1, 2, 0),
(8, 1, 'www.PNG', 1, 2, 0),
(9, 1, 'www.PNG', 1, 2, 0),
(10, 1, 'www.PNG', 1, 2, 0),
(11, 1, 'www.PNG', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `picture_playlist`
--

CREATE TABLE `picture_playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `detail` text NOT NULL,
  `score` int(5) NOT NULL,
  `hint` varchar(300) NOT NULL,
  `level` int(5) NOT NULL,
  `rating` int(100) NOT NULL,
  `id_answer` int(50) NOT NULL,
  `concept` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `id_user`, `detail`, `score`, `hint`, `level`, `rating`, `id_answer`, `concept`) VALUES
(1, 1, 'asdasd', 0, 'asdasdasdasdasdasd', 0, 0, 1, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `question_playlist`
--

CREATE TABLE `question_playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `num_question` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_playlist`
--

INSERT INTO `question_playlist` (`id`, `name`, `num_question`, `price`, `id_question`) VALUES
(1, 'Steven', 46, 82, 5),
(2, 'Daniel', 33, 5, 64),
(3, 'Helen', 85, 7, 70),
(4, 'Kathy', 86, 59, 71),
(5, 'Rebecca', 36, 10, 34),
(6, 'Rachel', 5, 67, 95),
(7, 'Carlos', 2, 17, 65),
(8, 'Annie', 17, 23, 13),
(9, 'Joan', 50, 62, 80),
(10, 'Rose', 32, 73, 98);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_user` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(60) NOT NULL,
  `email` varchar(64) NOT NULL,
  `birth_date` varchar(30) NOT NULL,
  `score` int(100) NOT NULL,
  `money` int(100) NOT NULL,
  `rating` int(100) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `major` varchar(50) DEFAULT NULL,
  `myself` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `image`, `email`, `birth_date`, `score`, `money`, `rating`, `grade`, `major`, `myself`) VALUES
(1, 'adasdas', 'asdasd', 'sss', 'asdasd', 'sss', 6, 0, 0, 'aa', 'asdasd', 'asdd');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_author` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `id_author`, `date`, `price`) VALUES
(9, '14556543_1191434594249991_226752925394074606_o.jpg', 1, '16 / 10 / 2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_playlist`
--

CREATE TABLE `video_playlist` (
  `id` int(11) NOT NULL,
  `id_playlist` varchar(30) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `price` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `flag_num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_playlist`
--

INSERT INTO `video_playlist` (`id`, `id_playlist`, `course_name`, `price`, `id_video`, `id_author`, `flag_num`) VALUES
(15, '58043b652e3cb', 'sss', 1, 6, 1, 1),
(16, '58043b652e3cb', 'sss', 0, 6, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture_playlist`
--
ALTER TABLE `picture_playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating` (`rating`);

--
-- Indexes for table `question_playlist`
--
ALTER TABLE `question_playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_playlist`
--
ALTER TABLE `video_playlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `picture_playlist`
--
ALTER TABLE `picture_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question_playlist`
--
ALTER TABLE `question_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `video_playlist`
--
ALTER TABLE `video_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
