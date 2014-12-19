-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `sample_site`;
CREATE DATABASE `sample_site` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sample_site`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_user_name` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='table for sample login';

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1,	'ravish',	'e10adc3949ba59abbe56e057f20f883e'),
(2,	'vivek',	'e10adc3949ba59abbe56e057f20f883e'),
(3,	'vikas',	'e10adc3949ba59abbe56e057f20f883e'),
(4,	'yukti',	'e10adc3949ba59abbe56e057f20f883e'),
(5,	'tapan',	'e10adc3949ba59abbe56e057f20f883e'),
(6,	'sayyed',	'e10adc3949ba59abbe56e057f20f883e'),
(7,	'puneet',	'e10adc3949ba59abbe56e057f20f883e');

-- 2014-12-19 17:16:35
