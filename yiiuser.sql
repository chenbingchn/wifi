-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-10-09 13:05:57
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yiiuser`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `root` int(10) unsigned zerofill DEFAULT '0000000000',
  `authKey` varchar(20) DEFAULT ' ',
  `accessToken` varchar(20) DEFAULT ' ',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `user` (`username`,`email`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `root`, `authKey`, `accessToken`) VALUES
(4, 'zhudehou', 'zhudehou@enmonet.com', '1cd9e31e84b47028b5b66e961e9a9ad8', 0000000000, ' ', ' '),
(5, '450459997', '450459997@sina.com', '36e1a5072c78359066ed7715f5ff3da8', 0000000000, ' ', ' '),
(9, 'linlitao', 'linlitao@enmonet.com', 'f52be78ff6982559c690d90bf4731dbd', 0000000000, ' ', ' '),
(10, 'wuzhengyi', 'wuzhengyi@enmonet.com', '4e95a23a4a26d4327f15433b94f91655', 0000000000, ' ', ' '),
(11, 'chenbing', 'chenbing@enjoymobile.com', '09880a733f7e20a7d99a5e028f0838a1', 0000000000, ' ', ' ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
