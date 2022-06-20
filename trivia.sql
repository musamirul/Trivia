-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2022 at 05:01 PM
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
-- Database: `trivia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

DROP TABLE IF EXISTS `admin_acc`;
CREATE TABLE IF NOT EXISTS `admin_acc` (
  `admin_acc` int(254) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_acc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_acc`, `admin_username`, `admin_password`) VALUES
(1, 'username', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(40) NOT NULL AUTO_INCREMENT,
  `answer_rid` varchar(254) NOT NULL,
  `fk_answer_question_id` int(40) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer_rid`, `fk_answer_question_id`) VALUES
(41, 'jm49u47622294603', 40),
(40, 'jxhwr10318301607', 39),
(39, '12ez992408792623', 38),
(38, '86ya333179709933', 37),
(37, 'wh72i77868494044', 36),
(36, '3yfxn5349426698', 35),
(35, 'bxefq4031956628', 34),
(34, '5iocs14096190003', 33),
(33, 'xnq2c4124790647', 32),
(32, 'dgr0x40399777724', 31),
(31, '8u1rz5361540652', 30),
(30, '5cknp79877530998', 29),
(29, '1zdvo62332293627', 28),
(28, 'bqtvf46588890904', 27),
(27, 'ryes115256890985', 26),
(26, '9fdib25402115357', 25),
(25, 'lpcyj44167947190', 24),
(24, 'oe3a650478959322', 23),
(23, 'lhyeu37117378946', 22),
(22, 'osa6m93922279510', 21),
(42, 'gwdup5423717206', 41),
(43, 'pa45k93413079971', 42),
(44, 'umf6g82828883643', 43);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `history_id` int(40) NOT NULL AUTO_INCREMENT,
  `history_score` int(40) NOT NULL,
  `history_right` int(40) NOT NULL,
  `history_wrong` int(40) NOT NULL,
  `history_date` varchar(40) NOT NULL,
  `fk_history_user_id` int(40) NOT NULL,
  `fk_history_trivia_id` int(40) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `history_score`, `history_right`, `history_wrong`, `history_date`, `fk_history_user_id`, `fk_history_trivia_id`) VALUES
(37, 8, 8, 12, '2022-06-21 12:46:23am', 43, 6),
(36, 1, 1, 19, '2022-06-21 12:44:18am', 42, 6);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int(40) NOT NULL AUTO_INCREMENT,
  `question_rid` varchar(254) NOT NULL,
  `option_list` varchar(254) NOT NULL,
  `fk_option_question_id` int(40) NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `question_rid`, `option_list`, `fk_option_question_id`) VALUES
(141, 'wh72i77868494044', 'physical device', 36),
(140, '281n741770128661', 'siti people', 35),
(139, 'i2u9f90433003680', 'seinin people', 35),
(138, '52zy358732273582', 'service people practive', 35),
(137, '3yfxn5349426698', 'self people practice', 35),
(136, '64adf32121408369', 'maybe', 34),
(135, 'f06hl46072964493', 'not sure', 34),
(134, 'vocnz42703963415', 'dun know', 34),
(133, 'bxefq4031956628', '4wife 1husband', 34),
(132, 'ae1xo34724015351', 'imagin', 33),
(131, 'jqedw83647464186', 'do nothing', 33),
(130, '78mti14056081195', 'sleep', 33),
(129, '5iocs14096190003', 'play game', 33),
(128, 'kn1rg82363618415', 'soto', 32),
(127, 'j15ei68091432125', 'bakkutteh', 32),
(126, '0ft983969141542', 'tomyam', 32),
(125, 'xnq2c4124790647', 'nasi kandar', 32),
(124, 'kwtoz82001412880', 'perlis', 31),
(123, 'l1ok81065092012', 'sabah', 31),
(122, '5dbou4651651819', 'johor', 31),
(121, 'dgr0x40399777724', 'selangor', 31),
(120, 'jopz915151111134', 'axia', 30),
(119, '8pbvu59651646714', 'bezza', 30),
(118, 'xh6jc40910527264', 'saga', 30),
(117, '8u1rz5361540652', 'myvi', 30),
(116, 'h23po27686785320', 'netflix', 29),
(115, '0ob4379244176334', 'watch movie', 29),
(114, 'v7wo989163896552', 'play game', 29),
(113, '5cknp79877530998', 'close ur eyes', 29),
(112, '9iu0x96156483828', 'abu', 28),
(111, '6doyx54695696004', 'ali', 28),
(110, 'n65bt94459557230', 'siti', 28),
(109, '1zdvo62332293627', 'ameirul', 28),
(108, 'x2oyg71947189117', 'when', 27),
(107, '2zo5458576808258', 'are u', 27),
(106, 'ybqes4612062511', 'do you know', 27),
(105, 'bqtvf46588890904', 'once upon a time', 27),
(104, 'sowaj12379701976', 'sungai jati', 26),
(103, 'lhpk414594544470', 'melaka', 26),
(102, '4ti6o11504008988', 'johor', 26),
(101, 'ryes115256890985', 'klang', 26),
(100, '4r8pt72105667634', 'ahmad', 25),
(99, 'gin5484197996373', 'abu', 25),
(98, 'tpjed33077304733', 'ali', 25),
(97, '9fdib25402115357', 'aidil', 25),
(96, '2mroc16183591775', 'yes', 24),
(95, 'iafoj29457876534', 'yes', 24),
(94, 'q7tgn33298799813', 'yes', 24),
(93, 'lpcyj44167947190', 'no', 24),
(92, 'h2t1z41626095218', 'no', 23),
(91, '9gsez47006817873', 'no', 23),
(90, 'h674d67394998647', 'no', 23),
(89, 'oe3a650478959322', 'yes', 23),
(88, '1rdpe87237690648', 'i,iv', 22),
(87, 'sd2o898023414204', 'iii,iv', 22),
(86, 'htkfe4943018464', 'i,ii', 22),
(85, 'lhyeu37117378946', 'ii,iii', 22),
(84, 'xf4gl20887344853', 'iii,iv', 21),
(83, 'f239j78409690073', 'iv,ii', 21),
(82, '8cmqd91996432649', 'i,iii', 21),
(81, 'osa6m93922279510', 'i,ii', 21),
(142, 'fug0q55632549489', 'kaset', 36),
(143, 'n0ais54139486786', 'vinyl', 36),
(144, 'rx2m576225327194', 'priing', 36),
(145, '86ya333179709933', 'money', 37),
(146, '5wbn778605167438', 'game', 37),
(147, 'tup5a67592802625', 'soltair', 37),
(148, 'w3nr958675504458', 'sushi', 37),
(149, '12ez992408792623', 'software', 38),
(150, 'xs37l68952748297', 'hardware', 38),
(151, '91lhb46127093440', 'machine', 38),
(152, '9h41r11526316161', 'robot', 38),
(153, 'jxhwr10318301607', '2012', 39),
(154, '92zhs5761231857', '2011', 39),
(155, '8wkod76803023344', '2019', 39),
(156, '9zqvr67418164566', '1881', 39),
(157, 'jm49u47622294603', 'win', 40),
(158, '0af6c10962099290', 'kill', 40),
(159, 'thowe5346052823', 'beef', 40),
(160, 'api4b72907310759', 'try', 40),
(161, 'gwdup5423717206', 'ceo', 41),
(162, '0hrmc93653645422', 'staff', 41),
(163, '2t71s11983905187', 'nurse', 41),
(164, 'khqrd59224216954', 'patient', 41),
(165, 'pa45k93413079971', '830', 42),
(166, 'mpxut13517658487', '10', 42),
(167, 'iyqnj25530402441', '11', 42),
(168, '28gjv82560019016', '12', 42),
(169, 'umf6g82828883643', '530', 43),
(170, 'y7juc86003958845', '2', 43),
(171, 's249z40509110874', '1', 43),
(172, 'n6o8z85782945576', '11', 43);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(40) NOT NULL AUTO_INCREMENT,
  `question_count` int(50) NOT NULL,
  `question` text NOT NULL,
  `question_choice` int(40) NOT NULL,
  `fk_question_trivia_id` int(40) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_count`, `question`, `question_choice`, `fk_question_trivia_id`) VALUES
(22, 2, '<p>Choose the correct answer for it support</p><p><!-- x-tinymce/html -->\r\n</p><ol style=\"list-style-type: lower-roman;\">\r\n<li>nurse</li>\r\n<li>printer</li>\r\n<li>network</li>\r\n<li>computer</li></ol>', 4, 6),
(21, 1, '<p>Choose the correct answer for quality document</p><p>\r\n</p><ul style=\"list-style-type: lower-roman;\">\r\n<li>Work Instructor</li>\r\n<li>Quality Objective</li>\r\n<li>memo</li>\r\n<li>minutes meating</li></ul>', 4, 6),
(23, 3, '<p>test</p>', 4, 6),
(24, 4, '<p>test2</p>', 4, 6),
(25, 5, '<p>what is ceo name</p>', 4, 6),
(26, 6, '<p>wheres kpj</p>', 4, 6),
(27, 7, '<p>how to start a story</p>', 4, 6),
(28, 8, 'who work at it', 4, 6),
(29, 9, '<p>how to sleep</p>', 4, 6),
(30, 10, '<p>whats is the best car</p>', 4, 6),
(31, 11, '<p>where is klang</p>', 4, 6),
(32, 12, '<p>what is best food</p>', 4, 6),
(33, 13, '<p>how to kill time</p>', 4, 6),
(34, 14, '<p>what is 4w1h</p>', 4, 6),
(35, 15, '<p>what is spp</p>', 4, 6),
(36, 16, 'what is cd', 4, 6),
(37, 17, '<p>what is time</p>', 4, 6),
(38, 18, '<p>what is program</p>', 4, 6),
(39, 19, '<p>when kpj build</p>', 4, 6),
(40, 20, '<p>what is the best story</p>', 4, 6),
(41, 21, '<p>who is en aidil</p>', 4, 6),
(42, 22, '<p>when you come to work</p>', 4, 6),
(43, 23, '<p>when you go home</p>', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `trivia_type`
--

DROP TABLE IF EXISTS `trivia_type`;
CREATE TABLE IF NOT EXISTS `trivia_type` (
  `type_id` int(40) NOT NULL AUTO_INCREMENT,
  `type_title` varchar(254) NOT NULL,
  `type_total` int(40) NOT NULL,
  `total_minute` int(40) NOT NULL,
  `type_date` varchar(40) NOT NULL,
  `type_priority` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trivia_type`
--

INSERT INTO `trivia_type` (`type_id`, `type_title`, `type_total`, `total_minute`, `type_date`, `type_priority`) VALUES
(6, 'anniversary', 20, 10, '20-06-2022', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(40) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `user_staffid` varchar(40) NOT NULL,
  `has_submit` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_staffid`, `has_submit`) VALUES
(43, 'test', '11111', 'yes'),
(42, 'test', '123', 'yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
