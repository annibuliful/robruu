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
-- Table structure for table `check_rating`
--

CREATE TABLE `check_rating` (
  `id_user` int(11) NOT NULL,
  `id_post` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `check_user`
--

CREATE TABLE `check_user` (
  `id_user` int(11) NOT NULL,
  `id_question` varchar(255) NOT NULL,
  `id_course` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_user`
--

INSERT INTO `check_user` (`id_user`, `id_question`, `id_course`) VALUES
(1, 'exam_5842a35f3e3dd', ''),
(1, 'exam_5842a1d4ae886', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_author` int(11) NOT NULL,
  `id_course` varchar(255) NOT NULL,
  `data` text,
  `draft` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_author`, `id_course`, `data`, `draft`) VALUES
(1, 'course_5841117e89d4a', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_playlist` varchar(30) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `description` text,
  `major` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `id_video` varchar(255) DEFAULT NULL,
  `id_author` int(11) NOT NULL,
  `flag_num` int(10) NOT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_playlist`, `course_name`, `description`, `major`, `price`, `id_video`, `id_author`, `flag_num`, `cover`) VALUES
('course_5841117e89d4a', 'เลขยกกำลัง', 'พื้นฐานเลขยกกำลัง', NULL, 10, '', 1, 1, 'cover_5841117e8a0b7.png'),
('course_584116b21c16a', 'ตรีโกณมิติ', 'ตรีโกณมิติพื้นฐาน', NULL, 50, '', 1, 1, 'cover_584116b21c4e9.png'),
('course_58411768b2632', 'แคลคูลัส', 'แคลคูสัล', NULL, 50, '', 1, 1, 'cover_58411768b2877.png'),
('course_584118fe24d10', 'ความน่าจะเป็น', 'ความน่าจะเป็น', NULL, 60, '', 1, 1, 'cover_584118fe25083.png');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `id_video` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `course_name`, `id_video`, `cover`) VALUES
(1, 1, 'course_5841117e89d4a', 'เลขยกกำลัง', '', 'cover_5841117e8a0b7.png'),
(2, 1, 'course_584116b21c16a', 'ตรีโกณมิติ', '', 'cover_584116b21c4e9.png'),
(3, 2, 'course_5841117e89d4a', 'เลขยกกำลัง', '', 'cover_5841117e8a0b7.png'),
(4, 2, 'course_58411768b2632', 'แคลคูลัส', '', 'cover_58411768b2877.png');

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
  `id` varchar(255) NOT NULL,
  `id_author` int(11) NOT NULL,
  `name` text NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `id_answer` varchar(11) NOT NULL,
  `id_playlist` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `id_author`, `name`, `answer1`, `answer2`, `answer3`, `answer4`, `score`, `id_answer`, `id_playlist`, `rating`) VALUES
('exam_5842a1d4ae886', 1, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', 'awdsa', 'awre', 'sxcs', 'awdsaw', 10, '1', 'course_5841117e89d4a', 0),
('exam_5842a35f3e3dd', 1, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', '2awd', 'sdwasdw', '3awds', 'rew2', 10, '1', 'course_5841117e89d4a', 0),
('exam_5842a37a53b45', 1, '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}ssss\\)</span></p>\r\n', 'awds', 'wwd', 'awr', 'swd', 10, '2', 'course_5841117e89d4a', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_post` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(60) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `score` int(100) NOT NULL,
  `money` int(100) NOT NULL,
  `rating` int(100) NOT NULL,
  `flag` int(1) NOT NULL,
  `payment_number` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `password`, `image`, `email`, `score`, `money`, `rating`, `flag`, `payment_number`) VALUES
(1, 'lagman', '123', '1', '$2y$10$ejN3fe4HAEbu.PF6/psU7O7VO5RUOH.sbyCnNm/JlYvilFH3O6k72', 'hs.png', '123', 171000080, 100, 0, 1, NULL),
(2, 'test sa', 'test', '1', '$2y$10$UN4a/7BBg2johbBdfgSkZe3YYJyFSEqtf0AYmnFgp1wtlhzQQv4VS', 'ลูกเต๋าความน่าจะเป็น.png', 'test@test.com', 40, 100, 0, 1, NULL),
(3, 'sdfdf', '123', '1', '$2y$10$JMYGuKJp9lN97AkyyNa57OR6hOTfcN/eKCbi1yahYPOGjOJvvmAqm', 'ลูกเต๋าความน่าจะเป็น.png', 'ssddee', 0, 100, 0, 1, NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `question_playlist`
--
ALTER TABLE `question_playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
