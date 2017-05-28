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
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events`
--

LOCK TABLES `tbl_events` WRITE;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` VALUES (1,'Open Day','2017-05-29','0000-00-00','10:00:00','15:00:00','Pontycymer Locomotive Works','The open day is a great opportunity to come and learn about the railways and our locos, and find out some of what we do to try and preserve the heritage of an important coal mining region in Wales.',1);
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_user` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_pass` varchar(255) DEFAULT NULL,
  `member_approved` tinyint(1) DEFAULT '0',
  `member_level` int(11) DEFAULT '4',
  `member_denied` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_member`
--

LOCK TABLES `tbl_member` WRITE;
/*!40000 ALTER TABLE `tbl_member` DISABLE KEYS */;
INSERT INTO `tbl_member` VALUES (1,'ordyckhoff','owen.dyckhoff@gmail.com','Owen Dyckhoff','$2y$10$aztBBO46FOPM4oc5nTcuIu1jJoVRyqncRhoWFZJRFx871EQbveEHC',1,0,0),(3,'testuser','test@test.com','A. Test','$2y$10$U5cGOiOG2jOsN38ui4tWZe4RtXhycfi7zHnmNTE7NPJof13iZGZJu',1,4,0),(4,'newuser','owen@dyckhoff.co.uk','New U. Ser','$2y$10$iMu9IiGdRwfFeBAqDkgjVeYI6w6Jz3G3VCIYzcJkIAvsp5804oVB6',1,4,0),(5,'blahblah','blahdiblah@whatever.com','B. L. Ah','$2y$10$1J4kdyhjb5WOncGHJTaG5.IY0rqNSJSNKfKq5GhUgRw37CXLyK/ha',0,4,1),(6,'billynomates','billy.nomates@scon.es','Billy NoMates','$2y$10$aeqfjbKi3R6GtMRq8mkKJOob9W.NjPWvTH45/V.tHcYF1eMTN0Fzu',0,4,0);
/*!40000 ALTER TABLE `tbl_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_author` varchar(255) DEFAULT NULL,
  `news_pubdate` datetime DEFAULT NULL,
  `news_update` datetime DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_summary` text,
  `news_content` text,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_news`
--

LOCK TABLES `tbl_news` WRITE;
/*!40000 ALTER TABLE `tbl_news` DISABLE KEYS */;
INSERT INTO `tbl_news` VALUES (1,'Owen Dyckhoff','2017-05-28 21:00:09','0000-00-00 00:00:00','New Website!','A brand new website has been created with a fresh new image.','Welcome to the brand new design of the Garw Valley Railway website! Most of the content is largely the same, but the look and feel has been overhauled completely, designed to work well on mobile and tablet devices as well as laptops and desktop computers.');
/*!40000 ALTER TABLE `tbl_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_organiser`
--

DROP TABLE IF EXISTS `tbl_organiser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_organiser` (
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
-- Dumping data for table `tbl_organiser`
--

LOCK TABLES `tbl_organiser` WRITE;
/*!40000 ALTER TABLE `tbl_organiser` DISABLE KEYS */;
INSERT INTO `tbl_organiser` VALUES (1,'GVR','Bridgend Valleys Railway Company T/A Garw Valley Railway','','','Pontycymmer Locomotive Works, Bridgend');
/*!40000 ALTER TABLE `tbl_organiser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_page`
--

DROP TABLE IF EXISTS `tbl_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `page_title_en` varchar(255) DEFAULT NULL,
  `page_title_cy` varchar(255) DEFAULT NULL,
  `page_route` varchar(255) DEFAULT NULL,
  `page_clearance` int(11) DEFAULT NULL,
  `page_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_page`
--

LOCK TABLES `tbl_page` WRITE;
/*!40000 ALTER TABLE `tbl_page` DISABLE KEYS */;
INSERT INTO `tbl_page` VALUES (0,'error404','404 Error','404 Gwall','/error/404',4,NULL),(1,'home','Home','Cartref','/',4,1),(2,'about','About Us','Amdanom Ni','/',4,2),(3,'news','News','Newyddion','/',4,4),(4,'history','History','Hanes','/about/history',4,5),(5,'gallery','Gallery','Oriel','/',4,NULL),(6,'funding','Funding','Cyllid','/',4,7),(7,'contact','Contact','Cysylltu','/',4,9),(8,'members','Members','Aelodau','/',3,10),(9,'archive','Archive','Archif','/',4,NULL),(12,'newtest','New Test Page','Tudalen Prawf Newydd','/test',4,NULL),(15,'404','Page Not Found','Tudalen heb ei Darganfod','/error/404',4,NULL),(16,'error','Error','Gwall','/',4,NULL),(17,'events','Events','Digwyddiadau','/',4,3);
/*!40000 ALTER TABLE `tbl_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_text`
--

DROP TABLE IF EXISTS `tbl_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_text` (
  `text_id` int(11) NOT NULL AUTO_INCREMENT,
  `text_name` varchar(255) NOT NULL,
  `text_desc` varchar(255) DEFAULT NULL,
  `text_en` text,
  `text_cy` text,
  PRIMARY KEY (`text_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_text`
--

LOCK TABLES `tbl_text` WRITE;
/*!40000 ALTER TABLE `tbl_text` DISABLE KEYS */;
INSERT INTO `tbl_text` VALUES (0,'404text','404 Error Message','404 Error: Page Not Found!','404 Gwall: Tudalen heb ei darganfod!'),(1,'railwayname','Title of the railway','Garw Valley Railway','Rheilffordd Cwm Garw'),(2,'helloworld','test text','Hello, World!','Shwmae, Byd!'),(3,'langswitch','Language Switcher text','Change Language','Dewis Iaith'),(4,'hometext','Text for home page','The Bridgend Valleys Railway Company Ltd. trading as Garw Valley Railway is a charity organisation with the ambitious objective of restoring passenger train services between Pontycymer and Brynmenyn within the next 10 years.\n\nWe aim to advance public education of the railway by the restoration, preservation and display of railway locomotives, carriages, wagons and other artefacts of historical interest.\n\nWe also wish to create a Heritage Centre at Pontycymer in collaboration with the Garw Heritage Society. This will allow the collection of archives, photographs, visual and sound recordings, and other historic material to be available to the public, preserved for future generations to learn and enjoy.\n\nThe company also wishes to contribute to the conservation of the industrial heritage of the South Wales valleys, to protect and improve the environment and to promote tourism as a means of economic development and regeneration.','Mae \'Bridgend Valleys Railway Company Ltd\', yn masnachu fel \'Garw Valley Railway\' ydy sefydliad elusennol gyda\'r nod uchelgeisiol o adfer gwasanaethau trÃªn i deithwyr rhwng Pontycymer a Brynmenyn o fewn y 10 mlynedd nesaf.\n\nRydyn ni\'n anelu at hyrwyddo addysg y cyhoedd o\'r rheilffordd gan y gwaith adfer, cadwraeth ac arddangos locomotifau rheilffordd, cerbydau, wagenni ac arteffactau eraill o ddiddordeb hanesyddol.\n\nHefyd, rydyn ni\'n dymuno i greu Canolfan Dreftadaeth ym Mhontycymer mewn cydweithrediad Ã¢ Chymdeithas Treftadaeth Garw. Bydd hyn yn caniatÃ¡u casglu archifau, ffotograffau, recordiadau sain a gweledol, a deunydd hanesyddol eraill fod ar gael i\'r cyhoedd, diogelu ar gyfer cenedlaethau\'r dyfodol i ddysgu a mwynhau.\n\nMae\'r cwmni hefyd yn dymuno cyfrannu at gadwraeth treftadaeth ddiwydiannol cymoedd De Cymru, i ddiogelu a gwella\'r amgylchedd ac i hyrwyddo twristiaeth fel modd o ddatblygu economaidd ac adfywio.'),(5,'pannier','description of pannier image','Pannier tank locomotive 9660 at Brynmenyn station. Sadly neither the locomotive nor the station have survived.','Locomotif Tanc Pannier 9660 yng ngorsaf Brynmenyn. Yn anffodus nid yw\'r locomotif na\'r orsaf wedi goroesi.'),(6,'whatson','box title','What\'s On','Beth Sydd Arno'),(7,'checkdate','box text','Check The Dates!','Gwiriwch Y Dyddiadau!'),(8,'weneedyou','box title','We Need You','Mae Angen I Chi'),(9,'volunteerwith','box text','Volunteer With Us!','Gwirfoddoli Gyda Ni!'),(10,'donatetous','box title','Donate','Roi I Ni'),(11,'helphistory','box text','Help Bring History Back To Life!','Helpu I Ddod &Acirc; Hanes Yn &Ocirc;l Yn Fyw!'),(12,'updatecontact','box title','Updates &amp; Contact','Diweddariadau &amp; Cysylltu'),(13,'stayintouch','box text','Stay In Touch!','Cadwch Mewn Cysylltiad!'),(14,'sorry','an apology','Sorry','Mae\'n ddrwg gennym'),(15,'derailed','humorous 404 text','You\'ve come off the rails!','Rydych chi wedi dod oddi ar y cledrau!'),(16,'pagenotfound','page not found text','Could not find the page','Ni allai ddod o hyd i\'r dudalen'),(17,'useremail','user or email form text','Username or Email','Enw Defnyddiwr neu E-bost'),(18,'password','password form text','Password','Cyfrinair'),(19,'login','login form text','Login','Mewgofnodwch'),(20,'submit','submit button form text','Submit','Cyflwynwch'),(21,'badcredentials','text when login fails','Credentials do not match our records','Nid yw cymwysterau yn cyfateb ein cofnodion'),(22,'loggedin','login success text','Successfully logged in.','Mewngofnodi\'n llwyddiannus'),(23,'noauth','display when user is not authorised','You do not have clearance to view this page. If you feel this is an error, contact the administrator or a board member.','Nid oes rhaid clirio i weld y dudalen hon. Os ydych yn credu bod hyn yn gamgymeriad, cysylltwch &acirc;\'r gweinyddwr neu aelod o\'r bwrdd.'),(24,'pending','user is waiting for account to be activated','Your site account is pending approval.','Mae eich aelodaeth safle yn aros am gymeradwyaeth.'),(25,'logout','logout link text','Log out','Allgofnodwch'),(26,'loggedout','logged out confirmation','You have been logged out.','Ydych wedi bod yn allgofnodi.'),(27,'dashboard','dashboard title text','Your Dashboard','Eich Dangosfwrdd'),(28,'waitapprove','dashboard pending approvals message','There are %d users currently awaiting approval. [[linkin:/members/approve|Review Now]]','Mae %d o ddefnyddwyr yn aros am gymeradwyaeth ar hyn o bryd. [[linkin:/members/approve|Adolygu Nawr]]'),(29,'memberlist','member list title','Member List','Rhestr Aelodau'),(30,'memberid','table heading','Member ID','Adnabod Aelod'),(31,'membername','table heading','Name','Enw'),(32,'memberuser','table heading','Username','Enw Defnyddiwr'),(33,'memberemail','table heading','Email','E-Bost'),(34,'memberapproved','table heading','Approved?','Cymeradwy?'),(35,'memberaction','table heading','Actions','Gweithrediadau'),(36,'memberclearance','table heading','Level','Lefel'),(37,'clearance_0','clearance level text','Developer','Datblygwr'),(38,'clearance_1','clearance level text','Administrator','Gweinyddwr'),(39,'clearance_2','clearance level text','Board','Bwrdd'),(40,'clearance_3','clearance level text','User','Defnyddiwr'),(41,'clearance_4','clearance level text','Visitor','Ymwelwyr'),(42,'memberedit','edit button text','Edit User','Golygu\'r Ddefnyddiwr'),(43,'regsuccess','successful registration text','You have been successfully registered. An administrator will review your account to approve your railway membership.','Ydych chi wedi cofrestru yn llwyddiannus. Bydd gweinyddwr adolygu eich cyfrif i gymeradwyo eich aelodaeth rheilffordd.'),(44,'register','register title text','Register','Cofrestru'),(45,'username','username form text','Username','Enw Defnyddiwr'),(46,'email','email form text','Email','E-Bost'),(47,'confirm','confirm text','Confirm','Cadarnhau'),(48,'name','name text','Name','Enw'),(49,'missingfield','missing info text','One or more fields empty.','Un neu fwy o feysydd yn wag'),(50,'nopassmatch','passwords don\'t match text','Passwords do not match.','Nid yw cyfrineiriau\'n cydweddu'),(51,'userexists','details match existing account','Your username / email already exist in our records.','Mae eich enw defnyddiwr / e-bost yn bodoli eisoes yn ein cofnodion'),(52,'denied','no entry text','Access Denied','Dim Mynediad'),(53,'approveusr','approval heading','Approve Users','Cymeradwyo Defnyddwyr'),(54,'aboutus','page title','About Us','Amdanom ni'),(55,'learnrailway','learn more button text','Learn More About The Railway','Dysgu Mwy Am Y Rheilffordd'),(56,'map','map text','Map','Map'),(57,'therail','railway title text','The Railway','Y Rheilffordd'),(58,'denyusr','deny user button text','Deny User','Gwadu Defnyddiwr');
/*!40000 ALTER TABLE `tbl_text` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-28 21:35:53
