-- MySQL dump 10.13  Distrib 5.5.27, for Linux (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `History`
--

DROP TABLE IF EXISTS `History`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `History` (
  `id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `date` datetime NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shares` bigint(20) NOT NULL,
  `price` decimal(65,4) NOT NULL,
  `total` decimal(65,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `History`
--

LOCK TABLES `History` WRITE;
/*!40000 ALTER TABLE `History` DISABLE KEYS */;
INSERT INTO `History` VALUES (7,'BUY','0000-00-00 00:00:00','AKS','AK Steel Holding ',12,5.3400,64.0800),(7,'SELL','2012-11-08 18:16:31','AKS','AK Steel Holding ',12,5.3400,64.0800),(7,'BUY','0000-00-00 00:00:00','AKS','AK Steel Holding ',12,5.3400,64.0800),(7,'BUY','0000-00-00 00:00:00','AKS','AK Steel Holding ',1,5.3400,5.3400),(7,'BUY','0000-00-00 00:00:00','AAPL','Apple Inc.',4,537.7500,2151.0000),(7,'BUY','0000-00-00 00:00:00','AV','Aviva plc Unspons',100,10.5400,1054.0000),(7,'BUY','2012-11-08 18:19:42','AV','Aviva plc Unspons',50,10.5400,527.0000),(3,'BUY','2012-11-08 18:20:40','AIG','American Internat',50,31.4100,1570.5000),(7,'ADD CASH','2012-11-08 20:36:04','','',0,0.0000,1000.0000),(7,'ADD CASH','2012-11-08 20:43:21','','',0,732.9900,732.9900),(7,'ADD CASH','2012-11-08 20:43:47','','',0,7.0000,7.0000),(7,'ADD CASH','2012-11-08 20:45:30','','',0,260.0200,260.0200),(7,'BUY','2012-11-08 20:45:57','AIG','American Internat',100,31.4100,3141.0000),(7,'SELL','2012-11-08 20:46:42','AKS','AK Steel Holding ',13,5.3400,69.4200),(7,'ADD CASH','2012-11-08 22:19:00','','',0,10.0000,10.0000),(7,'ADD CASH','2012-11-08 22:23:52','','',0,10.0000,10.0000),(7,'ADD CASH','2012-11-08 22:29:18','','',0,10.0000,10.0000),(7,'SELL','2012-11-08 22:39:00','AIG','American Internat',100,31.4100,3.0000),(7,'SELL','2012-11-08 22:41:01','AAPL','Apple Inc.',4,537.7500,2151.0000),(7,'SELL','2012-11-08 22:48:08','AV','Aviva plc Unspons',150,10.5400,1581.0000),(7,'ADD CASH','2012-11-08 22:52:14','','',0,1250.0000,1250.0000),(7,'ADD CASH','2012-11-08 23:00:40','','',0,12.8800,12.8800),(7,'BUY','2012-11-08 23:01:49','AIG','American Internat',45,31.4100,1413.4500),(7,'BUY','2012-11-08 23:02:23','GOOG','Google Inc.',10,652.2900,6522.9000);
/*!40000 ALTER TABLE `History` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Portfolios`
--

DROP TABLE IF EXISTS `Portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Portfolios` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `shares` bigint(20) unsigned NOT NULL,
  `price` decimal(65,4) unsigned NOT NULL,
  `total` decimal(65,4) unsigned NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Portfolios`
--

LOCK TABLES `Portfolios` WRITE;
/*!40000 ALTER TABLE `Portfolios` DISABLE KEYS */;
INSERT INTO `Portfolios` VALUES (1,'ACN',100,0.0000,0.0000),(2,'ACN',1000,0.0000,0.0000),(3,'AIG',2550,0.0000,0.0000),(4,'AOL',50,0.0000,0.0000),(5,'AON',200,0.0000,0.0000),(6,'APF',100,0.0000,0.0000),(7,'AIG',45,0.0000,0.0000),(7,'GOOG',10,0.0000,0.0000);
/*!40000 ALTER TABLE `Portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000),(2,'cs50','$1$50$ceNa7BV5AoVQqilACNLuC1',10000.0000),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',8429.5000),(4,'malan','$1$HA$azTGIMVlmPi9W9Y12cYSj/',10000.0000),(5,'nate','$1$50$sUyTaTbiSKVPZCpjJckan0',10000.0000),(6,'rbowden','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000),(7,'skroob','$1$50$euBi4ugiJmbpIbvTTfmfI.',3020.9500),(8,'tmacwilliam','$1$50$91ya4AroFPepdLpiX.bdP1',10000.0000),(9,'zamyla','$1$50$Suq.MOtQj51maavfKvFsW1',10000.0000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-08 23:06:11
