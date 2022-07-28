/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80023
 Source Host           : localhost:3306
 Source Schema         : homework

 Target Server Type    : MySQL
 Target Server Version : 80023
 File Encoding         : 65001

 Date: 26/05/2022 23:31:33
*/
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 替换视图以便查看 `allbook`
--
CREATE TABLE IF NOT EXISTS `allbook` (
`bookId` int(11)
,`bookName` varchar(40)
,`Floor` smallint(6)
,`Number` smallint(6)
);
-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bookId` int(11) NOT NULL,
  `bookName` varchar(40) default NULL,
  PRIMARY KEY  (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`bookId`, `bookName`) VALUES
(1, 'Machine Learning'),
(2, 'Deep Learning'),
(3, 'Reinforcement Learning'),
(4, 'PyTorch Learning'),
(5, 'Tensorflow Learning'),
(6, 'DataBase Learning'),
(7, 'BigAata Learning'),
(8, 'Recommand System');

-- --------------------------------------------------------

--
-- 表的结构 `borrowstu`
--

CREATE TABLE IF NOT EXISTS `borrowstu` (
  `bookId` int(11) NOT NULL default '0',
  `Department` varchar(20) NOT NULL default '',
  `stuId` int(11) NOT NULL default '0',
  PRIMARY KEY  (`bookId`,`Department`,`stuId`),
  KEY `Department` (`Department`),
  KEY `stuId` (`stuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `borrowstu`
--

INSERT INTO `borrowstu` (`bookId`, `Department`, `stuId`) VALUES
(1, 'cs', 1),
(2, 'ai', 2),
(3, 'cs', 3);

--
-- 触发器 `borrowstu`
--
DROP TRIGGER IF EXISTS `insert_stu_book`;
DELIMITER //
CREATE TRIGGER `insert_stu_book` AFTER INSERT ON `borrowstu`
 FOR EACH ROW begin
insert into info_detail values('Borrowed');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `borrowtea`
--

CREATE TABLE IF NOT EXISTS `borrowtea` (
  `bookId` int(11) NOT NULL default '0',
  `Department` varchar(20) NOT NULL default '',
  `teaId` int(11) NOT NULL default '0',
  PRIMARY KEY  (`bookId`,`Department`,`teaId`),
  KEY `Department` (`Department`),
  KEY `teaId` (`teaId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `borrowtea`
--


-- --------------------------------------------------------

--
-- 表的结构 `info_detail`
--

CREATE TABLE IF NOT EXISTS `info_detail` (
  `borrow_history` varchar(30) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `info_detail`
--

INSERT INTO `info_detail` (`borrow_history`) VALUES
('Borrowed'),
('Borrowed'),
('Borrowed');

-- --------------------------------------------------------

--
-- 表的结构 `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `Floor` smallint(6) default NULL,
  `Number` smallint(6) default NULL,
  `manId` int(11) default NULL,
  KEY `Floor` (`Floor`,`Number`),
  KEY `manId` (`manId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `manage`
--

INSERT INTO `manage` (`Floor`, `Number`, `manId`) VALUES
(2, 2, 2),
(3, 2, 2),
(3, 1, 1),
(1, 2, 2),
(2, 1, 1),
(1, 3, 1),
(3, 3, 1),
(1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manName` varchar(10) default NULL,
  `manId` int(11) NOT NULL,
  PRIMARY KEY  (`manId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`manName`, `manId`) VALUES
('mananger1', 1),
('mananger2', 2);

-- --------------------------------------------------------

--
-- 表的结构 `reader`
--

CREATE TABLE IF NOT EXISTS `reader` (
  `Department` varchar(20) NOT NULL,
  PRIMARY KEY  (`Department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `reader`
--

INSERT INTO `reader` (`Department`) VALUES
('ai'),
('cs');

-- --------------------------------------------------------

--
-- 表的结构 `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `Floor` smallint(6) NOT NULL default '0',
  `Number` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`Floor`,`Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `room`
--

INSERT INTO `room` (`Floor`, `Number`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
  `bookId` int(11) NOT NULL default '0',
  `Floor` smallint(6) NOT NULL default '0',
  `Number` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`bookId`,`Floor`,`Number`),
  KEY `Floor` (`Floor`,`Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `storage`
--

INSERT INTO `storage` (`bookId`, `Floor`, `Number`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 3, 1),
(5, 1, 2),
(6, 2, 1),
(7, 3, 3),
(8, 1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stuId` int(11) NOT NULL default '0',
  `stuName` varchar(10) default NULL,
  `Department` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`stuId`,`Department`),
  KEY `Department` (`Department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`stuId`, `stuName`, `Department`) VALUES
(1, 'stu1', 'cs'),
(2, 'stu2', 'ai'),
(3, 'stu3', 'cs'),
(4, 'stu4', 'ai');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teaId` int(11) NOT NULL default '0',
  `teaName` varchar(10) default NULL,
  `Department` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`teaId`,`Department`),
  KEY `Department` (`Department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`teaId`, `teaName`, `Department`) VALUES
(1, 'tea1', 'cs'),
(2, 'tea2', 'ai');

-- --------------------------------------------------------

--
-- 视图结构 `allbook`
--
DROP TABLE IF EXISTS `allbook`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allbook` AS select `book`.`bookId` AS `bookId`,`book`.`bookName` AS `bookName`,`storage`.`Floor` AS `Floor`,`storage`.`Number` AS `Number` from (`book` join `storage`) where (`book`.`bookId` = `storage`.`bookId`);

--
-- 限制导出的表
--

--
-- 限制表 `borrowstu`
--
ALTER TABLE `borrowstu`
  ADD CONSTRAINT `borrowstu_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`),
  ADD CONSTRAINT `borrowstu_ibfk_2` FOREIGN KEY (`Department`) REFERENCES `reader` (`Department`),
  ADD CONSTRAINT `borrowstu_ibfk_3` FOREIGN KEY (`stuId`) REFERENCES `student` (`stuId`);

--
-- 限制表 `borrowtea`
--
ALTER TABLE `borrowtea`
  ADD CONSTRAINT `borrowtea_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`),
  ADD CONSTRAINT `borrowtea_ibfk_2` FOREIGN KEY (`Department`) REFERENCES `reader` (`Department`),
  ADD CONSTRAINT `borrowtea_ibfk_3` FOREIGN KEY (`teaId`) REFERENCES `teacher` (`teaId`);

--
-- 限制表 `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`Floor`, `Number`) REFERENCES `room` (`Floor`, `Number`),
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`manId`) REFERENCES `manager` (`manId`);

--
-- 限制表 `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`),
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`Floor`, `Number`) REFERENCES `room` (`Floor`, `Number`);

--
-- 限制表 `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `reader` (`Department`);

--
-- 限制表 `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `reader` (`Department`);
