-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2014 年 05 月 03 日 08:39
-- 伺服器版本: 10.0.10-MariaDB
-- PHP 版本： 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `dgallery`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dg_albumdata`
--

CREATE TABLE IF NOT EXISTS `dg_albumdata` (
  `albumname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `albuminfo` text COLLATE utf8_unicode_ci NOT NULL,
  `piccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `dg_albumroot`
--

CREATE TABLE IF NOT EXISTS `dg_albumroot` (
  `AID` bigint(20) unsigned NOT NULL,
  `albumname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `albumpub` tinyint(1) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `dg_albumroot`
--

INSERT INTO `dg_albumroot` (`AID`, `albumname`, `albumpub`) VALUES
(0, 'egpub', 1),
(1, 'egprivate', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `dg_albumsecurity`
--

CREATE TABLE IF NOT EXISTS `dg_albumsecurity` (
  `AID` bigint(20) NOT NULL,
  `albumname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `albumpath` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `albumpass` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`AID`),
  KEY `albumname` (`albumname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `dg_user`
--

CREATE TABLE IF NOT EXISTS `dg_user` (
  `UID` bigint(20) unsigned NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `dg_user`
--

INSERT INTO `dg_user` (`UID`, `username`, `password`, `email`, `display_name`) VALUES
(1, 'root', 'root', 'root@root', 'admin')

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
