-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 03 月 12 日 02:28
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `qqnotic`
--

-- --------------------------------------------------------

--
-- 表的结构 `btype`
--

CREATE TABLE IF NOT EXISTS `btype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `btype`
--

INSERT INTO `btype` (`id`, `type`, `content`) VALUES
(1, '（业务流程）审批通知提醒', '目前有一项业务急需您的审批，请尽快处理！'),
(2, '（业务流程）执行通知提醒', '目前有一项业务急需您的执行。请尽快处理！');

-- --------------------------------------------------------

--
-- 表的结构 `qqname`
--

CREATE TABLE IF NOT EXISTS `qqname` (
  `id` int(11) NOT NULL,
  `qqnum` int(11) NOT NULL,
  `qqname` varchar(30) NOT NULL,
  `realname` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `qqname`
--

INSERT INTO `qqname` (`id`, `qqnum`, `qqname`, `realname`) VALUES
(1, 36927999, 'hz1234', '黄振'),
(2, 279810072, 'Wanna with You', '测试用户'),
(3, 245840062, 'xiaochao', '肖超');

-- --------------------------------------------------------

--
-- 表的结构 `qqnotic`
--

CREATE TABLE IF NOT EXISTS `qqnotic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btype` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `isok` int(11) NOT NULL,
  `uptime` double NOT NULL,
  `extime` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

--
-- 转存表中的数据 `qqnotic`
--

INSERT INTO `qqnotic` (`id`, `btype`, `userid`, `content`, `isok`, `uptime`, `extime`) VALUES
(1, 1, 2, '', 1, 0, 1331515547),
(59, 1, 1, '', 1, 0, 1331515633),
(60, 0, 1, '我是一条测试数据234342342432！', 1, 0, 1331268298),
(61, 2, 1, '', 1, 0, 1331267049),
(62, 1, 1, '', 1, 0, 1331267049),
(63, 0, 1, '我是一条测试数据！', 1, 0, 1331267049),
(64, 2, 1, '', 1, 0, 1331267049),
(65, 1, 1, '', 1, 0, 1331267247),
(66, 0, 1, '我是一条测试数据！', 1, 0, 1331267253),
(67, 2, 1, '', 1, 0, 1331267259),
(68, 1, 1, '', 1, 0, 1331267265),
(69, 0, 1, '我是一条测试数据！', 1, 0, 1331267049),
(70, 2, 1, '', 1, 0, 1331267271),
(71, 1, 1, '', 1, 1331267710, 1331267716),
(72, 2, 1, '', 1, 1331267724, 1331267728),
(73, 1, 1, '', 1, 1331267839, 1331267842),
(74, 1, 1, '', 1, 1331267960, 1331267962),
(75, 2, 1, '', 1, 1331267984, 1331267986),
(76, 2, 1, '', 1, 1331268061, 1331268064),
(77, 1, 1, '', 1, 1331268070, 1331268070),
(78, 1, 1, '', 1, 1331268106, 1331268112),
(79, 2, 1, '', 1, 1331268118, 1331268118),
(80, 1, 1, '', 1, 1331268131, 1331268136),
(81, 2, 1, '', 1, 1331268144, 1331268148),
(82, 1, 1, '', 1, 0, 1331268322),
(83, 0, 1, '我是一条测试数据！', 1, 0, 1331268328),
(84, 2, 1, '', 1, 0, 1331268334),
(85, 1, 1, '', 1, 0, 1331268340),
(86, 0, 1, '我是一条测试数据！', 1, 0, 1331267049),
(87, 2, 1, '', 1, 0, 1331268346),
(88, 2, 1, '', 1, 1331268390, 1331515445),
(89, 1, 1, '', 1, 1331269098, 1331269103),
(90, 2, 1, '', 1, 1331269100, 1331269109),
(91, 1, 1, '', 1, 1331274965, 1331274971),
(92, 2, 1, '', 1, 1331274967, 1331274977),
(93, 1, 1, '', 1, 1331292667, 1331292671),
(94, 1, 1, '', 1, 1331297191, 1331297193);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
