-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-10-09 09:09:44
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wifi`
--

-- --------------------------------------------------------

--
-- 表的结构 `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `mobile` varchar(11) NOT NULL COMMENT '手机号码',
  `award_type` int(2) NOT NULL COMMENT '中奖类型代码',
  `award_type_en` varchar(50) NOT NULL COMMENT '中奖类型（英文）',
  `award_type_id` varchar(50) NOT NULL COMMENT '中奖类型（印尼语）',
  `award_type_zh` varchar(50) NOT NULL COMMENT '中奖类型（中文）',
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `award`
--

INSERT INTO `award` (`id`, `mobile`, `award_type`, `award_type_en`, `award_type_id`, `award_type_zh`) VALUES
(1, '15210566362', 1, 'Daily Luck', 'Keuntungan Harian', '好运每一天'),
(3, '18611736750', 2, 'Daily Prize', 'Hadiah Harian', '天天送好礼'),
(4, '18513852359', 3, 'Amazing Gift', 'Hadiah Utama', '劲爆超值大奖');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
