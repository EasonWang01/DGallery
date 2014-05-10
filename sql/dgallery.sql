-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost:8889
-- 產生時間： 2014 年 05 月 10 日 06:34
-- 伺服器版本: 5.5.34
-- PHP 版本： 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `dgallery`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dg_album`
--

CREATE TABLE `dg_album` (
  `AID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `albumname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `albumpath` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `albuminfo` text COLLATE utf8_unicode_ci NOT NULL,
  `albumpub` tinyint(1) NOT NULL,
  `albumpass` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `dg_album`
--

INSERT INTO `dg_album` (`AID`, `albumname`, `albumpath`, `albuminfo`, `albumpub`, `albumpass`) VALUES
(1, 'egpub', 'album/egpub/', '範例公開相簿', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `dg_pic`
--

CREATE TABLE `dg_pic` (
  `PID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pAID` bigint(20) unsigned NOT NULL,
  `picname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picinfo` text COLLATE utf8_unicode_ci NOT NULL,
  `slideshow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PID`),
  KEY `pAID` (`pAID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 資料表的匯出資料 `dg_pic`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dg_user`
--

CREATE TABLE `dg_user` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `dg_user`
--

INSERT INTO `dg_user` (`UID`, `username`, `password`, `email`, `display_name`) VALUES
(1, 'root', 'DC76E9F0C0006E8F919E0C515C66DBBA3982F785', 'root@root', 'admin');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `dg_pic`
--
ALTER TABLE `dg_pic`
  ADD CONSTRAINT `dg_pic_ibfk_1` FOREIGN KEY (`pAID`) REFERENCES `dg_album` (`AID`) ON DELETE CASCADE ON UPDATE CASCADE;
