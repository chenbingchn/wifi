/*
Navicat MySQL Data Transfer

Source Server         : local_enmonet
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : wifi

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-09-15 14:40:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `integral_category`
-- ----------------------------
DROP TABLE IF EXISTS `integral_category`;
CREATE TABLE `integral_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

alter table `integral` add `cat_id` int(11) not Null;

alter table `integral` add `use` varchar(2000) ;
alter table `integral` add `tips` varchar(2000) ;

alter table `integral` add `useyn` varchar(2000) ;
alter table `integral` add `tipsyn` varchar(2000) ;


