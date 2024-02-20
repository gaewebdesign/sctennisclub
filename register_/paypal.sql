
-- Table structure for table `paypal`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `register` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `year` varchar(40) DEFAULT NULL,
  `fname` varchar(31) DEFAULT NULL,
  `lname` varchar(31) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `event` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `ntrp` varchar(5) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `state` varchar(5) DEFAULT NULL,
  `capt` varchar(31) DEFAULT NULL,
  `team` varchar(31) DEFAULT NULL,
  `mtype` varchar(31) DEFAULT NULL,
  `help` varchar(8) DEFAULT NULL,
  `other` varchar(31) DEFAULT NULL,
  `date` int DEFAULT NULL,
  `insignia` varchar(7) DEFAULT NULL,
  `payment` varchar(16) DEFAULT NULL,
  `custom` varchar(31) DEFAULT NULL,
  `opt` varchar(31) DEFAULT NULL,
  `pwd` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2417 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
