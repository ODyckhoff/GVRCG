-- MySQL dump 10.13  Distrib 5.5.47, for Linux (x86_64)
--
-- Host: localhost    Database: gvrcg_db
-- ------------------------------------------------------
-- Server version	5.5.47

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_content`
--

CREATE TABLE IF NOT EXISTS `tbl_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `content_en` text,
  `content_cy` text,
  PRIMARY KEY (`content_id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `tbl_content_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `tbl_page` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_datestart` date NOT NULL,
  `event_dateend` date DEFAULT NULL,
  `event_timestart` time DEFAULT NULL,
  `event_timeend` time DEFAULT NULL,
  `event_location` varchar(255) DEFAULT NULL,
  `event_desc` text,
  `event_organiser` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_organiser` (`event_organiser`),
  CONSTRAINT `tbl_events_ibfk_1` FOREIGN KEY (`event_organiser`) REFERENCES `tbl_organiser` (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_notes` text,
  `file_visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_user` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_pass` varchar(255) DEFAULT NULL,
  `member_approved` tinyint(1) DEFAULT '0',
  `member_level` int(11) DEFAULT '4',
  `member_denied` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_memberships`
--

CREATE TABLE IF NOT EXISTS `tbl_memberships` (
  `memberships_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `postcode` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `giftaid` text NOT NULL,
  PRIMARY KEY (`memberships_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_author` varchar(255) DEFAULT NULL,
  `news_pubdate` datetime DEFAULT NULL,
  `news_update` datetime DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_summary` text,
  `news_content` text,
  `news_updateauthor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_organiser`
--

CREATE TABLE IF NOT EXISTS `tbl_organiser` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) NOT NULL,
  `org_desc` text,
  `org_email` varchar(255) DEFAULT NULL,
  `org_telephone` varchar(255) DEFAULT NULL,
  `org_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `page_title_en` varchar(255) DEFAULT NULL,
  `page_title_cy` varchar(255) DEFAULT NULL,
  `page_route` varchar(255) DEFAULT NULL,
  `page_clearance` int(11) DEFAULT NULL,
  `page_order` int(11) DEFAULT NULL,
  `page_editable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_paypal`
--

CREATE TABLE IF NOT EXISTS `tbl_paypal` (
  `paypal_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `dob` date NOT NULL,
  `guid` text NOT NULL,
  `txn_id` text,
  `txn_ok` int(11) DEFAULT NULL,
  PRIMARY KEY (`paypal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_text`
--

CREATE TABLE IF NOT EXISTS `tbl_text` (
  `text_id` int(11) NOT NULL AUTO_INCREMENT,
  `text_name` varchar(255) NOT NULL,
  `text_desc` varchar(255) DEFAULT NULL,
  `text_en` text,
  `text_cy` text,
  PRIMARY KEY (`text_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-24 16:34:21
