/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost
 Source Database       : myblog7

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : utf-8

 Date: 01/12/2018 08:46:14 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_article`
-- ----------------------------
DROP TABLE IF EXISTS `t_article`;
CREATE TABLE `t_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `clicked` int(11) DEFAULT '0',
  PRIMARY KEY (`article_id`),
  KEY `user_article_fk` (`user_id`),
  KEY `article_type_article_fk` (`type_id`),
  CONSTRAINT `article_type_article_fk` FOREIGN KEY (`type_id`) REFERENCES `t_article_type` (`type_id`),
  CONSTRAINT `user_article_fk` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_article_type`
-- ----------------------------
DROP TABLE IF EXISTS `t_article_type`;
CREATE TABLE `t_article_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`type_id`),
  KEY `user_article_type_fk` (`user_id`),
  CONSTRAINT `user_article_type_fk` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE `t_comment` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `article_comment_fk` (`article_id`),
  KEY `user_comment_fk` (`user_id`),
  CONSTRAINT `article_comment_fk` FOREIGN KEY (`article_id`) REFERENCES `t_article` (`article_id`),
  CONSTRAINT `user_comment_fk` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_message`
-- ----------------------------
DROP TABLE IF EXISTS `t_message`;
CREATE TABLE `t_message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `user_message_send_fk` (`sender`),
  KEY `user_message_receive_fk` (`receiver`),
  CONSTRAINT `user_message_receive_fk` FOREIGN KEY (`receiver`) REFERENCES `t_user` (`user_id`),
  CONSTRAINT `user_message_send_fk` FOREIGN KEY (`sender`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mood` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_uk` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
