-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost:8889
-- 產生時間： 2014 年 05 月 23 日 05:45
-- 伺服器版本: 5.5.34
-- PHP 版本： 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `newdgallery`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dg_album`
--

CREATE TABLE `dg_album` (
  `AID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `albumname` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `albuminfo` text COLLATE utf8_unicode_ci NOT NULL,
  `albumpath` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `albumpub` tinyint(1) NOT NULL,
  `albumpass` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coverPID` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`AID`),
  KEY `coverPID` (`coverPID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 資料表的匯出資料 `dg_album`
--

INSERT INTO `dg_album` (`AID`, `albumname`, `albuminfo`, `albumpath`, `albumpub`, `albumpass`, `coverPID`) VALUES
(1, '範例相簿（公開）', '範例公開相簿', 'album/PublicEx', 1, NULL, NULL),
(2, '範例加密相簿（公開）', '範例公開加密相簿', 'album/PublicPassEx', 1, '5BAA61E4C9B93F3F0682250B6CF8331B7EE68FD8', NULL),
(3, '範例相簿（私密）', '範例私密相簿', 'album/$0FA38B9ED0310A4D80EFA93E9960073C1D8CE90A', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `dg_picture`
--

CREATE TABLE `dg_picture` (
  `PID` bigint(20) unsigned NOT NULL,
  `pAID` bigint(20) unsigned NOT NULL,
  `picname` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `picinfo` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PID`),
  KEY `pAID` (`pAID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `dg_user`
--

CREATE TABLE `dg_user` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `displayname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` date NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `dg_user`
--

INSERT INTO `dg_user` (`UID`, `username`, `password`, `displayname`, `createdate`) VALUES
(1, 'root', 'DC76E9F0C0006E8F919E0C515C66DBBA3982F785', 'Admin', '2014-05-20');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `dg_album`
--
ALTER TABLE `dg_album`
  ADD CONSTRAINT `dg_album_ibfk_1` FOREIGN KEY (`coverPID`) REFERENCES `dg_picture` (`PID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 資料表的 Constraints `dg_picture`
--
ALTER TABLE `dg_picture`
  ADD CONSTRAINT `dg_picture_ibfk_1` FOREIGN KEY (`pAID`) REFERENCES `dg_album` (`AID`) ON DELETE CASCADE ON UPDATE CASCADE;
