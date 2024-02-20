
DROP TABLE IF EXISTS `register`;

CREATE TABLE `register` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(31) DEFAULT NULL,
  `lname` varchar(31) DEFAULT NULL,
  `team` char(32) DEFAULT NULL,
  `ntrp` varchar(32) DEFAULT NULL,
  `daytime` varchar(32) DEFAULT NULL,

  `email` varchar(50) DEFAULT NULL,

  `rescaptain` varchar(8) DEFAULT NULL,
  `resprev` varchar(8) DEFAULT NULL,
  `rescount` int DEFAULT NULL,

  `year` varchar(40) DEFAULT NULL,
  `date` int DEFAULT NULL,
  `insignia` varchar(7) DEFAULT NULL,
  `custom` varchar(31) DEFAULT NULL,

  `pwd` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=latin1;



