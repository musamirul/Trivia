-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2022 at 05:45 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer_rid`, `fk_answer_question_id`) VALUES
(2, 'sw6bm69134816720', 1),
(3, '9n1o236618954706', 2),
(4, '2fyp685268533477', 3),
(5, '10e2t38992976362', 4),
(6, 'fyz8p71803347261', 5),
(7, 'jr0pd13339822376', 6),
(8, 'bogkr51746852502', 7),
(9, 'yxznl43696214663', 8),
(10, '5hvmw39732272370', 9),
(11, 'xkrj793807443568', 10),
(12, 'cw96830919154611', 11),
(13, 'uzj5k54538141829', 12),
(14, '0z9tl85707221504', 13),
(15, '8m5vh15865168911', 14),
(16, 'ki3wa62030488575', 15),
(17, 'yxikh23022925300', 16),
(18, 'huqgz20598197933', 17),
(19, '0hjte87611864529', 18),
(20, 'umi3s75138300987', 19),
(21, 'qefv891015835192', 20);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `history_score`, `history_right`, `history_wrong`, `history_date`, `fk_history_user_id`, `fk_history_trivia_id`) VALUES
(9, 1, 1, 0, '2022-06-20 12:05:46am', 14, 2),
(10, 14, 14, 6, '2022-06-20 12:08:35am', 15, 2),
(11, 1, 1, 0, '2022-06-20 01:14:01am', 16, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `question_rid`, `option_list`, `fk_option_question_id`) VALUES
(1, 'sw6bm69134816720', 'fine', 1),
(2, 'sfo8h73708086697', 'not fine', 1),
(3, 'h7dpy99187049355', 'not well', 1),
(4, 'ranq852894193269', 'not very well', 1),
(5, '9n1o236618954706', 'ameirul', 2),
(6, 'fu93549819054608', 'ali', 2),
(7, 'p6c1y95108023588', 'abu', 2),
(8, 'fczxu45501268564', 'zuki', 2),
(9, '2fyp685268533477', '2012', 3),
(10, '6sdtr36039016187', '2016', 3),
(11, 'cst5e77580916805', '2011', 3),
(12, 'xy0gc9487216955', '2019', 3),
(13, '10e2t38992976362', 'waze', 4),
(14, '9t8hf60186640512', 'google', 4),
(15, 'szihn85273745330', 'maps', 4),
(16, '97j2b57878864689', 'paper', 4),
(17, 'fyz8p71803347261', 'yes', 5),
(18, 'rablm4741493364', 'no', 5),
(19, '2c6p887995970457', 'maybe', 5),
(20, 'szmg66113658479', 'not sure', 5),
(21, 'jr0pd13339822376', 'ameirul', 6),
(22, 'b0sqw9811162016', 'batman', 6),
(23, 'nzpso30404849835', 'ceo', 6),
(24, '9tqv471409815158', 'acep', 6),
(25, 'bogkr51746852502', '1991', 7),
(26, 'hcbxa70098000857', '2012', 7),
(27, '0fr1h55002570855', '2011', 7),
(28, 'hwclz96423267079', '1992', 7),
(29, 'yxznl43696214663', 'aidil', 8),
(30, '2zghn93951995578', 'ameirul', 8),
(31, '32em883998822133', 'mustaqim', 8),
(32, '4ixwq9865631403', 'anat', 8),
(33, '5hvmw39732272370', 'animal', 9),
(34, 'dfmxy69032739730', 'kucing', 9),
(35, 'fopd896319186982', 'anjir', 9),
(36, 'q7zdp11008555308', 'ayam', 9),
(37, 'xkrj793807443568', 'myvi', 10),
(38, '89cue28573919611', 'tesla', 10),
(39, 'abd7e26541406870', 'ford', 10),
(40, 'q923v58044017508', 'mevi', 10),
(41, 'cw96830919154611', 'ye', 11),
(42, '349v876858481653', 'yeee', 11),
(43, 'il52a90517855042', 'yeeeee', 11),
(44, 'vdyqs58016490492', 'yeeeeeee', 11),
(45, 'uzj5k54538141829', 'to', 12),
(46, 'sjm6216457247376', 'toooo', 12),
(47, 'i4dhs47151162396', 'toooooo', 12),
(48, '8n6mb7232576105', 'weeeeee', 12),
(49, '0z9tl85707221504', 'yes', 13),
(50, '54b7w2894326086', 'no', 13),
(51, 'xyu3c35072587952', 'maybe', 13),
(52, '1qedr53842999092', 'im not', 13),
(53, '8m5vh15865168911', 'physical media', 14),
(54, '07dko72382349230', 'vehicle', 14),
(55, 'j4rlk54417314362', 'vinyl', 14),
(56, '0agid96752538692', 'kaset', 14),
(57, 'ki3wa62030488575', 'cool', 15),
(58, 'c5pr463383051248', 'hot', 15),
(59, 'kt9cr58143772557', 'drown', 15),
(60, '4vium55577470246', 'saliva', 15),
(61, 'yxikh23022925300', 'one upon a time', 16),
(62, 'n5kwq7531100620', 'did you know', 16),
(63, '7d3q926242048505', 'how did', 16),
(64, 'halrq36653534477', 'hell yea', 16),
(65, 'huqgz20598197933', 'fine', 17),
(66, 'cvhlj70193240827', 'not fine', 17),
(67, 'yjns135081872303', 'file', 17),
(68, '5uo3725347834777', 'tank', 17),
(69, '0hjte87611864529', 'fantasy', 18),
(70, 'xg2qv61217698275', 'dun know', 18),
(71, 'rkpc160674801588', 'work', 18),
(72, 'j4dhp42381274126', 'balanc', 18),
(73, 'umi3s75138300987', 'yes', 19),
(74, 'njpvc89242576055', 'no', 19),
(75, 'egfco32702186317', 'maybe', 19),
(76, 'sb8my85570054114', 'not', 19),
(77, 'qefv891015835192', 'no', 20),
(78, 'lum0277926334636', 'yes', 20),
(79, 'ygbl21464746295', 'maybe', 20),
(80, '8axvr30790686664', 'nottt', 20);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(40) NOT NULL AUTO_INCREMENT,
  `question` varchar(40) NOT NULL,
  `question_choice` int(40) NOT NULL,
  `fk_question_trivia_id` int(40) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `question_choice`, `fk_question_trivia_id`) VALUES
(1, 'how are your', 4, 2),
(2, 'what your name', 4, 2),
(3, 'when is kpj build', 4, 2),
(4, 'how do you find kpj', 4, 2),
(5, 'is kpj large', 4, 2),
(6, 'who are you', 4, 2),
(7, 'when im born', 4, 2),
(8, 'whos kpj ceo', 4, 2),
(9, 'what is cat', 4, 2),
(10, 'what car im buyin', 4, 2),
(11, 'test', 4, 2),
(12, 'test2', 4, 2),
(13, 'are you man', 4, 2),
(14, 'what is cd', 4, 2),
(15, 'what is fan', 4, 2),
(16, 'tell me story', 4, 2),
(17, 'how do yo do', 4, 2),
(18, 'what is life', 4, 2),
(19, 'do you smoke', 4, 2),
(20, 'do you drink', 4, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trivia_type`
--

INSERT INTO `trivia_type` (`type_id`, `type_title`, `type_total`, `total_minute`, `type_date`, `type_priority`) VALUES
(2, 'test', 20, 20, '29-05-2022', 'yes'),
(5, 'anniversary', 20, 20, '12-06-2022', 'no');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_staffid`, `has_submit`) VALUES
(15, 'ameirul', '123456', 'yes'),
(14, 'ameirul', '123', 'yes'),
(16, 'ameirul', '1', 'yes'),
(17, 'hell', '12345678', 'no'),
(18, 'qq', '1234567890', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
