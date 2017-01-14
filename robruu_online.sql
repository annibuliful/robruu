-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2017 at 07:50 AM
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
  `id_course` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `check_user`
--

INSERT INTO `check_user` (`id_user`, `id_question`, `id_course`, `score`) VALUES
(1, 'question_585253be37c8b', 'course_5841117e89d4a', 30);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_post` varchar(255) NOT NULL,
  `id_N` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_post`, `id_N`, `comment`, `id_user`, `name`, `image`, `flag`) VALUES
('course_5841117e89d4a', 1, 'ssss', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 2, '123', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 3, '777', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 4, 'ssss', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 5, 'course_5841117e89d4a', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 6, 'course_5841117e89d4a', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 7, 'comment', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 8, 'comment', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 9, 'comment', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 10, 'ssss', 1, '123', 'hs.png', 1),
('course_5841117e89d4a', 11, 'ฟไกหฟไหห', 1, '123', 'hs.png', 1);

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
(1, 'course_5841117e89d4a', '<h1>เลขยกกำลัง</h1>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; คือ การคูณตัวเลขนั้นๆตามจำนวนของเลขชี้กำลัง ซึ่งตัวเลขนั้นๆจะคูณตัวของมันเองและเมื่อแทน a เป็นจำนวนใด ๆ และแทน n เป็นจำนวนเต็มบวก โดยที่มี a เป็นฐานหรือตัวเลข และ n เป็นเลขชี้กำลัง(an) จะได้ว่า a คูณกัน n ตัว (axaxaxaxax&hellip;xa)<br />\r\n&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;ตัวอย่าง<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 25&nbsp;เป็นเลขยกกำลัง ที่มี 2 เป็นฐานหรือตัวเลข และมี 5 เป็นเลขชี้กำลัง<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; และ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 25&nbsp;&nbsp; = 2x2x2x2x2&nbsp; = 32</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>สมบัติของเลขยกกำลัง&nbsp;&nbsp;&nbsp;&nbsp;</h1>\r\n\r\n<p>1. สมบัติการคูณเลขยกกำลังที่มีเลขชี้กำลังเป็นจำนวนเต็มบวก เมื่อ a เป็นจำนวนใด ๆ และ m, n เป็นจำนวนเต็มบวก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://phakhanun.files.wordpress.com/2010/09/63.gif"><img alt="" src="https://phakhanun.files.wordpress.com/2010/09/63.gif?w=490" /></a></p>\r\n\r\n<p>เช่น &nbsp;&nbsp;&nbsp;&nbsp;23x 27x 29&nbsp;= 2&nbsp;(3 + 7 + 9)&nbsp;= 219</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. สมบัติการหารเลขยกกำลังที่มีเลขชี้กำลังเป็นจำนวนเต็มบวก</p>\r\n\r\n<p>กรณีที่ 1 เมื่อ a เป็นจำนวนจริงใดๆที่ไม่ใช่ศูนย์ และ m, n เป็นจำนวนเต็มบวกที่ m &gt; n&nbsp;</p>\r\n\r\n<p><a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e4.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e4.jpg?w=214&amp;h=78" style="height:78px; width:214px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>เช่น&nbsp;&nbsp;&nbsp; &nbsp;412&divide; 43=412-3&nbsp;&nbsp;= 49</p>\r\n\r\n<p>กรณีที่ 2&nbsp;เมื่อ a เป็นจำนวนจริงใดๆที่ไม่ใช่ศูนย์ และ m, nเป็นจำนวนเต็มบวกที่ m = n</p>\r\n\r\n<p>&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e5.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e5.jpg?w=226&amp;h=79" style="height:79px; width:226px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>นิยาม&nbsp;ถ้า a เป็นจำนวนจริงใดๆ ที่ไม่ใช่ศูนย์ a0&nbsp;= 1</p>\r\n\r\n<p>&nbsp;เช่น&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;67&divide; 67&nbsp;= 67-7&nbsp;= 60&nbsp;&nbsp;= 1&nbsp; หรือถ้า (-7)o&nbsp;= 1</p>\r\n\r\n<p>&nbsp;กรณีที่ 3เมื่อ&nbsp;a เป็นจำนวนจริงใดๆที่ไม่ใช่ศูนย์ และ m, n เป็นจำนวนเต็มบวกที่ m &lt; n&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e42-e1283348285121.png?w=153&amp;h=61" style="height:61px; width:153px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>เช่น&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e63.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e63.png?w=32&amp;h=63" style="height:63px; width:32px" /></a>&nbsp;&nbsp;=&nbsp;&nbsp;1/&nbsp;54-9</p>\r\n\r\n<p>นิยาม&nbsp;ถ้า a เป็นจำนวนจริงใดๆ ที่ไม่ใช่ศูนย์ และ n เป็นจำนวนเต็มบวก แล้ว</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e8.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e8.png?w=110&amp;h=73" style="height:73px; width:110px" /></a>&nbsp;&nbsp;&nbsp; หรือ&nbsp;&nbsp; &nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e15.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e15.png?w=122&amp;h=74" style="height:74px; width:122px" /></a></p>\r\n\r\n<p>&nbsp; เช่น&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e7.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e7.jpg?w=106&amp;h=71" style="height:71px; width:106px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หรือ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e8.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e8.jpg?w=148&amp;h=71" style="height:71px; width:148px" /></a></p>\r\n\r\n<p>3.สมบัติอื่นๆของเลขยกกำลัง&nbsp;&nbsp;</p>\r\n\r\n<p>1. เลขยกกำลังที่มีฐานเป็นเลขยกกำลัง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e18.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e18.png?w=109&amp;h=41" style="height:41px; width:109px" /></a>&nbsp;เมื่อ a &ge;0 และ m, n เป็นจำนวนเต็ม</p>\r\n\r\n<p>เช่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e9.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e9.jpg?w=150&amp;h=35" style="height:35px; width:150px" /></a></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e10.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e10.jpg?w=150&amp;h=33" style="height:33px; width:150px" /></a></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e11.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e11.jpg?w=150&amp;h=32" style="height:32px; width:150px" /></a>&nbsp;</p>\r\n\r\n<p>2. เลขยกกำลังที่มีฐานอยู่ในรูปการคูณ หรือการหารของจำนวนหลาย ๆจำนวน</p>\r\n\r\n<p>&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/1.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/1.png?w=130&amp;h=39" style="height:39px; width:130px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;และ&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/2.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/2.png?w=105&amp;h=61" style="height:61px; width:105px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เมื่อ a &ne; 0 , b &ne; 0 และ n เป็นจำนวนเต็ม</p>\r\n\r\n<p>เช่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e12.jpg"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e12.jpg?w=150&amp;h=42" style="height:42px; width:150px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>3.&nbsp;เลขยกกำลังที่มีเลขชี้กำลังเป็นเศษส่วน</p>\r\n\r\n<p><a href="http://kwangkwang.files.wordpress.com/2010/09/6.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/6.png?w=88&amp;h=49" style="height:49px; width:88px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เมื่อ a &gt; 0 และ n เป็นจำนวนเต็มบวกที่มากกว่า 1</p>\r\n\r\n<p><a href="http://kwangkwang.files.wordpress.com/2010/09/7.png"><img alt="" src="https://kwangkwang.files.wordpress.com/2010/09/7.png?w=112&amp;h=52" style="height:52px; width:112px" /></a>เมื่อ a &ne; 0 และ m เป็นจำนวนเต็มบวก ; n &ge; 2</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>การใช้เลขยกกำลังแทนจำนวน</h1>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; การเขียนจำนวนที่มีค่ามากๆนิยมเขียนแทนได้ด้วยรูป Ax10nเมื่อ 1&le;A&lt;10 และ n เป็นจำนวนเต็มบวก เช่น 16,000,000 = 1.6&times;107&nbsp;และทำนองเดียวกันการเขียนจำนวนเต็มที่มีค่าน้อยๆก็สามารถเขียนในรูป Ax10n&nbsp;ได้เช่นเดียวกัน&nbsp; แต่ n จะเป็นจำนวนเต็มลบ เช่น 0.000016 = 1.6&times;10-5</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หลักการเปลี่ยนจำนวนให้อยู่ในรูป Ax10n&nbsp;เมื่อ 1&le;A&lt;10 และ n เป็นจำนวนเต็มอย่างง่ายๆ คือให้พิจารณาว่าจุดทศนิยมมีการเลื่อนตำแหน่งไปทางซ้ายหรือขวากี่ตำแหน่ง ถ้าเลื่อนไปทางซ้ายเลขชี้กำลังจะเป็นบวก และถ้าเลื่อนไปทางขวาเลขชี้กำลังก็จะเป็นลบ</p>\r\n\r\n<p>เช่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 75000.0=7.5&times;104&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;0.000075 = 7.5&times;10-5</p>\r\n\r\n<p>หรือกล่าวได้ว่า ถ้าจุดทศนิยมเลื่อนไปทางขวา n ตำแหน่ง เลขชี้กำลังของ 10 จะลดลง n ถ้าจุดทศนิยมเลื่อนไปทางซ้าย n ตำแหน่ง เลขชี้กำลังของ10 จะเพิ่มขึ้น n</p>\r\n\r\n<h1>&nbsp;</h1>\r\n\r\n<h1>สรุป</h1>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขยกกำลังเป็นการคูณตัวเลขนั้นๆตามจำนวนของเลขชี้กำลัง ซึ่งตัวเลขนั้นๆจะคูณตัวของมันเองและเมื่อแทน a เป็นจำนวนใด ๆ และแทน n เป็นจำนวนเต็มบวก โดยที่มี a เป็นฐานหรือตัวเลข และ n เป็นเลขชี้กำลัง(an) หรือจะได้ว่า a คูณกัน n ตัว (axaxaxaxax&hellip;xa) อีกทั้งวิธีการคำนวณหาค่าเลขยกกำลังจะขึ้นอยู่กับสมบัติของเลขยกกำลังในแต่ละประเภทด้วย</p>\r\n\r\n<h1>การบวกเลขยกกำลัง</h1>\r\n\r\n<p>1.การบวกลบเลขยกกำลังที่มีฐานเหมือนกันและเลขยกกำลังเท่ากัน ให้นำสัมประสิทธิ์ของเลขยกกำลังมาบวกลบกัน</p>\r\n\r\n<p>ตัวอย่าง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://phakhanun.files.wordpress.com/2010/09/aa1.jpg"><img alt="" src="https://phakhanun.files.wordpress.com/2010/09/aa1.jpg?w=490&amp;h=56" style="height:56px; width:490px" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>2.การบวกลบเลขยกกำลังที่มีฐานเท่ากัน&nbsp; แต่เลขยกกำลังไม่เท่ากันจะนำสัมประสิทธิ์มาบวกลบกันไม่ได้&nbsp; ต้องทำในรูปของการแยกตัวประกอบ และดึงตัวประกอบร่วมออก</p>\r\n\r\n<p>ตัวอย่าง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://phakhanun.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e3111.png"><img alt="" src="https://phakhanun.files.wordpress.com/2010/09/e0b8a3e0b8b9e0b89be0b8a0e0b8b2e0b89e3111.png?w=490" /></a>&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>หมายเหตุ&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (-2)4&nbsp;และ -24&nbsp;มีค่าไม่เท่ากันเพราะ&nbsp; (-2)4&nbsp;ฐานคือ&nbsp; (-2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>เลขชี้กำลังคือ 4 อ่านว่าลบสองทั้งหมดยกกำลังสี่มีค่าเท่ากับ 16</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;-24&nbsp;&nbsp;ฐานคือ 2 เลขชี้กำลังคือ 4 อ่านว่าลบของสองกำลังสี่มีค่าเท่ากับ&nbsp; -16</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ทดสอบการเปลี่ยนแปลง</p>\r\n', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_playlist` varchar(30) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `description` text,
  `major` varchar(11) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `id_video` varchar(255) DEFAULT NULL,
  `id_author` int(11) NOT NULL,
  `flag_num` int(10) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `preview` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_playlist`, `course_name`, `description`, `major`, `price`, `id_video`, `id_author`, `flag_num`, `cover`, `preview`) VALUES
('course_5841117e89d4a', 'เลขยกกำลัง', 'พื้นฐานเลขยกกำลัง', NULL, 10, '', 1, 1, 'cover_5841117e8a0b7.png', 0),
('course_584116b21c16a', 'ตรีโกณมิติ', 'ตรีโกณมิติพื้นฐาน', NULL, 50, 'sssss', 1, 1, 'cover_584116b21c4e9.png', 1),
('course_58411768b2632', 'แคลคูลัส', 'แคลคูสัล', NULL, 50, 'wsww', 1, 1, 'cover_58411768b2877.png', 1),
('course_584118fe24d10', 'ความน่าจะเป็น', 'ความน่าจะเป็น', NULL, 60, '', 1, 1, 'cover_584118fe25083.png', 0),
('course_5852367a04d99', 'โลกและดาราศาสตร์', 'เนื้อหาในส่วนนี้ จัดทำเพื่อทดลองหน้าเว็บรอบรู้', NULL, 100, '', 1, 1, 'cover_5852367a05304.png', 0),
('course_5841117e89d4a', 'เลขยกกำลัง', 'พื้นฐานเลขยกกำลัง', NULL, 10, 'video_58525c3cb95dc.mp4', 1, 2, NULL, 1),
('course_58558a3a52446', 'อังกฤษ', 'สอน present simple ', 'eng', 20, '', 1, 1, 'cover_58558a3a5584b.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_video` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `major` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `course_name`, `description`, `id_video`, `cover`, `major`) VALUES
(9, 1, 'course_5841117e89d4a', 'เลขยกกำลัง', 'พื้นฐานเลขยกกำลัง', '', 'cover_5841117e8a0b7.png', 'math'),
(10, 1, 'course_58411768b2632', 'แคลคูลัส', 'แคลคูสัล', '', 'cover_58411768b2877.png', NULL),
(11, 1, 'course_58558a3a52446', 'อังกฤษ', 'สอน present simple ', '', 'cover_58558a3a5584b.png', 'eng'),
(12, 12, 'course_5841117e89d4a', 'เลขยกกำลัง', 'พื้นฐานเลขยกกำลัง', '', 'cover_5841117e8a0b7.png', NULL);

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
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_course` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id_course`, `data`, `id_author`) VALUES
('course_5841117e89d4a', '<p>อ่อเลขยกกลังเป็นอย่างงนี้นี้เอง</p>\n\n<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span>fgjjjjj</p>\n', 1);

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
-- Table structure for table `qanda`
--

CREATE TABLE `qanda` (
  `id_playlist` varchar(255) NOT NULL,
  `id_N` int(11) NOT NULL,
  `comment_N` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `head` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qanda`
--

INSERT INTO `qanda` (`id_playlist`, `id_N`, `comment_N`, `id_user`, `head`, `comment`, `name`, `image`) VALUES
('course_5841117e89d4a', 1, 0, 1, 'ไม่เข้าใจสูตรนี้ครับ ว่ามันมาได้ยังไง', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n\r\n<p>มันมาได้ยังไงแล้วใครเป็นคนสร้าง</p>\r\n', '123', 'hs.png'),
('course_5841117e89d4a', 2, 0, 1, 'จริงป๊ะจ๊ะ', '<p><span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a^2}\\)</span></p>\r\n', '123', 'hs.png'),
('course_5841117e89d4a', 2, 2, 1, 'จริงป๊ะจ๊ะ', '<p>ก็เป็นตามนั้นอ่ะนะ</p>\r\n', '123', 'hs.png'),
('course_5841117e89d4a', 1, 2, 1, 'ไม่เข้าใจสูตรนี้ครับ ว่ามันมาได้ยังไง', '<p>test<span class="math-tex">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', '123', 'hs.png'),
('course_5841117e89d4a', 5, 0, 1, 'ใช้ไปทำไม', '<p>ผมเรียนแคลคูลัสไปทำไมครับ</p>\r\n', '123', 'hs.png'),
('course_5841117e89d4a', 5, 2, 1, 'ใช้ไปทำไม', '<p>tttt</p>\r\n', '123', 'hs.png');

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
('exam_585253696abc5', 1, '<p><span class="math-tex">\\((4^2)(4^5) \\)</span>&nbsp;&nbsp;มีค่าเท่ากับเท่าไหร่</p>\r\n', '16384', '16383', '16382', '16381', 10, '1', 'course_5841117e89d4a', 0),
('question_585253be37c8b', 1, '<p><span class="math-tex">\\((5^2) +25 \r\n\\)</span>&nbsp;เท่ากับเท่าไหร่</p>\r\n', '60', '50', '70', '85', 30, '2', 'course_5841117e89d4a', 0);

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
(1, 'lagman', '123', '1', '$2y$10$ejN3fe4HAEbu.PF6/psU7O7VO5RUOH.sbyCnNm/JlYvilFH3O6k72', 'hs.png', '123', 171000640, 100, 0, 1, NULL),
(2, 'test sa', 'test', '1', '$2y$10$UN4a/7BBg2johbBdfgSkZe3YYJyFSEqtf0AYmnFgp1wtlhzQQv4VS', 'ลูกเต๋าความน่าจะเป็น.png', 'test@test.com', 40, 100, 0, 1, NULL),
(3, 'sdfdf', '123', '1', '$2y$10$JMYGuKJp9lN97AkyyNa57OR6hOTfcN/eKCbi1yahYPOGjOJvvmAqm', 'ลูกเต๋าความน่าจะเป็น.png', 'ssddee', 0, 100, 0, 1, NULL),
(6, '789', '789', '1', '$2y$10$/I7DTvClcDttugMaaT.Am.n73LhRQlFUdI6b8NEv/IS8C7NbUKlqG', '2.PNG', '789', 0, 100, 0, 1, NULL),
(7, 'IAMbear', 'iambear', '1', '$2y$10$WESEtotUAUtTB.duYBCZOuMbRwUx8HSdiRhEyi2rqLMWDaek.GmcW', '', 'mhee.sirilak@gmail.com', 0, 100, 0, 1, NULL),
(8, 'test', '444', '1', '$2y$10$FeMROYHJ.3v5AUQZOBQKKu2LnTTJr1oBOkd/43FGc0nY6CqM9X4Pa', '1.PNG', 'www@gmail.com', 100, 0, 0, 1, NULL),
(9, 'IAMbear1', '444', '1', '$2y$10$4o1T3bjjHmMRqh6l5txAxOdcv8IbCU1c8/1JrsNvBKvTBM72NTYsa', 'wwwww.PNG', 'noo_chompooh@hotmail.com', 100, 0, 0, 1, NULL),
(10, 'eeee', '444', '1', '$2y$10$rZoJ7K7URgiRKle6akn4suTcNg20mgcpqyPGZBUesWYo25kGahFKa', '15541936_1709427592704368_7531396315406128338_n.jpg', '345@gmail.com', 100, 0, 0, 1, NULL),
(12, '777', 'สวัสดีจร้า', '1', '$2y$10$g6XEdWvllGskLAu4urROluvWep3u4i4cDDzwP2HEj.UuVkBpNaGUG', 'Capture.PNG', '777@gmail.ccc', 90, 0, 0, 1, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
