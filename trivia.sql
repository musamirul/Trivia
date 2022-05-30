-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2022 at 03:17 PM
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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(40) NOT NULL AUTO_INCREMENT,
  `answer_rid` varchar(254) NOT NULL,
  `fk_answer_question_id` int(40) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(11, 'xkrj793807443568', 10);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `history_score`, `history_right`, `history_wrong`, `history_date`, `fk_history_user_id`, `fk_history_trivia_id`) VALUES
(1, 5, 5, 5, '2022-05-30 10:24:41pm', 1, 2),
(2, 4, 4, 6, '2022-05-30 10:26:27pm', 2, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
(40, 'q923v58044017508', 'mevi', 10);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(10, 'what car im buyin', 4, 2);

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
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trivia_type`
--

INSERT INTO `trivia_type` (`type_id`, `type_title`, `type_total`, `total_minute`, `type_date`) VALUES
(2, 'test', 20, 20, '29-05-2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(40) NOT NULL AUTO_INCREMENT,
  `user_ic` varchar(40) NOT NULL,
  `user_staffid` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_ic`, `user_staffid`) VALUES
(1, '910630105599', '2016670'),
(2, '910630105591', '2016671');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
